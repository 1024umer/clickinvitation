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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/assets/css/nice-select.css">
    <link rel="stylesheet" href="/assets/css/owl.min.css">
    <link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    
    <meta property="og:title" content="Click Invitation"/ >
    <meta property="og:description" content="the best Guest management tools. digital invitation"/ >
    <meta property="og:locale" content="en_CA" />
    <meta property="og:site_name" content="Click Invitation"/ >
    <meta property="og:url" content="https://clickinvitation.com"/>
    <meta property="og:type" content=website"/>
    <meta property="og:image" content="https://clickinvitation.com/assets/newimages/Group%201.svg"/>
    <meta property="article:publisher" content="https://www.facebook.com/click4invitation" />
    <meta property="og:image:width" content="1080" />
    <meta property="og:image:height" content="1080" />
    
    <!-- Open Graph tags for YouTube channel -->
        <meta property="og:title" content="ClickInvitation" />
    <!-- Other meta tags -->
    

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


    <!--============= Header Section Starts Here =============-->
    {{-- <header class="header-section @if (URL::current() != url('/') || URL::current() != url('/about')) inner-header @else header-white-dark @endif"> --}}
    <header class="header-section header-white-dark">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    @if (URL::current() != url('/'))
                        <a href="/">
                        @else
                            <a href="/">
                    @endif
                    @if (URL::current() != url('/'))
                        <img src="/assets/images/logo/logo2.png" alt="logo">
                    @else
                        <img src="/assets/images/logo/logo2.png" alt="logo">
                    @endif
                    </a>
                </div>
                <ul class="menu">
                    <li>
                        @if (URL::current() != url('/'))
                            <a href="/">{{ __('home.Home') }}</a>
                        @else
                            <a href="/#">{{ __('home.Home') }}</a>
                        @endif
                    </li>
                    <li>
                        <a href="/#primo">{{ __('home.Your event') }}</a>
                    </li>
                    <li>
                        <a href="/#secondo">{{ __('home.Features') }}</a>
                    </li>
                    <li>
                        <a href="/about">{{ __('home.About') }}</a>
                    </li>
                    <li>
                        <a href="/contact">{{ __('home.Contact') }}</a>
                    </li>
                    <li>
                        <a href="/tutorial">Tutorial</a>
                    </li>
                    <!--<li>
                        <a href="#0">Home</a>
                        <ul class="submenu">
                            <li>
                                <a href="#0">Home Apps</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="index.html">Mobile App 1</a>
                                    </li>
                                    <li>
                                        <a href="index-2.html">Mobile App 2</a>
                                    </li>
                                    <li>
                                        <a href="index-3.html">Mobile App 3</a>
                                    </li>
                                    <li>
                                        <a href="index-4.html">Mobile App 4</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#0">Home Messenger</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="index-5.html">Messenger 1</a>
                                    </li>
                                    <li>
                                        <a href="index-6.html">Messenger 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#0">Home Web</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="index-7.html">Web 1</a>
                                    </li>
                                    <li>
                                        <a href="index-8.html">Web 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#0">Home Dextop</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="index-9.html">Dextop 1</a>
                                    </li>
                                    <li>
                                        <a href="index-10.html">Dextop 2</a>
                                    </li>
                                    <li>
                                        <a href="index-11.html">Dextop 3</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#0">Home Watchapp</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="index-12.html">Watchapp 1</a>
                                    </li>
                                    <li>
                                        <a href="index-13.html">Watchapp 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#0">Home Hero Video</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="index-14.html">Hero Video 1</a>
                                    </li>
                                    <li>
                                        <a href="index-15.html">Hero Video 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="./index-16.html">Home 16</a>
                            </li>
                            <li>
                                <a href="./index-17.html">Home 17 <span class="badge badge-primary align-self-center">New</span></a>
                            </li>
                            <li>
                                <a href="./index-18.html">Home 18 <span class="badge badge-primary align-self-center">New</span></a>
                            </li>
                            <li>
                                <a href="./index-19.html">Home 19 <span class="badge badge-primary align-self-center">New</span></a>
                            </li>
                            <li>
                                <a href="./index-20.html">Home 20 <span class="badge badge-primary align-self-center">New</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#0">Feature</a>
                        <ul class="submenu">
                            <li>
                                <a href="#feature">Feature 1</a>
                            </li>
                            <li>
                                <a href="feature-2.html">Feature 2</a>
                            </li>
                            <li>
                                <a href="feature-3.html">Feature 3</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="pricing-plan.html">Pricing</a>
                    </li>
                    <li>
                        <a href="#0">Pages</a>
                        <ul class="submenu">
                            <li>
                                <a href="about.html">about</a>
                            </li>
                            <li>
                                <a href="app-download.html">app download</a>
                            </li>
                            <li>
                                <a href="#0">Team</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="team.html">Team</a>
                                    </li>
                                    <li>
                                        <a href="team-single.html">Team Single</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#0">Account</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="sign-up.html">Sign Up</a>
                                    </li>
                                    <li>
                                        <a href="sign-in.html">Sign In</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="faqs.html">FAQs</a>
                            </li>
                            <li>
                                <a href="partners.html">Partners</a>
                            </li>
                            <li>
                                <a href="privacy-policy.html">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="coming-soon.html">Coming Soon</a>
                            </li>
                            <li>
                                <a href="change-password.html">Change Password</a>
                            </li>
                            <li>
                                <a href="reset-password.html">Password Reset</a>
                            </li>
                            <li>
                                <a href="reviews.html">review</a>
                            </li>
                            <li>
                                <a href="404.html">404</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#0">Blog</a>
                        <ul class="submenu">
                            <li>
                                <a href="blog.html">blog style 1</a>
                            </li>
                            <li>
                                <a href="blog-type-two.html">blog style 1</a>
                            </li>
                            <li>
                                <a href="blog-single-1.html">blog Single 1</a>
                            </li>
                            <li>
                                <a href="blog-single-2.html">blog Single 2</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.html">contact</a>
                    </li>
                    <li class="d-sm-none">
                        <a href="#0" class="m-0 header-button">Get Mosto</a>
                    </li>-->
                </ul>

                <div class="header-right" style="margin-left: auto;">
                    <!--
                    <select class="select-bar">
                        <option onClick="window.location = '{{ route('lang.switch', 'en') }}'" value="en">En</option>
                        <option onClick="window.location = '{{ route('lang.switch', 'fr') }}'" value="Fr">Fr</option>
                    </select> -->
                    <li class="dropdown d-sm-inline">
                        <a class="header-button dropdown-toggle" href="#" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="border: 0;">
                            {{ Config::get('languages')[App::getLocale()] }}
                        </a>
                        <div class="dropdown-menu">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                        {{ $language }}</a>
                                @endif
                            @endforeach
                        </div>
                    </li>


                    @if (Auth::guest())
                        <a href="/login" class="header-button d-none d-sm-inline">{{ __('home.Login') }}</a>
                    @else
                        <a href="/panel" class="header-button d-none d-sm-inline">{{ Auth::user()->name }}
                            {{ Auth::user()->surname }}</a>
                    @endif
                </div>

                <div class="header-bar d-lg-none" style="margin-left: 20px;">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>
    <!--============= Header Section Ends Here =============-->


    @yield('content')

    <!--============= Footer Section Starts Here =============-->
    <footer class="footer-section bg_img" data-background="/assets/images/footer/footer-bg.jpg">
        <div class="container">
            <div class="footer-top padding-top padding-bottom">
                <div class="logo">
                    <a href="#0">
                        <img src="/assets/images/logo/footer-logo.png" alt="logo">
                    </a>
                </div>
                <!--<ul class="social-icons">
                    <li>
                        <a href="#0"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="#0" class="active"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-pinterest-p"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-google-plus-g"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>-->
            </div>
            <div class="footer-bottom">
                <ul class="footer-link">
                    <li>
                        <a href="/#terzo">{{ __('home.About') }}</a>
                    </li>
                    <li>
                        <a href="/contact">{{ __('home.Contact') }}</a>
                    </li>
                    <li>
                        <a href="/privacy-policy">{{ __('home.Privacy Policy') }}</a>
                    </li>
                    <li>
                        <a href="/terms-of-use">{{ __('home.Terms of Use') }}</a>
                    </li>
                </ul>
            </div>
            <div class="copyright">
                <p>
                    {{ __('home.Copyright © 2022.All Rights Reserved By') }} <a href="https://goldweb.it/">Goldweb</a>
                </p>
            </div>
        </div>
    </footer>
    <!--============= Footer Section Ends Here =============-->

    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/modernizr-3.6.0.min.js"></script>
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/js/magnific-popup.min.js"></script>
    <script src="/assets/js/jquery-ui.min.js"></script>
    <script src="/assets/js/wow.min.js"></script>
    <script src="/assets/js/waypoints.js"></script>
    <script src="/assets/js/nice-select.js"></script>
    <script src="/assets/js/owl.min.js"></script>
    <script src="/assets/js/counterup.min.js"></script>
    <script src="/assets/js/paroller.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    
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

    <script>
        $(".send").click(function() {
            var emailx = $("#email").val();
            var namex = $("#name").val();
            var messagex = $("#message").val();
            var phonex = $("#subject").val();
            $.ajax({
                type: "POST",
                url: "/sendcontact",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "email": emailx,
                    "name": namex,
                    "subject": phonex,
                    "message": messagex
                },
                dataType: "html",
                success: function(msg) {
                    $(".send").css("display", "none");

                    $("#okmessage").html("Message send correctly");
                },
                error: function(xhr, status, error) {
                    alert(status);
                    alert(error);
                }
            });
            return false;
        });
    </script>
</body>

</html>
