const body = document.querySelector('body');
const nav = document.querySelector('nav');
const searchToggle = document.querySelector('.searchToggle');
const sidelbarClose = document.querySelector('.sidelbarClose');
const sidebarOpen = document.querySelector('.sidebarOpen');

searchToggle.addEventListener('click', () => {
    searchToggle.classList.toggle('active');
});

sidebarOpen.addEventListener('click', () => {
    nav.classList.add('active');
});

sidelbarClose.addEventListener('click', () => {
    nav.classList.remove('active');
});

body.addEventListener('click', e => {
    let clickedElm = e.target;

    // Cierre del menú lateral si haces clic fuera
    if (!clickedElm.closest('.menu') && !clickedElm.classList.contains('sidebarOpen')) {
        nav.classList.remove('active');
    }

    // Cierre del buscador si haces clic fuera del ícono o campo de texto
    if (!clickedElm.closest('.searchBox')) {
        searchToggle.classList.remove('active');
    }
});



//CARRUSEL
  const contenedor = document.getElementById('contenedor');
  const slides = document.querySelectorAll('.carrusel-slide');
  let index = 0;

  function mover(direccion) {
    const visibleSlides = window.innerWidth <= 700 ? 1 : 4;
    const maxIndex = slides.length - visibleSlides;

    index += direccion;
    if (index < 0) index = 0;
    if (index > maxIndex) index = maxIndex;

    const slideWidth = slides[0].offsetWidth + 20; // incluye el gap
    contenedor.style.transform = `translateX(-${index * slideWidth}px)`;
  }

  // Opcional: movimiento automático
  setInterval(() => mover(1), 5000);

  