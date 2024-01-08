<?php
use App\Models\User;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Coo-King</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link type="text/css" rel="stylesheet" href="/resources/styles/globals.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;0,900;1,400&display=swap">
</head>
<body class="relative z-0">
    <?php require_once APP_ROOT . '/resources/php/loading.php'; ?>
    <?php require_once APP_ROOT . '/resources/php/navMenu.php'; ?>
    <?php /** @var User $user */ ?>
    <main class="relative w-full flex flex-col top-20 px-5 pb-5">
      <h1 class="text-white font-bold text-4xl my-5">Welcome back, <?= $user->firstName(); ?></h1>
      <p class="text-white">Here are 10 suggestions for you !</p>
      <ul class="relative w-full mt-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        <?php foreach ($recipes as $recipe) : ?>
        <li class="relative h-[200px] lg:h-[300px] w-full flex justify-between">
          <a
            href="<?= str_replace('{id}', $recipe->id, $routes->get('recipe')->getPath()); ?>"
            class="relative w-full h-full p-5 flex flex-col justify-end items-start rounded-xl bg-[url(<?= $recipe->thumbnail_url; ?>)] bg-cover bg-center shadow-[inset_0_-120px_60px_-60px_rgba(34,34,34,0.9)]"
          >
            <span class="text-2xl font-bold text-white"><?= $recipe->name; ?></span>
            <span class="text-[14px] text-white">Category : <?= $recipe->category; ?></span>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </main>
</body>
</html>
