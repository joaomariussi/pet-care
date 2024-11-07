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
                    var duration = response.duration; // Duração em minutos
                    var unavailableTimes = response.times.map(function(time) {
                        return time.substring(0, 5);
                    });

                    $('#schedule_time option').each(function () {
                        var time = $(this).val();
                        var timeInMinutes = parseInt(time.split(':')[0]) * 60 + parseInt(time.split(':')[1]);

                        // Verifica se o horário está ocupado ou dentro do intervalo da duração
                        var isUnavailable = unavailableTimes.some(function(unavailableTime) {
                            var unavailableInMinutes = parseInt(unavailableTime.split(':')[0]) * 60 + parseInt(unavailableTime.split(':')[1]);
                            return timeInMinutes >= unavailableInMinutes && timeInMinutes < unavailableInMinutes + duration;
                        });

                        if (isUnavailable) {
                            $(this).prop('disabled', true).css('color', '#ccc');
                        } else {
                            $(this).prop('disabled', false).css('color', '#000');
                        }
                    });

                    $('#schedule_time').val(''); // Limpa o valor do select caso o horário esteja desabilitado
                },
                error: function (xhr) {
                    alert('Erro ao carregar horários ocupados: ' + xhr.responseText);
                }
            });
        }
    });
});
