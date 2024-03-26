<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Register Your Account | Click Invitation </title>
    <meta name="description"
        content="Register now for Click Invitation and gain access to a world of exciting events and valuable connections. Join today and take your next event to new heights.">
    <link rel="stylesheet" href="assets/newcss/style.css">
    <link rel="canonical" href="https://clickinvitation.com/register">
    <link rel="icon" type="image/x-icon" href="assets/newimages/Fav-Icon.png">
    <link href="https://fonts.cdnfonts.com/css/night" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    {{-- SEO --}}
    <meta property="og:title" content="Click Invitation" />
    <meta property="og:description" content="the best Guest management tools. digital invitation" />
    <meta property="og:locale" content="en_CA" />
    <meta property="og:site_name" content="Click Invitation" />
    <meta property="og:url" content="https://clickinvitation.com" />
    <meta property="og:type" content=website" />
    <meta property="og:image" content="https://clickinvitation.com/assets/newimages/Group%201.svg" />
    <meta property="article:publisher" content="https://www.facebook.com/click4invitation" />
    <meta property="og:image:width" content="1080" />
    <meta property="og:image:height" content="1080" />

    <!-- Open Graph tags for YouTube channel -->
    <meta property="og:title" content="ClickInvitation" />
    <!-- Other meta tags -->
</head>
<style>
    #terms {
        margin-top: 10px;
        width: 16px;
        height: 16px;
    }
</style>

<body>

    <script>
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Click Invitation",
            "alternateName": "Click Invitation",
            "url": "https://clickinvitation.com/",
            "logo": "https://clickinvitation.com/assets/newimages/Group%201.svg",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+1 (438) 303-9948",
                "contactType": "customer service",
                "areaServed": "CA",
                "availableLanguage": "en",
                "address": {
                    "@type": "PostalAddress",
                    "addressCountry": "CA"
                },
                "sameAs": [
                    "https://www.facebook.com/click4invitation",
                    "https://www.instagram.com/clickinvitationmtl/",
                    "https://www.youtube.com/@clickinvitation",
                    "https://clickinvitation.com/"
                ]
            }
        }
    </script>



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
                <input type="text" id="phonereg" class="email" name="phonereg" oninput="formatPhone(this)"
                    placeholder="Enter Your Phone" required><br><br>

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

        function formatPhone(input) {
            let cleanedValue = input.value.replace(/\D/g, '');
            cleanedValue = cleanedValue.slice(0, 11);
            let formattedValue = cleanedValue.replace(/(\d{1})(\d{3})(\d{3})(\d{4})/, '+$1 ($2) $3 $4');
            input.value = formattedValue;
        }
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
