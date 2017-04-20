<?php

namespace Williams\LogicBrokerBundle\Adapter;

use DateTime;
use SplFileObject;
use Williams\LogicBrokerBundle\Model\Discount;
use Williams\LogicBrokerBundle\Model\ExtendedAttribute;
use Williams\LogicBrokerBundle\Model\Order;
use Williams\LogicBrokerBundle\Model\OrderLine;
use Williams\LogicBrokerBundle\Model\ShipmentInfo;
use Williams\LogicBrokerBundle\Model\Tax;

class CsvOrderAdapter {

    /**
     *
     * @var Order[]
     */
    private $orders;

    public function __construct() {
        $this->orders = [];
    }

    /**
     * 
     * @param SplFileObject $file
     * @return Order[]
     */
    public function read(SplFileObject $file) {

        $mapping = [];

        $headerRow = true;

        while (!$file->eof()) {

            $row = $file->fgetcsv();

            if ($headerRow) {
                foreach ($row as $key => $value) {
                    $mapping[$value] = $key;
                }
                $headerRow = false;
                continue;
            }

            if (array_key_exists($row[$mapping['Id']], $this->orders)) {
                $order = $this->orders[$row[$mapping['Id']]];
            } else {
                $order = new Order();
            }

            $discount = new Discount();
            $tax = new Tax();
            $shipmentInfo = new ShipmentInfo();
            $orderLine = new OrderLine();

            $order->getIdentifier()->setLogicBrokerKey($row[$mapping['Id']]);

            if (isset($mapping['Identifier.LinkKey'])) {
                $order->getIdentifier()->setLinkKey($row[$mapping['Identifier.LinkKey']]);
            }

            $order->setSenderCompanyId($row[$mapping['SenderCompanyId']]);

            $order->setDocumentDate(new DateTime($row[$mapping['DocumentDate']]));

            if (isset($mapping['Currency'])) {
                $order->setCurrency($row[$mapping['Currency']]);
            }

            if (isset($mapping['CustomerNumber'])) {
                $order->setCustomerNumber($row[$mapping['CustomerNumber']]);
            }

            if (isset($mapping['DoNotShipAfter'])) {
                $order->setDoNotShipAfter(new DateTime($row[$mapping['DoNotShipAfter']]));
            }

            if (isset($mapping['HandlingAmount'])) {
                $order->setHandlingAmount($row[$mapping['HandlingAmount']]);
            }

            if (isset($mapping['Note'])) {
                $order->setNote($row[$mapping['Note']]);
            }

            $order->setOrderDate(new DateTime($row[$mapping['OrderDate']]));

            $order->setOrderNumber($row[$mapping['OrderNumber']]);

            $order->setPartnerPO($row[$mapping['PartnerPO']]);

            if (isset($mapping['TypeCode'])) {
                $order->setTypeCode($row[$mapping['TypeCode']]);
            }

            if (isset($mapping['ReleaseNumber'])) {
                $order->setReleaseNumber($row[$mapping['ReleaseNumber']]);
            }

            if (isset($mapping['RequestedShipDate'])) {
                $order->setRequestedShipDate(new DateTime($row[$mapping['RequestedShipDate']]));
            }

            if (isset($mapping['SalesRequirement'])) {
                $order->setSalesRequirement($row[$mapping['SalesRequirement']]);
            }

            if (isset($mapping['VendorNumber'])) {
                $order->setVendorNumber($row[$mapping['VendorNumber']]);
            }

            $discountSet = false;

            if (isset($mapping['Discount.DiscountAmount'])) {
                $discount->setDiscountAmount($row[$mapping['Discount.DiscountAmount']]);
                $discountSet = true;
            }

            if (isset($mapping['Discount.DiscountCode'])) {
                $discount->setDiscountCode($row[$mapping['Discount.DiscountCode']]);
                $discountSet = true;
            }

            if (isset($mapping['Discount.DiscountPercent'])) {
                $discount->setDiscountPercent($row[$mapping['Discount.DiscountPercent']]);
                $discountSet = true;
            }

            if ($discountSet) {
                $discounts = $order->getDiscounts();
                $discounts[] = $discount;
                $order->setDiscounts($discounts);
            }

            if (isset($mapping['PaymentTerm.DiscountAvailable'])) {
                $order->getPaymentTerm()->setDiscountAvailable($row[$mapping['PaymentTerm.DiscountAvailable']]);
            }

            if (isset($mapping['PaymentTerm.DiscountDueDate'])) {
                $order->getPaymentTerm()->setDiscountDueDate(new DateTime($row[$mapping['PaymentTerm.DiscountDueDate']]));
            }

            if (isset($mapping['PaymentTerm.DiscountInNumberOfDays'])) {
                $order->getPaymentTerm()->setDiscountInNumberOfDays($row[$mapping['PaymentTerm.DiscountInNumberOfDays']]);
            }

            if (isset($mapping['PaymentTerm.EffectiveDate'])) {
                $order->getPaymentTerm()->setEffectiveDate(new DateTime($row[$mapping['PaymentTerm.EffectiveDate']]));
            }

            if (isset($mapping['PaymentTerm.DueDate'])) {
                $order->getPaymentTerm()->setDueDate(new DateTime($row[$mapping['PaymentTerm.DueDate']]));
            }

            if (isset($mapping['PaymentTerm.PayInNumberOfDays'])) {
                $order->getPaymentTerm()->setPayInNumberOfDays($row[$mapping['PaymentTerm.PayInNumberOfDays']]);
            }

            if (isset($mapping['ShipmentInfo.CarrierCode'])) {
                $shipmentInfo->setCarrierCode($row[$mapping['ShipmentInfo.CarrierCode']]);
            }

            $shipmentInfo->setClassCode($row[$mapping['ShipmentInfo.ClassCode']]);

            if (isset($mapping['ShippingInfo.ServiceLevelCode'])) {
                $shipmentInfo->setServiceLevelCode($row[$mapping['ShipmentInfo.ServiceLevelCode']]);
            }

            $shipmentInfos = $order->getShipmentInfos();
            $shipmentInfos[] = $shipmentInfo;
            $order->setShipmentInfos($shipmentInfos);

            if (isset($mapping['Taxes.TaxAmount'])) {
                $tax->setTaxAmount($row[$mapping['Taxes.TaxAmount']]);
                $taxes = $order->getTaxes();
                $taxes[] = $tax;
                $order->setTaxes($taxes);
            }

            $order->getBillToAddress()->setCompanyName($row[$mapping['BillToAddress.CompanyName']]);

            if (isset($mapping['BillToAddress.FirstName'])) {
                $order->getBillToAddress()->setFirstName($row[$mapping['BillToAddress.FirstName']]);
            }

            if (isset($mapping['BillToAddress.LastName'])) {
                $order->getBillToAddress()->setLastName($row[$mapping['BillToAddress.LastName']]);
            }

            $order->getBillToAddress()->setAddress1($row[$mapping['BillToAddress.Address1']]);

            if (isset($mapping['BillToAddress.Address2'])) {
                $order->getBillToAddress()->setAddress2($row[$mapping['BillToAddress.Address2']]);
            }

            $order->getBillToAddress()->setCity($row[$mapping['BillToAddress.City']]);

            $order->getBillToAddress()->setState($row[$mapping['BillToAddress.State']]);

            if (isset($mapping['BillToAddress.Country'])) {
                $order->getBillToAddress()->setCountry($row[$mapping['BillToAddress.Country']]);
            }

            $order->getBillToAddress()->setZip($row[$mapping['BillToAddress.Zip']]);

            if (isset($mapping['BillToAddress.AddressCode'])) {
                $order->getBillToAddress()->setAddressCode($row[$mapping['BillToAddress.AddressCode']]);
            }

            if (isset($mapping['BillToAddress.Phone'])) {
                $order->getBillToAddress()->setPhone($row[$mapping['BillToAddress.Phone']]);
            }

            if (isset($mapping['BillToAddress.Email'])) {
                $order->getBillToAddress()->setEmail($row[$mapping['BillToAddress.Email']]);
            }


            if (isset($mapping['OrderedByAddress.CompanyName'])) {
                $order->getOrderedByAddress()->setCompanyName($row[$mapping['OrderedByAddress.CompanyName']]);
            }

            if (isset($mapping['OrderedByAddress.FirstName'])) {
                $order->getOrderedByAddress()->setFirstName($row[$mapping['OrderedByAddress.FirstName']]);
            }

            if (isset($mapping['OrderedByAddress.LastName'])) {
                $order->getOrderedByAddress()->setLastName($row[$mapping['OrderedByAddress.LastName']]);
            }

            if (isset($mapping['OrderedByAddress.Address1'])) {
                $order->getOrderedByAddress()->setAddress1($row[$mapping['OrderedByAddress.Address1']]);
            }

            if (isset($mapping['OrderedByAddress.Address2'])) {
                $order->getOrderedByAddress()->setAddress2($row[$mapping['OrderedByAddress.Address2']]);
            }

            if (isset($mapping['OrderedByAddress.City'])) {
                $order->getOrderedByAddress()->setCity($row[$mapping['OrderedByAddress.City']]);
            }

            if (isset($mapping['OrderedByAddress.State'])) {
                $order->getOrderedByAddress()->setState($row[$mapping['OrderedByAddress.State']]);
            }

            if (isset($mapping['OrderedByAddress.Country'])) {
                $order->getOrderedByAddress()->setCountry($row[$mapping['OrderedByAddress.Country']]);
            }

            if (isset($mapping['OrderedByAddress.Zip'])) {
                $order->getOrderedByAddress()->setZip($row[$mapping['OrderedByAddress.Zip']]);
            }

            if (isset($mapping['OrderedByAddress.AddressCode'])) {
                $order->getOrderedByAddress()->setAddressCode($row[$mapping['OrderedByAddress.AddressCode']]);
            }

            if (isset($mapping['OrderedByAddress.Phone'])) {
                $order->getOrderedByAddress()->setPhone($row[$mapping['OrderedByAddress.Phone']]);
            }

            if (isset($mapping['OrderedByAddress.Email'])) {
                $order->getOrderedByAddress()->setEmail($row[$mapping['OrderedByAddress.Email']]);
            }



            $order->getShipToAddress()->setCompanyName($row[$mapping['ShipToAddress.CompanyName']]);

            if (isset($mapping['ShipToAddress.FirstName'])) {
                $order->getShipToAddress()->setFirstName($row[$mapping['ShipToAddress.FirstName']]);
            }

            if (isset($mapping['ShipToAddress.LastName'])) {
                $order->getShipToAddress()->setLastName($row[$mapping['ShipToAddress.LastName']]);
            }

            $order->getShipToAddress()->setAddress1($row[$mapping['ShipToAddress.Address1']]);

            if (isset($mapping['ShipToAddress.Address2'])) {
                $order->getShipToAddress()->setAddress2($row[$mapping['ShipToAddress.Address2']]);
            }

            $order->getShipToAddress()->setCity($row[$mapping['ShipToAddress.City']]);

            $order->getShipToAddress()->setState($row[$mapping['ShipToAddress.State']]);

            if (isset($mapping['ShipToAddress.Country'])) {
                $order->getShipToAddress()->setCountry($row[$mapping['ShipToAddress.Country']]);
            }

            $order->getShipToAddress()->setZip($row[$mapping['ShipToAddress.Zip']]);

            if (isset($mapping['ShipToAddress.AddressCode'])) {
                $order->getShipToAddress()->setAddressCode($row[$mapping['ShipToAddress.AddressCode']]);
            }

            if (isset($mapping['ShipToAddress.Phone'])) {
                $order->getShipToAddress()->setPhone($row[$mapping['ShipToAddress.Phone']]);
            }

            if (isset($mapping['ShipToAddress.Email'])) {
                $order->getShipToAddress()->setEmail($row[$mapping['ShipToAddress.Email']]);
            }

            $extendedAttributes = $order->getExtendedAttributes();

            if (isset($mapping['ExtendedAttribute.StoreNumber'])) {
                $extendedAttributes[] = new ExtendedAttribute('StoreNumber', $row[$mapping['ExtendedAttribute.StoreNumber']]);
            }

            if (isset($mapping['ExtendedAttribute.InternalOrderNumber'])) {
                $extendedAttributes[] = new ExtendedAttribute('InternalOrderNumber', $row[$mapping['ExtendedAttribute.InternalOrderNumber']]);
            }

            if (isset($mapping['ExtendedAttribute.GiftWrap'])) {
                $extendedAttributes[] = new ExtendedAttribute('GiftWrap', $row[$mapping['ExtendedAttribute.GiftWrap']]);
            }

            if (isset($mapping['ExtendedAttribute.MiscCharge'])) {
                $extendedAttributes[] = new ExtendedAttribute('MiscCharge', $row[$mapping['ExtendedAttribute.MiscCharge']]);
            }

            if (isset($mapping['ExtendedAttribute.CustomerDiscount'])) {
                $extendedAttributes[] = new ExtendedAttribute('CustomerDiscount', $row[$mapping['ExtendedAttribute.CustomerDiscount']]);
            }

            if (isset($mapping['ExtendedAttribute.CustomerShipping'])) {
                $extendedAttributes[] = new ExtendedAttribute('CustomerShipping', $row[$mapping['ExtendedAttribute.CustomerShipping']]);
            }

            if (isset($mapping['ExtendedAttribute.CustomerTax'])) {
                $extendedAttributes[] = new ExtendedAttribute('CustomerTax', $row[$mapping['ExtendedAttribute.CustomerTax']]);
            }

            if (isset($mapping['ExtendedAttribute.CustomerMiscCharge'])) {
                $extendedAttributes[] = new ExtendedAttribute('CustomerMiscCharge', $row[$mapping['ExtendedAttribute.CustomerMiscCharge']]);
            }

            if (isset($mapping['ExtendedAttribute.CustomerOrderDate'])) {
                $extendedAttributes[] = new ExtendedAttribute('CustomerOrderDate', $row[$mapping['ExtendedAttribute.CustomerOrderDate']]);
            }

            $order->setExtendedAttributes($extendedAttributes);

            if (isset($mapping['OrderLine.Description'])) {
                $orderLine->setDescription($row[$mapping['OrderLine.Description']]);
            }

            if (isset($mapping['OrderLine.RetailPrice'])) {
                $orderLine->setRetailPrice($row[$mapping['OrderLine.RetailPrice']]);
            }

            if (isset($mapping['OrderLine.Weight'])) {
                $orderLine->setWeight($row[$mapping['OrderLine.Weight']]);
            }

            $orderLine->setLineNumber($row[$mapping['OrderLine.LineNumber']]);

            if (isset($mapping['OrderLine.Note'])) {
                $orderLine->setNote($row[$mapping['OrderLine.Note']]);
            }

            if (isset($mapping['OrderLine.Price'])) {
                $orderLine->setPrice($row[$mapping['OrderLine.Price']]);
            }

            if (isset($mapping['OrderLine.PriceCode'])) {
                $orderLine->setPriceCode($row[$mapping['OrderLine.PriceCode']]);
            }

            $orderLine->setQuantity($row[$mapping['OrderLine.Quantity']]);

            $orderLine->setQuantityUOM($row[$mapping['OrderLine.QuantityUOM']]);

            if (isset($mapping['OrderLine.ItemIdentifier.ISBN'])) {
                $orderLine->getItemIdentifier()->setIsbn($row[$mapping['OrderLine.ItemIdentifier.ISBN']]);
            }

            if (isset($mapping['OrderLine.ItemIdentifier.ManufacturerSKU'])) {
                $orderLine->getItemIdentifier()->setManufacturerSKU($row[$mapping['OrderLine.ItemIdentifier.ManufacturerSKU']]);
            }

            if (isset($mapping['OrderLine.ItemIdentifier.PartnerSKU'])) {
                $orderLine->getItemIdentifier()->setPartnerSKU($row[$mapping['OrderLine.ItemIdentifier.PartnerSKU']]);
            }

            $orderLine->getItemIdentifier()->setSupplierSKU($row[$mapping['OrderLine.ItemIdentifier.SupplierSKU']]);

            if (isset($mapping['OrderLine.ItemIdentifier.UPC'])) {
                $orderLine->getItemIdentifier()->setUpc($row[$mapping['OrderLine.ItemIdentifier.UPC']]);
            }

            if (isset($mapping['OrderLine.Discounts.DiscountAmount'])) {
                $olDiscounts = $orderLine->getDiscounts();
                $olDiscount = new Discount();
                $olDiscount->setDiscountAmount($row[$mapping['OrderLine.Discounts.DiscountAmount']]);
                $olDiscounts[] = $olDiscount;
                $orderLine->setDiscounts($olDiscounts);
            }

            $olShipmentInfo = new ShipmentInfo();

            if (isset($mapping['OrderLine.ShipmentInfo.CarrierCode'])) {
                $olShipmentInfo->setCarrierCode($row[$mapping['OrderLine.ShipmentInfo.CarrierCode']]);
            }

            if (isset($mapping['OrderLine.ShipmentInfo.ClassCode'])) {
                $olShipmentInfo->setClassCode($row[$mapping['OrderLine.ShipmentInfo.ClassCode']]);
            }

            if (isset($mapping['OrderLine.ShipmentInfo.ShipmentCost'])) {
                $olShipmentInfo->setShipmentCost($row[$mapping['OrderLine.ShipmentInfo.ShipmentCost']]);
            }

            if (isset($mapping['OrderLine.ShipmentInfo.Weight'])) {
                $olShipmentInfo->setWeight($row[$mapping['OrderLine.ShipmentInfo.Weight']]);
            }

            if (isset($mapping['OrderLine.ShipmentInfo.WeightUnit'])) {
                $olShipmentInfo->setWeightUnit($row[$mapping['OrderLine.ShipmentInfo.WeightUnit']]);
            }

            $olShipmentInfos = $orderLine->getShipmentInfos();
            $olShipmentInfos[] = $olShipmentInfo;
            $orderLine->setShipmentInfos($olShipmentInfos);

            if (isset($mapping['OrderLine.Taxes.TaxAmount'])) {
                $olTaxes = $orderLine->getTaxes();
                $olTax = new Tax();
                $olTax->setTaxAmount($row[$mapping['OrderLine.Taxes.TaxAmount']]);
                $olTaxes[] = $olTax;
                $orderLine->setTaxes($olTaxes);
            }

            $olExtendedAttributes = $orderLine->getExtendedAttributes();

            if (isset($mapping['OrderLine.ExtendedAttribute.Color'])) {
                $olExtendedAttributes[] = new ExtendedAttribute('Color', $row[$mapping['OrderLine.ExtendedAttribute.Color']]);
            }

            if (isset($mapping['OrderLine.ExtendedAttribute.GiftMessage'])) {
                $olExtendedAttributes[] = new ExtendedAttribute('GiftMessage', $row[$mapping['OrderLine.ExtendedAttribute.GiftMessage']]);
            }

            if (isset($mapping['OrderLine.ExtendedAttribute.ItemLevelMessage'])) {
                $olExtendedAttributes[] = new ExtendedAttribute('ItemLevelMessage', $row[$mapping['OrderLine.ExtendedAttribute.ItemLevelMessage']]);
            }

            if (isset($mapping['OrderLine.ExtendedAttribute.Size'])) {
                $olExtendedAttributes[] = new ExtendedAttribute('Size', $row[$mapping['OrderLine.ExtendedAttribute.Size']]);
            }

            if (isset($mapping['OrderLine.ExtendedAttribute.GiftWrap'])) {
                $olExtendedAttributes[] = new ExtendedAttribute('GiftWrap', $row[$mapping['OrderLine.ExtendedAttribute.GiftWrap']]);
            }

            if (isset($mapping['OrderLine.ExtendedAttribute.MiscCharge'])) {
                $olExtendedAttributes[] = new ExtendedAttribute('MiscCharge', $row[$mapping['OrderLine.ExtendedAttribute.MiscCharge']]);
            }

            if (isset($mapping['OrderLine.ExtendedAttribute.CustomerDiscount'])) {
                $olExtendedAttributes[] = new ExtendedAttribute('CustomerDiscount', $row[$mapping['OrderLine.ExtendedAttribute.CustomerDiscount']]);
            }

            if (isset($mapping['OrderLine.ExtendedAttribute.CustomerShipping'])) {
                $olExtendedAttributes[] = new ExtendedAttribute('CustomerShipping', $row[$mapping['OrderLine.ExtendedAttribute.CustomerShipping']]);
            }

            if (isset($mapping['OrderLine.ExtendedAttribute.CustomerTax'])) {
                $olExtendedAttributes[] = new ExtendedAttribute('CustomerTax', $row[$mapping['OrderLine.ExtendedAttribute.CustomerTax']]);
            }

            if (isset($mapping['OrderLine.ExtendedAttribute.CustomerMiscCharge'])) {
                $olExtendedAttributes[] = new ExtendedAttribute('CustomerMiscCharge', $row[$mapping['OrderLine.ExtendedAttribute.CustomerMiscCharge']]);
            }

            if (isset($mapping['OrderLine.ExtendedAttribute.SpecialInstructions'])) {
                $olExtendedAttributes[] = new ExtendedAttribute('SpecialInstructions', $row[$mapping['OrderLine.ExtendedAttribute.SpecialInstructions']]);
            }

            if (isset($mapping['OrderLine.ExtendedAttribute.MiscItemIdentifier'])) {
                $olExtendedAttributes[] = new ExtendedAttribute('MiscItemIdentifier', $row[$mapping['OrderLine.ExtendedAttribute.MiscItemIdentifier']]);
            }

            $orderLine->setExtendedAttributes($olExtendedAttributes);

            $orderLines = $order->getOrderLines();
            $orderLines[] = $orderLine;
            $order->setOrderLines($orderLines);

            $this->orders[$row[$mapping['Id']]] = $order;
        }

        return $this->orders;
    }

}
