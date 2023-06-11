<?php session_start();
include '../components/connect.php';

$user_id = $_GET['user_id']; // Получаем идентификатор пользователя из параметра URL
$message = '';
// Получаем данные о пользователе из БД
$users = $link->query("SELECT * FROM `users` WHERE `id` = '$user_id'");
if ($users->num_rows > 0) {
  $user = $users->fetch_assoc();
  $_SESSION['user'] = [
    'id' => $user['id'],
    'login' => $user['login'],
  ];
  $message = 'true';
} else $message = null;
// Отправляем данные о пользователе в формате JSON
header('Content-Type: application/json');
$response = [
  'message' => $message,
  'id' => $user['id'] ?? null,
  'login' => $user['login'] ?? null,
];
echo json_encode($response, JSON_UNESCAPED_UNICODE);