<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customers
 *
 * @ORM\Table(name="Customers", indexes={@ORM\Index(name="fk_Customers_Contracts1_idx", columns={"con_ContractID"})})
 * @ORM\Entity
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


}

