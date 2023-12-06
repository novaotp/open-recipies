<?php 

namespace App\Controllers;

use App\Providers\Database;
use App\Models\User;

class SignUpController
{
    /** The main action */
	public function index()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$this->get();
		} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->post();
		} else {
			echo "Unallowed method on route.";
		}
	}

	public function get(User $defaultUser = null)
	{
		$user = $defaultUser !== null ? $defaultUser : new User();
		require_once APP_ROOT . '/resources/views/signup.php';
	}

	public function post()
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
			$this->get($user);
		} else {
			$user->create();
			$url = URL_SUBFOLDER . '/auth/log-in';
			header("Location: $url");
		}
	}
}