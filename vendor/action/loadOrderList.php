<?php session_start();
include_once '../components/connect.php';

// Найти все товары в корзине для заказа по id пользователя
$user_id = $_GET['user_id'];
$orderList = $link->query(
  "SELECT `shop-cart`.*,
   `cakes`.`name` as `title`, `cakes`.`image` as `image`, `cakes`.`type_id`,
   `types`.`name` as `type`
    FROM `shop-cart` 
      LEFT JOIN `cakes` ON `shop-cart`.`cake_id` = `cakes`.`id` 
      LEFT JOIN `types` ON `cakes`.`type_id` = `types`.`id`
      WHERE `shop-cart`.`user_id` = '$user_id'"
);
$result = [];
$i = 0;
while ($order = $orderList->fetch_assoc()) {
  $result[$i] = [
    "user_id" => $order['user_id'],
    "cake_id" => $order['cake_id'],
    "type_id" => $order['type_id'],
    "type" => $order['type'],
    "title" => $order['title'],
    "image" => $order['image'],
    "count" => $order['count'],
    "counted_price" => $order['counted_price'],
  ];
  $i++;
}
header('Content-Type: application/json');
echo json_encode($result, JSON_UNESCAPED_UNICODE);
