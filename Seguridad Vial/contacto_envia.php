<?php
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Capturamos los datos del formulario
$nombre = $_REQUEST['nombre'];
$apellidos = $_REQUEST['apellidos'];
$correo = $_REQUEST['correo'];
$message = $_REQUEST['mensaje'];

// Datos del correo
$to = 'vialsmart233@gmail.com';
$mensaje = $message . "\n" . 'Correo de contacto de vuelta: ' . $correo;
$subject = 'Petición de contacto de: ' . $nombre . ' ' . $apellidos;

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'vialsmart233@gmail.com'; // Tu correo
    $mail->Password = 'qjpk zsav sjok qrvm';     // Contraseña o token de aplicación
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Configuración para acentos
    $mail->CharSet = 'UTF-8'; // Garantiza que se manejen acentos y caracteres especiales correctamente

    // Configuración del correo
    $mail->setFrom('vialsmart233@gmail.com', 'Formulario de Contacto'); // Remitente
    $mail->addAddress($to); // Destinatario

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = '<p><b>Nombre:</b> ' . htmlspecialchars($nombre) . ' ' . htmlspecialchars($apellidos) . '</p>' .
                     '<p><b>Correo:</b> ' . htmlspecialchars($correo) . '</p>' .
                     '<p><b>Mensaje:</b> ' . nl2br(htmlspecialchars($message)) . '</p>';
    $mail->AltBody = htmlspecialchars($mensaje);

    // Enviar correo
    $mail->send();

    echo "<script>
            alert('¡El mensaje fue enviado correctamente!');
            window.location.href = 'contacto_formulario.php';
          </script>";
} catch (Exception $e) {
    echo "<script>
            alert('Hubo un error al enviar el mensaje. Por favor, intenta nuevamente. Error: {$mail->ErrorInfo}');
            window.location.href = 'index.php';
          </script>";
}
?>
