<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contypes
 *
 * @ORM\Table(name="ConTypes")
 * @ORM\Entity
 */
class Contypes
{
    /**
     * @var string
     *
     * @ORM\Column(name="ConTypeName", type="string", length=255, nullable=false)
     */
    private $contypename;

    /**
     * @var integer
     *
     * @ORM\Column(name="ConTypeID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $contypeid;

    function getContypename() {
        return $this->contypename;
    }

    function getContypeid() {
        return $this->contypeid;
    }

    function setContypename($contypename) {
        $this->contypename = $contypename;
    }

    function setContypeid($contypeid) {
        $this->contypeid = $contypeid;
    }


}

