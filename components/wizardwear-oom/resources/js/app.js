import './bootstrap';
import {Toast} from "bootstrap";

window.onload = function () {
    const toastElList = document.querySelectorAll('.toast')
    const toastList = [...toastElList].map(toastEl => new Toast(toastEl).show())
}
