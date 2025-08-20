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
    <style>
        .btn-outline-success { 
            background-color: transparent; 
            border-color: #28a745; 
            color: #28a745; 
        }
        .btn-outline-success:hover { 
            background-color: #28a745; 
            color: white; 
        }
        .btn-outline-danger { 
            background-color: transparent; 
            border-color: #dc3545; 
            color: #dc3545; 
        }
        .btn-outline-danger:hover { 
            background-color: #dc3545; 
            color: white; 
        }
        .btn-fav.active i { 
            color: #dc3545; 
        }
        .btn-fav i { 
            color: #6c757d; 
        }
        /* Asegura que los modales no tengan animaciones conflictivas */
        .modal.fade .modal-dialog {
            transition: transform 0.3s ease-out;
        }
        /* Estilos para la galería de imágenes */
        .modal-image-gallery {
            flex: 1;
            padding: 20px;
        }
        .modal-main-image {
            max-height: 300px;
            object-fit: contain;
            width: 100%;
        }
        .modal-thumbnails {
            display: flex;
            gap: 10px;
            margin-top: 10px;
            overflow-x: auto;
        }
        .modal-thumbnails img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid transparent;
        }
        .modal-thumbnails img.active {
            border-color: #28a745;
        }
        .modal-details-content {
            flex: 1;
            padding: 20px;
        }
        .modal-details-header {
            margin-bottom: 20px;
        }
        .description-section {
            margin-top: 20px;
        }
    </style>
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
                            <li><a href="../submenu/camaras.php">Cámaras de seguridad</a></li>
                            <li><a href="../submenu/cables.php">Cables de red</a></li>
                            <li><a href="../submenu/conectoresJaks.php">Conectores y jacks</a></li>
                            <li><a href="../submenu/modems.php">Módems</a></li>
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
                    <a href="<?php echo $usuarioLogueado ? '../../model/mi_cuenta.php' : '../../views/login.php'; ?>" style="color: white;">
                        <i class='bx bx-user user'></i>
                    </a>
                </div>
                <div class="searchToggle">
                    <i class="bx bx-x cancel"></i>
                    <i class="bx bx-search search"></i>
                </div>
                <div class="iconCarrito">
                    <a href="../../views/carrito.php" style="color: white;">
                        <i class='bx bx-cart cart'></i>
                    </a>
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
        <h1 class="my-cart-title">Categoría - Antenas</h1>
        <section>
            <div class="product-container">
                <div class="product-card">
                    <img src="../img/antena.webp" alt="GE Antena de TV para Exteriores">
                    <h3>GE Antena de TV para Exteriores</h3><br>
                    <p>Antena de TV de alta ganancia para exteriores, ideal para recibir señales digitales.</p>
                    <p class="price">$299.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_001"
                        data-product-name="GE Antena de TV para Exteriores, Largo Alcance, Resistente a la Intemperie, Compatible con 4K, 1080p"
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
                    <img src="../img/antena 1.1.jpg" alt="Master Antena Exterior HD">
                    <h3>Master Antena Exterior HD 37 Elementos para TV</h3><br>
                    <p>Antena de alta calidad para exterior, resolución 4K HD.</p>
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
                    <img src="../img/antena1.jpg" alt="LiteBeam 2x2 MIMO airMAX">
                    <h3>LiteBeam 2x2 MIMO airMAX AC GEN2 CPE hasta 450 Mbps</h3><br>
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
                    <img src="../img/antena 2.1.jpg" alt="LINK BITS EXHD03 Antena">
                    <h3>LINK BITS EXHD03 Antena Exterior aérea HDTV</h3><br>
                    <p>Antena de largo alcance, amplificada, 12 elementos, alta definición, fácil de instalar.</p>
                    <p class="price">$399.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="antena_004"
                        data-product-name="LINK BITS EXHD03 Antena Exterior aérea HDTV de Largo Alcance, Alcance Amplificado, 12 Elementos, Alta definición, (fácil de Instalar)"
                        data-product-price="399.00"
                        data-product-description="Esta antena de TV exterior HDTV capta señales digitales de alta definición (UHF). Es ideal para pantallas de nueva generación y te permite ver tus canales de TV abierta favoritos."
                        data-product-specs='[
                            {"label": "Marca", "value": "LINK BITS"},
                            {"label": "Color", "value": "Plata"},
                            {"label": "Rango máximo", "value": "75 Kilómetros"},
                            {"label": "Dimensiones del producto", "value": "65l. x 27an. x 14alt. centimeters"},
                            {"label": "Fabricante", "value": "EXHD03"}
                        ]'
                        data-main-image="../img/antena 2.1.jpg"
                        data-thumbnails='["../img/antena 2.1.jpg", "../img/antena 2.2.jpg", "../img/antena 2.3.jpg"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success">Agregar al carrito</button>
                </div>
            </div>

            <!-- Modal para detalles del producto -->
            <div class="modal fade" id="productDetailsModal" tabindex="-1" aria-labelledby="productDetailsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productDetailsModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body d-flex">
                            <div class="modal-image-gallery">
                                <img src="" alt="Imagen principal del producto" class="modal-main-image" id="mainModalImage">
                                <div class="modal-thumbnails" id="modalThumbnailsContainer"></div>
                            </div>
                            <div class="modal-details-content">
                                <div class="modal-details-header">
                                    <div id="modalProductSpecs"></div>
                                </div>
                                <p class="price" id="modalProductPrice"></p>
                                <div class="description-section">
                                    <p id="modalProductDescription"></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-success add-to-cart-modal">Agregar al carrito</button>
                            <button type="button" class="btn btn-outline-danger btn-fav add-to-favorites-modal"><i class='bx bx-heart'></i> Agregar a favoritos</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/menu.js"></script>
    <script>
        // ----------- FUNCIONES CARRITO ------------
        function obtenerCarrito() {
            return JSON.parse(localStorage.getItem('carrito')) || [];
        }

        function guardarCarrito(carrito) {
            localStorage.setItem('carrito', JSON.stringify(carrito));
            actualizarContadorCarrito();
        }

        function agregarAlCarrito(id, nombre, precio, imagen) {
            let carrito = obtenerCarrito();
            const existe = carrito.find(p => p.id === id);
            if (existe) {
                existe.cantidad += 1;
            } else {
                carrito.push({ id, nombre, precio, imagen, cantidad: 1 });
            }
            guardarCarrito(carrito);
            mostrarModal("Agregado al carrito", "bx-cart", "green");
        }

        function actualizarContadorCarrito() {
            let carrito = obtenerCarrito();
            const count = carrito.reduce((sum, item) => sum + item.cantidad, 0);
            document.getElementById('productos').textContent = count;
        }

        // ----------- FUNCIONES FAVORITOS ------------
        function obtenerFavoritos() {
            return JSON.parse(localStorage.getItem('favoritos')) || [];
        }

        function guardarFavoritos(favoritos) {
            localStorage.setItem('favoritos', JSON.stringify(favoritos));
        }

        function toggleFavorito(id, nombre, precio, imagen, boton) {
            let favoritos = obtenerFavoritos();
            let existe = favoritos.find(p => p.id === id);
            if (existe) {
                favoritos = favoritos.filter(p => p.id !== id);
                guardarFavoritos(favoritos);
                if (boton) {
                    boton.classList.remove('active');
                    boton.querySelector('i').classList.replace('bxs-heart', 'bx-heart');
                }
                mostrarModal("Eliminado de favoritos", "bx-heart", "gray");
            } else {
                favoritos.push({ id, nombre, precio, imagen });
                guardarFavoritos(favoritos);
                if (boton) {
                    boton.classList.add('active');
                    boton.querySelector('i').classList.replace('bx-heart', 'bxs-heart');
                }
                mostrarModal("Agregado a favoritos", "bxs-heart", "red");
            }
        }

        // ----------- FUNCIONES MODAL NOTIFICACIÓN ------------
        function mostrarModal(mensaje, icono, color) {
            const modal = document.createElement('div');
            modal.className = 'modal fade';
            modal.innerHTML = `
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <i class="bx ${icono}" style="font-size: 2rem; color: ${color};"></i>
                            <p>${mensaje}</p>
                        </div>
                    </div>
                </div>
            `;
            document.body.appendChild(modal);
            const bsModal = new bootstrap.Modal(modal);
            bsModal.show();
            setTimeout(() => {
                bsModal.hide();
                modal.remove();
            }, 1500);
        }

        // ----------- INICIALIZACIÓN Y MODAL ------------
        document.addEventListener('DOMContentLoaded', () => {
            actualizarContadorCarrito();
            const favoritos = obtenerFavoritos();
            const modal = document.getElementById('productDetailsModal');
            const modalTitle = document.getElementById('productDetailsModalLabel');
            const modalImage = document.getElementById('mainModalImage');
            const modalThumbnails = document.getElementById('modalThumbnailsContainer');
            const modalPrice = document.getElementById('modalProductPrice');
            const modalDescription = document.getElementById('modalProductDescription');
            const modalSpecs = document.getElementById('modalProductSpecs');
            const addToCartBtn = document.querySelector('.add-to-cart-modal');
            const addToFavoritesBtn = document.querySelector('.add-to-favorites-modal');

            document.querySelectorAll('.open-product-modal').forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const id = button.dataset.productId;
                    const nombre = button.dataset.productName;
                    const precio = parseFloat(button.dataset.productPrice);
                    const descripcion = button.dataset.productDescription;
                    const imagen = button.dataset.mainImage;
                    const thumbnails = JSON.parse(button.dataset.thumbnails);
                    const specs = JSON.parse(button.dataset.productSpecs);

                    // Actualizar contenido del modal
                    modalTitle.textContent = nombre;
                    modalImage.src = imagen;
                    modalPrice.textContent = `$ ${precio.toFixed(2)}`;
                    modalDescription.textContent = descripcion;

                    // Generar especificaciones
                    modalSpecs.innerHTML = specs.map(spec => `<p><strong>${spec.label}:</strong> ${spec.value}</p>`).join('');

                    // Generar miniaturas
                    modalThumbnails.innerHTML = thumbnails.map((thumb, index) => `
                        <img src="${thumb}" alt="Miniatura ${index + 1}" class="${thumb === imagen ? 'active' : ''}">
                    `).join('');

                    // Configurar botones del modal
                    addToCartBtn.dataset.id = id;
                    addToCartBtn.dataset.nombre = nombre;
                    addToCartBtn.dataset.precio = precio;
                    addToCartBtn.dataset.imagen = imagen;

                    addToFavoritesBtn.dataset.id = id;
                    addToFavoritesBtn.dataset.nombre = nombre;
                    addToFavoritesBtn.dataset.precio = precio;
                    addToFavoritesBtn.dataset.imagen = imagen;

                    // Actualizar estado del botón de favoritos
                    addToFavoritesBtn.innerHTML = `<i class='bx ${favoritos.some(p => p.id === id) ? 'bxs-heart' : 'bx-heart'}'></i> Agregar a favoritos`;
                    addToFavoritesBtn.classList.toggle('active', favoritos.some(p => p.id === id));

                    // Mostrar modal
                    new bootstrap.Modal(modal).show();
                });
            });

            // Cambiar imagen principal al hacer clic en miniatura
            modalThumbnails.addEventListener('click', (e) => {
                if (e.target.tagName === 'IMG') {
                    modalThumbnails.querySelectorAll('img').forEach(img => img.classList.remove('active'));
                    e.target.classList.add('active');
                    modalImage.src = e.target.src;
                }
            });

            // Evento para agregar al carrito
            addToCartBtn.addEventListener('click', () => {
                const id = addToCartBtn.dataset.id;
                const nombre = addToCartBtn.dataset.nombre;
                const precio = parseFloat(addToCartBtn.dataset.precio);
                const imagen = addToCartBtn.dataset.imagen;
                agregarAlCarrito(id, nombre, precio, imagen);
                bootstrap.Modal.getInstance(modal).hide();
            });

            // Evento para agregar a favoritos
            addToFavoritesBtn.addEventListener('click', () => {
                const id = addToFavoritesBtn.dataset.id;
                const nombre = addToFavoritesBtn.dataset.nombre;
                const precio = parseFloat(addToFavoritesBtn.dataset.precio);
                const imagen = addToFavoritesBtn.dataset.imagen;
                toggleFavorito(id, nombre, precio, imagen, addToFavoritesBtn);
                bootstrap.Modal.getInstance(modal).hide();
            });

            // Evento para botones de carrito en las tarjetas
            document.querySelectorAll('.product-card .btn-outline-success').forEach(button => {
                button.addEventListener('click', () => {
                    const card = button.closest('.product-card');
                    const id = card.querySelector('.open-product-modal').dataset.productId;
                    const nombre = card.querySelector('h3').textContent;
                    const precio = parseFloat(card.querySelector('.price').textContent.replace('$', ''));
                    const imagen = card.querySelector('img').src;
                    agregarAlCarrito(id, nombre, precio, imagen);
                });
            });
        });
    </script>
</body>

</html>