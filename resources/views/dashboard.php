<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Coo-king</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link type="text/css" rel="stylesheet" href="/resources/styles/globals.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;0,900;1,400&display=swap">
</head>
<body>
  <?php require_once APP_ROOT . '/resources/php/loading.php'; ?>
  <?php require_once APP_ROOT . '/resources/php/navMenu.php'; ?>
  <p>Hello <?= isset($user) ? $user->firstName() : ""; ?></p>
</body>
</html>