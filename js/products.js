$('document').ready(function () {
    loadItems();
});

function loadItems() {
    $.getJSON('database/products.json', function (data) {
        console.log(data);
        let out = '';
        for (let key in data) {
            out += '<span class="products__card card">';
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
            out += '</span>';
        }
        $('#cards').html(out);
    })
}