<?php
session_start();
include '../components/connect.php';

$login = $_POST["login"];
$email = $_POST["email"];
$password = $_POST["password"];
$passwordConfirm = $_POST["passwordConfirm"];

if ($password == $passwordConfirm) {
  $password = md5($password . 'sdads');
  $users = mysqli_query($link, "SELECT `login` FROM `users` WHERE `login` = '$login'");
  if (mysqli_num_rows($users) == 0) {
    mysqli_query($link, "INSERT INTO `users`(`login`, `mail`,
            `password`) VALUES ('$login','$email','$password')");

    $users = mysqli_query($link, "SELECT * FROM `users` 
            WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($users) >= 1) {
      $user = mysqli_fetch_array($users);
      $_SESSION['user'] = [
        'id' => $user['id'],
        'login' => $user['login'],
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
$response = [
  'message' => $message,
  'url' => $url ?? '',
  'user_id' => $_SESSION['user']['id'] ?? ''
];
header('Content-type: application/json');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
