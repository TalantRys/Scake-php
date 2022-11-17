<?
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../../libs/PHPMailer/src/PHPMailer.php';
    require '../../libs/PHPMailer/src/Exception.php';

    $mail = new PHPMailer(true);
    $mail->Charset = 'UTF-8';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $body = $name.' '.$email.' '.$phone.' '.$message;
    $theme = "[Заявка с формы]";

    $mail->addAddress('rtalant02@mail.ru');
    $mail->Subject = $theme;
    $mail->Body = $body;

    $mail->send();
