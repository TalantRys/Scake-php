document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('#form');
  form.addEventListener('submit', formSend);
});

async function formSend(e) {
  e.preventDefault();
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
      }
      if (response.ok) {
        let result = await response.json();
        if (result.message != 'true') {
          alert(result.message);
          form.classList.remove('_loading');
        } else {
          setUserToStorage(result);
          form.reset();
          form.classList.remove('_loading');
          window.addEventListener('error', (error) => localStorage.setItem('error', JSON.stringify(error)))
          window.location.href = result.url;
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
  let spanErrors = form.querySelectorAll('.input__error');
  let formReq = form.querySelectorAll('._required');

  for (let i = 0; i < formReq.length && spanErrors.length; i++) {
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
    } else if (input.getAttribute('type') == 'password' && input.value !== '') {
      if (!passTest(input)) {
        span.innerHTML = 'Необходимо минимум 8 символов';
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
// --------------ДОБАВЛЕНИЕ ID ПОЛЬЗОВАТЕЛЯ В LocalStorage
async function setUserToStorage(result) {
  localStorage.setItem('user', JSON.stringify(result['user_id']));
  cartFromBase(parseInt(result['user_id']));
}
