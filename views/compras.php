<?php
include("../config/sesion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sion Wireless - Compras</title>
  <link rel="shortcut icon" href="../public/img/LOGO/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../public/css/compras.css">
   <!-- ICONOS DE Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
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
                            <li><a href="submenu/router.php">Routers</a></li>
                        </ul>
                    </li>
                    <li><a href="Servicios.php">Servicios</a></li>
                    <li><a href="ofertas.php">Ofertas</a></li>
                    <li><a href="compras.php">Compras</a></li>
                    <li><a href="favoritos.php">Favoritos</a></li>
                    <li><a href="todos_los_productos.php">Todos los productos</a></li>
                    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                        <li><a href="panelAdmin.php">Panel de Administración</a></li><?php endif; ?>
                </ul>
            </div>

            <div class="searchBox">
                <div class="iconUser">
                    <a href="<?php echo $usuarioLogueado ? '../model/mi_cuenta.php' : '../model/login.php'; ?>" style="color: white;">
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
                        <input type="text" name="q" placeholder="Buscar productos..." required class="form-control me-2" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
                        <button type="submit"><i class='bx bx-search'></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <!--------------------------------------------------------------------------->

  <header>
    <br><br><br><br><br><br><br>
    <main>
      <section class="compras">
        <center>
          <h2>Compras</h2><br>
        </center>

        </div>
      </section>

      <section class="historial">
        <center>
          <h2>Historial</h2>
        </center>
        <div class="tarjeta-compra">

          <div>
            <p class="estado"></p>
            <p>Aun no hay compras realizadas </p>

          </div>
        </div>
      </section>
    </main>
    <br><br><br>
    <!-- Modal de detalles de la compra -->
    <center>
      <div id="modal-detalles" class="modal">
        <div class="modal-contenido">
          <h3>Detalles</h3><br>
          <img id="modal-imagen" src="img/images (2).jpeg" alt="Producto">
          <p id="modal-nombre"></p>
          <p id="modal-estado"></p>
          <p id="modal-precio"></p>

          <button onclick="cerrarModal()">Regresar</button>
        </div>
      </div>
    </center>

    <script src="js/index.js"></script>

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
          <li><a href="#">Promoción y ofertas</a></li>
        </ul>
      </div>
    </footer>
  </header>
  <script>
    document.querySelectorAll('.detalles-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const tarjeta = this.closest('.tarjeta-compra');
        const dataProducto = tarjeta.getAttribute('data-producto');

        if (dataProducto) {
          const producto = JSON.parse(dataProducto);

          // Llenar el modal con los datos del producto
          document.getElementById('modal-nombre').textContent = ` ${producto.nombre}`;
          document.getElementById('modal-precio').textContent = `Precio: ${producto.precio}`;
          document.getElementById('modal-estado').textContent = `Estado: ${producto.estado}`;

          // Obtener imagen dentro de la tarjeta
          const imagenSrc = tarjeta.querySelector('img').src;
          document.getElementById('modal-imagen').src = imagenSrc;

          // Mostrar el modal
          document.getElementById('modal-detalles').style.display = 'block';
        }
      });
    });

    // Función para cerrar el modal
    function cerrarModal() {
      document.getElementById('modal-detalles').style.display = 'none';
      document.querySelector('.modal').classList.add('activo');
    }
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const compras = JSON.parse(localStorage.getItem('compras')) || [];
      const contenedorCompras = document.querySelector('.compras');

      compras.forEach(producto => {
        const tarjeta = document.createElement('div');
        tarjeta.className = 'tarjeta-compra';

        tarjeta.innerHTML = `
      <img src="${producto.imagen}" alt="${producto.nombre}">
      <div>
        <p class="estado">${producto.estado}</p>
        <p>Su compra fue aprobada, ya puede pasar a recogerla</p>
        <button class="detalles-btn">Ver detalles</button>
        <button class="cancelar-btn">Cancelar</button>
      </div>
    `;

        tarjeta.setAttribute('data-producto', JSON.stringify(producto));
        contenedorCompras.appendChild(tarjeta);
      });

      // Reasignar funcionalidad a botones de detalles
      document.querySelectorAll('.detalles-btn').forEach(btn => {
        btn.addEventListener('click', function() {
          const tarjeta = this.closest('.tarjeta-compra');
          const dataProducto = tarjeta.getAttribute('data-producto');
          if (dataProducto) {
            const producto = JSON.parse(dataProducto);
            document.getElementById('modal-nombre').textContent = ` ${producto.nombre}`;
            document.getElementById('modal-precio').textContent = `Precio: ${producto.precio}`;
            document.getElementById('modal-estado').textContent = `Estado: ${producto.estado}`;
            document.getElementById('modal-imagen').src = tarjeta.querySelector('img').src;
            document.getElementById('modal-detalles').style.display = 'block';
          }
        });
      });
    });
  </script>
  <script>
    // Escuchar clics en botones "Cancelar"
    document.addEventListener('click', function(e) {
      if (e.target.classList.contains('cancelar-btn')) {
        const tarjeta = e.target.closest('.tarjeta-compra');
        const producto = JSON.parse(tarjeta.getAttribute('data-producto'));

        // Obtener las compras del localStorage
        let compras = JSON.parse(localStorage.getItem('compras')) || [];

        // Filtrar para eliminar el producto actual
        compras = compras.filter(item =>
          item.nombre !== producto.nombre ||
          item.precio !== producto.precio
        );

        // Guardar la lista actualizada
        localStorage.setItem('compras', JSON.stringify(compras));

        // Eliminar del DOM
        tarjeta.remove();
      }
    });
  </script>
  <script src="../public/js/menu.js"></script>
</body>

</html>