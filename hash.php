<?php
$password = "admin123";  // Cambia por la contraseña que quieres para el admin
echo password_hash($password, PASSWORD_DEFAULT);
?>