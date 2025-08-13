<?php
session_start();

if (!isset($_SESSION['favoritos'])) {
    $_SESSION['favoritos'] = [];
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Si el producto no está ya en favoritos, lo agregamos
    if (!in_array($id, $_SESSION['favoritos'])) {
        $_SESSION['favoritos'][] = $id;
    }
}

// Verificamos si hay un redirect especial
if (isset($_GET['redirect']) && $_GET['redirect'] === 'favoritos') {
    header("Location: ../../views/todos_los_productos.php");
    exit();
}

// Si no hay redirect especial, regresamos a la página anterior
$referer = $_SERVER['HTTP_REFERER'] ?? '../../views/todos_los_productos.php';
header("Location: " . $referer);
exit();