<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  echo "Post accessed";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In - OpenRecipies</title>
</head>
<body>
  <form action="/auth/log-in" method="POST">
    <input type="email" name="email" placeholder="Enter your email here..." />
    <input type="password" name="password" placeholder="Enter your password here..." />
    <button type="submit">Log In</button>
  </form>
  <p>Don't have an account yet ? <a href="/auth/sign-up">Create one now</a>
</body>
</html>