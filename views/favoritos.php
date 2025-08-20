<?php
include("../config/sesion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sion Wireless - Favoritos</title>
    <!--FAVICON-------------------------------------------------------------->
    <link rel="shortcut icon" href="../public/img/LOGO/favicon.png" type="image/x-icon">
    <!--ESTILOS--------------------------------------------------------------->
    <link rel="stylesheet" href="../public/css/favorito.css">
    <!-- ICONOS DE Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
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
        <br><br>
    </nav>

    <header>
        <br><br><br><br><br>
        <!-- Contenido principal -->
        <div class="container">
            <h2>Favoritos</h2>
            <div id="favoritos-container" class="favoritos-grid">
                <!-- Los productos se cargarán dinámicamente con JavaScript -->
            </div>
        </div><br><br><br><br><br><br><br><br>

        <!-- Modal de confirmación -->
        <div class="modal fade" id="mensajeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content text-center p-3">
                    <i id="modalIcono" class='bx'></i>
                    <p id="modalTexto" class="mt-2 mb-0"></p>
                </div>
            </div>
        </div>
    </header>

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
            </ul>
        </div>
    </footer>

    <script src="../public/js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ----------- FUNCIONES FAVORITOS ------------
        function obtenerFavoritos() {
            return JSON.parse(localStorage.getItem('favoritos')) || [];
        }

        function guardarFavoritos(favoritos) {
            localStorage.setItem('favoritos', JSON.stringify(favoritos));
        }

        function mostrarModal(mensaje, icono, color) {
            document.getElementById("modalTexto").innerText = mensaje;
            const iconElem = document.getElementById("modalIcono");
            iconElem.className = `bx ${icono}`;
            iconElem.style.fontSize = "2rem";
            iconElem.style.color = color;

            const modal = new bootstrap.Modal(document.getElementById("mensajeModal"));
            modal.show();

            setTimeout(() => {
                modal.hide();
            }, 1500);
        }

        function eliminarFavorito(nombre) {
            let favoritos = obtenerFavoritos();
            favoritos = favoritos.filter(p => p.nombre !== nombre);
            guardarFavoritos(favoritos);
            mostrarModal("Eliminado de favoritos", "bx-heart", "gray");
            mostrarFavoritos();
        }

        function agregarAlCarrito(nombre, precio, imagen) {
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            let existente = carrito.find(p => p.nombre === nombre);
            if (existente) {
                existente.cantidad += 1;
            } else {
                carrito.push({ nombre, precio, imagen, cantidad: 1 });
            }
            localStorage.setItem('carrito', JSON.stringify(carrito));
            mostrarModal("Agregado al carrito", "bx-cart", "green");
        }

        function mostrarFavoritos() {
            const favoritos = obtenerFavoritos();
            const contenedor = document.getElementById('favoritos-container');

            contenedor.innerHTML = '';

            if (favoritos.length === 0) {
                contenedor.innerHTML = '<p>No tienes productos en favoritos.</p>';
                return;
            }

            favoritos.forEach(producto => {
                const card = document.createElement('div');
                card.className = 'product-card';
                card.innerHTML = `
                    <img src="${producto.imagen}" alt="${producto.nombre}">
                    <h3>${producto.nombre}</h3>
                    <p>${producto.descripcion || 'Sin descripción'}</p>
                    <p class="price">$${parseFloat(producto.precio).toFixed(2)}</p>
                    <button class="btn btn-outline-danger btn-eliminar" style="margin-right: 5px;">Eliminar</button>
                    <button class="btn btn-outline-success btn-carrito">Agregar al carrito</button>
                `;
                contenedor.appendChild(card);

                // Evento para eliminar favorito
                card.querySelector('.btn-eliminar').addEventListener('click', () => {
                    eliminarFavorito(producto.nombre);
                });

                // Evento para agregar al carrito
                card.querySelector('.btn-carrito').addEventListener('click', () => {
                    agregarAlCarrito(producto.nombre, parseFloat(producto.precio), producto.imagen);
                });
            });
        }

        // Cargar favoritos al iniciar la página
        document.addEventListener('DOMContentLoaded', mostrarFavoritos);
    </script>
</body>
</html>