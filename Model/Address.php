<?php

namespace Williams\LogicBrokerBundle\Model;

use JMS\Serializer\Annotation as JMS;

class Address {

    /**
     *
     * @JMS\SerializedName("CompanyName")
     * @var string
     */
    private $companyName;
    
    /**
     *
     * @JMS\SerializedName("FirstName")
     * @var string
     */
    private $firstName;
    
    /**
     *
     * @JMS\SerializedName("LastName")
     * @var string
     */
    private $lastName;
    
    /**
     *
     * @JMS\SerializedName("Address1")
     * @var string
     */
    private $address1;
    
    /**
     *
     * @JMS\SerializedName("Address2")
     * @var string
     */
    private $address2;
    
    /**
     *
     * @JMS\SerializedName("City")
     * @var string
     */
    private $city;
    
    /**
     *
     * @JMS\SerializedName("State")
     * @var string
     */
    private $state;
    
    /**
     *
     * @JMS\SerializedName("Country")
     * @var string
     */
    private $country;
    
    /**
     *
     * @JMS\SerializedName("Zip")
     * @var string
     */
    private $zip;
    
    /**
     * Address code that will indicate the location where the address is related to. Typically will be a store or DC number.
     *
     * @JMS\SerializedName("AddressCode")
     * @var string
     */
    private $addressCode;
    
    /**
     *
     * @JMS\SerializedName("Phone")
     * @var string
     */
    private $phone;
    
    /**
     *
     * @JMS\SerializedName("Email")
     * @var string
     */
    private $email;

    public function getCompanyName() {
        return $this->companyName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getAddress1() {
        return $this->address1;
    }

    public function getAddress2() {
        return $this->address2;
    }

    public function getCity() {
        return $this->city;
    }

    public function getState() {
        return $this->state;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getZip() {
        return $this->zip;
    }

    public function getAddressCode() {
        return $this->addressCode;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
        return $this;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    public function setAddress1($address1) {
        $this->address1 = $address1;
        return $this;
    }

    public function setAddress2($address2) {
        $this->address2 = $address2;
        return $this;
    }

    public function setCity($city) {
        $this->city = $city;
        return $this;
    }

    public function setState($state) {
        $this->state = $state;
        return $this;
    }

    public function setCountry($country) {
        $this->country = $country;
        return $this;
    }

    public function setZip($zip) {
        $this->zip = $zip;
        return $this;
    }

    public function setAddressCode($addressCode) {
        $this->addressCode = $addressCode;
        return $this;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

}
