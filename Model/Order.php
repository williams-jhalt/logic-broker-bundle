<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class Order {

    /**
     * 
     * @JMS\Type("Identifier")
     * @JMS\SerializedName("Identifier")
     * @var Identifier
     */
    private $identifier;

    /**
     * Logicbroker Internal Company ID to specify what company is sending the document.
     *
     * @JMS\SerializedName("SenderCompanyId")
     * @var string 
     */
    private $senderCompanyId;

    /**
     * Logicbroker Internal Company ID to specify what company is to receive the document.
     *
     * @JMS\SerializedName("ReceiverCompanyId")
     * @var string
     */
    private $receiverCompanyId;

    /**
     * This will be used to identify the status of your order. This is tied to all the documents associated with it.
     * 
     * 100 (Submitted) =  Status used when order is first received, once the order is picked up it should be moved to the next status, typically this will be 500 (Ready to Ship). For most partners the order will rarely stay in this status and can be picked up on 500 (Ready to Ship).
     * 500 (Ready to Ship) = Indicates the order is pending shipment and waiting on the shipment. Once this shipment is sent the order shipped quantity will be updated and when all items have been shipped the status will automatically move to 600 (Ready to Invoice).
     * 600 (Ready to Invoice) = Status indicates order is pending invoicing. Once the invoice is received and all item Quantities have been shipped the status will move to complete.
     * 1000 (Complete) = Order flow is complete and all necessary documents have been received and processed for it. Some flows can include Acknowledgement, Shipment, and Invoice.
     * 1100 (Cancelled) = Indicates the order and all line items have been cancelled. If you are sending an Acknowledgement as a cancellation, the status will need to be moved to this status and will not be done automatically.
     * 1200 (Failed) = The status will indicate there was an error processing the order. Will go to this status automatically if the order fails to send via EDI, or has failed validation rules. See the events associated with the order to see the reason for the failure.
     *
     * @JMS\SerializedName("StatusCode")
     * @var string
     */
    private $statusCode;

    /**
     * Date the document was created in the logicbroker system.
     *
     * @JMS\SerializedName("DocumentDate")
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @var DateTime
     */
    private $documentDate;

    /**
     * Currency Code used on the purchase order.
     *
     * @JMS\SerializedName("Currency")
     * @var string
     */
    private $currency;

    /**
     * End User's customer ID; typically used on the packing slip
     *
     * @JMS\SerializedName("CustomerNumber")
     * @var string
     */
    private $customerNumber;

    /**
     * Date in which the PO should be cancelled if the date has been passed before shipment.
     * 
     * @JMS\SerializedName("DoNotShipAfter")
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @var DateTime|null
     */
    private $doNotShipAfter;

    /**
     * Shipping amount to be applied and included in the order total.
     *
     * @JMS\SerializedName("HandlingAmount")
     * @var double
     */
    private $handlingAmount;

    /**
     * This section will include gift and packing slip messages.
     *
     * @JMS\SerializedName("Note")
     * @var string
     */
    private $note;

    /**
     * Date on the Purchase Order
     *
     * @JMS\SerializedName("OrderDate")
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @var DateTime
     */
    private $orderDate;

    /**
     * Contains the end customer's order number, this will be used on the packing slip.
     *
     * @JMS\SerializedName("OrderNumber")
     * @var string
     */
    private $orderNumber;

    /**
     * This will be the purcahse order number, this will be the main Key to link all your documents.
     *
     * @JMS\SerializedName("PartnerPO")
     * @var string
     */
    private $partnerPO;

    /**
     * Purchase Order Type Code will indicate what type of PO is being sent. Examples are shown below.
     * 
     * SA = Stand Alone
     * RE = Re-Order
     * DS = Drop Ship
     *
     * @JMS\SerializedName("TypeCode")
     * @var string
     */
    private $typeCode;

    /**
     * Used for replacement orders to not duplicate the fulfillment of the same PO.
     *
     * @JMS\SerializedName("ReleaseNumber")
     * @var int
     */
    private $releaseNumber;

    /**
     * Date requested for order to leave the warehouse/shipping location.
     * 
     * @JMS\SerializedName("RequestedShipDate")
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @var DateTime|null
     */
    private $requestedShipDate;

    /**
     * Indicates the terms of completing the purchase order. Applicable codes are listed below:
     *   0 = NoBackorder
     *   1 = Backorder if out of stock
     *   2 = ShipComplete
     *
     * @JMS\SerializedName("SalesRequirement")
     * @var int
     */
    private $salesRequirement;

    /**
     * This is the internal vendor number provided to the supplier from the merchant
     *
     * @JMS\SerializedName("VendorNumber")
     * @var string
     */
    private $vendorNumber;

    /**
     *
     * @JMS\SerializedName("Discounts")
     * @JMS\Type("array<Discount>")
     * @var Discount[]
     */
    private $discounts;

    /**
     *
     * @JMS\SerializedName("PaymentTerm")
     * @JMS\Type("PaymentTerm")
     * @var PaymentTerm
     */
    private $paymentTerm;

    /**
     *
     * @JMS\SerializedName("ShipmentInfos")
     * @JMS\Type("array<ShipmentInfo>")
     * @var ShipmentInfo[]
     */
    private $shipmentInfos;

    /**
     *
     * @JMS\SerializedName("Taxes")
     * @JMS\Type("array<Tax>")
     * @var Tax[]
     */
    private $taxes;

    /**
     *
     * @JMS\SerializedName("BillToAddress")
     * @JMS\Type("Address")
     * @var Address
     */
    private $billToAddress;

    /**
     *
     * @JMS\SerializedName("OrderedByAddress")
     * @JMS\Type("Address")
     * @var Address
     */
    private $orderedByAddress;

    /**
     *
     * @JMS\SerializedName("ShipToAddress")
     * @JMS\Type("Address")
     * @var Address
     */
    private $shipToAddress;

    /**
     *
     * @JMS\SerializedName("ExtendedAttributes")
     * @JMS\Type("array<ExtendedAttribute>")
     * @var ExtendedAttribute[]
     */
    private $extendedAttributes;

    /**
     *
     * @JMS\SerializedName("OrderLines")
     * @JMS\Type("array<OrderLine>")
     * @var OrderLine[]
     */
    private $orderLines;

    public function __construct() {
        $this->billToAddress = new Address();
        $this->shipToAddress = new Address();
        $this->orderedByAddress = new Address();
        $this->identifier = new Identifier();
        $this->paymentTerm = new PaymentTerm();
        $this->discounts = [];
        $this->shipmentInfos = [];
        $this->taxes = [];
        $this->extendedAttributes = [];
        $this->orderLines = [];
    }

    public function getIdentifier() {
        return $this->identifier;
    }

    public function getSenderCompanyId() {
        return $this->senderCompanyId;
    }

    public function getReceiverCompanyId() {
        return $this->receiverCompanyId;
    }

    public function getStatusCode() {
        return $this->statusCode;
    }

    public function getDocumentDate() {
        return $this->documentDate;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function getCustomerNumber() {
        return $this->customerNumber;
    }

    public function getDoNotShipAfter() {
        return $this->doNotShipAfter;
    }

    public function getHandlingAmount() {
        return $this->handlingAmount;
    }

    public function getNote() {
        return $this->note;
    }

    public function getOrderDate() {
        return $this->orderDate;
    }

    public function getOrderNumber() {
        return $this->orderNumber;
    }

    public function getPartnerPO() {
        return $this->partnerPO;
    }

    public function getTypeCode() {
        return $this->typeCode;
    }

    public function getReleaseNumber() {
        return $this->releaseNumber;
    }

    public function getRequestedShipDate() {
        return $this->requestedShipDate;
    }

    public function getSalesRequirement() {
        return $this->salesRequirement;
    }

    public function getVendorNumber() {
        return $this->vendorNumber;
    }

    public function getDiscounts() {
        return $this->discounts;
    }

    public function getPaymentTerm() {
        return $this->paymentTerm;
    }

    public function getShipmentInfos() {
        return $this->shipmentInfos;
    }

    public function getTaxes() {
        return $this->taxes;
    }

    public function getBillToAddress() {
        return $this->billToAddress;
    }

    public function getOrderedByAddress() {
        return $this->orderedByAddress;
    }

    public function getShipToAddress() {
        return $this->shipToAddress;
    }

    public function getExtendedAttributes() {
        return $this->extendedAttributes;
    }

    public function getOrderLines() {
        return $this->orderLines;
    }

    public function setIdentifier(Identifier $identifier) {
        $this->identifier = $identifier;
        return $this;
    }

    public function setSenderCompanyId($senderCompanyId) {
        $this->senderCompanyId = $senderCompanyId;
        return $this;
    }

    public function setReceiverCompanyId($receiverCompanyId) {
        $this->receiverCompanyId = $receiverCompanyId;
        return $this;
    }

    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function setDocumentDate(DateTime $documentDate) {
        $this->documentDate = $documentDate;
        return $this;
    }

    public function setCurrency($currency) {
        $this->currency = $currency;
        return $this;
    }

    public function setCustomerNumber($customerNumber) {
        $this->customerNumber = $customerNumber;
        return $this;
    }

    public function setDoNotShipAfter(DateTime $doNotShipAfter) {
        $this->doNotShipAfter = $doNotShipAfter;
        return $this;
    }

    public function setHandlingAmount($handlingAmount) {
        $this->handlingAmount = $handlingAmount;
        return $this;
    }

    public function setNote($note) {
        $this->note = $note;
        return $this;
    }

    public function setOrderDate(DateTime $orderDate) {
        $this->orderDate = $orderDate;
        return $this;
    }

    public function setOrderNumber($orderNumber) {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    public function setPartnerPO($partnerPO) {
        $this->partnerPO = $partnerPO;
        return $this;
    }

    public function setTypeCode($typeCode) {
        $this->typeCode = $typeCode;
        return $this;
    }

    public function setReleaseNumber($releaseNumber) {
        $this->releaseNumber = $releaseNumber;
        return $this;
    }

    public function setRequestedShipDate(DateTime $requestedShipDate) {
        $this->requestedShipDate = $requestedShipDate;
        return $this;
    }

    public function setSalesRequirement($salesRequirement) {
        $this->salesRequirement = $salesRequirement;
        return $this;
    }

    public function setVendorNumber($vendorNumber) {
        $this->vendorNumber = $vendorNumber;
        return $this;
    }

    public function setDiscounts(array $discounts) {
        $this->discounts = $discounts;
        return $this;
    }

    public function setPaymentTerm(PaymentTerm $paymentTerm) {
        $this->paymentTerm = $paymentTerm;
        return $this;
    }

    public function setShipmentInfos(array $shipmentInfos) {
        $this->shipmentInfos = $shipmentInfos;
        return $this;
    }

    public function setTaxes(array $taxes) {
        $this->taxes = $taxes;
        return $this;
    }

    public function setBillToAddress(Address $billToAddress) {
        $this->billToAddress = $billToAddress;
        return $this;
    }

    public function setOrderedByAddress(Address $orderedByAddress) {
        $this->orderedByAddress = $orderedByAddress;
        return $this;
    }

    public function setShipToAddress(Address $shipToAddress) {
        $this->shipToAddress = $shipToAddress;
        return $this;
    }

    public function setExtendedAttributes(array $extendedAttributes) {
        $this->extendedAttributes = $extendedAttributes;
        return $this;
    }

    public function setOrderLines(array $orderLines) {
        $this->orderLines = $orderLines;
        return $this;
    }

}
