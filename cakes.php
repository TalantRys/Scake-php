<<<<<<< HEAD
=======
<?php
session_start();
require 'vendor/components/connect.php' ?>
>>>>>>> c56ec5f (форма обратной связи готова, реализована валидация и отправка на письма почту)
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
        <main class="cakes">
            <div class="cakes__products">
                <h2 class="cakes__title title">Торты</h2>
                <div id="cakes__nav" class="cakes__nav">
                    <span class="cakes-nav__line"></span>
                    <ul>
                        <li>
                            <button href="#" data-filter="Популярное" class="cakes-nav__button cakes-nav__button_selected">
                                Популярное
                            </button>
                        </li>
                        <li>
                            <button href="#" data-filter="Новинки" class="cakes-nav__button">
                                Новинки
                            </button>
                        </li>
                        <li>
                            <button href="#" data-filter="Свадебные" class="cakes-nav__button">
                                Свадебные
                            </button>
                        </li>
                        <li>
                            <button href="#" data-filter="Праздничные" class="cakes-nav__button">
                                Праздничные
                            </button>
                        </li>
                        <li>
                            <button href="#" data-filter="Детям" class="cakes-nav__button">
                                Детям
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="cakes__container container">
                    <div class="products__cards" id="cakes-cards">
                        <!-- ТОВАРЫ ИЗ JSON -->
                    </div>
                    <div id="popup" class="popup products-popup">
                        <!-- POPUP ДЛЯ ТОВАРОВ ИЗ JSON -->
                    </div>
                </div>
            </div>
        </main>
        <? include "vendor/components/footer.php" ?>
    </div>
    <script src="libs/jquery/dist/jquery.min.js"></script>
    <script src="js/line.js"></script>
    <script src="js/popup.js"></script>
    <script src="js/products.js"></script>
    <script src="js/script.js"></script>
</body>

</html>