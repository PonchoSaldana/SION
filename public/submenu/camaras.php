<?php
include("../../config/sesion.php");
?>
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
        <h1 class="my-cart-title">Categoria - Camaras</h1>

        <section>
            <div class="product-container">
                <div class="product-card">
                    <img src="../img/imagen2ofertas.jpg" alt="GE Antena de TV para Exteriores">
                    <h3>Turret TURBOHD 2 Megapíxel (1080p)</h3><br>
                    <p>4 Tecnologías (TVI / AHD / CVI / CVBS) / Uso en Interior</p>
                    <p class="price">$299.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_001"
                        data-product-name="Turret TURBOHD 2 Megapíxel (1080p) / Lente 2.8 mm / 20 mts IR EXIR / 4 Tecnologías (TVI / AHD / CVI / CVBS) / Uso en Interior"
                        data-product-price="299.00"
                        data-product-description="Las cámaras HiLook, comparten la patente de la marca Hikvision 'EXIR ', el cual le otorga una visión nocturna más efectiva por su diseño, composición y efecto umbral de luz. Esto le permitirá tener mucho mejor detalle en la noche, y una visión nocturna uniforme."
                        data-product-specs='[
                   {"label": "Modelo", "value": "THC-T120-PC"},
                   {"label": "Marca", "value": "HiLook by HIKVISION"},
                   {"label": "Código SAT", "value": "46171610"},
                   {"label": "Garantía", "value": "3 años con SYSCOM"}
               ]'
                        data-main-image="../img/imagen2ofertas.jpg"
                        data-thumbnails='["../img/imagen2ofertas.jpg", "../img/camaraxd.png", "../img/camaraxdd.png"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/images (1).jpeg" alt="Cámara de vigilancia">
                    <h3>Cámara IP Wi-Fi 2 megapixel</h3><br>
                    <p>Visión 360 / Audio doble vías / Visión Nocturna / Notificación Push / Memoria Micro SD</p>
                    <p class="price">$499.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_002"
                        data-product-name="Cámara IP Wi-Fi 2 megapixel / Visión 360 / Audio doble vías / Visión Nocturna / Notificación Push / Memoria Micro SD"
                        data-product-price="499.00"
                        data-product-description="La cámara ofrece detección de movimiento y de personas, con un ángulo de visión de 73.5° y notificaciones push. Utiliza el codec H.264 para su resolución de 1080p Full HD. El audio es de 2 vías, opera en la frecuencia de 2.4 GHz, y es compatible con una memoria MicroSD de hasta 512 GB (no incluida). Además, cuenta con visión nocturna de hasta 7 metros y una lente focal de 3.3mm."
                        data-product-specs='[
                   {"label": "Modelo", "value": "TAPO-C500"},
                   {"label": "Marca", "value": "TP-LINK"},
                   {"label": "Código SAT", "value": "46171610"},
                   {"label": "Garantía", "value": "3 años con SYSCOM"}
               ]'
                        data-main-image="../img/images (1).jpeg"
                        data-thumbnails='["../img/images (1).jpeg", "../img/camara2.png", "../img/camara2.2.png"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/images (2).jpeg" alt="Cámara de vigilancia">
                    <h3>Cámara de seguridad Wi-Fi 3 Mpx robotizada para exterior, tipo domo</h3><br>
                    <p>Visión nocturna, audio bidireccional, detección de movimiento, control remoto.</p>
                    <p class="price">$599.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_003"
                        data-product-name="Cámara de seguridad Wi-Fi 3 Mpx robotizada para exterior, tipo domo"
                        data-product-price="599.00"
                        data-product-description="
Con esta minicámara de seguridad Wi-Fi tipo domo para exterior, monitorea cualquier lugar a través de tu celular. Conéctala por Wi-Fi a tu módem y configúrala con nuestra app Steren Home (disponible en App Store* y Google Play*), para controlar su movimiento y todas sus funciones."
                        data-product-specs='[
                   {"label": "Alimentación", "value": "5 Vcc 1 A"},
                   {"label": "Frecuencia de operación", "value": "2,4 GHz"},
                   {"label": "Estándar", "value": "IEEE 802.11 b/g/n"},
                   {"label": "Video", "value": "3 Mpx / VGA"},
                   {"label": "Imagen", "value": "2304 x 1296 (3 Mpx) 20 FPS / VGA 20 FPS"}
               ]'
                        data-main-image="../img/images (2).jpeg"
                        data-thumbnails='["../img/images (2).jpeg", "../img/camaraste.webp", "../img/camaraste2.webp"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/images.jpeg" alt="Cámara de vigilancia">
                    <h3>Camara Bala IP 5MP</h3><br>
                    <p>LENTE MOT 2.7 - 13.5 MM |Compatible Con Terceros | API , Onvif Profile S/T | IK10 IP67</p>
                    <p class="price">$399.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_003"
                        data-product-name="Camara Bala IP 5MP | LENTE MOT 2.7 - 13.5 MM |Compatible Con Terceros | API , Onvif Profile S/T | IK10 IP67 | 30M IR | H.265 | SOPORTA E/S ALARMA| SOPORTA E/S AUDIO"
                        data-product-price="399.00"
                        data-product-description="Las cámaras bala o bullet, son dispositivos con forma de cañón, sobresalientes hacia fuera. Se trata de cámaras utilizadas generalmente más para exterior por su estructura física son más persuasivas a la vista de las personas, esto es de acuerdo para el tipo de espacio. Esto no quiere decir que sean exclusivamente externas ya que pueden ser para interior también y algunas cuentan con certificación antivandalicas."
                        data-product-specs='[
                   {"label": "Modelo", "value": "DCT2531WR"},
                   {"label": "Marca", "value": "IDIS"},
                   {"label": "Código SAT", "value": "46171610"},
                   {"label": "Garantía", "value": "6 años con SYSCOM"}
               ]'
                        data-main-image="../img/images.jpeg"
                        data-thumbnails='["../img/images.jpeg", "../img/xd.png", "../img/xd1.png"]'>Más detalles</a><br>
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