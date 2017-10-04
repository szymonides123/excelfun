<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contracts
 *
 * @ORM\Table(name="Contracts", indexes={@ORM\Index(name="fk_Contracts_ConTypes_idx", columns={"con_ConTypeID"})})
 * @ORM\Entity
 */
class Contracts
{
    /**
     * @var string
     *
     * @ORM\Column(name="ContractValue", type="string", length=45, nullable=true)
     */
    private $contractvalue;

    /**
     * @var string
     *
     * @ORM\Column(name="ContractItem", type="string", length=45, nullable=true)
     */
    private $contractitem;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ConStartDate", type="date", nullable=true)
     */
    private $constartdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ConEndDate", type="date", nullable=true)
     */
    private $conenddate;

    /**
     * @var integer
     *
     * @ORM\Column(name="ContractID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $contractid;

    /**
     * @var \AppBundle\Entity\Contypes
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Contypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="con_ConTypeID", referencedColumnName="ConTypeID")
     * })
     */
    private $conContypeid;
    function getContractvalue() {
        return $this->contractvalue;
    }

    function getContractitem() {
        return $this->contractitem;
    }

    function getConstartdate(): \DateTime {
        return $this->constartdate;
    }

    function getConenddate(): \DateTime {
        return $this->conenddate;
    }

    function getContractid() {
        return $this->contractid;
    }

    function getConContypeid(): \AppBundle\Entity\Contypes {
        return $this->conContypeid;
    }

    function setContractvalue($contractvalue) {
        $this->contractvalue = $contractvalue;
    }

    function setContractitem($contractitem) {
        $this->contractitem = $contractitem;
    }

    function setConstartdate(\DateTime $constartdate) {
        $this->constartdate = $constartdate;
    }

    function setConenddate(\DateTime $conenddate) {
        $this->conenddate = $conenddate;
    }

    function setContractid($contractid) {
        $this->contractid = $contractid;
    }

    function setConContypeid(\AppBundle\Entity\Contypes $conContypeid) {
        $this->conContypeid = $conContypeid;
    }



}

