<?php

use App\Models\Recipe;

/** @var Recipe $recipe */
$recipe;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $recipe->name; ?> | Coo-King</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link type="text/css" rel="stylesheet" href="/resources/styles/globals.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;0,900;1,400&display=swap">
</head>
<body class="relative z-0">
  <?php require_once APP_ROOT . '/resources/php/loading.php'; ?>
  <nav class="fixed w-full h-20 p-5 flex justify-between items-center bg-[#222222] z-40">
    <a class="relative h-full flex items-center px-5 bg-gray-800 text-white rounded-xl" href="javascript:history.go(-1)">
        <!-- Left arrow icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" height="16" width="16" viewBox="0 0 512 512">
            <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"/>
        </svg>
        &nbsp;
        Back
    </a>
    <a href="<?= $routes->get('recipes')->getPath(); ?>" class="text-white p-2 flex items-center">
        <img width="40" src="/public/logo/logo.svg" alt="Coo-King Logo"></img>&nbsp;<span>Coo-King</span>
    </a>
  </nav>
  <main class="relative w-full top-20 px-5 pb-5 flex flex-col items-center">
    <h1 class="relative text-3xl font-bold my-10 text-white"><?= $recipe->name; ?></h1>
    <img src="<?= $recipe->thumbnail_url; ?>" alt="<?= $recipe->name;?>" class="relative w-full max-w-[600px] h-[200px] sm:h-[300px]"></img>
    <p  class="text-white relative w-full flex justify-start mt-5 font-bold max-w-[600px]">Category : <?= $recipe->category; ?></p>
    <div class="relative w-full mt-5 text-white text-justify max-w-[600px]">
        <?= $recipe->instructions; ?>
    </div>
  </main>
</body>
</html>
