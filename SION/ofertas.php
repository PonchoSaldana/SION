<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sion Wireless - Ofertas</title>
    <link rel="shortcut icon" href="img/LOGO/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/ofertas.css">
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
                            <li><a href="#">Antenas</a></li>
                            <li><a href="#">Camaras de seguridad</a></li>
                            <li><a href="#">Cables de red</a></li>
                            <li><a href="#">Conectores y jacks</a></li>
                            <li><a href="#">Modems</a></li>
                            <li><a href="#">Switches</a></li>
                            <li><a href="#">Routers</a></li>
                        </ul>
                    </li>
                    <li><a href="Servicios.php">Servicios</a></li>
                    <li><a href="ofertas.php">Ofertas</a></li>
                    <li><a href="#">Compras</a></li>
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
    <script src="js/menu.js"></script>
</body>
</html>