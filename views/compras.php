<?php

include("../config/sesion.php");

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "sion_db");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Mensajes de éxito/error
$message = '';
if (isset($_GET['success'])) {
    $message = '<div class="alert alert-success text-center">' . htmlspecialchars($_GET['success']) . '</div>';
} elseif (isset($_GET['error'])) {
    $message = '<div class="alert alert-danger text-center">' . htmlspecialchars($_GET['error']) . '</div>';
}

// Consulta de compras
if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
    $query = "SELECT p.*, CONCAT(u.nombre,' ',u.apellidos) AS nombre_completo, u.celular, u.direccion
              FROM pedidos p
              JOIN usuarios u ON p.id_usuario = u.id
              ORDER BY p.fecha DESC";
} else {
    $usuario_id = isset($_SESSION['id']) ? $conexion->real_escape_string($_SESSION['id']) : 0;
    $query = "SELECT p.*, CONCAT(u.nombre,' ',u.apellidos) AS nombre_completo, u.celular, u.direccion
              FROM pedidos p
              JOIN usuarios u ON p.id_usuario = u.id
              WHERE p.id_usuario = '$usuario_id'
              ORDER BY p.fecha DESC";
}

$resultado = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sion Wireless - Mis Compras</title>
<link rel="shortcut icon" href="../public/img/LOGO/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="../public/css/carrito.css">
<link rel="stylesheet" href="../public/css/modales.css">
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    .pedido-banner {
        background-color: #f8f9fa;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .pedido-banner h5 {
        margin: 0;
        font-weight: bold;
    }
    .pedido-banner .card-footer {
        background-color: #fff;
        border-top: 1px solid #ddd;
        padding-top: 10px;
    }
</style>
</head>
<body>

<!-- NAV -->
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
<hr>

<section class="contenedor-compras" style="background-color: #76c8ff;">
    <h1 class="my-cart-title">Mis Compras</h1>
    <?php echo $message; ?>
    <div class="container">
        <?php if ($resultado && $resultado->num_rows > 0): ?>
            <div class="row justify-content-center">
                <?php while ($compra = $resultado->fetch_assoc()): ?>
                    <?php $total_compra = isset($compra['total']) ? floatval($compra['total']) : 0; ?>
                    <div class="col-md-8 mb-4">
                        <div class="pedido-banner">
                            <h5 class="card-title">Pedido #<?php echo htmlspecialchars($compra['id'] ?? ''); ?></h5>
                            <p><strong>Estado: </strong><?php echo htmlspecialchars($compra['estado'] ?? ''); ?></p>
                            <ul class="list-unstyled">
                                <?php
                                $detalles = $conexion->query("SELECT * FROM pedido_detalles WHERE id_pedido = " . intval($compra['id']));
                                while ($detalle = $detalles->fetch_assoc()):
                                ?>
                                <li class="mb-2">
                                    <?= htmlspecialchars($detalle['nombre_producto'] ?? '') ?> 
                                    (Cant: <?= intval($detalle['cantidad'] ?? 0) ?>, $<?= number_format($detalle['subtotal'] ?? 0, 2) ?>)
                                </li>
                                <?php endwhile; ?>
                            </ul>
                            <p><strong>Total: </strong>$<?php echo number_format($total_compra, 2); ?></p>

                            <?php if (($compra['estado'] ?? '') === 'pendiente'): ?>
                                <form action="../app/controllers/cancelar_pedido.php" method="POST" class="mt-2">
                                    <input type="hidden" name="id_pedido" value="<?php echo htmlspecialchars($compra['id'] ?? ''); ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Cancelar Compra</button>
                                </form>
                            <?php endif; ?>

                            <div class="card-footer text-muted">
                                Fecha: <?php echo htmlspecialchars($compra['fecha'] ?? ''); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="text-center">No tienes compras registradas.</p>
        <?php endif; ?>
    </div>
</section>

<br><br>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        document.querySelector('.iconCarrito #productos').textContent = carrito.length;
    });
</script>
<script src="../public/js/menu.js"></script>
</body>
</html>
<?php $conexion->close(); ?>