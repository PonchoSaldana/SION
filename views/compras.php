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
  <link rel="stylesheet" href="../public/css/modales.css">
  <!-- ICONOS DE Boxicons -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
              <li><a href="../public/submenu/submenu/router.php">Routers</a></li>
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

    <!-- Modal de confirmación de cancelación -->
    <div class="modal fade" id="confirmarCancelacionModal" tabindex="-1" aria-labelledby="confirmarCancelacionLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmarCancelacionLabel">Confirmar cancelación</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            ¿Estás seguro que quieres cancelar esta compra?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Regresar</button>
            <button type="button" class="btn btn-danger" id="confirmarCancelacionBtn">Confirmar</button>
          </div>
        </div>
      </div>
    </div>

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
    // Función para cerrar el modal de detalles
    function cerrarModal() {
      document.getElementById('modal-detalles').style.display = 'none';
    }

    // Cargar compras al iniciar la página
    document.addEventListener('DOMContentLoaded', function() {
      const compras = JSON.parse(localStorage.getItem('compras')) || [];
      const contenedorCompras = document.querySelector('.compras');
      const contenedorHistorial = document.querySelector('.tarjeta-compra');

      // Limpiar el mensaje por defecto
      contenedorHistorial.innerHTML = '';

      if (compras.length === 0) {
        contenedorHistorial.innerHTML = `
          <div>
            <p class="estado"></p>
            <p>Aún no hay compras realizadas</p>
          </div>
        `;
      } else {
        compras.forEach((producto, index) => {
          const tarjeta = document.createElement('div');
          tarjeta.className = 'tarjeta-compra';
          tarjeta.setAttribute('data-producto', JSON.stringify(producto));
          tarjeta.setAttribute('data-index', index); // Agregar índice para identificar la compra
          tarjeta.innerHTML = `
            <img src="${producto.imagen}" alt="${producto.nombre}">
            <div>
              <p class="estado">${producto.estado}</p>
              <p>Su compra fue aprobada, ya puede pasar a recogerla</p>
              <button class="detalles-btn">Ver detalles</button>
              <button class="cancelar-btn">Cancelar</button>
            </div>
          `;
          contenedorCompras.appendChild(tarjeta);
        });
      }

      // Asignar funcionalidad a botones de detalles
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

      // Asignar funcionalidad a botones de cancelar
      document.querySelectorAll('.cancelar-btn').forEach(btn => {
        btn.addEventListener('click', function() {
          const tarjeta = this.closest('.tarjeta-compra');
          const index = tarjeta.getAttribute('data-index'); // Obtener el índice de la compra
          // Guardar el índice en el botón de confirmación del modal
          document.getElementById('confirmarCancelacionBtn').setAttribute('data-index', index);
          // Mostrar el modal de confirmación
          const modal = new bootstrap.Modal(document.getElementById('confirmarCancelacionModal'));
          modal.show();
        });
      });
    });

    // Manejar la confirmación de cancelación
    document.getElementById('confirmarCancelacionBtn').addEventListener('click', function() {
      const index = this.getAttribute('data-index');
      let compras = JSON.parse(localStorage.getItem('compras')) || [];

      // Eliminar la compra del localStorage
      compras.splice(index, 1);
      localStorage.setItem('compras', JSON.stringify(compras));

      // Mostrar notificación de éxito
      Swal.fire({
        icon: 'success',
        title: 'Compra cancelada',
        text: 'La compra ha sido cancelada exitosamente.',
        confirmButtonText: 'Ok'
      }).then(() => {
        // Recargar la página para actualizar el historial
        window.location.reload();
      });

      // Cerrar el modal
      const modal = bootstrap.Modal.getInstance(document.getElementById('confirmarCancelacionModal'));
      modal.hide();
    });
  </script>
  <script src="../public/js/menu.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>