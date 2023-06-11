<?php include '../components/connect.php';
session_start();
$userId = $_SESSION['user']['id'];
$notAuthCarts = json_decode($_POST['notAuthCarts'], true);

for ($i = 0; $i < count($notAuthCarts); $i++) {
  $id[$i] = $notAuthCarts[$i]['id'];
  $count[$i] = $notAuthCarts[$i]['count'];
  $price[$i] = (int)$notAuthCarts[$i]['count'] * (int)$notAuthCarts[$i]['price'];
  $cartsInBase = $link->query("SELECT * FROM `shop-cart` WHERE `user_id` = '$userId' AND `cake_id` = '$id[$i]'") or die($link->error);
  if ($cartsInBase->num_rows == 0) {
    $sql = $link->query(
      "INSERT INTO `shop-cart`(`cake_id`, `user_id`, `count`, `counted_price`) 
        VALUES ('$id[$i]','$userId','$count[$i]','$price[$i]')"
    );
    if (!$sql) $err = 'Не удалось выполнить INSERT ' . $link->error;
  } else {
    $sql = $link->query(
      "UPDATE `shop-cart` SET `count`='$count[$i]',`counted_price`='$price[$i]'
        WHERE `user_id` = '$userId' and `cake_id` = '$id[$i]'"
    );
    if (!$sql) $err = 'Не удалось выполнить UPDATE ' . $link->error;
  }
}

$message = "Объединено $i товаров";
$response = ['message' => $message ?? '', 'err' => $err ?? 'Нет ошибок'];
echo json_encode($response, JSON_UNESCAPED_UNICODE);