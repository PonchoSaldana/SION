<?php
include("../config/sesion.php");

// Conexión a la base de datos (solo para consistencia, aunque no se usa directamente aquí)
$conexion = new mysqli("localhost", "root", "", "sion_db");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Mostrar mensaje de éxito o error si existe
$message = '';
if (isset($_GET['success'])) {
    $message = '<div class="alert alert-success text-center">' . htmlspecialchars($_GET['success']) . '</div>';
} elseif (isset($_GET['error'])) {
    $message = '<div class="alert alert-danger text-center">' . htmlspecialchars($_GET['error']) . '</div>';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sion Wireless - Carrito</title>
    <link rel="shortcut icon" href="../public/img/LOGO/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../public/css/carrito.css">
    <link rel="stylesheet" href="../public/css/modales.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!--ENCABEZADO----------------------------------------------------------->
    <nav>
        <div class="nav-bar">
            <i class="bx bx-menu sidebarOpen"></i>
            <span class="logo navLogo"><a href="../index.php">
                    <img src="../public/img/LOGO/sin fondo.png" alt="Logo SION" height="100"></a>
            </span>
            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="../index.php"><img src="../public/img/LOGO/sin fondo.png" alt="Logo SION" height="90"></a></span>
                    <i class="bx bx-x sidelbarClose"></i>
                </div>
                <ul class="nav-links">
                    <li class="has-submenu">
                        <a href="#" data-submenu-toggle>Categoría</a>
                        <ul class="submenu">
                            <li><a href="../public/submenu/antenas.php">Antenas</a></li>
                            <li><a href="../public/submenu/camaras.php">Cámaras de seguridad</a></li>
                            <li><a href="../public/submenu/cables.php">Cables de red</a></li>
                            <li><a href="../public/submenu/conectoresJaks.php">Conectores y jacks</a></li>
                            <li><a href="../public/submenu/modems.php">Módems</a></li>
                            <li><a href="../public/submenu/switch.php">Switches</a></li>
                            <li><a href="../public/submenu/router.php">Routers</a></li>
                        </ul>
                    </li>
                    <li><a href="Servicios.php">Servicios</a></li>
                    <li><a href="ofertas.php">Ofertas</a></li>
                    <li><a href="compras.php">Compras</a></li>
                    <li><a href="favoritos.php">Favoritos</a></li>
                    <li><a href="todos_los_productos.php">Todos los productos</a></li>
                    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                        <li><a href="panelAdmin.php">Panel de Administración</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="searchBox">
                <div class="iconUser">
                    <a href="<?php echo $usuarioLogueado ? '../model/mi_cuenta.php' : '../views/login.php'; ?>" style="color: white;">
                        <i class='bx bx-user user'></i></a>
                </div>
                <div class="searchToggle">
                    <i class="bx bx-x cancel"></i>
                    <i class="bx bx-search search"></i>
                </div>
                <div class="iconCarrito">
                    <a href="carrito.php" style="color: white;">
                        <i class='bx bx-cart cart'></i></a>
                    <span id="productos">0</span>
                </div>
                <div class="search-field">
                    <form action="../app/controllers/buscar.php" method="GET">
                        <input type="text" name="q" placeholder="Buscar productos..." required class="form-control me-2" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
                        <button type="submit"><i class='bx bx-search'></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <!--------------------------------------------------------------------------->
    <hr>
    <section class="banner"></section>
    <!-- Contenedor principal del carrito -->
    <section class="contenedor-carrito">
        <!-- Tabla de productos y resumen -->
        <h1 class="my-cart-title">Mi Carrito</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-7 col-sm-12 mb-4">
                    <div class="products-main-container">
                        <div class="header-row">
                            <div style="flex: 2;">Productos</div>
                            <div style="flex: 1; text-align: center;">Cantidad</div>
                            <div style="flex: 1; text-align: right;">Total</div>
                        </div>
                        <div class="product-list-container" id="productListContainer">
                            <!-- Productos se cargan dinámicamente con JavaScript -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 mb-4">
                    <div class="summary-container">
                        <br>
                        <div class="summary-header">
                            Resumen de compra
                        </div>
                        <div class="summary-item">
                            <span id="summary-products-count-text">Productos (0)</span>
                            <span></span>
                        </div>
                        <div class="summary-item total">
                            <span>Total</span>
                            <span class="value" id="grand-total">$0</span>
                        </div>
                        <!-- Botón de Comprar en el resumen -->
                        <button class="buy-button" type="button" id="confirmarCompraBtn">Comprar</button>

                        <!-- Modal de confirmación de compra -->
                        <div class="modal fade" id="confirmarCompraModal" tabindex="-1" aria-labelledby="confirmarCompraLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmarCompraLabel">Confirmar compra</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estás seguro que quieres realizar esta compra?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-success" id="confirmarCompraModalBtn">Realizar compra</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br><br>
    </section>



    <!-- Pie de página -->
    <footer class="main-footer">
        <div class="footer-section footer-logo">
            <img src="../public/img/LOGO/sin fondo.png" alt="Logo SION">
            <p>© 2025 SION System Wireless. <br>Todos los derechos reservados.</p>
        </div>
        <div class="footer-section">
            <h4>Contacto</h4>
            <ul>
                <li><a href="mailto:correo@ejemplo.com">SION@gmail.com</a></li>
                <li><a href="tel:+525555555555">55-5555-5555</a></li>
                <li><a href="https://maps.google.com/?q=ubicacion_de_la_tienda" target="_blank">Tienda Física</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Empresa</h4>
            <ul>
                <li><a href="#">Política de privacidad</a></li>
                <li><a href="#">Términos y condiciones</a></li>
                <li><a href="#">Promoción y ofertas</a></li>
            </ul>
        </div>
    </footer>

    <script>
        // Funciones para el carrusel
        function scrollCarousel(direction) {
            const carousel = document.getElementById('productCarousel');
            carousel.scrollLeft += direction * 300;
        }

        // Función para agregar al carrito
        function agregarAlCarrito(nombre, precio, imagen) {
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const productoExistente = carrito.find(p => p.nombre === nombre && p.imagen === imagen);

            if (productoExistente) {
                productoExistente.cantidad += 1;
            } else {
                carrito.push({
                    nombre,
                    precio: parseFloat(precio),
                    imagen,
                    cantidad: 1
                });
            }
            localStorage.setItem('carrito', JSON.stringify(carrito));
            mostrarCarrito();
            Swal.fire({
                icon: 'success',
                title: 'Agregado',
                text: 'Producto agregado al carrito.',
                confirmButtonText: 'Ok'
            });
        }

        // Función para obtener el carrito
        function obtenerCarrito() {
            return JSON.parse(localStorage.getItem('carrito')) || [];
        }

        // Función para mostrar el carrito
        function mostrarCarrito() {
            const lista = document.getElementById('productListContainer');
            const resumen = document.getElementById('summary-products-count-text');
            const total = document.getElementById('grand-total');
            const productosSpan = document.querySelector('.iconCarrito #productos');
            const carrito = obtenerCarrito();

            lista.innerHTML = '';
            let sumaTotal = 0;

            carrito.forEach((producto, index) => {
                const subtotal = producto.precio * producto.cantidad;
                sumaTotal += subtotal;

                const card = document.createElement('div');
                card.className = 'product-card';
                card.innerHTML = `
                    <img src="${producto.imagen}" alt="${producto.nombre}">
                    <div class="product-details">
                        <h5>${producto.nombre}</h5>
                        <div class="product-actions">
                            <button class="btn btn-danger btn-sm" onclick="eliminarProducto(${index})">Eliminar</button>
                            <span class="price">$${producto.precio.toFixed(2)}</span>
                        </div>
                    </div>
                    <div class="quantity-control-container">
                        <div class="input-group custom-quantity-selector" data-index="${index}">
                            <button class="btn btn-outline-secondary" type="button" onclick="actualizarCantidad(${index}, -1)">-</button>
                            <input type="number" class="form-control" value="${producto.cantidad}" min="1" readonly>
                            <button class="btn btn-outline-secondary" type="button" onclick="actualizarCantidad(${index}, 1)">+</button>
                        </div>
                        <span class="item-total">$${subtotal.toFixed(2)}</span>
                    </div>
                `;
                lista.appendChild(card);
            });

            resumen.textContent = `Productos (${carrito.length})`;
            total.textContent = `$${sumaTotal.toFixed(2)}`;
            productosSpan.textContent = carrito.length; // Actualizar contador en el ícono del carrito
        }

        // Función para eliminar un producto
        function eliminarProducto(index) {
            let carrito = obtenerCarrito();
            carrito.splice(index, 1);
            localStorage.setItem('carrito', JSON.stringify(carrito));
            mostrarCarrito();
        }

        // Función para actualizar la cantidad
        function actualizarCantidad(index, cambio) {
            let carrito = obtenerCarrito();
            carrito[index].cantidad += cambio;
            if (carrito[index].cantidad < 1) carrito[index].cantidad = 1;
            localStorage.setItem('carrito', JSON.stringify(carrito));
            mostrarCarrito();
        }

        // Ejecutar al cargar la página
        document.addEventListener('DOMContentLoaded', () => {
            mostrarCarrito();

            // Botón principal de "Comprar" que abre el modal
            document.getElementById('confirmarCompraBtn').addEventListener('click', () => {
                const carrito = obtenerCarrito();
                if (carrito.length === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Carrito vacío',
                        text: 'No tienes productos en tu carrito.',
                        confirmButtonText: 'Ok'
                    });
                    return;
                }
                const modal = new bootstrap.Modal(document.getElementById('confirmarCompraModal'));
                modal.show();
            });

            // Botón de confirmación en el modal
            document.getElementById('confirmarCompraModalBtn').addEventListener('click', () => {
                const carrito = obtenerCarrito();
                if (carrito.length === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Carrito vacío',
                        text: 'No tienes productos en tu carrito.',
                        confirmButtonText: 'Ok'
                    });
                    return;
                }

                // Enviar datos como JSON
                fetch('../app/controllers/guardar_pedido.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json', // Cambiado a JSON
                    },
                    body: JSON.stringify(carrito) // Enviar el carrito como JSON puro
                })
                .then(response => {
                    console.log('Respuesta cruda:', response); // Depuración
                    if (!response.ok) {
                        throw new Error('Error en la respuesta del servidor: ' + response.status);
                    }
                    return response.text();
                })
                .then(message => {
                    console.log('Respuesta del servidor:', message); // Depuración
                    Swal.fire({
                        icon: 'success',
                        title: 'Compra realizada',
                        text: 'Tu compra ha sido procesada exitosamente.',
                        confirmButtonText: 'Ok'
                    }).then(() => {
                        localStorage.removeItem('carrito');
                        window.location.href = 'compras.php?success=Compra realizada con éxito';
                    });
                })
                .catch(error => {
                    console.error('Error en la solicitud:', error); // Depuración
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo procesar la compra. Detalle: ' + error.message,
                        confirmButtonText: 'Ok'
                    });
                });

                const modal = bootstrap.Modal.getInstance(document.getElementById('confirmarCompraModal'));
                modal.hide();
            });
        });

        // Función para el carrusel
        function scrollCarousel(direction) {
            const carousel = document.getElementById('productCarousel');
            carousel.scrollLeft += direction * 300;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/menu.js"></script>
</body>

</html>
<?php $conexion->close(); ?>