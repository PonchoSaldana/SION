<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "sion_db");

if ($conexion->connect_error) {
    error_log("Error de conexión: " . $conexion->connect_error);
    header("Location: ../../public/carrito.php?error=Error de conexión a la base de datos");
    exit();
}

if (!isset($_SESSION['id'])) {
    error_log("Sesión no válida: ID no encontrado");
    header("Location: ../../public/carrito.php?error=Debes iniciar sesión para realizar una compra");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productos'])) {
    $usuario_id = $_SESSION['id'];
    error_log("Usuario ID: " . $usuario_id); // Depuración

    $productos = json_decode($_POST['productos'], true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log("Error al decodificar JSON: " . json_last_error_msg());
        header("Location: ../../public/carrito.php?error=Error al procesar los datos de la compra");
        exit();
    }

    error_log("Datos recibidos: " . print_r($productos, true)); // Depuración

    foreach ($productos as $producto) {
        $nombre = filter_var($producto['nombre'], FILTER_SANITIZE_STRING);
        $precio = filter_var($producto['precio'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $imagen = filter_var($producto['imagen'], FILTER_SANITIZE_STRING);
        $cantidad = filter_var($producto['cantidad'], FILTER_SANITIZE_NUMBER_INT);
        $estado = 'pendiente';

        $query = "INSERT INTO pedidos (usuario_id, producto_nombre, precio, imagen, estado, cantidad, fecha_pedido) 
                  VALUES (?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $conexion->prepare($query);
        if ($stmt === false) {
            error_log("Error al preparar la consulta: " . $conexion->error);
            header("Location: ../../public/carrito.php?error=Error al preparar la consulta");
            exit();
        }
        $stmt->bind_param("issdsi", $usuario_id, $nombre, $precio, $imagen, $estado, $cantidad);

        if (!$stmt->execute()) {
            error_log("Error al insertar pedido: " . $stmt->error . " - Datos: " . json_encode($producto));
            header("Location: ../../public/carrito.php?error=Error al procesar la compra");
            exit();
        }
        $stmt->close();
    }

    // 🧹 Vaciar carrito después de la compra
    $delete = $conexion->prepare("DELETE FROM carrito WHERE usuario_id = ?");
    if ($delete) {
        $delete->bind_param("i", $usuario_id);
        $delete->execute();
        $delete->close();
    }

    header("Location: ../../public/compras.php?success=Compra realizada con éxito");
    exit();
} else {
    header("Location: ../../public/carrito.php?error=Método no permitido");
    exit();
}

$conexion->close();
?>
