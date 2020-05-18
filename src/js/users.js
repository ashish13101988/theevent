$(document).ready(function(){

    const fetch_all_users = function(){
        $.ajax({
            type: 'GET',
            url: USERS_ALL,
            dataType: 'json',
            beforeSend: function (xhr) {
                if (sessionStorage.getItem('token') != null) {
                    xhr.setRequestHeader('Authorization', sessionStorage.getItem('token'));
                }
            },
            success: function (res) {
                let html;
                console.log(Object.entries(res.data));
                for (const [key, value] of Object.entries(res.data)) {
                   html = `<tr>
                                <td>${value.name.ucwords()}</td>
                                <td>${value.email.ucwords()}</td>
                                <td>${value.phone}</td>
                                <td>${value.user_role}</td>
                            </tr>`
                    $('#userDetails').append(html);
                }

                

            },
            error: function () {
                alert("Sorry, you are not logged in.");
            }

        });//ajaxbrackete;
    }//fetch all users;


    fetch_all_users();
});