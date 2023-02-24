// ---------------------------POPUP КАРТОЧЕК ТОВАРА


$(document).on("click", ".products__card", (e) => {
  const modalOverlay = document.querySelector(".products-popup");
  const modals = document.querySelectorAll(".products-popup__wrapper");
  let num = e.currentTarget.getAttribute("data-num");
  const target = document.querySelector(`[data-target="${num}"]`);
  modals.forEach((modal) => {
    modal.classList.remove("popup__wrapper_active");
  });
  target.classList.add("popup__wrapper_active");
  modalOverlay.classList.add("popup_active");
  document.querySelector("body").classList.add("lock");

  modalOverlay.addEventListener("click", (e) => {
    if (e.target == modalOverlay || e.target.closest('.products-popup__close')) {
      modalOverlay.classList.remove("popup_active");
      document.querySelector("body").classList.remove("lock");
      modals.forEach((modal) => {
        modal.classList.remove("popup__wrapper_active");
      });
    }
  });
});
