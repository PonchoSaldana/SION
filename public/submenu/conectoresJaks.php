<?php
include("../../config/sesion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sion Wireless - Conectores y Jacks</title>
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
        <h1 class="my-cart-title">Categoria - Conectores y Jacks</h1>

        <section>
            <div class="product-container">
                <div class="product-card">
                    <img src="../img/jack.webp" alt="GE Antena de TV para Exteriores">
                    <h3>Módulo Jack de cobre</h3><br>
                    <p>Cumple ANSI/TIA-1096-A con los contactos chapados con 50 micro pulgadas de oro para un rendimiento superior</p>
                    <p class="price">$299.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_001"
                        data-product-name="Conector Jack RJ45 Estilo TG, Mini-Com, Categoría 6A, de 8 posiciones y 8 cables"
                        data-product-price="299.00"
                        data-product-description="El módulo de conector UTP Categoría 6A/Clase EA de 8 posiciones, se termina en un cable de par trenzado sin blindaje de 4 pares, 22 - 26 AWG d 100 ohms y no requiere el uso de una herramienta de impacto."
                        data-product-specs='[
                   {"label": "Modelo", "value": "CJ6X88TGBU"},
                   {"label": "Marca", "value": "PANDUIT"},
                   {"label": "Codigo SAT", "value": "39121462"},
                   {"label": "Garantia", "value": "3 años con SYSCOM"}
               ]'
                        data-main-image="../img/jack.webp"
                        data-thumbnails='["../img/jack.webp", "../img/jackxd.webp", "../img/jack2.webp"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/jackazul.png" alt="Cámara de vigilancia">
                    <h3>Conector Jack RJ45 Estilo TG con Llaveado Azul</h3><br>
                    <p>Mini-Com, Categoría 6, de 8 posiciones y 8 cables</p>
                    <p class="price">$499.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_002"
                        data-product-name="Conector Jack RJ45 Estilo TG con Llaveado Azul, Mini-Com, Categoría 6, de 8 posiciones y 8 cables"
                        data-product-price="499.00"
                        data-product-description="El módulo de conector con llave Mini-Com® Cat 6 UTP RJ45 TG está diseñado para terminar un cable de par trenzado 22-26 AWG de 4 pares y solo permite insertar cables de conexión Panduit con llave del mismo color. Cada módulo se prueba al 100% en fábrica para superar los requisitos de rendimiento estándar de la industria."
                        data-product-specs='[
                   {"label": "Modelo", "value": "CJK688TGBU"},
                   {"label": "Marca", "value": "PANDUIT"},
                   {"label": "Código SAT", "value": "39121462"},
                   {"label": "Garantía", "value": "3 años con SYSCOM"}
               ]'
                        data-main-image="../img/jackazul.png"
                        data-thumbnails='["../img/jackazul.png", "../img/jackazul2.jpg", "../img/jackazul1.jpg"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/jack1.webp" alt="Jack RJ45 Negro">
                    <h3>Jack RJ45 Blindado Negro Cat6A</h3><br>
                    <p>Blindaje total para máxima protección contra interferencias</p>
                    <p class="price">$599.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="jack_007"
                        data-product-name="Jack RJ45 Blindado Negro Cat6A, Mini-Com, 8 posiciones, 8 cables, protección EMI"
                        data-product-price="599.00"
                        data-product-description="Este jack blindado Cat6A ofrece máxima protección contra interferencias electromagnéticas, ideal para ambientes industriales y redes de alto rendimiento. Cumple con los estándares ANSI/TIA-568-C.2."
                        data-product-specs='[
                   {"label": "Modelo", "value": "CJ6X88TGBK"},
                   {"label": "Marca", "value": "PANDUIT"},
                   {"label": "Código SAT", "value": "39121462"},
                   {"label": "Garantía", "value": "5 años con SYSCOM"}
               ]'
                        data-main-image="../img/jack1.webp"
                        data-thumbnails='["../img/jack1.webp", "../img/jack3.webp", "../img/jack4.webp"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/1.jpg" alt="Jack RJ45 Naranja">
                    <h3>Jack RJ45 Naranja Cat5e</h3><br>
                    <p>Ideal para cableado estructurado en oficinas y hogares</p>
                    <p class="price">$399.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="jack_008"
                        data-product-name="Jack RJ45 Naranja Cat5e, Mini-Com, 8 posiciones, 8 cables, fácil instalación"
                        data-product-price="399.00"
                        data-product-description="Jack Cat5e de color naranja, perfecto para identificar segmentos de red. Fácil de instalar y compatible con cables UTP estándar."
                        data-product-specs='[
                   {"label": "Modelo", "value": "CJ5E88TGNJ"},
                   {"label": "Marca", "value": "PANDUIT"},
                   {"label": "Código SAT", "value": "39121462"},
                   {"label": "Garantía", "value": "3 años con SYSCOM"}
               ]'
                        data-main-image="../img/1.jpg"
                        data-thumbnails='["../img/1.jpg", "../img/2.jpg", "../img/3.jpg"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>

                <div class="product-card">
                    <img src="../img/0.webp" alt="Jack RJ45 Gris">
                    <h3>Jack RJ45 Gris Cat6 para Paneles</h3><br>
                    <p>Especial para paneles de parcheo y racks de telecomunicaciones</p>
                    <p class="price">$449.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="jack_009"
                        data-product-name="Jack RJ45 Gris Cat6, Mini-Com, 8 posiciones, 8 cables, uso en paneles"
                        data-product-price="449.00"
                        data-product-description="Jack Cat6 color gris, diseñado para paneles de parcheo y racks. Ofrece excelente desempeño y fácil integración en sistemas de cableado estructurado."
                        data-product-specs='[
                   {"label": "Modelo", "value": "CJ6X88TGGR"},
                   {"label": "Marca", "value": "PANDUIT"},
                   {"label": "Código SAT", "value": "39121462"},
                   {"label": "Garantía", "value": "3 años con SYSCOM"}
               ]'
                        data-main-image="../img/0.webp"
                        data-thumbnails='["../img/0.webp", "../img/00.webp", "../img/000.jpg"]'>Más detalles</a><br>
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