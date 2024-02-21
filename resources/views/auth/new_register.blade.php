<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Now | Click Invitation</title>
    <meta name="description" content="Register now for Click Invitation and gain access to a world of exciting events and valuable connections. Join today and take your next event to new heights.">
    <link rel="stylesheet" href="assets/newcss/style.css">
    <link rel="canonical" href="https://clickinvitation.com/register">
    <link rel="icon" type="image/x-icon" href="assets/newimages/Fav-Icon.png">
    <link href="https://fonts.cdnfonts.com/css/night" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="site-logo-img">
            <a href="/" class="site-logo"><img src="/assets/newimages/Group 1.png" alt="click-invitation"></a>
        </div>
        <div class="register-form-container">
            <h1>let’s Get started</h1>
            <form action="/register" method="post" class="Register-form" onsubmit="return false;" id="register-form">
                <div style="display: flex;">
                    <input type="text" id="firstnamereg" name="first_name" placeholder="First Name" required>
                    <input type="text" id="surnamereg" name="last_name" placeholder="Last Name" required>
                </div>
                <br><br>
                <input type="email" id="emailreg" class="email" name="email" placeholder="Email Address"
                    required><br><br>
                <span id="email"
                    style="display:none;color: #ff3535;font-size: 16px;margin-left: 32px;">{{ __('register.This email is already in use') }}</span>
                <input type="number" id="phonereg" class="email" name="phonereg" placeholder="Enter Your Phone"
                    required><br><br>

                <div class="password-input">
                    <input type="password" id="passwordreg" name="password" placeholder="Password" required>
                    <span id="showPassword" style="cursor: pointer;"><i class="fas fa-eye"></i></span>
                </div><br><br>
                <input type="checkbox" id="terms" name="terms" class="checkbox" required>
                <span style="color: gray;">I accept Click Invitation’s <a href="/privacy">Term of
                        Services</a></span><br><br>
                <input type="submit" value="Register" class="register-button" id="register" onclick="return false;">
            </form>
            <p>Already have an account? <a href="/login">Login</a></p>
        </div>
    </div>
    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/modernizr-3.6.0.min.js"></script>
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/magnific-popup.min.js"></script>
    <script src="/assets/js/jquery-ui.min.js"></script>
    <script src="/assets/js/wow.min.js"></script>
    <script src="/assets/js/waypoints.js"></script>
    <script src="/assets/js/nice-select.js"></script>
    <script src="/assets/js/owl.min.js"></script>
    <script src="/assets/js/counterup.min.js"></script>
    <script src="/assets/js/paroller.js"></script>
    <script src="/assets/js/countdown.js"></script>
    <script src="/assets/js/main.js"></script>

    <script>
        $(document).ready(function() {

            /*var password = document.getElementById("passwordreg")
              , confirm_password = document.getElementById("confirm_password");

            function validatePassword(){
              if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Le password non coincidono");
              } else {
                confirm_password.setCustomValidity('');
              }
            }

            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;*/

            $("#register").click(function() {
                if ($("#register-form")[0].checkValidity()) {

                    var emailreg = $("#emailreg").val();
                    var passwordreg = $("#passwordreg").val();
                    var phonereg = $("#phonereg").val();
                    var firstnamereg = $("#firstnamereg").val();
                    var surnamereg = $("#surnamereg").val();

                    $('#register').attr("disabled", true);
                    $('#register').html(
                        '<div id=\'spinner\' class="fa-2x"><i class="fas fa-circle-notch fa-spin"></i></div>'
                    );



                    $.ajax({
                        type: "POST",
                        url: "/register",
                        data: JSON.stringify({
                            "_token": "{{ csrf_token() }}",
                            "emailreg": emailreg,
                            "passwordreg": passwordreg,
                            "phonereg": phonereg,
                            "firstnamereg": firstnamereg,
                            "surnamereg": surnamereg,
                        }),
                        dataType: 'json',
                        contentType: 'application/json',
                        success: function(msg) {
                            console.log("msg " + msg);
                            if (msg == 1) window.location = "/success";
                            else {
                                $('#register').attr("disabled", false);
                                $('#register').html(
                                    'Try It Now'
                                );
                                $("#email").css("display", "block");
                                //$('#mailControl').removeClass('hide');
                            }

                        },
                        error: function() {
                            console.log("some error")
                        }
                    });
                } else console.log("invalid form");
            });


        });

        const showPassword = document.getElementById('showPassword');
        const passwordField = document.getElementById('passwordreg');

        showPassword.addEventListener('click', function() {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>
</body>

</html>
