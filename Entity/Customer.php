<?php

namespace Williams\LogicBrokerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carton
 *
 * @ORM\Table(name="williams_logic_broker_customer")
 * @ORM\Entity(repositoryClass="Williams\LogicBrokerBundle\Repository\CustomerRepository")
 */
class Customer {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="sender_company_id", type="string", length=255)
     */
    private $senderCompanyId;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_number", type="string", length=255, nullable=true)
     */
    private $customerNumber;

    public function getId() {
        return $this->id;
    }

    public function getSenderCompanyId() {
        return $this->senderCompanyId;
    }

    public function getCustomerNumber() {
        return $this->customerNumber;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setSenderCompanyId($senderCompanyId) {
        $this->senderCompanyId = $senderCompanyId;
        return $this;
    }

    public function setCustomerNumber($customerNumber) {
        $this->customerNumber = $customerNumber;
        return $this;
    }

}
