<?php
$conexion = new mysqli("localhost", "root", "", "sion_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"] ?? '';
    $descripcion = $_POST["descripcion"] ?? '';
    $precio = $_POST["precio"] ?? 0;
    $cantidad = $_POST["cantidad"] ?? 0;
    $categoria = $_POST["categoria"] ?? '';

    // Verificar que se haya subido una imagen válida
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === 0) {
        $permitidos = ["image/jpeg", "image/png", "image/jpg", "image/webp"];
        $max_size = 2 * 1024 * 1024; // 2MB

        if (in_array($_FILES["imagen"]["type"], $permitidos)) {
            if ($_FILES["imagen"]["size"] <= $max_size) {
                $carpeta_destino = "uploads/";
                if (!file_exists($carpeta_destino)) {
                    mkdir($carpeta_destino, 0777, true);
                }

                $nombre_imagen = time() . "_" . basename($_FILES["imagen"]["name"]);
                $ruta_imagen = $carpeta_destino . $nombre_imagen;

                if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen)) {
                    // Guardamos solo el nombre de la imagen (no la ruta completa)
                    $stmt = $conexion->prepare("INSERT INTO productos (nombre, descripcion, precio, cantidad, categoria, imagen) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssdiis", $nombre, $descripcion, $precio, $cantidad, $categoria, $nombre_imagen);

                    if ($stmt->execute()) {
                        header("Location: admin_panel.php?exito=1");
                        exit();
                    } else {
                        echo "Error al insertar en la base de datos: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "❌ Error al mover la imagen al servidor.";
                }
            } else {
                echo "❌ La imagen excede el tamaño máximo permitido de 20MB.";
            }
        } else {
            echo "❌ Solo se permiten archivos JPG, PNG y WEBP.";
        }
    } else {
        echo "❌ No se recibió ninguna imagen válida.";
    }
}

$conexion->close();
?>