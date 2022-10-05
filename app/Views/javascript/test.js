$(document).ready(() => {

    $('form').submit(function (e) {
        e.preventDefault();

        let inputs = {};
        $(this).find(':input').each(function () {
            inputs[$(this).attr("name")] = $(this).val();
        });

        $.post('/testing', inputs, function (data, status) {
            console.log(status);
        });
    });
});