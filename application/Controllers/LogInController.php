<?php 

namespace App\Controllers;

use App\Models\User;
use App\Providers\Session;
use App\Providers\Database;
use Symfony\Component\Routing\RouteCollection;

class LogInController
{
	/** Send to the correct function depending on the method. */
	public function index(RouteCollection $routes)
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$this->get($routes);
		} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->post($routes);
		} else {
			echo "Unallowed method on route.";
		}
	}

    /** Shows the login form. */
	public function get(RouteCollection $routes)
	{
		$user = new User();
        require_once APP_ROOT . '/resources/views/login.php';
	}

	/** Validates the credentials and authenticates the user. */
	public function post(RouteCollection $routes)
	{
		$db = Database::getInstance();
		$user = new User("", "", $_POST["email"], $_POST["password"]);

		$query = $db->prepare('SELECT * FROM openrecipiesdb.user WHERE email = ? LIMIT 1;');
		$query->bindValue(1, $user->email());
		$query->execute();
		$result = $query->fetch();

		if ($result && password_verify($user->password(), $result['password'])) {
			Session::setUserId($result['id']);
			$url = $routes->get('recipies')->getPath();
			header("Location: $url");
		} else {
			$error = "Invalid credentials.";
			require_once APP_ROOT . '/resources/views/login.php';
		}
	}
}