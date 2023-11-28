<?php

class AuthService
{
  /** Starts a new session if it doesn't exist yet. */
  public static function new()
  {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  }

  /** Destroys the current session. */
  public static function destroy()
  {
    AuthService::new();
    
    $_SESSION["user_id"] = "";
    session_destroy();
  }

  /** Checks that the session's user id is valid. */
  public static function isValid(): bool
  {
    AuthService::new();

    if (AuthService::getUserId() === 0) {
      return false;
    }

    return true;
  }

  /** Gets the user id from the session. */
  public static function getUserId(): int
  {
    AuthService::new();

    if (!isset($_SESSION["user_id"])) {
      return 0;
    }

    return $_SESSION["user_id"];
  }

  /** Sets the user id in the session. */
  public static function setUserId(int $id)
  {
    $_SESSION["user_id"] = $id;
  }
}
