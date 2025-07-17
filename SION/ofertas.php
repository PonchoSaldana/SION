<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ofertas.css">
     <link rel="shortcut icon" href="img/LOGO/favicon.png" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Ofertas</title>
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
                    <li><a href="#">Categorias</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Ofertas</a></li>
                    <li><a href="#">Compras</a></li>
                    <li><a href="#">Favoritos</a></li>
                    <li><a href="#">Ver todos los productos</a></li>
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
</body>
</html>