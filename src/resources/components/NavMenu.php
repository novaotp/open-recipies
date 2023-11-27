<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/models/template.php');

?>

<nav class="absolute h-20 w-full p-5 flex justify-between items-center">
  <!-- Bars from Font Awesome -->
  <div id="nav-menu-open" class="h-8 w-8 cursor-pointer">
    <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" viewBox="0 0 448 512">
      <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/>
    </svg>
  </div>
  <!-- Circle User from Font Awesome -->
  <a class="h-8 w-8" href="/app/profile">
    <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" viewBox="0 0 512 512">
      <path d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/>
    </svg>
  </a>
</nav>

<menu id="nav-menu" class="absolute top-0 -left-full h-full w-full bg-red-600 duration-300 ease-out">
  <div class="h-20 p-5 flex justify-between items-center">
    <!-- XMark from Font Awesome -->
    <div id="nav-menu-close" class="h-8 w-8 cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
        <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
      </svg>
    </div>
  </div>
</menu>

<script>
  const navMenu = document.getElementById('nav-menu');
  const navMenuOpen = document.getElementById('nav-menu-open');
  const navMenuClose = document.getElementById('nav-menu-close');

  navMenuOpen.addEventListener('click', () => {
    navMenu.classList.remove('-left-full');
    navMenu.classList.add('left-0');
  });

  navMenuClose.addEventListener('click', () => {
    navMenu.classList.remove('left-0');
    navMenu.classList.add('-left-full');
  });
</script>
