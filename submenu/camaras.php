<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sion Wireless - Camaras</title>
    <link rel="shortcut icon" href="../img/LOGO/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/todos_los_productos.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav>
        <div class="nav-bar">
            <i class="bx bx-menu sidebarOpen"></i>

            <span class="logo navLogo">
                <a href="../index.php">
                    <img src="../img/LOGO/sin fondo.png" alt="Logo SION" height="100">
                </a>
            </span>

            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo">
                        <a href="../index.php">
                            <img src="../img/LOGO/sin fondo.png" alt="Logo SION" height="90">
                        </a>
                    </span>
                    <i class="bx bx-x sidelbarClose"></i>
                </div>
                <ul class="nav-links">
                    <li class="has-submenu">
                        <a href="#" data-submenu-toggle>Categoría</a>
                        <ul class="submenu">
                            <li><a href="../submenu/antenas.php">Antenas</a></li>
                            <li><a href="../submenu/camaras.php">Camaras de seguridad</a></li>
                            <li><a href="../submenu/cables.php">Cables de red</a></li>
                            <li><a href="../submenu/conectoresJaks.php">Conectores y jacks</a></li>
                            <li><a href="../submenu/modems.php">Modems</a></li>
                            <li><a href="../submenu/switch.php">Switches</a></li>
                            <li><a href="../submenu/router.php">Routers</a></li>
                        </ul>
                    </li>
                    <li><a href="../Servicios.php">Servicios</a></li>
                    <li><a href="../ofertas.php">Ofertas</a></li>
                    <li><a href="../#">Compras</a></li>
                    <li><a href="../#">Favoritos</a></li>
                    <li><a href="../todos_los_productos.php">Ver todos los productos</a></li>
                </ul>
            </div>

            <div class="searchBox">
                <div class="iconUser">
                    <a href="login.php" style="color: white;"> <i class='bx bx-user user'></i></a>
                </div>
                <div class="searchToggle">
                    <i class="bx bx-x cancel"></i>
                    <i class="bx bx-search search"></i>
                </div>
                <div class="iconCarrito">
                    <a href="../carrito.php" style="color: white;"> <i class='bx bx-cart cart'></i></a>
                    <span id="productos">0</span>
                </div>
                <div class="search-field">
                    <input type="text" placeholder="Buscar tus productos preferidos...">
                    <i class="bx bx-search search"></i>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <h1 class="my-cart-title">Categoria - Camaras</h1>

        <section>
            <div class="product-container">
                <div class="product-card">
                    <img src="../img/images (1).jpeg" alt="Producto 1">
                    <h3>Router</h3>
                    <p>Router profesional de oficina</p>
                    <p class="price">$100.00</p>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button><br>
                    <a href="#" class="btn btn-outline-info">Más detalles</a>
                </div>
                <div class="product-card">
                    <img src="../img/images (1).jpeg" alt="Producto 2">
                    <h3>Router 5G</h3>
                    <p>Router multiusos potente</p>
                    <p class="price">$200.00</p>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button><br>
                    <a href="#" class="btn btn-outline-info">Más detalles</a>
                </div>
                <div class="product-card">
                    <img src="../img/images (1).jpeg" alt="Producto 3">
                    <h3>Conector multiple</h3>
                    <p>Conector multiusos</p>
                    <p class="price">$100.00</p>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button><br>
                    <a href="#" class="btn btn-outline-info">Más detalles</a>
                </div>
                <div class="product-card">
                    <img src="../img/images (1).jpeg" alt="Producto 4">
                    <h3>Camara de vigilancia</h3>
                    <p>Camara de vigilancia 360 grados</p>
                    <p class="price">$20.00</p>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button><br>
                    <a href="#" class="btn btn-outline-info">Más detalles</a>
                </div>
            </div>

            <div class="product-container">
                <div class="product-card">
                    <img src="../img/images (1).jpeg" alt="Producto 5">
                    <h3>Camara steren</h3>
                    <p>Camara de vigilancia 360 grados</p>
                    <p class="price">$10.00</p>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button><br>
                    <a href="#" class="btn btn-outline-info">Más detalles</a>
                </div>
                <div class="product-card">
                    <img src="../img/images (1).jpeg" alt="Producto 6">
                    <h3>Router multipuertos</h3>
                    <p>Router de oficina</p>
                    <p class="price">$200.00</p>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button><br>
                    <a href="#" class="btn btn-outline-info">Más detalles</a>
                </div>
            </div>
        </section>
    </main>

    <script>
        // Script del contador del carrito
        const contadorCarrito = document.getElementById('productos');
        let productosEnCarrito = 0;

        function actualizarContador() {
            contadorCarrito.textContent = productosEnCarrito;
        }
        const botonesAgregar = document.querySelectorAll('.product-card button');
        botonesAgregar.forEach(button => {
            button.addEventListener('click', () => {
                productosEnCarrito++;
                actualizarContador();
            });
        });
    </script>

    <footer class="main-footer">
        <div class="footer-section footer-logo">
            <img src="../img/LOGO/sin fondo.png" alt="Logo SION">
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
        <script src="../js/menu.js"></script>
    </footer>
</body>

</html>