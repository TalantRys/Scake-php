// ВСЕ ТОВАРЫ В КОРЗИНЕ
const shopOrders = shopPopupWrapper.querySelector('.shop-panel__orders');
// НАДПИСЬ ПРИ ПУСТОЙ КОРЗИНЕ
const shopEmptyInfo = shopOrders.querySelector('.shop-panel__title')
// ЗАГРУЗКА ТОВАРОВ ИЗ LocalStorage ПРИ ПЕРЕХОДЕ НА САЙТ
let carts = JSON.parse(localStorage.getItem('carts')) || []
shopOrders.insertAdjacentHTML('beforeend', carts.map(cart => renderCardInShop(cart)).join(''));

ordersCheck()
ordersSum()
document.addEventListener('click', (e) => {
  // КНОПКИ В СЧЁТЧИКЕ КОРЗИНЫ
  let counter;
  if (e.target.id == 'minus' || e.target.id == 'plus') {
    const countParent = e.target.closest('.shop-panel__order-count');
    counter = countParent.querySelector('#count');
  }

  if (e.target.id == 'minus') {
    if (parseInt(counter.textContent) > 1) --counter.textContent;
    // УДАЛЕНИЕ ТОВАРА ИЗ КОРЗИНЫ
    else if (parseInt(counter.textContent) == 1) {
      e.target.closest('.shop-panel__order').remove();
    }
    addToStorage()
    btnCheck()
    ordersCheck()
    ordersSum()
  }
  // УДАЛЕНИЕ ТОВАРА ИЗ КОРЗИНЫ ПРИ НАЖАТИИ "УБРАТЬ"
  if (e.target.classList == 'shop-panel__button-remove') {
    e.target.closest('.shop-panel__order').remove();
    addToStorage()
    btnCheck()
    ordersCheck()
    ordersSum()
  }
  if (e.target.id == 'plus') {
    if (parseInt(counter.textContent) != 5) {
      ++counter.textContent;
      addToStorage()
      btnCheck()
      ordersCheck()
      ordersSum()
    }
  }

  // ДОБАВЛЕНИЕ ТОВАРА В КОРЗИНУ
  if (e.target.id == 'add-card') {
    let card
    const cardButton = e.target
    card = cardButton.hasAttribute('data-card-num') ? document.querySelector(`[data-num="${cardButton.dataset.cardNum}"]`) : cardButton.closest('.card');
    const cardInShop = shopOrders.querySelector(`[data-cart-num="${card.dataset.num}"]`);
    // ОБЪЕКТ С ДАННЫМИ ТОВАРА
    const productInfo = {
      id: card.dataset.num,
      img: card.querySelector('.card__image img').getAttribute('src'),
      title: card.querySelector('.card__title').innerText,
      price: card.querySelector('.card__price span').innerText
    };
    // ТОВАР В КОРЗИНЕ
    const shopCardItem = renderCardInShop(productInfo);

    // ПРОВЕРКА НА НАЛИЧИЕ И ДАЛЬНЕЙШАЯ СУММА
    if (!cardInShop) {
      shopOrders.insertAdjacentHTML('beforeend', shopCardItem);
      console.log('Добавили новый товар в корзину');
    }
    addToStorage()
    btnCheck()
    ordersCheck()
    ordersSum()
  }
});

// ПОКАЗАТЬ/СКРЫТЬ НАДПИСЬ "КОРЗИНА ПУСТА", ПОСЧИТАТЬ КОЛ-ВО ТОВАРОВ
function ordersCheck() {
  // ДЛИНА ТОВАРОВ
  const ordersLength = shopOrders.querySelectorAll('.shop-panel__order').length;
  // КОЛИЧЕСТВО КАЖДОГО ТОВАРА
  const ordersCounts = shopOrders.querySelectorAll('.shop-panel__order #count');
  // СЧЁТЧИК НА КНОПКЕ "КОРЗИНА"
  const shopBtnAfter = shopBtn.querySelector('.shop-panel__length');

  // ОБЩАЯ СУММА КОЛИЧЕСТВ
  let fullCount = 0
  ordersCounts.forEach(count => {
    // ОТНИМАЕМ МИНУС 1 В КОЛИЧЕСТВАХ 
    // (ЧИСЛО В СЧЁТЧИКЕ БЕЗ ЭТОГО БУДЕТ 2 ПРИ ОДНОМ ТОВАРЕ)
    fullCount += parseInt(count.textContent) - 1
  })
  if (ordersLength > 0) {
    shopBtnAfter.textContent = ordersLength + fullCount;
    shopBtnAfter.style.display = 'flex';
    shopEmptyInfo.style.display = 'none';
  } else {
    shopBtnAfter.textContent = '';
    shopBtnAfter.style.display = 'none';
    shopEmptyInfo.style.display = 'block'
  }
}
// СУММА ЦЕН ТОВАРОВ
function ordersSum() {
  const sum = shopPopupWrapper.querySelector('.shop-panel__sum')
  const shopCardItems = shopOrders.querySelectorAll('.shop-panel__order')
  let fullPrice = 0
  shopCardItems.forEach(item => {
    const count = item.querySelector('#count');
    const price = item.querySelector('.shop-panel__order-price span');
    let result = parseInt(count.textContent) * parseInt(price.textContent)
    fullPrice += result
  });
  sum.textContent = fullPrice;
}
// ИЗМЕНИТЬ ИКОНКУ ПРИ НАЛИЧИИ ТОВАРА В КОРЗИНЕ
function btnCheck() {
  const cardButton = document.querySelectorAll('#add-card');
  const cardInShop = JSON.parse(localStorage.getItem('carts')) || [];
  // Перебираем элементы второго массива
  cardButton.forEach(cardBtn => {
    // Получаем значение из атрибута
    let num = null;
    let cardPopupNum = null;
    // Присвавиваем значения по условию
    if (cardBtn.closest('.products__card')) num = cardBtn.closest('.products__card').dataset.num;
    if (cardBtn.dataset.cardNum) cardPopupNum = cardBtn.dataset.cardNum;
    // Проверяем, содержится ли число в первом массиве
    let isCardInShop = false;
    cardInShop.forEach(card => {
      if (card.id == num || card.id == cardPopupNum) {
        isCardInShop = true;
      }
    });
    // Если число не содержится в первом массиве, удаляем класс "_added"
    if (!isCardInShop) {
      cardBtn.classList.remove('_added');
      if (cardPopupNum) cardBtn.textContent = 'В корзину'
    } else {
      cardBtn.classList.add('_added');
      if (cardPopupNum) cardBtn.textContent = 'В корзине'
    }
  });
}
// ДОБАВЛЕНИЕ В LocalStorage
function addToStorage() {
  const cardInShop = shopOrders.querySelectorAll('.shop-panel__order');
  let carts = [];
  cardInShop.forEach(cart => {
    const productInfo = {
      id: cart.dataset.cartNum,
      img: cart.querySelector('.shop-panel__order-img img').getAttribute('src'),
      title: cart.querySelector('.shop-panel__order-title').textContent,
      count: cart.querySelector('#count').textContent,
      price: cart.querySelector('.shop-panel__order-price span').textContent
    }
    carts.push(productInfo);
  })
  localStorage.setItem('carts', JSON.stringify(carts));
  addToBase(carts);
}
async function addToBase(carts) {

  try {
    let response = await fetch(`vendor/action/addCart.php`, {
      headers: {
        "Content-Type": "application/json"
      },
      method: 'POST',
      body: {
        carts: JSON.stringify(carts)
      }
    });
    if (response.ok) {
      let result = await response.json();
      console.log(result);
    }
  } catch (error) {
    alert(error);
  }
}
const shopOrderBtn = shopPopupWrapper.querySelector('.shop-panel__bottom-button');
shopOrderBtn.addEventListener('click', e => e.preventDefault());

// СТРУКТУРА ТОВАРОВ В КОРЗИНЕ
function renderCardInShop(productInfo) {
  return `
  <div data-cart-num="${productInfo.id}" class="shop-panel__order">
    <div class="shop-panel__order-img image">
        <img src="${productInfo.img}" alt="${productInfo.title}">
    </div>
    <div class="shop-panel__order-form">
      <h6 class="shop-panel__order-title title">${productInfo.title}</h6>
      <p class="shop-panel__order-price"><span>${productInfo.price}</span> р.</p>
      <div class="shop-panel__order-count">
          <input id="minus" type="button" value="-">
          <span id="count">${productInfo.count ?? 1}</span>
          <input id="plus" type="button" value="+">
      </div>
      <input class="shop-panel__button-remove" type="button" value="Убрать">
    </div>
  </div>`;
}