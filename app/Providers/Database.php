<?php

namespace App\Providers;

use PDO, PDOException;

class Database
{
  /** Returns an instance of the `mysql` database connection. */
  public static function getInstance(): PDO
  {
    try {
      return new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";", DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    } catch (PDOException $e) {
      die($e->getMessage());
      
    }
  }
}
