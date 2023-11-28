<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/models/user.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/models/response.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/databaseService.php');

/** A repository to manage CRUD operations on the user table. */
class UserRepository
{
  private PDO $db;

  public function __construct()
  {
    $this->db = DatabaseService::getInstance();
  }

  /**
   * Checks if the user's credentials match those in the database.
   * @param User $user The user whose credentials to check
   */
  public function checkCredentials(User $user): Response {
    $query = $this->db->prepare('SELECT * FROM openrecipiesdb.user WHERE email = ? LIMIT 1;');
    $query->bindValue(1, $user->email);
    $query->execute();
    $result = $query->fetch();

    if ($result && password_verify($user->password, $result['password'])) {
      return new Response(true, "Valid credentials.", $result['id']);
    }

    return new Response(false, 'Invalid credentials.');
  }

  private function emailExists(string $email)
  {
    $query = $this->db->prepare("SELECT * FROM openrecipiesdb.user WHERE email = ?;");
    $query->bindValue(1, $email);
    $query->execute();
    $result = $query->fetch();

    if ($result && $result['email'] == $email) {
      return true;
    }

    return false;
  }

  private function hashPassword(string $password)
  {
    return password_hash($password, PASSWORD_BCRYPT, ["cost" => 11]);
  }

  /**
   * Creates a new user in the database and returns its id.
   * @param User $account The user to add
   */
  public function create(User $user): Response
  {
    if ($this->emailExists($user->email)) {
      return new Response(false, "This email is already in use.");
    }

    $query = $this->db->prepare("INSERT INTO openrecipiesdb.user(first_name, last_name, email, password) VALUES(?, ?, ?, ?);");
    $query->bindValue(1, $user->firstName);
    $query->bindValue(2, $user->lastName);
    $query->bindValue(3, $user->email);
    $query->bindValue(4, $this->hashPassword($user->password));
    $query->execute();

    return new Response(true, "Created account successfully.");
  }

  /**
   * Reads from the database and returns a user if the id is set, all users otherwise.
   * @param int $id An optional id that retrieves the specific user instead of every user
   * @return User | User[]
   */
  public function read(int $id = null): User|array
  {
    if ($id === null) {
      $query = $this->db->prepare('SELECT * FROM openrecipiesdb.user;');
      $query->execute();
      $result = $query->fetch();

      $users = [];

      foreach ($result as $user) {
        array_push($users, new User($user['first_name'], $user['last_name'], $user['email'], $user['password']));
      }

      return $users;

    } else {
      $query = $this->db->prepare('SELECT * FROM openrecipiesdb.user WHERE id = ? LIMIT 1;');
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
    $query = $this->db->prepare("UPDATE openrecipiesdb.user SET first_name = ?, last_name = ?, email = ?, password = ? WHERE id = ?;");
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
    $query = $this->db->prepare("DELETE FROM openrecipiesdb.user WHERE id = ?;");
    $query->bindValue(1, $id);
    $query->execute();

    return true;
  }
}
