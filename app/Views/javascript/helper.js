
function logout(){
    $.ajax({
        type:"POST",
        url:"/MyForum/logout",
        success: function (data){
            location.reload(true);
            sessionStorage.setItem('loggedin',false);

        },
        error: function (xhr, status, error){
            console.error(xhr);
        }

    });
}