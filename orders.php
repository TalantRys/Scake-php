<?php
session_start();
require 'vendor/components/connect.php';
if (!isset($_SESSION['user']['id'])) {
  header('location: index.php');
}
$user_id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'vendor/components/head-link.php' ?>
</head>

<body>
  <div class="wrapper">
    <?php include "vendor/components/header.php" ?>
    <main class="orders">
      <section class="orders__products">
        <h2 class="orders__title title">Ваши заказы</h2>
        <div class="orders__container container">
          <div class="products__cards" id="orders-cards">
            <?php $sql = $link->query("SELECT * FROM `orders` WHERE `user_id`= '$user_id'");
            while ($order = $sql->fetch_assoc()) {
              echo $order['orders__number'].PHP_EOL;
              PHP_EOL;
              echo $order['orders__date'].PHP_EOL;
              PHP_EOL;
              echo $order['total_price'].PHP_EOL;
              PHP_EOL;
            }
            ?>
          </div>
        </div>
      </section>
    </main>
    <?php include "vendor/components/footer.php" ?>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
  <script src="assets/js/datetime-input.js"></script>
  <script src="assets/js/phone-mask.js"></script>
  <script src="assets/js/form.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/products.js"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/shop.js"></script>
</body>

</html>