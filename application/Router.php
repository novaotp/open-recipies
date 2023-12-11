<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\NoConfigurationException;

class Router
{
  private UrlMatcher $matcher;
  private RouteCollection $routes;
  private RequestContext $context;
  private Request $request;

  public function __construct()
  {
    $this->context = new RequestContext();
    $this->request = Request::createFromGlobals();
    $this->routes = new RouteCollection();
    $this->matcher = new UrlMatcher($this->routes, $this->context);
  }

  public function handleRequest(RouteCollection $routes)
  {
    $this->context->fromRequest($this->request);

    try {
      $arrayUri = explode('?', $_SERVER['REQUEST_URI']);
      $matcher = $this->matcher->match($arrayUri[0]);

      // Cast params to int if numeric
      array_walk($matcher, function (&$param) {
        if (is_numeric($param)) {
          $param = (int) $param;
        }
      });

      $this->invokeControllerAction($matcher);
    } catch (MethodNotAllowedException $e) {
      $this->handleError('Route method is not allowed.');
    } catch (ResourceNotFoundException $e) {
      $this->handleError('Route does not exist.');
    } catch (NoConfigurationException $e) {
      $this->handleError('Configuration does not exist.');
    }
  }

  private function invokeControllerAction($matcher)
  {
    $className = '\\App\\Controllers\\' . $matcher['controller'];
    $classInstance = new $className();

    call_user_func_array(array($classInstance, $matcher['method']), array_slice($matcher, 2, -1));
  }

  private function handleError($message)
  {
    echo $message;
  }
}

// Invoke
$router = new Router();
$router->handleRequest($routes);
