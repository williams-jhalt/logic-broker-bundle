<?php

namespace Williams\LogicBrokerBundle\Adapter;

use SplFileObject;
use Williams\LogicBrokerBundle\Model\Shipment;

class CsvShipmentAdapter {

    public function writeHeader(SplFileObject $file) {

        $header = [
            'Identifier.LinkKey',
            'ReceiverCompanyId',
            'DocumentDate',
            'ShipmentNumber',
            'PartnerPO',
            'OrderDate',
            'OrderNumber',
            'BillofLading',
            'PRONumber',
            'VendorNumber',
            'Note',
            'ExpectedDeliveryDate',
            'Payment.Method',
            'ShipToAddress.CompanyName',
            'ShipToAddress.FirstName',
            'ShipToAddress.LastName',
            'ShipToAddress.Address1',
            'ShipToAddress.Address2',
            'ShipToAddress.City',
            'ShipToAddress.Zip',
            'ShipToAddress.State',
            'ShipToAddress.Phone',
            'ShipToAddress.Email',
            'ShipFromAddress.CompanyName',
            'ShipFromAddress.FirstName',
            'ShipFromAddress.LastName',
            'ShipFromAddress.Address1',
            'ShipFromAddress.Address2',
            'ShipFromAddress.City',
            'ShipFromAddress.Zip',
            'ShipFromAddress.State',
            'ShipFromAddress.Phone',
            'ShipFromAddress.Email',
            'ShipmentInfo.ContainerCode',
            'ShipmentInfo.ContainerType',
            'ShipmentInfo.TrackingNumber',
            'ShipmentInfo.Weight',
            'ShipmentInfo.WeightUnit',
            'ShipmentInfo.Length',
            'ShipmentInfo.Width',
            'ShipmentInfo.Height',
            'ShipmentInfo.DimensionUnit',
            'ShipmentLine.LineNumber',
            'ShipmentLine.ItemIdentifier.SupplierSKU',
            'ShipmentLine.ItemIdentifier.PartnerSKU',
            'ShipmentLine.ItemIdentifier.UPC',
            'ShipmentLine.Description',
            'ShipmentLine.Quantity',
            'ShipmentLine.QuantityUOM',
            'ShipmentLine.Price',
            'ShipmentLine.ShipmentInfo.DateShipped',
            'ShipmentLine.ShipmentInfo.ContainerCode',
            'ShipmentLine.ShipmentInfo.Qty',
            'ShipmentLine.ShipmentInfo.TrackingNumber',
            'ShipmentLine.ShipmentInfo.CarrierCode',
            'ShipmentLine.ShipmentInfo.ClassCode',
            'ShipmentLine.ShipmentInfo.ServiceLevelCode',
            'ShipmentLine.ShipmentInfo.ShipmentContainerParentCode',
            'ShipmentLine.ShipmentInfo.ContainerType',
            'ShipmentLine.ShipmentInfo.Weight',
            'ShipmentLine.ShipmentInfo.WeightUnit',
            'ShipmentLine.ShipmentInfo.Length',
            'ShipmentLine.ShipmentInfo.Width',
            'ShipmentLine.ShipmentInfo.Height',
            'ShipmentLine.ShipmentInfo.DimensionUnit'
        ];

        $file->fputcsv($header);
    }

    /**
     * 
     * @param Shipment[] $shipments
     * @param SplFileObject $file
     */
    public function writeData(array $shipments, SplFileObject $file) {

        foreach ($shipments as $shipment) {
            
            $payments = $shipment->getPayments();
            $shipmentInfos = $shipment->getShipmentInfos();

            foreach ($shipment->getShipmentLines() as $line) {
                
                $olShipmentInfos = $line->getShipmentInfos();
                
                $row = [
                    $shipment->getIdentifier()->getLinkKey(),
                    $shipment->getReceiverCompanyId(),
                    empty($shipment->getDocumentDate()) ? null : $shipment->getDocumentDate()->format('c'),
                    $shipment->getShipmentNumber(),
                    $shipment->getPartnerPO(),
                    empty($shipment->getOrderDate()) ? null : $shipment->getOrderDate()->format('c'),
                    $shipment->getOrderNumber(),
                    $shipment->getBillOfLading(),
                    $shipment->getProNumber(),
                    $shipment->getVendorNumber(),
                    $shipment->getNote(),
                    empty($shipment->getExpectedDeliveryDate()) ? null : $shipment->getExpectedDeliveryDate()->format('c'),
                    empty($payments) ? null : $payments[0]->getMethod(),
                    $shipment->getShipToAddress()->getCompanyName(),
                    $shipment->getShipToAddress()->getFirstName(),
                    $shipment->getShipToAddress()->getLastName(),
                    $shipment->getShipToAddress()->getAddress1(),
                    $shipment->getShipToAddress()->getAddress2(),
                    $shipment->getShipToAddress()->getCity(),
                    $shipment->getShipToAddress()->getZip(),
                    $shipment->getShipToAddress()->getState(),
                    $shipment->getShipToAddress()->getPhone(),
                    $shipment->getShipToAddress()->getEmail(),
                    $shipment->getShipFromAddress()->getCompanyName(),
                    $shipment->getShipFromAddress()->getFirstName(),
                    $shipment->getShipFromAddress()->getLastName(),
                    $shipment->getShipFromAddress()->getAddress1(),
                    $shipment->getShipFromAddress()->getAddress2(),
                    $shipment->getShipFromAddress()->getCity(),
                    $shipment->getShipFromAddress()->getZip(),
                    $shipment->getShipFromAddress()->getState(),
                    $shipment->getShipFromAddress()->getPhone(),
                    $shipment->getShipFromAddress()->getEmail(),
                    empty($shipmentInfos) ? null : $shipmentInfos[0]->getContainerCode(),
                    empty($shipmentInfos) ? null : $shipmentInfos[0]->getContainerType(),
                    empty($shipmentInfos) ? null : $shipmentInfos[0]->getTrackingNumber(),
                    empty($shipmentInfos) ? null : $shipmentInfos[0]->getWeight(),
                    empty($shipmentInfos) ? null : $shipmentInfos[0]->getWeightUnit(),
                    empty($shipmentInfos) ? null : $shipmentInfos[0]->getLength(),
                    empty($shipmentInfos) ? null : $shipmentInfos[0]->getWidth(),
                    empty($shipmentInfos) ? null : $shipmentInfos[0]->getHeight(),
                    empty($shipmentInfos) ? null : $shipmentInfos[0]->getDimensionUnit(),
                    $line->getLineNumber(),
                    $line->getItemIdentifier()->getSupplierSKU(),
                    $line->getItemIdentifier()->getPartnerSKU(),
                    $line->getItemIdentifier()->getUpc(),
                    $line->getDescription(),
                    $line->getQuantity(),
                    $line->getQuantityUOM(),
                    $line->getPrice(),
                    empty($olShipmentInfos) ? null : $olShipmentInfos[0]->getDateShipped()->format('Y-m-d'),
                    empty($olShipmentInfos) ? null : $olShipmentInfos[0]->getContainerCode(),
                    empty($olShipmentInfos) ? null : $olShipmentInfos[0]->getQty(),
                    empty($olShipmentInfos) ? null : $olShipmentInfos[0]->getTrackingNumber(),
                    empty($olShipmentInfos) ? null : $olShipmentInfos[0]->getCarrierCode(),
                    empty($olShipmentInfos) ? null : $olShipmentInfos[0]->getClassCode(),
                    empty($olShipmentInfos) ? null : $olShipmentInfos[0]->getServiceLevelCode(),
                    empty($olShipmentInfos) ? null : $olShipmentInfos[0]->getShipmentContainerParentCode(),
                    empty($olShipmentInfos) ? null : $olShipmentInfos[0]->getContainerType(),
                    empty($olShipmentInfos) ? null : $olShipmentInfos[0]->getWeight(),
                    empty($olShipmentInfos) ? null : $olShipmentInfos[0]->getWeightUnit(),
                    empty($olShipmentInfos) ? null : $olShipmentInfos[0]->getLength(),
                    empty($olShipmentInfos) ? null : $olShipmentInfos[0]->getWidth(),
                    empty($olShipmentInfos) ? null : $olShipmentInfos[0]->getHeight(),
                    empty($olShipmentInfos) ? null : $olShipmentInfos[0]->getDimensionUnit()
                ];                
                
                $file->fputcsv($row);
                
            }
        }
    }

}
