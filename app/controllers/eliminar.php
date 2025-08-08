<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $conexion = new mysqli("localhost", "root", "", "sion_db");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Eliminar imagen del servidor
    $resultado = $conexion->query("SELECT imagen FROM productos WHERE id = $id");
    if ($fila = $resultado->fetch_assoc()) {
        $ruta = $fila['imagen'];
        if (file_exists($ruta)) {
            unlink($ruta);
        }
    }

    // Eliminar producto
    $conexion->query("DELETE FROM productos WHERE id = $id");

    $conexion->close();

    // Redirige de vuelta al panel de admin
    header("Location: ../../views/panelAdmin.php?eliminado=1");
    exit();
} else {
    // Si alguien accede sin POST válido, redirige también
    header("Location: ../../views/panelAdmin.php");
    exit();
}
?>