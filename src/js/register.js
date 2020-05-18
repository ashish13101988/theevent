$(document).ready(function(){

    
    $('#userRegisterForm').validate({
        
        rules: {
            // simple rule, converted to {required:true}
            
            firstName: {
                required: true,
                minlength:2,
                nowhitespace: true,
                lettersonly:true,
                
            },
            lastName: {
                required: true,
                minlength: 2,
                nowhitespace: true,
                lettersonly: true,
                
            },
            pwd:{
            required:true,
            minlength: 8,
            maxlength:16
            },
            repeatPassword: {
                required: true,
                equalTo: '#registerPassword'
            },

        email: {
            required: true,
            email: true,
                remote: {
                    url: USER_EMAIL_NOT_EXIST,
                    type: "post",
                    data: {
                        email: function () {
                            return $("#registerInputEmail").val();
                        }
                    }
                }

        },

        },
        messages: {
            firstName:{
                required: "Please specify your first name",
            },
            lastName: {
                required: "Please specify your last name",
            },
                
            email: {
                required: "We need your email address to contact you",
                email: "Your email address must be in the format of name@domain.com", 
                remote:"email already taken",                   
            },
            pwd:{
                required:'Password is required field'
            },
            repeatPassword: {
                required: 'Repeat password is required field',
                equalTo:'Both password must be same'
            }
        },
        submitHandler: function (form) {
            let userRegisterForm = $('#userRegisterForm')[0];
            let fullname = $('#registerFirstName').val() +' '+ $('#registerLastName').val();
           
            let formData = new FormData(userRegisterForm);
             formData.append('fullname', fullname);
            
            $.when(submitFunction(formData, USER_CREATE)).done(function (res) {
                if (res.status == 1) {
                    $('#userRegisterForm')[0].reset();
                    setTimeout(function () {
                        location.href = 'login';
                    }, 5000);
                    $('#signupMsg').html(noticePopup('Your account has been created. Go to <a href="login">Login</a>', 'success'));
                } else {
                    $('#signupMsg').html(noticePopup(res.msg, 'warning'));
                }
            });


            

        }

    });
});