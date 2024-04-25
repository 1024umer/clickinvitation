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
    @if (Route::currentRouteName() == 'event')
        <base href="/event/{{ $event->id_event }}/">
    @endif
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>Click Invitation Panel</title>

    <link rel="stylesheet" href="/assets/panelstyle.css">
    <link rel="shortcut icon" href="/assets/images/favicon2.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="/assets/jspanel/jquery.min.js"></script>
    <script src="/assets/jspanel/sortable.min.js"></script>
    <script src="/assets/jspanel/touchj.js"></script>
    <script src="/assets/jspanel/angular.js"></script>
    <script src="/assets/jspanel/angular-animate.min.js"></script>
    <script src="/assets/jspanel/angular-route.min.js"></script>
    <script src="/assets/jspanel/all.js"></script>
    <script src="/assets/jspanel/services/services.js"></script>
    <script src="/assets/jspanel/controllers/controllers.js"></script>
    <script src="/assets/jspanel/sortableang.js"></script>
    <script src="/assets/jspanel/ng-img-crop.js"></script>
    <script src='/assets/jspanel/textAngular-rangy.min.js'></script>
    <script src='/assets/jspanel/textAngular-sanitize.min.js'></script>
    <script src='/assets/jspanel/textAngular.min.js'></script>
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

    <style>

        @media only screen and (max-width: 991px){

            .position-absolute {
    position: absolute !important;
    top: 60px;
}
div#navbarNavDropdown {
    padding-bottom: 50px;
}

        }

    </style>
</head>

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

    @php
        header('Referrer-Policy: strict-origin-when-cross-origin');
    @endphp
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/panel">
                <img src="/assets/images/logo/logoNewGolden.png" width="200px" class="d-inline-block align-top ms-3"
                    alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link @if (Route::currentRouteName() == 'panel') active @endif" aria-current="page"
                            href="/panel">{{ __('layoutpanel.EVENTS') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Route::currentRouteName() == 'guest-list') active @endif"
                            href="/guest-list">{{ __('layoutpanel.GUEST LIST') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Route::currentRouteName() == 'profile') active @endif"
                            href="/profile">{{ __('layoutpanel.CONTACT INFO') }}</a>
                    </li>
                </ul>
                <ul class="navbar-nav position-absolute end-0 mx-3">
                    <li class="dropdown d-sm-inline">
                        <a class="nav-link dropdown-toggle" href="#" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="border: 0;">
                            {{ Config::get('languages')[App::getLocale()] }}
                        </a>
                        <div class="dropdown-menu">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('lang.switchPanel', $lang) }}">
                                        {{ $language }}</a>
                                @endif
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item text-right">
                        @if (Auth::user()->admin == 1)
                    <li class="nav-item">
                        <a class="nav-link @if (Route::currentRouteName() == 'admin') active @endif" aria-current="page"
                            href="https://clickadmin.searchmarketingservices.co/">{{ __('layoutpanel.ADMIN') }}</a>
                    </li>
                    @endif
                    <a href="" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('layoutpanel.SIGN OUT') }}
                    </a>
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    <script src="/assets/jspanel/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
