
//СЛАЙДЕР
//-ИЗОБРАЖЕНИЯ
const sliderImage = document.querySelector('.slider__image');
const slides = sliderImage.querySelectorAll('img');
//-ТЕКСТ
const sliderBody = document.querySelector('.slider__body');
const slidesText = sliderBody.querySelectorAll('.slider__text');
//-ТОЧКИ
const dots = document.querySelectorAll('.slider__dots');
const numberOfSlides = slides.length;
const numberOfSlidesText = slidesText.length;
var dotIndex = 0;

function nextSlide() {
  slides.forEach((slide) => {
    slide.classList.remove('active');
  })
  slidesText.forEach((slideText) => {
    slideText.classList.remove('active');
  })
  dots.forEach((dot) => {
    dot.classList.remove('active');
  })
  dotIndex++;
  if (dotIndex > (numberOfSlides - 1)) {
    dotIndex = 0;
  }
  slides[dotIndex].classList.add('active');
  slidesText[dotIndex].classList.add('active');
  dots[dotIndex].classList.add('active');
  sliderNav(dotIndex);
}
function prevSlide() {
  slides.forEach((slide) => {
    slide.classList.remove('active');
  })
  slidesText.forEach((slideText) => {
    slideText.classList.remove('active');
  })
  dots.forEach((dot) => {
    dot.classList.remove('active');
  })
  dotIndex--;
  if (dotIndex < 0) {
    dotIndex = numberOfSlides - 1;
  }
  slides[dotIndex].classList.add('active');
  slidesText[dotIndex].classList.add('active');
  dots[dotIndex].classList.add('active');
  sliderNav(dotIndex);
}
var sliderNav = function (manual) {
  for (let dot of dots) {
    dot.classList.remove('active');
  };
  dots[manual].classList.add('active');
  slides.forEach((slide) => {
    slide.classList.remove('active');
  });
  slidesText.forEach((slideText) => {
    slideText.classList.remove('active');
  });
  slides[manual].classList.add('active');
  slidesText[manual].classList.add('active');
}
dots.forEach((dot, i) => {
  dot.addEventListener('click', () => {
    dot.classList.add('active');
    dotIndex = i;
    sliderNav(dotIndex);
  });
});
//-АВТОПЕРЕКЛЮЧЕНИЕ
var repeater = () => {
  playSlider = setInterval(nextSlide, 10000);
};
repeater();
//-ОСТАНОВКА ПРИ НАВЕДЕНИИ МЫШЬЮ НА СЛАЙДЕР
sliderBody.addEventListener('mouseover', ()=>{
  clearInterval(playSlider);
});
//-ЗАПУСК, КОГДА УБРАЛИ МЫШЬ ИЗ СЛАЙДЕРА
sliderBody.addEventListener('mouseout',()=>{
  repeater();
})


// ---------------------ИЗМЕНЕНИЕ ШАПКИ
const header = document.querySelector('header');
const slider = document.querySelector('.main__slider');
const sliderHeight = slider.offsetHeight;
header.classList.add('header_opacity');
window.addEventListener('scroll', function () {
  let scrollDistance = window.pageYOffset;
  if (scrollDistance >= sliderHeight) {
    header.classList.remove('header_opacity');
  } else {
    header.classList.add('header_opacity');
  }
});