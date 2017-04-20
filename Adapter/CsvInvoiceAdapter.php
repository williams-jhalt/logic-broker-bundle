<?php

namespace Williams\LogicBrokerBundle\Adapter;

use SplFileObject;
use Williams\LogicBrokerBundle\Model\Invoice;

class CsvInvoiceAdapter {

    public function writeHeader(SplFileObject $file) {

        $header = [
            'Identifier.LinkKey',
            'ReceiverCompanyId',
            'InvoiceDate',
            'InvoiceNumber',
            'DocumentDate',
            'OrderDate',
            'PartnerPO',
            'Currency',
            'HandlingAmount',
            'InvoiceTotal',
            'OrderNumber',
            'VendorNumber',
            'Note',
            'Discounts.DiscountAmount',
            'Discounts.DiscountPercent',
            'Taxes.TaxAmount',
            'PaymentTerm.DiscountDueDate',
            'PaymentTerm.DiscountInNumberOfDays',
            'PaymentTerm.EffectiveDate',
            'PaymentTerm.DueDate',
            'PaymentTerm.PayInNumberOfDays',
            'PaymentTerm.AvailableDiscount',
            'PaymentTerm.TermsDescription',
            'RemitToAddress.CompanyName',
            'RemitToAddress.AddressCode',
            'RemitToAddress.Address1',
            'RemitToAddress.Address2',
            'RemitToAddress.City',
            'RemitToAddress.Country',
            'RemitToAddress.Email',
            'RemitToAddress.FirstName',
            'RemitToAddress.LastName',
            'RemitToAddress.Phone',
            'RemitToAddress.State',
            'RemitToAddress.Zip',
            'BillToAddress.CompanyName',
            'BillToAddress.FirstName',
            'BillToAddress.LastName',
            'BillToAddress.Address1',
            'BillToAddress.Address2',
            'BillToAddress.City',
            'BillToAddress.State',
            'BillToAddress.Country',
            'BillToAddress.Zip',
            'BillToAddress.AddressCode',
            'BillToAddress.Phone',
            'BillToAddress.Email',
            'OrderedByAddress.CompanyName',
            'OrderedByAddress.FirstName',
            'OrderedByAddress.LastName',
            'OrderedByAddress.Address1',
            'OrderedByAddress.Address2',
            'OrderedByAddress.City',
            'OrderedByAddress.State',
            'OrderedByAddress.Country',
            'OrderedByAddress.Zip',
            'OrderedByAddress.AddressCode',
            'OrderedByAddress.Phone',
            'OrderedByAddress.Email',
            'ShipToAddress.CompanyName',
            'ShipToAddress.FirstName',
            'ShipToAddress.LastName',
            'ShipToAddress.Address1',
            'ShipToAddress.Address2',
            'ShipToAddress.City',
            'ShipToAddress.State',
            'ShipToAddress.Country',
            'ShipToAddress.Zip',
            'ShipToAddress.AddressCode',
            'ShipToAddress.Phone',
            'ShipToAddress.Email',
            'ExtendedAttribute[Name=InvoiceTypeCode].Value',
            'InvoiceLine.LineNumber',
            'InvoiceLine.Price',
            'InvoiceLine.PriceCode',
            'InvoiceLine.Quantity',
            'InvoiceLine.QuantityUOM',
            'InvoiceLine.MSRP',
            'InvoiceLine.ItemIdentifier.PartnerSKU',
            'InvoiceLine.ItemIdentifier.SupplierSKU',
            'InvoiceLine.ItemIdentifier.UPC',
            'InvoiceLine.Taxes.TaxAmount'
        ];

        $file->fputcsv($header);
    }

    /**
     * 
     * @param Invoice[] $invoices
     * @param SplFileObject $file
     */
    public function writeData(array $invoices, SplFileObject $file) {

        foreach ($invoices as $invoice) {

            $discounts = $invoice->getDiscounts();
            $taxes = $invoice->getTaxes();
            $invoiceTypeCode = null;

            foreach ($invoice->getExtendAttributes() as $ea) {
                if ($ea->getName() == 'InvoiceTypeCode') {
                    $invoiceTypeCode = $ea->getValue();
                }
            }

            foreach ($invoice->getInvoiceLines() as $line) {

                $row = [
                    $invoice->getIdentifier()->getLinkKey(),
                    $invoice->getReceiverCompanyId(),
                    empty($invoice->getInvoiceDate()) ? null : $invoice->getInvoiceDate()->format('c'),
                    $invoice->getInvoiceNumber(),
                    empty($invoice->getDocumentDate()) ? null : $invoice->getDocumentDate()->format('c'),
                    empty($invoice->getOrderDate()) ? null : $invoice->getOrderDate()->format('c'),
                    $invoice->getPartnerPO(),
                    $invoice->getCurrency(),
                    $invoice->getHandlingAmount(),
                    $invoice->getInvoiceTotal(),
                    $invoice->getOrderNumber(),
                    $invoice->getVendorNumber(),
                    $invoice->getNote(),
                    empty($discounts) ? null : $discounts[0]->getDiscountAmount(),
                    empty($discounts) ? null : $discounts[0]->getDiscountPercent(),
                    empty($taxes) ? null : $taxes[0]->getTaxAmount(),
                    empty($invoice->getPaymentTerm()->getDiscountDueDate()) ? null : $invoice->getPaymentTerm()->getDiscountDueDate()->format('c'),
                    $invoice->getPaymentTerm()->getDiscountInNumberOfDays(),
                    empty($invoice->getPaymentTerm()->getEffectiveDate()) ? null : $invoice->getPaymentTerm()->getEffectiveDate()->format('c'),
                    empty($invoice->getPaymentTerm()->getDueDate()) ? null : $invoice->getPaymentTerm()->getDueDate()->format('c'),
                    $invoice->getPaymentTerm()->getPayInNumberOfDays(),
                    $invoice->getPaymentTerm()->getAvailableDiscount(),
                    $invoice->getPaymentTerm()->getTermsDescription(),
                    $invoice->getRemitToAddress()->getCompanyName(),
                    $invoice->getRemitToAddress()->getAddressCode(),
                    $invoice->getRemitToAddress()->getAddress1(),
                    $invoice->getRemitToAddress()->getAddress2(),
                    $invoice->getRemitToAddress()->getCity(),
                    $invoice->getRemitToAddress()->getCountry(),
                    $invoice->getRemitToAddress()->getEmail(),
                    $invoice->getRemitToAddress()->getFirstName(),
                    $invoice->getRemitToAddress()->getLastName(),
                    $invoice->getRemitToAddress()->getPhone(),
                    $invoice->getRemitToAddress()->getState(),
                    $invoice->getRemitToAddress()->getZip(),
                    $invoice->getBillToAddress()->getCompanyName(),
                    $invoice->getBillToAddress()->getFirstName(),
                    $invoice->getBillToAddress()->getLastName(),
                    $invoice->getBillToAddress()->getAddress1(),
                    $invoice->getBillToAddress()->getAddress2(),
                    $invoice->getBillToAddress()->getCity(),
                    $invoice->getBillToAddress()->getState(),
                    $invoice->getBillToAddress()->getCountry(),
                    $invoice->getBillToAddress()->getZip(),
                    $invoice->getBillToAddress()->getAddressCode(),
                    $invoice->getBillToAddress()->getPhone(),
                    $invoice->getBillToAddress()->getEmail(),
                    $invoice->getOrderedByAddress()->getCompanyName(),
                    $invoice->getOrderedByAddress()->getFirstName(),
                    $invoice->getOrderedByAddress()->getLastName(),
                    $invoice->getOrderedByAddress()->getAddress1(),
                    $invoice->getOrderedByAddress()->getAddress2(),
                    $invoice->getOrderedByAddress()->getCity(),
                    $invoice->getOrderedByAddress()->getState(),
                    $invoice->getOrderedByAddress()->getCountry(),
                    $invoice->getOrderedByAddress()->getZip(),
                    $invoice->getOrderedByAddress()->getAddressCode(),
                    $invoice->getOrderedByAddress()->getPhone(),
                    $invoice->getOrderedByAddress()->getEmail(),
                    $invoice->getShipToAddress()->getCompanyName(),
                    $invoice->getShipToAddress()->getFirstName(),
                    $invoice->getShipToAddress()->getLastName(),
                    $invoice->getShipToAddress()->getAddress1(),
                    $invoice->getShipToAddress()->getAddress2(),
                    $invoice->getShipToAddress()->getCity(),
                    $invoice->getShipToAddress()->getState(),
                    $invoice->getShipToAddress()->getCountry(),
                    $invoice->getShipToAddress()->getZip(),
                    $invoice->getShipToAddress()->getAddressCode(),
                    $invoice->getShipToAddress()->getPhone(),
                    $invoice->getShipToAddress()->getEmail(),
                    $invoiceTypeCode,
                    $line->getLineNumber(),
                    $line->getPrice(),
                    $line->getPriceCode(),
                    $line->getQuantity(),
                    $line->getQuantityUOM(),
                    $line->getMsrp(),
                    $line->getDescription(),
                    $line->getItemIdentifier()->getPartnerSKU(),
                    $line->getItemIdentifier()->getSupplierSKU(),
                    $line->getItemIdentifier()->getUpc(),
                    empty($taxes) ? null : $taxes[0]->getTaxAmount()
                ];

                $file->fputcsv($row);
            }
        }
    }

}
