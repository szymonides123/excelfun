<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('customers', new Route('/customers', array(
    '_controller' => 'AppBundle:Customer:index',
)));
$collection->add('export', new Route('/export', array(
    '_controller' => 'AppBundle:Eksport:index',
)));
$collection->add('import', new Route('/import', array(
    '_controller' => 'AppBundle:Browse:index',
)));
return $collection;