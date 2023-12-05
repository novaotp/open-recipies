<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/repositories/userRepository.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/auth.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/middleware.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/utils/tag.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/utils/queryParam.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/utils/unless.php');

Middleware::run();

if (isset($_GET['sort']) && !in_array($_GET['sort'], ['trending', 'top-rated'])) {
  $url = QueryParam::remove($_SERVER['REQUEST_URI'], 'sort');
  header("Location: $url");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>App</title>
  <?= Tag::link("/globals.min.css"); ?>
</head>
<body class="relative z-0">
  <?php Tag::component('/loading.php') ?>
  <?php Tag::component('/navMenu.php') ?>
  <div class="absolute w-full h-1/2 bg-[url(/public/images/food.png)] bg-cover bg-center -z-10 shadow-[inset_0_-75px_50px_rgba(34,34,34,1)] blur-[2px] opacity-70"></div>
  <!-- Start | Add new recipy -->
  <a href="/app/new" class="absolute right-5 bottom-5 w-12 aspect-square bg-orange-500 flex justify-center items-center rounded-xl z-10">
    <!-- Plus from Font Awesome -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 448 512">
      <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
    </svg>
  </a>
  <!-- End | Add new recipy -->
  <!-- Start | Main Content -->
  <main class="relative w-full h-[calc(100%-5rem)] flex flex-col top-20 px-5 pb-5">
    <h1 class="text-4xl font-bold text-white mt-5">OpenRecipies</h1>
    <!-- Start | Search Input -->
    <div class="relative w-full h-12 rounded-md bg-white mt-10 flex">
      <input class="relative flex-grow h-full rounded-l-md px-3" id="search-value" type="text" value="<?= unless(isset($_GET['search']), $_GET['search'], ""); ?>" placeholder="Search a recipy..." />
      <button class="relative h-full aspect-square flex justify-center items-center" id="search">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 aspect-square" viewBox="0 0 512 512">
          <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
        </svg>
      </button>
    </div>
    <!-- End | Search Input -->
    <!-- Start | Sort + Filter -->
    <div class="relative w-full h-12 rounded-md mt-3 flex justify-between">
      <div class="relative w-[calc(50%-10px)] h-12 flex flex-col items-end">
        <?php
        $uri = $_SERVER['REQUEST_URI'];

        $newArr = ['href' => QueryParam::remove($uri, 'sort'), 'text' => 'New'];
        $trendingArr = ['href' => QueryParam::replace($uri,'sort', 'trending'), 'text' => 'Trending'];
        $topRatedArr = ['href' => QueryParam::replace($uri,'sort', 'top-rated'), 'text' => 'Top Rated'];

        if (!isset($_GET['sort'])) {
          $selected = 'New';
          $options = ['0' => $trendingArr, '1' => $topRatedArr];
        } elseif ($_GET['sort'] === 'trending') {
          $selected = 'Trending';
          $options = ['0' => $newArr, '1' => $topRatedArr];
        } else {
          $selected = 'Top Rated';
          $options = ['0' => $newArr, '1' => $trendingArr];
        }
        ?>
        <button id="show-sort-options" class="relative w-full min-h-[3rem] rounded-t-md rounded-bl-md rounded-br-md bg-orange-500 flex justify-evenly">
          <div class="relative w-1/3 h-full aspect-square flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 aspect-square" viewBox="0 0 576 512">
              <path d="M151.6 469.6C145.5 476.2 137 480 128 480s-17.5-3.8-23.6-10.4l-88-96c-11.9-13-11.1-33.3 2-45.2s33.3-11.1 45.2 2L96 365.7V64c0-17.7 14.3-32 32-32s32 14.3 32 32V365.7l32.4-35.4c11.9-13 32.2-13.9 45.2-2s13.9 32.2 2 45.2l-88 96zM320 480c-17.7 0-32-14.3-32-32s14.3-32 32-32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H320z"/>
            </svg>
          </div>
          <span class="w-2/3 h-full flex justify-center items-center font-medium"><?= $selected; ?></span>
        </button>
        <ul id="sort-options" class="relative w-2/3 hidden flex-col">
            <li class="w-full h-12 bg-orange-500 flex justify-end">
              <a href="<?= $options['0']['href']; ?>" class="w-full h-full flex justify-center items-center font-medium"><?= $options['0']['text']; ?></a>
            </li>
            <li class="w-full h-12 bg-orange-500 rounded-b-md border-0">
              <a href="<?= $options['1']['href']; ?>" class="w-full h-full flex justify-center items-center font-medium"><?= $options['1']['text']; ?></a>
            </li>
        </ul>
      </div>
      <div class="relative w-[calc(50%-10px)] h-12 rounded-md bg-orange-500 flex"></div>
    </div>
    <!-- End | Sort + Filter -->
  </main>
  <!-- End | Main Content -->
  <?= Tag::script('/app.js', true); ?>
</body>
</html>
