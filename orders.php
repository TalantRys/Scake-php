<?php
session_start();
require 'vendor/components/connect.php' ?>
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
            <table>
              <thead>
                <tr>
                  <th>№</th>
                  <th>Название</th>
                  <th>Количество</th>
                  <th>Сумма</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>ав</td>
                  <td>1</td>
                  <td>12 р.</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>ав</td>
                  <td>1</td>
                  <td>12 р.</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </main>
    <?php include "vendor/components/footer.php" ?>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/line.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/products.js"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/shop.js"></script>
</body>

</html>