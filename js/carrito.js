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

//FUNCION DE NUMEROS DE CANTIDAD
document.addEventListener('DOMContentLoaded', function () {
    // Seleccionamos todos los selectores de cantidad en la página
    const quantitySelectors = document.querySelectorAll('.custom-quantity-selector');
    // Seleccionamos los elementos donde mostraremos el gran total y el conteo de productos
    const grandTotalSpan = document.getElementById('grand-total');
    const productsCountTextSpan = document.getElementById('summary-products-count-text');

    /**
     * Calcula y actualiza los totales individuales de los productos
     * y el gran total en el resumen de compra.
     */
    function calculateAndDisplayTotals() {
        let currentGrandTotal = 0;
        let totalProductTypes = 0; // Contaremos el número de tipos de productos (tarjetas de producto)

        quantitySelectors.forEach(selector => {
            const quantityInput = selector.querySelector('input[type="number"]');
            const itemTotalSpan = selector.closest('.quantity-control-container').querySelector('.item-total');

            // Obtenemos el precio unitario del atributo data-price del contenedor padre
            const pricePerUnit = parseInt(selector.dataset.price);

            const quantity = parseInt(quantityInput.value);
            const itemTotal = quantity * pricePerUnit;

            // Actualiza el total individual de cada producto
            itemTotalSpan.textContent = `$${itemTotal}`;

            // Suma al gran total
            currentGrandTotal += itemTotal;

            // Incrementa el contador de tipos de productos
            totalProductTypes++;
        });

        // Actualiza el gran total en el resumen
        grandTotalSpan.textContent = `$${currentGrandTotal}`;

        // Actualiza el conteo de productos en el resumen
        productsCountTextSpan.textContent = `Productos ( ${totalProductTypes} )`;
    }

    // Agregamos listeners a cada selector de cantidad
    quantitySelectors.forEach(selector => {
        const minusBtn = selector.querySelector('[data-action="minus"]');
        const plusBtn = selector.querySelector('[data-action="plus"]');
        const quantityInput = selector.querySelector('input[type="number"]');

        // Listener para el botón de restar
        minusBtn.addEventListener('click', function () {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > parseInt(quantityInput.min)) { // Asegura que no baje del mínimo
                quantityInput.value = currentValue - 1;
                calculateAndDisplayTotals(); // Vuelve a calcular y mostrar todos los totales
            }
        });

        // Listener para el botón de sumar
        plusBtn.addEventListener('click', function () {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
            calculateAndDisplayTotals(); // Vuelve a calcular y mostrar todos los totales
        });

        // Listener para el cambio manual en el input (aunque sea readonly, por si se modifica)
        quantityInput.addEventListener('change', function () {
            let currentValue = parseInt(this.value);
            if (isNaN(currentValue) || currentValue < parseInt(this.min)) {
                this.value = this.min;
            }
            calculateAndDisplayTotals(); // Vuelve a calcular y mostrar todos los totales
        });
    });

    // Llamamos a la función de cálculo de totales al cargar la página
    // Esto asegura que los totales iniciales (incluyendo el gran total) sean correctos.
    calculateAndDisplayTotals();
});


// Función para desplazar el carrusel de productos
const carousel = document.getElementById('productCarousel');

function scrollCarousel(direction) {
    const scrollAmount = 240; // Ancho de la tarjeta + gap (220px + 20px)
    carousel.scrollBy({
        left: direction * scrollAmount,
        behavior: 'smooth'
    });
}

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