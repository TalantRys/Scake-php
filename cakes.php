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
    <main class="cakes">
      <section class="cakes__products">
        <h2 class="cakes__title title">Торты</h2>
        <nav id="cakes__nav" class="cakes__nav">
          <span class="cakes-nav__line"></span>
          <ul>
            <li><button data-filter="Популярное" class="cakes-nav__button cakes-nav__button_selected">Популярное</button></li>
            <li><button data-filter="Новинки" class="cakes-nav__button">Новинки</button></li>
            <li><button data-filter="Свадебные" class="cakes-nav__button">Свадебные</button></li>
            <li><button data-filter="Праздничные" class="cakes-nav__button">Праздничные</button></li>
            <li><button data-filter="Детям" class="cakes-nav__button">Детям</button></li>
          </ul>
        </nav>
        <div class="cakes__container container">
          <div class="products__cards" id="cakes-cards">
            <!-- ТОВАРЫ ИЗ JSON -->
          </div>
          <div id="popup" class="popup products-popup">
            <!-- POPUP ДЛЯ ТОВАРОВ ИЗ JSON -->
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