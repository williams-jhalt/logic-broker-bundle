<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class OrderLine {

    /**
     * Standard short description or name of the product.
     *
     * @JMS\SerializedName("Description")
     * @var string
     */
    private $description;

    /**
     * Unit Price to be charged to the customer or end receiver. This will typically be the value on the packing slip.
     *
     * @JMS\SerializedName("RetailPrice")
     * @var double
     */
    private $retailPrice;

    /**
     * Weight of the product
     *
     * @JMS\SerializedName("Weight")
     * @var double
     */
    private $weight;

    /**
     * Purchase order line number.
     *
     * @JMS\SerializedName("LineNumber")
     * @var int
     */
    private $lineNumber;

    /**
     * Specific Notes related to the product. See specific partner for applicable item level messages.
     *
     * @JMS\SerializedName("Note")
     * @var string
     */
    private $note;

    /**
     * Unit cost that the merchant expects to be billed for each unit fulfilled.
     *
     * @JMS\SerializedName("Price")
     * @var double
     */
    private $price;

    /**
     * Used to indicate the price level for the product. See specific partner details for applicable codes.
     *
     * @JMS\SerializedName("PriceCode")
     * @var double
     */
    private $priceCode;

    /**
     * Contains the quantity of items to be fulfilled.
     *
     * @JMS\SerializedName("Quantity")
     * @var int
     */
    private $quantity;

    /**
     * Unit of Measure for the quantity ordered. See partner's details for specifics.
     *
     * @JMS\SerializedName("QuantityUOM")
     * @var string
     */
    private $quantityUOM;

    /**
     *
     * @JMS\SerializedName("ItemIdentifier")
     * @JMS\Type("ItemIdentifier")
     * @var ItemIdentifier
     */
    private $itemIdentifier;

    /**
     *
     * @JMS\SerializedName("Discounts")
     * @JMS\Type("array<Discount>")
     * @var Discount[]
     */
    private $discounts;

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
     * @JMS\SerializedName("ExtendedAttributes")
     * @JMS\Type("array<ExtendedAttribute>")
     * @var ExtendedAttribute[]
     */
    private $extendedAttributes;

    public function __construct() {
        $this->itemIdentifier = new ItemIdentifier();
        $this->discounts = [];
        $this->extendedAttributes = [];
        $this->shipmentInfos = [];
        $this->taxes = [];
    }

    public function getDescription() {
        return $this->description;
    }

    public function getRetailPrice() {
        return $this->retailPrice;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getLineNumber() {
        return $this->lineNumber;
    }

    public function getNote() {
        return $this->note;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getPriceCode() {
        return $this->priceCode;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getQuantityUOM() {
        return $this->quantityUOM;
    }

    public function getItemIdentifier() {
        return $this->itemIdentifier;
    }

    public function getDiscounts() {
        return $this->discounts;
    }

    public function getShipmentInfos() {
        return $this->shipmentInfos;
    }

    public function getTaxes() {
        return $this->taxes;
    }

    public function getExtendedAttributes() {
        return $this->extendedAttributes;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setRetailPrice($retailPrice) {
        $this->retailPrice = $retailPrice;
        return $this;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
        return $this;
    }

    public function setLineNumber($lineNumber) {
        $this->lineNumber = $lineNumber;
        return $this;
    }

    public function setNote($note) {
        $this->note = $note;
        return $this;
    }

    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    public function setPriceCode($priceCode) {
        $this->priceCode = $priceCode;
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

    public function setItemIdentifier(ItemIdentifier $itemIdentifier) {
        $this->itemIdentifier = $itemIdentifier;
        return $this;
    }

    public function setDiscounts(Discount $discounts) {
        $this->discounts = $discounts;
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

    public function setExtendedAttributes(array $extendedAttributes) {
        $this->extendedAttributes = $extendedAttributes;
        return $this;
    }

}
