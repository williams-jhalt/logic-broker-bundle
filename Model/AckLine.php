<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class AckLine {

    /**
     *
     * @JMS\SerializedName("ItemIdentifier")
     * @JMS\Type("ItemIdentifier")
     * @var ItemIdentifier
     */
    private $itemIdentifier;

    /**
     *
     * @JMS\SerializedName("Type")
     * @var string
     */
    private $type;

    /**
     *
     * @JMS\SerializedName("Price")
     * @var double
     */
    private $price;

    /**
     *
     * @JMS\SerializedName("RetailPrice")
     * @var double
     */
    private $retailPrice;

    /**
     *
     * @JMS\SerializedName("PriceCode")
     * @var string
     */
    private $priceCode;

    /**
     *
     * @JMS\SerializedName("LineNumber")
     * @var int
     */
    private $lineNumber;

    /**
     *
     * @JMS\SerializedName("Quantity")
     * @var int
     */
    private $quantity;

    /**
     *
     * @JMS\SerializedName("QuantityCanceled")
     * @var int
     */
    private $quantityCanceled;

    /**
     *
     * @JMS\SerializedName("QuantityBackordered")
     * @var int
     */
    private $quantityBackordered;

    /**
     *
     * @JMS\SerializedName("QuantityUOM")
     * @var string
     */
    private $quantityUOM;

    /**
     *
     * @JMS\SerializedName("ChangeReason")
     * @var string
     */
    private $changeReason;

    /**
     *
     * @JMS\SerializedName("ExtendedAttributes")
     * @JMS\Type("array<ExtendedAttribute>")
     * @var ExtendedAttribute[]
     */
    private $extendedAttributes;

    public function getItemIdentifier() {
        return $this->itemIdentifier;
    }

    public function getType() {
        return $this->type;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getRetailPrice() {
        return $this->retailPrice;
    }

    public function getPriceCode() {
        return $this->priceCode;
    }

    public function getLineNumber() {
        return $this->lineNumber;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getQuantityCanceled() {
        return $this->quantityCanceled;
    }

    public function getQuantityBackordered() {
        return $this->quantityBackordered;
    }

    public function getQuantityUOM() {
        return $this->quantityUOM;
    }

    public function getChangeReason() {
        return $this->changeReason;
    }

    public function getExtendedAttributes() {
        return $this->extendedAttributes;
    }

    public function setItemIdentifier(ItemIdentifier $itemIdentifier) {
        $this->itemIdentifier = $itemIdentifier;
        return $this;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    public function setRetailPrice($retailPrice) {
        $this->retailPrice = $retailPrice;
        return $this;
    }

    public function setPriceCode($priceCode) {
        $this->priceCode = $priceCode;
        return $this;
    }

    public function setLineNumber($lineNumber) {
        $this->lineNumber = $lineNumber;
        return $this;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
        return $this;
    }

    public function setQuantityCanceled($quantityCanceled) {
        $this->quantityCanceled = $quantityCanceled;
        return $this;
    }

    public function setQuantityBackordered($quantityBackordered) {
        $this->quantityBackordered = $quantityBackordered;
        return $this;
    }

    public function setQuantityUOM($quantityUOM) {
        $this->quantityUOM = $quantityUOM;
        return $this;
    }

    public function setChangeReason($changeReason) {
        $this->changeReason = $changeReason;
        return $this;
    }

    public function setExtendedAttributes(array $extendedAttributes) {
        $this->extendedAttributes = $extendedAttributes;
        return $this;
    }

}
