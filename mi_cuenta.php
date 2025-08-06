<?php
session_start();
include("conexion.php");

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION["id"];

$conexion = (new conexion_db())->conectar();
$stmt = $conexion->prepare("SELECT nombre, apellidos, correo, celular, direccion, codigo_postal FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$stmt->bind_result($nombre, $apellidos, $correo, $celular, $direccion, $codigo_postal);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--TITULO----------------------------------------------------------->
    <title>Sion Wireless - Inicio</title>
    <!--FAVICON-------------------------------------------------------------->
    <link rel="shortcut icon" href="img/LOGO/favicon.png" type="image/x-icon">
    <!--ESTILOS--------------------------------------------------------------->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/mi_cuenta.css">
    <!-- ICONOS DE Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!--BOTON DE Boxicons----------------------------------------------------------->
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
                    <a href="<?php echo isset($_SESSION['correo']) ? 'mi_cuenta.php' : 'login.php'; ?>" style="color: white;">
                        <i class='bx bx-user user'></i>
                    </a>
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
                    <form action="buscar.php" method="GET">
                        <input type="text" name="q" placeholder="Buscar productos..." required class="form-control me-2" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
                        <button type="submit"><i class='bx bx-search'></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <br><br><br><br>
    <div class="datos">
        <center>
            <h2>Mi Cuenta</h2>
        </center>
        <p><strong>Nombre:</strong> <?= htmlspecialchars($nombre) ?></p>
        <p><strong>Apellidos:</strong> <?= htmlspecialchars($apellidos) ?></p>
        <p><strong>Correo:</strong> <?= htmlspecialchars($correo) ?></p>
        <p><strong>Celular:</strong> <?= htmlspecialchars($celular) ?></p>
        <p><strong>Dirección:</strong> <?= htmlspecialchars($direccion) ?></p>
        <p><strong>Código Postal:</strong> <?= htmlspecialchars($codigo_postal) ?></p>
        <div class="acciones-cuenta">
            <button onclick="document.getElementById('modalEditar').style.display='block'">Editar datos</button>
            <a href="cerrarSesion.php" class="btn-cerrar-sesion">Cerrar sesión</a>
        </div>
    </div>


    <!-- Modal -->
    <div id="modalEditar" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('modalEditar').style.display='none'">&times;</span>
            <h3>Editar información</h3>
            <form action="actualizar_usuario.php" method="POST">
                <input type="hidden" name="id" value="<?= $id_usuario ?>">

                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required><br>

                <label>Apellidos:</label>
                <input type="text" name="apellidos" value="<?= htmlspecialchars($apellidos) ?>" required><br>

                <label>Correo:</label>
                <input type="email" name="correo" value="<?= htmlspecialchars($correo) ?>" required><br>

                <label>Celular:</label>
                <input type="text" name="celular" value="<?= htmlspecialchars($celular) ?>"><br>

                <label>Dirección:</label>
                <input type="text" name="direccion" value="<?= htmlspecialchars($direccion) ?>"><br>

                <label>Código postal:</label>
                <input type="text" name="codigo_postal" value="<?= htmlspecialchars($codigo_postal) ?>"><br>

                <button class="btn-guardar" type="submit">Guardar cambios</button>
            </form>
        </div>
    </div>

    <!--SECCIÓN DE PIE DE PÁGINA--------------------------------------------------------->
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
            </ul>
        </div>
    </footer>

    <script>
        // Cierra el modal si se hace clic fuera de él
        window.onclick = function(event) {
            const modal = document.getElementById('modalEditar');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script src="js/index.js"></script><!-- Script para el carrusel y menu responsivo-->
    <script>
        // Si el usuario usa el botón "atrás", forzamos recarga para validar la sesión
        window.addEventListener("pageshow", function(event) {
            if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
                window.location.reload();
            }
        });
    </script>
</body>

</html>