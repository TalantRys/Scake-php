
// ---------------------БУРГЕР
$(document).ready(function () {
  $('.header__burger').on('click', function () {
    $('.header__list').toggleClass('burger__list');
    $('.header__burger').toggleClass('header__burger_close');
    $('body').toggleClass('lock');
  })
});
// ---------------------АККОРДЕОН
var details = document.querySelectorAll("details");
for (q = 0; q < details.length; q++) {
  details[q].addEventListener("toggle", accordion);
}
function accordion(event) {
  if (!event.target.open) return;
  var details = event.target.parentNode.children;
  for (q = 0; q < details.length; q++) {
    if (details[q].tagName != "DETAILS" ||
      !details[q].hasAttribute('open') ||
      event.target == details[q]) {
      continue;
    }
    details[q].removeAttribute("open");
  }
}

// ---------------------POPUP КОРЗИНЫ
const shopBtn = document.querySelector(".shop-panel");
const shopBtnClose = document.querySelector(".shop-panel__button");
const shopPopup = document.querySelector(".shop-panel-popup");
const shopPopupWrapper = document.querySelector(".shop-panel-popup__wrapper");

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