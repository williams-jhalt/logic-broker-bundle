<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class Shipment {

    /**
     *
     * @JMS\SerializedName("Identifier")
     * @JMS\Type("Identifier")
     * @var Identifier
     */
    private $identifier;

    /**
     * Logicbroker Internal Company ID to specify what company is to receive the document.
     *
     * @JMS\SerializedName("ReceiverCompanyId")
     * @var string
     */
    private $receiverCompanyId;

    /**
     * Date the document was created. This field will automatically default with the date the document is created.
     *
     * @JMS\SerializedName("DocumentDate")
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @var DateTime
     */
    private $documentDate;

    /**
     * Unique ID to identify the shipment.
     *
     * @JMS\SerializedName("ShipmentNumber")
     * @var string
     */
    private $shipmentNumber;

    /**
     * This will be the purchase order number, this will be the main Key to link all your documents. This should match the order.
     *
     * @JMS\SerializedName("PartnerPO")
     * @var string
     */
    private $partnerPO;

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
     * Document number issued by the carrier which contains details of the shipment.
     *
     * @JMS\SerializedName("BillOfLading")
     * @var string
     */
    private $billOfLading;

    /**
     * Typically used by LTL freight carriers, A PRO number is a series of numbers used by carriers as a reference for freight movement; this is like a tracking number.
     *
     * @JMS\SerializedName("PRONumber")
     * @var string
     */
    private $proNumber;

    /**
     * This is the internal vendor number provided to the supplier from the merchant. If available it is always recommended to send.
     *
     * @JMS\SerializedName("VendorNumber")
     * @var string
     */
    private $vendorNumber;

    /**
     * Notes or shipping instructions provided by supplier; see the meaning of the notes on the individual partners notes.
     *
     * @JMS\SerializedName("Note")
     * @var string
     */
    private $note;

    /**
     * Date the shipment is expected to be received at the shipping location.
     *
     * @JMS\SerializedName("ExpectedDeliveryDate")
     * @JMS\Type("DateTime<'c'>")
     * @var DateTime|null
     */
    private $expectedDeliveryDate;

    /**
     * Shipment method of payment. Typical codes received are listed below
     * CC: Collect
     * PO: Prepaid Only
     *
     * @JMS\SerializedName("Payments")
     * @JMS\Type("array<Payment>")
     * @var Payment[]
     */
    private $payments;

    /**
     *
     * @JMS\SerializedName("ShipToAddress")
     * @JMS\Type("Address")
     * @var Address
     */
    private $shipToAddress;

    /**
     *
     * @JMS\SerializedName("ShipFromAddress")
     * @JMS\Type("Address")
     * @var Address
     */
    private $shipFromAddress;

    /**
     *
     * @JMS\SerializedName("ShipmentInfos")
     * @JMS\Type("array<ShipmentInfo>")
     * @var ShipmentInfo[]
     */
    private $shipmentInfos;

    /**
     *
     * @JMS\SerializedName("ExtendedAttributes")
     * @JMS\Type("array<ExtendedAttribute>")
     * @var ExtendedAttribute[]
     */
    private $extendedAttributes;

    /**
     *
     * @JMS\SerializedName("ShipmentLines")
     * @JMS\Type("array<ShipmentLine>")
     * @var ShipmentLine[]
     */
    private $shipmentLines;
    
    public function __construct() {
        $this->identifier = new Identifier();
        $this->extendedAttributes = [];
        $this->payments = [];
        $this->shipmentInfos = [];
        $this->shipmentLines = [];
    }

    public function getIdentifier() {
        return $this->identifier;
    }

    public function getReceiverCompanyId() {
        return $this->receiverCompanyId;
    }

    public function getDocumentDate() {
        return $this->documentDate;
    }

    public function getShipmentNumber() {
        return $this->shipmentNumber;
    }

    public function getPartnerPO() {
        return $this->partnerPO;
    }

    public function getOrderDate() {
        return $this->orderDate;
    }

    public function getOrderNumber() {
        return $this->orderNumber;
    }

    public function getBillOfLading() {
        return $this->billOfLading;
    }

    public function getProNumber() {
        return $this->proNumber;
    }

    public function getVendorNumber() {
        return $this->vendorNumber;
    }

    public function getNote() {
        return $this->note;
    }

    public function getExpectedDeliveryDate() {
        return $this->expectedDeliveryDate;
    }

    public function getPayments() {
        return $this->payments;
    }

    public function getShipToAddress() {
        return $this->shipToAddress;
    }

    public function getShipFromAddress() {
        return $this->shipFromAddress;
    }

    public function getShipmentInfos() {
        return $this->shipmentInfos;
    }

    public function getExtendedAttributes() {
        return $this->extendedAttributes;
    }

    public function getShipmentLines() {
        return $this->shipmentLines;
    }

    public function setIdentifier(Identifier $identifier) {
        $this->identifier = $identifier;
        return $this;
    }

    public function setReceiverCompanyId($receiverCompanyId) {
        $this->receiverCompanyId = $receiverCompanyId;
        return $this;
    }

    public function setDocumentDate(DateTime $documentDate) {
        $this->documentDate = $documentDate;
        return $this;
    }

    public function setShipmentNumber($shipmentNumber) {
        $this->shipmentNumber = $shipmentNumber;
        return $this;
    }

    public function setPartnerPO($partnerPO) {
        $this->partnerPO = $partnerPO;
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

    public function setBillOfLading($billOfLading) {
        $this->billOfLading = $billOfLading;
        return $this;
    }

    public function setProNumber($proNumber) {
        $this->proNumber = $proNumber;
        return $this;
    }

    public function setVendorNumber($vendorNumber) {
        $this->vendorNumber = $vendorNumber;
        return $this;
    }

    public function setNote($note) {
        $this->note = $note;
        return $this;
    }

    public function setExpectedDeliveryDate(DateTime $expectedDeliveryDate) {
        $this->expectedDeliveryDate = $expectedDeliveryDate;
        return $this;
    }

    public function setPayments(array $payments) {
        $this->payments = $payments;
        return $this;
    }

    public function setShipToAddress(ShipToAddress $shipToAddress) {
        $this->shipToAddress = $shipToAddress;
        return $this;
    }

    public function setShipFromAddress(ShipFromAddress $shipFromAddress) {
        $this->shipFromAddress = $shipFromAddress;
        return $this;
    }

    public function setShipmentInfos(array $shipmentInfos) {
        $this->shipmentInfos = $shipmentInfos;
        return $this;
    }

    public function setExtendedAttributes(array $extendedAttributes) {
        $this->extendedAttributes = $extendedAttributes;
        return $this;
    }

    public function setShipmentLines(array $shipmentLines) {
        $this->shipmentLines = $shipmentLines;
        return $this;
    }

}
