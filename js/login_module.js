$(document).ready(function(){
  $('#login_form').validate({
    rules:{
      emailLogin:{
        email: true,
        required: true
      },
      passwordLogin:{
        required: true
      },
    },
    highlight: function (element){
      $(element).closest('.form-group').removeClass('success').addClass('error');
    },
    success: function (element) {
            element.text('OK!').addClass('valid')
                .closest('.form-group').removeClass('error').addClass('success');
    }
  });
});
