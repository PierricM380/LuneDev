<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$name = $_POST["fullName"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "example@example.fr"; // replace by your email
$mail->Password = "uniqueGooglePassword"; // Genereted into your google account platform


$mail->addAddress("example@example.fr", "Pseudo"); // replace by your email and a pseudo
$mail->setFrom($email, $name);

$mail->isHTML(true); 
$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

header("Location: index.html#contact"); // After sending, redirect to ...