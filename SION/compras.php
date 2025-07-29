<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sion Wireless - Compras</title>
  <link rel="shortcut icon" href="img/LOGO/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="css/compras.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
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
          <li class="has-submenu">
            <a href="#" data-submenu-toggle>Categoría</a>
            <ul class="submenu">
              <li><a href="submenu/antenas.php">Antenas</a></li>
              <li><a href="submenu/camaras.php">Camaras de seguridad</a></li>
              <li><a href="submenu/cables.php">Cables de red</a></li>
              <li><a href="submenu/conectoresJaks.php">Conectores y jacks</a></li>
              <li><a href="submenu/modems.php">Modems</a></li>
              <li><a href="submenu/switch.php">Switches</a></li>
              <li><a href="submenu/router.php">Routers</a></li>
            </ul>
          </li>
          <li><a href="Servicios.php">Servicios</a></li>
          <li><a href="ofertas.php">Ofertas</a></li>
          <li><a href="compras.php">Compras</a></li>
          <li><a href="#">Favoritos</a></li>
          <li><a href="todos_los_productos.php">Ver todos los productos</a></li>
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
  <br><br><br><br><br>
  <main>
    <section class="compras">
      <center>
        <h2>Compras 🛒</h2>
      </center>
      <div class="tarjeta-compra" data-producto='{"nombre":"Switch Ethernet", "precio":"$900", "estado":"Esperando al cliente"}'>
        <img src="img/images (2).jpeg" alt="Producto">
        <div>
          <p class="estado">Esperando al cliente</p>
          <p>Su compra fue aprobada, ya puede pasar a recogerla</p>
          <button class="detalles-btn">Ver detalles</button>
          <button class="cancelar-btn">Cancelar</button>
        </div>
      </div>
    </section>

    <section class="historial">
      <center>
        <h2>Historial ⏱️</h2>
      </center>
      <div class="tarjeta-compra" data-producto='{"nombre":"Router TP-Link", "precio":"$700", "estado":"Entregado"}'>
        <img src="img/descarga (1).jpeg" alt="Producto">
        <div>
          <p class="estado">Entregado</p>
          <p>Entregado el 1 de mayo</p>
          <button class="detalles-btn">Ver detalles</button>
        </div>
      </div>
    </section>
  </main>

  <!-- Modal de detalles de la compra -->
  <div id="modal-detalles" class="modal">
    <div class="modal-contenido">
      <h3>Detalles</h3>
      <img id="modal-imagen" src="img/images (2).jpeg" alt="Producto">
      <p id="modal-nombre"></p>
      <p id="modal-estado"></p>
      <p id="modal-precio"></p>

      <button onclick="cerrarModal()">Regresar</button>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>
  <script src="js/compras.js"></script>
  <script src="js/menu.js"></script>
</body>

</html>