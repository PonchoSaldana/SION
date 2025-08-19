<?php
$conexion = new mysqli("localhost", "root", "", "sion_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (isset($_GET['token'])) {
    $qr_token = filter_input(INPUT_GET, 'token', FILTER_SANITIZE_STRING);
    $query = "SELECT * FROM pedidos WHERE qr_token = ? AND expiracion > NOW()";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $qr_token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $pedido = $result->fetch_assoc();
        echo "Compra válida. Producto: " . htmlspecialchars($pedido['producto_nombre']) . ". Estado: " . htmlspecialchars($pedido['estado']);
    } else {
        echo "Código QR expirado o inválido.";
    }
} else {
    echo "Token no proporcionado.";
}

$stmt->close();
$conexion->close();
?>