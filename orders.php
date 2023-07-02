<?php
session_start();
require 'vendor/components/connect.php';
if (!isset($_SESSION['user']['id']) || !isset($_GET['id'])) {
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
          <?php $orders = $link->query(
            "SELECT `orders`.*, `deliveries`.`delivery`,
               GROUP_CONCAT(`orders`.`cake_id` SEPARATOR ', ') AS `cakes`,
               GROUP_CONCAT(`orders`.`cake_count` SEPARATOR ', ') AS `cakes_count`
              FROM `orders` 
                LEFT JOIN `deliveries` ON `orders`.`delivery_id` = `deliveries`.`id`
                WHERE `user_id`= '$user_id'
                GROUP BY `orders`.`orders__number`
                ORDER BY `orders`.`id` DESC"
          );
          if ($orders->num_rows == 0) {
            echo '<div class="orders__message">
              <h2 class="title">Похоже у вас нет ни одного заказа</h2>
              <p class="subtitle">Перейдите на страницу "Торты", чтобы выбрать понравившиеся товары и оформить новый заказ</p>
              <a href="cakes.php" class="products__link">Торты <img src="assets/images/icons/long-arrow-right.svg" alt="long-arrow-right"></a>
            </div>';
          } else { ?>
            <div class="orders__list">
              <?php while ($order = $orders->fetch_assoc()) { ?>
                <details class="order__details">
                  <summary>
                    <div class="order-header">
                      <h3 class="order-header__title">Заказ от <?= $order['orders__date'] ?></h3>
                      <h4 class="order-header__number"><?= $order['orders__number'] ?></h4>
                    </div>
                  </summary>
                  <div class="order__details-wrapper">
                    <div class="order-info">
                      <div class="order-info_left">
                        <h4 class="order-info__type">Тип доставки: <?= $order['pickup'] ?></h4>
                        <?php if ($order['pickup'] == 'Доставка') { ?>
                          <h4 class="order-info__address">Адрес: <?= $order['delivery'] ?> район, <?= $order['address'] ?></h4>
                        <?php } ?>
                        <h4 class="order-info__date">Дата доставки: <?= $order['date'] ?> в <?= $order['time'] ?></h4>
                      </div>
                      <h4 class="order-info__sum"><?= $order['total_price'] ?> р.</h4>
                    </div>
                    <div class="order__carts-row scrollbar">
                      <?php $cakes = explode(', ', $order['cakes']);
                      $cakes_count = explode(', ', $order['cakes_count']);
                      foreach ($cakes as $i => $cake) {
                        $count = $cakes_count[$i];
                        $carts = $link->query("SELECT `cakes`.*, `types`.`name` AS `cake_type`
                        FROM `cakes` 
                          LEFT JOIN `types` ON `cakes`.`type_id` = `types`.`id`
                        WHERE `cakes`.`id` = {$cake}");

                        while ($cart = $carts->fetch_assoc()) { ?>
                          <div class="order__cart">
                            <div class="order__cart-img image">
                              <img src="<?= $cart['image'] ?>" alt="<?= $cart['name'] ?>">
                            </div>
                            <h4 class="order__cart-title"><?= $cart['name'] ?></h4>
                            <p class="order__cart-type"><?= $cart['cake_type'] ?></p>
                            <div class="order__cart-bottom">
                              <p><span class="order__cart-price"><?= $count * $cart['price'] ?></span> р.</p>
                              <p><span class="order__cart-count"><?= $count ?></span> шт.</p>
                            </div>
                          </div>
                      <?php }
                      } ?>
                    </div>
                  </div>
                </details>
              <?php } ?>
            </div>
          <?php } ?>
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