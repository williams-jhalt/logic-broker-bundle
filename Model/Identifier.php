<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class Identifier {

    /**
     * Used to link the document to the original source document. For example, It is best to supply the Order's linkkey when posting a shipment. This will make sure the order shipped quanitites are updated on the original order and all statuses are updated appropriateley.
     *
     * @JMS\SerializedName("LinkKey")
     * @var string
     */
    private $linkKey;

    /**
     * Identifier that will come from the source system; typically this will match the PartnerPO.
     *
     * @JMS\SerializedName("SourceKey")
     * @var string
     */
    private $sourceKey;

    /**
     * ID to identify the document in the logicbroker system. Required to save this in your system to prevent duplicates.
     *
     * @JMS\SerializedName("LogicbrokerKey")
     * @var string
     */
    private $logicBrokerKey;

    public function getLinkKey() {
        return $this->linkKey;
    }

    public function getSourceKey() {
        return $this->sourceKey;
    }

    public function getLogicBrokerKey() {
        return $this->logicBrokerKey;
    }

    public function setLinkKey($linkKey) {
        $this->linkKey = $linkKey;
        return $this;
    }

    public function setSourceKey($sourceKey) {
        $this->sourceKey = $sourceKey;
        return $this;
    }

    public function setLogicBrokerKey($logicBrokerKey) {
        $this->logicBrokerKey = $logicBrokerKey;
        return $this;
    }

}
