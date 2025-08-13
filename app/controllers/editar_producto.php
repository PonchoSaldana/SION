<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Sanitizar y validar entradas
    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
    $nombre = filter_var(trim($_POST['nombre']), FILTER_SANITIZE_STRING);
    $descripcion = filter_var(trim($_POST['descripcion']), FILTER_SANITIZE_STRING);
    $precio = filter_var($_POST['precio'], FILTER_VALIDATE_FLOAT);
    $cantidad = filter_var($_POST['cantidad'], FILTER_VALIDATE_INT);
    $categoria = filter_var(trim($_POST['categoria']), FILTER_SANITIZE_STRING);
    $oferta = isset($_POST['oferta']) ? 1 : 0;

    // Validar campos requeridos
    if (!$id || !$nombre || !$descripcion || !$precio || !$cantidad || !$categoria) {
        header("Location: ../../views/panelAdmin.php?error=datos_invalidos");
        exit();
    }

    // Validar categoría
    $categorias_validas = ['Antenas', 'Cámaras', 'Cables', 'Conectores', 'Módems', 'Switches', 'Routers'];
    if (!in_array($categoria, $categorias_validas)) {
        header("Location: ../../views/panelAdmin.php?error=categoria_invalida");
        exit();
    }

    $conexion = new mysqli("localhost", "root", "", "sion_db");

    if ($conexion->connect_error) {
        header("Location: ../../views/panelAdmin.php?error=conexion_fallida");
        exit();
    }

    // Manejo de la imagen
    $nombreImagen = null;
    if (!empty($_FILES["imagen"]["name"])) {
        $carpeta = "../public/uploads/";
        $nombreImagen = time() . "_" . basename($_FILES["imagen"]["name"]);
        $rutaImagen = $carpeta . $nombreImagen;

        // Validar tipo y tamaño de la imagen
        $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
        $tamanoMaximo = 5 * 1024 * 1024; // 5MB
        if (!in_array($_FILES["imagen"]["type"], $tiposPermitidos) || $_FILES["imagen"]["size"] > $tamanoMaximo) {
            header("Location: ../../views/panelAdmin.php?error=imagen_invalida");
            exit();
        }

        if (!move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImagen)) {
            header("Location: ../../views/panelAdmin.php?error=error_subida_imagen");
            exit();
        }

        // Eliminar imagen anterior
        $res = $conexion->prepare("SELECT imagen FROM productos WHERE id = ?");
        $res->bind_param("i", $id);
        $res->execute();
        $res->bind_result($imagenAnterior);
        if ($res->fetch() && $imagenAnterior && file_exists("../public/uploads/" . $imagenAnterior)) {
            unlink("../public/uploads/" . $imagenAnterior);
        }
        $res->close();
    }

<<<<<<< HEAD
    // Preparar la consulta SQL
    if ($nombreImagen) {
        $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, cantidad = ?, categoria = ?, oferta = ?, imagen = ? WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssdiissi", $nombre, $descripcion, $precio, $cantidad, $categoria, $oferta, $nombreImagen, $id);
    } else {
        $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, cantidad = ?, categoria = ?, oferta = ? WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssdiisi", $nombre, $descripcion, $precio, $cantidad, $categoria, $oferta, $id);
=======
    $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, cantidad=?, categoria=?, oferta=?, imagen=? WHERE id=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssdiissi", $nombre, $descripcion, $precio, $cantidad, $categoria, $oferta, $nombreImagen, $id);
    } else {
        // Sin cambiar imagen
    $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, cantidad=?, categoria=?, oferta=? WHERE id=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssdiisi", $nombre, $descripcion, $precio, $cantidad, $categoria, $oferta, $id);
>>>>>>> 3510c0672c1f1fb42c3d47b0cb35c3976f62253d
    }

    // Ejecutar y manejar errores
    if ($stmt->execute()) {
        $stmt->close();
        $conexion->close();
        header("Location: ../../views/panelAdmin.php?editado=1");
        exit();
    } else {
        $stmt->close();
        $conexion->close();
        header("Location: ../../views/panelAdmin.php?error=error_actualizacion");
        exit();
    }
} else {
    header("Location: ../../views/panelAdmin.php?error=datos_no_enviados");
    exit();
}
?>