<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$codigo_postal = $_POST['codigo_postal'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, correo, celular, codigo_postal, password) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nombre, $apellidos, $correo, $celular, $codigo_postal, $password);

if ($stmt->execute()) {
    header("Location: index.html");
} else {
    echo "Error al registrar: " . $conexion->error;
}
?>