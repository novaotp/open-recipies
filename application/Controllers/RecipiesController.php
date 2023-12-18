<?php 

namespace App\Controllers;

use App\Models\Meal;
use App\Providers\Session;
use Symfony\Component\Routing\RouteCollection;

class RecipiesController
{
	/** Shows all the recipies. */
	public function index(RouteCollection $routes)
	{
		if (isset($_GET['sort']) && !in_array($_GET['sort'], ['trending', 'top-rated'])) {
			$url = $routes->get("recipies")->getPath();
			header("Location: $url");
		}

		$isConnected = Session::isValid();
		$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
		$search = isset($_GET['search']) ? $_GET['search'] : '';

		$meals = [];

		/** Matches the meals with the search param. */
		foreach (Meal::all() as $meal)
		{
			if ($search === "" || str_starts_with(strtolower($meal->name), $search))
            {
                array_push($meals, $meal);
            }
		}

		require_once APP_ROOT . '/resources/views/recipies.php';
	}

	/** Shows the form to create a recipy. */
	public function create(RouteCollection $routes)
	{
		require_once APP_ROOT. '/resources/views/recipy-create.php';
	}

	/** Show a specific recipy via it's id. */
	public function show(int $id, RouteCollection $routes)
	{
		$meal = Meal::where($id);
		require_once APP_ROOT . '/resources/views/recipy.php';
	}
}