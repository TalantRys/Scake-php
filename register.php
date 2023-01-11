<?php
session_start();
require 'vendor/components/connect.php' ?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <? include 'vendor/components/head-link.php' ?>
</head>

<body>
  <div class="wrapper">
    <? include "vendor/components/header.php" ?>
    <main class="register">
      <div class="register__container container">
        <section class="register__section">
          <h1 class="register__title title">Регистрация</h1>
          <form class="register__form form" method="post" action="vendor/action/signUp.php">
            <label class="register-form__label form__label" for="form-login">Логин
              <input class="register-form__input form__input" required id="form-login" type="text" name="login">
            </label>
            <label class="register-form__label form__label" for="form-email">Email
              <input class="register-form__input form__input" required id="form-email" type="email" name="email">
            </label>
            <label class="register-form__label form__label" for="form-password">Пароль
              <input class="register-form__input form__input" required id="form-password" type="password" name="password">
            </label>
            <label class="register-form__label form__label" for="form-passwordConfirm">Повторите пароль
              <input class="register-form__input form__input" id="form-passwordConfirm" type="password" name="passwordConfirm">
            </label>
            <input class="register-form__submit form__submit" type="submit" value="Зарегистрироваться" name="signUp">
            <p class="authorize__link">Вы были зарегистрированы? <a href="authorize.php">Войти</a></p>
            <?= $_SESSION['error']['login'];
            echo $_SESSION['error']['passwordConfirm'];
            unset($_SESSION['error']); ?>
          </form>
        </section>
      </div>
    </main>
    <? include "vendor/components/footer.php" ?>
  </div>
</body>

</html>