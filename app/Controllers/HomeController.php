<?php 

namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

class HomeController
{
	/**
	 * Redirect to `/recipies` for a nice prefix.
	 */
	public function index(RouteCollection $routes)
	{
		$url = $routes->get("recipes")->getPath();
		header("Location: $url");
	}
}
