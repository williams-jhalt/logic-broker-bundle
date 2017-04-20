<?php

namespace Williams\LogicBrokerBundle;

use Williams\LogicBrokerBundle\Model\Invoice;
use Williams\LogicBrokerBundle\Model\Order;
use Williams\LogicBrokerBundle\Model\Shipment;

/**
 * Implement this class to create a handler for submitting and retrieving
 * order information
 */
interface LogicBrokerHandlerInterface {

    /**
     * Submit an order to the ordering system and return  
     * the order number
     * 
     * @param Order $order
     * @param string $customerNumber
     * @return string
     */
    public function submitOrder(Order $order, $customerNumber);
    
    /**
     * Retrieve an order number if order has been entered into ERP
     * 
     * @param string $weborderNumber
     * @param string $customerNumber
     * @return string
     */
    public function retrieveOrderNumber($weborderNumber, $customerNumber);
    
    /**
     * Retrieve invoices for an order
     * 
     * @param string $orderNumber
     * @return Invoice[]
     */
    public function getInvoices($orderNumber);
    
    /**
     * Retrieve shipments for an order
     * 
     * @param string $orderNumber
     * @return Shipment[]
     */
    public function getShipments($orderNumber);
    
}