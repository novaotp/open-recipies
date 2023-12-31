<?php

namespace App\Providers;

/** An intrinsic object for session-related methods. */
class Session
{
    /** Starts a new session if it doesn't exist yet. */
    public static function new(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /** Destroys the current session and removes every variable in it. */
    public static function destroy(): void
    {
        Session::new();

        $_SESSION["user_id"] = "";
        session_destroy();
    }

    /** Checks that the session's user id is valid. */
    public static function isValid(): bool
    {
        Session::new();

        if (Session::getUserId() === 0) {
            return false;
        }

        return true;
    }

    /** Gets the user id from the session. */
    public static function getUserId(): int
    {
        Session::new();

        if (!isset($_SESSION["user_id"])) {
            return 0;
        }

        return $_SESSION["user_id"];
    }

    /** Sets the user id in the session. */
    public static function setUserId(int $id)
    {
        Session::new();
        $_SESSION["user_id"] = $id;
    }
}
