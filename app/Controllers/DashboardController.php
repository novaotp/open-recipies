<?php 

namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

use App\Models\Recipe;
use App\Models\User;
use App\Providers\Middleware;

class DashboardController
{
	/** Shows the favorites recipies to the user. */
	public function index(RouteCollection $routes)
	{
		Middleware::run();

        $user = User::getFromSession();

		$recipes = [];

		for ($i = 0; $i < 10; $i++) {
			array_push($recipes, Recipe::random());
		}

		require_once APP_ROOT . '/resources/views/dashboard.php';
	}
}