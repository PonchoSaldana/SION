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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <span class="logo"><a href="#"><img src="img/LOGO/sin fondo.png" alt="Logo SION" height="90"></a></span>
                    <i class="bx bx-x sidelbarClose"></i>
                </div>
                <ul class="nav-links">
                    <li><a href="#">Categorias</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Ofertas</a></li>
                    <li><a href="#">Compras</a></li>
                    <li><a href="#">Favoritos</a></li>
                    <li><a href="#">Ver todos los productos</a></li>
                </ul>
            </div>

            <div class="searchBox">
                <div class="iconUser">
                   <a href="login.php" style="color: white;"> <i class='bx bx-user user'></i></a><!--- Icono de usuario -->
                </div>
                <div class="searchToggle">
                    <i class="bx bx-x cancel"></i><!--- Icono de cerrar búsqueda -->
                    <i class="bx bx-search search"></i><!--- Icono de búsqueda -->
                </div>
                <div class="iconCarrito">
                    <a href="carrito.php" style="color: white;"> <i class='bx bx-cart cart'></i></a><span id="productos">0</span><!--- Icono de carrito de compras -->
                </div>
                <div class="search-field">
                    <input type="text" placeholder="Buscar tus productos preferidos...">
                    <i class="bx bx-search search"></i>
                </div>
            </div>
        </div>
    </nav>
<hr>
<section class="banner">
    
</section>
    <h1>Mi carrito</h1>

    <!-- Tabla de productos y resumen -->
    <div class="contenido-carrito">

      <!-- Lista de productos -->
      <div class="lista-productos">
        
        <!-- Producto individual -->
        <div class="producto">
          <img src="{{ asset('img/images (2).jpeg') }}" alt="Cámara AHD">
          <div class="info-producto">
            <h3>Cámara de seguridad analógica 1080P al aire libre IP66 cámara de vigilancia CCTV</h3>
            <p class="precio">Precio $400</p>
            <div class="acciones">
              <button>Eliminar</button>
              <div class="cantidad">
                <button>-</button>
                <input type="text" value="1">
                <button>+</button>
              </div>
              <p class="total">$400</p>
            </div>
          </div>
        </div>

        <!-- Otro producto -->
        <div class="producto">
          <img src="{{ asset('img/images (3).jpeg') }}" alt="Cámara CCTV">
          <div class="info-producto">
            <h3>Switch 24 puertos marca Cisco</h3>
            <p class="precio">Precio $500</p>
            <div class="acciones">
              <button>Eliminar</button>
              <div class="cantidad">
                <button>-</button>
                <input type="text" value="2">
                <button>+</button>
              </div>
              <p class="total">$1000</p>
            </div>
          </div>
        </div>

      </div>

      <!-- Resumen de compra -->
      <aside class="resumen-compra">
        <h3>Resumen de compra</h3>
        <p>Productos (3)</p>
        <h2>Total: <span class="total-final">$1400</span></h2>
        <button class="boton-comprar">Comprar</button>
      </aside>

    </div>
  </section>

  <!-- Sección de productos vistos recientemente -->
<section class="vistos-recientemente">
    <h2>Viste recientemente</h2>
    <div class="productos-recientes">

      <!-- Cada tarjeta de producto -->
      <div class="tarjeta-producto">
        <img src="{{ asset('img/images (2).jpeg') }}" alt="">
        <p>$400</p>
        <button>Agregar al carrito</button>
      </div>

      <div class="tarjeta-producto">
        <img src="{{ asset('img/images (3).jpeg') }}" alt="">
        <p>$500</p>
        <button>Agregar al carrito</button>
      </div>

      <div class="tarjeta-producto">
        <img src="{{ asset('img/images (4).jpeg') }}" alt="">
        <p>$200</p>
        <button>Agregar al carrito</button>
      </div>

      <div class="tarjeta-producto">
        <img src="{{ asset('img/descarga (1).jpeg') }}" alt="">
        <p>$700</p>
        <button>Agregar al carrito</button>
      </div>

      <div class="tarjeta-producto">
        <img src="{{ asset('img/descarga (2).jpeg') }}" alt="">
        <p>$2500</p>
        <button>Agregar al carrito</button>
      </div>

    </div>
</section>

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
</body>
</html>