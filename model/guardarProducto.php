<?php
$conexion = new mysqli("localhost", "root", "", "sion_db");

if ($conexion->connect_error) {
    header("Location: ../views/panelAdmin.php?error=conexion_fallida");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recoger y sanitizar datos
    $nombre = trim($_POST["nombre"] ?? '');
    $descripcion = trim($_POST["descripcion"] ?? '');
    $precio = floatval($_POST["precio"] ?? 0);
    $cantidad = intval($_POST["cantidad"] ?? 0);
    $categoria = trim($_POST["categoria"] ?? '');
    $oferta = isset($_POST["oferta"]) ? 1 : 0;

    // Validar campos requeridos
    if (empty($nombre) || empty($descripcion) || $precio <= 0 || $cantidad < 0 || empty($categoria)) {
        header("Location: ../views/panelAdmin.php?error=datos_invalidos");
        exit();
    }

    $imagen_nombre = null;
    $error_imagen = false;

    // Verificar y procesar la imagen si se subió
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
        $permitidos = ["image/jpeg", "image/png", "image/jpg", "image/webp"];
        $max_size = 2 * 1024 * 1024; // 2MB

        if (!in_array($_FILES["imagen"]["type"], $permitidos)) {
            header("Location: ../views/panelAdmin.php?error=imagen_invalida");
            exit();
        }

        if ($_FILES["imagen"]["size"] > $max_size) {
            header("Location: ../views/panelAdmin.php?error=imagen_excede_tamano");
            exit();
        }

        $carpeta_destino = "../public/uploads/";
        if (!file_exists($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true);
        }

        $imagen_nombre = time() . "_" . basename($_FILES["imagen"]["name"]);
        $ruta_imagen = $carpeta_destino . $imagen_nombre;

        if (!move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen)) {
            $error_imagen = true;
            header("Location: ../views/panelAdmin.php?error=error_subida_imagen");
            exit();
        }
    } elseif ($_FILES["imagen"]["error"] !== UPLOAD_ERR_NO_FILE) {
        // Si hay un error diferente a "no se subió archivo"
        header("Location: ../views/panelAdmin.php?error=error_subida_imagen");
        exit();
    }

    // Preparar y ejecutar la inserción en la base de datos
    $stmt = $conexion->prepare("INSERT INTO productos (nombre, descripcion, precio, cantidad, categoria, oferta, imagen) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        header("Location: ../views/panelAdmin.php?error=error_preparacion");
        exit();
    }

    $stmt->bind_param("ssdiiss", $nombre, $descripcion, $precio, $cantidad, $categoria, $oferta, $imagen_nombre);

    if ($stmt->execute()) {
        header("Location: ../views/panelAdmin.php?exito=1");
    } else {
        if ($error_imagen) {
            // Si falló la imagen pero los datos están bien, eliminar la imagen subida (si existe)
            if ($imagen_nombre && file_exists($ruta_imagen)) {
                unlink($ruta_imagen);
            }
        }
        header("Location: ../views/panelAdmin.php?error=error_insertar");
    }

    $stmt->close();
}

$conexion->close();
exit();
?>