<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "sion_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (!isset($_SESSION['id'])) {
    header("Location: ../../public/compras.php?error=Debes iniciar sesión");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pedido_id = filter_input(INPUT_POST, 'pedido_id', FILTER_SANITIZE_NUMBER_INT);

    if (empty($pedido_id)) {
        header("Location: ../../public/compras.php?error=ID de pedido inválido");
        exit();
    }

    $query = "UPDATE pedidos SET estado = 'cancelado' WHERE id = ? AND usuario_id = ?";
    $stmt = $conexion->prepare($query);
    $usuario_id = $_SESSION['id'];
    $stmt->bind_param("ii", $pedido_id, $usuario_id);

    if ($stmt->execute()) {
        echo "Pedido cancelado con éxito";
    } else {
        echo "Error al cancelar el pedido";
    }
} else {
    // Cancelación automática por expiración (puede ejecutarse como cron job)
    $query = "UPDATE pedidos SET estado = 'cancelado' WHERE expiracion < NOW() AND estado = 'pendiente'";
    $conexion->query($query);
    header("Location: ../../public/compras.php?error=Método no permitido");
    exit();
}

$stmt->close();
$conexion->close();
?>