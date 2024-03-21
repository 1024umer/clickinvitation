<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QD4QH7KNBF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-QD4QH7KNBF');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Click Invitation - Sign up</title>
    <meta name="description"
        content="Your event website, your invitation sent by email or text message, table organizer, private photo gallery, registry page, auto count, and check-in tool.">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/assets/css/nice-select.css">
    <link rel="stylesheet" href="/assets/css/owl.min.css">
    <link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/style.css">

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">


</head>

<body>

    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <!--============= Sign In Section Starts Here =============-->
    <div class="account-section bg_img" data-background="/assets/images/account-bg.jpg">
        <div class="container">
            <div class="account-title text-center">
                <a href="/" class="back-home"><i class="fas fa-angle-left"></i><span>Back <span
                            class="d-none d-sm-inline-block">To Click Invitation</span></span></a>
                <a href="/" class="logo">
                    <img src="/assets/images/logo/logo.png" alt="logo">
                </a>
            </div>
            <div class="account-wrapper">
                <div class="account-header">
                    <h4 class="title">{{ __('register.title') }}Let's get started</h4>
                </div>
                <div class="account-body">
                    <form class="account-form" onsubmit="return false;" id="register-form">
                        <div class="form-group">
                            <label for="firstnamereg">{{ __('register.Your Full Name') }}</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" placeholder="Your Name " id="firstnamereg" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" placeholder="Your Surname " id="surnamereg" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailreg">{{ __('register.Your Email') }}</label>
                            <input type="email" placeholder="Enter Your Email " id="emailreg" required>
                            <span id="email"
                                style="display:none;color: #ff3535;font-size: 16px;margin-left: 32px;">{{ __('register.This email is already in use') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phonereg">{{ __('register.Your Phone') }}</label>
                            <input type="text" placeholder="Enter Your Phone " id="phonereg" required>
                        </div>
                        <div class="form-group position-relative">
                            <label for="passwordreg">{{ __('register.Your Password') }}</label>
                            <input type="password" placeholder="Choose Your Password " id="passwordreg" minlength="8"
                                maxlength="20" required>
                            <button type="button" class="eyeswitch"
                                onclick="$('#theye').toggleClass('fa-eye-slash');var x = document.getElementById('passwordreg'); x.type==='password'?x.type='text':x.type='password';">
                                <i id="theye" class="far fa-eye"></i>
                            </button>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="w-100" id="register" onclick="return false;">
                                {{ __('register.Try It Now') }}
                            </button>
                            <br><br>
                            <span class="d-block mt-15">{{ __('register.Already have an account?') }}<a
                                    href="/login">{{ __('register.Sign In') }}</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--============= Sign In Section Ends Here =============-->

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
    </script>


</body>

</html>
