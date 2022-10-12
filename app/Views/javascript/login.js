// Get the input field
$(document).ready(function () {
    $('#login-btn').hide();
    var input = document.getElementById("Password");
    result = sessionStorage.getItem('loggedin');
    if (result == true) {
        location.href = "/";
    }
    input.addEventListener("keypress", function (event) {
        // If the user presses the "Enter" key on the keyboard
        if (event.key === "Enter") {
            Checking();
        }
    });

    function Checking() {
        var username = $("#userName").val();
        var password = $("#Password").val();
        if (username == '' || password == '') {
            console.log('popolni konju');
        } else {
            $.ajax({
                type: "POST",
                url: "/MyForum/login",
                data: {
                    username: username,
                    password: password,

                },
                cache: false,
                success: function (data) {
                    data = jQuery.parseJSON(data);

                    if (data === false) {
                        $("#usrpwinccorect").css('display', 'revert');
                    } else {
                        sessionStorage.setItem("username", data.username);
                        sessionStorage.setItem("loggedin", data.logging);
                        location.href = "/";

                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr);
                }
            });
        }
    }

    $("#submit").click(function () {

        Checking();

    })

});