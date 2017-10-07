<?php

namespace AppBundle\Service;


use AppBundle\Entity\Contracts;
use AppBundle\Entity\Customers;
use AppBundle\Entity\Contypes;
use Doctrine\ORM\EntityManager;


class Csv {
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
   
    public function import_data(){
        
        $customers =  new Customers();
        $customers->setCustomername('imie');
        $customers->setCustomeradress('adres');
        $customers->setCustomerpesel('12345678012');
        $customers->setTelephonenumber('123456789');
        $this->em->persist($customers);
        
        $contracts = new Contracts();
        $contracts->setContractvalue('1234');
        $contracts->setContractitem('telefon');
        $contracts->setConstartdate(new \DateTime('-30 years'));
        $contracts->setConenddate(new \DateTime('-29 years'));
      
        $this->em->persist($contracts);
        
        $contype = new Contypes();
        $contype->setContypename('telefon');
        
        $this->em->persist($contype);
        
        $customers->setConContractid($contracts);
        $contracts->setConContypeid($contype);
        
        $this->em->flush();
    }
}
