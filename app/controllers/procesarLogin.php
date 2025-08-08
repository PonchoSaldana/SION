<?php
session_start();
include("../../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $password = $_POST["password"];

    $db = new conexion_db();
    $conexion = $db->conectar();

    $stmt = $conexion->prepare("SELECT id, nombre, rol, password FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $nombre, $rol, $hash);
        $stmt->fetch();

        if (password_verify($password, $hash)) {
            $_SESSION["id"] = $id;
            $_SESSION["nombre"] = $nombre;
            $_SESSION["rol"] = $rol;
            $_SESSION["correo"] = $correo;

            // Redirigir según el rol (admin o usuario)
            header("Location: ../../public/index.php");
            exit();
        } else {
            // Contraseña incorrecta
            header("Location: ../../views/login.php?error=incorrecta");
            exit();
        }
    } else {
        // Correo no registrado
        header("Location: ../../views/login.php?error=correo");
        exit();
    }

    $stmt->close();
    $db->cerrar();
}
?>