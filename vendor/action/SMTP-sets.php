<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "../../assets/libs/PHPMailer/src/PHPMailer.php";
require "../../assets/libs/PHPMailer/src/Exception.php";
require "../../assets/libs/PHPMailer/src/SMTP.php";

$mail = new PHPMailer(true);

$mail->IsSMTP();
$mail->CharSet = "UTF-8";
$mail->IsHTML(true);
// Настройки вашей почты
$mail->Host       = 'smtp.mail.ru'; // SMTP сервера вашей почты
$mail->Username   = 'rtalant02@mail.ru'; // Логин на почте
$mail->Password   = '0kuwFPumt7vGkjr5nauv'; // Пароль на почте
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth   = true;
$mail->Port       = 587;

$mail->setFrom('rtalant02@mail.ru');
$mail->addAddress("rtalant02@mail.ru"); // Здесь введите Email, куда отправлять