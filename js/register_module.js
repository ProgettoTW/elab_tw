$.validator.addMethod('phone', function (value, element) {
    return this.optional(element) || /^\d{6,10}$/.test(value);
}, "Inserisci un numero valido.");

$.validator.addMethod('password', function (value, element) {
    return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(value);
}, "Password non valida.");

$(document).ready(function () {
    $('#register_form').validate({
        rules: {
            nome: {
                minlength: 2,
                required: true
            },
            cognome: {
                minlength: 2,
                required: true
            },
            born_date: {
                required: true
            },
            telefono: {
                phone: true,
                required: true
            },
            email: {
                email: true,
                required: true
            },
            p: {
                password: true,
                required: true
            },
        },
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('success').addClass('error');
        },
        success: function (element) {
            element.text('Valido!').addClass('valid')
                .closest('.form-group').removeClass('error').addClass('success');
        }
    });
});
