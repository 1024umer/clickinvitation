<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Your Next Event | Click Invitation</title>
    <meta name="description" content="Join the seamless event experience with Click Invitation. Log in to your next event with ease and efficiently manage all aspects of your event.">
    <link rel="stylesheet" href="assets/newcss/style.css">
    <link rel="canonical" href="https://clickinvitation.com/login">
    <link rel="icon" type="image/x-icon" href="assets/newimages/Fav-Icon.png">
    <link href="https://fonts.cdnfonts.com/css/night" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="site-logo-img test">
            
            <a href="/" class="site-logo"><img src="/assets/newimages/Group 1.png" alt="click-invitation"></a>
        </div>
        <div class="register-form-container">
            <h1>Login to your account</h1>
            <form action="" method="post" class="Register-form" id="signin-form">
                <input type="email" id="emailreg" class="email" name="email" placeholder="Email Address"  required><br><br>
                <div class="password-input">
                    <input type="password" id="passwordreg"  name="password" placeholder="Password" required>
                    <span id="showPassword" style="cursor: pointer;"><i class="fas fa-eye"></i></span>
                </div><br><br>
                <a href="/reset" class="forget-password">Forgotten Password?</a>
                <input type="submit" value="Login" class="register-button" id="signin">
            </form>
            <p>Already have an account? <a href="/register">Register</a></p>
            <br>
            <p id="mex"></p>
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

            $("#signin").click(function() {
                if ($("#signin-form")[0].checkValidity()) {

                    var email = $("#emailreg").val();
                    var password = $("#passwordreg").val();

                    $('#signin').attr("disabled", true);
                    $('#signin').html(
                        '<div class="fa-2x"><i class="fas fa-circle-notch fa-spin"></i></div>');



                    $.ajax({
                        type: "POST",
                        url: "/login",
                        data: JSON.stringify({
                            "_token": "{{ csrf_token() }}",
                            "email": email,
                            "password": password,
                        }),
                        dataType: 'json',
                        contentType: 'application/json',
                        success: function(msg) {
                            console.log(msg);
                            if (msg == 1) window.location = "/panel";
                            else if (msg == 2) {
                                $('#signin').attr("disabled", false);
                                $('#signin').html('Sign In');
                                $('#mex').html(
                                    '<p style="color: #d90000;font-weight: bold;font-size: 14px;">{{ __('loginpage.Check your inbox to activate your account') }}</p>'
                                );
                            } else {
                                $('#signin').attr("disabled", false);
                                $('#signin').html('Sign In');
                                $('#mex').html(
                                    '<p style="color: #d90000;font-weight: bold;font-size: 14px;">{{ __('loginpage.Email or password incorrect') }}</p>'
                                );
                            }

                        },
                        error: function(e) {
                            console.log("some error", e.text);
                        }
                    });
                } else console.log("invalid form");
            });


        });
    


        const showPassword = document.getElementById('showPassword');
        const passwordField = document.getElementById('passwordreg');

        showPassword.addEventListener('click', function () {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>
</body>

</html>