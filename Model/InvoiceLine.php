<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class InvoiceLine {

    /**
     * Line Number from the Order. If not provided this will be taked from the order automatically.
     *
     * @JMS\SerializedName("LineNumber")
     * @var int
     */
    private $lineNumber;

    /**
     * Unit cost that the merchant is being billed for that line.
     *
     * @JMS\SerializedName("Price")
     * @var double
     */
    private $price;

    /**
     * Used to indicate the price level for the product. See specific partner details for applicable codes.
     *
     * @JMS\SerializedName("PriceCode")
     * @var string
     */
    private $priceCode;

    /**
     * Contains the quantity of items to be invoiced.
     *
     * @JMS\SerializedName("Quantity")
     * @var int
     */
    private $quantity;

    /**
     * Unit of Measure for the quantity invoiced. See partner's details for specifics.
     *
     * @JMS\SerializedName("QuantityUOM")
     * @var string
     */
    private $quantityUOM;

    /**
     * Retail price of the product
     *
     * @JMS\SerializedName("MSRP")
     * @var double
     */
    private $msrp;

    /**
     * Standard short description or name of the product.
     *
     * @JMS\SerializedName("Description")
     * @var string
     */
    private $description;

    /**
     *
     * @JMS\SerializedName("ItemIdentifier")
     * @JMS\Type("ItemIdentifier")
     * @var ItemIdentifier
     */
    private $itemIdentifier;

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
     * @var ExtendedAttributes[]
     */
    private $extendedAttributes;

    public function getLineNumber() {
        return $this->lineNumber;
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

    public function getMsrp() {
        return $this->msrp;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getItemIdentifier() {
        return $this->itemIdentifier;
    }

    public function getTaxes() {
        return $this->taxes;
    }

    public function getExtendedAttributes() {
        return $this->extendedAttributes;
    }

    public function setLineNumber($lineNumber) {
        $this->lineNumber = $lineNumber;
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

    public function setMsrp($msrp) {
        $this->msrp = $msrp;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setItemIdentifier(ItemIdentifier $itemIdentifier) {
        $this->itemIdentifier = $itemIdentifier;
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
