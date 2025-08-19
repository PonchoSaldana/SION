<?php
include("../config/sesion.php");

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "sion_db");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Mostrar mensaje de éxito o error si existe
$message = '';
if (isset($_GET['success'])) {
    $message = '<div class="alert alert-success text-center">' . htmlspecialchars($_GET['success']) . '</div>';
} elseif (isset($_GET['error'])) {
    $message = '<div class="alert alert-danger text-center">' . htmlspecialchars($_GET['error']) . '</div>';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sion Wireless - Mis Compras</title>
    <link rel="shortcut icon" href="../public/img/LOGO/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../public/css/compras.css">
    <link rel="stylesheet" href="../public/css/modales.css">
    <!-- ICONOS DE Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .tarjeta-compra {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            background-color: #f9f9f9;
            display: flex;
            align-items: center;
        }
        .tarjeta-compra img {
            margin-right: 15px;
        }
        .modal-contenido {
            padding: 20px;
            background: white;
            border-radius: 5px;
            width: 90%;
            max-width: 500px;
            margin: auto;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
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
                    <span class="logo"><a href="../index.php"><img src="../public/img/LOGO/sin fondo.png" alt="Logo SION" height="90"></a></span>
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
                    <h2>Mis Compras</h2><br>
                    <?php echo $message; ?>
                </center>
            </section>

            <section class="historial">
                <center>
                    <h2>Historial de Compras</h2>
                </center>
                <?php
                // Obtener pedidos del usuario logueado
                $usuario_id = $_SESSION['id'];
                $query = "SELECT * FROM pedidos WHERE usuario_id = ? ORDER BY fecha_pedido DESC";
                $stmt = $conexion->prepare($query);
                $stmt->bind_param("i", $usuario_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($pedido = $result->fetch_assoc()) {
                        $total_a_pagar = $pedido['precio'] * $pedido['cantidad'];
                        echo '<div class="tarjeta-compra" data-producto=\'' . json_encode($pedido) . '\' data-index="' . $pedido['id'] . '">';
                        echo '<img src="' . htmlspecialchars($pedido['imagen']) . '" alt="' . htmlspecialchars($pedido['producto_nombre']) . '" style="width: 100px; margin-right: 15px;">';
                        echo '<div>';
                        echo '<p class="nombre"><strong>Producto:</strong> ' . htmlspecialchars($pedido['producto_nombre']) . '</p>';
                        echo '<p class="cantidad"><strong>Cantidad:</strong> ' . htmlspecialchars($pedido['cantidad']) . '</p>';
                        echo '<p class="total"><strong>Total a pagar:</strong> $' . number_format($total_a_pagar, 2) . '</p>';
                        echo '<p class="estado"><strong>Estado:</strong> ' . htmlspecialchars($pedido['estado']) . '</p>';
                        echo '<p class="fecha"><strong>Fecha:</strong> ' . htmlspecialchars($pedido['fecha_pedido']) . '</p>';
                        if (!empty($pedido['qr_token'])) {
                            echo '<p class="qr"><strong>Código QR:</strong> <img src="../public/qr/' . htmlspecialchars($pedido['qr_token']) . '.png" alt="Código QR" style="width: 100px;"></p>';
                        } else {
                            echo '<p class="qr"><strong>Código QR:</strong> No disponible</p>';
                        }
                        echo '<button class="btn btn-info detalles-btn">Ver detalles</button>';
                        if ($pedido['estado'] === 'pendiente') {
                            echo '<button class="btn btn-danger cancelar-btn">Cancelar</button>';
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="tarjeta-compra">';
                    echo '<div>';
                    echo '<p>Aún no hay compras realizadas. <a href="carrito.php">Ir al carrito</a> para agregar productos.</p>';
                    echo '</div>';
                    echo '</div>';
                }
                $stmt->close();
                ?>
            </section>
        </main>
        <br><br><br>
        <!-- Modal de detalles de la compra -->
        <div class="modal fade" id="modalDetalles" tabindex="-1" aria-labelledby="modalDetallesLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetallesLabel">Detalles de la Compra</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <img id="modal-imagen" src="" alt="Producto" style="width: 100px; margin-right: 15px; float: left;">
                        <div style="overflow: auto;">
                            <p id="modal-nombre"><strong>Producto:</strong> </p>
                            <p id="modal-cantidad"><strong>Cantidad:</strong> </p>
                            <p id="modal-total"><strong>Total a pagar:</strong> </p>
                            <p id="modal-estado"><strong>Estado:</strong> </p>
                            <p id="modal-fecha"><strong>Fecha:</strong> </p>
                            <p id="modal-qr"><strong>Código QR:</strong> <img id="modal-qr-img" src="" alt="QR" style="width: 100px;"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

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
        // Cargar compras al iniciar la página
        document.addEventListener('DOMContentLoaded', function() {
            // Asignar funcionalidad a botones de detalles
            document.querySelectorAll('.detalles-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const tarjeta = this.closest('.tarjeta-compra');
                    const dataProducto = JSON.parse(tarjeta.getAttribute('data-producto'));
                    const total_a_pagar = dataProducto.precio * dataProducto.cantidad;

                    document.getElementById('modal-nombre').textContent = `Producto: ${dataProducto.producto_nombre}`;
                    document.getElementById('modal-cantidad').textContent = `Cantidad: ${dataProducto.cantidad}`;
                    document.getElementById('modal-total').textContent = `Total a pagar: $${total_a_pagar.toFixed(2)}`;
                    document.getElementById('modal-estado').textContent = `Estado: ${dataProducto.estado}`;
                    document.getElementById('modal-fecha').textContent = `Fecha: ${dataProducto.fecha_pedido}`;
                    document.getElementById('modal-imagen').src = dataProducto.imagen;
                    if (dataProducto.qr_token) {
                        document.getElementById('modal-qr-img').src = `../public/qr/${dataProducto.qr_token}.png`;
                        document.getElementById('modal-qr').style.display = 'block';
                    } else {
                        document.getElementById('modal-qr').style.display = 'none';
                    }
                    const modal = new bootstrap.Modal(document.getElementById('modalDetalles'));
                    modal.show();
                });
            });

            // Asignar funcionalidad a botones de cancelar
            document.querySelectorAll('.cancelar-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const tarjeta = this.closest('.tarjeta-compra');
                    const pedidoId = tarjeta.getAttribute('data-index');
                    document.getElementById('confirmarCancelacionBtn').setAttribute('data-pedido-id', pedidoId);
                    const modal = new bootstrap.Modal(document.getElementById('confirmarCancelacionModal'));
                    modal.show();
                });
            });
        });

        // Manejar la confirmación de cancelación
        document.getElementById('confirmarCancelacionBtn').addEventListener('click', function() {
            const pedidoId = this.getAttribute('data-pedido-id');
            fetch('../app/controllers/cancelar_pedido.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'pedido_id=' + encodeURIComponent(pedidoId)
            })
            .then(response => response.text())
            .then(message => {
                Swal.fire({
                    icon: 'success',
                    title: 'Compra cancelada',
                    text: 'La compra ha sido cancelada exitosamente.',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    window.location.reload();
                });
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo cancelar la compra.',
                    confirmButtonText: 'Ok'
                });
            });

            const modal = bootstrap.Modal.getInstance(document.getElementById('confirmarCancelacionModal'));
            modal.hide();
        });
    </script>
    <script src="../public/js/menu.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php $conexion->close(); ?>