<!DOCTYPE html>
<html lang="en">

<head>

    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-QD4QH7KNBF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-QD4QH7KNBF');
    </script> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    @yield('tags')
    <!--============== Bootstrap link =============-->

    <!-- _____ Slick Slider _____ -->
    <link rel="icon" type="image/x-icon" href="assets/newimages/Fav-Icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
    <link href="https://fonts.cdnfonts.com/css/night" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="/assets/newcss/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</head>

<body>

    <header class="header-area">
        <!-- site-navbar start -->
        <div class="navbar-area">
            <div class="container">
                <nav class="site-navbar">

                    <!-- site menu/nav -->

                    <ul>
                        <li><a href="/events">{{ __('new_home.Events') }}</a></li>
                        <li><a href="/features">{{ __('new_home.Features') }}</a></li>
                        <li><a href="/about">{{ __('new_home.About') }} </a></li>
                        <li><a href="/contact">{{ __('new_home.Contact') }}</a></li>
                        <li><a href="{{ route('blog.index') }}">{{ __('new_home.Blogs') }}</a></li>
                        <li><a href="/tutorial">{{ __('new_home.Tutorial') }}</a></li>
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">signup</a></li>
                    </ul>

                    <!-- site logo -->
                    <a href="/" class="site-logo"><img src="/assets/newimages/Group 1.svg" alt=""></a>
                    <div style="display:"></div>
                    <!-- <li class="dropdown d-sm-inline">
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
                    </li> -->

                    <!-- <span class="header-buttons">   -->
                    <!-- <button class="login"> <a href="#" style="text-decoration: none; color:black;"> {{ Config::get('languages')[App::getLocale()] }}</a> </button> -->
                    <!-- </span>  -->
                    <span class="header-buttons">

                        <!-- <a href="" class="login"> Login</a> -->
                        <!-- <button class="language">  @foreach (Config::get('languages') as $lang => $language)
@if ($lang != App::getLocale())
<a class="dropdown-item" href="{{ route('lang.switch', $lang) }}" style="text-decoration: none; color:black;">
                                        {{ $language }}</a>
@endif
@endforeach </button> -->

                        <button class="login"> <a href="/login" style="text-decoration: none; color:black;">
                                {{ __('new_home.Login') }}</a> </button>
                        <a class="register" href="/register"
                            style="text-decoration: none; color:black;">{{ __('new_home.Register') }}</a>
                    </span>
                    <button class="nav-toggler">
                        <span>

                        </span>
                    </button>
                </nav>
            </div>
        </div><!-- navbar-area end -->
    </header>
    @yield('content')

    <div class="container">
        @include('layouts.newfooter')
    </div>
    </div>
    </div>

    <script src="assets/newjs/index.js"></script>
    <script src="assets/newjs/script.js"></script>
    <script src="assets/js/contact.js"></script>



    <script>
        $('.owl-carousel ').owlCarousel({
            loop: true,
            margin: 10,
            // autoplay: true,
            autoplaySpeed: 1000, // Set a slower autoplay speed (e.g., 5000 milliseconds)
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    </script>
    <!-- ___________ Slick Slider ______________ -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script>
        $('.slider').slick({
            centerMode: true,
            dots: true,
            centerPadding: '60px',
            // slidesToShow: 3,
            responsive: [{
                    breakpoint: 992, // Breakpoint for tablets (768px and above)
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 2 // Set slidesToShow to 2 for tablets
                    }
                },
                {
                    breakpoint: 768, // Breakpoint for mobile devices (less than 768px)
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1 // Set slidesToShow to 1 for mobile devices
                    }
                }
            ]
        });
    </script>
</body>

</html>
