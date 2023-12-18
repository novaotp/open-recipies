<?php 

namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

use App\Providers\Session;

class LogOutController
{
	/** Destroy the session and redirects to the main page. */
	public function index(RouteCollection $routes)
	{
		Session::destroy();

        $url = $routes->get('recipies')->getPath();
        header("Location: $url");
	}
}
