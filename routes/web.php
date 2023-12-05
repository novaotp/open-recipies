<?php 

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();

$routes->add('home', new Route(constant('URL_SUBFOLDER') . '/', array('controller' => 'HomeController', 'method' => 'index'), array()));
$routes->add('sign-up', new Route(constant('URL_SUBFOLDER') . '/auth/sign-up', array('controller' => 'SignUpController', 'method' => 'index'), array()));
$routes->add('product', new Route(constant('URL_SUBFOLDER') . '/product/{id}', array('controller' => 'ProductController', 'method'=>'showAction'), array('id' => '[0-9]+')));