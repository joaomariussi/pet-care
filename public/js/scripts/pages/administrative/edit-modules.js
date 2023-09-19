

//       Validação de formulário de cadastro de parceiros //
// -----------------------------
// Mostrar formulário
var stepsValidationEditModules = $(".wizard-modules-edit");

// Initialize validation
stepsValidationEditModules.validate({
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
            let error = $(validator.errorList[i].element).data('monitorar-error-edit-modules') // pega o atributo data-monitorar-error do elemento
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
        category_id: {
            required: true
        },
        module_class : {
            required: true
        },
        setup_url : {
            required: true
        }
    },
    messages: {
        name: {
            required: "O nome é obrigatório"
        },
        category_id: {
            required: "Selecione uma categoria"
        },
        module_class : {
            required: "Informe a classe que implementa o módulo no sistema"
        },
        setup_url : {
            required: "Informe a rota para o botão configurar"
        }
    }
});

// Função para alterar imagens dos módulos
let checked = $('.editlogoModule');

const readURL = (input) => {
    if (input.files && input.files[0]) {
        const reader = new FileReader()
        reader.onload = (e) => {
            $('#preview').attr('src', e.target.result)
        }
        reader.readAsDataURL(input.files[0])
    }
}

$(checked).on('change', function() {
    readURL(this)
    let i
    if ($(this).val().lastIndexOf('\\')) {
        i = $(this).val().lastIndexOf('\\') + 1
    } else {
        i = $(this).val().lastIndexOf('/') + 1
    }
})
// End Função
