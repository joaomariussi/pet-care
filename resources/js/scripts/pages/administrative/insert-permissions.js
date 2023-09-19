let permissionCategoryId = $('#permission_category_id');
let parentId = $('#parent_id');
let moduleId = $('#module_id');

// Validação de formulário de cadastro de Permissões //
// -----------------------------
// Mostrar formulário
let stepsValidationPermissions = $(".wizard-permissions");

// Initialize validation
stepsValidationPermissions.validate({
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
            let error = $(validator.errorList[i].element).data('monitorar-error-permissions') // pega o atributo data-monitorar-error do elemento
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
        label: {
            required: true
        },
        permission_category_id: {
            required: true
        },
        description: {
            required: true
        }
    },
    messages: {
        name: {
            required: "O nome de utilização é obrigatório"
        },
        label: {
            required: "O nome de exibição é obrigatório"
        },
        permission_category_id: {
            required: "A categoria é obrigatória"
        },
        description: {
            required: "Informe uma breve descrição"
        }
    }
});

function changeType(type) {
    $.get("get-data-view-insert-categories-permissions/" + type, function (response) {
        if (response['data']) {
            emptySelect();
            switch (type) {
                case 'application':
                    applicationIsSelected(response['data']);
                    break;
                case 'module':
                    moduleIsSelected(response['data']);
                    break;
                default:
                    break;
            }
        } else {
            notifyError(response['error'])
        }
    });
}

function emptySelect() {
    moduleId.empty();
    parentId.empty();
    permissionCategoryId.empty();
}

function applicationIsSelected(data) {
    moduleId.append(`<option selected value="">-</option>`).attr('disabled', false);
    mountPermissions(data['permissions']);
    mountPermissionsCategory(data['permissionCategories']);
}

function moduleIsSelected(data) {
    mountPermissions(data['permissions']);
    mountPermissionsCategory(data['permissionCategories']);
    mountModules(data['modules']);
}

function mountPermissions(permissions) {
    parentId.append(`<option selected disabled>Selecione..</option>`);
    $.each(permissions, function (key, value) {
        parentId.append(`<option title="${value.label} | ${value.description}" value="${value.id}">${value.name}</option>`);
    });
    parentId.attr('disabled', false);
}

function mountPermissionsCategory(permissionCategories) {
    permissionCategoryId.append(`<option selected disabled>Selecione..</option>`);
    $.each(permissionCategories, function (key, value) {
        permissionCategoryId.append(`<option value="${value.id}">${value.name}</option>`);
    });
    permissionCategoryId.attr('disabled', false);
}

function mountModules(modules) {
    moduleId.append(`<option selected disabled>Selecione..</option>`);
    $.each(modules, function (key, value) {
        moduleId.append(`<option title="${value.description}" value="${value.id}">${value.name}</option>`);
    });
    moduleId.attr('disabled', false);
}