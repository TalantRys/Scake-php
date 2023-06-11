document.addEventListener('DOMContentLoaded', function () {
  const forms = document.querySelectorAll('#form');
  Array.from(forms).forEach(form => form.addEventListener('submit', formSend));
});

async function formSend(e) {
  e.preventDefault();
  let form = e.target;
  let error = formValidate(form);
  let formData = new FormData(form);
  let fetchSettings = { method: 'POST', body: formData };
  let response;
  if (error == 0) {
    form.classList.add('_loading');
    try {
      if (form.classList.contains('sign-up__form')) {
        response = await fetch('vendor/action/signUp.php', fetchSettings);
      } else if (form.classList.contains('sign-in__form')) {
        response = await fetch('vendor/action/signIn.php', fetchSettings);
      } else if (form.classList.contains('contact-us__form')) {
        response = await fetch('vendor/action/contact.php', fetchSettings);
      } else if (form.classList.contains('order__form')) {
        let totalPrice = form.querySelector('.order-form__sum');
        formData.append('carts', localStorage.getItem('carts'))
        formData.append('totalPrice', parseInt(totalPrice.textContent))
        response = await fetch('vendor/action/order.php', fetchSettings);
      }
      if (response.ok) {
        let result = await response.json();
        if (result.message != 'true') {
          if (result.message == 'order-true') {
            form.classList.remove('_loading');
            localStorage.removeItem('carts');
            loadFromStorage();
            btnCheck()
            ordersCheck()
            ordersSum()
            closeAllPopup();
            let confirmResult = confirm(`Заказ под номером ${result.orderNumber} оформлен! Позже мы напишем вам на почту.\r\nХотите посмотреть ваш заказ?`);
            if (confirmResult == true) window.location.href = 'orders.php';
          } else {
            alert(result.message);
            form.classList.remove('_loading');
          }
        } else {
          // --------------ДОБАВЛЕНИЕ ID ПОЛЬЗОВАТЕЛЯ В LocalStorage
          let mergeStatus = await mergeCarts();
          if (mergeStatus != false) {
            localStorage.setItem('user', JSON.stringify(result['user_id']));
            form.reset();
            form.classList.remove('_loading');
            window.location.href = result.url;
          } else form.classList.remove('_loading');
        }
      } else {
        alert(`Ошибка! Статус: ${response.status} ${response.statusText}`);
        form.classList.remove('_loading');
      }
    } catch (error) {
      alert("Ошибка: " + error);
      form.classList.remove('_loading');
    }
  }
}

function formValidate(form) {
  let error = 0;
  let formReq = form.querySelectorAll('._required[name]');
  let spanErrors = form.querySelectorAll('._required[name]~.input__error');
  for (let i = 0; i < formReq.length; i++) {
    const input = formReq[i];
    const span = spanErrors[i];
    input.classList.remove('_error');

    if (input.getAttribute('name') == 'email' && input.value !== '') {
      if (!emailTest(input)) {
        span.innerHTML = 'Введите email корректно';
        input.classList.add('_error');
        error++;
      }
    } else if (input.getAttribute('name') == 'login' && input.value !== '') {
      if (!loginTest(input)) {
        span.innerHTML = 'Логин слишком большой';
        input.classList.add('_error');
        error++;
      }
    } else if (input.getAttribute('type') == 'password' && input.value !== '') {
      if (!passTest(input)) {
        span.innerHTML = 'Необходимо минимум 8 символов';
        input.classList.add('_error');
        error++;
      }
    } else if (input.getAttribute('name') == 'name' && input.value !== '') {
      if (!nameTest(input)) {
        span.innerHTML = 'Введите имя с большой буквы';
        input.classList.add('_error');
        error++;
      }
    } else if (input.getAttribute('name') == 'number' && input.value !== '') {
      if (!telTest(input)) {
        span.innerHTML = 'Введите номер корректно';
        input.classList.add('_error');
        error++;
      }
    } else if (input.getAttribute('name') == 'select' && input.value != 'Выберите ваш район') {
      input.classList.remove('_error');
    } else if ((input.getAttribute('name') == 'date' || input.getAttribute('name') == 'time')
      && input.value !== '') {
      span.innerHTML = '';
      input.classList.remove('_error');
    } else if (input.getAttribute('name') == 'address' && input.value !== '') {
      if (!addressTest(input)) {
        span.innerHTML = 'Пример: ул. Ивана 1/1, кв. 1';
        input.classList.add('_error');
        error++;
      }
    } else if (input.getAttribute('name') == 'message' && input.value !== '') {
      input.classList.remove('_error');
    } else {
      span.innerHTML = 'Заполните поле';
      input.classList.add('_error');
      error++;
    }
  }
  return error;
}
// --------------РЕГУЛЯРКА EMAIL
function emailTest(input) {
  return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
}
// --------------РЕГУЛЯРКА ТЕЛЕФОНА
function telTest(input) {
  return /^(\+7|8)[\s(]*\d{3}[)\s]*\d{3}[\s-]?\d{2}[\s-]?\d{2}/.test(input.value);
}
// --------------РЕГУЛЯРКА ЛОГИНА
function loginTest(input) {
  return /^[\wА-Яа-я\-]{1,19}$/.test(input.value);
}
// --------------РЕГУЛЯРКА ИМЕНИ
function nameTest(input) {
  return /^[А-Я][а-я]+/.test(input.value);
}
// --------------РЕГУЛЯРКА ПАРОЛЯ
function passTest(input) {
  return /^[\w-]{8}/.test(input.value);
}
// --------------РЕГУЛЯРКА АДРЕСА
function addressTest(input) {
  return /^[ул|пер|пр|б-р]*[\.\s]*[А-Яа-я\-]{2,}\s\d{1,3}[\\\d{1,3}]*[\,\s\-]*[кв\.]*\s*\d{1,3}$/.test(input.value);
}
async function mergeCarts() {
  let carts = JSON.parse(localStorage.getItem('carts')) || [];
  if (carts.length > 0) {
    let cartsData = new FormData();
    cartsData.append('notAuthCarts', JSON.stringify(carts));
    try {
      let response = await fetch('vendor/action/mergeCart.php', { method: 'POST', body: cartsData })
      if (response.ok) {
        let result = await response.json();
        console.log(result);
        return true;
      } else {
        alert(`Ошибка синхронизации корзины ${response.status} ${response.statusText}`);
        return false;
      }
    } catch (error) {
      alert(`Ошибка: ${error}`);
      return false;
    }
  }
}