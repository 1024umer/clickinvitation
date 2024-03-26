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

    <title>Click Invitation - Success</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/assets/css/nice-select.css">
    <link rel="stylesheet" href="/assets/css/owl.min.css">
    <link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/style.css">

    <link rel="shortcut icon" href="assets/newimages/Fav-Icon.png" type="click-invitation">

    <style>
        .fa-angle-left:before {
            content: "\f104";
            color: black !important;
        }

        .text-color {
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-image: linear-gradient(25deg, #96740e, #f2c32e);
        }

        .form-container a:hover {
            background: var(--greadient, linear-gradient(90deg, #806000 19.00%, #D4AF37 68.00%, #FFC000 100%));
        }

        .form-container a {
            padding: 10px 30px;
            font-size: 14px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-family: 'poppins';
            text-decoration: none;
        }
    </style>

</head>

<body>
    <!--============= ScrollToTop Section Starts Here =============-->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
    <div class="overlay"></div>
    <!--============= ScrollToTop Section Ends Here =============-->

    <!--============= Sign In Section Starts Here =============-->
    <div class="account-section bg_img" data-background="">
        <div class="container">
            <div class="account-title text-center mb-120">
                <div class="form-container">
                    <a href="{{ url('/') }}" class="back-home text-white"><i
                            class="fas fa-angle-left"></i><span>Back <span
                                class="d-none d-sm-inline-block text-white">To Home</span></span></a>
                </div>
                <a href="/" class="logo">
                    <img src="/assets/newimages/Group 1.png" alt="logo">
                </a>
            </div>
            <div class="row">
                <div class="col text-center">
                    <h2 class="title mt-70 text-color">{{ __('success.REGISTRATION SUCCESFULL') }}</h2>
                    <h3 class="mt-50 text-dark">
                        {{ __('success.Congratulations, your account has been succesfully created') }}.</h3>
                        <h3 class="mt-50 text-dark">
                            @if (auth()->check())                     
                            {{ auth()->user()->name }}       
                        @else
                            {{-- No User Found              --}}
                        @endif                        
                        
                        </h3>
                    <p class="mt-4 text-dark">
                        {{ __('success.Please, check your inbox. A verification link has been sent to your email account, click on it to activate your account') }}.
                    </p>                   
                </div>
            </div>
        </div>
    </div>
    <!--============= Sign In Section Ends Here =============-->
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

</body>

</html>
