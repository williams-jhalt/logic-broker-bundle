<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class ShipmentInfo {

    /**
     * This will typically be the Standard Carrier Alpha Code (SCAC).
     *
     * @JMS\SerializedName("CarrierCode")
     * @var string
     */
    private $carrierCode;

    /**
     * The shipping method that will be used to send the merchandise. This is a free form field and can include UPS Ground, or Overnight, etc.
     *
     * @JMS\SerializedName("ClassCode")
     * @var string
     */
    private $classCode;

    /**
     * Service Level set to ship by the carrier. Check with trading partner to see applicable codes. An example of a few would be:
     * ND = Next Day
     * CG = Ground
     * ON = Overnight
     * SA = Same Day
     *
     * @JMS\SerializedName("ServiceLevelCode")
     * @var string
     */
    private $serviceLevelCode;

    /**
     * Shipping amount to be applied to this item.
     *
     * @JMS\SerializedName("ShipmentCost")
     * @var double
     */
    private $shipmentCost;

    /**
     * Total weight of the package or carton.
     *
     * @JMS\SerializedName("Weight")
     * @var double
     */
    private $weight;

    /**
     * Weight Unit of Measure for the package or carton.
     *
     * @JMS\SerializedName("WeightUnit")
     * @var string
     */
    private $weightUnit;

    /**
     * SSCC-18 and Application Identifier to be used to identify the pallet. If not provided the tracking number can be used. To identify what cartons belong to the pallet, you will need to enter this value in the "ParentContainerCode" under the "ShipmentInfos" (containers) on the line level.
     *
     * @JMS\SerializedName("ContainerCode")
     * @var string
     */
    private $containerCode;

    /**
     * Use "PLT" to Specify Pallet
     *
     * @JMS\SerializedName("ContainerType")
     * @var string
     */
    private $containerType;

    /**
     *
     * @JMS\SerializedName("TrackingNumber")
     * @var string
     */
    private $trackingNumber;

    /**
     * Length of the container or package.
     *
     * @JMS\SerializedName("Length")
     * @var double
     */
    private $length;

    /**
     * Width of the container or package.
     *
     * @JMS\SerializedName("Width")
     * @var double
     */
    private $width;

    /**
     * Height of the container or package. Should be provided in inches.
     *
     * @JMS\SerializedName("Height")
     * @var double
     */
    private $height;

    /**
     * Dimension unit of measure used for Length, Height and Width.
     *
     * @JMS\SerializedName("DimensionUnit")
     * @var string
     */
    private $dimensionUnit;

    /**
     * Date the package was shipped. This will updated all header DateShipped values.
     *
     * @JMS\SerializedName("DateShipped")
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @var DateTime
     */
    private $dateShipped;

    /**
     * Total Qty of the product within the package or container. This quantity will be summed up across all containers and the total will be supplied on the item level "Quantity" field.
     *
     * @JMS\SerializedName("Qty")
     * @var int
     */
    private $qty;

    /**
     * SSCC-18 and Application Identifier to be used to identify the pallet. If you are shipping a pallet and need to identify which cartons belong to it, this value needs to match the container code provided on the pallet in the header level "ShipmentInfo"
     *
     * @JMS\SerializedName("ShipmentContainerParentCode")
     * @var string
     */
    private $shipmentContainerParentCode;

    public function getCarrierCode() {
        return $this->carrierCode;
    }

    public function getClassCode() {
        return $this->classCode;
    }

    public function getServiceLevelCode() {
        return $this->serviceLevelCode;
    }

    public function getShipmentCost() {
        return $this->shipmentCost;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getWeightUnit() {
        return $this->weightUnit;
    }

    public function getContainerCode() {
        return $this->containerCode;
    }

    public function getContainerType() {
        return $this->containerType;
    }

    public function getTrackingNumber() {
        return $this->trackingNumber;
    }

    public function getLength() {
        return $this->length;
    }

    public function getWidth() {
        return $this->width;
    }

    public function getHeight() {
        return $this->height;
    }

    public function getDimensionUnit() {
        return $this->dimensionUnit;
    }

    public function getDateShipped() {
        return $this->dateShipped;
    }

    public function getQty() {
        return $this->qty;
    }

    public function getShipmentContainerParentCode() {
        return $this->shipmentContainerParentCode;
    }

    public function setCarrierCode($carrierCode) {
        $this->carrierCode = $carrierCode;
        return $this;
    }

    public function setClassCode($classCode) {
        $this->classCode = $classCode;
        return $this;
    }

    public function setServiceLevelCode($serviceLevelCode) {
        $this->serviceLevelCode = $serviceLevelCode;
        return $this;
    }

    public function setShipmentCost($shipmentCost) {
        $this->shipmentCost = $shipmentCost;
        return $this;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
        return $this;
    }

    public function setWeightUnit($weightUnit) {
        $this->weightUnit = $weightUnit;
        return $this;
    }

    public function setContainerCode($containerCode) {
        $this->containerCode = $containerCode;
        return $this;
    }

    public function setContainerType($containerType) {
        $this->containerType = $containerType;
        return $this;
    }

    public function setTrackingNumber($trackingNumber) {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }

    public function setLength($length) {
        $this->length = $length;
        return $this;
    }

    public function setWidth($width) {
        $this->width = $width;
        return $this;
    }

    public function setHeight($height) {
        $this->height = $height;
        return $this;
    }

    public function setDimensionUnit($dimensionUnit) {
        $this->dimensionUnit = $dimensionUnit;
        return $this;
    }

    public function setDateShipped(DateTime $dateShipped) {
        $this->dateShipped = $dateShipped;
        return $this;
    }

    public function setQty($qty) {
        $this->qty = $qty;
        return $this;
    }

    public function setShipmentContainerParentCode($shipmentContainerParentCode) {
        $this->shipmentContainerParentCode = $shipmentContainerParentCode;
        return $this;
    }

}
