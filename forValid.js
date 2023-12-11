$(function(){
    $.validator.addMethod("customPassword", function(value, element) {
        return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
      }, "Password must contain at least one lowercase letter, one uppercase letter, one special character, and have a minimum length of 8 characters");
  

    $("form").validate({
        rules:{
            username:{
                required:true,
                minlength:2,
            },
            password:{
                required:true,
                minlength:8,
                customPassword:true
            },
            confirm_password:{
                required:true,
                equalTo:'#123'
            },
            phone:{
                required:true,
                minlength:10,
                maxlength:10
            },
            email:{
                required:true,
                email:true


            },
            
        },
        messages:{
            username:{
                required:'enter a username',
                minlength:'enter more than two values'
            },
            password:{
                required:'enter password',
                minlength:'length more than 8'

            },
            confirm_password:{
                required:'enter password',
                minlength:"length more than 8",
                equalTo:'please enter the same password'
            },
            email:{
                required:'enter a email',
                email:'enter a valid email'
            },
            

        },
        submitHandler: function(form) {

            $('forms').submit(function(){
                let formdata={

                 username:$('#username').val()
                }
                alert(formdata.username)
            })
            
          }
          
    });
    
})