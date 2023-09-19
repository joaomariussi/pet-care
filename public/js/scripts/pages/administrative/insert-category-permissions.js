//       Validação de formulário de cadastro de Permissões //
// -----------------------------
// Mostrar formulário
let stepsValidationcategoryPermissions = $(".wizard-permissions");

// Initialize validation
stepsValidationcategoryPermissions.validate({
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
            let error = $(validator.errorList[i].element).data('monitorar-error-category-permissions') // pega o atributo data-monitorar-error do elemento
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
        type: {
            required: true
        }
    },
    messages: {
        name: {
            required: "O nome da categoria é obrigatório"
        },
        type: {
            required: "O tipo da categoria é obrigatório"
        }
    }
});
