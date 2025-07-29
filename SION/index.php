<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--TITULO----------------------------------------------------------->
    <title>Sion Wireless - Inicio</title>
    <!--FAVICON-------------------------------------------------------------->
    <link rel="shortcut icon" href="img/LOGO/favicon.png" type="image/x-icon">
    <!--ESTILO--------------------------------------------------------------->
    <link rel="stylesheet" href="css/index.css">
    <!-- ICONOS DE Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!--BOTON DE Boxicons----------------------------------------------------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!--ENCABEZADO----------------------------------------------------------->
    <nav>
        <div class="nav-bar">
            <i class="bx bx-menu sidebarOpen"></i>
            <span class="logo navLogo"><a href="index.php">
            <img src="img/LOGO/sin fondo.png" alt="Logo SION" height="100"></a>
            </span>
            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="#"><img src="img/LOGO/sin fondo.png" alt="Logo SION" height="90"></a></span>
                    <i class="bx bx-x sidelbarClose"></i>
                </div>
                <ul class="nav-links">
                    <li class="has-submenu">
                        <a href="#" data-submenu-toggle>Categoría</a>
                        <ul class="submenu">
                            <li><a href="submenu/antenas.php">Antenas</a></li>
                            <li><a href="submenu/camaras.php">Camaras de seguridad</a></li>
                            <li><a href="submenu/cables.php">Cables de red</a></li>
                            <li><a href="submenu/conectoresJaks.php">Conectores y jacks</a></li>
                            <li><a href="submenu/modems.php">Modems</a></li>
                            <li><a href="submenu/switch.php">Switches</a></li>
                            <li><a href="submenu/router.php">Routers</a></li>
                        </ul>
                    </li>
                    <li><a href="Servicios.php">Servicios</a></li>
                    <li><a href="ofertas.php">Ofertas</a></li>
                    <li><a href="compras.php">Compras</a></li>
                    <li><a href="#">Favoritos</a></li>
                    <li><a href="todos_los_productos.php">Ver todos los productos</a></li>
                </ul>
            </div>

            <div class="searchBox">
                <div class="iconUser">
                   <a href="login.php" style="color: white;"> <i class='bx bx-user user'></i></a><!--- Icono de usuario -->
                </div>
                <div class="searchToggle">
                    <i class="bx bx-x cancel"></i><!--- Icono de cerrar búsqueda -->
                    <i class="bx bx-search search"></i><!--- Icono de búsqueda -->
                </div>
                <div class="iconCarrito">
                    <a href="carrito.php" style="color: white;"> <i class='bx bx-cart cart'></i></a><span id="productos">0</span><!--- Icono de carrito de compras -->
                </div>
                <div class="search-field">
                    <input type="text" placeholder="Buscar tus productos preferidos...">
                    <i class="bx bx-search search"></i>
                </div>
            </div>
        </div>
    </nav>
<hr>
<section class="banner">
    <div class="banner-text">
        <h2>Nuestros productos hechos para ti</h2><br>
        <p>Todo para tu hogar 💒</p>
    </div>
</section>
<svg class="wave "xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#76c8ff" fill-opacity="1" d="M0,128L1440,192L1440,320L0,320Z"></path></svg>

<section class="carrusel">
<h3>Vista rápida</h3><br>
<div class="carrusel-contenedor" id="contenedor">
    <div class="carrusel-slide">
        <div class="imagen-wrapper"> <img src="img/antena.webp" alt="Antenas">
        </div>
        <div class="texto-slide"> <p>Antena aérea para TV HD, giratoria 360∞ con control, Volteck</p>
            <hr><br><a class="btn btn-primary" href="submenu/antenas.php" role="button">Ver productos</a>
        </div>
    </div>
    <div class="carrusel-slide">
        <div class="imagen-wrapper">
            <img src="img/cables.jpeg" alt="Producto 2">
        </div>
        <div class="texto-slide">
            <p>Cable de Red LAN Ponchado 5m - Listo para usar (Cat-5)</p>
            <hr><br><a class="btn btn-primary" href="submenu/cables.php" role="button">Ver productos</a>
        </div>
    </div>
    <div class="carrusel-slide">
        <div class="imagen-wrapper">
            <img src="img/images (1).jpeg" alt="Otro Producto">
        </div>
        <div class="texto-slide">
            <p>Cámara de Seguridad Wifi 2 lentes movimiento y audio</p>
            <hr><br><a class="btn btn-primary" href="submenu/camaras.php" role="button">Ver productos</a>
        </div>
    </div>
    <div class="carrusel-slide">
        <div class="imagen-wrapper">
            <img src="img/jack.webp" alt="Producto 4">
        </div>
        <div class="texto-slide">
            <p>Jack RJ45 de 8 contactos a 90° CAT 6, tipo Keystone, blanco</p>
            <hr><br><a class="btn btn-primary" href="submenu/conectoresJaks.php" role="button">Ver productos</a>
        </div>
    </div>
    <div class="carrusel-slide">
        <div class="imagen-wrapper">
            <img src="img/modem.jpeg" alt="Producto 5">
        </div>
        <div class="texto-slide">
            <p>Modem Internet Prepago 4.5g Internet Hogar</p>
            <hr><br><a class="btn btn-primary" href="submenu/modems.php" role="button">Ver productos</a>
        </div>
    </div>
    <div class="carrusel-slide">
        <div class="imagen-wrapper">
            <img src="img/descarga (2).jpeg" alt="Producto 6">
        </div>
        <div class="texto-slide">
            <p>Router ASUS Gigabit Ethernet de Banda Dual RT-AX57, Inalámbrico, 2402 Mbit/s, 4x RJ-45, 2.4/5GHz, 4 Antenas Externas</p>
            <hr><br><a class="btn btn-primary" href="submenu/router.php" role="button">Ver productos</a>
        </div>
    </div>
    <div class="carrusel-slide">
        <div class="imagen-wrapper">
            <img src="img/images (3).jpeg" alt="Producto 7">
        </div>
        <div class="texto-slide">
            <p>Switches Cisco Catalyst de la serie 2960-XR</p>
            <hr><br><a class="btn btn-primary" href="submenu/switch.php" role="button">Ver productos</a>
        </div>
    </div>
</div>

  <button class="boton prev" onclick="mover(-1)">❮</button>
  <button class="boton next" onclick="mover(1)">❯</button>
<br><br><br>

</section>
<section id="ubicacion">
 <div class="ubicacion-contenedor">
  <div class="ubicacion-izquierda">
   <h2>¡Servicio excepcional, resultados extraordinarios!</h2>
   <h1>Únete a nuestra comunidad</h1>
   <div class="redes-sociales">
    <a href="#" target="_blank"><i class='bx bxl-facebook-circle'></i></a>
    <a href="#" target="_blank"><i class='bx bxl-whatsapp'></i></a>
    <a href="#" target="_blank"><i class='bx bxl-instagram-alt'></i></a>
    <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
    <a href="#" target="_blank"><i class='bx bxl-youtube'></i></a>
   </div>
  </div>
  <div class="ubicacion-derecha">
   <img src="img/ubicacion.png" height="300px">
  </div>
 </div>
</section>
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
    <script src="js/index.js"></script>
</body>
</html>