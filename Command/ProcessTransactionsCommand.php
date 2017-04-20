<?php

namespace Williams\LogicBrokerBundle\Command;

class ProcessTransactionsCommand extends ContainerAwareCommand {

    protected function configure() {
        $this->setName('logicbroker:process')
                ->setDescription('Process Transactions through LogicBroker');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $service = $this->getContainer()->get('williams_logicbroker.service');
        $output->write("Beginning EDI process...\n");
        $output->write("Retrieving Orders...");
        $service->retrieveOrders();
        $output->write("Done\n");
        $output->write("Acknowledging Receipt...");
        $service->acknowledgeReceipt();
        $output->write("Done\n");
        $output->write("Submitting Shipments...");
        $service->submitShipments();
        $output->write("Done\n");
        $output->write("Submitting Invoices...");
        $service->submitInvoices();
        $output->write("Done\n");
        $output->write("Finished!\n\n");
    }
    
}