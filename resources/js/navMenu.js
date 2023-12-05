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
