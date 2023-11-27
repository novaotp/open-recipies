<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/repositories/userRepository.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/authService.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/middlewareService.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/models/template.php');

Middleware::run();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>App</title>
  <?= Template::link("/src/resources/styles/globals.css"); ?>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <?php require_once($_SERVER['DOCUMENT_ROOT'].'/src/resources/components/NavMenu.php') ?>
  <p class="underline font-bold">Successfully connected !</p>
</body>
</html>