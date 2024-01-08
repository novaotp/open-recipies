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
		$search = isset($_GET['search']) ? $_GET['search'] : '';

		$recipes = Recipe::all($search);

		require_once APP_ROOT . '/resources/views/recipes.php';
	}

	/** Show a specific recipe via it's id. */
	public function show(int $id, RouteCollection $routes)
	{
		if ($id > 100) {
			$url = $routes->get("recipes")->getPath();
			header("Location: $url");
		}

		$recipe = Recipe::where($id);
		require_once APP_ROOT . '/resources/views/recipe.php';
	}
}