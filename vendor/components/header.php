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
                    <a href="#" class="header__button shop-panel"><img src="images/icons/shopping-cart.svg" alt="shopping cart">
                        <p>Корзина</p>
                    </a>
                </li>
                <li>
                    <? if (!$_SESSION['user']) { ?>
                        <a href="authorize.php" class="header__button"><img src="images/icons/user.svg" alt="user">
                            <p>Войти</p>
                        </a>
                    <? } elseif ($_SESSION['user']) { ?>
                        <a href="vendor/action/logout.php" class="header__button"><img src="images/icons/user.svg" alt="user">
                            <p>Выйти</p>
                        </a>
                    <? } ?>
                </li>
            </ul>
        </nav>
    </div>
</header>
<div id="shop-popup" class="popup shop-panel-popup">
    <div class="popup__wrapper shop-panel-popup__wrapper">
        <button class="shop-panel__button button"><span class="shop-panel__icon icon"></span></button>
        <div class="shop-panel__body">
            <div class="shop-panel__orders scrollbar">
                <div class="shop-panel__order">
                    <div class="shop-panel__order-img image">
                        <img src="images/cakes/cake-1.jpg" alt="cake">
                    </div>
                    <div class="shop-panel__order-form">
                        <form action="" method="post">
                            <h6 class="shop-panel__order-title title">Торт</h6>
                            <p class="shop-panel__order-price">1000 p.</p>
                            <div class="shop-panel__order-count">
                                <input type="button" value="-">
                                <span>1</span>
                                <input type="button" value="+">
                            </div>
                            <input class="shop-panel__button-remove" type="button" value="Убрать">
                        </form>
                    </div>
                </div>
                <div class="shop-panel__order">
                    <div class="shop-panel__order-img image">
                        <img src="images/cakes/cake-3.jpg" alt="cake">
                    </div>
                    <div class="shop-panel__order-form">
                        <form action="" method="post">
                            <h6 class="shop-panel__order-title title">Торт</h6>
                            <p class="shop-panel__order-price">1000 p.</p>
                            <div class="shop-panel__order-count">
                                <input type="button" value="-">
                                <span>1</span>
                                <input type="button" value="+">
                            </div>
                            <input class="shop-panel__button-remove" type="button" value="Убрать">
                        </form>
                    </div>
                </div>
                <div class="shop-panel__order">
                    <div class="shop-panel__order-img image">
                        <img src="images/cakes/cake-2.jpg" alt="cake">
                    </div>
                    <div class="shop-panel__order-form">
                        <form action="" method="post">
                            <h6 class="shop-panel__order-title title">Торт</h6>
                            <p class="shop-panel__order-price">1000 p.</p>
                            <div class="shop-panel__order-count">
                                <input type="button" value="-">
                                <span>1</span>
                                <input type="button" value="+">
                            </div>
                            <input class="shop-panel__button-remove" type="button" value="Убрать">
                        </form>
                    </div>
                </div>
                <div class="shop-panel__order">
                    <div class="shop-panel__order-img image">
                        <img src="images/cakes/cake-1.jpg" alt="cake">
                    </div>
                    <div class="shop-panel__order-form">
                        <form action="" method="post">
                            <h6 class="shop-panel__order-title title">Торт</h6>
                            <p class="shop-panel__order-price">1000 p.</p>
                            <div class="shop-panel__order-count">
                                <input type="button" value="-">
                                <span>1</span>
                                <input type="button" value="+">
                            </div>
                            <input class="shop-panel__button-remove" type="button" value="Убрать">
                        </form>
                    </div>
                </div>
                <div class="shop-panel__order">
                    <div class="shop-panel__order-img image">
                        <img src="images/cakes/cake-3.jpg" alt="cake">
                    </div>
                    <div class="shop-panel__order-form">
                        <form action="" method="post">
                            <h6 class="shop-panel__order-title title">Торт</h6>
                            <p class="shop-panel__order-price">1000 p.</p>
                            <div class="shop-panel__order-count">
                                <input type="button" value="-">
                                <span>1</span>
                                <input type="button" value="+">
                            </div>
                            <input class="shop-panel__button-remove" type="button" value="Убрать">
                        </form>
                    </div>
                </div>
                <div class="shop-panel__order">
                    <div class="shop-panel__order-img image">
                        <img src="images/cakes/cake-2.jpg" alt="cake">
                    </div>
                    <div class="shop-panel__order-form">
                        <form action="" method="post">
                            <h6 class="shop-panel__order-title title">Торт</h6>
                            <p class="shop-panel__order-price">1000 p.</p>
                            <div class="shop-panel__order-count">
                                <input type="button" value="-">
                                <span>1</span>
                                <input type="button" value="+">
                            </div>
                            <input class="shop-panel__button-remove" type="button" value="Убрать">
                        </form>
                    </div>
                </div>
            </div>
            <div class="shop-panel__bottom">
                <form action="" method="post">
                    <p>Всего: 6000 р.</p>
                    <input class="shop-panel__bottom-button button" type="submit" value="Оформить заказ">
                </form>
            </div>
        </div>
    </div>
</div>