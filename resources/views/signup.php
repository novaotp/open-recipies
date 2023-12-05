<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/config/app.php');

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/repositories/userRepository.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/auth.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/utils/tag.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/utils/unless.php');

Auth::new();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $user = new User($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["password"]);

  $user_repo = new UserRepository();

  $response = $user_repo->create($user);

  if (!$response->success) {
    $info = $response->message;
  } else {
    header("Location: /auth/log-in");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - OpenRecipies</title>
  <?= Tag::link("/globals.min.css"); ?>
</head>

<body class="relative z-0">
  <?= Tag::component('/loading.php'); ?>
  <div class="absolute w-full h-2/3 bg-[url(/public/images/food.png)] bg-cover bg-center -z-10 shadow-[inset_0_-75px_50px_rgba(34,34,34,1)] blur-[2px] opacity-70"></div>
  <?php if (isset($info)): ?>
    <p style="color: red;">
      <?= $info; ?>
    </p>
  <?php endif; ?>
  <div class="relative w-full h-full p-10 flex flex-col justify-center items-center">
    <h1 class="relative text-5xl text-white font-bold mb-10">Sign Up</h1>
    <form action="/auth/sign-up" method="POST" class="relative w-full flex flex-col items-center">
      <div class="relative w-full h-[60px] mb-5">
        <p class="absolute -top-2 left-4 z-10 rounded-xl bg-black text-white text-xs px-2">Last Name</p>
        <input
          class="relative w-full h-full px-5 rounded-xl"
          type="text"
          name="lastName"
          value="<?= unless(isset($info), $user->lastName, ""); ?>"
          placeholder="Enter your last name here..."
        />
      </div>
      <div class="relative w-full h-[60px] mb-5">
        <p class="absolute -top-2 left-4 z-10 rounded-xl bg-black text-white text-xs px-2">First Name</p>
        <input
          class="relative w-full h-[60px] px-5 rounded-xl"
          type="text"
          name="firstName"
          value="<?= unless(isset($info), $user->firstName, ""); ?>"
          placeholder="Enter your first name here..."
        />
      </div>
      <div class="relative w-full h-[60px] mb-5">
        <p class="absolute -top-2 left-4 z-10 rounded-xl bg-black text-white text-xs px-2">Email</p>
        <input
          class="relative w-full h-[60px] px-5 rounded-xl"
          type="email"
          name="email"
          value="<?= unless(isset($info), $user->email, ""); ?>"
          placeholder="Enter your email here..."
        />
      </div>
      <div class="relative w-full h-[60px] mb-5">
        <p class="absolute -top-2 left-4 z-10 rounded-xl bg-black text-white text-xs px-2">Password</p>
        <input
          class="relative w-full h-[60px] px-5 rounded-xl"
          type="password"
          name="password"
          placeholder="Enter your password here..."
        />
      </div>
      <button class="relative px-5 py-3 flex justify-center items-center bg-orange-500 text-white rounded-xl" type="submit">Create account</button>
    </form>
    <p class="relative mt-5 text-white text-[14px]">
      <span>Already have an account ?</span>
      <a class="text-blue-600 underline" href="/auth/log-in">Log In</a>
  </div>
</body>

</html>