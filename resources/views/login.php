<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In - OpenRecipies</title>
  <link type="text/css" rel="stylesheet" href="<?= URL_SUBFOLDER; ?>/resources/styles/globals.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;0,900;1,400&display=swap">
</head>

<body class="relative z-0">
  <loading-screen></loading-screen>
  <?php if (isset($error)): ?>
    <toast-notification message="<?= $error; ?>" type="error"></toast-notification>
  <?php endif; ?>
  <div class="absolute w-full h-2/3 bg-[url(<?= URL_SUBFOLDER; ?>/public/images/food.png)] bg-cover bg-center -z-10 shadow-[inset_0_-75px_50px_rgba(34,34,34,1)] blur-[2px] opacity-70"></div>
  <div class="relative w-full h-full p-10 flex flex-col justify-center items-center">
    <h1 class="relative text-5xl text-white font-bold mb-10">Log In</h1>
    <form action="<?= URL_SUBFOLDER; ?>/auth/log-in" method="POST" class="relative w-full flex flex-col items-center">
      <div class="relative w-full h-[60px] mb-5">
        <label htmlFor="email" class="absolute -top-2 left-4 z-10 rounded-xl bg-black text-white text-xs px-2">Email</label>
        <input
          class="relative w-full h-[60px] px-5 rounded-xl"
          type="email"
          name="email"
          value="<?= $user->email(); ?>"
          placeholder="Enter your email here..."
        />
      </div>
      <div class="relative w-full h-[60px] mb-5">
        <label htmlFor="password" class="absolute -top-2 left-4 z-10 rounded-xl bg-black text-white text-xs px-2">Password</label>
        <input
          class="relative w-full h-[60px] px-5 rounded-xl"
          type="password"
          name="password"
          placeholder="Enter your password here..."
        />
      </div>
      <button class="relative px-5 py-3 flex justify-center items-center bg-orange-500 text-white rounded-xl text-[14px]" type="submit">Log In</button>
    </form>
    <p class="relative mt-5 text-white text-[14px]">
      <span>Not registered yet ?</span>
      <a class="text-blue-600 underline" href="<?= URL_SUBFOLDER . '/auth/sign-up'; ?>">Register now</a>
    </p>
  </div>
  <script type="module" src="<?= URL_SUBFOLDER; ?>/resources/js/loading.js"></script>
  <script type="module" src="<?= URL_SUBFOLDER; ?>/resources/js/toast.js"></script>
</body>

</html>