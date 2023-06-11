// ---------------------POPUP КОРЗИНЫ
const shopBtn = document.querySelector(".shop-panel");
const shopBtnClose = document.querySelector(".shop-panel__button");
const shopPopup = document.querySelector(".shop-panel-popup");
const shopPopupWrapper = document.querySelector(".shop-panel-popup__wrapper");
// ---------------------POPUP ОФОРМЛЕНИЯ ЗАКАЗА
const orderBtn = document.querySelector(".shop-panel__bottom-button");
const orderPopup = document.querySelector(".order-popup");
const orderPopupWrapper = document.querySelector(".order-popup__wrapper");
const orderSelect = orderPopupWrapper.querySelector('.order-form__select');
const orderRadio = orderPopupWrapper.querySelectorAll('input[type="radio"]');
const body = document.querySelector("body")
// ---------------------------POPUP КАРТОЧЕК ТОВАРА
const modalOverlay = document.querySelector("#popup");
let modals
$(document).on("click", ".products__card", (e) => {
  if ($('.sign-list').hasClass('burger__list active')) {
    $('.sign-list').toggleClass('burger__list active');
  }
  if (e.target.id !== 'add-card') {
    let num = e.currentTarget.getAttribute("data-num");
    body.classList.add("lock");
    modalOverlay.classList.add("popup_active");
    modalOverlay.classList.add("_loading");
    loadPopup(num);
    modalOverlay.addEventListener("click", (e) => {
      if (e.target == modalOverlay ||
        e.target.classList.contains('products-popup__close')) closeAllPopup()
    });
  }
});

// ---------------------POPUP КОРЗИНЫ
shopBtn.addEventListener("click", (e) => {
  e.preventDefault();
  if (modalOverlay && modalOverlay.classList.contains('popup_active')) closeAllPopup();
  if ($('.header__burger').hasClass('header__burger_close')) {
    body.classList.remove("lock");
    $('.header__burger').removeClass('header__burger_close');
    $('.header__list').removeClass('burger__list');
  }
  if ($('.sign-list').hasClass('burger__list active')) {
    $('.sign-list').toggleClass('burger__list active');
  }
  shopPopup.classList.toggle("popup_active");
  shopPopupWrapper.classList.toggle("popup__wrapper_active");
  body.classList.toggle("lock");
});
// --------------------------ЗАКРЫТЬ POPUP КОРЗИНЫ
shopPopup.addEventListener("click", (e) => {
  if (e.target == shopPopup || e.target == shopBtnClose) closeAllPopup();
});
// --------------------------POPUP ОФОРМЛЕНИЯ ЗАКАЗА
orderBtn.addEventListener('click', async e => {
  e.preventDefault();
  if (Object.keys(userId).length < 1) {
    let confirmResult = window.confirm('Вы не авторизованы! Хотите войти в свой аккаунт? Не бойтесь, ваши торты не пропадут в корзине.')
    if (confirmResult == true) window.location.href = 'sign-in.php';
  } else {
    let carts = JSON.parse(localStorage.getItem('carts')) || [];
    if (carts.length < 1) {
      alert('Корзина пуста! Добавьте торты в корзину перед оформлением заказа.')
    } else {
      type = 1
      orderPopup.classList.add("popup_active");
      orderPopup.classList.add('_loading');
      try {
        let response = await fetch(`vendor/action/loadOrderList.php?user_id=${userId}`, { method: "GET" });
        if (response.ok) {
          let result = await response.json();
          let orderList = orderPopupWrapper.querySelector('.order__carts-row');
          orderList.innerHTML = '';
          orderList.insertAdjacentHTML('beforeend', result.map(cart => renderCardInOrder(cart)).join(''));
          loadSelectInput(result);
          orderPopupSum();
          orderPopup.classList.remove('_loading');
          orderPopupWrapper.classList.add("popup__wrapper_active");
        } else {
          alert(`Ошибка синхронизации корзины: ${response.status} ${response.statusText}`);
          orderPopup.classList.remove('_loading');
          orderPopup.classList.remove("popup_active");
          orderPopupWrapper.classList.remove("popup__wrapper_active");
        }
      } catch (err) {
        alert(`Ошибка: ${err.message} ${err.name}`);
        orderPopup.classList.remove('_loading');
        orderPopup.classList.remove("popup_active");
        orderPopupWrapper.classList.remove("popup__wrapper_active");
      }
    }
  }
});
// --------------------------SELECT В ОФОРМЛЕНИИ
orderSelect.addEventListener('change', orderSelectSum);
orderRadio.forEach(radio => radio.addEventListener('change', orderRadioChange))
// --------------------------ЗАКРЫТЬ POPUP ОФОРМЛЕНИЕ
orderPopup.addEventListener('click', e => {
  if (e.target == orderPopup ||
    e.target.classList.contains('products-popup__close')
  ) {
    orderPopup.classList.remove('popup_active');
    orderPopupWrapper.classList.remove('popup__wrapper_active');
  }
});
// --------------------------POPUP
function loadPopup(num) {
  $.getJSON('vendor/action/cakes.php?num=' + num, function (data) {
    let out = '';
    out += `<div data-target="${data[1].id}" class="popup__wrapper popup__wrapper_active products-popup__wrapper">
      <span class="products-popup__close icon"></span>
      <div class="product-popup__body">
        <div class="product-popup__img image">
          <img src="${data[1].image}" alt="${data[1]['name']}">
        </div>
        <div class="product-popup__text">
          <h2 class="product-popup__title title">${data[1]['name']}</h2>
          <div class="product-popup__description scrollbar">
            <p>Вес: ${data[1]['weight']} кг</p>
            <p>Тип: ${data[1]['type']}</p>
            <p>Калорийность: ${data[1]['calories']} ккал./100 гр.</p>
            <p>Состав: <br>${data[1]['compound']}</p>
            <p>Аллергены: ${data[1]['allergens']}</p>
          </div>
          <div class="product-popup__bottom">
            <p class="product-popup__price">Цена: <span>${data[1].price}</span> р.</p>
            <button data-card-num="${data[1].id}" id="add-card" class="product-popup__button button icon">В корзину</button>
          </div>
        </div>
      </div>
    </div>`
    $('#popup').html(out);
    modalOverlay.classList.remove('_loading');
    btnCheck()
  })
}
let type;
let orderSelectPrice = orderPopupWrapper.querySelector('.order-form__select-price');
let orderSelectType = orderPopupWrapper.querySelector('.order-form__select-type');
async function loadSelectInput(result) {
  // -----------------------ОБНУЛЕНИЕ
  let options = orderSelect.querySelectorAll('option[value]');
  options.forEach(option => option.remove());
  orderSelectPrice.textContent = 0;
  // -----------------------ТИП ТОРТА (ОДИН/ДВА ЯРУСА)
  result.forEach(cart => { if (cart.type_id == 2) type = cart.type_id });
  try {
    let response = await fetch('vendor/action/loadOrderSelect.php?type_id=' + type, { method: 'GET' });
    if (response.ok) {
      let result = await response.json();
      orderSelect.insertAdjacentHTML('beforeend', result.map(option => `
        <option value="${option.id}">${option.delivery}</option>
      `).join(''));
      if (type == 2) orderSelectType.textContent = 'двухъярус';
      else orderSelectType.textContent = 'одноярус';
    } else alert(`Ошибка: ${response.status} ${response.statusText}`)
  } catch (error) { console.log(error) }

}
async function orderSelectSum(e) {
  const orderSelectValue = e.target.value;
  try {
    let response = await fetch(`vendor/action/loadOrderSelect.php?type_id=${type}&select_id=${orderSelectValue}`, { method: "GET" });
    if (response.ok) {
      let result = await response.json();
      orderSelectPrice.textContent = result[0].price;
      orderPopupSum();
    } else alert(`Ошибка: ${response.status} ${response.statusText}`);
  } catch (error) { console.log(error); }
}
function orderPopupSum() {
  const sum = orderPopupWrapper.querySelector('.order-form__sum')
  const deliveryPrice = orderPopupWrapper.querySelector('.order-form__select-price')
  const orderCardItems = orderPopupWrapper.querySelectorAll('.order__cart')
  let fullPrice = 0
  orderCardItems.forEach(item => {
    const price = item.querySelector('.order__cart-price');
    fullPrice += parseInt(price.textContent);
  });
  sum.textContent = fullPrice + parseInt(deliveryPrice.textContent);
}

function orderRadioChange(e) {
  let orderInputsWrapper = orderPopupWrapper.querySelector('.order-form__inputs');
  let labels = orderPopupWrapper.querySelectorAll('.order-form__label');
  let addressText = orderPopupWrapper.querySelector('.order-form__address.order-form__text');
  let typeText = orderPopupWrapper.querySelector('.order-form__text');
  if (e.target.value == 'Самовывоз') {
    labels.forEach(label => {
      if (label.getAttribute('for') == 'select' ||
        label.getAttribute('for') == 'address' ||
        label.getAttribute('for') == 'number') {
          label.querySelector('.form__input').setAttribute('disabled', '');
          label.querySelector('.form__input').classList.remove('_required');
          label.style.display = 'none';      
      }
    });
    typeText.style.display = 'none';
    orderSelect.selectedIndex = 0;
    typeText.querySelector('.order-form__select-price').textContent = 0;
    addressText.style.display = 'block';
    orderInputsWrapper.classList.add('grid_change');
  }
  if (e.target.value == 'Доставка') {
    labels.forEach(label => {
      if (label.getAttribute('for') == 'select' ||
      label.getAttribute('for') == 'address' ||
      label.getAttribute('for') == 'number') {
        label.querySelector('.form__input').removeAttribute('disabled');
        label.querySelector('.form__input').classList.add('_required');
        label.style.display = 'block';      
      }
    });
    typeText.style.display = 'block';
    addressText.style.display = 'none';
    orderInputsWrapper.classList.remove('grid_change');
  }
  orderPopupSum();
}
// ---------------ЗАКРЫТЬ ВСЕ POPUP
function closeAllPopup() {
  const popup = document.querySelectorAll('.popup');
  const popupWrapper = document.querySelectorAll('.popup__wrapper');
  popup.forEach(popup => {
    if (popup.classList.contains('popup_active')) {
      popup.classList.remove('popup_active');
      popupWrapper.forEach(popupWrapper => {
        popupWrapper.classList.remove('popup__wrapper_active');
        if (
          popupWrapper.classList.contains('products-popup__wrapper') &&
          !popup.classList.contains('shop-panel-popup') &&
          !popup.classList.contains('order-popup')
        ) popup.innerHTML = '';
      })
      $('body').removeClass('lock');
    }
  })
}
function renderCardInOrder(cart) {
  return `<div data-order-cart="${cart.cake_id}>" class="order__cart">
  <div class="order__cart-img image">
      <img src="${cart.image}" alt="${cart.title}">
  </div>
  <h4 class="order__cart-title">${cart.title}</h4>
  <p class="order__cart-type">${cart.type}</p>
  <div class="order__cart-bottom">
      <p><span class="order__cart-price">${cart.counted_price}</span> р.</p>
      <p><span class="order__cart-count">${cart.count}</span> шт.</p>
  </div>
</div>`
}