
//       Validação de formulário de cadastro de parceiros //
// -----------------------------
// Mostrar formulário
var stepsValidation = $(".wizard-shop-users");
var form = stepsValidation.show();

stepsValidation.steps({
    headerTag: "h6",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: 'Salvar'
    },
    onStepChanging: function (event, currentIndex, newIndex) {
        // Sempre permitir ação anterior mesmo que o formulário atual não seja válido
        if (currentIndex > newIndex) {
            return true;
        }
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onFinishing: function (event, currentIndex) {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex) {
        return form.submit();
    }
});

// Initialize validation
stepsValidation.validate({
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
    rules: {
        shop_id: {
            required: true
        },
        name: {
            required: true
        },
        email: {
            required: true
        },
        password: {
            required: true,
            minlength: 10,
        }
    },
    messages: {
        shop_id: {
            required: "Selecione o parceiro"
        },
        name: {
            required: "O nome é obrigatório"
        },
        email: {
            required: "O email é obrigatório"
        },
        password: {
            required: "A senha é obrigatória",
            minlength: "Tamanho mínimo 10 caracteres",
        }
    }
});
