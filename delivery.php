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
        <main class="delivery">
            <section class="delivery__delivery">
                <div class="delivery__container container">
                    <h2 class="delivery__title title">Доставка</h2>
                    <h3 class="delivery__subtitle subtitle">Как проходит доставка вашего торта?</h3>
                    <div class="delivery__block">
                        <div class="delivery__item">
                            <div class="delivery__icons">
                                <img src="assets/images/icons/delivery/delivery-1.svg" alt="delivery-1.svg">
                            </div>
                            <div class="delivery__info">
                                <h3 class="delivery-info__title title">Безопасный грузовик</h3>
                                <p class="delivery-info__text">Мы загружаем ваши хорошо упакованные торты в наши
                                    вместительные грузовики. Во время перевозок ни один торт не пострадал!</p>
                            </div>
                        </div>
                        <div class="delivery__item">
                            <div class="delivery__icons">
                                <img src="assets/images/icons/delivery/delivery-2.svg" alt="delivery-2.svg">
                            </div>
                            <div class="delivery__info">
                                <h3 class="delivery-info__title title">Доставляем по всему городу</h3>
                                <p class="delivery-info__text">Наши грузовики мчатся к вам как можно дальше и как можно
                                    быстрее. Просто подождите немного :)</p>
                            </div>
                        </div>
                        <div class="delivery__item">
                            <div class="delivery__icons">
                                <img src="assets/images/icons/delivery/delivery-3.svg" alt="delivery-3.svg">
                            </div>
                            <div class="delivery__info">
                                <h3 class="delivery-info__title title">Ваш торт прямо у дома</h3>
                                <p class="delivery-info__text">Наш курьер привезёт торт к вам в руки, и вы убедитесь,
                                    что он цел и невредим, а также какой у него прекрасный вкус!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="delivery__price">
                <div class="delivery__container container">
                    <h2 class="delivery__title title">Стоимость доставки по районам</h2>
                    <div class="delivery__table">
                        <div class="delivery__column">
                            <h2 class="delivery-column__title title">Один ярус</h2>
                            <div class="delivery-column__item delivery__item">
                                <div class="delivery-column__icons delivery__icons">
                                    <h3 class="delivery-column__title title">99 руб</h2>
                                </div>
                                <div class="delivery-column__info">
                                    <h3 class="delivery-column__title delivery-info__title title">Центральный</h3>
                                </div>
                            </div>
                            <div class="delivery-column__item delivery__item">
                                <div class="delivery-column__icons delivery__icons">
                                    <h3 class="delivery-column__title title">199 руб</h2>
                                </div>
                                <div class="delivery-column__info">
                                    <h3 class="delivery-column__title delivery-info__title title">Кировский, Октябрьский</h3>
                                </div>
                            </div>
                            <div class="delivery-column__item delivery__item">
                                <div class="delivery-column__icons delivery__icons">
                                    <h3 class="delivery-column__title title">250 руб</h2>
                                </div>
                                <div class="delivery-column__info">
                                    <h3 class="delivery-column__title delivery-info__title title">Ленинский, Советский</h3>
                                </div>
                            </div>
                        </div>
                        <div class="delivery__column">
                            <h2 class="delivery-column__title title">Два яруса</h2>
                            <div class="delivery-column__item delivery__item">
                                <div class="delivery-column__icons delivery__icons">
                                    <h3 class="delivery-column__title title">199 руб</h2>
                                </div>
                                <div class="delivery-column__info">
                                    <h3 class="delivery-column__title delivery-info__title title">Центральный</h3>
                                </div>
                            </div>
                            <div class="delivery-column__item delivery__item">
                                <div class="delivery-column__icons delivery__icons">
                                    <h3 class="delivery-column__title title">250 руб</h2>
                                </div>
                                <div class="delivery-column__info">
                                    <h3 class="delivery-column__title delivery-info__title title">Кировский, Октябрьский</h3>
                                </div>
                            </div>
                            <div class="delivery-column__item delivery__item">
                                <div class="delivery-column__icons delivery__icons">
                                    <h3 class="delivery-column__title title">400 руб</h2>
                                </div>
                                <div class="delivery-column__info">
                                    <h3 class="delivery-column__title delivery-info__title title">Ленинский, Советский</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </main>
        <?php include "vendor/components/footer.php" ?>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/shop.js"></script>
</body>

</html>