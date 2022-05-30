
// БУРГЕР
$(document).ready(function () {
    $('.header__burger').click(function () {
        $('.header__list').toggleClass('burger__list');
        $('.header__burger').toggleClass('header__burger_close');
        $('body').toggleClass('lock');
    })
});
// АККОРДЕОН
var details = document.querySelectorAll("details");
for(i=0;i<details.length;i++) {
  details[i].addEventListener("toggle", accordion);
}
function accordion(event) {
  if (!event.target.open) return;
    var details = event.target.parentNode.children;
    for(i=0;i<details.length;i++) {
      if (details[i].tagName != "DETAILS" || 
         !details[i].hasAttribute('open') || 
         event.target == details[i]) {
         continue;
      }
      details[i].removeAttribute("open");
    }
}
