<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/models/user.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/auth.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/middleware.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/utils/unless.php');

Middleware::run();

$user = User::getFromSession();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile - OpenRecipy</title>
</head>
<body>
  <h1>Hello <?= unless($user !== null, $user->firstName, "Unknown"); ?></h1>
</body>
</html>
