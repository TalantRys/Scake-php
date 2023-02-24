document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('form');
  form.addEventListener('submit', formSend);
  let spanErrors = form.querySelectorAll('.input__error');
  async function formSend(e) {
    e.preventDefault();
    let error = formValidate(form);
    let formData = new FormData(form);

    if (error == 0) {
      addLoad();
      try {
        let response = await fetch('../vendor/action/contact.php', {
          method: 'POST',
          body: formData
        });
        if (response.ok) {
          let result = await response.json();
          alert(result.message);
          form.reset();
          removeLoad();
        } else {
          alert('Ошибка отправки письма!');
          removeLoad();
        }
      } catch (error) {
        alert("Ошибка: " + error);
        removeLoad();
      }
    }
  }

  function formValidate(form) {
    let error = 0;
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
    return /(\+7|8)[\s(]*\d{3}[)\s]*\d{3}[\s-]?\d{2}[\s-]?\d{2}/.test(input.value);
  }
  // --------------РЕГУЛЯРКА ИМЕНИ
  function nameTest(input) {
    return /^[А-Я][а-я]{1,19}/.test(input.value);
  }

// ----------------ЗАГРУЗКА ПРИ ОТПРАВКЕ ПИСЬМА
  function addLoad() {
    form.classList.add('_loading');
  }
  function removeLoad() {
    form.classList.remove('_loading');
  }
});
