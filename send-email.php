<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'alcalogiserv@gmail.com';        // change
        $mail->Password   = 'eaozbpoubltwupdg';           // change
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('alcalogiserv@gmail.com', 'Alca Logistics Website');
        $mail->addAddress('alcalogiserv@gmail.com');
        $mail->addReplyTo($_POST['email'], $_POST['name']);

        $mail->isHTML(false);
        $mail->Subject = 'New message from Alca Logistics website';
        $mail->Body    = "Name: {$_POST['name']}\nEmail: {$_POST['email']}\nMessage:\n{$_POST['message']}";
        
        $mail->send();

        echo "<h2 style='font-family: sans-serif; color: green;'>✅ Message sent successfully! <br> Kindly Check Your Email Provided For Our Response.</h2><a href='index.html'>← Back</a>";
    } catch (Exception $e) {
        echo "<h2 style='font-family: sans-serif; color: red;'>❌ Error sending message:</h2><p>{$mail->ErrorInfo}</p><a href='index.html'>← Back</a>";
    }
}
?>
