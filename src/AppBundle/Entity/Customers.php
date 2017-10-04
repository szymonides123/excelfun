<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customers
 *
 * @ORM\Table(name="Customers", indexes={@ORM\Index(name="fk_Customers_Contracts1_idx", columns={"con_ContractID"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CustomersRepository")
 */
class Customers
{
    /**
     * @var string
     *
     * @ORM\Column(name="CustomerName", type="string", length=45, nullable=true)
     */
    private $customername;

    /**
     * @var string
     *
     * @ORM\Column(name="CustomerAdress", type="string", length=45, nullable=true)
     */
    private $customeradress;

    /**
     * @var string
     *
     * @ORM\Column(name="CustomerPESEL", type="string", length=11, nullable=true)
     */
    private $customerpesel;

    /**
     * @var string
     *
     * @ORM\Column(name="Telephonenumber", type="string", length=45, nullable=true)
     */
    private $telephonenumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="CustomerID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customerid;

    /**
     * @var \AppBundle\Entity\Contracts
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Contracts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="con_ContractID", referencedColumnName="ContractID")
     * })
     */
    private $conContractid;

    function getCustomername() {
        return $this->customername;
    }

    function getCustomeradress() {
        return $this->customeradress;
    }

    function getCustomerpesel() {
        return $this->customerpesel;
    }

    function getTelephonenumber() {
        return $this->telephonenumber;
    }

    function getCustomerid() {
        return $this->customerid;
    }

    function getConContractid(): \AppBundle\Entity\Contracts {
        return $this->conContractid;
    }

    function setCustomername($customername) {
        $this->customername = $customername;
    }

    function setCustomeradress($customeradress) {
        $this->customeradress = $customeradress;
    }

    function setCustomerpesel($customerpesel) {
        $this->customerpesel = $customerpesel;
    }

    function setTelephonenumber($telephonenumber) {
        $this->telephonenumber = $telephonenumber;
    }

    function setCustomerid($customerid) {
        $this->customerid = $customerid;
    }

    function setConContractid(\AppBundle\Entity\Contracts $conContractid) {
        $this->conContractid = $conContractid;
    }
    


}

