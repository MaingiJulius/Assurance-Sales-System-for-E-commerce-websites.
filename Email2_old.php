
//Dave Hollingworth video


<?php

$Name = $_POST["Name"];
$Email = $_POST["Email"];
$Continent = $_POST["Continent"];
$Message = $_POST["Message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "juliusmaingi09@gmail.com";
mail->Password = "denm otcs rykh zzmr";

$mail->SerFrom($email, $name);
$mail->addAddress("juliusmaingi09@gmail.com", "Dave");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

echo "email sent";





















?>