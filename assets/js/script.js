// ---------------------POPUP КОРЗИНЫ
const shopBtn = document.querySelector(".shop-panel");
const shopBtnClose = document.querySelector(".shop-panel__button");
const shopPopup = document.querySelector(".shop-panel-popup");
const shopPopupWrapper = document.querySelector(".shop-panel-popup__wrapper");

$(document).ready(function () {
  // ---------------------БУРГЕР
  $('.header__burger').on('click', function () {
    $('.header__list').toggleClass('burger__list');
    $('.header__burger').toggleClass('header__burger_close');
    $('body').toggleClass('lock');
  })
  // ---------------------АККОРДЕОН
  let details = document.querySelectorAll("details");
  for (i = 0; i < details.length; i++) {
    details[i].addEventListener("toggle", accordion);
  }
  function accordion(event) {
    if (!event.target.open) return;
    let details = event.target.parentNode.children;
    for (i = 0; i < details.length; i++) {
      if (details[i].tagName != "DETAILS" ||
        !details[i].hasAttribute('open') ||
        event.target == details[i]) {
        continue;
      }
      details[i].removeAttribute("open");
    }
  }
  // ---------------------POPUP КОРЗИНЫ
  shopBtn.addEventListener("click", (e) => {
    e.preventDefault();
    shopPopup.classList.toggle("popup_active");
    shopPopupWrapper.classList.toggle("popup__wrapper_active");
    document.querySelector("body").classList.toggle("lock");
  });
  shopPopup.addEventListener("click", (e) => {
    if (e.target == shopPopup || e.target == shopBtnClose) {
      shopPopup.classList.remove("popup_active");
      document.querySelector("body").classList.remove("lock");
      shopPopupWrapper.classList.remove("popup__wrapper_active");
    }
  });
});