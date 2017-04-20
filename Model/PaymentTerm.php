<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class PaymentTerm {

    /** 	
     * Terms discount amount that will be applied within timely payment.
     *
     * @JMS\SerializedName("DiscountAvailable")
     * @var double
     */
    private $discountAvailable;

    /**
     * Discount due date when discount will be applied.
     *
     * @JMS\SerializedName("DiscountDueDate")
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @var DateTime|null
     */
    private $discountDueDate;

    /**
     * Discount days due when discount will be applied.
     *
     * @JMS\SerializedName("DiscountInNumberOfDays")
     * @var int
     */
    private $discountInNumberOfDays;

    /**
     * Date when the Payment terms begin.
     *
     * @JMS\SerializedName("EffectiveDate")
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @var DateTime|null
     */
    private $effectiveDate;

    /**
     * Date in which the invoice is due, before additional charges are accrued.
     *
     * @JMS\SerializedName("DueDate")
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @var DateTime|null
     */
    private $dueDate;

    /**
     * Number of days in which the invoice is due, before additional charges are accrued.
     *
     * @JMS\SerializedName("PayInNumberOfDays")
     * @var int
     */
    private $payInNumberOfDays;

    /**
     * The total amount of discount available if the terms are met.
     *
     * @JMS\SerializedName("AvailableDiscount")
     * @var double
     */
    private $availableDiscount;

    /**
     * Description of the payment terms. This will be a free form description.
     *
     * @JMS\SerializedName("TermsDescription")
     * @var string
     */
    private $termsDescription;

    public function getDiscountAvailable() {
        return $this->discountAvailable;
    }

    public function getDiscountDueDate() {
        return $this->discountDueDate;
    }

    public function getDiscountInNumberOfDays() {
        return $this->discountInNumberOfDays;
    }

    public function getEffectiveDate() {
        return $this->effectiveDate;
    }

    public function getDueDate() {
        return $this->dueDate;
    }

    public function getPayInNumberOfDays() {
        return $this->payInNumberOfDays;
    }

    public function getAvailableDiscount() {
        return $this->availableDiscount;
    }

    public function getTermsDescription() {
        return $this->termsDescription;
    }

    public function setDiscountAvailable($discountAvailable) {
        $this->discountAvailable = $discountAvailable;
        return $this;
    }

    public function setDiscountDueDate(DateTime $discountDueDate) {
        $this->discountDueDate = $discountDueDate;
        return $this;
    }

    public function setDiscountInNumberOfDays($discountInNumberOfDays) {
        $this->discountInNumberOfDays = $discountInNumberOfDays;
        return $this;
    }

    public function setEffectiveDate(DateTime $effectiveDate) {
        $this->effectiveDate = $effectiveDate;
        return $this;
    }

    public function setDueDate(DateTime $dueDate) {
        $this->dueDate = $dueDate;
        return $this;
    }

    public function setPayInNumberOfDays($payInNumberOfDays) {
        $this->payInNumberOfDays = $payInNumberOfDays;
        return $this;
    }

    public function setAvailableDiscount($availableDiscount) {
        $this->availableDiscount = $availableDiscount;
        return $this;
    }

    public function setTermsDescription($termsDescription) {
        $this->termsDescription = $termsDescription;
        return $this;
    }

}
