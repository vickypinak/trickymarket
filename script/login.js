$(document).ready(() => {
    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: false,
        progressBar: false,
        positionClass: "toast-top-center",
        preventDuplicates: false,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
      };
    if(localStorage.getItem('logged') === '1') {
        window.location.href = '/admin.html';
    }
});

function doLoginIn() {

    var user = $("#user").val();
    var pass = $("#pass").val();
    console.log()
    if(user === 'admin' && pass === 'Test@123') {
        localStorage.setItem('logged', '1');
        window.location.href = '/admin.html';
    } else {
        //todo wrong credentials
        toastr.error('Wrong Credentials');
    }
}
function logout() {
    localStorage.removeItem('logged');
}