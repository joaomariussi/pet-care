
$(document).ready(function () {
    dropify('dropify')
});

/* Monta dropify de images */
function dropify(input_class) {
    $('.'+input_class).dropify({
        messages: {
            'default': 'Arraste e solte ou clique para adicionar uma imagem',
            'replace': 'Arraste e solte ou clique para substituir',
            'remove':  'Remover',
            'error':   'Ops, aconteceu algo errado.'
        }
    })
}
