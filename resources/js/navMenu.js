
class NavMenu extends HTMLElement {
  constructor() {
    super();
  }

  connectedCallback() {
    const wrapper = document.createElement('div');
    wrapper.className = "lg:hidden";
    wrapper.id = "mobileMenu";

    wrapper.innerHTML = `
      <nav class="absolute h-20 w-full p-5 flex justify-between items-center">
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
          <div id="nav-menu-close" class="h-8 w-8 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-white h-10" viewBox="0 0 384 512">
              <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
            </svg>
          </div>
          <a href="/app" class="text-white underline p-2">
            OpenRecipies
          </a>
        </nav>
        <ul class="relative w-full flex-grow flex flex-col justify-between p-5">
          <div>
            <li class="relative w-full h-[60px] mb-5">
              <a href="/" class="<?= $_SERVER["REQUEST_URI"] === "/app" ? "bg-white text-black" : "bg-[#444444] text-white" ?> relative w-full h-full p-5 rounded-xl flex justify-between items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="<?= $_SERVER["REQUEST_URI"] === "/app" ? "fill-black" : "fill-white" ?>" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                  <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                </svg>
                <span>Home</span>
              </a>
            </li>
            <li class="relative w-full h-[60px] mb-5">
              <a href="/app/favorites" class="<?= $_SERVER["REQUEST_URI"] === "/favorites" ? "bg-white text-black" : "bg-[#444444] text-white" ?> relative w-full h-full p-5 rounded-xl flex justify-between items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="<?= $_SERVER["REQUEST_URI"] === "/favorites" ? "fill-black" : "fill-white" ?>" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                  <path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                </svg>
                <span>My favorite recipies</span>
              </a>
            </li>
            <li class="relative w-full h-[60px]">
              <a href="/app/new" class="<?= $_SERVER["REQUEST_URI"] === "/new" ? "bg-white text-black" : "bg-[#444444] text-white" ?> relative w-full h-full p-5 rounded-xl flex justify-between items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="<?= $_SERVER["REQUEST_URI"] === "/new" ? "fill-black" : "fill-white" ?>" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                  <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg>
                <span>New recipy</span>
              </a>
            </li>
          </div>
          <div>
            <li class="relative w-full h-[60px] mb-5">
              <a href="/app/notifications" class="<?= $_SERVER["REQUEST_URI"] === "/notifications" ? "bg-white text-black" : "bg-[#444444] text-white" ?> relative w-full h-full p-5 rounded-xl flex justify-between items-center">
                <!-- Bell Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="<?= $_SERVER["REQUEST_URI"] === "/notifications" ? "fill-black" : "fill-white" ?>" height="16" width="14" viewBox="0 0 448 512">
                  <path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" />
                </svg>
                <span>Notifications</span>
              </a>
            </li>
            <li class="relative w-full h-[60px] mb-5">
              <a href="/app/settings" class="<?= $_SERVER["REQUEST_URI"] === "/settings" ? "bg-white text-black" : "bg-[#444444] text-white" ?> relative w-full h-full p-5 rounded-xl flex justify-between items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="<?= $_SERVER["REQUEST_URI"] === "/settings" ? "fill-black" : "fill-white" ?>" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                  <path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                </svg>
                <span>Settings</span>
              </a>
            </li>
            <li class="relative w-full h-[60px]">
              <a href="/auth/log-out" class="bg-red-500 text-white relative w-full h-full p-5 rounded-xl flex justify-between items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="<?= $_SERVER["REQUEST_URI"] === "/auth/log-out" ? "fill-black" : "fill-white" ?>" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                  <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                </svg>
                <span>Disconnect</span>
              </a>
            </li>
          </div>
        </ul>
        <footer class="relative h-20 flex justify-center items-center text-white">
          OpenRecipies <?php echo date("Y"); ?> - Sajidur Rahman
        </footer>
      </menu>
    
      <script type="text/javascript" type="module">
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
    `;

    const temp = document.importNode(wrapper, true);
    this.appendChild(temp);
  }
}

window.customElements.define('nav-menu', NavMenu);
