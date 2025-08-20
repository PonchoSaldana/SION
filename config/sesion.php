<?php
// ../config/sesion.php
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.gc_maxlifetime', 3600); // 1 hora
    session_set_cookie_params(3600);
    session_start();
}

// Verificar si el usuario está logueado
$usuarioLogueado = isset($_SESSION['usuario_id']) || isset($_SESSION['id']);

// Variables de sesión adicionales
$correoUsuario = isset($_SESSION['correo']) ? $_SESSION['correo'] : null;
$rolUsuario = isset($_SESSION['rol']) ? $_SESSION['rol'] : null;
$idUsuario = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : (isset($_SESSION['id']) ? $_SESSION['id'] : null);
?>