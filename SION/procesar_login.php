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
        header("Location: admin.php");
    } else {
        header("Location: usuario.php");
    }
} else {
    echo "Credenciales incorrectas. <a href='index.html'>Volver</a>";
}
?>