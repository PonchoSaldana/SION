<?php
include("../../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $celular = $_POST["celular"];
    $direccion = $_POST["direccion"];
    $codigo_postal = $_POST["codigo_postal"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password !== $confirm_password) {
        echo "<script>alert('Las contraseñas no coinciden'); window.history.back();</script>";
        exit();
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $db = new conexion_db();
    $conexion = $db->conectar();

    // Verificar si el correo ya está registrado
    $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Este correo ya está registrado'); window.history.back();</script>";
        exit();
    }

    $stmt->close();

    // Insertar usuario
    $insert = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, correo, celular, direccion, codigo_postal, password, rol) VALUES (?, ?, ?, ?, ?, ?, ?, 'usuario')");
    $insert->bind_param("sssssss", $nombre, $apellidos, $correo, $celular, $direccion, $codigo_postal, $password_hash);

    if ($insert->execute()) {
        echo "<script>window.location.href='login.php';</script>";
    } else {
        echo "<script>window.history.back();</script>";
    }

    $insert->close();
    $db->cerrar();
}
?>