<?php

namespace App\Models;

use App\Providers\Session;
use App\Providers\Database;
use Utils\Response;

/** A model of a user object. */
class User {
  private string $firstName;
  private string $lastName;
  private string $email;
  private string $password;

  public function __construct(string $firstName = "", string $lastName = "", string $email = "", string $password = "")
  {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->password = $password;
  }

  /**
   * Gets the user from the session.
   * @return User | null The user if found, otherwise `null`
   */
  public static function getFromSession(): User | null {
    if (!Session::isValid()) {
      return null;
    }
  
    $user = User::read(Session::getUserId());
  
    return $user;
  }

  public function firstName(string $newValue = null): string {
    if ($newValue !== null) {
      $this->firstName = $newValue;
    }

    return $this->firstName;
  }

  public function lastName(string $newValue = null): string {
    if ($newValue !== null) {
      $this->lastName = $newValue;
    }

    return $this->lastName;
  }

  public function email(string $newValue = null): string {
    if ($newValue !== null) {
      $this->email = $newValue;
    }

    return $this->email;
  }

  public function password(string $newValue = null): string {
    if ($newValue !== null) {
      $this->password = $newValue;
    }

    return $this->password;
  }

  public function setAll(string $firstName = "", string $lastName = "", string $email = "", string $password = ""): void {
    $this->firstName($firstName);
    $this->lastName($lastName);
    $this->email($email);
    $this->password($password);
  }

  private function hashPassword(string $password)
  {
    return password_hash($password, PASSWORD_BCRYPT, ["cost" => 11]);
  }

  /**
   * Creates a new user in the database and returns its id.
   * @param User $account The user to add
   */
  public function create(): Response
  {
    $db = Database::getInstance();

    $query = $db->prepare("INSERT INTO openrecipiesdb.user(first_name, last_name, email, password) VALUES(?, ?, ?, ?);");
    $query->bindValue(1, $this->firstName);
    $query->bindValue(2, $this->lastName);
    $query->bindValue(3, $this->email);
    $query->bindValue(4, $this->hashPassword($this->password));
    $query->execute();

    return new Response(true, "Created account successfully.");
  }

  /**
   * Reads from the database and returns a user if the id is set, all users otherwise.
   * @param int $id An optional id that retrieves the specific user instead of every user
   * @return User | User[]
   */
  public static function read(int $id = null): User|array
  {
    $db = Database::getInstance();

    if ($id === null) {
      $query = $db->prepare('SELECT * FROM openrecipiesdb.user;');
      $query->execute();
      $result = $query->fetch();

      $users = [];

      foreach ($result as $user) {
        array_push($users, new User($user['first_name'], $user['last_name'], $user['email'], $user['password']));
      }

      return $users;

    } else {
      $query = $db->prepare('SELECT * FROM openrecipiesdb.user WHERE id = ? LIMIT 1;');
      $query->bindValue(1, $id);
      $query->execute();
      $result = $query->fetch();

      return new User($result['first_name'], $result['last_name'], $result['email'], $result['password']);

    }
  }

  /**
   * Updates a user via its id.
   * @param int $id The id of the user in the database
   * @param User $user The new data of the user
   */
  public function update(int $id, User $user)
  {
    $db = Database::getInstance();

    $query = $db->prepare("UPDATE openrecipiesdb.user SET first_name = ?, last_name = ?, email = ?, password = ? WHERE id = ?;");
    $query->bindValue(1, $user->firstName);
    $query->bindValue(2, $user->lastName);
    $query->bindValue(3, $user->email);
    $query->bindValue(4, $this->hashPassword($user->password));
    $query->bindValue(5, $id);
    $query->execute();

    return true;
  }

  /**
   * Deletes a user from the database via its id.
   */
  public function delete(int $id)
  {
    $db = Database::getInstance();

    $query = $db->prepare("DELETE FROM openrecipiesdb.user WHERE id = ?;");
    $query->bindValue(1, $id);
    $query->execute();

    return true;
  }
}
