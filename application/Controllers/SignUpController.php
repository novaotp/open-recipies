<?php 

namespace App\Controllers;

use App\Providers\Database;
use App\Models\User;
use Symfony\Component\Routing\RouteCollection;

class SignUpController
{
	/** The main action */
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

	public function get(RouteCollection $routes)
	{
		$user = new User();
		require_once APP_ROOT . '/resources/views/signup.php';
	}

	public function post(RouteCollection $routes)
	{
		$db = Database::getInstance();
		$user = new User($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password']);

		$query = $db->prepare("SELECT * FROM openrecipiesdb.user WHERE email = ?;");
		$query->bindValue(1, $user->email());
		$query->execute();
		$result = $query->fetch();

		if ($result && $result['email'] == $user->email()) {
			$error = "Email already in use";
			require_once APP_ROOT . '/resources/views/signup.php';
		} else {
			$user->create();
			$url = $routes->get("log-in")->getPath();
			header("Location: $url");
		}
	}
}