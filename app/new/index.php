<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/middlewareService.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/models/template.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/repositories/ingredientRepository.php');

Middleware::run();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Recipy</title>
  <?= Template::link("/src/resources/styles/globals.min.css"); ?>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative z-0">
  <?php require_once($_SERVER['DOCUMENT_ROOT'].'/src/resources/components/loading.php') ?>
  <a href="/app">Annuler</a>
  <form action="/app/new" method="POST">
    <section>
      <input type="text" placeholder="Enter the recipy's title here..." />
    </section>
    <section>
      <select name="" id="">
        <?php foreach ((new IngredientRepository())->read() as $ingredient) : ?>
        <option name="<?= $ingredient->name; ?>"><?= $ingredient->name ?></option>
        <?php endforeach; ?>
      </select>
    </section>
  </form>
</body>
</html>
