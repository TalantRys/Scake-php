$(function () {
  loadItems()
  // --------------------------ФИЛЬТР
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

// --------------------------ТОВАРЫ
function loadItems() {
  $.getJSON('vendor/action/cakes.php', function (data) {
    $('#cakes-cards').html(loadCakes(data));
    $('#index-cards').html(loadCakes(data, 6));
    btnCheck()
  })
}

// --------------------------ТОВАРЫ
function loadCakes(data, num = Object.keys(data).length) {
  const cakesLength = (num > Object.keys(data).length) ? Object.keys(data).length : num;
  let out = '';
  for (let i = 1; i <= cakesLength; i++) {
    out += `
    <a data-num="${data[i].id}" data-category="${data[i].category}" class="products__card card">
      <div class="card__image image">
        <img src="${data[i].image}" alt="${data[i].name}">
      </div>
      <h3 class="card__title title">${data[i].name}</h3>
      <p class="card__desc">${data[i].description}</p>
      <div class="card__bottom">
        <p class="card__price"><span>${data[i].price}</span> р.</p>
        <button id="add-card" class="card__buy"></button>
      </div>
    </a>`
  }
  return out;
}



