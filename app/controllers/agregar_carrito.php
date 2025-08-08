<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"] ?? null;
    $nombre = $_POST["nombre"] ?? "";
    $precio = $_POST["precio"] ?? 0;
    $imagen = $_POST["imagen"] ?? "";

    if ($id) {
        $producto = [
            "id" => $id,
            "nombre" => $nombre,
            "precio" => $precio,
            "imagen" => $imagen
        ];

        if (!isset($_SESSION["carrito"])) {
            $_SESSION["carrito"] = [];
        }

        $_SESSION["carrito"][$id] = $producto;

        header("Location: ../../views/carrito.php");
        exit();
    }
}
?>