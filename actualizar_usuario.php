<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $celular = $_POST["celular"];
    $direccion = $_POST["direccion"];
    $codigo_postal = $_POST["codigo_postal"];

    $conexion = (new conexion_db())->conectar();
    $stmt = $conexion->prepare("UPDATE usuarios SET nombre = ?, apellidos = ?, correo = ?, celular = ?, direccion = ?, codigo_postal = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $nombre, $apellidos, $correo, $celular, $direccion, $codigo_postal, $id);

    if ($stmt->execute()) {
        header("Location: mi_cuenta.php?exito=1");
        exit();
    } else {
        echo "Error al actualizar los datos.";
    }

    $stmt->close();
    $conexion->close();
}
?>