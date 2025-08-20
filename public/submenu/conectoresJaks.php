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
        .btn-fav {
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .modal.fade .modal-dialog {
            transition: transform 0.3s ease-out;
        }
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
        <h1 class="my-cart-title">Categoría - Conectores y Jacks</h1>
        <section>
            <div class="product-container">
                <div class="product-card">
                    <img src="../img/jack.webp" alt="Módulo Jack de cobre">
                    <h3>Módulo Jack de cobre</h3><br>
                    <p>Cumple ANSI/TIA-1096-A con los contactos chapados con 50 micro pulgadas de oro para un rendimiento superior</p>
                    <p class="price">$299.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="jack_001"
                        data-product-name="Conector Jack RJ45 Estilo TG, Mini-Com, Categoría 6A, de 8 posiciones y 8 cables"
                        data-product-price="299.00"
                        data-product-description="El módulo de conector UTP Categoría 6A/Clase EA de 8 posiciones, se termina en un cable de par trenzado sin blindaje de 4 pares, 22 - 26 AWG d 100 ohms y no requiere el uso de una herramienta de impacto."
                        data-product-specs='[
                            {"label": "Modelo", "value": "CJ6X88TGBU"},
                            {"label": "Marca", "value": "PANDUIT"},
                            {"label": "Código SAT", "value": "39121462"},
                            {"label": "Garantía", "value": "3 años con SYSCOM"}
                        ]'
                        data-main-image="../img/jack.webp"
                        data-thumbnails='["../img/jack.webp", "../img/jackxd.webp", "../img/jack2.webp"]'>Más detalles</a><br>
                    <button type="button" class="btn btn-outline-success" 
                            data-id="jack_001" 
                            data-nombre="Módulo Jack de cobre" 
                            data-precio="299.00" 
                            data-imagen="../img/jack.webp">Agregar al carrito</button><br>
                </div>

                <div class="product-card">
                    <img src="../img/jackazul.png" alt="Conector Jack RJ45 Estilo TG con Llaveado Azul">
                    <h3>Conector Jack RJ45 Estilo TG con Llaveado Azul</h3><br>
                    <p>Mini-Com, Categoría 6, de 8 posiciones y 8 cables</p>
                    <p class="price">$499.00</p>
                    <a href="#" class="btn btn-outline-info open-product-modal"
                        data-product-id="jack_002"
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
                    <button type="button" class="btn btn-outline-success" 
                            data-id="jack_002" 
                            data-nombre="Conector Jack RJ45 Estilo TG con Llaveado Azul" 
                            data-precio="499.00" 
                            data-imagen="../img/jackazul.png">Agregar al carrito</button><br>
                </div>

                <div class="product-card">
                    <img src="../img/jack1.webp" alt="Jack RJ45 Blindado Negro Cat6A">
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
                    <button type="button" class="btn btn-outline-success" 
                            data-id="jack_007" 
                            data-nombre="Jack RJ45 Blindado Negro Cat6A" 
                            data-precio="599.00" 
                            data-imagen="../img/jack1.webp">Agregar al carrito</button><br>
                </div>

                <div class="product-card">
                    <img src="../img/1.jpg" alt="Jack RJ45 Naranja Cat5e">
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
                    <button type="button" class="btn btn-outline-success" 
                            data-id="jack_008" 
                            data-nombre="Jack RJ45 Naranja Cat5e" 
                            data-precio="399.00" 
                            data-imagen="../img/1.jpg">Agregar al carrito</button><br>
                </div>

                <div class="product-card">
                    <img src="../img/0.webp" alt="Jack RJ45 Gris Cat6">
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
                    <button type="button" class="btn btn-outline-success" 
                            data-id="jack_009" 
                            data-nombre="Jack RJ45 Gris Cat6 para Paneles" 
                            data-precio="449.00" 
                            data-imagen="../img/0.webp">Agregar al carrito</button><br>
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

            // Configurar botones de carrito en las tarjetas
            document.querySelectorAll('.product-card .btn-outline-success').forEach(button => {
                button.addEventListener('click', () => {
                    const id = button.dataset.id;
                    const nombre = button.dataset.nombre;
                    const precio = parseFloat(button.dataset.precio);
                    const imagen = button.dataset.imagen;
                    agregarAlCarrito(id, nombre, precio, imagen);
                });
            });

            // Configurar botones de "Más detalles"
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
        });
    </script>
</body>

</html>