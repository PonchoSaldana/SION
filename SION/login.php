<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sion Wireless - Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--FAVICON-------------------------------------------------------------->
    <link rel="shortcut icon" href="img/LOGO/favicon.png" type="image/x-icon">
    </head>
<body>

<div class="contenedor-principal">
    <div class="contenedor">
        <div class="formulario" id="form-login">
            <span class="cerrar" onclick="window.location.href='index.html'">×</span>
            <img src="img/LOGO/sin fondo.png" class="logo">
            <h3>Iniciar sesión</h3>
            <form>
                <div class="input-container">
                    <i class="fas fa-envelope icon"></i>
                    <input type="email" name="" placeholder="Correo electrónico..." required>
                </div>
                <div class="input-container password-container">
                    <i class="fas fa-lock icon"></i>
                    <input type="password" name="" placeholder="Contraseña..." required>
                    <span class="toggle-password" onclick="togglePasswordVisibility('login-password')">👁️</span>
                </div>
                <button type="submit">Entrar</button>
            </form>
            <p>¿No tienes una cuenta? <a href="#" onclick="toggleForm()">Regístrate</a></p>
        </div>

        <div class="formulario oculto" id="form-registro">
            <span class="cerrar" onclick="window.location.href='index.html'">×</span>
            <img src="img/LOGO/sin fondo.png" class="logo">
            <h3>Registro</h3>
            <form>
                <div class="input-container">
                    <i class="fas fa-user icon"></i>
                    <input type="text" name="nombre" placeholder="Nombre" maxlength="20" required>
                </div>
                <div class="input-container">
                    <i class="fas fa-user icon"></i>
                    <input type="text" name="apellidos" placeholder="Apellidos" maxlength="30" required>
                </div>
                <div class="input-container">
                    <i class="fas fa-envelope icon"></i>
                    <input type="email" name="correo" placeholder="Correo electrónico" required>
                </div>
                <div class="input-container">
                    <i class="fas fa-phone icon"></i>
                    <input type="tel" name="celular" placeholder="Número de celular" required>
                </div>
                <div class="input-container">
                    <i class="fas fa-home icon"></i>
                    <input type="text" name="direccion" placeholder="Calle y número de casa" required>
                </div>
                <div class="input-container">
                    <i class="fas fa-address-card icon"></i>
                    <input type="tel" name="codigo_postal" placeholder="Código postal" required>
                </div>
                <div class="input-container password-container">
                    <i class="fas fa-lock icon"></i>
                    <input type="password" name="password" id="register-password" placeholder="Contraseña (10 caracteres)" maxlength="10" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility('register-password')">👁️</span>
                </div>
                <div class="input-container password-container">
                    <i class="fas fa-lock icon"></i>
                    <input type="password" name="confirm_password" id="confirm-password" placeholder="Confirmar contraseña" maxlength="10" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility('confirm-password')">👁️</span>
                </div>
                <button type="submit" onclick="return validateRegistrationForm()">Crear</button>
            </form>
            <p>¿Ya tienes una cuenta? <a href="#" onclick="toggleForm()">Inicia sesión</a></p>
        </div>
    </div>
    <div class="imagen-derecha"></div>
</div>
<script src="js/login.js"></script>
</body>
</html>