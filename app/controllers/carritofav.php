<?php
session_start();
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if (!in_array($id, $_SESSION['carrito'])) {
        $_SESSION['carrito'][] = $id;
    }
}
header("Location: ../../views/favoritos.php");
exit;