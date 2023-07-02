<?php include '../components/connect.php';
session_start();
$userId = $_SESSION['user']['id'];
// $err = 'Нет';
$id = $_GET['id'];
$sql = $link->query("DELETE FROM `shop-cart` WHERE `user_id` = '$userId' AND `cake_id` = '$id'")
or die($link->error);

$message = "Товар удалён";
$response = ['message' => $message ?? ''];
echo json_encode($response, JSON_UNESCAPED_UNICODE);
