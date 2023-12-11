<?php 

namespace App\Controllers;

use App\Providers\Database;
use App\Models\User;
use Symfony\Component\Routing\RouteCollection;

class SignUpController
{
	public function create(User $defaultUser = null)
	{
		$user = $defaultUser !== null ? $defaultUser : new User();
		require_once APP_ROOT . '/resources/views/signup.php';
	}

	public function store(RouteCollection $routes)
	{
		$db = Database::getInstance();
		$user = new User($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password']);

		$query = $db->prepare("SELECT * FROM openrecipiesdb.user WHERE email = ?;");
		$query->bindValue(1, $user->email());
		$query->execute();
		$result = $query->fetch();

		if ($result && $result['email'] == $user->email()) {
			$error = "Email already in use";
			$user->password("");
			$routes->get('sign-up-form')->getPath();
		} else {
			$user->create();
			$url = URL_SUBFOLDER . '/auth/log-in';
			header("Location: $url");
		}
	}
}