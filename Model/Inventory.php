<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class Inventory {

    /**
     *
     * @JMS\SerializedName("SupplierSKU")
     * @var string
     */
    private $supplierSKU;

    /**
     *
     * @JMS\SerializedName("MerchantSKU")
     * @var string
     */
    private $merchantSKU;

    /**
     *
     * @JMS\SerializedName("UPC")
     * @var string
     */
    private $upc;

    /**
     *
     * @JMS\SerializedName("ManufacturerSKU")
     * @var string
     */
    private $manufacturerSKU;

    /**
     *
     * @JMS\SerializedName("Quantity")
     * @var int
     */
    private $quantity;

    /**
     *
     * @JMS\SerializedName("Cost")
     * @var double
     */
    private $cost;

    /**
     *
     * @JMS\SerializedName("MSRP")
     * @var double
     */
    private $msrp;

    /**
     *
     * @JMS\SerializedName("RetailPrice")
     * @var double
     */
    private $retailPrice;

    /**
     *
     * @JMS\SerializedName("Description")
     * @var string
     */
    private $description;

    /**
     *
     * @JMS\SerializedName("Size")
     * @var string
     */
    private $size;

    /**
     *
     * @JMS\SerializedName("Color")
     * @var string
     */
    private $color;

    /**
     *
     * @JMS\SerializedName("Style")
     * @var string
     */
    private $style;

    /**
     *
     * @JMS\SerializedName("Weight")
     * @var doule
     */
    private $weight;

    /**
     *
     * @JMS\SerializedName("Warehouse")
     * @var string
     */
    private $warehouse;

    public function getSupplierSKU() {
        return $this->supplierSKU;
    }

    public function getMerchantSKU() {
        return $this->merchantSKU;
    }

    public function getUpc() {
        return $this->upc;
    }

    public function getManufacturerSKU() {
        return $this->manufacturerSKU;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getCost() {
        return $this->cost;
    }

    public function getMsrp() {
        return $this->msrp;
    }

    public function getRetailPrice() {
        return $this->retailPrice;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getSize() {
        return $this->size;
    }

    public function getColor() {
        return $this->color;
    }

    public function getStyle() {
        return $this->style;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getWarehouse() {
        return $this->warehouse;
    }

    public function setSupplierSKU($supplierSKU) {
        $this->supplierSKU = $supplierSKU;
        return $this;
    }

    public function setMerchantSKU($merchantSKU) {
        $this->merchantSKU = $merchantSKU;
        return $this;
    }

    public function setUpc($upc) {
        $this->upc = $upc;
        return $this;
    }

    public function setManufacturerSKU($manufacturerSKU) {
        $this->manufacturerSKU = $manufacturerSKU;
        return $this;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
        return $this;
    }

    public function setCost($cost) {
        $this->cost = $cost;
        return $this;
    }

    public function setMsrp($msrp) {
        $this->msrp = $msrp;
        return $this;
    }

    public function setRetailPrice($retailPrice) {
        $this->retailPrice = $retailPrice;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setSize($size) {
        $this->size = $size;
        return $this;
    }

    public function setColor($color) {
        $this->color = $color;
        return $this;
    }

    public function setStyle($style) {
        $this->style = $style;
        return $this;
    }

    public function setWeight(doule $weight) {
        $this->weight = $weight;
        return $this;
    }

    public function setWarehouse($warehouse) {
        $this->warehouse = $warehouse;
        return $this;
    }

}
