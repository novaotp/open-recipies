<?php 

namespace App\Controllers;

use App\Providers\Session;
use App\Providers\Middleware;
use Symfony\Component\Routing\RouteCollection;

class RecipiesController
{
	public function index(RouteCollection $routes)
	{
		if (isset($_GET['sort']) && !in_array($_GET['sort'], ['trending', 'top-rated'])) {
			$url = $routes->get("recipies")->getPath();
			header("Location: $url");
		}

		$isConnected = Session::isValid();
		$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
		$search = isset($_GET['search']) ? $_GET['search'] : '';
		require_once APP_ROOT . '/resources/views/recipies.php';
	}
}