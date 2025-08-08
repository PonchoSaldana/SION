// Obtener el botón y el modal
const btnDetalle = document.querySelector('.detalles-btn');
const modal = document.getElementById('modal-detalles');
const modalNombre = document.getElementById('modal-nombre');
const modalPrecio = document.getElementById('modal-precio');
const modalEstado = document.getElementById('modal-estado');
const modalImagen = document.getElementById('modal-imagen');

// Mostrar el modal al hacer clic
btnDetalle.addEventListener('click', () => {
  modal.style.display = 'flex';
});

// Función para cerrar el modal
function cerrarModal() {
  modal.style.display = 'none';
}

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