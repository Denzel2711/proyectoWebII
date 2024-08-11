<?php

include 'conexion.php'; // Incluye el archivo de conexión

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/SMTP.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $captcha = $_POST['g-recaptcha-response'];

    // Verificación del CAPTCHA
    if (!$captcha) {
        echo "Por favor, verifica el captcha.";
        exit;
    }

    $secretKey = "6Le1oyIqAAAAAEavZfOETALlha9uMF6BpEA4cRem";
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        echo "Verificación de captcha fallida. Por favor, inténtalo de nuevo.";
        exit;
    }

    if (isset($responseKeys["score"]) && $responseKeys["score"] < 0.5) {
        echo "La verificación del captcha indica un comportamiento sospechoso. Por favor, inténtalo de nuevo.";
        exit;
    }

    // Configuración de PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'carodri323@gmail.com';
        $mail->Password   = 'zmahotgzoctwyrgj';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('carodri323@gmail.com', 'Dufo');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = $name;
        $mail->Body    = "<p>Mensaje: $message</p><p>Teléfono: $phone</p>";

        if ($mail->send()) {
            $sql = "INSERT INTO mensajescontacto (nombre, correo, mensaje) VALUES ('$name', '$email', '$message')";

            if (mysqli_query($conection, $sql)) {
                header("Location: ../index.php");
                exit();
            } else {
                echo "Error al guardar los datos: " . mysqli_error($conection);
            }
        } else {
            echo "El correo no pudo ser enviado. Error de PHPMailer: {$mail->ErrorInfo}";
        }
    } catch (Exception $e) {
        echo "Error al enviar el correo: " . $mail->ErrorInfo;
    }
}
