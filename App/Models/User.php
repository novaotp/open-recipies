<?php

namespace App\Models;

use App\Providers\Auth;
use App\Repositories\UserRepository;

/** A model of a user object. */
class User {
  public readonly string $firstName;
  public readonly string $lastName;
  public readonly string $email;
  public readonly string $password;

  public function __construct(string $firstName, string $lastName, string $email, string $password)
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
    if (!Auth::isValid()) {
      return null;
    }
  
    $user_repo = new UserRepository();
    $user = $user_repo->read(Auth::getUserId());
  
    return $user;
  }
}
