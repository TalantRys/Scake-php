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
    <main class="about-page">
      <section class="main__about about">
        <div class="about__container container">
          <div class="about__block">
            <h2 class="about__title title">О нас</h2>
            <p class="about__text">
              Taciti consequat auctor quis, etiam ipsum tempus, accumsan habitant
              ullamcorper aliquam hendrerit sollicitudin placerat condimentum dapibus a senectus curae
              ipsum
              velit phasellus rhoncus, elementum tempor duis taciti volutpat, habitant dictum consectetur
              elementum vehicula, platea orci per risus nostra torquent fringilla, ut scelerisque ut
              pharetra
              class, aenean sapien cl
            </p>
            <p class="about__text">
              Taciti consequat auctor quis, etiam ipsum tempus, accumsan habitant
              ullamcorper aliquam hendrerit sollicitudin placerat condimentum dapibus a senectus curae
              ipsum
              velit phasellus rhoncus, elementum tempor duis taciti volutpat, habitant dictum consectetur
              elementum vehicula, platea orci per risus nostra torquent fringilla, ut scelerisque ut
              pharetra
              class, aenean sapien cl
            </p>
          </div>
          <img src="assets/images/about-man-1.jpg" class="about__image about__image-one" alt="images/main-man.jpg">
        </div>
      </section>
      <section class="main__about about">
        <div class="about__container container">
          <img src="assets/images/about-man-2.jpg" class="about__image" alt="images/main-man.jpg">
          <div class="about__block">
            <h2 class="about__title title">О нас</h2>
            <p class="about__text">
              Taciti consequat auctor quis, etiam ipsum tempus, accumsan habitant
              ullamcorper aliquam hendrerit sollicitudin placerat condimentum dapibus a senectus curae
              ipsum
              velit phasellus rhoncus, elementum tempor duis taciti volutpat, habitant dictum consectetur
              elementum vehicula, platea orci per risus nostra torquent fringilla, ut scelerisque ut
              pharetra
              class, aenean sapien cl
            </p>
            <p class="about__text">
              Taciti consequat auctor quis, etiam ipsum tempus, accumsan habitant
              ullamcorper aliquam hendrerit sollicitudin placerat condimentum dapibus a senectus curae
              ipsum
              velit phasellus rhoncus, elementum tempor duis taciti volutpat, habitant dictum consectetur
              elementum vehicula, platea orci per risus nostra torquent fringilla, ut scelerisque ut
              pharetra
              class, aenean sapien cl
            </p>
          </div>
        </div>
      </section>
      <section class="about-contacts">
        <div class="about-contacts__container container">
          <div class="about-contacts__image">
            <img src="assets/images/about-cake.jpg" alt="about-cake.jpg">
          </div>
          <div class="about-contacts__block">
            <h2 class="about-contacts__title title">Scake</h2>
            <h2 class="about-contacts__title title">Контакты</h2>
            <a href="tel:+73812999999" class="about-contacts__link">+7-3812-99-99-99</a>
            <a href="mailto:scake@mail.ru" class="about-contacts__link">scake@mail.ru</a>
            <h2 class="about-contacts__title title">Адрес</h2>
            <a href="https://goo.gl/maps/wAKR8CVkWjopCtsz8" target="_blank" class="about-contacts__link">
              г. Омск,<br>ул. просп. Карла Маркса, 10
            </a>
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
  <script src="assets/js/script.js"></script>
  <script src="assets/js/shop.js"></script>
</body>

</html>