<?php
include("../../config/sesion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sion Wireless - Modems</title>
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
        <h1 class="my-cart-title">Categoria - Modems</h1>

        <section>
            <div class="product-container">
                <div class="product-card">
                    <img src="../img/modem.jpg" alt="Modem TP-Link Archer MR600">
                    <h3>TP-Link Archer MR600</h3><br>
                    <p>Modem 4G+ LTE WiFi AC1200, doble banda, SIM Card, ideal para zonas sin cable</p>
                    <p class="price">$2,499.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="modem_001"
                        data-product-name="TP-Link Archer MR600, Modem 4G+ LTE WiFi AC1200, doble banda, SIM Card"
                        data-product-price="2499.00"
                        data-product-description="El Archer MR600 es un modem 4G+ LTE que permite compartir internet móvil en toda la casa u oficina. Compatible con SIM Card, doble banda, hasta 64 dispositivos conectados, ideal para zonas rurales o sin cable."
                        data-product-specs='[
                   {"label": "Modelo", "value": "Archer MR600"},
                   {"label": "Marca", "value": "TP-Link"},
                   {"label": "Velocidad", "value": "Hasta 1200 Mbps"},
                   {"label": "Garantía", "value": "2 años"}
               ]'
                        data-main-image="../img/modem.jpg"
                        data-thumbnails='["../img/modem.jpg", "../img/modem1.jpg", "../img/modem2.jpg"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/modem0.jpg" alt="Modem Huawei B311">
                    <h3>Huawei B311</h3><br>
                    <p>Modem 4G LTE WiFi, hasta 32 dispositivos, fácil instalación, SIM Card</p>
                    <p class="price">$1,899.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="modem_002"
                        data-product-name="Huawei B311, Modem 4G LTE WiFi, hasta 32 dispositivos, SIM Card"
                        data-product-price="1899.00"
                        data-product-description="El Huawei B311 es un modem 4G LTE que permite compartir internet móvil, ideal para casa u oficina. Fácil instalación, soporte para SIM Card, WiFi estable y seguro."
                        data-product-specs='[
                   {"label": "Modelo", "value": "B311"},
                   {"label": "Marca", "value": "Huawei"},
                   {"label": "Velocidad", "value": "Hasta 150 Mbps"},
                   {"label": "Garantía", "value": "1 año"}
               ]'
                        data-main-image="../img/modem0.jpg"
                        data-thumbnails='["../img/modem0.jpg", "../img/modem00.jpg", "../img/modem000.jpg"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/m.jpg" alt="Modem Teltonika RUT240">
                    <h3>Teltonika RUT240</h3><br>
                    <p>Modem industrial 4G LTE, WiFi, VPN, SIM Card, ideal para IoT y empresas</p>
                    <p class="price">$3,299.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="modem_003"
                        data-product-name="Teltonika RUT240, Modem industrial 4G LTE, WiFi, VPN, SIM Card"
                        data-product-price="3299.00"
                        data-product-description="El Teltonika RUT240 es un modem industrial 4G LTE, ideal para aplicaciones IoT, empresas y comercios. Incluye WiFi, VPN, soporte para SIM Card y administración remota."
                        data-product-specs='[
                   {"label": "Modelo", "value": "RUT240"},
                   {"label": "Marca", "value": "Teltonika"},
                   {"label": "Velocidad", "value": "Hasta 150 Mbps"},
                   {"label": "Garantía", "value": "2 años"}
               ]'
                        data-main-image="../img/m.jpg"
                        data-thumbnails='["../img/m.jpg", "../img/m1.jpg", "../img/m2.jpg"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/mo1.png" alt="Modem D-Link DWR-921">
                    <h3>D-Link DWR-921</h3><br>
                    <p>Modem 4G LTE WiFi N300, doble antena, SIM Card, fácil configuración</p>
                    <p class="price">$1,599.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="modem_004"
                        data-product-name="D-Link DWR-921, Modem 4G LTE WiFi N300, doble antena, SIM Card"
                        data-product-price="1599.00"
                        data-product-description="El D-Link DWR-921 es un modem 4G LTE WiFi N300, ideal para compartir internet móvil en casa u oficina. Doble antena, fácil configuración y soporte para SIM Card."
                        data-product-specs='[
                   {"label": "Modelo", "value": "DWR-921"},
                   {"label": "Marca", "value": "D-Link"},
                   {"label": "Velocidad", "value": "Hasta 300 Mbps"},
                   {"label": "Garantía", "value": "1 año"}
               ]'
                        data-main-image="../img/mo1.png"
                        data-thumbnails='["../img/mo1.png", "../img/mo2.png", "../img/mo3.png"]'>Más detalles</a><br>
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