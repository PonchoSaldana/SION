<?php
session_start();
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if (isset($_SESSION['favoritos'])) {
        $_SESSION['favoritos'] = array_diff($_SESSION['favoritos'], [$id]);
    }
}
header("Location: ../../views/favoritos.php");
exit;