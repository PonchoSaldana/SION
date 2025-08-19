<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "sion_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../../public/index.php?error=Acceso denegado");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $solicitud_id = filter_input(INPUT_POST, 'solicitud_id', FILTER_SANITIZE_NUMBER_INT);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);

    if (!in_array($estado, ['pendiente', 'aprobado', 'rechazado'])) {
        header("Location: ../../public/panelAdmin.php?error=Estado inválido");
        exit();
    }

    $query = "UPDATE solicitudes_servicios SET estado = ? WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("si", $estado, $solicitud_id);

    if ($stmt->execute()) {
        header("Location: ../../public/panelAdmin.php?success=Estado actualizado");
        exit();
    } else {
        header("Location: ../../public/panelAdmin.php?error=Error al actualizar el estado");
        exit();
    }

    $stmt->close();
} else {
    header("Location: ../../public/panelAdmin.php?error=Método no permitido");
    exit();
}

$conexion->close();
?>