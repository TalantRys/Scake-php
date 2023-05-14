<?php include '../components/connect.php';
$cards = $link->query(
  "SELECT `cakes`.*, `categories`.`name` as `cat_name`, `types`.`name` as `type_name`
    FROM `cakes` 
      LEFT JOIN `categories` ON `cakes`.`category_id` = `categories`.`id` 
      LEFT JOIN `types` ON `cakes`.`type_id` = `types`.`id`
    ORDER BY `cakes`.`id` ASC"
);
$result = [];
$i = 1;
while ($card = $cards->fetch_assoc()) {
  $result[$i] = [
    "id" => $card['id'],
    "category" => $card['cat_name'],
    "name" => $card['name'],
    "description" => $card['description'],
    "price" => $card['price'],
    "image" => $card['image'],
    "weight" => $card['weight'],
    "type" => $card['type_name'],
    "calories" => $card['calories'],
    "compound" => $card['compound'],
    "allergens" => $card['allergens'],
  ];
  $i++;
}
header('Content-type: application/json');
echo json_encode($result, JSON_UNESCAPED_UNICODE);
