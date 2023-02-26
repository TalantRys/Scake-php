<?php
session_start();
include '../components/connect.php';

$login = $_POST["login"];
$password = md5($_POST["password"] . 'sdads');

$users = mysqli_query($link, "SELECT * FROM `users` WHERE `user_login` = '$login'");
if (mysqli_num_rows($users) >= 1) {
    $user = mysqli_fetch_array($users);
    if ($password == $user['user_password']) {
        $_SESSION['user'] = [
            'id' => $user['user_id'],
            'login' => $user['user_login'],
        ];
        $message = 'true';
        $url = "index.php";
    } else {
        $message = 'Неверный пароль';
    }
} elseif (mysqli_num_rows($users) == 0) {
    $message = 'Такого логина не существует';
}

$response = ['message' => $message, 'url' => $url ?? ''];
header('Content-type: application/json');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
