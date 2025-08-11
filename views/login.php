<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sion Wireless - Login</title>
    <link rel="stylesheet" href="../public/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--FAVICON-------------------------------------------------------------->
    <link rel="shortcut icon" href="../public/img/LOGO/favicon.png" type="image/x-icon">

</head>

<body>

    <div class="contenedor-principal">
        <div class="contenedor">
            <!-- Login -->
            <div class="formulario" id="form-login">
                <span class="cerrar" onclick="window.location.href='../index.php'">X</span>
                <img src="../public/img/LOGO/logoCONfondo.jpeg" class="logo">
                <h3>Iniciar sesión</h3>
                <form action="../app/controllers/procesarLogin.php" method="POST">
                    <div class="input-container">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" name="correo" placeholder="Correo electrónico..." required>
                    </div>
                    <div class="input-container password-container">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" name="password" placeholder="Contraseña..." required id="login-password">
                        <span class="toggle-password" onclick="togglePasswordVisibility('login-password')">👁️</span>
                    </div>
                    <button type="submit">Entrar</button>
                </form>
                <p>¿No tienes una cuenta? <a href="#" onclick="toggleForm()">Regístrate</a></p>
            </div>

            <!-- Registro -->
            <div class="formulario oculto" id="form-registro">
                <span class="cerrar" onclick="window.location.href='../index.php'">X</span>
                <img src="../public/img/LOGO/logoCONfondo.jpeg" class="logo">
                <h3>Registro</h3>
                <form action="../app/controllers/registro.php" method="POST" onsubmit="return validateRegistrationForm()">
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
                        <input type="tel" name="celular" placeholder="Número de celular" required pattern="[0-9]{10}" maxlength="10" inputmode="numeric" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)">
                    </div>
                    <div class="input-container">
                        <i class="fas fa-home icon"></i>
                        <input type="text" name="direccion" placeholder="Calle y número de casa" required>
                    </div>
                    <div class="input-container">
                        <i class="fas fa-address-card icon"></i>
                        <input type="tel" name="codigo_postal" placeholder="Código postal" required pattern="[0-9]{5}" maxlength="5" inputmode="numeric" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,5)">
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
                    <button type="submit">Crear</button>
                </form>
                <p>¿Ya tienes una cuenta? <a href="#" onclick="toggleForm()">Inicia sesión</a></p>
            </div>
        </div>
        <div class="imagen-derecha"></div>
    </div>

    <!-- Modal flotante -->
    <div id="modal-alert" class="modal-alert"></div>

    <!-- JS -->
    <script>
        function togglePasswordVisibility(id) {
            const input = document.getElementById(id);
            input.type = input.type === 'password' ? 'text' : 'password';
        }

        function toggleForm() {
            const login = document.getElementById('form-login');
            const registro = document.getElementById('form-registro');
            login.classList.toggle('oculto');
            registro.classList.toggle('oculto');
        }

        function showModal(message, type = 'error') {
            const modal = document.getElementById('modal-alert');
            modal.textContent = message;
            modal.className = 'modal-alert show ' + type;
            setTimeout(() => {
                modal.classList.remove('show');
            }, 3000);
        }

        function validateRegistrationForm() {
            const celular = document.querySelector('input[name="celular"]').value.trim();
            const codigoPostal = document.querySelector('input[name="codigo_postal"]').value.trim();
            const password = document.getElementById('register-password').value;
            const confirmPassword = document.getElementById('confirm-password').value;

            if (!/^\d{10}$/.test(celular)) {
                showModal("El número de celular debe tener exactamente 10 dígitos numéricos.");
                return false;
            }

            if (!/^\d{5}$/.test(codigoPostal)) {
                showModal("El código postal debe tener exactamente 5 dígitos numéricos.");
                return false;
            }

            if (password !== confirmPassword) {
                showModal("Las contraseñas no coinciden.");
                return false;
            }

            showModal("¡Registro exitoso!", "success");

            return true; 
        }

        const params = new URLSearchParams(window.location.search);

if (params.get("error") === "login") {
    showModal("Correo o contraseña incorrectos.");
}

if (params.get("registro") === "ok") {
    showModal("¡Registro exitoso!", "success");
}

if (params.get("error") === "incorrecta") {
    showModal("Contraseña incorrecta.");
}

if (params.get("error") === "correo") {
    showModal("Correo no registrado.");
}
    </script>
    
    
</body>

</html>