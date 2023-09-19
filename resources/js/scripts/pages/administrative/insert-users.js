
//       Validação de formulário de cadastro de parceiros //
// -----------------------------
// Mostrar formulário
var stepsValidationUsers = $(".wizard-users");

// Initialize validation
stepsValidationUsers.validate({
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
            let error = $(validator.errorList[i].element).data('monitorar-error-insert-users') // pega o atributo data-monitorar-error do elemento
            $(`.${error}`).addClass('bg-label-danger') // adiciona a classe bg-label-danger no elemento com a classe igual ao atributo data-monitorar-error
        }
        // Função para remover a classe bg-label-danger quando o usuário digitar algo no input
        $('.form-control').keyup(function () {
            $(this).closest('.accordion-item').children('.accordion-button').removeClass('bg-label-danger')
        })

    },
    ignore: "hidden",
    rules: {
        partner_id: {
            required: true
        },
        name: {
            required: true
        },
        email: {
            required: true
        }
    },
    messages: {
        partner_id: {
            required: "Selecione o parceiro"
        },
        name: {
            required: "O nome é obrigatório"
        },
        email: {
            required: "O email é obrigatório"
        }
    }
});
