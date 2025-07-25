//menu responsive
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

// SUBMENU AL PRECIONAR CATEGORÍA
document.addEventListener('DOMContentLoaded', function() {
    // Selecciona todos los enlaces que activarán un submenú
    const submenuToggles = document.querySelectorAll('[data-submenu-toggle]');

    submenuToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function(event) {
            event.preventDefault(); // Evita que el enlace de Categoría navegue a '#'

            // Obtén el elemento padre (el <li>)
            const parentLi = this.closest('li.has-submenu');

            if (parentLi) {
                // Alterna la clase 'submenu-open' en el <li> padre
                parentLi.classList.toggle('submenu-open');

                // Cierra otros submenús si están abiertos (opcional)
                document.querySelectorAll('.has-submenu.submenu-open').forEach(function(openSubmenu) {
                    if (openSubmenu !== parentLi) { // Si no es el menú que acabamos de hacer clic
                        openSubmenu.classList.remove('submenu-open');
                    }
                });
            }
        });
    });

    // Opcional: Cierra el submenú si se hace clic fuera de él
    document.addEventListener('click', function(event) {
        const openSubmenus = document.querySelectorAll('.has-submenu.submenu-open');
        openSubmenus.forEach(function(openSubmenu) {
            // Si el clic no fue dentro del submenú abierto
            if (!openSubmenu.contains(event.target)) {
                openSubmenu.classList.remove('submenu-open');
            }
        });
    });
});