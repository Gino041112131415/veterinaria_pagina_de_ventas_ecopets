<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../libreria/PHPMailer/Exception.php';
require '../libreria/PHPMailer/PHPMailer.php';
require '../libreria/PHPMailer/SMTP.php';

class Correo {

    private $Username = 'greategui21@gmail.com';
    private $Password = 'gxbefxggucwkbldm';

    function EnviarCorreo($destinatario, $archAttachemt, $asunto, $cuerpo , $html) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $this->Username;
            $mail->Password = $this->Password;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->addAddress($destinatario);

            foreach ($archAttachemt as $archivo) {
                $mail->addAttachment($archivo);
            }

            $mail->isHTML($html);
            $mail->Subject = $asunto;
            $mail->Body = $cuerpo;

            $mail->send();
            return 'OK';
        } catch (Exception $e) {
            return "Error al enviar correo: {$mail->ErrorInfo}";
        }
    }

}

?>