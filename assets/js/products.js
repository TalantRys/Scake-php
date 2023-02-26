$(function () {
  loadItems();
});
function loadItems() {
  $.getJSON('assets/database/products.json', function (data) {
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
          out += '<button id="add-card" class="card__buy">';
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
          out += '<button id="add-card" class="card__buy">';
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

function loadPopup(num) {
  // --------------------------POPUP
  $.getJSON('assets/database/products.json', function (data) {
    let out = '';
    out += '<div data-target="' + data[num].id + '" class="popup__wrapper products-popup__wrapper">';
    out += '<span class="products-popup__close icon"></span>';
    out += '<div class="product-popup__body">';
    out += '<div class="product-popup__img image">';
    out += '<img src="' + data[num].image + '" alt="' + data[num]['image'] + '">';
    out += '</div>';
    out += '<div class="product-popup__text">';
    out += '<h2 class="product-popup__title title">' + data[num]['name'] + '</h2>';
    out += '<div class="product-popup__description scrollbar">';
    out += '<p>Вес: ' + data[num]['weight'] + ' кг</p>';
    out += '<p>Тип: ' + data[num]['type'] + '</p>';
    out += '<p>Калорийность: ' + data[num]['calories'] + ' ккал./100 гр.</p>';
    out += '<p>Состав: <br>' + data[num]['compound'] + '</p>';
    out += '<p>Аллергены: ' + data[num]['allergens'] + '</p>';
    out += '</div>';
    out += '<div class="product-popup__bottom">';
    out += '<p class="product-popup__price">Цена: ' + data[num].price + ' р.</p>';
    out += '<button class="product-popup__button button icon">В корзину</button>';
    out += '</div>';
    out += '</div>';
    out += '</div>';
    out += '</div>';

    $('#popup').html(out);
  })
}
$(function () {
  let filter = $("[data-filter]");

  filter.on("click", function (e) {
    e.preventDefault();

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
