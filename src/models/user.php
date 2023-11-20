<?php
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
}
