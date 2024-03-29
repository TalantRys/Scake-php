<?php include '../components/connect.php';
session_start();
$carts = json_decode($_POST['carts'], true);

$userId = $_SESSION['user']['id'];
for ($i = 0; $i < count($carts); $i++) {
  $id[$i] = $carts[$i]['id'];
  $count[$i] = $carts[$i]['count'];
  $price[$i] = (int)$carts[$i]['count'] * (int)$carts[$i]['price'];
  $sql = $link->query("SELECT * FROM `shop-cart` WHERE `user_id` = '$userId' AND `cake_id` = '$id[$i]'");
  if ($sql->num_rows == 0) {
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
$message = "Добавлено $i товаров";
$response = ['message' => $message ?? '', 'err' => $err ?? 'Нет ошибок'];
echo json_encode($response, JSON_UNESCAPED_UNICODE);
