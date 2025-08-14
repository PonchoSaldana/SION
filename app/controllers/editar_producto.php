<?php
$conexion = new mysqli("localhost", "root", "", "sion_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST["id"] ?? 0);
    $nombre = trim($_POST["nombre"] ?? '');
    $descripcion = trim($_POST["descripcion"] ?? '');
    $precio = floatval($_POST["precio"] ?? 0);
    $cantidad = intval($_POST["cantidad"] ?? 0);
    $categoria = trim($_POST["categoria"] ?? '');
    $oferta = isset($_POST["oferta"]) ? 1 : 0;

    // Validar campos requeridos
    if ($id <= 0 || empty($nombre) || empty($descripcion) || $precio <= 0 || $cantidad < 0 || empty($categoria)) {
        header("Location: ../../views/panelAdmin.php?error=datos_invalidos");
        exit();
    }

    $imagen_nombre = null;

    // Verificar y procesar la imagen si se subió
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
        $permitidos = ["image/jpeg", "image/png", "image/jpg", "image/webp"];
        $max_size = 2 * 1024 * 1024; // 2MB

        if (!in_array($_FILES["imagen"]["type"], $permitidos)) {
            header("Location: ../../views/panelAdmin.php?error=imagen_invalida");
            exit();
        }

        if ($_FILES["imagen"]["size"] > $max_size) {
            header("Location: ../../views/panelAdmin.php?error=imagen_excede_tamano");
            exit();
        }

        // Eliminar imagen anterior si existe
        $res = $conexion->prepare("SELECT imagen FROM productos WHERE id = ?");
        $res->bind_param("i", $id);
        $res->execute();
        $res->bind_result($imagen_anterior);
        if ($res->fetch() && !empty($imagen_anterior) && file_exists("../../public/uploads/" . $imagen_anterior)) {
            unlink("../../public/uploads/" . $imagen_anterior);
        }
        $res->close();

        $carpeta_destino = "../../public/uploads/";
        if (!file_exists($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true);
        }

        $imagen_nombre = time() . "_" . basename($_FILES["imagen"]["name"]);
        $ruta_imagen = $carpeta_destino . $imagen_nombre;

        if (!move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen)) {
            header("Location: ../../views/panelAdmin.php?error=error_subida_imagen");
            exit();
        }
    }

    // Preparar y ejecutar la actualización
    if ($imagen_nombre) {
        $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, cantidad = ?, categoria = ?, oferta = ?, imagen = ? WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        if ($stmt === false) {
            header("Location: ../../views/panelAdmin.php?error=error_preparacion");
            exit();
        }
        $stmt->bind_param("ssdisisi", $nombre, $descripcion, $precio, $cantidad, $categoria, $oferta, $imagen_nombre, $id);
    } else {
        $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, cantidad = ?, categoria = ?, oferta = ? WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        if ($stmt === false) {
            header("Location: ../../views/panelAdmin.php?error=error_preparacion");
            exit();
        }
        $stmt->bind_param("ssdisii", $nombre, $descripcion, $precio, $cantidad, $categoria, $oferta, $id);
    }

    if ($stmt->execute()) {
        header("Location: ../../views/panelAdmin.php?actualizado=1");
    } else {
        // Si falló y se subió una imagen, eliminarla
        if ($imagen_nombre && file_exists("../../public/uploads/" . $imagen_nombre)) {
            unlink("../../ public/uploads/" . $imagen_nombre);
        }
        header("Location: ../../views/panelAdmin.php?error=error_actualizacion");
    }

    $stmt->close();
}

$conexion->close();
exit();
?>