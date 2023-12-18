<?php 

namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

use App\Models\User;
use App\Providers\Middleware;

class DashboardController
{
	public function index(RouteCollection $routes)
	{
		Middleware::run();

        $user = User::getFromSession();
		require_once APP_ROOT . '/resources/views/dashboard.php';
	}
}