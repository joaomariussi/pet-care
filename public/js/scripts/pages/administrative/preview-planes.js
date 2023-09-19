// 0 definido por default para evitar quebra de consulta
let idsSelectedModules = [0];
$(document).ready(function () {
    let modules = $('.module-price');
    $.each(modules, function (index, element) {
        element = $(element);
        let id = parseInt(element.val());
        if (idsSelectedModules.indexOf(id) === -1) {
            idsSelectedModules.push(id);
        }
    });
});

let product_limit = $('#product_limit');
let orders_limit = $('#orders_limit');
let customer_limit = $('#customer_limit');
let user_limit = $('#user_limit');
let sales_limit = $('#sales_limit');
let product_images_limit = $('#product_images_limit');
let visits_limit = $('#visits_limit');
let orders_marketplaces_limit = $('#orders_marketplaces_limit');

let metrics = {
    'product_limit':
        {
            'price': product_limit.data('price'),
            'quantity': product_limit.val() + ''
        },
    'orders_limit':
        {
            'price': orders_limit.data('price'),
            'quantity': orders_limit.val()
        },
    'customer_limit':
        {
            'price': customer_limit.data('price'),
            'quantity': customer_limit.val()
        },
    'user_limit':
        {
            'price': user_limit.data('price'),
            'quantity': user_limit.val()
        },
    'sales_limit':
        {
            'price': sales_limit.data('price') + '',
            'quantity': sales_limit.val()
        },
    'product_images_limit':
        {
            'price': product_images_limit.data('price'),
            'quantity': product_images_limit.val()
        },
    'visits_limit':
        {
            'price': visits_limit.data('price'),
            'quantity': visits_limit.val()
        },
    'orders_marketplaces_limit':
        {
            'price': orders_marketplaces_limit.data('price'),
            'quantity': orders_marketplaces_limit.val()
        },
};

$('.resume-price-plan').on('click', function () {
    let token = $('meta[name="csrf-token"]').attr('content');

    $.post('/financial/plan-budget',
        {'_token': token, 'modulesIds[]': idsSelectedModules, 'metrics': metrics, 'idPartner': $('#idPartner').val()},
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
                    let content = '<span class="color-red-geral">Quantidade não definida</span><hr>';
                    if (value.price === 0) {
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
