// Get the input field
$(document).ready(function () {
    $('#login-btn').hide();

    var input = document.getElementById("Password");

    input.addEventListener("keypress", function (event) {
        // If the user presses the "Enter" key on the keyboard
        if (event.key === "Enter") {
            Checking();
        }
    });

    function Checking() {
        //Getting values from inputs
        var username = $("#userName").val();
        var password = $("#Password").val();

        //Checking is empty
        if (username == '' || password == '') {
            console.log('Please fill in');
        } else {
            $.ajax({
                type: "POST",
                url: "/sign-in",
                data: {

                    username: username,
                    password: password,

                },
                success: function (data) {

                    data = jQuery.parseJSON(data);
                    if (data.logging === false) {

                        $("#usrpwinccorect").css('display', 'revert');

                    } else {

                        sessionStorage.setItem("username", data.username);
                        sessionStorage.setItem("loggedin", data.logging);
                        location.href = "/";

                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr + status + error);
                }
            });
        }
    }

    $("#submit").click(function () {

        Checking();

    })

});

