<?php

namespace App\Providers;

class Middleware
{
  public static function run()
  {
    $uri = $_SERVER['REQUEST_URI'];

    if (!Auth::isValid()) {
      header("Location: /auth/log-in?authenticated=false&from=$uri");
    }
  }
}
