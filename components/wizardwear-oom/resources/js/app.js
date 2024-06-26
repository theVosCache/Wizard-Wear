import './bootstrap';
import {Toast} from "bootstrap";
import jQuery from 'jquery';

window.$ = jQuery;

window.onload = function () {
    const toastElList = document.querySelectorAll('.toast')
    const toastList = [...toastElList].map(toastEl => new Toast(toastEl).show())
}

$(document).on('click', '.btn-toggle', function(e) {
    console.log(e.target.dataset.target);
    $("#"+e.target.dataset.target).removeClass('d-none');
    $(e.target).addClass('d-none');
});
