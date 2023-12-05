<?php

namespace App\Providers;

class Middleware
{
  public static function run()
  {
    Auth::new();

    $uri = $_SERVER['REQUEST_URI'];

    $allowedPathnameStarts = ['/', '/auth', '/app'];

    foreach ($allowedPathnameStarts as $path) {
      if (!str_starts_with($uri, $path)) {
        header("Location: /");
        return;
      }
    }

    if (!Auth::isValid()) {
      header("Location: /auth/log-in?authenticated=false&from=$uri");
      return;
    }
  }
}
