<?php
include("../../config/sesion.php");
$conexion = new mysqli("localhost", "root", "", "sion_db");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_pedido'])) {
    $id_pedido = intval($_POST['id_pedido']);
    $usuario_id = $_SESSION['id'];

    // Actualizar estado a 'cancelado' solo si el pedido pertenece al usuario
    $sql = "UPDATE pedidos SET estado='cancelado' WHERE id=$id_pedido AND id_usuario=$usuario_id";
    if ($conexion->query($sql)) {
        header("Location: ../../views/compras.php?success=Compra cancelada");
        exit;
    } else {
        header("Location: ../../views/compras.php?error=No se pudo cancelar la compra");
        exit;
    }
}
?>
