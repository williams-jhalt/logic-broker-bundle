<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class Acknowledgement {

    /**
     *
     * @JMS\SerializedName("Identifier")
     * @JMS\Type("Identifier")
     * @var Identifier
     */
    private $identifier;

    /**
     *
     * @JMS\SerializedName("SenderCompanyId")
     * @var string
     */
    private $senderCompanyId;

    /**
     *
     * @JMS\SerializedName("ReceiverCompanyId")
     * @var string
     */
    private $receiverCompanyId;

    /**
     *
     * @JMS\SerializedName("StatusCode")
     * @var string
     */
    private $statusCode;

    /**
     *
     * @JMS\SerializedName("Type")
     * @var string
     */
    private $type;

    /**
     *
     * @JMS\SerializedName("OrderNumber")
     * @var string
     */
    private $orderNumber;

    /**
     *
     * @JMS\SerializedName("PartnerPO")
     * @var string
     */
    private $partnerPO;

    /**
     *
     * @JMS\SerializedName("OrderDate")
     * @JMS\Type("DateTime<'c'>")
     * @var DateTime
     */
    private $orderDate;

    /**
     *
     * @JMS\SerializedName("AcknowledgementNumber")
     * @var string
     */
    private $acknowledgementNumber;

    /**
     *
     * @JMS\SerializedName("VendorNumber")
     * @var string
     */
    private $vendorNumber;

    /**
     *
     * @JMS\SerializedName("ChangeReason")
     * @var string
     */
    private $changeReason;

    /**
     *
     * @JMS\SerializedName("ScheduledShipDate")
     * @JMS\Type("DateTime<'c'>")
     * @var DateTime
     */
    private $scheduledShipDate;

    /**
     *
     * @JMS\SerializedName("DocumentDate")
     * @JMS\Type("DateTime<'c'>")
     * @var DateTime
     */
    private $documentDate;

    /**
     *
     * @JMS\SerializedName("ShipToAddress")
     * @JMS\Type("Address")
     * @var Address
     */
    private $shipToAddress;

    /**
     *
     * @JMS\SerializedName("BillToAddress")
     * @JMS\Type("Address")
     * @var Address
     */
    private $billToAddress;

    /**
     *
     * @JMS\SerializedName("ExtendedAttributes")
     * @JMS\Type("array<ExtendedAttribute>")
     * @var ExtendedAttribute[]
     */
    private $extendedAttributes;

    /**
     *
     * @JMS\SerializedName("AckLines")
     * @JMS\Type("array<AckLine>")
     * @var AckLine[]
     */
    private $ackLines;

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

    public function getType() {
        return $this->type;
    }

    public function getOrderNumber() {
        return $this->orderNumber;
    }

    public function getPartnerPO() {
        return $this->partnerPO;
    }

    public function getOrderDate() {
        return $this->orderDate;
    }

    public function getAcknowledgementNumber() {
        return $this->acknowledgementNumber;
    }

    public function getVendorNumber() {
        return $this->vendorNumber;
    }

    public function getChangeReason() {
        return $this->changeReason;
    }

    public function getScheduledShipDate() {
        return $this->scheduledShipDate;
    }

    public function getDocumentDate() {
        return $this->documentDate;
    }

    public function getShipToAddress() {
        return $this->shipToAddress;
    }

    public function getBillToAddress() {
        return $this->billToAddress;
    }

    public function getExtendedAttributes() {
        return $this->extendedAttributes;
    }

    public function getAckLines() {
        return $this->ackLines;
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

    public function setType($type) {
        $this->type = $type;
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

    public function setOrderDate(DateTime $orderDate) {
        $this->orderDate = $orderDate;
        return $this;
    }

    public function setAcknowledgementNumber($acknowledgementNumber) {
        $this->acknowledgementNumber = $acknowledgementNumber;
        return $this;
    }

    public function setVendorNumber($vendorNumber) {
        $this->vendorNumber = $vendorNumber;
        return $this;
    }

    public function setChangeReason($changeReason) {
        $this->changeReason = $changeReason;
        return $this;
    }

    public function setScheduledShipDate(DateTime $scheduledShipDate) {
        $this->scheduledShipDate = $scheduledShipDate;
        return $this;
    }

    public function setDocumentDate(DateTime $documentDate) {
        $this->documentDate = $documentDate;
        return $this;
    }

    public function setShipToAddress(Address $shipToAddress) {
        $this->shipToAddress = $shipToAddress;
        return $this;
    }

    public function setBillToAddress(Address $billToAddress) {
        $this->billToAddress = $billToAddress;
        return $this;
    }

    public function setExtendedAttributes(array $extendedAttributes) {
        $this->extendedAttributes = $extendedAttributes;
        return $this;
    }

    public function setAckLines(array $ackLines) {
        $this->ackLines = $ackLines;
        return $this;
    }

}
