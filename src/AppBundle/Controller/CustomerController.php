<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{

    public function indexAction(Request $request)
    {
        $customers=$this->getDoctrine()->getRepository('AppBundle:FullView')->findAll();
        return $this->render('default/index.html.twig', array(
            'customers' => $customers
        ));
    }
}
