<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Customers;


class CustomersRepository extends EntityRepository
{
    public function findAll()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT c FROM AppBundle:Customers c JOIN AppBundle:Contracts p WITH c.conContractid = p.contractid JOIN AppBundle:Contypes t WITH p.conContypeid = t.contypeid'
            )
            ->getResult();
    }
    public function findFetch()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT c.customername, c.customeradress, c.customerpesel, c.telephonenumber, p.contractvalue, p.contractitem, p.constartdate, p.conenddate, t.contypename FROM AppBundle:Customers c JOIN AppBundle:Contracts p WITH c.conContractid = p.contractid JOIN AppBundle:Contypes t WITH p.conContypeid = t.contypeid'
            )
            ->getArrayResult();
    }
}
