<?php include_once '../components/connect.php';

$type_id = $_GET['type_id'];
$select_id = isset($_GET['select_id']) ? "and `id` = {$_GET['select_id']}" : '';
$deliveries = $link->query("SELECT * FROM `deliveries` WHERE `type_id`='$type_id' $select_id");

$result = [];
$i = 0;
while ($option = $deliveries->fetch_assoc()) {
  $result[$i] = [
    "id" => $option['id'],
    "delivery" => $option['delivery'],
    "price" => $option['price'],
  ];
  $i++;
}
header('Content-Type: application/json');
echo json_encode($result, JSON_UNESCAPED_UNICODE);