<header>
    <div class="header__container container">
        <nav class="header__nav">
            <a href="index.php" class="header__logo">Scake</a>
            <ul class="header__list">
                <li><a href="cakes.php" class="header__link">Торты</a></li>
                <li><a href="delivery.php" class="header__link">Доставка</a></li>
                <li><a href="about.php" class="header__link">О нас</a></li>
                <li><a href="contact_us.php" class="header__link">Свяжитесь с нами</a></li>
            </ul>
            <button class="header__burger"></button>
            <ul class="header__buttons">
                <li>
                    <a href="#" class="header__button shop-panel icon">
                        <span class="shop-panel__length"></span>
                        Корзина
                    </a>
                </li>
                <li class="sign-list__wrapper">
                    <a href="sign-in.php" class="header__button header__button_sign icon">Войти</a>
                </li>
            </ul>

        </nav>
    </div>
</header>
<div id="shop-popup" class="popup shop-panel-popup">
    <div class="popup__wrapper shop-panel-popup__wrapper">
        <button class="shop-panel__button button icon"></button>
        <div class="shop-panel__body">
            <div class="shop-panel__orders scrollbar">
                <!-- ТОВАРЫ В КОРЗИНЕ -->
                <h2 class="shop-panel__title title">Корзина пуста</h2>
            </div>
            <div class="shop-panel__bottom">
                <form method="post">
                    <p>Всего: <span class="shop-panel__sum">0</span> р.</p>
                    <input class="shop-panel__bottom-button button" type="submit" value="Оформить заказ">
                </form>
            </div>
        </div>
    </div>
</div>