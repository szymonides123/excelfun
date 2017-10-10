<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Files")
 */
class Csvs
{
     /**
     * @ORM\Column(type="string", length=100)
     */
    private $filename;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $fileid;

    function getFilename() {
        return $this->filename;
    }

    function getFileid() {
        return $this->fileid;
    }


    function setFilename($filename) {
        $this->filename = $filename;
    }

    function setFileid($fileid) {
        $this->fileid = $fileid;
    }


    


}