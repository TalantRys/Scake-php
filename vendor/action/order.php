<?php

session_start();
include_once '../components/connect.php';
$fmt = new IntlDateFormatter(
  'ru_RU',
  IntlDateFormatter::FULL,
  IntlDateFormatter::FULL,
  'Europe/Kaliningrad',
  IntlDateFormatter::GREGORIAN,
  'dd MMMM Y'
);
// ФОРМАТ ДЛЯ ДАТЫ ОФОРМЛЕНИЯ
$orders__date = datefmt_format($fmt, new DateTime());

$userId = isset($_SESSION['user']) ? $_SESSION['user']['id'] : '';
$carts = json_decode($_POST['carts'], true);

$pickup = $_POST['radio'];
$delivery_id = isset($_POST['select']) ? (int)$_POST['select'] : NULL;

// ФОРМАТ ДЛЯ ДАТЫ ПОЛУЧЕНИЯ ЗАКАЗА
$date = datefmt_format($fmt, new DateTime($_POST['date']));
datefmt_set_pattern($fmt, 'HH:mm');
$time = datefmt_format($fmt, new DateTime($_POST['time']));

// АДРЕС И НОМЕР
$address = isset($_POST['address']) ? (string)$_POST['address'] : NULL;
$number = isset($_POST['number']) ? (string)$_POST['number'] : NULL;

// ОБЩАЯ СУММА ЗАКАЗА
$totalPrice = $_POST['totalPrice'];

// УНИКАЛЬНЫЙ НОМЕР ЗАКАЗА
$orders__number = $delivery_id . random_int(0, 99) . "-" . random_int(100, 999) . "-" . random_int(1000, 9999);

if ($pickup == 'Самовывоз'){
  for ($i = 0; $i < count($carts); $i++) {
    $cake_id[$i] = $carts[$i]['id'];
    $sql = $link->query(
      "INSERT INTO `orders`(`cake_id`, `user_id`, `pickup`, `orders__number`, `orders__date`,
      `total_price`, `date`, `time`)
      VALUES ('$cake_id[$i]','$userId', '$pickup','$orders__number', '$orders__date',
      '$totalPrice', '$date', '$time')"
    ) or ($link->error);
  }
} else {
  for ($i = 0; $i < count($carts); $i++) {
    $cake_id[$i] = $carts[$i]['id'];
    $sql = $link->query(
      "INSERT INTO `orders`(`cake_id`, `user_id`, `delivery_id`, `pickup`, `orders__number`, `orders__date`,
      `total_price`, `date`, `time`, `phone`, `address`)
      VALUES ('$cake_id[$i]','$userId', '$delivery_id','$pickup','$orders__number', '$orders__date',
      '$totalPrice', '$date', '$time', '$number', '$address')"
    ) or ($link->error);
  }
}

if ($sql) {
  // УДАЛЕНИЕ ПОСЛЕ ОФОРМЛЕНИЯ ЗАКАЗА
  $deleteFromCart = $link->query("DELETE FROM `shop-cart` WHERE `user_id` = '$userId'") or ($link->error);
  $message = 'order-true';
} else {
  $message = $link->error;
}
$response = [
  'message' => $message,
  'orderNumber' => $orders__number,
  'url' => $url ?? '',
];
header('Content-type: application/json');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
