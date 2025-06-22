<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
    header("Location: index.html");
    exit;
}
echo "<h1>Bienvenido Usuario: " . $_SESSION['nombre'] . "</h1>";
echo "<a href='logout.php'>Cerrar sesión</a>";
?>