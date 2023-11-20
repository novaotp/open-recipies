<?php

require_once('E:\ANNEE_2023-2024\PR_WEB\P_Practice\P0009\open-recipies/src/repositories/userRepository.php');
require_once('E:\ANNEE_2023-2024\PR_WEB\P_Practice\P0009\open-recipies/src/services/authService.php');

AuthService::newSession();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $user = new User($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["password"]);

  $user_repo = new UserRepository();

  $userId = $user_repo->create($user);

  AuthService::setUserId($userId);

  header('Location: /app');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - OpenRecipies</title>
</head>
<body>
  <form action="/auth/sign-up" method="POST">
    <input type="text" name="lastName" placeholder="Enter your last name here..." />
    <input type="text" name="firstName" placeholder="Enter your first name here..." />
    <input type="email" name="email" placeholder="Enter your email here..." />
    <input type="password" name="password" placeholder="Enter your password here..." />
    <button type="submit">Create account</button>
  </form>
  <p>Already have an account ? <a href="/auth/log-in">Log In</a>
</body>
</html>