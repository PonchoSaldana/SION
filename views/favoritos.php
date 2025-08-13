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
    <!--BOTON DE Boxicons----------------------------------------------------------->
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
                    <span class="logo"><a href="../public/index.php"><img src="../public/img/LOGO/sin fondo.png" alt="Logo SION" height="90"></a></span>
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
    
    <bt><br><br><br><br><br>
     <!-- Contenido principal -->
    <div class="container">
        <h2>Favoritos</h2>

        <!-- Producto 1 -->
        <div class="item">
            <img src="https://cdn-icons-png.flaticon.com/512/1047/1047711.png" alt="Camara">
            <div class="item-info">
                <p>Cámara CCTV a color a tiempo completo 1080P, cámara de seguridad al aire libre con cable de 2 MP, vigilancia de grabación 24/7 4 en 1 TVI/CVI/AHD/CVBS, visión nocturna colorida de 100 pies, cámara DVR para seguridad del hogar, fácil conexión</p>
                <span class="price">$1,299</span><br>
                <div class="actions">
                    <a href="#">Eliminar</a>
                    <a href="#">Agregar al carrito</a>
                </div>
            </div>
        </div>

        <!-- Producto 2 -->
        <div class="item">
            <img src="https://cdn-icons-png.flaticon.com/512/1047/1047711.png" alt="Camara">
            <div class="item-info">
                <p>Cámara De Seguridad De Doble Lente Wifi 4mp Con Alarma Ip Zoom 10x</p>
                <span class="price">$365</span><br>
                <div class="actions">
                    <a href="#">Eliminar</a>
                    <a href="#">Agregar al carrito</a>
                </div>
            </div>
        </div>

        <!-- Producto 3 -->
        <div class="item">
            <img src="https://cdn-icons-png.flaticon.com/512/1047/1047711.png" alt="Camara">
            <div class="item-info">
                <p>Cámara Wifi Con Detección De Cara Marca Treo</p>
                <span class="price">$1,375</span><br>
                <div class="actions">
                    <a href="#">Eliminar</a>
                    <a href="#">Agregar al carrito</a>
                </div>
            </div>
        </div>

        <!-- Producto 4 -->
        <div class="item">
            <img src="https://cdn-icons-png.flaticon.com/512/1047/1047711.png" alt="Camara">
            <div class="item-info">
                <p>2pcs Cámara De Seguridad Wifi De 360° Visión Nocturna Alarma</p>
                <span class="price">$543</span><br>
                <div class="actions">
                    <a href="#">Eliminar</a>
                    <a href="#">Agregar al carrito</a>
                </div>
            </div>
        </div>

        <!-- Producto 5 -->
        <div class="item">
            <img src="https://cdn-icons-png.flaticon.com/512/1047/1047711.png" alt="Camara">
            <div class="item-info">
                <p>Cámara De Seguridad Wifi Foco Hd 1080p Nocturna Alarma 2pcs</p>
                <span class="price">$432</span><br>
                <div class="actions">
                    <a href="#">Eliminar</a>
                    <a href="#">Agregar al carrito</a>
                </div>
            </div>
        </div>
    </div><br><br>

    
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
</header>

    <script src="../public/js/menu.js"></script>
</body>

</html>