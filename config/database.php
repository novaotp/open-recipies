<?php

use Dotenv\Dotenv;

$dotEnv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$DB_HOST = $_ENV['DB_HOST'];

define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASS', $_ENV['DB_PASS']);
define('DB_NAME', $_ENV['DB_NAME']);
