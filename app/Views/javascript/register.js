$(document).ready(() => {

    $('#register-form').submit(function (e) {
        e.preventDefault();

        let inputs = {};
        $(this).find(':input').each(function () {
            inputs[$(this).attr("name")] = $(this).val();
        });

        function validateUserName(inputs) {
            var usernameRegex = /^[a-zA-Z0-9]/;
            return usernameRegex.test(inputs['username']);
        }

        function validatePassword(inputs) {
            var passwordRegex = /^[a-zA-Z0-9]+$/;
            return passwordRegex.test(inputs['password']);

        }

        if (inputs['username'] == '' || inputs['password'] == '' || inputs['confirmpassword'] == '') {
            if (inputs['username'] == '') {
                $("#fillAlert").css("display", "revert");
            }

            if (inputs['password'] == '') {
                $("#fillAlertPw").css("display", "revert");
            }
            if (inputs['confirmpassword'] == '') {
                $("#fillAlertCnfPw").css("display", "revert");
            }


        } else if (inputs['password'] !== inputs['confirmpassword']) {
            if (inputs['password'] !== inputs['confirmpassword']) {
                $("#DidntMatchAlert").css("display", "revert");
            }
        } else if (validateUserName(inputs['username']) === false) {
            alert("Ne sodrzi soodvetni elementi");
        } else {
            $.ajax({
                type: "POST",
                url: "/MyForum/register",
                data: {
                    "username": inputs['username'],
                    "password": inputs['password']
                },
                success: function (data) {
                    window.location.replace("/MyForum/login");
                },
                error: function (request, error) {
                    console.log("ERROR:" + error);
                }
            });
        }
    });
});