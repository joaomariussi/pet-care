document.addEventListener('DOMContentLoaded', function () {
    const raceInput = document.getElementById('race');
    const noRaceCheckbox = document.getElementById('no_race');

    // Função para alternar o input de raça com base no estado do checkbox
    const toggleRaceInput = function () {
        if (noRaceCheckbox.checked) {
            raceInput.value = 'Sem raça';
            raceInput.disabled = true;
        } else {
            raceInput.disabled = false;
            // Verifica se o valor atual do campo é 'Sem raça' e limpa apenas nesse caso
            if (raceInput.value === 'Sem raça') {
                raceInput.value = ''; // Limpa o campo apenas se estiver 'Sem raça'
            }
        }
    };

    // Chama a função ao carregar a página para garantir o estado correto
    toggleRaceInput();

    // Adiciona o evento change ao checkbox para ativar/desativar o input
    noRaceCheckbox.addEventListener('change', toggleRaceInput);
});
