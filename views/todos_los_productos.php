<?php
    include("../config/sesion.php");
?>
<?php
$conexion = new mysqli("localhost", "root", "", "sion_db");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$productos_bd = $conexion->query("SELECT * FROM productos ORDER BY id DESC");
?><!DOCTYPE html><html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sion Wireless - Productos</title>
  <link rel="shortcut icon" href="../public/img/LOGO/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../public/css/todos_los_productos.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <!--ENCABEZADO----------------------------------------------------------->
    <nav>
        <div class="nav-bar">
            <i class="bx bx-menu sidebarOpen"></i>
            <span class="logo navLogo"><a href="../index.php">
                    <img src="../public/img/LOGO/sin fondo.png" alt="Logo SION" height="100"></a>
            </span>
            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="../public/index.php"><img src="../public/img/LOGO/sin fondo.png" alt="Logo SION" height="90"></a></span>
                    <i class="bx bx-x sidelbarClose"></i>
                </div>
                <ul class="nav-links">
                    <li class="has-submenu">
                        <a href="#" data-submenu-toggle>Categoría</a>
                        <ul class="submenu">
                            <li><a href="../public/submenu/antenas.php">Antenas</a></li>
                            <li><a href="../public/submenu/camaras.php">Cámaras de seguridad</a></li>
                            <li><a href="../public/submenu/cables.php">Cables de red</a></li>
                            <li><a href="../public/submenu/conectoresJaks.php">Conectores y jacks</a></li>
                            <li><a href="../public/submenu/modems.php">Módems</a></li>
                            <li><a href="../public/submenu/switch.php">Switches</a></li>
                            <li><a href="../public/submenu/router.php">Routers</a></li>
                        </ul>
                    </li>
                    <li><a href="Servicios.php">Servicios</a></li>
                    <li><a href="ofertas.php">Ofertas</a></li>
                    <li><a href="compras.php">Compras</a></li>
                    <li><a href="favoritos.php">Favoritos</a></li>
                    <li><a href="todos_los_productos.php">Todos los productos</a></li>
                    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                        <li><a href="panelAdmin.php">Panel de Administración</a></li>
                     <?php endif; ?>
                </ul>
            </div>

            <div class="searchBox">
                <div class="iconUser">
                    <a href="<?php echo $usuarioLogueado ? '../model/mi_cuenta.php' : '../views/login.php'; ?>" style="color: white;">
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
                   <form action="../app/controllers/buscar.php" method="GET">
                        <input type="text" name="q" placeholder="Buscar productos..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
                        <button type="submit"><i class='bx bx-search'></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <!--------------------------------------------------------------------------->
  
   <main>
    <h1 class="my-cart-title">Todos los productos disponibles</h1>
    <section>
      <div class="product-container">
        <?php while ($row = $productos_bd->fetch_assoc()): ?>
          <div class="product-card">
            <img src="../public/uploads/<?= htmlspecialchars($row['imagen']) ?>" alt="<?= htmlspecialchars($row['nombre']) ?>">
            <h3><?= htmlspecialchars($row['nombre']) ?></h3>
            <p><?= htmlspecialchars($row['descripcion']) ?></p>
            <p class="price">$<?= number_format($row['precio'], 2) ?></p>
            <button type="button" class="btn btn-outline-success">Agregar al carrito</button><br>
            <a href="#" class="btn btn-outline-info">Más detalles</a>
          </div>
        <?php endwhile; ?>
      </div>
    </section>
  </main>  <script>
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
    <!-------------------------------------------------------------------------------->
    <!--SECCIÓN DE PIE DE PÁGINA--------------------------------------------------------->
    <footer class="main-footer">
        <div class="footer-section footer-logo">
            <img src="../public/img/LOGO/sin fondo.png" alt="Logo SION">
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
            </ul>
        </div>
    </footer>

  <script src="../public/js/index.js"></script><!-- Script para el carrusel y menu responsivo-->

   <script>
  function obtenerCarrito() {
    return JSON.parse(localStorage.getItem('carrito')) || [];
  }

  function guardarCarrito(carrito) {
    localStorage.setItem('carrito', JSON.stringify(carrito));
  }

  function agregarAlCarrito(nombre, precio, imagen) {
    let carrito = obtenerCarrito();

    // Revisa si ya está en el carrito
    let existente = carrito.find(p => p.nombre === nombre);
    if (existente) {
      existente.cantidad += 1;
    } else {
      carrito.push({ nombre, precio, imagen, cantidad: 1 });
    }

    guardarCarrito(carrito);
  }

  document.querySelectorAll('.product-card').forEach(card => {
    const nombre = card.querySelector('h3').innerText;
    const precio = parseFloat(card.querySelector('.price').innerText.replace('$', ''));
    const imagen = card.querySelector('img').getAttribute('src');

    card.querySelector('button').addEventListener('click', () => {
      agregarAlCarrito(nombre, precio, imagen);
    });
  });
</script>
</body>
</html>