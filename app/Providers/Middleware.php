<?php

namespace App\Providers;

class Middleware
{
  /** Runs every middleware. */
  public static function run()
  {
    if (!Session::isValid()) {
      header("Location: /auth/log-in");
    }
  }
}
