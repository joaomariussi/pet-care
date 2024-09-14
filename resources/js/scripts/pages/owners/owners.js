document.addEventListener('DOMContentLoaded', function () {
    // Seleciona os campos do formulário
    const numeroInput = document.getElementById('number');
    const s_nCheckbox = document.getElementById('s_n');
    const cpfInput = document.getElementById('cpf');
    const telefoneInput = document.getElementById('telephone');
    const celularInput = document.getElementById('cell_phone');
    const cepInput = document.getElementById('zip_code');

    // Função para habilitar/desabilitar o input com base no estado do checkbox
    const toggleNumeroInput = function () {
        if (s_nCheckbox.checked) {
            numeroInput.value = 'S/N';    // Define o valor "S/N" no input
            numeroInput.disabled = true;  // Desabilitar o campo para edição
        } else {
            numeroInput.disabled = false; // Habilitar o campo para edição
            numeroInput.value = '';       // Limpar o valor do campo
        }
    };

    // Chama a função ao carregar a página para garantir o estado correto
    toggleNumeroInput();

    // Adiciona o evento change ao checkbox para ativar/desativar o input
    s_nCheckbox.addEventListener('change', toggleNumeroInput);

    // Função para aplicar a máscara de CPF
    const applyCpfMask = function (value) {
        // Remove todos os caracteres que não sejam dígitos
        value = value.replace(/\D/g, '');

        // Aplica a formatação do CPF
        if (value.length > 3) {
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
        }
        if (value.length > 6) {
            value = value.replace(/(\d{3})\.(\d{3})(\d)/, '$1.$2.$3');
        }
        if (value.length > 9) {
            value = value.replace(/(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4');
        }

        return value;
    };

    // Função para aplicar a máscara de telefone fixo
    const applyPhoneMask = function (value) {
        value = value.replace(/\D/g, ''); // Remove caracteres não numéricos
        if (value.length > 2) {
            value = value.replace(/(\d{2})(\d)/, '($1) $2');
        }
        if (value.length > 7) {
            value = value.replace(/(\d{4})(\d)/, '$1-$2');
        }
        return value;
    };

    // Função para aplicar a máscara de celular
    const applyCellMask = function (value) {
        value = value.replace(/\D/g, ''); // Remove caracteres não numéricos
        if (value.length > 2) {
            value = value.replace(/(\d{2})(\d)/, '($1) $2');
        }
        if (value.length > 6) {
            value = value.replace(/(\d{5})(\d)/, '$1-$2');
        }
        return value;
    };

    // Função para aplicar a máscara de CEP
    const applyCepMask = function (value) {
        value = value.replace(/\D/g, ''); // Remove caracteres não numéricos
        if (value.length > 5) {
            value = value.replace(/(\d{5})(\d)/, '$1-$2');
        }
        return value;
    };

    // Aplica a máscara de CPF no evento de input
    cpfInput.addEventListener('input', function (e) {
        e.target.value = applyCpfMask(e.target.value);
    });

    // Aplica a máscara de telefone fixo no evento de input
    telefoneInput.addEventListener('input', function (e) {
        e.target.value = applyPhoneMask(e.target.value);
    });

    // Aplica a máscara de celular no evento de input
    celularInput.addEventListener('input', function (e) {
        e.target.value = applyCellMask(e.target.value);
    });

    // Aplica a máscara de CEP no evento de input
    cepInput.addEventListener('input', function (e) {
        e.target.value = applyCepMask(e.target.value);
    });

    // Aplica as máscaras nos campos já preenchidos quando a página carrega
    cpfInput.value = applyCpfMask(cpfInput.value);
    telefoneInput.value = applyPhoneMask(telefoneInput.value);
    celularInput.value = applyCellMask(celularInput.value);
    cepInput.value = applyCepMask(cepInput.value);
});
