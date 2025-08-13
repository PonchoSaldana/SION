<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Lógica para recuperar contraseña
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo'] ?? '');
    if (!$correo) {
        $error = "Por favor ingresa tu correo electrónico.";
    } else {
        require_once("../config/conexion.php");
        $db = new conexion_db();
        $conexion = $db->conectar();
        $stmt = $conexion->prepare("SELECT id, password FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hash = $row['password'];
            // Ejemplo de verificación:
            // $input = 'contraseña_del_usuario';
            // if (password_verify($input, $hash)) {
            //     // La contraseña es correcta
            // }
            // En recuperación, normalmente NO se envía la contraseña, solo el hash (no reversible).
            require_once("../vendor/phpmailer/phpmailer/src/PHPMailer.php");
            require_once("../vendor/phpmailer/phpmailer/src/SMTP.php");
            require_once("../vendor/phpmailer/phpmailer/src/Exception.php");

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Cambia por tu servidor SMTP
                $mail->SMTPAuth = true;
                $mail->Username = 'codesmish01@gmail.com'; // Cambia por tu correo
                $mail->Password = 'vrpi blhn yjqc uilu'; // Cambia por tu contraseña o app password
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('codesmish01@gmail.com', 'Soporte SION');
                $mail->addAddress($correo);
                $mail->Subject = 'Recuperación de contraseña';
                $mail->isHTML(true);
                $mail->Body = '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de contraseña</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; margin: 0; padding: 0; }
        .container { max-width: 400px; margin: 40px auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px #0001; padding: 24px; }
        h2 { color: #007bff; text-align: center; }
        p { color: #333; font-size: 16px; }
        @media (max-width: 500px) { .container { padding: 12px; } }
    </style>
</head>
<body>
    <div class="container">
        <h2>Recuperación de contraseña</h2>
        <p>Hola,<br>Recibimos una solicitud para recuperar tu contraseña.<br>Tu contraseña está protegida y no puede ser enviada por correo.<br>Si deseas restablecerla, haz clic en el siguiente enlace:</p>
        <a href="https://tusitio.com/recuperar?correo=' . urlencode($correo) . '" class="btn">Restablecer contraseña</a>
        <p style="font-size:13px;color:#888;margin-top:24px;text-align:center;">Si no solicitaste este cambio, ignora este correo.</p>
    </div>
</body>
</html>';

                $mail->send();
                $mensaje = 'Si el correo está registrado, recibirás instrucciones para recuperar tu contraseña.';
            } catch (Exception $e) {
                $error = 'Error al enviar el correo: ' . $mail->ErrorInfo;
            }
        } else {
            $error = "El correo no está registrado.";
        }
        $stmt->close();
        $db->cerrar();
    }
}
?>
<!DOCTYPE html>
<html lang="es">

</head>
    <meta charset="UTF-8">
    <title>Recuperar contraseña</title>
    <link rel="shortcut icon" href="../public/img/LOGO/favicon.png" type="image/x-icon">
    <style>
        /* Código CSS original del usuario (ajustado en la respuesta anterior) */
body {
    font-family: 'Poppins', Arial, sans-serif;
    background: linear-gradient(135deg, #001828 0%, #2c3e50 100%);
    min-height: 100vh;
    width: 100vw;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 40px 0;
    display: flex;
    align-items: center;
    justify-content: center;
}
.contenedor-principal {
    width: 98%;
    max-width: 500px;
    min-height: auto;
    background: rgba(63, 98, 134, 0.55);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
    border-radius: 24px;
    overflow: hidden;
    margin: 0 auto;
    backdrop-filter: blur(16px);
    border: 1.5px solid rgba(236,240,241,0.12);
}
.contenedor {
    width: 100%;
    min-width: auto;
    padding: 64px 56px 56px 56px;
    box-sizing: border-box;
    background: linear-gradient(120deg, #001828 60%, #2c3e50 100%);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    box-shadow: 0 2px 24px rgba(44,62,80,0.10);
}
.formulario {
    padding: 32px;
    width: 100%;
    max-width: 400px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    background: rgb(255, 255, 255);
    border-radius: 18px;
    box-shadow: 0 2px 16px rgba(44,62,80,0.08);
}
.formulario h3 {
    color: black;
    margin-top: 0;
    margin-bottom: 18px;
    text-align: center;
    font-size: 2em;
    font-weight: 600;
    letter-spacing: 1px;
    text-shadow: 0 2px 8px rgba(44,62,80,0.18);
}
.input-container {
    position: relative;
    width: 100%;
    margin-bottom: 18px;
}
.input-container input {
    width: 100%;
    padding: 13px 13px 13px 44px;
    border: 2px solid #ecf0f1;
    border-radius: 8px;
    box-sizing: border-box;
    font-size: 16px;
    padding-right: 50px;
    background: rgba(236,240,241,0.18);
    color: #001828;
    box-shadow: 0 2px 8px rgba(44,62,80,0.15) inset;
    transition: border-color 0.3s, box-shadow 0.3s;
}
.input-container input:focus {
    outline: none;
    border-color: #001828;
    box-shadow: 0 0 8px rgba(44,62,80,0.18);
    background: rgba(236,240,241,0.32);
}
.input-container .icon {
    position: absolute;
    top: 50%;
    left: 16px;
    transform: translateY(-50%);
    color: #2c3e50;
    font-size: 1.2em;
    filter: drop-shadow(0 2px 2px rgba(44,62,80,0.10));
}
button {
    width: 100%;
    background: linear-gradient(90deg, #001828 60%, #2c3e50 100%);
    color: #fff;
    border: none;
    padding: 15px;
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
    margin-top: 10px;
    box-shadow: 0 4px 16px rgba(0,24,40,0.18);
    transition: background 0.3s, box-shadow 0.3s, transform 0.2s;
    letter-spacing: 1px;
    border-radius: 8px;
}
button:hover {
    background: linear-gradient(90deg, #2c3e50 60%, #001828 100%);
    box-shadow: 0 6px 24px rgba(44,62,80,0.18);
    transform: translateY(-2px) scale(1.03);
}
p {
    font-size: 15px;
    margin-top: 20px;
    color: black;
    text-align: center;
    letter-spacing: 0.5px;
}
p a {
    color: #1683CE;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.2s;
}
p a:hover {
    text-decoration: underline;
    color: #064067;
}

/* ---------------------------------------------------- */
/* MEDIA QUERY para que sea responsivo en 450px o menos */
/* ---------------------------------------------------- */
@media (max-width: 450px) {
    .contenedor-principal {
        /* Se eliminó el padding del body, así que ahora el contenedor debe ocupar el 100% */
        width: 100%;
        max-width: none;
        border-radius: 0; /* Para que se ajuste a los bordes de la pantalla */
        min-height: 100vh;
    }
    .contenedor {
        /* Reduce el padding para que no se salga de la pantalla */
        padding: 40px 24px 32px 24px;
        background: #001828; /* Color sólido para un diseño más limpio en móvil */
        min-height: 100vh;
    }
    .formulario {
        /* Ajusta el ancho para que no se pegue a los bordes */
        padding: 24px 16px;
        max-width: 100%;
    }
    .formulario h3 {
        font-size: 1.8em; /* Título un poco más pequeño */
    }
    button {
        font-size: 16px; /* Texto del botón más pequeño */
        padding: 13px;
    }
}

/* El resto de las media queries del diseño original */
@media (max-width: 768px) {
    .contenedor-principal {
        flex-direction: column;
        min-height: 80vh;
    }
    .contenedor {
        width: 100%;
    }
}
    </style>
    <style>

    </style>
</head>

<body>
    <div class="contenedor-principal">
        <div class="contenedor">
            <div class="formulario">
                <h3>Recuperar contraseña</h3>
                <form method="POST">
                    <div class="input-container">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" name="correo" placeholder="Correo electrónico..." required>
                    </div>
                    <button type="submit">Enviar instrucciones</button>
                </form>
                <?php if (!empty($error)): ?>
                    <p style="color: #dc3545; text-align:center;"><?= $error ?></p>
                <?php elseif (!empty($mensaje)): ?>
                    <p style="color: #28a745; text-align:center;"><?= $mensaje ?></p>
                <?php endif; ?>
                <p><a href="../views/login.php">Volver al login</a></p>
            </div>
        </div>
    </div>
</body>

</html>