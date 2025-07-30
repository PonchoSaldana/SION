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