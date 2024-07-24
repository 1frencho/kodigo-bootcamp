const header = document.querySelector('header');
let menuIcon = document.querySelector('#menu-icon');
let navList = document.querySelector('.navList');

menuIcon.addEventListener('click', function () {
  menuIcon.classList.toggle('fa-times');
  navList.classList.toggle('open');
});

window.addEventListener('scroll', function () {
  header.classList.toggle('sticky', window.scrollY > 80);
});

window.onscroll = function () {
  if (window.scrollY > 300) {
    menuIcon.classList.remove('fa-times');
    navList.classList.remove('open');
  }
};
