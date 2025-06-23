<?php
$conexion = new mysqli("localhost", "root", "1234", "sion_ bd");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>