import './bootstrap';
import {Toast} from 'bootstrap';

window.onload = function () {
    const toastElList = document.querySelectorAll('.toast')
    toastElList.forEach((el) => {
        (new Toast(el)).show()
    })
}
