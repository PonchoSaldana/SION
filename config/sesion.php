<?php
// Iniciar sesión solo si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está logueado
$usuarioLogueado = isset($_SESSION['usuario_id']);

// Si necesitas también el correo
$correoUsuario = isset($_SESSION['correo']) ? $_SESSION['correo'] : null;
?>
