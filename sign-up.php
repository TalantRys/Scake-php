<?php
session_start();
require 'vendor/components/connect.php';?>
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
    <main class="sign-up">
        <section class="sign-up__section about-contacts">
          <div class="about-contacts__container container">
            <div class="about-contacts__image"></div>
            <div class="about-contacts__block">
              <form id="form" class="sign-up__form form" method="post" action="#">
                <h1 class="sign-up__title title">Регистрация</h1>
                <div class="sign-up-form__inputs form__inputs">
                  <label class="sign-up-form__label form__label" for="login">
                    <input class="sign-up-form__input form__input _required" id="login" type="text" name="login" placeholder="Логин">
                    <span class="input__error"><!--Ошибка--></span>
                  </label>
                  <label class="sign-up-form__label form__label" for="email">
                    <input class="sign-up-form__input form__input _required" id="email" type="email" name="email" placeholder="Email">
                    <span class="input__error"><!--Ошибка--></span>
                  </label>
                  <label class="sign-up-form__label form__label" for="password">
                    <input class="sign-up-form__input form__input _required" id="password" type="password" name="password" placeholder="Пароль">
                    <span class="input__error"><!--Ошибка--></span>
                  </label>
                  <label class="sign-up-form__label form__label" for="passwordConfirm">
                    <input class="sign-up-form__input form__input _required" id="passwordConfirm" type="password" name="passwordConfirm" placeholder="Повторите пароль">
                    <span class="input__error"><!--Ошибка--></span>
                  </label>
                </div>
                <div class="contact-us__bottom">
                  <input class="sign-up-form__submit form__submit form__input" type="submit" value="Зарегистрироваться" name="signUp">
                  <p class="sign-in__link">Вы были зарегистрированы? <a href="sign-in.php">Войти</a></p>
                  <span class="input__error input__error_bottom"><!--Ошибка--></span>
                </div>
              </form>
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