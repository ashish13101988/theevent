$(document).ready(function(){

    $('#userLoginForm').validate({
       //debug:true
        rules:{
            email: {
                required:true,
                email: true,
                    remote: {
                        url: USER_EMAIL_CHECK,
                        type: "post",
                        data: {
                            email: function() {
                                return $("#loginInputEmail").val();
                            }
                        }
                    }
            },
            pwd:'required'
        },
        messages :{
                email:{
                    required: 'Please enter your email for login',
                    remote:'Registered email not found'
                },
                pwd:{
                    required:'Password is mandatory'
                }
            
        },
        submitHandler: function (form) {
            let userLoginForm = $('#userLoginForm')[0];
            let formData = new FormData(userLoginForm);
            $.when(submitFunction(formData, AUTH_CHECK)).done(function (res) {
                
                if(res.status == 1){
                    sessionStorage.setItem("token",res.jwt);
                    location.href = 'home';
                    
                }else{
                    $('#loginMsg').html(noticePopup(res.msg, 'warning'));
                }
            });

        },
    });
});