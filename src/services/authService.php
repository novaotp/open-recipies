<?php

class AuthService
{
  public static function newSession()
  {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  }

  public static function setUserId(int $id)
  {
    $_SESSION["user_id"] = $id;
  }

  public static function destroySession()
  {
    $_SESSION["user_id"] = "";
    session_destroy();
  }
}
