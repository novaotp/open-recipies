<?php

use Utils\QueryParam;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recipies | Coo-King</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link type="text/css" rel="stylesheet" href="/resources/styles/globals.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;0,900;1,400&display=swap">
</head>
<body class="relative z-0">
  <?php require_once APP_ROOT . '/resources/php/loading.php'; ?>
  <?php require_once APP_ROOT . '/resources/php/navMenu.php'; ?>
  <div class="absolute w-full h-1/2 bg-[url(/public/images/food.png)] bg-cover bg-center -z-10 shadow-[inset_0_-125px_50px_-50px_rgba(34,34,34,1)] blur-[2px] opacity-70"></div>
  <!-- Start | Main Content -->
  <main class="relative w-full flex flex-col top-20 px-5 pb-5">
    <h1 class="text-4xl font-bold text-white mt-5">Coo-King</h1>
    <!-- Start | Search Input -->
    <div class="relative w-full min-h-[50px] rounded-md bg-white mt-10 flex justify-center items-center">
      <input class="relative w-[calc(100%-50px)] h-full rounded-l-md px-3" id="search-value" type="text" value="<?= $search; ?>" placeholder="Search a recipy..." />
      <button class="relative h-full w-[50px] flex justify-center items-center" id="search">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 aspect-square" viewBox="0 0 512 512">
          <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
        </svg>
      </button>
    </div>
    <!-- End | Search Input -->
    <!-- Start | Meals List -->
    <ul class="relative w-full mt-5 flex flex-col gap-5">
      <?php foreach ($meals as $meal) : ?>
      <li class="relative h-[200px] w-full flex justify-between">
        <a
          href="<?= str_replace('{id}', $meal->id, $routes->get('recipy')->getPath()); ?>"
          class="relative w-full h-full p-5 flex flex-col justify-end items-start rounded-xl bg-[url(<?= $meal->thumbnail_url; ?>)] bg-cover bg-center shadow-[inset_0_-120px_60px_-60px_rgba(34,34,34,0.9)]"
        >
          <span class="text-2xl font-bold text-white"><?= $meal->name; ?></span>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
    <!-- End | Meals List -->
  </main>
  <!-- End | Main Content -->
  <script type="text/javascript">
    // Searches for the term whilst removing all other paramaters
    const searchValue = document.getElementById('search-value');
    const search = document.getElementById('search');

    search.addEventListener('click', () => {
      if (searchValue.value === "") {
        window.location.href = "/recipies";
        return;
      }

      window.location.href = `/recipies?search=${searchValue.value}`;
    });
  </script>
</body>
</html>
