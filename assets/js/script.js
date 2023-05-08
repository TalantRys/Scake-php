$(document).ready(function () {
  // ---------------------БУРГЕР
  $('.header__burger').on('click', function () {
    const popup = document.querySelectorAll('.popup')
    const popupWrapper = document.querySelectorAll('.popup__wrapper')
    popup.forEach(popup => {
      if (popup.classList.contains('popup_active')){
        popup.classList.remove('popup_active')
        popupWrapper.forEach(popupWrapper =>{
          popupWrapper.classList.remove('popup__wrapper_active')
        })
        $('body').removeClass('lock');
      }
    });
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
});