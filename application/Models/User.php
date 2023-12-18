<?php

namespace App\Models;

use App\Providers\Session;
use App\Providers\Database;
use Exception;

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
   * Gets the user from the stored id in the session.
   * @return User | null The user if found, otherwise `null`
   */
  public static function getFromSession(): User | null {
    if (!Session::isValid()) {
      return null;
    }
  
    $user = User::read(Session::getUserId());
  
    return $user;
  }

  /**
   * Returns the first name of the user.
   * @param string $newValue An optional new value for the user's first name
   * @return string The first name of the user
   */
  public function firstName(string $newValue = null): string {
    if ($newValue !== null) {
      $this->firstName = $newValue;
    }

    return $this->firstName;
  }

  /**
   * Returns the last name of the user.
   * @param string $newValue An optional new value for the user's last name
   * @return string The last name of the user
   */
  public function lastName(string $newValue = null): string {
    if ($newValue !== null) {
      $this->lastName = $newValue;
    }

    return $this->lastName;
  }

  /**
   * Returns the email of the user.
   * @param string $newValue An optional new value for the user's email
   * @return string The email of the user
   */
  public function email(string $newValue = null): string {
    if ($newValue !== null) {
      $this->email = $newValue;
    }

    return $this->email;
  }

  /**
   * Returns the hashed password of the user.
   * @param string $newValue An optional new value for the user's hashed password
   * @return string The hashed password of the user
   */
  public function password(string $newValue = null): string {
    if ($newValue !== null) {
      $this->password = $newValue;
    }

    return $this->password;
  }

  /**
   * Hashes the password with a cost of `11` and returns the result.
   * @param string $password The plain password to hash
   * @return string The hashed password
   */
  private function hashPassword(string $password): string
  {
    return password_hash($password, PASSWORD_BCRYPT, ["cost" => 11]);
  }

  /**
   * Creates a new user in the database and returns its id.
   * @return bool A boolean indicating wether the creation was successful or not
   */
  public function create(): bool
  {
    try {
      $db = Database::getInstance();

      $query = $db->prepare("INSERT INTO openrecipiesdb.user(first_name, last_name, email, password) VALUES(?, ?, ?, ?);");
      $query->bindValue(1, $this->firstName);
      $query->bindValue(2, $this->lastName);
      $query->bindValue(3, $this->email);
      $query->bindValue(4, $this->hashPassword($this->password));
      $query->execute();

      return true;

    } catch (Exception $e) {
      var_dump("An error occurred while creating a user : ", $e->getMessage());
      return false;

    }
  }

  /**
   * Returns a user if the id is set, all users otherwise.
   * @param int $id An optional id that retrieves the specific user instead of all the users
   * @return User | User[] | null A single user if the id is supplied, an array of user otherwise. `null` if an error occurred.
   */
  public static function read(int $id = null): User|array|null
  {
    try {
      $db = Database::getInstance();

      if ($id === null) {
        $query = $db->prepare('SELECT * FROM openrecipiesdb.user;');
        $query->execute();
        $result = $query->fetchAll();

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

    } catch (Exception $e) {
      var_dump('An error occurred while reading (a) user(s) : ', $e->getMessage());
      return null;

    }
  }

  /**
   * Updates a user via its id.
   * @param int $id The id of the user in the database
   * @return bool A boolean indicating wether the update was successful or not
   */
  public function update(int $id): bool
  {
    try {
      $db = Database::getInstance();

      $query = $db->prepare("UPDATE openrecipiesdb.user SET first_name = ?, last_name = ?, email = ?, password = ? WHERE id = ?;");
      $query->bindValue(1, $this->firstName);
      $query->bindValue(2, $this->lastName);
      $query->bindValue(3, $this->email);
      $query->bindValue(4, $this->hashPassword($this->password));
      $query->bindValue(5, $id);
      $query->execute();

      return true;

    } catch (Exception $e) {
      var_dump("An error occurred while updating a user : ", $e->getMessage());
      return false;

    }
  }

  /**
   * Deletes a user via its id.
   * @param int $id The id of the user in the database
   * @return bool A boolean indicating wether the deletion was successful or not
   */
  public static function delete(int $id): bool
  {
    try {
      $db = Database::getInstance();

      $query = $db->prepare("DELETE FROM openrecipiesdb.user WHERE id = ?;");
      $query->bindValue(1, $id);
      $query->execute();

      return true;

    } catch (Exception $e) {
      var_dump("An error occurred while deleting a user : ", $e->getMessage());
      return false;

    }
  }
}
