<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sion Wireless - Carrito</title>
    <link rel="shortcut icon" href="img/LOGO/favicon.png" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/carrito.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <span class="logo"><a href="index.php"><img src="img/LOGO/sin fondo.png" alt="Logo SION" height="90"></a></span>
                    <i class="bx bx-x sidelbarClose"></i>
                </div>
                <ul class="nav-links">
                    <li class="has-submenu">
                        <a href="#" data-submenu-toggle>Categoría</a>
                        <ul class="submenu">
                            <li><a href="submenu/antenas.php">Antenas</a></li>
                            <li><a href="submenu/camaras.php">Cámaras de seguridad</a></li>
                            <li><a href="submenu/cables.php">Cables de red</a></li>
                            <li><a href="submenu/conectoresJaks.php">Conectores y jacks</a></li>
                            <li><a href="submenu/modems.php">Módems</a></li>
                            <li><a href="submenu/switch.php">Switches</a></li>
                            <li><a href="submenu/router.php">Routers</a></li>
                        </ul>
                    </li>
                    <li><a href="Servicios.php">Servicios</a></li>
                    <li><a href="ofertas.php">Ofertas</a></li>
                    <li><a href="compras.php">Compras</a></li>
                    <li><a href="favoritos.php">Favoritos</a></li>
                    <li><a href="todos_los_productos.php">Todos los productos</a></li>
                </ul>
            </div>

            <div class="searchBox">
                <div class="iconUser">
                    <a href="login.php" style="color: white;">
                        <i class='bx bx-user user'></i></a>
                </div>
                <div class="searchToggle">
                    <i class="bx bx-x cancel"></i>
                    <i class="bx bx-search search"></i>
                </div>
                <div class="iconCarrito">
                    <a href="carrito.php" style="color: white;">
                        <i class='bx bx-cart cart'></i></a>
                    <span id="productos">0</span>
                </div>
                <div class="search-field">
                    <input type="text" placeholder="Buscar tus productos...">
                    <i class="bx bx-search search"></i>
                </div>
            </div>
        </div>
    </nav>
    <!--------------------------------------------------------------------------->
    <hr>
    <section class="banner"></section>
    <!-- Contenedor principal del carrito -->
    <section class="contenedor-carrito">
        <!-- Tabla de productos y resumen -->
        <h1 class="my-cart-title">Mi Carrito</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-7 col-sm-12 mb-4">
                    <div class="products-main-container">
                        <div class="header-row">
                            <div style="flex: 2;">Productos</div>
                            <div style="flex: 1; text-align: center;">Cantidad</div>
                            <div style="flex: 1; text-align: right;">Total</div>
                        </div>

                        <div class="product-list-container">
                            <div class="product-card">
                                <img src="img/descarga (1).jpeg" alt="Cámara de seguridad">
                                <div class="product-details">
                                    <h5>Cámara de seguridad analógica 1080P al aire libre IP66 cámara de vigilancia CCTV impermeab Irfora Cámara AHD</h5>
                                    <div class="product-actions">
                                        <a href="#" class="btn btn-primary btn-sm">Más detalles</a>
                                        <button class="btn btn-danger btn-sm">Eliminar</button>
                                        <span class="price">Precio $400</span>
                                    </div>
                                </div>
                                <div class="quantity-control-container">
                                    <div class="input-group custom-quantity-selector" data-price="400">
                                        <button class="btn btn-outline-secondary" type="button" data-action="minus">-</button>
                                        <input type="number" class="form-control" value="1" min="1" aria-label="Cantidad" readonly>
                                        <button class="btn btn-outline-secondary" type="button" data-action="plus">+</button>
                                    </div>
                                    <span class="item-total">$400</span>
                                </div>
                            </div>

                            <div class="product-card">
                                <img src="img/descarga (2).jpeg" alt="Cámara CCTV">
                                <div class="product-details">
                                    <h5>Cámara CCTV a color a tiempo completo 1080P, cámara de seguridad al aire libre con cable de 2 MP</h5>
                                    <div class="product-actions">
                                        <a href="#" class="btn btn-primary btn-sm">Más detalles</a>
                                        <button class="btn btn-danger btn-sm">Eliminar</button>
                                        <span class="price">Precio $500</span>
                                    </div>
                                </div>
                                <div class="quantity-control-container">
                                    <div class="input-group custom-quantity-selector" data-price="500">
                                        <button class="btn btn-outline-secondary" type="button" data-action="minus">-</button>
                                        <input type="number" class="form-control" value="2" min="1" aria-label="Cantidad" readonly>
                                        <button class="btn btn-outline-secondary" type="button" data-action="plus">+</button>
                                    </div>
                                    <span class="item-total">$1000</span>
                                </div>
                            </div>

                            <div class="product-card">
                                <img src="img/images (1).jpeg" alt="Router">
                                <div class="product-details">
                                    <h5>Router CISCO1941-SEC-K9 2U 2 Puertos PoE Ports Puerto de gestion 4 Ranuras</h5>
                                    <div class="product-actions">
                                        <a href="#" class="btn btn-primary btn-sm">Más detalles</a>
                                        <button class="btn btn-danger btn-sm">Eliminar</button>
                                        <span class="price">Precio $600</span>
                                    </div>
                                </div>
                                <div class="quantity-control-container">
                                    <div class="input-group custom-quantity-selector" data-price="600">
                                        <button class="btn btn-outline-secondary" type="button" data-action="minus">-</button>
                                        <input type="number" class="form-control" value="1" min="1" aria-label="Cantidad" readonly>
                                        <button class="btn btn-outline-secondary" type="button" data-action="plus">+</button>
                                    </div>
                                    <span class="item-total">$600</span>
                                </div>
                            </div>

                            <div class="product-card">
                                <img src="img/images (2).jpeg" alt="Disco Duro">
                                <div class="product-details">
                                    <h5>Disco Duro Externo USB 3.0 de 1TB Seagate Expansion Portable Hard Drive</h5>
                                    <div class="product-actions">
                                        <a href="#" class="btn btn-primary btn-sm">Más detalles</a>
                                        <button class="btn btn-danger btn-sm">Eliminar</button>
                                        <span class="price">Precio $80</span>
                                    </div>
                                </div>
                                <div class="quantity-control-container">
                                    <div class="input-group custom-quantity-selector" data-price="80">
                                        <button class="btn btn-outline-secondary" type="button" data-action="minus">-</button>
                                        <input type="number" class="form-control" value="3" min="1" aria-label="Cantidad" readonly>
                                        <button class="btn btn-outline-secondary" type="button" data-action="plus">+</button>
                                    </div>
                                    <span class="item-total">$240</span>
                                </div>
                            </div>
                            <div class="product-card">
                                <img src="img/images (2).jpeg" alt="Disco Duro">
                                <div class="product-details">
                                    <h5>Disco Duro Externo USB 3.0 de 1TB Seagate Expansion Portable Hard Drive</h5>
                                    <div class="product-actions">
                                        <a href="#" class="btn btn-primary btn-sm">Más detalles</a>
                                        <button class="btn btn-danger btn-sm">Eliminar</button>
                                        <span class="price">Precio $80</span>
                                    </div>
                                </div>
                                <div class="quantity-control-container">
                                    <div class="input-group custom-quantity-selector" data-price="80">
                                        <button class="btn btn-outline-secondary" type="button" data-action="minus">-</button>
                                        <input type="number" class="form-control" value="3" min="1" aria-label="Cantidad" readonly>
                                        <button class="btn btn-outline-secondary" type="button" data-action="plus">+</button>
                                    </div>
                                    <span class="item-total">$240</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-5 col-sm-12 mb-4">
                    <div class="summary-container"><br>
                        <div class="summary-header">
                            Resumen de compra
                        </div>
                        <div class="summary-item">
                            <span id="summary-products-count-text">Productos ( 0 )</span>
                            <span></span>
                        </div>
                        <div class="summary-item total">
                            <span>Total</span>
                            <span class="value" id="grand-total">$0</span>
                        </div>
                        <button class="buy-button" id="comprarTodo">Comprar</button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--VISTA RECIENTEMENTE-->
    <section>
        <div class="recently-viewed-container">
            <h2>Viste recientemente</h2>
            <div class="carousel-wrapper">
                <button class="nav-button left" onclick="scrollCarousel(-1)">&#8592;</button>
                <div class="carousel" id="productCarousel">
                    <div class="product-cardxd">
                        <div class="product-image-container">
                            <img src="img/descarga (1).jpeg" alt="Cámara de seguridad analógica 1080P al aire libre" class="product-image">
                        </div>
                        <div class="product-details">
                            <p class="product-description">Cámara de seguridad analógica 1080P al aire libre IP66 cámara de vigilancia CCTV...</p>
                            <div class="product-price-section">
                                $400
                            </div>
                            <button class="add-to-cart-button">Agregar al carrito</button>
                        </div>
                    </div>
                    <div class="product-cardxd">
                        <div class="product-image-container">
                            <img src="img/images.jpeg" alt="Cámara CCTV a color a tiempo completo 1080P" class="product-image">
                        </div>
                        <div class="product-details">
                            <p class="product-description">Cámara CCTV a color a tiempo completo 1080P, cámara de seguridad al aire libre con cable de 2 MP...</p>
                            <div class="product-price-section">
                                $500
                            </div>
                            <button class="add-to-cart-button">Agregar al carrito</button>
                        </div>
                    </div>
                    <div class="product-cardxd">
                        <div class="product-image-container">
                            <img src="img/images (4).jpeg" alt="Antena de TV Mitzu Interior Negro TV-8000" class="product-image">
                        </div>
                        <div class="product-details">
                            <p class="product-description">Antena de TV Mitzu Interior Negro TV-8000</p>
                            <div class="product-price-section">
                                $200
                            </div>
                            <button class="add-to-cart-button">Agregar al carrito</button>
                        </div>
                    </div>
                    <div class="product-cardxd">
                        <div class="product-image-container">
                            <img src="img/descarga.jpeg" alt="TL-WR940N 450Mbps Wireless N Router" class="product-image">
                        </div>
                        <div class="product-details">
                            <p class="product-description">TL-WR940N 450Mbps Wireless N Router</p>
                            <div class="product-price-section">
                                $700
                            </div>
                            <button class="add-to-cart-button">Agregar al carrito</button>
                        </div>
                    </div>
                    <div class="product-cardxd">
                        <div class="product-image-container">
                            <img src="img/images (3).jpeg" alt="TL-WR940N 450Mbps Wireless N Router" class="product-image">
                        </div>
                        <div class="product-details">
                            <p class="product-description">TL-WR940N 450Mbps Wireless N Router</p>
                            <div class="product-price-section">
                                $700
                            </div>
                            <button class="add-to-cart-button">Agregar al carrito</button>
                        </div>
                    </div>
                    <div class="product-cardxd">
                        <div class="product-image-container">
                            <img src="img/descarga (1).jpeg" alt="TL-WR940N 450Mbps Wireless N Router" class="product-image">
                        </div>
                        <div class="product-details">
                            <p class="product-description">TL-WR940N 450Mbps Wireless N Router</p>
                            <div class="product-price-section">
                                $700
                            </div>
                            <button class="add-to-cart-button">Agregar al carrito</button>
                        </div>
                    </div>
                    <div class="product-cardxd">
                        <div class="product-image-container">
                            <img src="img/images (2).jpeg" alt="Switch Gigabit Ethernet de 24 puertos" class="product-image">
                        </div>
                        <div class="product-details">
                            <p class="product-description">Switch Gigabit Ethernet de 24 puertos</p>
                            <div class="product-price-section">
                                $2500
                            </div>
                            <button class="add-to-cart-button">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <button class="nav-button right" onclick="scrollCarousel(1)">&#8594;</button>
            </div>
        </div>
    </section>

    <!-- Pie de página -->
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
    <script src="js/carrito.js"></script>
    <script>
  function obtenerCarrito() {
    return JSON.parse(localStorage.getItem('carrito')) || [];
  }

  function mostrarCarrito() {
    const lista = document.querySelector('.product-list-container');
    const resumen = document.getElementById('summary-products-count-text');
    const total = document.getElementById('grand-total');
    const carrito = obtenerCarrito();

    lista.innerHTML = '';
    let suma = 0;

    carrito.forEach((p, i) => {
      const subtotal = p.precio * p.cantidad;
      suma += subtotal;

      lista.innerHTML += `
        <div class="product-card">
          <img src="${p.imagen}" alt="${p.nombre}">
          <div class="product-details">
            <h5>${p.nombre}</h5>
            <div class="product-actions">
              <button class="btn btn-danger btn-sm" onclick="eliminar(${i})">Eliminar</button>
              <span class="price">$${p.precio}</span>
            </div>
          </div>
          <div class="quantity-control-container">
            <div class="input-group custom-quantity-selector">
              <button class="btn btn-outline-secondary" onclick="cambiarCantidad(${i}, -1)">-</button>
              <input type="number" class="form-control" value="${p.cantidad}" readonly>
              <button class="btn btn-outline-secondary" onclick="cambiarCantidad(${i}, 1)">+</button>
            </div>
            <span class="item-total">$${subtotal.toFixed(2)}</span>
          </div>
        </div>
      `;
    });

    resumen.textContent = `Productos (${carrito.length})`;
    total.textContent = `$${suma.toFixed(2)}`;
  }

  function eliminar(i) {
    let carrito = obtenerCarrito();
    carrito.splice(i, 1);
    localStorage.setItem('carrito', JSON.stringify(carrito));
    mostrarCarrito();
  }

  function cambiarCantidad(i, cambio) {
    let carrito = obtenerCarrito();
    carrito[i].cantidad += cambio;
    if (carrito[i].cantidad < 1) carrito[i].cantidad = 1;
    localStorage.setItem('carrito', JSON.stringify(carrito));
    mostrarCarrito();
  }

  mostrarCarrito();
</script>
<script>
document.getElementById('comprarTodo').addEventListener('click', () => {
  const carrito = JSON.parse(localStorage.getItem('carrito')) || [];

  if (carrito.length === 0) {
    alert("Tu carrito está vacío.");
    return;
  }

  // Recuperar compras existentes o inicializar
  const compras = JSON.parse(localStorage.getItem('compras')) || [];

  // Agregar productos con estado
  const nuevasCompras = carrito.map(producto => ({
    ...producto,
    estado: "Esperando al cliente"
  }));

  const actualizadas = [...compras, ...nuevasCompras];
  localStorage.setItem('compras', JSON.stringify(actualizadas));

  // Vaciar carrito
  localStorage.removeItem('carrito');
  window.location.href = "compras.php";
});
</script>


</body>

</html>