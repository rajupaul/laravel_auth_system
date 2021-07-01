$('#edit_profile_form').validate({
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

    },
	 messages: {
	    first_name: {
	  		required:"Please enter first name"
	    },
	    last_name: {
	  		required:"Please enter last name"
	    },

	 },

     submitHandler:function(form){
        
        $.LoadingOverlay("show");
        form.submit();
     }

});






$('#change_password_form').validate({
    ignore:'.ignore',
    errorClass:'invalid',
    validClass:'success',
    rules:{
         old_password:{
            required:true,
            minlength:6,
            maxlength:100
         },
         new_password:{
            required:true,
            minlength:6,
            maxlength:100
         },
         confirm_password:{
            required:true,
            equalTo:'#new_password'
         },
    },
     messages: {
     
        old_password:{
            required:"Enter your old password"
        },
        new_password:{
            required:"Enter your new password"
        },
        confirm_password:{
            required:"Need to confirm your new password"
        },

     },
     submitHandler:function(form){
        $.LoadingOverlay("show");
        form.submit();
     }

});













