<?php 

namespace App\Controllers;

use App\Models\User;
use App\Providers\Middleware;
use App\Providers\Session;
use Exception;
use Symfony\Component\Routing\RouteCollection;

class SettingsController
{
    /** Send to the correct function depending on the method. */
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

    /** Shows the form for editing the user's account. */
    public function get(RouteCollection $routes)
    {
        $user = User::getFromSession();
		require_once APP_ROOT . '/resources/views/settings.php';
    }

    /** Updates the user's account with the given data. */
    public function put(RouteCollection $routes)
    {
        $userId = Session::getUserId();

        try {
            $user = new User($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password']);
            $user->update($userId);

        } catch (Exception $e) {
            $error = "Update failed";
            
        } finally {
            require_once APP_ROOT . '/resources/views/settings.php';
        }
    }

    /** Deletes the user's account using his session and redirecting him to the logout page. */
    public function delete(RouteCollection $routes)
    {
        $userId = Session::getUserId();

        try {
            User::delete($userId);

            $url = $routes->get('log-out')->getPath();
            header("Location: $url");

        } catch (Exception $e) {
            $error = "Delete failed";
            require_once APP_ROOT . '/resources/views/settings.php';
            
        }
    }
}
