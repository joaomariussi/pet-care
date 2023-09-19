
// Máscaras JQUERY
$(document).ready(function(){
    $('.date').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.cep').mask('00000-000');
    $('.phone').mask('(00) 00000-0000');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.money').mask('000.000.000.000,00', {reverse: true});
    $('.money2').mask("#.##0,00", {reverse: true});
    $("#cnpj").mask("99.999.999/9999-99");
    $(".cnpj").mask("99.999.999/9999-99", {reverse: true});
    $(".float").mask("000.000.000.000,000",{reverse: true});
    $(".double").mask("000.000.000.000.000",{reverse: true});
    $(".centimeter").mask("000.000.000.000,00",{reverse: true});
    $(".weight").mask("000.000.000.000,000",{reverse: true});
});
