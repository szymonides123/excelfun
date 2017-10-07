<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Customers;
use AppBundle\Service\Csv;

class CustomerController extends Controller
{

    public function indexAction(Request $request, Csv $csv)
    {
//        $dupa = $this->get('AppBundle\Model\Csv');
        $csv->import_data();
        $customers=$this->getDoctrine()->getRepository(Customers::class)->findAll();
        return $this->render('default/index.html.twig', array(
            'customers' => $customers
        ));
    }
}
