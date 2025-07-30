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

// Modal para detalles del producto
document.addEventListener('DOMContentLoaded', function () {
    const productDetailsModal = document.getElementById('productDetailsModal');
    const closeModalBtn = document.getElementById('closeModalBtn'); // Botón 'X'
    const mainModalImage = document.getElementById('mainModalImage');
    const modalThumbnailsContainer = document.getElementById('modalThumbnailsContainer');
    const modalProductName = document.getElementById('modalProductName');
    const modalProductPrice = document.getElementById('modalProductPrice');
    const modalProductDescription = document.getElementById('modalProductDescription');
    const modalProductSpecs = document.getElementById('modalProductSpecs'); // Nuevo elemento para las especificaciones

    // Selecciona TODOS los botones que deben abrir el modal de producto
    const openProductModalButtons = document.querySelectorAll('.open-product-modal');

    // Itera sobre cada botón y añade el evento click
    openProductModalButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Prevenir el comportamiento por defecto del enlace

            // 1. Obtener la información del producto de los atributos data-* del botón
            const productName = this.dataset.productName;
            const productPrice = this.dataset.productPrice;
            const productDescription = this.dataset.productDescription;
            const mainImage = this.dataset.mainImage;
            const thumbnailsData = JSON.parse(this.dataset.thumbnails || '[]'); // Usar '[]' si no hay miniaturas
            const productSpecs = JSON.parse(this.dataset.productSpecs || '[]'); // Usar '[]' si no hay specs

            // 2. Rellenar el contenido del modal
            mainModalImage.src = mainImage;
            mainModalImage.alt = productName; // Mejorar la accesibilidad

            modalProductName.textContent = productName;
            modalProductPrice.textContent = `$${parseFloat(productPrice).toFixed(2)}`; // Formato de moneda
            modalProductDescription.textContent = productDescription;

            // Rellenar las especificaciones
            modalProductSpecs.innerHTML = ''; // Limpiar especificaciones anteriores
            productSpecs.forEach(spec => {
                const p = document.createElement('p');
                p.innerHTML = `<b>${spec.label}:</b> ${spec.value}`;
                modalProductSpecs.appendChild(p);
            });

            // Limpiar miniaturas existentes
            modalThumbnailsContainer.innerHTML = '';

            // Crear y añadir nuevas miniaturas
            thumbnailsData.forEach((thumbSrc, index) => {
                const thumbnailImg = document.createElement('img');
                thumbnailImg.src = thumbSrc;
                thumbnailImg.alt = `Miniatura ${index + 1} de ${productName}`;
                thumbnailImg.classList.add('modal-thumbnail');
                thumbnailImg.dataset.fullSrc = thumbSrc; // Guarda la ruta completa para el cambio de imagen
                if (index === 0) {
                    thumbnailImg.classList.add('active'); // La primera miniatura activa por defecto
                }
                modalThumbnailsContainer.appendChild(thumbnailImg);

                // Añadir evento click a cada miniatura
                thumbnailImg.addEventListener('click', function () {
                    document.querySelectorAll('.modal-thumbnail').forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    mainModalImage.src = this.dataset.fullSrc;
                });
            });

            // 3. Mostrar el modal
            productDetailsModal.style.display = 'flex';
        });
    });

    // Lógica para cerrar el modal (botón 'X')
    closeModalBtn.addEventListener('click', function () {
        productDetailsModal.style.display = 'none';
    });

    // Cierre del modal haciendo clic fuera de él
    window.addEventListener('click', function (event) {
        if (event.target === productDetailsModal) {
            productDetailsModal.style.display = 'none';
        }
    });

    // Cierre del modal con la tecla 'Escape'
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            productDetailsModal.style.display = 'none';
        }
    });

    // Lógica para el botón "Agregar a favoritos" dentro del modal
    const favoritesBtn = document.querySelector('.add-to-favorites-modal');
    if (favoritesBtn) {
        favoritesBtn.addEventListener('click', function () {
            // Aquí iría la lógica para agregar el producto actual a favoritos
            console.log("Producto agregado a favoritos!");
            // Puedes decidir si el modal se cierra o no después de esta acción
            // productDetailsModal.style.display = 'none'; 
        });
    }

    // Lógica para el botón "Agregar al carrito" dentro del modal
    const addToCartModalBtn = document.querySelector('.add-to-cart-modal');
    if (addToCartModalBtn) {
        addToCartModalBtn.addEventListener('click', function () {
            // Aquí iría la lógica para agregar el producto actual al carrito
            console.log("Producto agregado al carrito!");
            // Puedes decidir si el modal se cierra o no después de esta acción
            // productDetailsModal.style.display = 'none'; 
        });
    }
});