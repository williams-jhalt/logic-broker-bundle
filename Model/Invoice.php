<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class Invoice {

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
     * Date of the invoice.
     *
     * @JMS\SerializedName("InvoiceDate")
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @var DateTime
     */
    private $invoiceDate;

    /**
     * Number to identify the unique invoice document.
     *
     * @JMS\SerializedName("InvoiceNumber")
     * @var string
     */
    private $invoiceNumber;

    /**
     * Date the document was created. This field will automatically default with the date the document is created.
     *
     * @JMS\SerializedName("DocumentDate")
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @var DateTime
     */
    private $documentDate;

    /**
     * Date on the Purchase Order
     *
     * @JMS\SerializedName("OrderDate")
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @var DateTime
     */
    private $orderDate;

    /**
     * This will be the purchase order number, this will be the main Key to link all your documents. This should match the order.
     *
     * @JMS\SerializedName("PartnerPO")
     * @var string
     */
    private $partnerPO;

    /**
     * Currency code to identify all values on the invoice. If no value is provided "USD" will be assumed.
     *
     * @JMS\SerializedName("Currency")
     * @var string
     */
    private $currency;

    /**
     * Shipping and handling total to be charged on the invoice, this is part of the invoice total.
     *
     * @JMS\SerializedName("HandlingAmount")
     * @var double
     */
    private $handlingAmount;

    /**
     * Invoice total includes, full amount to be paid including line totals, shipping, taxes and discounts. Will be automatically calculated if no value is provided.
     *
     * @JMS\SerializedName("InvoiceTotal")
     * @var double
     */
    private $invoiceTotal;

    /**
     * Contains the end customer's order number, this will be used on the packing slip.
     *
     * @JMS\SerializedName("OrderNumber")
     * @var string
     */
    private $orderNumber;

    /**
     * This is the internal vendor number provided to the supplier from the merchant. If available it is always recommended to send.
     *
     * @JMS\SerializedName("VendorNumber")
     * @var string
     */
    private $vendorNumber;

    /**
     * This will include any important internal messages or notes on the invoice.
     *
     * @JMS\SerializedName("Note")
     * @var string
     */
    private $note;

    /**
     *
     * @JMS\SerializedName("Discounts")
     * @JMS\Type("array<Discount>")
     * @var Discount[]
     */
    private $discounts;

    /**
     *
     * @JMS\SerializedName("Taxes")
     * @JMS\Type("array<Tax>")
     * @var Tax[]
     */
    private $taxes;

    /**
     *
     * @JMS\SerializedName("PaymentTerm")
     * @JMS\Type("PaymentTerm")
     * @var PaymentTerm
     */
    private $paymentTerm;

    /**
     *
     * @JMS\SerializedName("RemitToAddress")
     * @JMS\Type("Address")
     * @var Address
     */
    private $remitToAddress;

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
     * @JMS\Type("array<ExtendedAttributes>")
     * @var ExtendedAttribute[]
     */
    private $extendAttributes;

    /**
     *
     * @JMS\SerializedName("InvoiceLines")
     * @JMS\Type("array<InvoiceLine>")
     * @var InvoiceLine[]
     */
    private $invoiceLines;
    
    public function __construct() {
        $this->identifier = new Identifier();
        $this->paymentTerm = new PaymentTerm();
        $this->discounts = [];
        $this->taxes = [];
        $this->invoiceLines = [];
        $this->extendAttributes = [];                
    }

    public function getIdentifier() {
        return $this->identifier;
    }

    public function getReceiverCompanyId() {
        return $this->receiverCompanyId;
    }

    public function getInvoiceDate() {
        return $this->invoiceDate;
    }

    public function getInvoiceNumber() {
        return $this->invoiceNumber;
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

    public function getCurrency() {
        return $this->currency;
    }

    public function getHandlingAmount() {
        return $this->handlingAmount;
    }

    public function getInvoiceTotal() {
        return $this->invoiceTotal;
    }

    public function getOrderNumber() {
        return $this->orderNumber;
    }

    public function getVendorNumber() {
        return $this->vendorNumber;
    }

    public function getNote() {
        return $this->note;
    }

    public function getDiscounts() {
        return $this->discounts;
    }

    public function getTaxes() {
        return $this->taxes;
    }

    public function getPaymentTerm() {
        return $this->paymentTerm;
    }

    public function getRemitToAddress() {
        return $this->remitToAddress;
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

    public function getExtendAttributes() {
        return $this->extendAttributes;
    }

    public function getInvoiceLines() {
        return $this->invoiceLines;
    }

    public function setIdentifier(Identifier $identifier) {
        $this->identifier = $identifier;
        return $this;
    }

    public function setReceiverCompanyId($receiverCompanyId) {
        $this->receiverCompanyId = $receiverCompanyId;
        return $this;
    }

    public function setInvoiceDate(DateTime $invoiceDate) {
        $this->invoiceDate = $invoiceDate;
        return $this;
    }

    public function setInvoiceNumber($invoiceNumber) {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    public function setDocumentDate(DateTime $documentDate) {
        $this->documentDate = $documentDate;
        return $this;
    }

    public function setOrderDate(DateTime $orderDate) {
        $this->orderDate = $orderDate;
        return $this;
    }

    public function setPartnerPO($partnerPO) {
        $this->partnerPO = $partnerPO;
        return $this;
    }

    public function setCurrency($currency) {
        $this->currency = $currency;
        return $this;
    }

    public function setHandlingAmount($handlingAmount) {
        $this->handlingAmount = $handlingAmount;
        return $this;
    }

    public function setInvoiceTotal($invoiceTotal) {
        $this->invoiceTotal = $invoiceTotal;
        return $this;
    }

    public function setOrderNumber($orderNumber) {
        $this->orderNumber = $orderNumber;
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

    public function setDiscounts(array $discounts) {
        $this->discounts = $discounts;
        return $this;
    }

    public function setTaxes(array $taxes) {
        $this->taxes = $taxes;
        return $this;
    }

    public function setPaymentTerm(PaymentTerm $paymentTerm) {
        $this->paymentTerm = $paymentTerm;
        return $this;
    }

    public function setRemitToAddress(RemitToAddress $remitToAddress) {
        $this->remitToAddress = $remitToAddress;
        return $this;
    }

    public function setBillToAddress(BillToAddress $billToAddress) {
        $this->billToAddress = $billToAddress;
        return $this;
    }

    public function setOrderedByAddress(OrderedByAddress $orderedByAddress) {
        $this->orderedByAddress = $orderedByAddress;
        return $this;
    }

    public function setShipToAddress(ShipToAddress $shipToAddress) {
        $this->shipToAddress = $shipToAddress;
        return $this;
    }

    public function setExtendAttributes(array $extendAttributes) {
        $this->extendAttributes = $extendAttributes;
        return $this;
    }

    public function setInvoiceLines(array $invoiceLines) {
        $this->invoiceLines = $invoiceLines;
        return $this;
    }

}
