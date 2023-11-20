<?php

require_once('E:\ANNEE_2023-2024\PR_WEB\P_Practice\P0009\open-recipies/src/models/user.php');
require_once('E:\ANNEE_2023-2024\PR_WEB\P_Practice\P0009\open-recipies/src/services/databaseService.php');

/** A repository to manage CRUD operations on the user table. */
class UserRepository
{
  private PDO $db;

  public function __construct()
  {
    $this->db = (new DatabaseService())::getInstance();
  }

  private function hash_password(string $password)
  {
    return password_hash($password, PASSWORD_BCRYPT, ["cost" => 11]);
  }

  /**
   * Creates a new user in the database and returns its id.
   * @param User $account The user to add
   */
  public function create(User $user)
  {
    $query = $this->db->prepare("INSERT INTO user(first_name, last_name, email, password) VALUES(?, ?, ?, ?);");
    $query->bindValue(1, $user->firstName);
    $query->bindValue(2, $user->lastName);
    $query->bindValue(3, $user->email);
    $query->bindValue(4, $this->hash_password($user->password));
    $query->execute();

    $query = $this->db->prepare("SELECT * FROM user WHERE email = ? AND password = ? LIMIT 1;");
    $query->bindValue(1, $user->email);
    $query->bindValue(2, $this->hash_password($user->password));
    $query->execute();
    $result = $query->fetch();

    return $result['id'];
  }

  /**
   * Reads from the database and returns a user if the id is set, all users otherwise.
   * @param int $id An optional id that retrieves the specific user instead of every user
   */
  public function read(int $id = null) {
    if ($id === null) {
      $query = $this->db->prepare('SELECT * FROM user;');
      $query->execute();
      $result = $query->fetch();

      $users = [];

      foreach ($result as $user) {
        array_push($users, new User($user['first_name'], $user['last_name'], $user['email'], $user['password']));
      }

      return $users;

    } else {
      $query = $this->db->prepare('SELECT * FROM user WHERE id = ? LIMIT 1;');
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
    $query = $this->db->prepare("UPDATE user SET first_name = ?, last_name = ?, email = ?, password = ? WHERE id = ?;");
    $query->bindValue(1, $user->firstName);
    $query->bindValue(2, $user->lastName);
    $query->bindValue(3, $user->email);
    $query->bindValue(4, $this->hash_password($user->password));
    $query->bindValue(5, $id);
    $query->execute();

    return true;
  }

  /**
   * Deletes a user from the database via its id.
   */
  public function delete(int $id)
  {
    $query = $this->db->prepare("DELETE FROM account WHERE id = ?;");
    $query->bindValue(1, $id);
    $query->execute();

    return true;
  }
}
