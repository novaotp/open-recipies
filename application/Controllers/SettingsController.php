<?php 

namespace App\Controllers;

use App\Models\User;
use App\Providers\Database;
use App\Providers\Middleware;
use App\Providers\Session;
use Exception;
use Symfony\Component\Routing\RouteCollection;

class SettingsController
{
	public function index(RouteCollection $routes)
	{
        Middleware::run();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$this->get($routes);
		} elseif ($_POST['_method'] === 'PUT') {
			$this->put($routes);
		} elseif ($_POST['_method'] === 'DELETE') {
			$this->delete($routes);
		} else {
			echo "Unallowed method on route.";
		}
	}

    public function get(RouteCollection $routes)
    {
        $user = User::getFromSession();
		require_once APP_ROOT . '/resources/views/settings.php';
    }

    public function put(RouteCollection $routes)
    {
        $userId = Session::getUserId();

        try {
            $db = Database::getInstance();
            $user = new User($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password']);

            $query = $db->prepare("UPDATE openrecipiesdb.user SET first_name = ?, last_name = ?, email = ?, password = ? WHERE id = ?;");
            $query->bindValue(1, $user->firstName());
            $query->bindValue(2, $user->lastName());
            $query->bindValue(3, $user->email());
            $query->bindValue(4, $user->password());
            $query->bindValue(5, $userId);
            $query->execute();

        } catch (Exception $e) {
            $error = "Update failed";
            
        } finally {
            require_once APP_ROOT . '/resources/views/settings.php';
        }
    }

    public function delete(RouteCollection $routes)
    {
        $userId = Session::getUserId();

        try {
            $db = Database::getInstance();

            $query = $db->prepare("DELETE FROM openrecipiesdb.user WHERE id = ?;");
            $query->bindValue(1, $userId);
            $query->execute();

            $url = $routes->get('log-out')->getPath();
            header("Location: $url");

        } catch (Exception $e) {
            $error = "Delete failed";
            require_once APP_ROOT . '/resources/views/settings.php';
            
        }
    }
}
