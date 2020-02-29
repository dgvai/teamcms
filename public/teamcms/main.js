let Toast;       
$(function(){
    Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
});

function reload(x) {
    setTimeout(function(){
        window.location.reload();
    },x);
}