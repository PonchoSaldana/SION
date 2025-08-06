<?php
$conexion = new mysqli("localhost", "root", "", "sion_db");

    include("sesion.php");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$busqueda = $_GET["q"] ?? "";

$sql = "SELECT * FROM productos WHERE nombre LIKE ?";
$param = "%" . $busqueda . "%";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $param);
$stmt->execute();
$resultado = $stmt->get_result();
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
    <!-- ICONOS DE Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!--BOTON DE Boxicons----------------------------------------------------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    
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
                    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                    <li><a href="panelAdmin.php">Panel de Administración</a></li><?php endif; ?>
                </ul>
            </div>

            <div class="searchBox">
                <div class="iconUser">
                    <a href="<?php echo $usuarioLogueado ? 'mi_cuenta.php' : 'login.php'; ?>" style="color: white;">
                        <i class='bx bx-user user'></i></a>
                </div>
                <div class="searchToggle">
                    <i class="bx bx-x cancel"></i>
                    <i class="bx bx-search search"></i>
                </div>

                <div class="iconCarrito">
                    <a href="carrito.php" style="color: white;">
                        <i class="bx bx-cart"></i>
                        <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        </span>
                        </a>
                    <span id="productos">0</span>
                </div>

                <div class="search-field">
                    <form action="buscar.php" method="GET">
                        <input type="text" name="q" placeholder="Buscar productos..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
                        <button type="submit"><i class='bx bx-search'></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Resultados de búsqueda para: <strong><?= htmlspecialchars($busqueda) ?></strong></h2>
        <div class="row mt-4">

            <?php if ($resultado->num_rows > 0): ?>
                <?php while ($row = $resultado->fetch_assoc()) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="uploads/<?= htmlspecialchars($row['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['nombre']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['nombre']) ?></h5>
                                <p class="card-text">$<?= number_format($row['precio'], 2) ?></p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProducto<?= $row['id'] ?>">Ver más</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal del producto -->
                    <div class="modal fade" id="modalProducto<?= $row['id'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?= htmlspecialchars($row['nombre']) ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="uploads/<?= htmlspecialchars($row['imagen']) ?>" class="img-fluid mb-3" alt="<?= htmlspecialchars($row['nombre']) ?>">
                                    <p><?= htmlspecialchars($row['descripcion']) ?></p>
                                    <p><strong>Precio:</strong> $<?= number_format($row['precio'], 2) ?></p>
                                </div>
                                <div class="modal-footer">
                                 <button class="btn btn-success" onclick='agregarAlCarrito({
                                        id: <?= $row["id"] ?>,
                                        nombre: "<?= addslashes($row["nombre"]) ?>",
                                        precio: <?= $row["precio"] ?>,
                                        imagen: "uploads/<?= $row["imagen"] ?>",
                                        cantidad: 1
                                    })'>Agregar al carrito</button>
                                    <form action="agregar_favorito.php" method="POST" class="d-inline">
                                        <input type="hidden" name="id_producto" value="<?= $row['id'] ?>">
                                        <button type="submit" class="btn btn-warning">Agregar a favoritos</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <script>
function agregarAlCarrito(producto) {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

    // Verificar si ya existe el producto
    const existe = carrito.find(p => p.id === producto.id);
    if (existe) {
        existe.cantidad += producto.cantidad;
    } else {
        carrito.push(producto);
    }

    localStorage.setItem('carrito', JSON.stringify(carrito));
    
}
</script>
                    </div>

                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center" role="alert">
                        No se encontraron productos con el nombre "<strong><?= htmlspecialchars($busqueda) ?></strong>".
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/index.js"></script>
</body>
</html>



<?php
$stmt->close();
$conexion->close();
?>