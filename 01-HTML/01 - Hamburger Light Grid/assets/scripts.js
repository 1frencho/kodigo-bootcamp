const header = document.querySelector('header');

window.addEventListener('scroll', function () {
  header.classList.toggle('sticky', window.scrollY > 80);
});

let menuIcon = document.querySelector('#menu-icon');
let navList = document.querySelector('.navList');
const btnScroll = document.querySelector('.btn-scroll');

menuIcon.addEventListener('click', toggleMenu);

function toggleMenu() {
  menuIcon.classList.toggle('fa-times');
  navList.classList.toggle('open');
}

window.onscroll = function () {
  if (window.scrollY > 300) {
    btnScroll.style.display = 'block';
  } else {
    btnScroll.style.display = 'none';
  }
  menuIcon.classList.remove('fa-times');
  navList.classList.remove('open');
};

const sr = ScrollReveal({
  origin: 'top',
  distance: '85px',
  duration: 1500,
});

sr.reveal('.home-text', { delay: 300 });
sr.reveal('.home-img', { delay: 300 });
sr.reveal('.about-img', { delay: 300 });
sr.reveal('.about-text', { delay: 300 });
sr.reveal('.shop-content', { delay: 300 });
sr.reveal('.box', { delay: 300 });
