<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $categoria = $_POST['categoria'];
    $oferta = isset($_POST['oferta']) ? 1 : 0; // ✅ checkbox de oferta

    $conexion = new mysqli("localhost", "root", "", "sion_db");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Si se sube nueva imagen
    if (!empty($_FILES["imagen"]["name"])) {
        $carpeta = "uploads/";
        $nombreImagen = time() . "_" . basename($_FILES["imagen"]["name"]);
        $rutaImagen = $carpeta . $nombreImagen;

        move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImagen);

        // Eliminar imagen anterior (segura)
        $res = $conexion->prepare("SELECT imagen FROM productos WHERE id = ?");
        $res->bind_param("i", $id);
        $res->execute();
        $res->bind_result($imagenAnterior);
        if ($res->fetch() && file_exists("uploads/" . $imagenAnterior)) {
            unlink("uploads/" . $imagenAnterior);
        }
        $res->close();

    $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, cantidad=?, categoria=?, oferta=?, imagen=? WHERE id=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssdiissi", $nombre, $descripcion, $precio, $cantidad, $categoria, $oferta, $nombreImagen, $id);
    } else {
        // Sin cambiar imagen
    $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, cantidad=?, categoria=?, oferta=? WHERE id=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssdiisi", $nombre, $descripcion, $precio, $cantidad, $categoria, $oferta, $id);
    }

    $stmt->execute();
    $stmt->close();
    $conexion->close();

    header("Location: ../../views/panelAdmin.php?editado=1");
    exit();
}
?>