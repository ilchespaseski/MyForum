$(document).ready(() => {
    result =  sessionStorage.getItem('loggedin');
    username = sessionStorage.getItem('username');

    if(result === 'true') {
        $('#login-btn').hide();
        $('#register-btn').hide();
        $('#logout-btn').show()

    }
    else {
        $('#login-btn').show();
        $('#login-btn').show();
        $('#logout-btn').hide()
    }

    $("#logout-btn").click(function (){
       logout();
    });
});