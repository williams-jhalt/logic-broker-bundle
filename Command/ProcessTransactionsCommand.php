<?php

namespace Williams\LogicBrokerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProcessTransactionsCommand extends ContainerAwareCommand {

    protected function configure() {
        $this->setName('williams:logicbroker:process')
                ->setDescription('Process Transactions through LogicBroker');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $service = $this->getContainer()->get('app.logicbroker');
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