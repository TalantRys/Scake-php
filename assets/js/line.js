//ИЗМЕНЕНИЕ РАЗМЕРА ПОЛЗУНКА ПОД КНОПКУ
const hover = document.querySelector(".cakes-nav__line");
const activeMenuItemClass = "cakes-nav__button_selected";
let defaultElement = document.querySelector("." + activeMenuItemClass);
document.querySelectorAll(".cakes-nav__button").forEach((el) => {
    el.addEventListener("mouseover", (ev) => onHoverMenuItem(ev.target));
    el.addEventListener("mouseout", (ev) => onOutMenuItem(ev.target));
    el.addEventListener("click", (ev) => onClickMenuItem(ev.target));
});

function onClickMenuItem(element) {
    document.querySelector("." + activeMenuItemClass).classList.remove(activeMenuItemClass);
    element.classList.add(activeMenuItemClass);
    defaultElement = element;
    onHoverMenuItem(element);
} // выделяем элемент по умолчанию

onHoverMenuItem(defaultElement);

function onOutMenuItem(element) {
    onHoverMenuItem(defaultElement);
}

function onHoverMenuItem(element) {
    const itemRect = element.getBoundingClientRect();
    hover.style.left = itemRect.left + "px";
    hover.style.width = itemRect.width + "px";
}