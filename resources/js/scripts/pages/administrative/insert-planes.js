//       Validação de formulário de cadastro de parceiros //
// -----------------------------
// Mostrar formulário
var stepsValidationInsertPlans = $(".wizard-planes-insert");


// Initialize validation
stepsValidationInsertPlans.validate({
    errorClass: 'is-invalid',
    successClass: 'is-valid',
    highlight: function (element, errorClass) {
        $(element).addClass(errorClass);
    },
    unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass);
    },
    errorPlacement: function (error, element) {
        error.insertAfter(element).addClass('invalid-feedback');
    },
    invalidHandler: function(e,validator) {
        for (let i = 0; i < validator.errorList.length; i++){
            $(validator.errorList[i].element).parents('.accordion-collapse.collapse').collapse('show'); // abre o accordion
            let error = $(validator.errorList[i].element).data('monitorar-error-insert-plan') // pega o atributo data-monitorar-error do elemento
            $(`.${error}`).addClass('bg-label-danger') // adiciona a classe bg-label-danger no elemento com a classe igual ao atributo data-monitorar-error
        }
        // Função para remover a classe bg-label-danger quando o usuário digitar algo no input
        $('.form-control').keyup(function () {
            $(this).closest('.accordion-item').children('.accordion-button').removeClass('bg-label-danger')
        })

    },
    ignore: "hidden",
    rules: {
        name: {
            required: true
        },
        code: {
            required: true
        },
        description: {
            required: true
        },
        modules: {
            required: true
        }
    },
    messages: {
        name: {
            required: "O nome é obrigatório"
        },
        code: {
            required: "O código é obrigatório"
        },
        description: {
            required: "A descrição é necessária"
        },
        modules: {
            required: "Selecione ao menos um módulo"
        }
    }
});

// 0 definido por default para evitar quebra de consulta
let idsSelectedModules = [0];

$('.module-price').on('click', function () {
    let element = $(this);
    let id = parseInt(element.val());
    if (element.is(':checked')) {
        if (idsSelectedModules.indexOf(id) === -1) {
            idsSelectedModules.push(id);
        }
    } else {
        idsSelectedModules.splice(idsSelectedModules.indexOf(id), 1);
    }
});

// 0 definido por default para evitar quebra de consulta
let metrics = {
    'product_limit':
        {
            'price': $('#product_limit').data('price'),
            'quantity': 0
        },
    'orders_limit':
        {
            'price': $('#orders_limit').data('price'),
            'quantity': 0
        },
    'customer_limit':
        {
            'price': $('#customer_limit').data('price'),
            'quantity': 0
        },
    'user_limit':
        {
            'price': $('#user_limit').data('price'),
            'quantity': 0
        },
    'sales_limit':
        {
            'price': $('#sales_limit').data('price'),
            'quantity': 0
        },
    'product_images_limit':
        {
            'price': $('#product_images_limit').data('price'),
            'quantity': 0
        },
    'visits_limit':
        {
            'price': $('#visits_limit').data('price'),
            'quantity': 0
        },
    'orders_marketplaces_limit':
        {
            'price': $('#orders_marketplaces_limit').data('price'),
            'quantity': 0
        },
};

$('.price-metric').on('focusout', function () {
    let element = $(this);
    let value = element.val();
    metrics[element.attr('name')]['quantity'] = value === '' || value === '0' ? 0 : element.val();
    console.log(metrics);
});

$('.resume-price-plan').on('click', function () {
    let token = $('meta[name="csrf-token"]').attr('content');

    $.post('/financial/plan-budget',
        {'_token': token, 'modulesIds[]': idsSelectedModules, 'metrics': metrics},
        function (response) {
            if (response.data) {
                $('.final-price').html(parseFloat(response.data.total).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
                // abastece lista de módulos selecionados
                let modules = '<span class="color-red-geral"><li>Nenhum módulo selecionado</li></span>';
                let elementModulesList = $('.modules-list');
                if (response.data.description.modules.length !== 0) {
                    modules = '';
                    $.each(response.data.description.modules, function (key, value) {
                        modules += `<p<b style="color: #566a7f">${key}:</b><span class="color-blue-geral"
                            style="float: right">
                                + ${parseFloat(value.price).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}
                            </span>
                        </p><hr>`;
                    });
                }
                elementModulesList.html(modules);
                // abastece lista de métricas selecionados
                $.each(response.data.description.metrics, function (key, value) {
                    let content = '<span class="color-red-geral" style="float: right">Quantidade não definida</span><hr>';
                    if (metrics[key]['quantity'] === 0) {
                        $(`.price_${key}`).html(content);
                    } else {
                        content = `<span style="float: right" class="color-blue-geral"> + ${value.price.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}</span><hr>`;
                        $(`.price_${key}`).html(content);
                    }
                });
            } else {
                notifyError(response.error)
            }
        }
    );
});

$('#inport-actives-from-plan').on('change', function () {
    // Obtenha o valor selecionado
    let selectedValue = JSON.parse($(this).val());
    // Selecione os valores no checkbox
    $.each(selectedValue, function (key, value) {
        $(`#checkbox${value.id}`).prop('checked', true);
        $(`#ribbon-tag-${value.id}`).removeClass('d-none');
        if (idsSelectedModules.indexOf(value.id) === -1) {
            idsSelectedModules.push(value.id);
        }
    });

});

$('.basic-search-input').on('input', function() {

    let searchText = $(this).val().toLowerCase();

    $('.module-category-title').each(function() {
        let categoryTitle = $(this).text().toLowerCase();
        if (categoryTitle.includes(searchText)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });

    $('.modules-card-list .card').each(function() {
        let cardTitle = $(this).find('.module-name').text().toLowerCase();
        let cardCategory = $(this).find('.module-category').text().toLowerCase();
        if (cardTitle.includes(searchText) || cardCategory.includes(searchText)) {
            $(this).parent().show();
        } else {
            $(this).parent().hide();
        }
    });
});

function openDescriptionModal($description) {
    $('#descriptionModal .modal-body').html('<p>'+$description+'</p>');
    $('#descriptionModal').modal('show');
}

$('.ribbon-tag-additional').on('click', function () {
    if ($(this).is(':checked')) {
        $('#ribbon-tag-'+$(this).val()).removeClass('d-none');
    } else {
        $('#ribbon-tag-'+$(this).val()).addClass('d-none');
    }
});
