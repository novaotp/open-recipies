<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/authService.php');

class Middleware {
    public static function run() {
        AuthService::new();

        if (!AuthService::isValid()) {
            $from =  $_SERVER['REQUEST_URI'];
            header("Location: /auth/log-in?authenticated=false&from=$from");
        }
    }
}
