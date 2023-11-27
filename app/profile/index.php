<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/repositories/userRepository.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/authService.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/middlewareService.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/libs/hooks/useUser.php');

Middleware::run();

$user = useUser();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile - OpenRecipy</title>
</head>
<body>
  <?php if ($user) : ?>
    <h1>Hello <?= $user->firstName; ?></h1>
  <?php endif; ?>
</body>
</html>
