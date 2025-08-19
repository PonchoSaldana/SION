<?php
include("../../config/sesion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sion Wireless - Antenas</title>
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
        <h1 class="my-cart-title">Categoria - Antenas</h1>
        <section>
            <div class="product-container">
                <div class="product-card">
                    <img src="../img/antena.webp" alt="GE Antena de TV para Exteriores">
                    <h3>GE Antena de TV para Exteriores</h3><br>
                    <p>Antena de TV de alta ganancia para exteriores, ideal para recibir señales digitales.</p>
                    <p class="price">$299.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_001"
                        data-product-name="GE Antena de TV para Exteriores, Largo Alcance, Resistente a la Interperie, Compatible con 4K, 1080p"
                        data-product-price="299.00"
                        data-product-description="La antena de TV para exteriores GE tiene un alcance de hasta 70 millas, es resistente a la intemperie y compatible con TVs 4K y 1080p. Permite ver canales sin suscripción y viene con un montaje tipo J para una fácil instalación."
                        data-product-specs='[
                   {"label": "Marca", "value": "GE"},
                   {"label": "Color", "value": "Montaje en exterior/ático"},
                   {"label": "Cantidad de canales", "value": "100"},
                   {"label": "Impedancia", "value": "75 Ohm"},
                   {"label": "Rango máximo", "value": "70 Millas"},
                   {"label": "Dimensiones del producto", "value": "73,7l. x 38,1an. x 52,1alt. centimeters"},
                   {"label": "UPC", "value": "030878298841"},
                   {"label": "Fabricante", "value": "Jasco Products LLC"}
               ]'
                        data-main-image="../img/antena.webp"
                        data-thumbnails='["../img/antena.webp", "../img/antena 2.jpeg", "../img/antena 3.jpeg"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/antena 1.1.jpg" alt="Cámara de vigilancia">
                    <h3>Master Antena Exterior HD 37 Elementos para TV</h3><br>
                    <p>Antena de alta calidad para exterior, resolucion 4k HD</p>
                    <p class="price">$499.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_002"
                        data-product-name="Master Antena Exterior HD 37 Elementos para TV Digital Alta Recepción en Zonas de Señal Débil UHF/VHF Compatible con TDT y HDTV"
                        data-product-price="499.00"
                        data-product-description="La antena exterior TVANT-20ELEM está fabricada en aluminio con 37 elementos y capta señales de TV digital HD (VHF/UHF). Ofrece una alta ganancia (16 dB en VHF y 18 dB en UHF) y es ideal para zonas con baja cobertura de señal."
                        data-product-specs='[
                   {"label": "Marca", "value": "Master"},
                   {"label": "Color", "value": "Gris"},
                   {"label": "Impedancia", "value": "312231"},
                   {"label": "Dimensiones del producto", "value": "65l. x 27an. x 14alt. centimeters"},
                   {"label": "Fabricante", "value": "Master"}
               ]'
                        data-main-image="../img/antena 1.1.jpg"
                        data-thumbnails='["../img/antena 1.1.jpg", "../img/antena 1.2.jpg", "../img/antena 1.3.jpg"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/antena1.jpg" alt="Cámara de vigilancia">
                    <h3>LiteBeam 2x2 MIMO airMAX AC GEN2 CPE hasta 450 Mbps.</h3><br>
                    <p>Montaje mejorado y protección anti-estática.</p>
                    <p class="price">$599.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_003"
                        data-product-name="LiteBeam 2x2 MIMO airMAX AC GEN2 CPE hasta 450 Mbps, 5 GHz (5150 - 5875 MHz) con antena integrada de 23 dBi"
                        data-product-price="599.00"
                        data-product-description="airOS®8 ofrece funciones potentes, que incluyen compatibilidad con el protocolo airMAX® AC, análisis de RF en tiempo real y un diseño completamente nuevo para una mejor usabilidad."
                        data-product-specs='[
                   {"label": "Modelo", "value": "LBE-5AC-GEN2"},
                   {"label": "Marca", "value": "UBIQUITI"},
                   {"label": "Código SAT", "value": "43222640"},
                   {"label": "Garantía", "value": "3 años con SYSCOM"}
               ]'
                        data-main-image="../img/antena1.jpg"
                        data-thumbnails='["../img/antena1.jpg", "../img/antena2.png", "../img/antena3.png"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/antena 2.1.jpg" alt="Cámara de vigilancia">
                    <h3>LINK BITS EXHD03 Antena Exterior aérea HDTV</h3><br>
                    <p>Antena de largo alcance, amplificada, 12 elementos, alta definición, fácil de instalar.</p>
                    <p class="price">$399.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_003"
                        data-product-name="LINK BITS EXHD03 Antena Exterior aérea HDTV de Largo Alcance, Alcance Amplificado, 12 Elementos, Alta definición, (fácil de Instalar)."
                        data-product-price="399.00"
                        data-product-description="Esta antena de TV exterior HDTV capta señales digitales de alta definición (UHF). Es ideal para pantallas de nueva generación y te permite ver tus canales de TV abierta favoritos."
                        data-product-specs='[
                   {"label": "Marca", "value": "LINK BITS"},
                   {"label": "Color", "value": "plata"},
                   {"label": "Rango máximo", "value": "75 Kilómetros"},
                   {"label": "Dimensiones del producto", "value": "65l. x 27an. x 14alt. centimeters"},
                   {"label": "Fabricante", "value": "EXHD03"}
               ]'
                        data-main-image="../img/antena 2.1.jpg"
                        data-thumbnails='["../img/antena 2.1.jpg", "../img/antena 2.2.jpg", "../img/antena 2.3.jpg"]'>Más detalles</a><br>
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