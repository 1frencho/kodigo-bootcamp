const scrollButton = document.getElementById('scroll-up');

window.addEventListener('scroll', () => {
  if (window.scrollY < 400) {
    scrollButton.style.display = 'none';
  } else {
    scrollButton.style.display = 'flex';
  }
});

const sr = ScrollReveal({
  origin: 'bottom',
  distance: '100px',
  duration: 1000,
});

sr.reveal('.hero', {
  duration: 1000,
  delay: 100,
  origin: 'bottom',
  distance: '100px',
});

sr.reveal('.features', {
  duration: 1000,
  delay: 100,
  origin: 'bottom',
  distance: '100px',
});

sr.reveal('.marketing', {
  duration: 1000,
  delay: 100,
  origin: 'top',
  distance: '100px',
});

sr.reveal('.description', {
  duration: 1000,
  delay: 100,
  origin: 'top',
  distance: '100px',
});

sr.reveal('.reviews', {
  duration: 1000,
  delay: 100,
  origin: 'top',
  distance: '100px',
});

sr.reveal('footer .logo, .footer-item, .social-media', {
  duration: 1000,
  delay: 100,
  origin: 'top',
  distance: '100px',
});
