define([
    'jquery'
], function ($) {
    $('.qty-up').click(function () {
        $('#qty').val(Number($('#qty').val()) + 1);
    });

    $('.qty-down').click(function () {
        var value = Number($('#qty').val()) - 1;
        if (value > 0) {
            $('#qty').val(value);
        }

    });
});