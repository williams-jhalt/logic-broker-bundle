<?php

namespace Williams\LogicBrokerBundle\Service;

use Doctrine\ORM\EntityManager;
use Exception;
use SplFileObject;
use Williams\LogicBrokerBundle\Adapter\CsvInvoiceAdapter;
use Williams\LogicBrokerBundle\Adapter\CsvOrderAdapter;
use Williams\LogicBrokerBundle\Adapter\CsvShipmentAdapter;
use Williams\LogicBrokerBundle\Entity\OrderStatus;
use Williams\LogicBrokerBundle\LogicBrokerHandlerInterface;

class LogicBrokerService {

    /**
     *
     * @var string
     */
    private $ftpHost;

    /**
     *
     * @var string
     */
    private $ftpUser;

    /**
     *
     * @var string
     */
    private $ftpPass;

    /**
     *
     * @var LogicBrokerHandlerInterface
     */
    private $handler;
    
    /**
     *
     * @var EntityManager
     */
    private $em;    

    public function __construct($ftpHost, $ftpUser, $ftpPass, $handler, EntityManager $em) {
        $this->ftpHost = $ftpHost;
        $this->ftpUser = $ftpUser;
        $this->ftpPass = $ftpPass;
        $this->handler = $handler;
        $this->em = $em;
    }

    public function retrieveOrders() {

        $adapter = new CsvOrderAdapter();

        $ftp = ftp_connect($this->ftpHost);
        $login = ftp_login($ftp, $this->ftpUser, $this->ftpPass);

        if ((!$ftp) || (!$login)) {
            throw new Exception("Could Not Connect to FTP");
        }

        $files = ftp_nlist($ftp, "/CSV/Inbound/Order");

        foreach ($files as $file) {
            $tempfile = tempnam(sys_get_temp_dir(), "lb");
            ftp_get($ftp, $tempfile, "/CSV/Inbound/Order/$file");
            $orders = $adapter->read(new SplFileObject($tempfile));
            foreach ($orders as $order) {
                
                // translate the sender id to a customer number
                $repo = $this->em->getRepository('Williams:LogicBrokerBundle:Customer');
                $customerNumber = $repo->findOneBySenderCompanyId($order->getSenderCompanyId())->getCustomerNumber();
                
                // submit order using handler
                $weborderNumber = $this->handler->submitOrder($order, $customerNumber);
                
                // record transaction
                $status = new OrderStatus();
                $status->setCustomerNumber($customerNumber);
                $status->setDocumentDate($order->getDocumentDate());
                $status->setLogicBrokerKey($order->getIdentifier()->getLogicBrokerKey());
                $status->setOrderDate($order->getOrderDate());
                $status->setPartnerPO($order->getPartnerPO());
                $status->setSenderCompanyId($order->getSenderCompanyId());
                $status->setStatusCode(150);
                $status->setWeborderNumber($weborderNumber);
                $this->em->persist($status);
            }
            $this->em->flush();
            
            ftp_delete($ftp, "/CSV/Inbound/Order/$file");
            
            unlink($tempfile);
        }

        return $orders;
    }
    
    /**
     * Check that orders have been entered into ERP
     */
    public function acknowledgeReceipt() {
        
        $repo = $this->em->getRepository('Williams:LogicBrokerBundle:OrderStatus');
        $orderStatus = $repo->findByStatusCode(150);
        foreach ($orderStatus as $status) {
            $weborderNumber = $status->getWeborderNumber();
            $customerNumber = $status->getCustomerNumber();
            $orderNumber = $this->handler->retrieveOrderNumber($weborderNumber, $customerNumber);
            if ($orderNumber !== null) {
                $status->setOrderNumber($orderNumber);
                $status->setStatusCode(500);
                $this->em->persist($status);
            }
        }
        $this->em->flush();
        
    }

    /**
     * Submit shipments to LogicBroker
     */
    public function submitShipments() {
        
        $tempFile = tempnam(sys_get_temp_dir(), "lb");
        
        $file = new SplFileObject($tempFile, "wb");
        
        $adapter = new CsvShipmentAdapter();
        
        $adapter->writeHeader($file);
        
        $repo = $this->em->getRepository('Williams:LogicBrokerBundle:OrderStatus');
        $orderStatus = $repo->findByStatusCode(500);
        foreach ($orderStatus as $status) {
            $shipments = $this->handler->getShipments($status->getOrderNumber());
            $adapter->writeData($shipments, $file);
        }

        $ftp = ftp_connect($this->ftpHost);
        $login = ftp_login($ftp, $this->ftpUser, $this->ftpPass);

        if ((!$ftp) || (!$login)) {
            throw new Exception("Could Not Connect to FTP");
        }
        
        $filename = date("Ymdhis") . "_shipments.csv";

        ftp_put($ftp, "/CSV/Outbound/ExtendedShipment/$filename", $tempFile);
        
        foreach ($orderStatus as $status) {
            $status->setStatusCode(600);
            $this->em->persist($status);
        }
        $this->em->flush();
        
        unlink($tempFile);
        
    }
    
    /**
     * Submit invoices to LogicBroker
     */
    public function submitInvoices() {
        
        $tempFile = tempnam(sys_get_temp_dir(), "lb");
        
        $file = new SplFileObject($tempFile, "wb");
        
        $adapter = new CsvInvoiceAdapter();
        
        $adapter->writeHeader($file);
        
        $repo = $this->em->getRepository('Williams:LogicBrokerBundle:OrderStatus');
        $orderStatus = $repo->findByStatusCode(600);
        foreach ($orderStatus as $status) {
            $invoices = $this->handler->getInvoices($status->getOrderNumber());
            $adapter->writeData($invoices, $file);
        }

        $ftp = ftp_connect($this->ftpHost);
        $login = ftp_login($ftp, $this->ftpUser, $this->ftpPass);

        if ((!$ftp) || (!$login)) {
            throw new Exception("Could Not Connect to FTP");
        }
        
        $filename = date("Ymdhis") . "_invoices.csv";

        ftp_put($ftp, "/CSV/Outbound/Invoice/$filename", $tempFile);
        
        foreach ($orderStatus as $status) {
            $status->setStatusCode(1000);
            $this->em->persist($status);
        }
        $this->em->flush();
        
        unlink($tempFile);
        
    }

}
