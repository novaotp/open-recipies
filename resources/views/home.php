<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link type="text/css" rel="stylesheet" href="/open-recipies/resources/styles/globals.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;0,900;1,400&display=swap">
</head>
<body class="relative z-0 p-10 flex flex-col justify-center">
  <h1 class="relative font-bold text-white text-5xl">Open Recipies</h1>
  <p class="text-gray-400 mt-10 text-justify">
    No idea about what to cook for dinner ? Or you want to share your favorite recipy to people all over the world ?
    No worries ! With Open Recipies, find the perfect recipy for your dinner or create one for others to enjoy !
    Interact with other people and discover new spots to eat in.
  </p>
  <a href="<?= URL_SUBFOLDER . '/auth/sign-up'; ?>" class="relative w-full h-[60px] flex justify-center items-center rounded-md text-white bg-orange-500 mt-10">Sign Up</a>
  <p
    class="relative text-gray-400 text-center my-5
      before:content-[''] before:absolute before:top-1/2 before:w-[40%] before:h-[1px] before:bg-gray-400 before:left-0
      after:content-[''] after:absolute after:top-1/2 after:w-[40%] after:h-[1px] after:bg-gray-400 after:right-0
    "
  >
    or
  </p>
  <a href="<?= URL_SUBFOLDER . '/auth/log-in'; ?>" class="relative w-full h-[60px] flex justify-center items-center rounded-md text-orange-500 border border-orange-500 bg-white">Log In</a>
</body>
</html>
