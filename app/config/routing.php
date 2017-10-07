<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('customers', new Route('/customers', array(
    '_controller' => 'AppBundle:Customer:index',
)));
$collection->add('excelus', new Route('/excel', array(
    '_controller' => 'AppBundle:Excel:index',
)));
return $collection;