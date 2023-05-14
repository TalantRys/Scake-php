<?php session_start();
include '../components/connect.php';

// $sessionId = $_COOKIE['sessionId']; // Получаем идентификатор сессии из cookie
$user_id = $_GET['user_id']; // Получаем идентификатор пользователя из параметра URL
$message = '';
// Проверяем, действительна ли сессия пользователя
// $sql = "SELECT * FROM sessions WHERE session_id = '$sessionId'";
// $sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
// $result = $link->query($sql);

// if ($result->num_rows > 0) {
//   $row = $result->fetch_assoc();
//   // Проверяем, соответствует ли идентификатор пользователя записи в БД
//   if ($row['user_id'] == $user_id) {
// Получаем данные о пользователе из БД
$sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
$users = $link->query($sql);
if ($users->num_rows > 0) {
  $user = $users->fetch_assoc();
  $_SESSION = [
    'id' => $user['id'],
    'login' => $user['login'],
  ];
  $message = 'true';
  // Отправляем данные о пользователе в формате JSON
} else $message = null;
header('Content-Type: application/json');
echo json_encode([
  'message' => $message,
  'id' => $user['id'] ?? null,
  'login' => $user['login'] ?? null,
], JSON_UNESCAPED_UNICODE);

  // } else {
  //   // Идентификатор пользователя не соответствует записи в БД
  //   header('HTTP/1.1 403 Forbidden');
  // }
// } else {
//   // Сессия не действительна
//   header('HTTP/1.1 401 Unauthorized');
// }
