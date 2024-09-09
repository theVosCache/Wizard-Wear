import './bootstrap';
import {Toast} from "bootstrap";
import jQuery from 'jquery';
import Swal from 'sweetalert2'

window.$ = jQuery;

window.swal = {
    delete: (formId) => {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });

                $(formId).submit();
            }
        });
    }
}

window.onload = function () {
    const toastElList = document.querySelectorAll('.toast')
    const toastList = [...toastElList].map(toastEl => new Toast(toastEl).show())
}

$(document).on('click', '.btn-toggle', function(e) {
    console.log(e.target.dataset.target);
    $("#"+e.target.dataset.target).removeClass('d-none');
    $(e.target).addClass('d-none');
});
