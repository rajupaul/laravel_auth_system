$('.login_button').on('click',function(){

    $('#registerModal').modal('hide');
    $('#loginModal').modal('show');
});

$('.register_button').on('click',function(){

     $('#loginModal').modal('hide');
     $('#registerModal').modal('show');
});


function recaptchaDataCallbackRegister(response){
  $('#hiddenRecaptchaRegister').val(response);
  $('#hiddenRecaptchaRegisterError').html('');
}

function recaptchaExpireCallbackRegister(){
 $('#hiddenRecaptchaRegister').val('');
}


function recaptchaDataCallbackLogin(response){
  $('#hiddenRecaptchaLogin').val(response);
  $('#hiddenRecaptchaLoginError').html('');
}

function recaptchaExpireCallbackLogin(){
 $('#hiddenRecaptchaLogin').val('');
}


$('#regitration_form').validate({
    ignore:'.ignore',
    errorClass:'invalid',
    validClass:'success',
    rules:{
     first_name:{
     	required:true,
     	minlength:2,
     	maxlength:100
     },
     last_name:{
     	required:true,
     	minlength:2,
     	maxlength:100
     },
     email:{
     	required:true,
     	email:true,
        remote: {
            url: baseUrl+"/auth/check_email_unique",
            type: "post",
            data: {
              email: function() {
                return $( "#email" ).val();
              },
              '_token':$('meta[name="csrf-token"]').attr('content')
            }
        }
        
     },
     password:{
     	required:true,
     	minlength:6,
     	maxlength:100
     },
     confirm_password:{
     	required:true,
     	equalTo:'#password'
     },
     terms:"required",
     grecaptcha:"required"

    },
	 messages: {
	    first_name: {
	  		required:"Please enter first name"
	    },
	    last_name: {
	  		required:"Please enter last name"
	    },
	    email: {
	      required: "We need your email address to contact you",
	      email: "Your email address must be in the format of name@domain.com",
	      remote:"Email already in use. Try with different email"
	    },
	    password:{
	    	required:"Enter your password"
	    },
	    confirm_password:{
	    	required:"Need to confirm your password"
	    },
	    terms:"Please accept our terms and conditions",
	    grecaptcha:"Captcha field is required"
	 },
	 errorPlacement:function(error,element){
        if(element.attr('name')=='terms'){
        	error.appendTo($('#terms_error'));
        }
        else if(element.attr('name')=='grecaptcha'){
            error.appendTo($('#hiddenRecaptchaRegisterError'));
        }
        else{
        	error.insertAfter(element);
        }
	 },
     submitHandler:function(form){
        
        $.LoadingOverlay("show");
        form.submit();
     }

});

var register_validator=$('#modal_regitration_form').validate({
    ignore:'.ignore',
    errorClass:'invalid',
    validClass:'success',
    rules:{
     first_name:{
        required:true,
        minlength:2,
        maxlength:100
     },
     last_name:{
        required:true,
        minlength:2,
        maxlength:100
     },
     email:{
        required:true,
        email:true,
        remote: {
            url: baseUrl+"/auth/check_email_unique",
            type: "post",
            data: {
              email: function() {
                return $( "#register_email" ).val();
              },
              '_token':$('meta[name="csrf-token"]').attr('content')
            }
        }
        
     },
     password:{
        required:true,
        minlength:6,
        maxlength:100
     },
     confirm_password:{
        required:true,
        equalTo:'#register_password'
     },
     terms:"required",
     grecaptcha:"required"

    },
     messages: {
        first_name: {
            required:"Please enter first name"
        },
        last_name: {
            required:"Please enter last name"
        },
        email: {
          required: "We need your email address to contact you",
          email: "Your email address must be in the format of name@domain.com",
          remote:"Email already in use. Try with different email"
        },
        password:{
            required:"Enter your password"
        },
        confirm_password:{
            required:"Need to confirm your password"
        },
        terms:"Please accept our terms and conditions",
        grecaptcha:"Captcha field is required"
     },
     errorPlacement:function(error,element){
        if(element.attr('name')=='terms'){
            error.appendTo($('#terms_error'));
        }
        else if(element.attr('name')=='grecaptcha'){
            error.appendTo($('#hiddenRecaptchaRegisterError'));
        }
        else{
            error.insertAfter(element);
        }
     },
     submitHandler:function(form){
        
        $.LoadingOverlay("show");
        //form.submit();
      var formData = new FormData(form);
      $.ajax({
        url: baseUrl+"/auth/ajax-register",
        type: "POST",
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
           toastr.success(data.message, 'Success', {timeOut: 5000});
           form.reset();
           register_validator.resetForm();
           grecaptcha.reset(1);
           $('#hiddenRecaptchaRegister').val('');
           $.LoadingOverlay("hide");

          setTimeout(function(){
            window.location.href=data.redirect_url;
          },2000);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           $.LoadingOverlay("hide");
           var response=jqXHR.responseJSON;
           var status=jqXHR.status;

           form.reset();
           register_validator.resetForm();
           grecaptcha.reset(1);
           $('#hiddenRecaptchaRegister').val('');

           if(status=='422'){
            //console.log(response.errors,'response.errors');
            for (const property in response.errors) {
              toastr.error(response.errors[property][0], 'Error', {timeOut: 5000})
            }

           }
           else if(status=='400') {
             toastr.error(response.message, 'Error', {timeOut: 5000});

           }
           else{
             toastr.error('Internal server error.', 'Error', {timeOut: 5000})
           }
         

        }
     });

        

     }

});
$('#login_form').validate({
    ignore:'.ignore',
    errorClass:'invalid',
    validClass:'success',
    rules:{

     email:{
        required:true,
        email:true,  
     },
     password:{
        required:true,
        minlength:6,
        maxlength:100
     },
     grecaptcha:"required"

    },
     messages: {

        email: {
          required: "Email is required",
          email: "Your email address must be in the format of name@domain.com",

        },
        password:{
            required:"Enter your password"
        },
        grecaptcha:"Captcha field is required"
     },
     errorPlacement:function(error,element){
        if(element.attr('name')=='grecaptcha'){
            error.appendTo($('#hiddenRecaptchaLoginError'));
        }
        else{
            error.insertAfter(element);
        }
     },
     submitHandler:function(form){
        
        $.LoadingOverlay("show");
        form.submit();
     }

});


var login_validator=$('#modal_login_form').validate({
    ignore:'.ignore',
    errorClass:'invalid',
    validClass:'success',
    rules:{

     email:{
        required:true,
        email:true,  
     },
     password:{
        required:true,
        minlength:6,
        maxlength:100
     },
     grecaptcha:"required"

    },
     messages: {

        email: {
          required: "Email is required",
          email: "Your email address must be in the format of name@domain.com",

        },
        password:{
            required:"Enter your password"
        },
        grecaptcha:"Captcha field is required"
     },
     errorPlacement:function(error,element){
        if(element.attr('name')=='grecaptcha'){
            error.appendTo($('#hiddenRecaptchaLoginError'));
        }
        else{
            error.insertAfter(element);
        }
     },
     submitHandler:function(form){
        
        $.LoadingOverlay("show");
        //form.submit();

      var formData = new FormData(form);
      $.ajax({
        url: baseUrl+"/auth/ajax-login",
        type: "POST",
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
          toastr.success(data.message, 'Success', {timeOut: 5000});
           form.reset();
           login_validator.resetForm();
           grecaptcha.reset(0);
           $('#hiddenRecaptchaLogin').val('');
          $.LoadingOverlay("hide");

          setTimeout(function(){
            window.location.href=data.redirect_url;
          },2000);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           $.LoadingOverlay("hide");
           var response=jqXHR.responseJSON;
           var status=jqXHR.status;

           form.reset();
           login_validator.resetForm();
           if(status=='422'){
            //console.log(response.errors,'response.errors');
            for (const property in response.errors) {
              
              toastr.error(response.errors[property][0], 'Error', {timeOut: 5000})
            }

           }
           else if(status=='400') {
             toastr.error(response.message, 'Error', {timeOut: 5000});

           }
           else{
             toastr.error('Internal server error.', 'Error', {timeOut: 5000})
           }
         
           grecaptcha.reset(0);
           $('#hiddenRecaptchaLogin').val('');
        }
     });



     }

});