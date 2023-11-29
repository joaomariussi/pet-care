
// Adicionar o valor do editor no input hidden
$('.ql-editor').on('keyup', function () {
    $('#description').val($(this).html())
})
