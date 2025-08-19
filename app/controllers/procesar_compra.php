<?php
session_start();
include("../config/conexion.php");

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['id'])) {
    header("Location: ../../public/login.php?error=Debes iniciar sesión para comprar");
    exit();
}

// Si se recibe por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_SESSION['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $cantidad = $_POST['cantidad'];
    $estado = "pendiente";

    $conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $query = "INSERT INTO pedidos (usuario_id, producto_nombre, precio, imagen, estado, cantidad, fecha_pedido) 
              VALUES (?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $conexion->prepare($query);
    if ($stmt) {
        // CORREGIDO: tipos de datos
        $stmt->bind_param("isdssi", $usuario_id, $nombre, $precio, $imagen, $estado, $cantidad);
        $stmt->execute();
        $stmt->close();
    }

    $conexion->close();

    // Redirige con mensaje de éxito
    header("Location: ../../public/compras.php?success=Compra realizada con éxito");
    exit();
} else {
    header("Location: ../../public/index.php");
    exit();
}
?>
