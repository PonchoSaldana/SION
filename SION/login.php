<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sion Wireless - Login</title>
    <link rel="stylesheet" href="css/estiloslogin.css">
</head>
<body>

<div class="contenedor">
    <div class="formulario" id="form-login">
        <span class="cerrar" onclick="toggleForm()">×</span>
        <img src="img/logoSION_B.jpeg" alt="Sion Wireless" class="logo">
        <h3>Iniciar sesión</h3>
        <form method="POST" action="procesar_login.php">
            <input type="email" name="correo" placeholder="Correo electrónico..." required>
            <input type="password" name="password" placeholder="Contraseña..." required>
            <button type="submit">Entrar</button>
        </form>
        <p>¿No tienes una cuenta? <a href="#" onclick="toggleForm()">Regístrate</a></p>
    </div>

    <div class="formulario oculto" id="form-registro">
        <span class="cerrar" onclick="toggleForm()">×</span>


        <img src="imagenes/sion.png" alt="Sion Wireless" class="logo">
        <h3>Registro</h3>
        <form method="POST" action="procesar_registro.php">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellidos" placeholder="Apellidos" required>
            <input type="email" name="correo" placeholder="Correo electrónico" required>
            <input type="text" name="celular" placeholder="Número de celular" required>
            <input type="text" name="codigo_postal" placeholder="Código postal" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Crear</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="#" onclick="toggleForm()">Inicia sesión</a></p>
    </div>
</div>

<script>
function toggleForm() {
    document.getElementById('form-login').classList.toggle('oculto');
    document.getElementById('form-registro').classList.toggle('oculto');
}
</script>

</body>
</html>