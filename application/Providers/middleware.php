<?php

namespace App\Providers;

class Middleware
{
  public static function run()
  {
    if (!Session::isValid()) {
      header("Location: /auth/log-in");
    }
  }
}
