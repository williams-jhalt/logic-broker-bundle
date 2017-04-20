<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class ShipmentLine {

    /**
     * Line Number from the Order. If not provided this will be taked from the order automatically.
     *
     * @JMS\SerializedName("LineNumber")
     * @var int
     */
    private $lineNumber;

    /**
     *
     * @JMS\SerializedName("ItemIdentifier")
     * @JMS\Type("ItemIdentifier")
     * @var ItemIdentifier
     */
    private $itemIdentifier;

    /**
     * Standard short description or name of the product.
     *
     * @JMS\SerializedName("Description")
     * @var string
     */
    private $description;

    /**
     * Will be copied from the QTY Shipped provided under Shipment Infos.
     *
     * @JMS\SerializedName("Quantity")
     * @var int
     */
    private $quantity;

    /**
     * Unit of measure to identify the quantity in the container or package.
     *
     * @JMS\SerializedName("QuantityUOM")
     * @var string
     */
    private $quantityUOM;

    /**
     * Unit cost that the merchant expects to be billed for each unit fulfilled.
     *
     * @JMS\SerializedName("Price")
     * @var double
     */
    private $price;

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

    public function getLineNumber() {
        return $this->lineNumber;
    }

    public function getItemIdentifier() {
        return $this->itemIdentifier;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getQuantityUOM() {
        return $this->quantityUOM;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getShipmentInfos() {
        return $this->shipmentInfos;
    }

    public function getExtendedAttributes() {
        return $this->extendedAttributes;
    }

    public function setLineNumber($lineNumber) {
        $this->lineNumber = $lineNumber;
        return $this;
    }

    public function setItemIdentifier(ItemIdentifier $itemIdentifier) {
        $this->itemIdentifier = $itemIdentifier;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
        return $this;
    }

    public function setQuantityUOM($quantityUOM) {
        $this->quantityUOM = $quantityUOM;
        return $this;
    }

    public function setPrice($price) {
        $this->price = $price;
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

}
