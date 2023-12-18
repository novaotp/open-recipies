<?php 

namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

use App\Providers\Session;

class LogOutController
{
	public function index(RouteCollection $routes)
	{
		Session::destroy();

        $url = $routes->get('recipies')->getPath();
        header("Location: $url");
	}
}
