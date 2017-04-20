<?php

namespace Williams\LogicBrokerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carton
 *
 * @ORM\Table(name="williams_logic_broker_order_status")
 * @ORM\Entity(repositoryClass="Williams\LogicBrokerBundle\Repository\OrderStatusRepository")
 */
class OrderStatus {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="logic_broker_key", type="string", length=255)
     */
    private $logicBrokerKey;

    /**
     * @var string
     *
     * @ORM\Column(name="sender_company_id", type="string", length=255)
     */
    private $senderCompanyId;

    /**
     * @var string
     *
     * @ORM\Column(name="document_date", type="datetime")
     */
    private $documentDate;

    /**
     * @var string
     *
     * @ORM\Column(name="order_date", type="datetime")
     */
    private $orderDate;

    /**
     * @var string
     *
     * @ORM\Column(name="partner_po", type="string", length=255)
     */
    private $partnerPO;

    /**
     * @var string
     *
     * @ORM\Column(name="order_number", type="string", length=255, nullable=true)
     */
    private $orderNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="weborder_number", type="string", length=255)
     */
    private $weborderNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_number", type="string", length=255, nullable=true)
     */
    private $customerNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="status_code", type="integer")
     */
    private $statusCode = 100;

    public function getId() {
        return $this->id;
    }

    public function getLogicBrokerKey() {
        return $this->logicBrokerKey;
    }

    public function getSenderCompanyId() {
        return $this->senderCompanyId;
    }

    public function getDocumentDate() {
        return $this->documentDate;
    }

    public function getOrderDate() {
        return $this->orderDate;
    }

    public function getPartnerPO() {
        return $this->partnerPO;
    }

    public function getOrderNumber() {
        return $this->orderNumber;
    }

    public function getWeborderNumber() {
        return $this->weborderNumber;
    }

    public function getCustomerNumber() {
        return $this->customerNumber;
    }

    public function getStatusCode() {
        return $this->statusCode;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setLogicBrokerKey($logicBrokerKey) {
        $this->logicBrokerKey = $logicBrokerKey;
        return $this;
    }

    public function setSenderCompanyId($senderCompanyId) {
        $this->senderCompanyId = $senderCompanyId;
        return $this;
    }

    public function setDocumentDate($documentDate) {
        $this->documentDate = $documentDate;
        return $this;
    }

    public function setOrderDate($orderDate) {
        $this->orderDate = $orderDate;
        return $this;
    }

    public function setPartnerPO($partnerPO) {
        $this->partnerPO = $partnerPO;
        return $this;
    }

    public function setOrderNumber($orderNumber) {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    public function setWeborderNumber($weborderNumber) {
        $this->weborderNumber = $weborderNumber;
        return $this;
    }

    public function setCustomerNumber($customerNumber) {
        $this->customerNumber = $customerNumber;
        return $this;
    }

    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
        return $this;
    }

}
