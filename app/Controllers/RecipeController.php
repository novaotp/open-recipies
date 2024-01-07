<?php 

namespace App\Controllers;

use App\Models\Recipe;
use App\Providers\Session;
use Symfony\Component\Routing\RouteCollection;

class RecipeController
{
	/** Shows all the recipies. */
	public function index(RouteCollection $routes)
	{
		if (isset($_GET['sort']) && !in_array($_GET['sort'], ['trending', 'top-rated'])) {
			$url = $routes->get("recipes")->getPath();
			header("Location: $url");
		}

		$isConnected = Session::isValid();
		$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
		$search = isset($_GET['search']) ? $_GET['search'] : '';

		$meals = Recipe::random(10);

		require_once APP_ROOT . '/resources/views/recipes.php';
	}

	/** Show a specific recipe via it's id. */
	public function show(int $id, RouteCollection $routes)
	{
		$meal = Recipe::where($id);
		require_once APP_ROOT . '/resources/views/recipe.php';
	}
}