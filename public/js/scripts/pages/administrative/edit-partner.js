//       Validação de formulário de cadastro de parceiros //
// -----------------------------
// Mostrar formulário
var stepsValidationEditPartner = $(".wizard-partners-edit");


// Initialize validation
stepsValidationEditPartner.validate({
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
            let error = $(validator.errorList[i].element).data('monitorar-error-edit-partner') // pega o atributo data-monitorar-error do elemento
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
        external_link: {
            required: true
        },
        color: {
            required: true
        },
        helpdesk: {
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
        external_link: {
            required: "O link externo é obrigatório"
        },
        color: {
            required: "A cor é obrigatória"
        },
        helpdesk: {
            required: "O endereço do helpdesk é necessário"
        },
        invoice_email: {
            required: "O email da fatura é necessário"
        },
        invoice_phone: {
            required: "O telefone da fatura é necessário"
        },
        technical_manager: {
            required: "O gerente técnico é necessário"
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

// Regras de preço do módulo
$(checkbox).on('change', function () {
    let inputPrice = $(`#module_price${$(this).attr('value')}`);
    inputPrice.mask('000.000,00', {reverse: true});
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
