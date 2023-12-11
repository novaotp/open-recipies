<?php 

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

function url(string $path) {
  return URL_SUBFOLDER . $path;
}

// Routes system
$routes = new RouteCollection();

$routes->add('home', new Route(url('/'), array('controller' => 'HomeController', 'method' => 'index'), array()));
$routes->add('sign-up', new Route(url('/auth/sign-up'), array('controller' => 'SignUpController', 'method' => 'create'), array()));
$routes->add('sign-up', new Route(url('/auth/sign-up'), array('controller' => 'SignUpController', 'method' => 'store'), array()));
$routes->add('log-in', new Route(url('/auth/log-in'), array('controller' => 'LogInController', 'method' => 'index'), array()));
$routes->add('app', new Route(url('/app'), array('controller' => 'AppController', 'method' => 'index'), array()));
$routes->add('product', new Route(url('/product/{id}'), array('controller' => 'ProductController', 'method'=>'showAction'), array('id' => '[0-9]+')));
