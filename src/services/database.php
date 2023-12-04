<?php

class Database
{

  /** Returns an instance of the `mysql` database connection. */
  public static function getInstance(): PDO
  {
    try {
      $env = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/.env');

      $dsn = "mysql:host=" . $env["DB_HOST"] . ";dbname=" . $env["DB_NAME"] . ";";
      return new PDO($dsn, $env["DB_USER"], $env["DB_PASSWORD"], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
}
