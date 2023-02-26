<?php
session_start();
include '../components/connect.php';

$login = $_POST["login"];
$email = $_POST["email"];
$password = $_POST["password"];
$passwordConfirm = $_POST["passwordConfirm"];

if ($password == $passwordConfirm) {
  $password = md5($password . 'sdads');
  $users = mysqli_query($link, "SELECT `user_login` FROM `users` WHERE `user_login` = '$login'");
  if (mysqli_num_rows($users) == 0) {
    mysqli_query($link, "INSERT INTO `users`(`user_login`, `user_mail`,
            `user_password`) VALUES ('$login','$email','$password')");

    $users = mysqli_query($link, "SELECT * FROM `users` 
            WHERE `user_login` = '$login' AND `user_password` = '$password'");
    if (mysqli_num_rows($users) >= 1) {
      $user = mysqli_fetch_array($users);
      $_SESSION['user'] = [
        'id' => $user['user_id'],
        'login' => $user['user_login'],
      ];
      $message = 'true';
      $url = "index.php";
    }
  } else {
    $message = 'Такой логин уже существует';
  }
} else {
  $message = 'Пароли не совпадают. Попробуйте снова';
}
$response = ['message' => $message, 'url' => $url ?? ''];
header('Content-type: application/json');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
