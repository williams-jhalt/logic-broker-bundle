<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class Tax {

    /**
     * Tax Amount to be applied and included in the order total.
     *
     * @JMS\SerializedName("TaxAmount")
     * @var double
     */
    private $taxAmount;

    public function getTaxAmount() {
        return $this->taxAmount;
    }

    public function setTaxAmount($taxAmount) {
        $this->taxAmount = $taxAmount;
        return $this;
    }

}
