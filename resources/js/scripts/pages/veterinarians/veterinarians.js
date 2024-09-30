document.addEventListener('DOMContentLoaded', function () {
    // Seleciona os campos do formulário
    const cpfInput = document.getElementById('cpf');
    const celularInput = document.getElementById('cell_phone');
    const crmInput = document.getElementById('crm');

    // Função para aplicar a máscara de CPF
    const applyCpfMask = function (value) {
        value = value.replace(/\D/g, '');

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

    // Função para aplicar a máscara de celular
    const applyCellMask = function (value) {
        value = value.replace(/\D/g, '');
        if (value.length > 2) {
            value = value.replace(/(\d{2})(\d)/, '($1) $2');
        }
        if (value.length > 6) {
            value = value.replace(/(\d{5})(\d)/, '$1-$2');
        }
        return value;
    };

    // Função para aplicar a máscara de CRMV
    const applyCrmvMask = function (value) {
        // Permite dígitos e letras no CRMV
        value = value.replace(/[^0-9A-Za-z]/g, ''); // Remove tudo que não seja número ou letras

        // Limita a parte numérica a 6 dígitos
        if (value.length <= 6) {
            value = value.replace(/(\d{1,6})/, '$1');
        }

        // Após o número, adiciona o hífen e formata o estado (UF)
        if (value.length > 5) {
            value = value.replace(/(\d{4,6})([A-Za-z]{0,2})/, '$1-$2');
        }

        return value;
    };

    // Aplica a máscara de CPF no evento de input
    cpfInput.addEventListener('input', function (e) {
        e.target.value = applyCpfMask(e.target.value);
    });

    // Aplica a máscara de celular no evento de input
    celularInput.addEventListener('input', function (e) {
        e.target.value = applyCellMask(e.target.value);
    });

    // Aplica a máscara de CRMV no evento de input
    crmInput.addEventListener('input', function (e) {
        e.target.value = applyCrmvMask(e.target.value);
    });

    // Aplica as máscaras nos campos já preenchidos quando a página carrega
    cpfInput.value = applyCpfMask(cpfInput.value);
    celularInput.value = applyCellMask(celularInput.value);
    crmInput.value = applyCrmvMask(crmInput.value);
});
