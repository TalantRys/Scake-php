// ---------------------------POPUP КАРТОЧЕК ТОВАРА
$(document).on("click", ".products__card", (e) => {
  if (e.target.id !== 'add-card') {
    const modalOverlay = document.querySelector(".products-popup");
    let num = e.currentTarget.getAttribute("data-num");
    loadPopup(num);
    setTimeout(() => {
      const modals = document.querySelectorAll(".products-popup__wrapper");
      const target = document.querySelector(`[data-target="${num}"]`);
      modals.forEach((modal) => {
        modal.classList.remove("popup__wrapper_active");
      });
      target.classList.add("popup__wrapper_active");
      modalOverlay.classList.add("popup_active");
      document.querySelector("body").classList.add("lock");

      document.addEventListener("click", (e) => {
        if (e.target == modalOverlay ||
          e.target.closest('header') ||
          e.target.closest('.products-popup__close')) {
          modalOverlay.classList.remove("popup_active");
          document.querySelector("body").classList.toggle("lock");
          modals.forEach((modal) => {
            modal.classList.remove("popup__wrapper_active");
          });
          modalOverlay.innerHTML = '';
        }
      }, {once: true});
    }, 100);
  }
});
