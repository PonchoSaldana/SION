<?php
session_start();
include("conexion.php");

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

            if ($rol === "admin") {
                header("Location: panelAdmin.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Correo no registrado'); window.history.back();</script>";
    }

    $stmt->close();
    $db->cerrar();
}
?>