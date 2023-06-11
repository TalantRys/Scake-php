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
                <p>Всего: <span class="shop-panel__sum">0</span> р.</p>
                <button class="shop-panel__bottom-button button">Оформить заказ</button>
            </div>
        </div>
    </div>
</div>
<div id="order" class="popup products-popup order-popup scrollbar ">
    <div class="popup__wrapper products-popup__wrapper order-popup__wrapper ">
        <span class="products-popup__close icon"></span>
        <div class="order-popup__body">
            <h2 class="order__title title">Оформление <br>заказа</h2>
            <div class="order__carts">
                <h3 class="order__subtitle subtitle">Список товаров</h3>
                <div class="order__carts-row scrollbar"><!--ТОРТЫ--></div>
            </div>
            <form id="form" class="order__form form" method="post">
                <h2 class="order__subtitle subtitle">Способ получения</h2>
                <div class="order-form__inputs form__inputs">
                    <input type="radio" name="radio" id="radio-1" value="Доставка" checked>
                    <input type="radio" name="radio" id="radio-2" value="Самовывоз">
                    <label for="radio-1" class="order-form__radio form__radio form__input radio-1">
                        <div class="dot"></div>
                        <span class="form__radio-name">Доставка</span>
                    </label>
                    <label for="radio-2" class="order-form__radio form__radio form__input radio-2">
                        <div class="dot"></div>
                        <span class="form__radio-name">Самовывоз</span>
                    </label>
                    <label class="order-form__label form__label" for="select">
                        <select class="order-form__select form__select form__input _required" name="select" id="select">
                            <option selected>Выберите ваш район</option>
                            <!-- РАЙОНЫ -->
                        </select>
                        <span class="input__error"></span>
                    </label>
                    <p class="order-form__text order__subtitle subtitle">
                        +<span class="order-form__select-price">0</span> р. (с <span class="order-form__select-type">одноярус</span>.)
                    </p>
                    <p class="order-form__address order-form__text order__subtitle subtitle">Наш адрес: г. Омск, ул. просп. Карла Маркса, 10</p>
                    <label class="order-form__label form__label" for="date">
                        <input class="order-form__input form__input _required" id="date" type="text" name="date" placeholder="На какое число">
                        <span class="input__error"></span>
                    </label>
                    <label class="order-form__label form__label" for="time">
                        <input class="order-form__input form__input _required" id="time" type="text" name="time" placeholder="На какое время">
                        <span class="input__error"></span>
                    </label>
                    <label class="order-form__label form__label" for="address">
                        <input class="order-form__input form__input _required" id="address" type="text" name="address" placeholder="Адрес доставки">
                        <span class="input__error"></span>
                    </label>
                    <label class="order-form__label form__label" for="number">
                        <input class="order-form__input form__input _required" id="number" type="tel" name="number" maxlength="18" placeholder="Ваш номер телефона">
                        <span class="input__error"></span>
                    </label>
                    <p class="order-form__total-price order__subtitle subtitle">Итого: <span class="order-form__sum">0</span> р.</p>
                    <input class="order-form__submit form__submit form__input" id="submitBtn" type="submit" name="orderSubmit" value="Перейти к оплате">
                </div>
            </form>
        </div>
    </div>
</div>