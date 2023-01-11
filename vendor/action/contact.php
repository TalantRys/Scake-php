<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "../../libs/PHPMailer/src/PHPMailer.php";
    require "../../libs/PHPMailer/src/Exception.php";

    $mail = new PHPMailer(true);
	
    $mail->CharSet = "UTF-8";
    $mail->IsHTML(true);

    $name = $_POST["name"];
    $email = $_POST["email"];
	$number = $_POST["number"];
    $textarea = $_POST["message"];
	$email_template = "template_mail.html";

    if ($textarea == ''){
        $textarea = 'Нет сообщения!';
    }

    $body = file_get_contents($email_template);
	$body = str_replace('%name%', $name, $body);
	$body = str_replace('%email%', $email, $body);
	$body = str_replace('%number%', $number, $body);
	$body = str_replace('%message%', $textarea, $body);

    $mail->addAddress("rtalant02@mail.ru");   // Здесь введите Email, куда отправлять
    $mail->addAddress("rtalant02@gmail.com");   // Здесь введите Email, куда отправлять
	$mail->setFrom($email);
    $mail->Subject = "Письмо от ".$email;
    $mail->MsgHTML($body);

    if (!$mail->send()) {
        $message = "Ошибка отправки";
    } else {
        $message = "Данные отправлены!";
    }
	
	$response = ["message" => $message];

    header('Content-type: application/json');
    echo json_encode($response);

?>
