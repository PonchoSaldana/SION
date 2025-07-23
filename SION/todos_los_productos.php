<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Sion Wirekess - Todos Los Productos</title>
    <link rel="shortcut icon" href="img/LOGO/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/todos_los_productos.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <section class="main">
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
                    <i class="bx bx-x cancel"></i>
                    <i class="bx bx-search search"></i>
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
    </section>

<h2>Todos los productos</h2>

<section class="productos">
<div class="product-container">
  <div class="product-card">
    <img src="img/descarga (1).jpeg" alt="Producto 1">
    <h3>Router</h3>
    <p>Router profesional de oficina</p>
    <p class="price">$100.00</p>
    <button>Agregar al carrito</button>
  </div>
  <div class="product-card">
    <img src="img/descarga (2).jpeg" alt="Producto 2">
    <h3>Router 5G</h3>
    <p>Router multiusos potente</p>
    <p class="price">$200.00</p>
    <button>Agregar al carrito</button>
  </div>
  <div class="product-card">
    <img src="img/descarga.jpeg" alt="Producto 3">
    <h3>Conector multiple</h3>
    <p>Conector multiusos</p>
    <p class="price">$100.00</p>
    <button>Agregar al carrito</button>
  </div>
  <div class="product-card">
    <img src="img/images (1).jpeg" alt="Producto 4">
    <h3>Camara de vigilancia</h3>
    <p>Camara de vigilancia 360 grados</p>
    <p class="price">$20.00</p>
    <button>Agregar al carrito</button>
  </div>
</section>
<section>
<div class="product-container">
  <div class="product-card">
    <img src="img/images (2).jpeg" alt="Producto 5">
    <h3>Camara steren</h3>
    <p>Camara de vigilancia 360 grados</p>
    <p class="price">$10.00</p>
    <button>Agregar al carrito</button>
  </div>
  <div class="product-card">
    <img src="img/images (3).jpeg" alt="Producto 6">
    <h3>Router multipuertos</h3>
    <p>Router de oficina</p>
    <p class="price">$200.00</p>
    <button>Agregar al carrito</button>
  </div>
  <div class="product-card">
    <img src="img/images (4).jpeg" alt="Producto 7">
    <h3>Router gaming</h3>
    <p>Router para videojuegos</p>
    <p class="price">$10.00</p>
    <button>Agregar al carrito</button>
  </div>
  <div class="product-card">
    <img src="img/images.jpeg" alt="Producto 8">
    <h3>Camara de vigilancia</h3>
    <p>Camra de vigilancia de una vista</p>
    <p class="price">$20.00</p>
    <button>Agregar al carrito</button>
  </div>
</section>
<div class="iconCarrito">
    <a href="carrito.php" style="color: white;"> <i class='bx bx-cart cart'></i></a><span id="productos">0</span>
</div

<section class="contador">    
<script>
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
</section>
<!-- fooder(pie de pagina) -->
<section class="pie de pagina">
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
    <script src="js/index.js"></script>
</section>
</body>
</html>