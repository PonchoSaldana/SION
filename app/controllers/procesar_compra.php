<?php
session_start();
header("Content-Type: application/json");

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "sion_db");
if ($conexion->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Error de conexión: " . $conexion->connect_error]);
    exit;
}

// Verificar si hay usuario logueado
if (!isset($_SESSION['id_usuario'])) {
    http_response_code(401);
    echo json_encode(["error" => "Usuario no autenticado"]);
    exit;
}

$id_usuario = $_SESSION['id_usuario'];

// Obtener datos JSON del carrito
$data = json_decode(file_get_contents("php://input"), true);

if (!$data || count($data) === 0) {
    http_response_code(400);
    echo json_encode(["error" => "Carrito vacío"]);
    exit;
}

// Calcular total
$total = 0;
foreach ($data as $producto) {
    $total += $producto['precio'] * $producto['cantidad'];
}

// Insertar en tabla pedidos
$stmt = $conexion->prepare("INSERT INTO pedidos (id_usuario, total) VALUES (?, ?)");
$stmt->bind_param("id", $id_usuario, $total);
$stmt->execute();
$id_pedido = $stmt->insert_id;
$stmt->close();

// Insertar productos en tabla pedido_detalles
$stmt = $conexion->prepare("INSERT INTO pedido_detalles (id_pedido, nombre_producto, precio, cantidad, subtotal) VALUES (?, ?, ?, ?, ?)");
foreach ($data as $producto) {
    $subtotal = $producto['precio'] * $producto['cantidad'];
    $stmt->bind_param("isdis", $id_pedido, $producto['nombre'], $producto['precio'], $producto['cantidad'], $subtotal);
    $stmt->execute();
}
$stmt->close();

$conexion->close();

// Respuesta al cliente
echo json_encode(["success" => true, "message" => "Compra registrada con éxito"]);
