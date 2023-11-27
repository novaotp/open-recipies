<?php

class AuthService
{
  public static function new()
  {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  }

  public static function setUserId(int $id)
  {
    $_SESSION["user_id"] = $id;
  }

  public static function destroy()
  {
    $_SESSION["user_id"] = "";
    session_destroy();
  }

  public static function isValid(): bool {
    AuthService::new();

    if ($_SESSION["user_id"] === 0) {
      return false;
    }

    return true;
  }
}
