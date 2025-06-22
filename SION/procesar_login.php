<?php
session_start();
include("conexion.php");

$correo = $_POST['correo'];
$password = $_POST['password'];

$resultado = $conexion->query("SELECT * FROM usuarios WHERE correo = '$correo'");
$usuario = $resultado->fetch_assoc();

if ($usuario && password_verify($password, $usuario['password'])) {
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['rol'] = $usuario['rol'];

    if ($usuario['rol'] == 'admin') {
        header("Location: index.html");
    } else {
        header("Location: index.html");
    }
} else {
    echo "Contraseña incorrecta. <a href='login.php'>Intentar de nuevo</a>";
}
?>