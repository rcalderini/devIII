//------------- Login.js -------------//
$(document).ready(function() {

	//validate login form
    $("#login-form").validate({
        ignore: null,
        ignore: 'input[type="hidden"]',
        errorPlacement: function( error, element ) {
            var place = element.closest('.input-group');
            if (!place.get(0)) {
                place = element;
            }
            if (place.get(0).type === 'checkbox') {
                place = element.parent();
            }
            if (error.text() !== '') {
                place.after(error);
            }
        },
        errorClass: 'help-block',
        rules: {
            username: {
                required: true,
                minlength: 4
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            username: {
                required: "Digite seu email",
                minlength: "Email inválido"
            },
            password: {
                required: "Insira sua senha",
                minlength: "Sua senha é maior que 6 caracteres"
            }
        },
        highlight: function( label ) {
            $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        success: function( label ) {
            $(label).closest('.form-group').removeClass('has-error');
            label.remove();
        }
    });
});