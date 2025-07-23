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

//FUNCION DE NUMEROS DE CANTIDAD
document.addEventListener('DOMContentLoaded', function() {
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
                minusBtn.addEventListener('click', function() {
                    let currentValue = parseInt(quantityInput.value);
                    if (currentValue > parseInt(quantityInput.min)) { // Asegura que no baje del mínimo
                        quantityInput.value = currentValue - 1;
                        calculateAndDisplayTotals(); // Vuelve a calcular y mostrar todos los totales
                    }
                });

                // Listener para el botón de sumar
                plusBtn.addEventListener('click', function() {
                    let currentValue = parseInt(quantityInput.value);
                    quantityInput.value = currentValue + 1;
                    calculateAndDisplayTotals(); // Vuelve a calcular y mostrar todos los totales
                });

                // Listener para el cambio manual en el input (aunque sea readonly, por si se modifica)
                quantityInput.addEventListener('change', function() {
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