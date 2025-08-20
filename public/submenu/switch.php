<?php
include("../../config/sesion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sion Wireless - Switch</title>
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
        <h1 class="my-cart-title">Categoria - Switches</h1>

        <section>
            <div class="product-container">
                <div class="product-card">
                    <img src="../img/swi.jpg" alt="Switch TP-Link TL-SG108">
                    <h3>TP-Link TL-SG108</h3><br>
                    <p>Switch de escritorio 8 puertos Gigabit, sin gestión, carcasa metálica</p>
                    <p class="price">$699.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="switch_001"
                        data-product-name="TP-Link TL-SG108, Switch 8 puertos Gigabit, sin gestión, metálico"
                        data-product-price="699.00"
                        data-product-description="El TL-SG108 es un switch de escritorio con 8 puertos Gigabit, ideal para expandir la red en casa u oficina. Plug & Play, carcasa metálica, bajo consumo y funcionamiento silencioso."
                        data-product-specs='[
                   {"label": "Modelo", "value": "TL-SG108"},
                   {"label": "Marca", "value": "TP-Link"},
                   {"label": "Puertos", "value": "8 Gigabit"},
                   {"label": "Garantía", "value": "3 años"}
               ]'
                        data-main-image="../img/swi.jpg"
                        data-thumbnails='["../img/swi.jpg", "../img/swi1.jpg", "../img/swi2.jpg"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/swit.jpg" alt="Switch Cisco SG350-10">
                    <h3>Cisco SG350-10</h3><br>
                    <p>Switch administrable 10 puertos Gigabit, funciones avanzadas, VLAN</p>
                    <p class="price">$3,499.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="switch_002"
                        data-product-name="Cisco SG350-10, Switch administrable 10 puertos Gigabit, VLAN"
                        data-product-price="3499.00"
                        data-product-description="El SG350-10 es un switch administrable con 10 puertos Gigabit, ideal para redes empresariales. Soporta VLAN, QoS, seguridad avanzada y administración web."
                        data-product-specs='[
                   {"label": "Modelo", "value": "SG350-10"},
                   {"label": "Marca", "value": "Cisco"},
                   {"label": "Puertos", "value": "10 Gigabit"},
                   {"label": "Garantía", "value": "5 años"}
               ]'
                        data-main-image="../img/swit.jpg"
                        data-thumbnails='["../img/swit.jpg", "../img/swit1.jpg", "../img/swit2.jpg"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/s.jpg" alt="Switch Ubiquiti UniFi US-24">
                    <h3>Ubiquiti UniFi US-24</h3><br>
                    <p>Switch 24 puertos Gigabit, PoE, administración UniFi Controller</p>
                    <p class="price">$5,999.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="switch_003"
                        data-product-name="Ubiquiti UniFi US-24, Switch 24 puertos Gigabit, PoE, UniFi Controller"
                        data-product-price="5999.00"
                        data-product-description="El US-24 es un switch de 24 puertos Gigabit con PoE, ideal para redes empresariales y proyectos de videovigilancia. Se administra desde UniFi Controller y soporta VLAN, QoS y seguridad avanzada."
                        data-product-specs='[
                   {"label": "Modelo", "value": "US-24"},
                   {"label": "Marca", "value": "Ubiquiti"},
                   {"label": "Puertos", "value": "24 Gigabit"},
                   {"label": "Garantía", "value": "2 años"}
               ]'
                        data-main-image="../img/s.jpg"
                        data-thumbnails='["../img/s.jpg", "../img/s1.jpg", "../img/s2.jpg"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/sq.png" alt="Switch D-Link DGS-1008A">
                    <h3>D-Link DGS-1008A</h3><br>
                    <p>Switch 8 puertos Gigabit, plástico, bajo consumo, Plug & Play</p>
                    <p class="price">$499.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="switch_004"
                        data-product-name="D-Link DGS-1008A, Switch 8 puertos Gigabit, Plug & Play, plástico"
                        data-product-price="499.00"
                        data-product-description="El DGS-1008A es un switch de 8 puertos Gigabit, carcasa plástica, bajo consumo y funcionamiento silencioso. Ideal para expandir la red en casa u oficina. Plug & Play, sin configuración."
                        data-product-specs='[
                   {"label": "Modelo", "value": "DGS-1008A"},
                   {"label": "Marca", "value": "D-Link"},
                   {"label": "Puertos", "value": "8 Gigabit"},
                   {"label": "Garantía", "value": "2 años"}
               ]'
                        data-main-image="../img/sq.png"
                        data-thumbnails='["../img/sq.png", "../img/sq1.png", "../img/sq2.png"]'>Más detalles</a><br>
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