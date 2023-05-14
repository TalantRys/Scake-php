<?php session_start();
 include '../components/connect.php';
$id = $_GET['user_id'];
$result = [];
$i = 0;
$shop_carts = $link->query(
  "SELECT `shop-cart`.*,  `cakes`.`name`, `cakes`.`price`, `cakes`.`image`
    FROM `shop-cart` 
    LEFT JOIN `cakes` ON `shop-cart`.`cake_id` = `cakes`.`id` WHERE `shop-cart`.`user_id` = $id"
) or die($link->error);

while ($cart = $shop_carts->fetch_assoc()) {
  $result[$i] = [
    "id" => $cart['cake_id'],
    "img" => $cart['image'],
    "title" => $cart['name'],
    "count" => $cart['count'],
    "price" => $cart['price'],
  ];
  $i++;
}
header('Content-type: application/json');
echo json_encode($result, JSON_UNESCAPED_UNICODE);
session_write_close();