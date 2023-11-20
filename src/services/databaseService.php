<?php

class DatabaseService {

  /** Returns an instance of the database connection. */
  public static function getInstance(): PDO {
    try {
      $env = parse_ini_file('E:\ANNEE_2023-2024\PR_WEB\P_Practice\P0009\open-recipies/.env');

      $dsn = "pgsql:host=" . $env["DB_HOST"]. ";port=" . $env["DB_PORT"] . ";dbname=" . $env["DB_NAME"] . ";";
      return new PDO($dsn, $env["DB_USER"], $env["DB_PASSWORD"], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    } catch (PDOException $e) {
      die($e->getMessage());

    }
  }
}
