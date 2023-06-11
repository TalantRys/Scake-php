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
    <main class="contact-us">
      <section class="contact-us__questions">
        <div class="contact-us__container container">
          <div class="contact-us__image image">
            <img src="assets/images/contact-form.jpg" alt="contact-form.jpg">
          </div>
          <h2 class="contact-us__title title">У вас возникли вопросы?</h2>
          <h3 class="contact-us__subtitle subtitle">
            Вы можете заполнить форму обратной связи <br>
            и мы ответим вам как можно быстрее.
          </h3>
          <div class="contact-us__fields">
            <form id="form" class="contact-us__form form" action="#" method="post">
              <div class="contact-us__inputs form__inputs">
                <label for="input_text">
                  <input class="contact-us__input form__input _required" id="input_text" type="text" name="name" placeholder="Ваше имя">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
                <label for="input_email">
                  <input class="contact-us__input form__input _required" id="input_email" type="text" name="email" placeholder="Ваш email">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
                <label for="input_tel">
                  <input class="contact-us__input form__input _required" id="input_tel" type="tel" name="number" maxlength="18" placeholder="Ваш номер телефона">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
              </div>
              <label for="input_message">
                <textarea id="input_message" name="message" placeholder="Ваше сообщение" class="contact-us__input contact-us__input_message form__input _required"></textarea>
                <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
              </label>
              <div class="contact-us__bottom">
                <input class="contact-us__input form__submit form__input" type="submit" name="submit" placeholder="Отправить" value="Отправить">
                <p>Мы отвечаем через 1-2 дня. Спасибо за ожидание!</p>
              </div>
            </form>
          </div>
        </div>
      </section>
      <section class="contact-us__contacts">
        <div class="contacts__container container">
          <div class="contacts__block">
            <h2 class="contacts__title title">Scake</h2>
            <h2 class="contacts__title title">Контакты</h2>
            <a href="tel:+73812999999" class="contacts__link">+7-3812-99-99-99</a>
            <a href="mailto:scake@mail.ru" class="contacts__link">scake@mail.ru</a>
            <h2 class="contacts__title title">Адрес</h2>
            <a href="https://goo.gl/maps/wAKR8CVkWjopCtsz8" target="_blank" class="contacts__link">
              г. Омск,<br>ул. просп. Карла Маркса, 10
            </a>
          </div>
          <iframe class="contact-us__map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2289.9827929926805!2d73.37730933541727!3d54.97340091750835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43aafdfd83a3a4e9%3A0xd1a0baeed4b93bdc!2z0J_RgNC-0LLQuNCw0L3Rgg!5e0!3m2!1sru!2sru!4v1657441368918!5m2!1sru!2sru" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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