<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/repositories/userRepository.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/auth.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/utils/tag.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/utils/unless.php');

Auth::new();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $user = new User("", "", $_POST["email"], $_POST["password"]);

  $user_repo = new UserRepository();

  $response = $user_repo->checkCredentials($user);

  if (!$response->success) {
    $info = $response->message;
  } else {
    Auth::setUserId($response->data);
    if (isset($_GET['from'])) {
      header("Location: $from");
    } else {
      header("Location: /app");
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In - OpenRecipies</title>
  <?= Tag::link("/globals.min.css"); ?>
</head>

<body class="relative z-0">
  <?= Tag::component('/loading.php'); ?>
  <?= unless(
        isset($_GET['authenticated']) && $_GET['authenticated'] === "false",
        "<p style=\"color: red;\">Failed to automatically authenticate. Please log in again.</p>",
        null
      );
  ?>
  <?= unless(isset($info), "<p style=\"color: red;\"><?= $info; ?></p>", null); ?>
  <form action="/auth/log-in" method="POST">
    <input type="email" name="email" value="<?= unless(isset($info), $user->email, ""); ?>" placeholder="Enter your email here..." />
    <input type="password" name="password" placeholder="Enter your password here..." />
    <button type="submit">Log In</button>
  </form>
  <p>Don't have an account yet ? <a href="/auth/sign-up">Create one now</a>
</body>

</html>