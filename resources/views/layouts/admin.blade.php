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

    <link rel="stylesheet" href="/assets/adminstyle.css">
    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">

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
</head>


<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background:#feffa9;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/panel">
                <img src="/assets/images/logo/logo2.png" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link @if (Route::currentRouteName() == 'admin') active @endif" aria-current="page"
                            href="/admin">CLIENTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Route::currentRouteName() == 'adminevents') active @endif"
                            href="/admin/events">EVENTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Route::currentRouteName() == 'adminguestlist') active @endif"
                            href="/admin/guest-list">GUEST LIST</a>
                    </li>
                    <li class="nav-item dropdown @if (Route::currentRouteName() == 'administration') active @endif">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            ADMINISTRATION
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/admin/codes">DISCOUNT CODES</a></li>
                            <li><a class="dropdown-item" href="/admin/prices">PRICES</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav position-absolute end-0 mx-3">
                    <li class="nav-item text-right">
                        <a href="" class="nav-link"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            SIGN OUT
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

</body>

</html>
