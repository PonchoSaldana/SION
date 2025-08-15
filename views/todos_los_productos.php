<?php
include("../config/sesion.php");
$conexion = new mysqli("localhost", "root", "", "sion_db");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$productos_bd = $conexion->query("SELECT id, nombre, precio, imagen, descripcion FROM productos ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sion Wireless - Productos</title>
  <link rel="shortcut icon" href="../public/img/LOGO/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../public/css/todos_los_productos.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .btn-info { background-color: #17a2b8; border-color: #17a2b8; }
    .btn-info:hover { background-color: #138496; }
    .btn-fav.active i { color: #dc3545; }
    .btn-fav i { color: #6c757d; }
    /* Ensure modals don't have conflicting animations */
    .modal.fade .modal-dialog {
      transition: transform 0.3s ease-out;
    }
  </style>
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
            <p class="price">$<?= number_format($row['precio'], 2) ?></p>
            <button type="button" class="btn btn-outline-success" data-nombre="<?= htmlspecialchars($row['nombre']) ?>" data-precio="<?= number_format($row['precio'], 2) ?>" data-imagen="../public/uploads/<?= htmlspecialchars($row['imagen']) ?>">Agregar al carrito</button><br>
            <button type="button" class="btn btn-outline-info details-btn" data-id="<?= $row['id'] ?>" data-nombre="<?= htmlspecialchars($row['nombre']) ?>" data-precio="<?= number_format($row['precio'], 2) ?>" data-imagen="../public/uploads/<?= htmlspecialchars($row['imagen']) ?>" data-marca="<?= htmlspecialchars($row['marca'] ?? '') ?>" data-color="<?= htmlspecialchars($row['color'] ?? '') ?>" data-impedancia="<?= htmlspecialchars($row['impedancia'] ?? '') ?>" data-dimensiones="<?= htmlspecialchars($row['dimensiones'] ?? '') ?>" data-fabricante="<?= htmlspecialchars($row['fabricante'] ?? '') ?>" data-descripcion="<?= htmlspecialchars($row['descripcion'] ?? 'Sin descripción disponible.') ?>">Más detalles</button><br>
            
            <!-- Botón de favorito -->
            <button type="button" 
                    class="btn btn-outline-danger btn-fav" 
                    style="margin-top:5px; display: inline-flex; align-items: center; gap: 5px;"
                    data-nombre="<?= htmlspecialchars($row['nombre']) ?>"
                    data-precio="<?= number_format($row['precio'], 2) ?>"
                    data-imagen="../public/uploads/<?= htmlspecialchars($row['imagen']) ?>">
                <i class='bx bx-heart'></i> Favorito
            </button>
          </div>
        <?php endwhile; ?>
      </div>     
    </section>
</main>

<!-- Modal para detalles del producto -->
<div class="modal fade" id="productDetailsModal" tabindex="-1" aria-labelledby="productDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productDetailsModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body d-flex">
        <div class="modal-image">
          <img id="modalImage" src="" alt="Product Image" class="img-fluid" style="max-height: 200px; object-fit: contain;">
        </div>
        <div class="modal-details">
          <p><strong>Marca:</strong> <span id="modalBrand"></span></p>
          <p><strong>Color:</strong> <span id="modalColor"></span></p>
          <p><strong>Impedancia:</strong> <span id="modalImpedance"></span></p>
          <p><strong>Dimensiones del producto:</strong> <span id="modalDimensions"></span></p>
          <p><strong>Fabricante:</strong> <span id="modalManufacturer"></span></p>
          <p><strong>Precio:</strong> <span id="modalPrice"></span></p>
          <p><strong>Descripción:</strong> <span id="modalDescription"></span></p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success" id="addToCartModalBtn">Agregar al carrito</button>
        <button type="button" class="btn btn-outline-danger btn-fav" id="addToFavoritesModalBtn">Favoritos</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

  <!-- Modal de notificación -->
  <div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="mensajeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center">
          <i id="modalIcono" class="bx"></i>
          <p id="modalTexto"></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Script favoritos y carrito -->
  <script>
    // ----------- FUNCIONES FAVORITOS ------------
    function obtenerFavoritos() {
      return JSON.parse(localStorage.getItem('favoritos')) || [];
    }

    function guardarFavoritos(favoritos) {
      localStorage.setItem('favoritos', JSON.stringify(favoritos));
    }

    function mostrarModal(mensaje, icono, color) {
      document.getElementById("modalTexto").innerText = mensaje;
      const iconElem = document.getElementById("modalIcono");
      iconElem.className = `bx ${icono}`;
      iconElem.style.fontSize = "2rem";
      iconElem.style.color = color;

      const modal = new bootstrap.Modal(document.getElementById("mensajeModal"));
      modal.show();

      setTimeout(() => {
        modal.hide();
      }, 1500);
    }

    function toggleFavorito(nombre, precio, imagen, boton) {
      let favoritos = obtenerFavoritos();
      let existe = favoritos.find(p => p.nombre === nombre);

      if (existe) {
        favoritos = favoritos.filter(p => p.nombre !== nombre);
        guardarFavoritos(favoritos);
        if (boton) boton.classList.remove('active');
        mostrarModal("Eliminado de favoritos", "bx-heart", "gray");
      } else {
        favoritos.push({ nombre, precio, imagen });
        guardarFavoritos(favoritos);
        if (boton) boton.classList.add('active');
        mostrarModal("Agregado a favoritos", "bx-heart", "red");
      }
    }

    // ----------- FUNCIONES CARRITO ------------
    function obtenerCarrito() {
      return JSON.parse(localStorage.getItem('carrito')) || [];
    }

    function guardarCarrito(carrito) {
      localStorage.setItem('carrito', JSON.stringify(carrito));
      actualizarContadorCarrito();
    }

    function agregarAlCarrito(nombre, precio, imagen) {
      let carrito = obtenerCarrito();
      let existente = carrito.find(p => p.nombre === nombre);
      if (existente) {
        existente.cantidad += 1;
      } else {
        carrito.push({ nombre, precio, imagen, cantidad: 1 });
      }
      guardarCarrito(carrito);
      mostrarModal("Agregado al carrito", "bx-cart", "green");
    }

    function actualizarContadorCarrito() {
      let carrito = obtenerCarrito();
      const count = carrito.reduce((sum, item) => sum + item.cantidad, 0);
      document.getElementById('productos').textContent = count;
    }

    // ----------- FUNCIONES MODAL DETALLES ------------
    document.addEventListener('DOMContentLoaded', () => {
      actualizarContadorCarrito();
      const favoritos = obtenerFavoritos();
      const modal = document.getElementById('productDetailsModal');

      document.querySelectorAll('.product-card').forEach(card => {
        const nombre = card.querySelector('h3').innerText;
        const precio = parseFloat(card.querySelector('.price').innerText.replace('$', ''));
        const imagen = card.querySelector('img').getAttribute('src');
        const botonFavorito = card.querySelector('.btn-fav');
        const botonCarrito = card.querySelector('.btn-outline-success');
        const botonDetalles = card.querySelector('.details-btn');

        // Verificar si el producto está en favoritos y aplicar clase 'active'
        if (favoritos.some(p => p.nombre === nombre)) {
          botonFavorito.classList.add('active');
        }

        // Evento para el botón de favoritos
        botonFavorito.addEventListener('click', (e) => {
          e.preventDefault();
          toggleFavorito(nombre, precio, imagen, botonFavorito);
        });

        // Evento para el botón de carrito
        botonCarrito.addEventListener('click', () => {
          agregarAlCarrito(nombre, precio, imagen);
        });

        // Evento para el botón de detalles
        botonDetalles.addEventListener('click', (e) => {
          e.preventDefault();
          e.stopPropagation();

          // Populate modal with product data
          document.getElementById('productDetailsModalLabel').textContent = botonDetalles.dataset.nombre;
          document.getElementById('modalImage').src = botonDetalles.dataset.imagen;
          document.getElementById('modalBrand').textContent = botonDetalles.dataset.marca;
          document.getElementById('modalColor').textContent = botonDetalles.dataset.color;
          document.getElementById('modalImpedance').textContent = botonDetalles.dataset.impedancia;
          document.getElementById('modalDimensions').textContent = botonDetalles.dataset.dimensiones;
          document.getElementById('modalManufacturer').textContent = botonDetalles.dataset.fabricante;
          document.getElementById('modalPrice').textContent = `$ ${botonDetalles.dataset.precio}`;
          document.getElementById('modalDescription').textContent = botonDetalles.dataset.descripcion;

          // Set data for Add to Cart and Favorites buttons
          document.getElementById('addToCartModalBtn').dataset.nombre = botonDetalles.dataset.nombre;
          document.getElementById('addToCartModalBtn').dataset.precio = botonDetalles.dataset.precio;
          document.getElementById('addToCartModalBtn').dataset.imagen = botonDetalles.dataset.imagen;
          document.getElementById('addToFavoritesModalBtn').dataset.nombre = botonDetalles.dataset.nombre;
          document.getElementById('addToFavoritesModalBtn').dataset.precio = botonDetalles.dataset.precio;
          document.getElementById('addToFavoritesModalBtn').dataset.imagen = botonDetalles.dataset.imagen;

          // Store reference to the original favorite button
          const originalFavButton = card.querySelector('.btn-fav');
          document.getElementById('addToFavoritesModalBtn').dataset.originalButtonId = originalFavButton.getAttribute('data-nombre'); // Use name as a unique identifier

          new bootstrap.Modal(modal).show();
        });
      });

      // Evento para agregar al carrito desde el modal
      document.getElementById('addToCartModalBtn').addEventListener('click', () => {
        const nombre = document.getElementById('addToCartModalBtn').dataset.nombre;
        const precio = document.getElementById('addToCartModalBtn').dataset.precio;
        const imagen = document.getElementById('addToCartModalBtn').dataset.imagen;
        agregarAlCarrito(nombre, precio, imagen);
        bootstrap.Modal.getInstance(modal).hide();
      });

      // Evento para agregar a favoritos desde el modal
      document.getElementById('addToFavoritesModalBtn').addEventListener('click', () => {
        const nombre = document.getElementById('addToFavoritesModalBtn').dataset.nombre;
        const precio = document.getElementById('addToFavoritesModalBtn').dataset.precio;
        const imagen = document.getElementById('addToFavoritesModalBtn').dataset.imagen;
        const originalButtonId = document.getElementById('addToFavoritesModalBtn').dataset.originalButtonId;
        const originalFavButton = document.querySelector(`.btn-fav[data-nombre="${originalButtonId}"]`);
        toggleFavorito(nombre, precio, imagen, originalFavButton);
        bootstrap.Modal.getInstance(modal).hide();
      });
    });
  </script>

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
  <script src="../public/js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>