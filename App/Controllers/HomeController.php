<?php 

namespace App\Controllers;

class HomeController
{
    /** The get action */
	public function index()
	{
        require_once APP_ROOT . '/resources/views/home.php';
	}
}