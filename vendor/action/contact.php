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
$mail->SMTPAuth = true;
$mail->Port       = 587;

$name = $_POST["name"];
$email = $_POST["email"];
$number = $_POST["number"];
$textarea = $_POST["message"];
$email_template = "template_mail.html";

if ($textarea == '') {
    $textarea = 'Нет сообщения!';
}

$body = file_get_contents($email_template);
$body = str_replace('%name%', $name, $body);
$body = str_replace('%email%', $email, $body);
$body = str_replace('%number%', $number, $body);
$body = str_replace('%message%', $textarea, $body);

$mail->setFrom('rtalant02@mail.ru');
$mail->addAddress("rtalant02@mail.ru"); // Здесь введите Email, куда отправлять
$mail->Subject = "Письмо от " . $email;
$mail->MsgHTML($body);

if (!$mail->send()) {
    $message = "Ошибка отправки";
} else {
    $message = "Данные отправлены!";
}

$response = ["message" => $message];

header('Content-type: application/json');
echo json_encode($response);
