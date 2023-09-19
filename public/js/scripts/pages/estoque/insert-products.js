//       Validação de formulário de cadastro de parceiros //
// -----------------------------
// Mostrar formulário
var stepsValidation = $(".wizard-product");
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
        alert('Produto Cadastrado com Sucesso!');
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
    // rules: {
    //     name: {
    //         required: true
    //     },
    //     category_id: {
    //         required: true
    //     }
    // },
    // messages: {
    //     name: {
    //         required: "O nome é obrigatório"
    //     },
    //     category_id: {
    //         required: "Selecione uma categoria"
    //     }
    // }
});
