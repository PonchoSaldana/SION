<?php
include("../../config/conexion.php");
require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = trim($_POST["correo"]);
    $celular = $_POST["celular"];
    $direccion = $_POST["direccion"];
    $codigo_postal = $_POST["codigo_postal"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Depuración: Registrar el correo recibido
    error_log("Correo recibido en backend: '$correo' (longitud: " . strlen($correo) . ")");

    // Validar que las contraseñas coincidan
    if ($password !== $confirm_password) {
        header("Location: ../../views/login.php?error=contrasenas");
        exit();
    }

    // Validar formato de correo
    $emailRegex = '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$/';
    if (!preg_match($emailRegex, $correo)) {
        error_log("Correo inválido en backend: '$correo'");
        header("Location: ../../views/login.php?error=correo_invalido");
        exit();
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $db = new conexion_db();
    $conexion = $db->conectar();

    // Verificar si el correo ya está registrado
    $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: ../../views/login.php?error=correo_registrado");
        exit();
    }

    $stmt->close();

    // Generar token de verificación
    $verification_token = bin2hex(random_bytes(16));

    // Insertar usuario con token y estado no verificado
    $insert = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, correo, celular, direccion, codigo_postal, password, rol, is_verified, verification_token) VALUES (?, ?, ?, ?, ?, ?, ?, 'usuario', 0, ?)");
    $insert->bind_param("ssssssss", $nombre, $apellidos, $correo, $celular, $direccion, $codigo_postal, $password_hash, $verification_token);

   if ($insert->execute()) {
    // Enviar correo de verificación
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Cambia si usas otro proveedor
        $mail->SMTPAuth = true;
        $mail->Username = 'codesmish01@gmail.com'; //correo
        $mail->Password = 'vrpi blhn yjqc uilu'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
//
        $mail->setFrom('codesmish01@gmail.com', 'Sion Wireless');
        $mail->addAddress($correo);
        $mail->isHTML(true);
        $mail->Subject = "Verifica tu correo electrónico";
        $mail->Body = "
            <h2>Bienvenido a Sion Wireless</h2>
            <p>Por favor, verifica tu correo haciendo clic en el siguiente enlace:</p>
            <a href='http://tu-dominio.com/app/controllers/verify.php?token=$verification_token'>Verificar mi correo</a>
        ";

        $mail->send();
        error_log("Correo enviado exitosamente a: $correo");
        header("Location: ../../views/login.php?success=registro");
    } catch (Exception $e) {
        error_log("Error PHPMailer al enviar correo a $correo: " . $mail->ErrorInfo);
        header("Location: ../../views/login.php?error=correo_fallido");
    }
} else {
    header("Location: ../../views/login.php?error=registro_fallido");
}

    $insert->close();
    $db->cerrar();
}
?>
    showModal("¡Tu cuenta ha sido verificada! Ahora puedes iniciar sesión.", "success");
}