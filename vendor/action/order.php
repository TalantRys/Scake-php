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

if ($pickup == 'Самовывоз') {
  for ($i = 0; $i < count($carts); $i++) {
    $cake_id[$i] = $carts[$i]['id'];
    $cake_count[$i] = $carts[$i]['count'];
    $sql = $link->query(
      "INSERT INTO `orders`(`cake_id`, `cake_count`, `user_id`, `pickup`, `orders__number`, `orders__date`,
      `total_price`, `date`, `time`)
      VALUES ('$cake_id[$i]', '$cake_count[$i]', '$userId', '$pickup','$orders__number', '$orders__date',
      '$totalPrice', '$date', '$time')"
    ) or ($link->error);
  }
} else {
  for ($i = 0; $i < count($carts); $i++) {
    $cake_id[$i] = $carts[$i]['id'];
    $cake_count[$i] = $carts[$i]['count'];
    $sql = $link->query(
      "INSERT INTO `orders`(`cake_id`, `cake_count`, `user_id`, `delivery_id`, `pickup`, `orders__number`, `orders__date`,
      `total_price`, `date`, `time`, `phone`, `address`)
      VALUES ('$cake_id[$i]', '$cake_count[$i]', '$userId', '$delivery_id','$pickup','$orders__number', '$orders__date',
      '$totalPrice', '$date', '$time', '$number', '$address')"
    ) or ($link->error);
  }
}

if ($sql) {
  // УДАЛЕНИЕ ПОСЛЕ ОФОРМЛЕНИЯ ЗАКАЗА
  $deleteFromCart = $link->query("DELETE FROM `shop-cart` WHERE `user_id` = '$userId'") or ($link->error);
  // Сообщение о новом заказе админу

  include 'SMTP-sets.php';

  $email_template = "order_mail.html";

  $user_info = $link->query("SELECT * FROM `users` WHERE `id` = '$userId'");
  $delivery_info = $link->query("SELECT * FROM `deliveries` WHERE `id` = '$delivery_id'");
  while ($user = $user_info->fetch_assoc()) {
    $login = $user['login'];
    $email = $user['mail'];
  }
  while ($delivery = $delivery_info->fetch_assoc()) {
    $delivery_name = $delivery['delivery'];
  }
  $body = file_get_contents($email_template);
  if ($pickup != 'Самовывоз') {
    $body = str_replace('%number%', "<p>Телефон: $number</p>", $body);
    $body = str_replace('%delivery_name%', "<p>Адрес: $delivery_name район, $address</p>", $body);
  } else {
    $body = str_replace('%number%', "", $body);
    $body = str_replace('%delivery_name%', "", $body);
  }
  $body = str_replace('%order_number%', $orders__number, $body);
  $body = str_replace('%login%', $login, $body);
  $body = str_replace('%email%', $email, $body);
  $body = str_replace('%pickup%', $pickup, $body);
  $body = str_replace('%date%', $date, $body);
  $body = str_replace('%time%', $time, $body);
  $body = str_replace('%total_price%', $totalPrice, $body);

  $tr = '';
  for ($i = 0; $i < count($carts); $i++) {
    $title[$i] = $carts[$i]['title'];
    $count[$i] = $carts[$i]['count'];
    $price[$i] = $carts[$i]['count'] * $carts[$i]['price'];
    $tr .="<tr>
        <td>$title[$i]</td>
        <td>$count[$i]</td>
        <td>$price[$i] р.</td>
    </tr>";
  }
  $body = str_replace('%tr%', $tr, $body);

  $mail->Subject = "Оформлен новый заказ";
  $mail->MsgHTML($body);
  $mail->send();
  $message = 'order-true';
} else {
  $message = $link->error;
}
$response = [
  'userId' => $userId,
  'message' => $message,
  'orderNumber' => $orders__number,
  'url' => $url ?? '',
];
header('Content-type: application/json');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
