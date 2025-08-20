<?php
include("../../config/conexion.php");

if (!isset($_GET['token']) || empty($_GET['token'])) {
    header("Location: ../../views/login.php?error=token_no_proporcionado");
    exit;
}

$token = filter_var($_GET['token'], FILTER_SANITIZE_STRING);

$db = new conexion_db();
$conexion = $db->conectar();

// Verificar conexión
if (!$conexion) {
    header("Location: ../../views/login.php?error=conexion_fallida");
    exit;
}

// Buscar usuario con el token
$stmt = $conexion->prepare("SELECT id FROM usuarios WHERE verification_token = ? AND is_verified = 0 AND token_expiration > NOW()");
$stmt->bind_param("s", $token);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Actualizar estado de verificación
    $update = $conexion->prepare("UPDATE usuarios SET is_verified = 1, verification_token = NULL, token_expiration = NULL WHERE verification_token = ?");
    $update->bind_param("s", $token);

    if ($update->execute()) {
        header("Location: ../../views/login.php?success=verificado");
    } else {
        header("Location: ../../views/login.php?error=verificacion_fallida");
    }
    $update->close();
} else {
    header("Location: ../../views/login.php?error=token_invalido_o_expirado");
}

$stmt->close();
$db->cerrar();
exit;
?>