<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class Discount {

    /**
     * Discount amount to be applied and included in the order total.
     *
     * @JMS\SerializedName("DiscountAmount")
     * @var double
     */
    private $discountAmount;
    
    /**
     * Promotional/Deal Number or Code
     *
     * @JMS\SerializedName("DiscountCode")
     * @var string
     */
    private $discountCode;
    
    /**
     * Terms Discount Percent to calculate applicable discount amount for timely payment
     *
     * @JMS\SerializedName("DiscountPercent")
     * @var double
     */
    private $discountPercent;

    public function getDiscountAmount() {
        return $this->discountAmount;
    }

    public function getDiscountCode() {
        return $this->discountCode;
    }

    public function getDiscountPercent() {
        return $this->discountPercent;
    }

    public function setDiscountAmount($discountAmount) {
        $this->discountAmount = $discountAmount;
        return $this;
    }

    public function setDiscountCode($discountCode) {
        $this->discountCode = $discountCode;
        return $this;
    }

    public function setDiscountPercent($discountPercent) {
        $this->discountPercent = $discountPercent;
        return $this;
    }

}
