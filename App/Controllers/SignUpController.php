<?php 

namespace App\Controllers;

class SignUpController
{
    /** The get action */
	public function index()
	{
        require_once APP_ROOT . '/resources/views/signup.php';
	}
}