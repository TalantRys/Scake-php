// ---------------------ПРОВЕРКА НА НАЛИЧИЕ user
let userId = JSON.parse(localStorage.getItem('user')) ?? {};
if (Object.keys(userId).length > 0) loadUser(userId);
$(document).ready(function () {
  // ---------------------БУРГЕР
  $('.header__burger').on('click', () => {
    closeAllPopup();
    if ($('.sign-list').hasClass('burger__list active')) {
      $('.sign-list').toggleClass('burger__list active');
    }
    $('.header__list').toggleClass('burger__list');
    $('.header__burger').toggleClass('header__burger_close');
    $('body').toggleClass('lock');
  });
  // ---------------------ВЫПАДАЮЩЕЕ МЕНЮ
  $(document).on('click', '.header__button_signed', e => {
    e.preventDefault();
    if ($('.header__burger').hasClass('header__burger_close')) {
      $('.header__list').toggleClass('burger__list');
      $('.header__burger').toggleClass('header__burger_close');
      $('body').toggleClass('lock');
    }
    closeAllPopup();
    $('.sign-list').toggleClass('burger__list active');

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
// ---------------ВЫХОД ИЗ АККАУНТА
$(document).on('click', '#logOut', async e => {
  e.preventDefault();
  try {
    let response = await fetch('vendor/action/logout.php');
    if (response.ok) {
      localStorage.removeItem('user');
      localStorage.removeItem('carts');
      window.location.href = "index.php";
    } else alert('Не удалось выйти из аккаунта')
  } catch (error) { alert('Ошибка: ' + error); }
})
// --------------ЗАГРУЗКА ПОЛЬЗОВАТЕЛЯ ПРИ НАЛИЧИИ В LocalStorage
async function loadUser(userId) {
  try {
    let response = await fetch(`vendor/action/loadUser.php?user_id=${userId}`);
    if (response.ok) {
      let result = await response.json();
      console.log(result);
      let signWrapper = document.querySelector('.sign-list__wrapper');
      if (result.message == 'true') {
        signWrapper.innerHTML = renderUserHtml(result.id, result.login);
        cartFromBase(result.id);
      } else alert(`Ошибка загрузки сессии`);
    } else alert(`Ошибка fetch: ${response.status} ${response.statusText}`);
  } catch (error) {alert(`Ошибка: ${error}`);}
}
// ДОБАВЛЕНИЕ КАРТ ИЗ БАЗЫ В LocalStorage
async function cartFromBase(userId) {
  try {
    let response = await fetch(`vendor/action/shopCart.php?user_id=${userId}`);
    if (response.ok) {
      let result = await response.json();
      localStorage.setItem('carts', JSON.stringify(result));
      loadFromStorage();
    } else alert(`Ошибка синхронизации корзины: ${response.status} ${response.statusText}`);
  } catch (error) {
    localStorage.setItem('error', JSON.stringify(error))
    alert(`Ошибка: ${error.message}; Стек вызовов: ${error.stack}`);
  }
}
// --------------СТРУКТУРА КНОПКИ ВХОДА
function renderUserHtml(id, login) {
  return `<a href="#" class="header__button header__button_signed icon">${login}</a>
  <div class="sign-list">
    <a href="orders.php?id=${id}" class="header__link">Мои заказы</a>
    <a id="logOut" href="#" class="header__link">Выйти из аккаунта</a>
  </div>`;
}

