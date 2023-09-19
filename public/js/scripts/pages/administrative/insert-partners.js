//       Validação de formulário de cadastro de parceiros //
// -----------------------------
// Mostrar formulário
var stepsValidationInsertPartner = $(".wizard-partners-insert");

// Initialize validation
stepsValidationInsertPartner.validate({
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
            let error = $(validator.errorList[i].element).data('monitorar-error-insert-partner') // pega o atributo data-monitorar-error do elemento
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
        identifier: {
            required: true
        },
        domain: {
            required: true
        },
        logo: {
            required: true
        },
        external_link: {
            required: true
        },
        favicon: {
            required: true
        },
        login_image: {
            required: true
        },
        color: {
            required: true
        },
        helpdesk: {
            required: true
        },
        modules: {
            required: true
        },
        invoice_email: {
            required: true
        },
        invoice_phone: {
            required: true
        },
        technical_manager: {
            required: true
        },
        module_price: {
            required: true
        },
        orders_marketplaces_limit: {
            required: true
        },
        visits_limit: {
            required: true
        },
        product_images_limit: {
            required: true
        },
        sales_limit: {
            required: true
        },
        user_limit: {
            required: true
        },
        customer_limit: {
            required: true
        },
        orders_limit: {
            required: true
        },
        product_limit: {
            required: true
        }
    },
    messages: {
        name: {
            required: "O nome é obrigatório"
        },
        identifier: {
            required: "O identificador é necessário"
        },
        domain: {
            required: "O domínio é obrigatório"
        },
        logo: {
            required: "O logo é obrigatório"
        },
        external_link: {
            required: "O link externo é obrigatório"
        },
        favicon: {
            required: "O favicon é obrigatório"
        },
        login_image: {
            required: "A imagem de login é obrigatória"
        },
        color: {
            required: "A cor é obrigatória"
        },
        helpdesk: {
            required: "O endereço do helpdesk é necessário"
        },
        modules: {
            required: "Os módulos são obrigatórios"
        },
        invoice_email: {
            required: "O email da fatura é necessário"
        },
        invoice_phone: {
            required: "O telefone da fatura é necessário"
        },
        technical_manager: {
            required: "O gerente técnico é necessário"
        },
        module_price: {
            required: "O Preço do módulo é necessário"
        },
        orders_marketplaces_limit: {
            required: "O Preço dessa métrica é necessário"
        },
        visits_limit: {
            required: "O Preço dessa métrica é necessário"
        },
        product_images_limit: {
            required: "O Preço dessa métrica é necessário"
        },
        sales_limit: {
            required: "O Preço dessa métrica é necessário"
        },
        user_limit: {
            required: "O Preço dessa métrica é necessário"
        },
        customer_limit: {
            required: "O Preço dessa métrica é necessário"
        },
        orders_limit: {
            required: "O Preço dessa métrica é necessário"
        },
        product_limit: {
            required: "O Preço dessa métrica é necessário"
        }
    }
});

//        Start função de inputs para adicionar images do parceiro         //

// Declaração das Variáveis utilizadas de cada input
let logo = $('.logoPartner');
let imgFavicon = $('.faviconPartner');
let imgLogin = $('.loginPartner');
let checkbox = $('.form-check-input');
let priceModule = $('.price-module');
let priceMetric = $('.price-metric');


// Adiciona preview da imagem na logo
const readURL = (input) => {
    if (input.files && input.files[0]) {
        const reader = new FileReader()
        reader.onload = (e) => {
            $('#preview').attr('src', e.target.result)
        }
        reader.readAsDataURL(input.files[0])
    }
}

// Adiciona preview da imagem no favicon
const readURLFavicon = (input) => {
    if (input.files && input.files[0]) {
        const reader = new FileReader()
        reader.onload = (e) => {
            $('#faviconImg').attr('src', e.target.result)
        }
        reader.readAsDataURL(input.files[0])
    }
}

// Adiciona preview da imagem no login
const readURLlogin = (input, id) => {
    if (input.files && input.files[0]) {
        const reader = new FileReader()
        reader.onload = (e) => {
            $('#login').attr('src', e.target.result)
        }
        reader.readAsDataURL(input.files[0])
    }
}

// Alteração da imagen se for selecionada um nova referente ao input desejado
$(logo).on('change', function() {
    readURL(this)
    let i
    if ($(this).val().lastIndexOf('\\')) {
        i = $(this).val().lastIndexOf('\\') + 1
    } else {
        i = $(this).val().lastIndexOf('/') + 1
    }
})

// Alteração da imagen se for selecionada um nova referente ao input desejado
$(imgFavicon).on('change', function() {
    readURLFavicon(this)
    let i
    if ($(this).val().lastIndexOf('\\')) {
        i = $(this).val().lastIndexOf('\\') + 1
    } else {
        i = $(this).val().lastIndexOf('/') + 1
    }
})

// Alteração da imagen se for selecionada um nova referente ao input desejado
$(imgLogin).on('change', function() {
    readURLlogin(this)
    let i
    if ($(this).val().lastIndexOf('\\')) {
        i = $(this).val().lastIndexOf('\\') + 1
    } else {
        i = $(this).val().lastIndexOf('/') + 1
    }
})

// Adiciona preview da imagem do logo do parceiro
$(logo).on('change', function () {

    let target = $("input[name='logo']");
    let vazio = true;

    // Verifica se o campo vazio é igual a false
    target.each(function (i, e) {
        if ($(e).val()) {
            vazio = false;
        }
    });

    // Se o campo for diferente de vazio adiciona a imagem na preview se não limpa o html
    if (!vazio) {
        $('#previewImgLogoPartner').html('<div class="col-12 col-xl-12 mt-3"><div class="card"><img class="d-flex align-self-center img-fluid" alt="" id="preview" src=""></div></div>')
    } else {
        $('#previewImgLogoPartner').html('')
    }
});

// Adiciona preview da imagem do favicon
$(imgFavicon).on('change', function () {
    let target = $("input[name='favicon']");
    let vazio = true;

    // Verifica se o campo vazio é igual a false
    target.each(function (i, e) {
        if ($(e).val()) {
            vazio = false;
        }
    });

    // Se o campo for diferente de vazio adiciona a imagem na preview se não limpa o html
    if (!vazio) {
        $('#previewImgFavicon').html('<div class="col-12 col-xl-12 mt-3"><div class="card"><img class="d-flex align-self-center img-fluid" alt=""  id="faviconImg" src=""></div></div>')
    } else {
        $('#previewImgFavicon').html('')
    }
});

// Adiciona preview da imagem do login do parceiro
$(imgLogin).on('change', function () {
    let target = $("input[name='login_image']");
    let vazio = true;

    // Verifica se o campo vazio é igual a false
    target.each(function (i, e) {
        if ($(e).val()) {
            vazio = false;
        }
    });

    // Se o campo for diferente de vazio adiciona a imagem na preview se não limpa o html
    if (!vazio) {
        $('#previewImgLogin').html('<div class="col-12 col-xl-12 mt-3"><div class="card"><img class="d-flex align-self-center img-fluid" alt="" id="login" src=""></div></div>')
    } else {
        $('#previewImgLogin').html('')
    }
})

// Regras de preço do módulo
$(checkbox).on('change', function () {
    let inputPrice = $(`#module_price${$(this).attr('value')}`);
    inputPrice
        .prop('disabled', !this.checked)
        .focus()
        .on('focusout', function () {
            if (inputPrice.val() === '') {
                notifyError('O campo preço é obrigatório');
                inputPrice.focus();
            }
        });
});

priceModule.mask('000.000,00', {reverse: true});
priceMetric.mask('000.000,0000', {reverse: true});
// End Function //

// Função para visualizar senha
$(document).ready(function() {
    $('#showPassword2').on('click', function() {
        let passwordField = $('#plataform_email_password');
        let passwordFieldType = passwordField.attr('type');

        if (passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
            $(this).removeClass('show');
            $(this).addClass('hide');
        } else {
            passwordField.attr('type', 'password');
            $(this).removeClass('hide');
            $(this).addClass('show');
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
