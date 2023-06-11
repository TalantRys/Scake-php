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
    <main>
      <div class="main__slider slider">
        <div class="slider__container container">
          <div class="slider__slide">
            <div class="slider__image image">
              <img class="active" src="assets/images/slider/slider-pic-1.jpg" alt="slider-pic-1.jpg">
              <img src="assets/images/slider/slider-pic-2.jpg" alt="slider-pic-2.jpg">
              <img src="assets/images/slider/slider-pic-3.jpg" alt="slider-pic-3.jpg">
            </div>
            <div class="slider__body">
              <div class="slider__text active">
                <h2 class="slider__title title">День рождения</h2>
                <p class="slider__subtitle">Предлагаем вам праздничные торты</p>
                <a href="cakes.php" class="slider__button button">Перейти<span class="slider__icon icon"></span></a>
              </div>
              <div class="slider__text">
                <h2 class="slider__title title">Lorem, ipsum.</h2>
                <p class="slider__subtitle">Lorem ipsum, dolor sit amet adipisicing elit. Blanditiis,
                  dolores?</p>
                <a href="cakes.php" class="slider__button button">Перейти<span class="slider__icon icon"></span></a>
              </div>
              <div class="slider__text">
                <h2 class="slider__title title">Lorem, ipsum.</h2>
                <p class="slider__subtitle">Lorem ipsum, dolor sit amet adipisicing elit. Blanditiis,
                  dolores?</p>
                <a href="cakes.php" class="slider__button button">Перейти<span class="slider__icon icon"></span></a>
              </div>
              <div class="slider__controls">
                <button onclick="prevSlide();" class="slider__arrow slider__arrow_left"></button>

                <span class="slider__dots active"></span>
                <span class="slider__dots"></span>
                <span class="slider__dots"></span>

                <button onclick="nextSlide();" class="slider__arrow slider__arrow_right"></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="main__products products">
        <div class="products__container container">
          <h2 class="products__title title">Популярные товары</h2>
          <div class="products__cards" id="index-cards">
            <!-- ТОВАРЫ ИЗ JSON -->
          </div>
          <a href="cakes.php" class="products__link">Все товары <img src="assets/images/icons/long-arrow-right.svg" alt="long-arrow-right"></a>
        </div>
        <div id="popup" class="popup products-popup scrollbar">
          <!-- POPUP ДЛЯ ТОВАРОВ ИЗ JSON -->
        </div>
      </section>
      <section class="main__about about">
        <div class="about__container container">
          <img src="assets/images/main-man.jpg" class="about__image" alt="images/main-man.jpg">
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
            <a href="about.php" class="button button__link about__link">Узнать больше</a>
          </div>
        </div>
      </section>
      <section class="main__delivery delivery">
        <div class="delivery__container container">
          <h2 class="delivery__title title">Наши хорошие друзья</h2>
          <h3 class="delivery__subtitle subtitle">Они помогают нам в трудную минуту</h3>
          <div class="delivery__logos">
            <span class="delivery__logo"><img class="logo__delivery-1" src="assets/images/main-delivery-1.png" alt="assets/images/main-delivery-1.png"></span>
            <span class="delivery__logo"><img class="logo__delivery-2" src="assets/images/main-delivery-2.png" alt="assets/images/main-delivery-2.png"></span>
            <span class="delivery__logo"><img class="logo__delivery-3" src="assets/images/main-delivery-3.png" alt="assets/images/main-delivery-3.png"></span>
            <span class="delivery__logo"><img class="logo__delivery-4" src="assets/images/main-delivery-4.png" alt="assets/images/main-delivery-4.png"></span>
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
  <script src="assets/js/slider.js"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/shop.js"></script>
</body>

</html>