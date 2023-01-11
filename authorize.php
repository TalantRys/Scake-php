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
    <main class="authorize">
      <div class="authorize__container container">
        <section class="authorize__section">
          <h1 class="authorize__title title">Авторизация</h1>
          <form class="authorize__form form" method="post" action="vendor/action/signIn.php">
            <label class="authorize-form__label form__label" for="form-login">Введите логин
              <input class="authorize-form__input form__input" id="form-login" type="text" name="login">
            </label>
            <label class="authorize-form__label form__label" for="form-password">Введите пароль
              <input class="authorize-form__input form__input" id="form-password" type="password" name="password">
            </label>
            <input class="authorize-form__submit form__submit" type="submit" value="Войти" name="signIn">
            <p class="authorize__link">Нет аккаунта? <a href="register.php">Зарегистрироваться</a></p>
            <?= $_SESSION['error']['logPass'];
            unset($_SESSION['error']); ?>
          </form>
        </section>
      </div>
    </main>
    <? include "vendor/components/footer.php" ?>
  </div>
</body>

</html>