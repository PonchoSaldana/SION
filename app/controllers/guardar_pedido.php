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

// Leer JSON del POST
$inputJSON = file_get_contents('php://input');
$carrito = json_decode($inputJSON, true);

if (!$carrito || !is_array($carrito) || empty($carrito)) {
    http_response_code(400);
    echo json_encode(["error" => "Carrito inválido o vacío"]);
    exit;
}

if (!isset($_SESSION['id']) || !is_numeric($_SESSION['id'])) {
    http_response_code(403);
    echo json_encode(["error" => "Usuario no logueado o sesión inválida"]);
    exit;
}

$usuario_id = intval($_SESSION['id']);
$total = 0;

// Calcular total del pedido
foreach ($carrito as $producto) {
    if (!isset($producto['nombre']) || !isset($producto['precio']) || !isset($producto['cantidad'])) {
        http_response_code(400);
        echo json_encode(["error" => "Datos del producto incompletos"]);
        exit;
    }
    $total += floatval($producto['precio']) * intval($producto['cantidad']);
}

// Generar token único
$qr_token = bin2hex(random_bytes(8));

// Insertar la compra con consulta preparada
$stmt = $conexion->prepare("INSERT INTO pedidos (id_usuario, fecha, total, estado, qr_token, expiracion) 
                           VALUES (?, NOW(), ?, 'pendiente', ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))");
if (!$stmt) {
    http_response_code(500);
    echo json_encode(["error" => "Error en la preparación de la consulta: " . $conexion->error]);
    exit;
}
$stmt->bind_param("ids", $usuario_id, $total, $qr_token);
if (!$stmt->execute()) {
    http_response_code(500);
    echo json_encode(["error" => "Error al guardar la compra: " . $stmt->error]);
    exit;
}
$id_pedido = $stmt->insert_id;
$stmt->close();

// Insertar productos en detalle con consulta preparada
$stmt = $conexion->prepare("INSERT INTO pedido_detalles (id_pedido, nombre_producto, precio, cantidad, subtotal, imagen) 
                           VALUES (?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    http_response_code(500);
    echo json_encode(["error" => "Error en la preparación de la consulta de detalles: " . $conexion->error]);
    exit;
}

foreach ($carrito as $producto) {
    $nombre = $conexion->real_escape_string($producto['nombre']);
    $precio = floatval($producto['precio']);
    $cantidad = intval($producto['cantidad']);
    $subtotal = $precio * $cantidad;
    $imagen = $conexion->real_escape_string($producto['imagen'] ?? 'default.png'); // Usar default.png si no hay imagen

    $stmt->bind_param("issdds", $id_pedido, $nombre, $precio, $cantidad, $subtotal, $imagen);
    if (!$stmt->execute()) {
        http_response_code(500);
        echo json_encode(["error" => "Error al guardar el detalle del pedido: " . $stmt->error]);
        exit;
    }
}
$stmt->close();

$conexion->close();

// Respuesta al cliente
echo json_encode(["success" => true, "message" => "Compra guardada correctamente", "id_pedido" => $id_pedido]);
?>