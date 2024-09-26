$(document).ready(function() {
    // Aplica a máscara ao campo de salário.
    $('#price').mask('R$ 0.000,00', {
        reverse: true,
        translation: {
            '0': {
                pattern: /[0-9]/,  // Aceita apenas números
                optional: false
            }
        }
    });
});
