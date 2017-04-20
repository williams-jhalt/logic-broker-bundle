<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class ExtendedAttribute {

    /**
     *
     * @JMS\SerializedName("Name")
     * @var string
     */
    private $name;
    
    /**
     *
     * @JMS\SerializedName("Value")
     * @var string
     */
    private $value;
    
    public function __construct($name = null, $value = value) {
        $this->name = $name;
        $this->value = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function getValue() {
        return $this->value;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setValue($value) {
        $this->value = $value;
        return $this;
    }

}
