<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class ItemIdentifier {

    /**
     * International Standard Book Number
     *
     * @JMS\SerializedName("ISBN")
     * @var string
     */
    private $isbn;
    
    /**
     * Manufacturer's ID for the product.
     *
     * @JMS\SerializedName("ManufacturerSKU")
     * @var string
     */
    private $manufacturerSKU;
    
    /**
     * The Item identifier that is internal to the purchaser/merchant.
     *
     * @JMS\SerializedName("PartnerSKU")
     * @var string
     */
    private $partnerSKU;
    
    /**
     * The Item Identifier that is used by the supplier or the person fulfilling the product.
     *
     * @JMS\SerializedName("SupplierSKU")
     * @var string
     */
    private $supplierSKU;
    
    /**
     * Typically the U.P.C Consumer Package code will be provided; however additional standardized codes can be provided here as well. See specific partner instructions for details.
     *
     * @JMS\SerializedName("UPC")
     * @var string
     */
    private $upc;

    public function getIsbn() {
        return $this->isbn;
    }

    public function getManufacturerSKU() {
        return $this->manufacturerSKU;
    }

    public function getPartnerSKU() {
        return $this->partnerSKU;
    }

    public function getSupplierSKU() {
        return $this->supplierSKU;
    }

    public function getUpc() {
        return $this->upc;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
        return $this;
    }

    public function setManufacturerSKU($manufacturerSKU) {
        $this->manufacturerSKU = $manufacturerSKU;
        return $this;
    }

    public function setPartnerSKU($partnerSKU) {
        $this->partnerSKU = $partnerSKU;
        return $this;
    }

    public function setSupplierSKU($supplierSKU) {
        $this->supplierSKU = $supplierSKU;
        return $this;
    }

    public function setUpc($upc) {
        $this->upc = $upc;
        return $this;
    }

}
