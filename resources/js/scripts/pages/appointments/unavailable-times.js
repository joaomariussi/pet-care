$(document).ready(function () {
    $('#schedule_date, #service_id').on('change', function () {
        var scheduleDate = $('#schedule_date').val();
        var serviceId = $('#service_id').val();

        if (scheduleDate && serviceId) {
            $.ajax({
                url: '/appointments/unavailable-times',
                type: 'GET',
                data: {
                    schedule_date: scheduleDate,
                    service_id: serviceId
                },
                success: function (response) {
                    // Ajusta os horários para o formato "HH:MM"
                    var unavailableTimes = response.map(function(time) {
                        return time.substring(0, 5);
                    });

                    // Itera sobre cada opção do select de horário
                    $('#schedule_time option').each(function () {
                        var time = $(this).val();

                        // Desabilita os horários que estão ocupados
                        if (unavailableTimes.includes(time)) {
                            $(this).prop('disabled', true).css('color', '#ccc');
                        } else {
                            $(this).prop('disabled', false).css('color', '#000');
                        }
                    });

                    // Certifica-se de que o valor do select não fica no horário desabilitado
                    $('#schedule_time').val('');
                },
                error: function (xhr) {
                    alert('Erro ao carregar horários ocupados: ' + xhr.responseText);
                }
            });
        }
    });
});
