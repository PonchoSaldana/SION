<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: index.html");
    exit;
    
}
echo "<h1>Bienvenido Admin: " . $_SESSION['nombre'] . "</h1>";