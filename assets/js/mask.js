$('.decimal').keypress(function (evt) {
    return (/^[0-9]/).test($(this).val() + evt.key);
});


$(document).ready(function () {
    // Aplicar a máscara inicial
    $('.format-km').mask('ZZZ.000', {
        reverse: true,
        translation: { 'Z': { pattern: /[0-9]/, optional: true } }
    });

    // Adicionar um evento para ajustar o valor caso seja necessário
    $('.format-km').on('blur', function () {
        let value = $(this).val();

        // Se o valor tem 3 dígitos ou menos, adicionar ".000"
        if (value.length <= 3) {
            value = "0." + value.padStart(3, '0');
            $(this).val(value);
        }
    });
});
