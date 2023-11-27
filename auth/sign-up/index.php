<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/config/app.php');

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/repositories/userRepository.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/authService.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/models/template.php');

AuthService::new();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $user = new User($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["password"]);

  $user_repo = new UserRepository();

  $response = $user_repo->create($user);

  if (!$response->success) {
    $info = $response->message;
  } else {
    header("Location: /auth/log-in");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - OpenRecipies</title>
  <?= Template::link("/src/resources/styles/globals.css"); ?>
  <?= Template::link("/auth/sign-up/style.css"); ?>
</head>

<body>
  <?php if (isset($info)): ?>
    <p style="color: red;">
      <?= $info; ?>
    </p>
  <?php endif; ?>
  <form action="/auth/sign-up" method="POST">
    <input type="text" name="lastName" <?php if (isset($info)): ?>value="<?= $user->lastName; ?>" <?php endif; ?>
      placeholder="Enter your last name here..." />
    <input type="text" name="firstName" <?php if (isset($info)): ?>value="<?= $user->firstName; ?>" <?php endif; ?>
      placeholder="Enter your first name here..." />
    <input type="email" name="email" <?php if (isset($info)): ?>value="<?= $user->email; ?>" <?php endif; ?>
      placeholder="Enter your email here..." />
    <input type="password" name="password" placeholder="Enter your password here..." />
    <button type="submit">Create account</button>
  </form>
  <p>Already have an account ? <a href="/auth/log-in">Log In</a>
</body>

</html>