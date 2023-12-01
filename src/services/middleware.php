<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/auth.php');

class Middleware
{
  public static function run()
  {
    Auth::new();

    if (!Auth::isValid()) {
      $from =  $_SERVER['REQUEST_URI'];
      header("Location: /auth/log-in?authenticated=false&from=$from");
    }
  }
}
