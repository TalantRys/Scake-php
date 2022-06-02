
//СЛАЙДЕР
//-ИЗОБРАЖЕНИЯ
const sliderImage = document.querySelector('.slider__image');
const slides = sliderImage.getElementsByTagName('img');
var i = 0;
function nextSlide() {
  slides[i].classList.remove('active');
  i = (i + 1) % slides.length;
  slides[i].classList.add('active');
}
function prevSlide() {
  slides[i].classList.remove('active');
  i = (i - 1 + slides.length) % slides.length;
  slides[i].classList.add('active');
}

//-ТЕКСТ
const sliderBody = document.querySelector('.slider__body');
const slidesText = sliderBody.getElementsByClassName('slider__text');
var j = 0;
function nextSlideText() {
  slidesText[j].classList.remove('active');
  j = (j + 1) % slidesText.length;
  slidesText[j].classList.add('active');
}

function prevSlideText() {
  slidesText[j].classList.remove('active');
  j = (j - 1 + slidesText.length) % slidesText.length;
  slidesText[j].classList.add('active');
}
//-ТОЧКИ
const sliderControls = document.querySelector('.slider__all-dots');
const dots = sliderControls.querySelectorAll('.slider__dots');
var sliderNav = function (manual) {
  dots.forEach((dot) =>{
    dot.classList.remove('active');
  });
  dots[manual].classList.add('active');
  sliderImage.forEach((slides) =>{
    slides.classList.remove('active');
  });
  sliderImage[manual].classList.add('active');
  slidesText.forEach((text)=>{
    text.classList.remove('active');
  })
  slidesText[manual].classList.add('active');
}
dots.forEach((dot, k) => {
  dot.addEventListener('click', () => {
    sliderNav(k);
  });
});
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

