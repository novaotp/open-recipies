<?php

use App\Providers\Session;

$isConnected = Session::isValid();
$uri = explode("?", $_SERVER["REQUEST_URI"])[0];

?>

<div class="lg:hidden">
    <nav class="absolute h-20 w-full p-5 flex justify-between items-center z-50">
        <button id="nav-menu-open" class="relative h-full aspect-square flex justify-center items-center">
            <div class="relative h-[25px] w-full flex flex-col justify-between items-start">
                <div class="relative h-[3px] w-full rounded-md bg-white"></div>
                <div class="relative h-[3px] w-2/3 rounded-md bg-white"></div>
                <div class="relative h-[3px] w-1/3 rounded-md bg-white"></div>
            </div>
        </button>
    </nav>
    <menu id="nav-menu" class="absolute top-0 -left-full h-full w-full bg-[#222222] duration-200 ease-out z-50 flex flex-col">
        <nav class="relative h-20 p-5 flex justify-between items-center">
            <!-- XMark from Font Awesome -->
            <button id="nav-menu-close" class="relative h-full aspect-square flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white h-10" viewBox="0 0 384 512">
                    <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
            </button>
            <a href="<?= $routes->get('recipes')->getPath(); ?>" class="text-white p-2 flex items-center">
                <img width="40" src="/public/logo/logo.svg" alt="Coo-King Logo"></img>&nbsp;<span>Coo-King</span>
            </a>
        </nav>
        <ul class="relative w-full flex-grow flex flex-col justify-between p-5">
            <div>
                <li class="<?= $isConnected ? "block" : "hidden" ?> relative w-full h-[60px] mb-5">
                    <a href="<?= $routes->get('dashboard')->getPath(); ?>" class="relative <?= $uri === $routes->get('dashboard')->getPath() ? "bg-white text-gray-800" : "bg-gray-800 text-white"; ?> w-full h-full p-5 rounded-xl flex justify-between items-center">
                        <!-- Home Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="<?= $uri === $routes->get('dashboard')->getPath() ? "fill-gray-800" : "fill-white"; ?>" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                            <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="relative w-full h-[60px] mb-5">
                    <a href="<?= $routes->get('recipes')->getPath(); ?>" class="relative <?= $uri === $routes->get('recipes')->getPath() ? "bg-white text-gray-800" : "bg-gray-800 text-white"; ?> w-full h-full p-5 rounded-xl flex justify-between items-center">
                        <!-- Food Bowl Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="<?= $uri === $routes->get('recipes')->getPath() ? "fill-gray-800" : "fill-white"; ?>" height="16" width="16" viewBox="0 0 512 512">
                            <path d="M0 192c0-35.3 28.7-64 64-64c.5 0 1.1 0 1.6 0C73 91.5 105.3 64 144 64c15 0 29 4.1 40.9 11.2C198.2 49.6 225.1 32 256 32s57.8 17.6 71.1 43.2C339 68.1 353 64 368 64c38.7 0 71 27.5 78.4 64c.5 0 1.1 0 1.6 0c35.3 0 64 28.7 64 64c0 11.7-3.1 22.6-8.6 32H8.6C3.1 214.6 0 203.7 0 192zm0 91.4C0 268.3 12.3 256 27.4 256H484.6c15.1 0 27.4 12.3 27.4 27.4c0 70.5-44.4 130.7-106.7 154.1L403.5 452c-2 16-15.6 28-31.8 28H140.2c-16.1 0-29.8-12-31.8-28l-1.8-14.4C44.4 414.1 0 353.9 0 283.4z" />
                        </svg>
                        <span>All recipes</span>
                    </a>
                </li>
            </div>
            <div class="flex flex-col items-center">
                <li class="<?= $isConnected ? "block" : "hidden" ?> relative w-full h-[60px] mb-5">
                    <a href="<?= $routes->get('settings')->getPath(); ?>" class="relative <?= $uri === $routes->get('settings')->getPath() ? "bg-white text-gray-800" : "bg-gray-800 text-white"; ?> w-full h-full p-5 rounded-xl flex justify-between items-center">
                        <!-- Gear Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="<?= $uri === $routes->get('settings')->getPath() ? "fill-gray-800" : "fill-white"; ?>" height="16" width="16" viewBox="0 0 512 512">
                            <path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                        </svg>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="<?= $isConnected ? "block" : "hidden" ?> relative w-full h-[60px]">
                    <a href="<?= $routes->get('log-out')->getPath(); ?>" class="bg-red-500 text-white relative w-full h-full p-5 rounded-xl flex justify-between items-center">
                        <!-- Log Out Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" height="16" width="16" viewBox="0 0 512 512">
                            <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                        </svg>
                        <span>Disconnect</span>
                    </a>
                </li>

                <p class="<?= $isConnected ? "hidden" : "block" ?> text-white text-center mb-5">Connect to an account to<br />access more features.</p>
                <li class="<?= $isConnected ? "hidden" : "block" ?> relative w-full h-[60px] mb-5">
                    <a href="<?= $routes->get('sign-up')->getPath(); ?>" class="bg-orange-500 text-white relative w-full h-full p-5 rounded-xl flex justify-between items-center">
                        <!-- Add User Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" height="16" width="20" viewBox="0 0 640 512">
                            <path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                        </svg>
                        <span>Sign Up</span>
                    </a>
                </li>
                <li class="<?= $isConnected ? "hidden" : "block" ?> relative w-full h-[60px]">
                    <a href="<?= $routes->get('log-in')->getPath(); ?>" class="bg-white text-orange-500 border relative w-full h-full p-5 rounded-xl flex justify-between items-center">
                        <!-- Log Out Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-orange-500" height="16" width="16" viewBox="0 0 512 512">
                            <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                        </svg>
                        <span>Log In</span>
                    </a>
                </li>
            </div>
        </ul>
        <footer class="relative h-20 flex justify-center items-center text-white">
            ©<span id="footer-year"></span>&nbsp;by Sajidur Rahman
        </footer>
    </menu>

    <script type="text/javascript">
        // Set dynamic footer year
        const footerYear = document.getElementById('footer-year');
        footerYear.innerHTML = new Date().getFullYear();

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
</div>

<nav class="hidden lg:flex absolute h-20 w-full p-5 justify-between items-center z-50">
    <ul class="relative w-full h-full flex justify-between">
        <a href="<?= $routes->get('recipes')->getPath(); ?>" class="text-white p-2 flex items-center">
            <img width="40" src="/public/logo/logo.svg" alt="Coo-King Logo"></img>&nbsp;<span>Coo-King</span>
        </a>
        <div class="flex">
            <li class="<?= $isConnected ? "block" : "hidden" ?> relative h-full mr-5">
                <a href="<?= $routes->get('dashboard')->getPath(); ?>" class="relative <?= $uri === $routes->get('dashboard')->getPath() ? "underline" : ""; ?> text-white w-full h-full p-5 rounded-xl flex justify-between items-center">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="relative h-full mb-5">
                <a href="<?= $routes->get('recipes')->getPath(); ?>" class="relative <?= $uri === $routes->get('recipes')->getPath() ? "underline" : ""; ?> text-white w-full h-full p-5 rounded-xl flex justify-between items-center">
                    <span>All recipes</span>
                </a>
            </li>
        </div>
        <div class="flex items-center">
            <li class="<?= $isConnected ? "block" : "hidden" ?> relative h-full mr-5">
                <a href="<?= $routes->get('settings')->getPath(); ?>" class="relative <?= $uri === $routes->get('settings')->getPath() ? "underline" : ""; ?> text-white w-full h-full p-5 rounded-xl flex justify-between items-center">
                    <span>Settings</span>
                </a>
            </li>
            <li class="<?= $isConnected ? "block" : "hidden" ?> relative h-full">
                <a href="<?= $routes->get('log-out')->getPath(); ?>" class="bg-red-500 text-white relative w-full h-full p-5 rounded-xl flex justify-between items-center">
                    <span>Disconnect</span>
                </a>
            </li>

            <li class="<?= $isConnected ? "hidden" : "block" ?> relative h-full mr-5">
                <a href="<?= $routes->get('sign-up')->getPath(); ?>" class="bg-orange-500 text-white relative w-full h-full p-5 rounded-xl flex justify-between items-center">
                    <span>Sign Up</span>
                </a>
            </li>
            <li class="<?= $isConnected ? "hidden" : "block" ?> relative h-full">
                <a href="<?= $routes->get('log-in')->getPath(); ?>" class="bg-white text-orange-500 border relative w-full h-full p-5 rounded-xl flex justify-between items-center">
                    <span>Log In</span>
                </a>
            </li>
        </div>
    </ul>
</nav>