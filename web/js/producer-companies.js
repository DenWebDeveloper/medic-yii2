$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

$(function () {
    $('.card .btn[data-toggle="tooltip"]').on("click", function(e) {
        e.preventDefault();
        $('#items-pharmacy').modal('show');
    });
});