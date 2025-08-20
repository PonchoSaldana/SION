<?php
    include("../../config/sesion.php");
?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sion Wireless - Routers</title>
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
                <a href="../../index.php">
                    <img src="../img/LOGO/sin fondo.png" alt="Logo SION" height="100">
                </a>
            </span>

            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo">
                        <a href="../../index.php">
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
                    <li><a href="../../views/Servicios.php">Servicios</a></li>
                    <li><a href="../../views/ofertas.php">Ofertas</a></li>
                    <li><a href="../../views/compras.php">Compras</a></li>
                    <li><a href="../../views/favoritos.php">Favoritos</a></li>
                    <li><a href="../../views/todos_los_productos.php">Todos los productos</a></li>
                    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                        <li><a href="../../views/panelAdmin.php">Panel de Administración</a></li>
                     <?php endif; ?>
                </ul>
            </div>

            <div class="searchBox">
                <div class="iconUser">
                    <a href="<?php echo $usuarioLogueado ? '../../model/mi_cuenta.php' : '../../views/login.php'; ?>" style="color: white;"> <i class='bx bx-user user'></i></a>
                </div>
                <div class="searchToggle">
                    <i class="bx bx-x cancel"></i>
                    <i class="bx bx-search search"></i>
                </div>
                <div class="iconCarrito">
                    <a href="../../views/carrito.php" style="color: white;"> <i class='bx bx-cart cart'></i></a>
                    <span id="productos">0</span>
                </div>
                <div class="search-field">
                    <form action="../../app/controllers/buscar.php" method="GET">
                        <input type="text" name="q" placeholder="Buscar productos..." required class="form-control me-2" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
                        <button type="submit"><i class='bx bx-search'></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <h1 class="my-cart-title">Categoria - Routers</h1>

        <section>
            <div class="product-container">
                <div class="product-card">
                    <img src="../img/images (4).jpeg" alt="GE Antena de TV para Exteriores">
                    <h3>ROG STRIX GS-AX5400</h3><br>
                    <p>Router de juegos WiFi 6 de doble banda GS-AX5400, compatible con PS5</p>
                    <p class="price">$2999.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_001"
                        data-product-name="ROG STRIX GS-AX5400"
                        data-product-price="2999.00"
                        data-product-description="Router de juegos WiFi 6 de doble banda GS-AX5400, compatible con PS5, modo de juego móvil, VPN Fusion, seguridad de Internet gratuita de por vida, Instant Guard, Gear Accelerator, puerto de juegos, QoS adaptable, reenvío de puertos, ASUS Aura RGB"
                        data-product-specs='[
                   {"label": "1", "value": "¡Diseñado para ganar!"},
                   {"label": "2", "value": "La mejor conexión para gaming"},
                   {"label": "3", "value": "Velocidad de hasta 5400 Mbps"},
                   {"label": "4", "value": "Tecnología WiFi 6 (802.11ax)"},
                   {"label": "5", "value": "Procesador de 4 núcleos a 1.5 GHz"},
                   {"label": "6", "value": "Puertos LAN 2.5G y USB 3.2 Gen 1"}
               ]'
                        data-main-image="../img/images (4).jpeg"
                        data-thumbnails='["../img/images (4).jpeg", "../img/router.png", "../img/router1.png"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/routerxd.png" alt="Cámara de vigilancia">
                    <h3>Router Inalámbrico doble banda AC</h3><br>
                    <p>Señal potente en toda la casa, cobertura máxima</p>
                    <p class="price">$4999.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_002"
                        data-product-name="Router Inalámbrico doble banda AC, 2.4 GHz y 5 GHz Hasta 1200 Mbps, 4 antenas externas omnidireccional, 4 Puertos LAN 10/100 Mbps, 1 Puerto WAN 10/100 Mbps, Versión 6"
                        data-product-price="4999.00"
                        data-product-description="El dispositivo ofrece una señal potente y una cobertura máxima en toda la casa gracias a su WiFi de doble banda y alta potencia. Con dimensiones compactas, cuenta con control parental avanzado y filtrado de URL. Además, posee certificaciones de seguridad como FCC, CE y RoHS."
                        data-product-specs='[
                   {"label": "Modelo", "value": "ARCHERC50"},
                   {"label": "Marca", "value": "TP-LINK"},
                   {"label": "Código SAT", "value": "43222609"},
                   {"label": "Garantía", "value": "3 años con SYSCOM"}
               ]'
                        data-main-image="../img/routerxd.png"
                        data-thumbnails='["../img/routerxd.png", "../img/routerxd1.png", "../img/routerxd2.png"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/router11.jpg" alt="Router Mesh WiFi 6">
                    <h3>Router Mesh WiFi 6 AX1800</h3><br>
                    <p>Cobertura total, ideal para casas grandes y oficinas</p>
                    <p class="price">$3899.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="router_003"
                        data-product-name="Router Mesh WiFi 6 AX1800, doble banda, hasta 1800 Mbps, tecnología de malla, 4 antenas internas, 3 puertos LAN, 1 puerto WAN, control parental, app móvil"
                        data-product-price="3899.00"
                        data-product-description="El Router Mesh WiFi 6 AX1800 ofrece cobertura total y velocidad superior en toda la casa u oficina. Su tecnología de malla permite conectar varios dispositivos sin perder señal. Incluye control parental, app móvil y seguridad avanzada."
                        data-product-specs='[
                   {"label": "Modelo", "value": "DECO X20"},
                   {"label": "Marca", "value": "TP-LINK"},
                   {"label": "Código SAT", "value": "43222609"},
                   {"label": "Garantía", "value": "3 años con SYSCOM"}
               ]'
                        data-main-image="../img/router11.jpg"
                        data-thumbnails='["../img/router11.jpg", "../img/router12.jpg", "../img/router13.jpg"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/router0.jpg" alt="Router Profesional Gigabit">
                    <h3>Router Profesional Gigabit AX6000</h3><br>
                    <p>Velocidad extrema y estabilidad para empresas y gamers</p>
                    <p class="price">$7999.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="router_004"
                        data-product-name="Router Profesional Gigabit AX6000, WiFi 6, hasta 6000 Mbps, 8 antenas externas, 8 puertos LAN Gigabit, 2 puertos USB 3.0, QoS avanzado, seguridad WPA3"
                        data-product-price="7999.00"
                        data-product-description="El Router AX6000 está diseñado para usuarios exigentes: empresas, gamers y streamers. Ofrece velocidad extrema, estabilidad y seguridad de última generación. Incluye QoS avanzado, múltiples puertos y control total desde app móvil."
                        data-product-specs='[
                   {"label": "Modelo", "value": "ARCHER AX6000"},
                   {"label": "Marca", "value": "TP-LINK"},
                   {"label": "Código SAT", "value": "43222609"},
                   {"label": "Garantía", "value": "3 años con SYSCOM"}
               ]'
                        data-main-image="../img/router0.jpg"
                        data-thumbnails='["../img/router0.jpg", "../img/router01.jpg", "../img/router001.jpg"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>
            </div>

            <div id="productDetailsModal" class="modal-fullscreen" style="display: none;">
                <div class="modal-content-fullscreen">
                    <div class="modal-image-gallery">
                        <img src="" alt="Imagen principal del producto" class="modal-main-image" id="mainModalImage">
                        <div class="modal-thumbnails" id="modalThumbnailsContainer">
                        </div>
                    </div>

                    <div class="modal-details-content">
                        <span class="close-button" id="closeModalBtn">&times;</span>
                        <div class="modal-details-header">
                            <h2 id="modalProductName"></h2>
                            <hr>
                            <div id="modalProductSpecs">
                            </div>
                            <hr>
                        </div>
                        <p class="price" id="modalProductPrice"></p>
                        <hr>
                        <div class="description-section">
                            <p id="modalProductDescription"></p>
                        </div>
                        <button type="button" class="btn btn-primary add-to-cart-modal">Agregar al carrito</button><br>
                        <button type="button" class="btn btn-danger add-to-favorites-modal">Favoritos</button>
                    </div>
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