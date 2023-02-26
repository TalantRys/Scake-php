// КНОПКИ В СЧЁТЧИКЕ КОРЗИНЫ
window.addEventListener('click', (e) =>{
  let counter;
  if (e.target.id == 'minus' || e.target.id == 'plus') {
    const countParent = e.target.closest('.shop-panel__order-count');
    counter = countParent.children['count'];  
  }
  
  if (e.target.id == 'minus'){
    if (parseInt(counter.innerText) > 1) {
      --counter.innerText;
    }
    
  }
  if (e.target.id == 'plus'){
    if (parseInt(counter.innerText) != 5) {
      ++counter.innerText;
    }
  }
})
