import './bootstrap';
import {Toast} from "bootstrap";

window.onload = function () {
    setInterval(function () {
        [...document.querySelectorAll('.show')].map(toastEl => toastEl.classList.remove('show'))
    }, 5000)
}
