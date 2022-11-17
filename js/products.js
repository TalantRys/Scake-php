$(function () {
    loadItems();
    loadPopup();
});
function loadItems() {
    $.getJSON('database/products.json', function (data) {
        console.log(data);
        function loadCakes(num) {
            let out = '';
            if (!num) {
                for (let key in data) {
                    out += '<a data-num="' + data[key].id + '" data-category="' + data[key]['category'] + '" class="products__card card">';
                    out += '<div class="card__image image">';
                    out += '<img src="' + data[key].image + '" alt="' + data[key]['image'] + '">';
                    out += '</div>';
                    out += '<h3 class="card__title title">' + data[key]['name'] + '</h3>';
                    out += '<p class="card__desc">' + data[key]['description'] + '</p>';
                    out += '<div class="card__bottom">';
                    out += '<p class="card__price">' + data[key].price + ' р.</p>';
                    out += '<button class="card__buy">';
                    out += '<img src="images/icons/shopping-cart-add.svg" alt="shopping-cart-add">';
                    out += '</button>';
                    out += '</div>';
                    out += '</a>';
                }
            } else {
                for (let i = 1; i <= num; i++) {
                    out += '<a data-num="' + data[i].id + '" data-category="' + data[i]['category'] + '" class="products__card card">';
                    out += '<div class="card__image image">';
                    out += '<img src="' + data[i].image + '" alt="' + data[i]['image'] + '">';
                    out += '</div>';
                    out += '<h3 class="card__title title">' + data[i]['name'] + '</h3>';
                    out += '<p class="card__desc">' + data[i]['description'] + '</p>';
                    out += '<div class="card__bottom">';
                    out += '<p class="card__price">' + data[i].price + ' р.</p>';
                    out += '<button class="card__buy">';
                    out += '<img src="images/icons/shopping-cart-add.svg" alt="shopping-cart-add">';
                    out += '</button>';
                    out += '</div>';
                    out += '</a>';

                }
            }
            return out;
        }
        $('#cakes-cards').html(loadCakes());
        $('#index-cards').html(loadCakes(6));
    })
}

function loadPopup() {
    // --------------------------POPUP
    $.getJSON('database/products.json', function (data) {
        let out = '';
        for (let key in data) {
            out += '<div data-target="' + data[key].id + '" class="popup__wrapper products-popup__wrapper">';
            out += '<span class="products-popup__close icon"></span>';
            out += '<div class="product-popup__body">';
            out += '<div class="product-popup__img image">';
            out += '<img src="' + data[key].image + '" alt="' + data[key]['image'] + '">';
            out += '</div>';
            out += '<div class="product-popup__text">';
            out += '<h2 class="product-popup__title title">' + data[key]['name'] + '</h2>';
            out += '<div class="product-popup__description scrollbar">';
            out += '<p>Вес: ' + data[key]['weight'] + ' кг</p>';
            out += '<p>Тип: ' + data[key]['type'] + '</p>';
            out += '<p>Калорийность: ' + data[key]['calories'] + ' ккал./100 гр.</p>';
            out += '<p>Состав: <br>' + data[key]['compound'] + '</p>';
            out += '<p>Аллергены: ' + data[key]['allergens'] + '</p>';
            out += '</div>';
            out += '<div class="product-popup__bottom">';
            out += '<p class="product-popup__price">Цена: ' + data[key].price + ' р.</p>';
            out += '<button class="product-popup__button button">В корзину<span class="product-popup__icon icon"></span></button>';
            out += '</div>';
            out += '</div>';
            out += '</div>';
            out += '</div>';
        }
        $('#popup').html(out);
    })
}
$(function () {

    let filter = $("[data-filter]");

    filter.on("click", function (event) {
        event.preventDefault();

        let cat = $(this).data('filter');

        if (cat == 'Популярное') {
            $("[data-category]").fadeIn();
        } else {
            $("[data-category]").each(function () {
                let workCat = $(this).data('category');

                if (workCat != cat) {
                    $(this).fadeOut();
                } else {
                    $(this).fadeIn();
                }
            });
        }
    })
});
