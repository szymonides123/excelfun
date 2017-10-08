<?php

namespace AppBundle\Service;


use AppBundle\Entity\Contracts;
use AppBundle\Entity\Customers;
use AppBundle\Entity\Contypes;
use Doctrine\ORM\EntityManager;
use League\Csv\Reader;



class Csv {
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
   
    public function import_data(){
        
        $csv = Reader::createFromPath('/var/www/html/excelfun/src/mockdata/import.csv')->setHeaderOffset(0);
        
//        $result = $csv->fetchAssoc();
        
        foreach ($csv as $row) {
        
        $customers =  new Customers();
        $customers->setCustomername($row['CustomerName']);
        $customers->setCustomeradress($row['CustomerAdress']);
        $customers->setCustomerpesel($row['CustomerPESEL']);
        $customers->setTelephonenumber($row['Telephonenumber']);
        $this->em->persist($customers);
        
        $contracts = new Contracts();
        $contracts->setContractvalue($row['ContractValue']);
        $contracts->setContractitem($row['ContractItem']);
        $contracts->setConstartdate(\DateTime::createFromFormat('Y-m-d', $row['ConStartDate']));
        $contracts->setConenddate(\DateTime::createFromFormat('Y-m-d', $row['ConEndDate']));
      
        $this->em->persist($contracts);
        
        $contype = $this->em->getRepository(Contypes::class)
            ->findOneBy([
                'contypename' => $row['ConTypeName'],
                ])
        ;
        
        if (null === $contype){
        $contype = new Contypes();
        $contype->setContypename($row['ConTypeName']);
        $this->em->persist($contype);
        $this->em->flush();
        }
        
        $customers->setConContractid($contracts);
        $contracts->setConContypeid($contype);
        }
       
        $this->em->flush();
    }
}
