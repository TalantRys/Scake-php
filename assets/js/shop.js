const shopOrders = shopPopupWrapper.querySelector('.shop-panel__orders');
// КНОПКИ В СЧЁТЧИКЕ КОРЗИНЫ
window.addEventListener('click', (e) => {
  let counter;
  if (e.target.id == 'minus' || e.target.id == 'plus') {
    const countParent = e.target.closest('.shop-panel__order-count');
    counter = countParent.children['count'];
  }

  if (e.target.id == 'minus') {
    if (parseInt(counter.innerText) > 1) {
      --counter.innerText;
    }
  }
  if (e.target.id == 'plus') {
    if (parseInt(counter.innerText) != 5) {
      ++counter.innerText;
    }
  }

  if (e.target.id == 'add-card') {
    const card = e.target.closest('.card');
    const productInfo = {
      id: card.dataset.num,
      img: card.querySelector('.card__image img').getAttribute('src'),
      title: card.querySelector('.card__title').innerText,
      price: card.querySelector('.card__price').innerText,
    };
    
    const shopCardItem = `
    <div data-num="${productInfo.id}" class="shop-panel__order">
      <div class="shop-panel__order-img image">
          <img src="${productInfo.img}" alt="${productInfo.img}">
      </div>
      <div class="shop-panel__order-form">
        <h6 class="shop-panel__order-title title">${productInfo.title}</h6>
        <p class="shop-panel__order-price">${productInfo.price}</p>
        <div class="shop-panel__order-count">
            <input id="minus" type="button" value="-">
            <span id="count">1</span>
            <input id="plus" type="button" value="+">
        </div>
        <input class="shop-panel__button-remove" type="button" value="Убрать">
      </div>
    </div>`;
    shopOrders.innerHTML = shopCardItem;
  }
});
