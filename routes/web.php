<?php 

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

function url(string $path) {
  return URL_SUBFOLDER . $path;
}

// Routes system
$routes = new RouteCollection();

$routes->add('home', new Route(url('/'), array('controller' => 'HomeController', 'method' => 'index'), array()));

$routes->add('sign-up', new Route(url('/auth/sign-up'), array('controller' => 'SignUpController', 'method' => 'index'), array()));

$routes->add('log-in', new Route(url('/auth/log-in'), array('controller' => 'LogInController', 'method' => 'index'), array()));

$routes->add('log-out', new Route(url('/auth/log-out'), array('controller' => 'LogOutController', 'method' => 'index'), array()));

$routes->add('dashboard', new Route(url('/dashboard'), array('controller' => 'DashboardController', 'method' => 'index'), array()));

$routes->add('recipes', new Route(url('/recipes'), array('controller' => 'RecipeController', 'method' => 'index'), array()));
$routes->add('recipe', new Route(url('/recipes/{id}'), array('controller' => 'RecipeController', 'method'=>'show'), array('id' => '[0-9]+')));

$routes->add('settings', new Route(url('/settings'), array('controller' => 'SettingsController', 'method' => 'index'), array()));

