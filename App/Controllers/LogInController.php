<?php 

namespace App\Controllers;

use App\Models\User;
use App\Providers\Auth;
use App\Providers\Database;

class LogInController
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

    /** The get action */
	public function get(User $defaultUser = null)
	{
		$user = $defaultUser !== null ? $defaultUser : new User();
        require_once APP_ROOT . '/resources/views/login.php';
	}

	/** The post action */
	public function post()
	{
		$db = Database::getInstance();
		$user = new User("", "", $_POST["email"], $_POST["password"]);

		$query = $db->prepare('SELECT * FROM openrecipiesdb.user WHERE email = ? LIMIT 1;');
		$query->bindValue(1, $user->email());
		$query->execute();
		$result = $query->fetch();

		if ($result && password_verify($user->password(), $result['password'])) {
			Auth::setUserId($result['id']);
			$url = URL_SUBFOLDER . '/app';
			header("Location: $url");
		} else {
			$error = "Invalid credentials.";
			$this->get($user);
		}
	}
}