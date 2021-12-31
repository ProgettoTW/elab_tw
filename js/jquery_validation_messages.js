jQuery.extend(jQuery.validator.messages, {
    required: "Compila questo campo.",
    email: "Inserire una mail valida.",
    equalTo: "La password non corrisponde.",
    maxlength: jQuery.validator.format("Inserisci al massimo {0} caratteri."),
    minlength: jQuery.validator.format("Inserisci almeno {0} caratteri."),
});
