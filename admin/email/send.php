<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'dnishshmim121@gmail.com';// Your Gmail username;
    $mail->Password = 'tzof ajev zglm lipf'; // Your Gmail app password
    
    $mail->SMTPSecure = 'ss1'; $mail->Port = 465;
    $mail->setFrom('dnishshmim121@gmail.com');
    $mail->addAddress($_POST["email"]);
    $mail->isHTML (true);
    $mail->Subject = $_POST["subject"]; $mail->Body = $_POST["message"];
    $mail->send();

    
    if ($mail->send()) {
        echo '<script>alert("Sent Successfully"); document.location.href = "index.php";</script>';
    } else {
        echo '<script>alert("Mail not sent. ' . $mail->ErrorInfo . '"); document.location.href = "index.php";</script>';
    }
}
?>
