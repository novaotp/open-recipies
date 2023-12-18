<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings | Coo-King</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link type="text/css" rel="stylesheet" href="/resources/styles/globals.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;0,900;1,400&display=swap">
</head>
<body class="relative z-0">
  <?php require_once APP_ROOT . '/resources/php/loading.php'; ?>
  <?php require_once APP_ROOT . '/resources/php/navMenu.php'; ?>
  <?php if (isset($error)): ?>
    <toast-notification message="<?= $error; ?>" type="error"></toast-notification>
  <?php endif; ?>
  <main class="relative w-full h-[calc(100%-80px)] top-20 p-5 flex flex-col">
    <h1 class="relative text-3xl font-bold my-10 text-white">My Account</h1>
    <form action="<?= $routes->get("settings")->getPath(); ?>" method="POST" class="relative w-full flex flex-col items-center">
      <input type="hidden" name="_method" value="PUT">
      <div class="relative w-full h-[60px] mb-5">
        <label htmlFor="lastName" class="absolute -top-2 left-4 z-10 rounded-xl bg-black text-white text-xs px-2">Last Name</label>
        <input
          class="relative w-full h-full px-5 rounded-xl"
          type="text"
          name="lastName"
          value="<?= $user->lastName(); ?>"
          placeholder="Enter your new last name here..."
          required
          autoComplete="off"
        />
      </div>
      <div class="relative w-full h-[60px] mb-5">
        <label htmlFor="firstName" class="absolute -top-2 left-4 z-10 rounded-xl bg-black text-white text-xs px-2">First Name</label>
        <input
          class="relative w-full h-[60px] px-5 rounded-xl"
          type="text"
          name="firstName"
          value="<?= $user->firstName(); ?>"
          placeholder="Enter your new first name here..."
          required
          autoComplete="off"
        />
      </div>
      <div class="relative w-full h-[60px] mb-5">
        <label htmlFor="email" class="absolute -top-2 left-4 z-10 rounded-xl bg-black text-white text-xs px-2">Email</label>
        <input
          class="relative w-full h-[60px] px-5 rounded-xl"
          type="email"
          name="email"
          value="<?= $user->email(); ?>"
          placeholder="Enter your new email here..."
          required
          autoComplete="off"
        />
      </div>
      <div class="relative w-full h-[60px] mb-5">
        <label htmlFor="password" class="absolute -top-2 left-4 z-10 rounded-xl bg-black text-white text-xs px-2">Password</label>
        <input
          class="relative w-full h-[60px] px-5 rounded-xl"
          type="password"
          name="password"
          placeholder="Enter your new password here..."
          required
          autoComplete="off"
        />
      </div>
      <div class="relative w-full h-[50px] gap-5 flex justify-between">
        <a class="relative flex-grow flex justify-center items-center bg-gray-500 text-white rounded-xl text-[14px]" href="<?= $routes->get("settings")->getPath(); ?>">Cancel</a>
        <button class="relative flex-grow flex justify-center items-center bg-orange-500 text-white rounded-xl text-[14px]" type="submit">Update</button>
      </div>
    </form>
    <form action="<?= $routes->get("settings")->getPath(); ?>" method="POST" class="relative w-full flex flex-col items-center">
      <input type="hidden" name="_method" value="DELETE">
      <button class="relative w-full h-[50px] mt-5 flex justify-center items-center bg-red-500 text-white rounded-xl text-[14px]" type="submit">Delete my account</button>
      <p class="relative flex items-center mt-2 text-red-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="fill-red-500" height="16" width="16" viewBox="0 0 512 512">
          <path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/>
        </svg>
        &nbsp;
        <span>This action is irrevocable.</span>
      </p>
    </form>
  </main>
  <script type="module" src="/resources/js/toast.js"></script>
</body>
</html>
