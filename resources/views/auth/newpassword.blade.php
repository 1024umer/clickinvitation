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

    <title>Click Invitation - New password</title>
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
            <div class="account-title text-center mb-120">
                <a href="/login" class="back-home"><i class="fas fa-angle-left"></i><span>Back <span
                            class="d-none d-sm-inline-block">To Sign in</span></span></a>
                <a href="/" class="logo">
                    <img src="/assets/images/logo/logo.png" alt="logo">
                </a>
            </div>
            <div class="account-wrapper top-gap">
                <div class="account-body">
                    <div class="form-head">
                        <h4 class="title mb-20">Reset Your Password</h4>
                        <p>Please enter your new password</p>
                    </div>
                    <form class="account-form" id="signin-form">
                        <div class="form-group position-relative">
                            <label for="sign-up">Your New Password </label>
                            <input type="password" placeholder="Enter Your Password " id="newp" minlength="8"
                                maxlength="20" required>
                            <button type="button" class="eyeswitch"
                                onclick="$('#theye').toggleClass('fa-eye-slash');var x = document.getElementById('newp'); x.type==='password'?x.type='text':x.type='password';">
                                <i id="theye" class="far fa-eye"></i>
                            </button>
                            <div class="text-center mt-4" id="mex"></div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="mt-1 mb-30 w-100" id="signin"
                                onclick="return false;">Confirm </button>
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

            $("#signin").click(function() {
                if ($("#signin-form")[0].checkValidity()) {

                    var newp = $("#newp").val();


                    $('#signin').attr("disabled", true);
                    $('#signin').html(
                        '<div class="fa-2x"><i class="fas fa-circle-notch fa-spin"></i></div>');



                    $.ajax({
                        type: "POST",
                        url: "/changep",
                        data: JSON.stringify({
                            "_token": "{{ csrf_token() }}",
                            "newp": newp,
                            "code": "{{ Request::route('code') }}",
                        }),
                        dataType: 'json',
                        contentType: 'application/json',
                        success: function(msg) {
                            if (msg == 1) {
                                //$('#signin').attr("disabled", false);
                                $('#signin').html('Confirm ');
                                $('#mex').html(
                                    '<p style="color: green;font-weight: bold;font-size: 14px;">Password changed correctly</p>'
                                    );
                            } else {
                                $('#signin').attr("disabled", false);
                                $('#signin').html('Sign In');
                                $('#mex').html(
                                    '<p style="color: #d90000;font-weight: bold;font-size: 14px;">Error</p>'
                                    );
                            }

                        },
                        error: function() {
                            //
                        }
                    });
                } else console.log("invalid form");
            });


        });
    </script>
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/6603116da0c6737bd1251e52/1hptvo5j7';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
</body>

</html>
