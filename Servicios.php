<?php
    include("sesion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sion Wireless - Servicios</title>
    <link rel="shortcut icon" href="img/LOGO/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/servicios.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <section class="main">
        <!--ENCABEZADO----------------------------------------------------------->
        <nav>
            <div class="nav-bar">
                <i class="bx bx-menu sidebarOpen"></i>
                <span class="logo navLogo"><a href="index.php">
                        <img src="img/LOGO/sin fondo.png" alt="Logo SION" height="100"></a>
                </span>
                <div class="menu">
                    <div class="logo-toggle">
                        <span class="logo"><a href="index.php"><img src="img/LOGO/sin fondo.png" alt="Logo SION" height="90"></a></span>
                        <i class="bx bx-x sidelbarClose"></i>
                    </div>
                    <ul class="nav-links">
                        <li class="has-submenu">
                            <a href="#" data-submenu-toggle>Categoría</a>
                            <ul class="submenu">
                                <li><a href="submenu/antenas.php">Antenas</a></li>
                                <li><a href="submenu/camaras.php">Cámaras de seguridad</a></li>
                                <li><a href="submenu/cables.php">Cables de red</a></li>
                                <li><a href="submenu/conectoresJaks.php">Conectores y jacks</a></li>
                                <li><a href="submenu/modems.php">Módems</a></li>
                                <li><a href="submenu/switch.php">Switches</a></li>
                                <li><a href="submenu/router.php">Routers</a></li>
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
                        <a href="<?php echo $usuarioLogueado ? 'mi_cuenta.php' : 'login.php'; ?>" style="color: white;">
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
                        <input type="text" placeholder="Buscar tus productos...">
                        <i class="bx bx-search search"></i>
                    </div>
                </div>
            </div>
        </nav>
        <!--------------------------------------------------------------------------->
    </section>
    <br><br><br><br>
    <main>
        <section class="services-section">
            <h1 class="my-cart-title">Servicios</h1>
            <div class="service-card">
                <img src="img/instalacion camaras de seguridad.jpg" alt="Instalación de cámara de seguridad">
                <div class="service-details">
                    <h2>Instalación de cámara de seguridad</h2>
                    <p>$450</p>
                    <button type="button" class="btn btn-primary btn-lg">Solicitar</button>
                </div>
            </div>
            <div class="service-card">
                <img src="img/instalacion camaras de antena.jpg" alt="Instalación de antena">
                <div class="service-details">
                    <h2>Instalación de antena</h2>
                    <p>$600</p>
                    <button type="button" class="btn btn-primary btn-lg">Solicitar</button>
                </div>
            </div>
        </section>
    </main>

    <!-- fooder(pie de pagina) -->
    <footer class="main-footer">
        <div class="footer-section footer-logo">
            <img src="img/LOGO/sin fondo.png" alt="Logo SION">
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
    <script src="js/menu.js"></script>
</body>

</html>