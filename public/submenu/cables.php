<?php
include("../../config/sesion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sion Wireless - Cables de red</title>
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
        <h1 class="my-cart-title">Categoria - Cables de red</h1>

        <section>

            <div class="product-container">
                <div class="product-card">
                    <img src="../img/cables.jpeg" alt="GE Antena de TV para Exteriores">
                    <h3>Cable Red LAN Ethernet</h3><br>
                    <p>Computadora Enrutador RJ45 Alta Velocidad (20 M)</p>
                    <p class="price">$299.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_001"
                        data-product-name="Cable Red LAN Ethernet Computadora Enrutador RJ45 Alta Velocidad (20 M)"
                        data-product-price="299.00"
                        data-product-description="El cable Ethernet NW01 tiene un conector RJ-45 para uso en interiores. Está hecho de aleación superconductora, con un diámetro de 5.3 mm. Su velocidad de transmisión es de 100M. Soporta temperaturas de -40 a 75 grados Celsius y tiene una resistencia a la tracción de 1000N, con una fuerza de compresión de 250P."
                        data-product-specs='[
                   {"label": "País de Origen", "value": "CN - China"},
                   {"label": "Product Type", "value": "Network Cables"},
                   {"label": "Ancho del Producto Ensamblado", "value": "22 cm"},
                   {"label": "Altura del Producto Ensamblado", "value": "8 cm"}
               ]'
                        data-main-image="../img/cables.jpeg"
                        data-thumbnails='["../img/cables.jpeg", "../img/cables1.webp", "../img/cables2.webp"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/cable.png" alt="Cámara de vigilancia">
                    <h3>UniFi Ethernet Patch Cable Cat6 de 22 cm, color azul</h3><br>                        
                    <p>Conector RJ45, alta velocidad, ideal para redes domésticas y empresariales.</p>
                    <p class="price">$499.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_002"
                        data-product-name="UniFi Ethernet Patch Cable Cat6 de 22 cm, color azul"
                        data-product-price="499.00"
                        data-product-description="El cable de conexión UC-PATCH-RJ45-BL es flexible, tiene una longitud de 220 mm y ha sido probado con el estándar T6-568-B.2 Cat6 de Fluke."
                        data-product-specs='[
                   {"label": "Modelo", "value": "UC-PATCH-RJ45-BL"},
                   {"label": "Marca", "value": "UBIQUITI"},
                   {"label": "Código SAT", "value": "43223303"},
                   {"label": "Garantía", "value": "3 años con SYSCOM"}
               ]'
                        data-main-image="../img/cable.png"
                        data-thumbnails='["../img/cable.png", "../img/cable1.png", "../img/cable2.png"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/cablexd.jpg" alt="Cámara de vigilancia">
                    <h3>Cable de Parcheo TX6, UTP Cat6, 24 AWG, CM, Color Blanco Mate, 15ft</h3><br>
                    <p>Estos cables de parcheo UTP (par trenzado sin blindaje) de Categoría 6</p>
                    <p class="price">$599.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_003"
                        data-product-name="Cable de Parcheo TX6, UTP Cat6, 24 AWG, CM, Color Blanco Mate, 15ft"
                        data-product-price="599.00"
                        data-product-description="El cable de conexión se ofrece en un cable UTP de varios colores para una flexibilidad de diseño con una funda de alivio de tensión clara en cada enchufe modular. Todos los cables de conexión deberán ser compatibles con los esquemas de cableado T568A y T568B."
                        data-product-specs='[
                   {"label": "Modelo", "value": "UTPSP15Y"},
                   {"label": "Marca de operación","value": "PANDUIT"},
                   {"label": "Código SAT", "value": "26121616"},
                   {"label": "Garantia", "value": "3 años con SYSCOM"}
               ]'
                        data-main-image="../img/cablexd.jpg"
                        data-thumbnails='["../img/cablexd.jpg", "../img/cablesxd.jpg", "../img/cablesxdd.jpg"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/cablerojo.png" alt="Cámara de vigilancia">
                    <h3>Cable de Parcheo TX6, UTP Cat6, 24 AWG, CM, Color Rojo, 15ft</h3><br>
                    <p>Los cables de parcheo UTP Categoría 6/Clase E se construyen con un cable de cobre de par trenzado sin blindaje de 24 AWG</p>
                    <p class="price">$399.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_003"
                        data-product-name="Cable de Parcheo TX6, UTP Cat6, 24 AWG, CM, Color Rojo, 15ft"
                        data-product-price="399.00"
                        data-product-description="El cable de conexión se ofrece en un cable UTP de varios colores para una flexibilidad de diseño con una funda de alivio de tensión clara en cada enchufe modular. Todos los cables de conexión deberán ser compatibles con los esquemas de cableado T568A y T568B."
                        data-product-specs='[
                   {"label": "Modelo", "value": "UTPSP15RDY"},
                   {"label": "Marca", "value": "PANDUIT"},
                   {"label": "Código SAT", "value": "26121616"},
                   {"label": "Garantía", "value": "3 años con SYSCOM"}
               ]'
                        data-main-image="../img/cablerojo.png"
                        data-thumbnails='["../img/cablerojo.png", "../img/cablerojo1.png", "../img/cablerojo2.png"]'>Más detalles</a><br>
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