$(document).ready(function(){
  $('#login_form').validate({
    rules:{
      email:{
        email: true,
        required: true
      },
      password:{
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
