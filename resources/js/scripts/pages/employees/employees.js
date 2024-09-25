document.addEventListener('DOMContentLoaded', function () {
    // Função para aplicar máscara
    function applyMask(input, maskFunction) {
        input.addEventListener('input', function () {
            input.value = maskFunction(input.value);
        });
        // Aplica a máscara imediatamente ao carregar a página, se o campo já tiver valor
        input.value = maskFunction(input.value);
    }

    // Máscara de CPF (formato: 000.000.000-00)
    function cpfMask(value) {
        return value
            .replace(/\D/g, '') // Remove tudo que não é dígito
            .replace(/(\d{3})(\d)/, '$1.$2') // Coloca um ponto após o terceiro dígito
            .replace(/(\d{3})(\d)/, '$1.$2') // Coloca um ponto após o sexto dígito
            .replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Coloca um traço entre o nono e o décimo dígitos
    }

    // Máscara de Telefone (formato: (00) 00000-0000)
    function phoneMask(value) {
        return value
            .replace(/\D/g, '') // Remove tudo que não é dígito
            .replace(/(\d{2})(\d)/, '($1) $2') // Coloca os parênteses no código de área
            .replace(/(\d{5})(\d)/, '$1-$2') // Coloca o traço após os cinco primeiros dígitos
            .replace(/(-\d{4})\d+?$/, '$1'); // Limita para o formato 00000-0000
    }

    // Aplicando a máscara ao campo CPF
    let cpfInput = document.querySelector('#cpf');
    if (cpfInput) {
        applyMask(cpfInput, cpfMask);
    }

    // Aplicando a máscara ao campo Telefone
    let phoneInput = document.querySelector('#telephone');
    if (phoneInput) {
        applyMask(phoneInput, phoneMask);
    }
});
