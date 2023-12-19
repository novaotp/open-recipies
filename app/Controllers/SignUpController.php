<?php

namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

use App\Providers\Database;
use App\Models\User;

/**
 * A simple GET/FORM controller for form pages.
 */
class SignUpController
{
    /**
     * Shows a form for the `/auth/sign-up` page.
     * @param RouteCollection $routes All the defined routes in `/routes/web.php` file. Automatically injected by the framework.
     */
    public function get(RouteCollection $routes) 
    {
        $user = new User();
		require_once APP_ROOT . '/resources/views/signup.php';
    }

    /**
     * Checks that the email isn't used yet, then creates a new user and sends him to the login page.
     * @param RouteCollection $routes All the defined routes in `/routes/web.php` file. Automatically injected by the framework.
     */
    public function form(RouteCollection $routes) 
    {
        $db = Database::getInstance();
		$user = new User($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password']);

		if (User::whereEmail($user->email()) !== null) {
			$error = "Email already in use";
			require_once APP_ROOT . '/resources/views/signup.php';
		} else {
			$user->create();
			$url = $routes->get("log-in")->getPath();
			header("Location: $url");
		}
    }
}
