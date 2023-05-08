// ---------------------POPUP КОРЗИНЫ
const shopBtn = document.querySelector(".shop-panel");
const shopBtnClose = document.querySelector(".shop-panel__button");
const shopPopup = document.querySelector(".shop-panel-popup");
const shopPopupWrapper = document.querySelector(".shop-panel-popup__wrapper");
const body = document.querySelector("body")
// ---------------------------POPUP КАРТОЧЕК ТОВАРА
const modalOverlay = document.querySelector(".products-popup");
let modals
$(document).on("click", ".products__card", (e) => {
  if (e.target.id !== 'add-card') {
    let num = e.currentTarget.getAttribute("data-num");
    loadPopup(num);
    setTimeout(() => {
      const target = document.querySelector(`[data-target="${num}"]`);
      modals = document.querySelectorAll(".products-popup__wrapper");
      modals.forEach((modal) => {
        modal.classList.remove("popup__wrapper_active");
      });
      target.classList.add("popup__wrapper_active");
      modalOverlay.classList.add("popup_active");
      body.classList.add("lock");
      btnCheck()
      modalOverlay.addEventListener("click", (e) => {
        if (e.target == modalOverlay ||
          e.target.classList.contains('products-popup__close')) {

          modalOverlay.classList.remove("popup_active");
          body.classList.remove("lock");
          modals.forEach((modal) => {
            modal.classList.remove("popup__wrapper_active");
          });
          modalOverlay.innerHTML = '';
        }
      });
    }, 100);
  }
});
// ---------------------POPUP КОРЗИНЫ
shopBtn.addEventListener("click", (e) => {
  e.preventDefault();
  if (modalOverlay && modalOverlay.classList.contains('popup_active')) {
    modalOverlay.classList.remove("popup_active");
    body.classList.remove("lock");
    modals.forEach((modal) => {
      modal.classList.remove("popup__wrapper_active");
    });
  }
  if ($('.header__burger').hasClass('header__burger_close')) {
    body.classList.remove("lock");
    $('.header__burger').removeClass('header__burger_close');
    $('.header__list').removeClass('burger__list');
  }
  shopPopup.classList.toggle("popup_active");
  shopPopupWrapper.classList.toggle("popup__wrapper_active");
  body.classList.toggle("lock");
});
shopPopup.addEventListener("click", (e) => {
  if (e.target == shopPopup || e.target == shopBtnClose) {
    shopPopup.classList.remove("popup_active");
    body.classList.remove("lock");
    shopPopupWrapper.classList.remove("popup__wrapper_active");
  }
});
// --------------------------POPUP
function loadPopup(num) {
  $.getJSON('assets/database/products.json', function (data) {
    let out = '';
    out += `<div data-target="${data[num].id}" class="popup__wrapper products-popup__wrapper">
      <span class="products-popup__close icon"></span>
      <div class="product-popup__body">
        <div class="product-popup__img image">
          <img src="${data[num].image}" alt="${data[num]['image']}">
        </div>
        <div class="product-popup__text">
          <h2 class="product-popup__title title">${data[num]['name']}</h2>
          <div class="product-popup__description scrollbar">
            <p>Вес: ${data[num]['weight']} кг</p>
            <p>Тип: ${data[num]['type']}</p>
            <p>Калорийность: ${data[num]['calories']} ккал./100 гр.</p>
            <p>Состав: <br>${data[num]['compound']}</p>
            <p>Аллергены: ${data[num]['allergens']}</p>
          </div>
          <div class="product-popup__bottom">
            <p class="product-popup__price">Цена: <span>${data[num].price}</span> р.</p>
            <button data-card-num="${data[num].id}" id="add-card" class="product-popup__button button icon">В корзину</button>
          </div>
        </div>
      </div>
    </div>`
    $('#popup').html(out);
  })
}