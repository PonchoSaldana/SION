// Selecciona todos los elementos del DOM necesarios
const body = document.querySelector('body');
const nav = document.querySelector('nav');
const searchToggle = document.querySelector('.searchToggle');
const sidebarOpen = document.querySelector('.sidebarOpen');
const sidelbarClose = document.querySelector('.sidelbarClose');
const hasSubmenuLink = document.querySelector('.has-submenu a'); // Solo necesitamos seleccionar el enlace de "Categoría"

// --- Lógica del buscador ---
searchToggle.addEventListener('click', () => {
    // Alterna la clase 'active' para mostrar/ocultar el campo de búsqueda
    searchToggle.classList.toggle('active');
});

// --- Lógica del menú lateral (sidebar) ---
sidebarOpen.addEventListener('click', () => {
    // Agrega la clase 'active' al <nav> para mostrar el menú lateral
    nav.classList.add('active');
});

sidelbarClose.addEventListener('click', () => {
    // Remueve la clase 'active' del <nav> para ocultar el menú lateral
    nav.classList.remove('active');
});

// --- Lógica del submenú (Categoría) ---
hasSubmenuLink.addEventListener('click', (event) => {
    // Evita que el navegador navegue a '#' al hacer clic
    event.preventDefault();

    // Selecciona el elemento padre <li> del enlace de categoría
    const parentLi = event.target.closest('li.has-submenu');
    
    // Alterna la clase 'active' para mostrar/ocultar el submenú
    parentLi.classList.toggle('active');
});

// --- Lógica para cerrar menús al hacer clic fuera ---
body.addEventListener('click', e => {
    const clickedElm = e.target;

    // Cierra el menú lateral si el clic no fue dentro del menú ni en el botón de hamburguesa
    if (!clickedElm.closest('.menu') && !clickedElm.classList.contains('sidebarOpen')) {
        nav.classList.remove('active');
        // También cierra el submenú si está abierto
        document.querySelector('.has-submenu').classList.remove('active');
    }

    // Cierra el campo de búsqueda si el clic no fue dentro de la caja de búsqueda
    if (!clickedElm.closest('.searchBox')) {
        searchToggle.classList.remove('active');
    }
});


// CARRUSEL
const contenedor = document.getElementById('contenedor');
const slides = document.querySelectorAll('.carrusel-slide');
let index = 0;

function mover(direccion) {
    const visibleSlides = window.innerWidth <= 700 ? 1 : 4;
    const maxIndex = slides.length - visibleSlides;

    index += direccion;

    // --- Lógica para el bucle ---
    if (index > maxIndex) {
        index = 0; // Regresa al principio si llega al final
    } else if (index < 0) {
        index = maxIndex; // Va al final si intenta ir hacia atrás desde el principio
    }
    // --- Fin de la lógica para el bucle ---

    const slideWidth = slides[0].offsetWidth + 20; // incluye el gap
    contenedor.style.transform = `translateX(-${index * slideWidth}px)`;
}

// Opcional: movimiento automático
setInterval(() => mover(1), 5000);

// SUBMENU AL PRECIONAR CATEGORÍA
document.addEventListener('DOMContentLoaded', function () {
    // Selecciona todos los enlaces que activarán un submenú
    const submenuToggles = document.querySelectorAll('[data-submenu-toggle]');

    submenuToggles.forEach(function (toggle) {
        toggle.addEventListener('click', function (event) {
            event.preventDefault(); // Evita que el enlace de Categoría navegue a '#'

            // Obtén el elemento padre (el <li>)
            const parentLi = this.closest('li.has-submenu');

            if (parentLi) {
                // Alterna la clase 'submenu-open' en el <li> padre
                parentLi.classList.toggle('submenu-open');

                // Cierra otros submenús si están abiertos (opcional)
                document.querySelectorAll('.has-submenu.submenu-open').forEach(function (openSubmenu) {
                    if (openSubmenu !== parentLi) { // Si no es el menú que acabamos de hacer clic
                        openSubmenu.classList.remove('submenu-open');
                    }
                });
            }
        });
    });

    // Opcional: Cierra el submenú si se hace clic fuera de él
    document.addEventListener('click', function (event) {
        const openSubmenus = document.querySelectorAll('.has-submenu.submenu-open');
        openSubmenus.forEach(function (openSubmenu) {
            // Si el clic no fue dentro del submenú abierto
            if (!openSubmenu.contains(event.target)) {
                openSubmenu.classList.remove('submenu-open');
            }
        });
    });
});