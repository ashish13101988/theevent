

<script>
    let currentPage = "<?php echo $currentPage;?>";
    const LOCAL_SERVER = $(location).attr('hostname');
    let BASE_PATH;
   

    if(LOCAL_SERVER == 'localhost' || LOCAL_SERVER == '127.0.0.1' || LOCAL_SERVER == ''){
        BASE_PATH = 'http://localhost/mvc/public/';
    }else{
       // BASE_PATH = 'http://phpstack-143196-1200660.cloudwaysapps.com/mvc/public/';
    }

    const AUTH_CHECK        = BASE_PATH+'users/userAuth/';
    const USER_CREATE       = BASE_PATH+'users/create/';
    const USERS_ALL         = BASE_PATH+'users/';
    const USER_EMAIL_CHECK  = BASE_PATH+'users/emailExist/';
    const USER_EMAIL_NOT_EXIST = BASE_PATH+'users/emailNotExist/';

   
    //to capitalize first charc of string
        String.prototype.capitalize = function () {
            return this.charAt(0).toUpperCase() + this.slice(1);
        }

     //to capitalize first charc of every string
        String.prototype.ucwords = function() {
            return this.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                return letter.toUpperCase();
            });
        }
    /********************************************************************************************* */
   
    function noticePopup(msg, alertStatus) {
        return `<div class="alert alert-${alertStatus} alert-dismissible fade show notice_popup" role="alert">
                <strong>${msg}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                </div>`;
    }
    
/****************************************************************************************************/

    function submitFunction(formData,url){
        return $.ajax({
            url: url,
            type: "POST",
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false
            
        });
    }

/*****************************************************************************************************/

const checkHasToken = function(){
    return sessionStorage.getItem('token') == null ? false : true;
   
}
const sendToLogin = function(){
    location.href = 'login';
}
const loginRequired = function(currentPage){
    const loginRequiredPage = [];
    if(loginRequiredPage.indexOf(currentPage) > -1){
        return true;
    }
}

 

/******************************************************************************/
   /*  if(!checkHasToken() && loginRequired(currentPage)) {
        sendToLogin();
    }
     */
    
    showUser();
    
    $('.custom-dropDown').hide();


    function showUser(){
        let url= BASE_PATH+'users/tokenVerified';
                
                    $.ajax({
                    type:'POST',
                    url : url,
                    dataType:'JSON',
                    headers:{
                        'Authorization': sessionStorage.getItem('token'),
                        'Content-Type':'application/json'
                    },
                    
                        success: function(res) {
                            if(res.status == 1){
                            
                                    if (typeof(Storage) !== "undefined") {
                                        // Store
                                        sessionStorage.setItem("username", res.data.data.name);
                                        sessionStorage.setItem("useremail", res.data.data.email);
                                        sessionStorage.setItem("userid", res.data.data.id);
                                        sessionStorage.setItem("userrole", res.data.data.role);
                                        // Retrieve
                                        
                                    } else {
                                        alert("Sorry, your browser does not support Web Storage...");
                                    }

                                    $('.username').html(sessionStorage.getItem('username').toUpperCase());
                                    $('.login-nav').hide();
                                    $('.signup-nav').hide();
                                    $('.custom-dropDown').show();
                            }
                        
                        }

                    });//ajax bracket
    }
/****************************************************************************************************/   
    $(document).ready(function(){
        
        //logout
        $('#logoutBtn').click(function(e){
            e.preventDefault();
            
            sessionStorage.clear();
            $('.login-nav').show();
            $('.signup-nav').show();
            $('.custom-dropDown').hide();
            
        });

    });//documentbracket
    
    
    
</script>