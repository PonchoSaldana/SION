<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $categoria = $_POST['categoria'];

    $conexion = new mysqli("localhost", "root", "", "sion_db");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Si se sube nueva imagen
    if (!empty($_FILES["imagen"]["name"])) {
        $imagen = "uploads/" . basename($_FILES["imagen"]["name"]);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagen);

        // Eliminar imagen anterior
        $res = $conexion->query("SELECT imagen FROM productos WHERE id = $id");
        if ($fila = $res->fetch_assoc()) {
            if (file_exists($fila['imagen'])) {
                unlink($fila['imagen']);
            }
        }

        $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, cantidad=?, categoria=?, imagen=? WHERE id=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssdisii", $nombre, $descripcion, $precio, $cantidad, $categoria, $imagen, $id);
    } else {
        $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, cantidad=?, categoria=? WHERE id=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssdisi", $nombre, $descripcion, $precio, $cantidad, $categoria, $id);
    }

    $stmt->execute();
    $stmt->close();
    $conexion->close();

    header("Location: panelAdmin.php?editado=1");
    exit();
}
?>