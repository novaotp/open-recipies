<?php 

namespace App\Controllers;

use App\Providers\Middleware;
use Utils\QueryParam;

class AppController
{
    /** The main action */
	public function index()
	{
		Middleware::run();

		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$this->get();
		} else {
			echo "Unallowed method on route.";
		}
	}

	public function get()
	{
		if (isset($_GET['sort']) && !in_array($_GET['sort'], ['trending', 'top-rated'])) {
			$url = QueryParam::remove($_SERVER['REQUEST_URI'], 'sort');
			header("Location: $url");
		}

		$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
		$search = isset($_GET['search']) ? $_GET['search'] : '';
		require_once APP_ROOT . '/resources/views/app.php';
	}
}