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

    <title>Click Invitation Website</title>

    <link rel="stylesheet" href="/assets/websitestyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">

    <script src="/assets/jspanel/jquery.min.js"></script>
</head>

<body data-bs-spy="scroll" data-bs-target="#sp">

    <section id="start" class="main"
        style="background-image: url('{{ $event->mainimage }}?id=<?php echo mt_rand(1, 100000); ?>'); background-position: center;background-size: cover">
        <div class="names">
            @if ($eventType->couple_event)
                <div class="bridename">
                    <p class="firstname">{{ $event->bridefname }}</p>
                    <p class="secondname">{{ $event->bridelname }}</p>
                </div>
                <div class="and">
                    <p>&</p>
                </div>

                <div class="groomname">
                    <p class="firstname">{{ $event->groomfname }}</p>
                    <p class="secondname">{{ $event->groomlname }}</p>
                </div>

                <div class="h">
                    <hr>
                    <i class="far fa-heart"></i>
                    <hr>
                </div>
            @else
                <div class="bridename">
                    <p class="firstname">{{ $event->name }}</p>
                    {{-- <p class="secondname">{{ $eventType->title }}</p> --}}
                </div>
            @endif
            <div class="date">
                <!-- <p>{{ \Carbon\Carbon::parse($event->date)->setTimezone('+2')->format('j F, Y H:i') }}</p> -->
                <p id='eventDate'></p>
            </div>
        </div>
        <a href="#thecouple"><i class="fal fa-chevron-down"></i></a>
    </section>

    <section class="container-fluid menu">
        <div class="row justify-content-md-center" id="sp">
            <div class="col-md-2 offset-md-2">
                <a href="#start">START</a>
                <hr class="d-block d-md-none">
            </div>
            <div class="col-md-2">
                <a href="#thecouple">
                    @if ($eventType->couple_event)
                        THE COUPLE
                    @else
                        Description
                    @endif
                </a>
                <hr class="d-block d-md-none">
            </div>
            @if (!$photogallery->isEmpty())
                <div class="col-md-2">
                    <a href="#gallery">GALLERY</a>
                    <hr class="d-block d-md-none">
                </div>
            @endif
            @if ($event->boolcerimony || $event->boolreception || $event->boolparty)
                <div class="col-md-2">
                    <a href="#eventsc">EVENT SCHEDULE</a>
                    <hr class="d-block d-md-none">
                </div>
            @endif
        </div>
    </section>

    <section id="thecouple" class="container thecouple">
        <div class="row tit">
            <div class="col text-center">
                <h1>
                    @if ($eventType->couple_event)
                        THE COUPLE
                    @else
                        {{ $eventType->title }}
                    @endif
                </h1>
                <h4 class="mt-4 mb-4">



                    @if ($eventType->couple_event)
                        Meet the Bride & the Groom
                    @else
                        {{ $event->name }}
                    @endif
                </h4>
                <p>{{ $event->summary }}</p>
                <hr>
            </div>
        </div>
        @if ($eventType->couple_event)
            <div class="row mt-4">
                <div class="col">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <!--<img src="https://picsum.photos/200/250?grayscale" class="img-fluid rounded-start">-->
                                @if ($event->imggroom)
                                    <img src="{{ $event->imggroom }}" class="img-fluid rounded-start">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $event->groomfname }} {{ $event->groomlname }}</h4>
                                    <i>Groom</i>
                                    <p class="card-text">{{ $event->groomsummary }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @if ($event->imgbride)
                                    <img src="{{ $event->imgbride }}" class="img-fluid rounded-start">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $event->bridefname }} {{ $event->bridelname }}</h4>
                                    <i>Bride</i>
                                    <p class="card-text">{{ $event->bridesummary }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>

    @if (!$photogallery->isEmpty())
        <section id="gallery" class="container gallery">
            <div class="row tit">
                <div class="col text-center">
                    <h1>GALLERY</h1>
                    <h4 class="mt-4 mb-4">Check out the Candid Moments</h4>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($photogallery as $photo)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="/event-images/{{ $photo->id_event }}/photogallery/{{ $photo->id_photogallery }}.jpg"
                                        class="d-block w-100">
                                </div>
                            @endforeach
                            <!--<div class="carousel-item">
       <img src="https://picsum.photos/1298/649?grayscale" class="d-block w-100">
      </div>
      <div class="carousel-item">
       <img src="https://picsum.photos/1298/649?grayscale" class="d-block w-100">
      </div>-->
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <center>
                        <button class="btn btn-primary mt-3" id="viewall"><a
                                class="text-white text-decoration-none" target="_blank"
                                href="{{ url("/events/$event->id_event/show-gallery") }}">View All</a></button>
                    </center>
                </div>
            </div>

        </section>
    @endif

    @if ($event->boolcerimony || $event->boolreception || $event->boolparty)
        <section id="eventsc" class="container event-schedule">
            <div class="row tit">
                <div class="col text-center">
                    <h1>EVENT SCHEDULE</h1>
                    <h4 class="mt-4 mb-4">List of all the Scheduled Event for your Information</h4>
                    <hr>
                </div>
            </div>

            <div class="row justify-content-md-center mt-4">
                @if ($event->boolcerimony)
                    <div class="col-12 col-lg-4">
                        <div class="card me-4 ms-4 mb-4">
                            <img src="{{ $event->cerimg }}" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">EVENT CEREMONY</h4>
                                <p class="card-text">{{ $event->cerdesc }}</p>
                                <p class="card-text"><small class="text-muted">{{ $event->ceraddress }}
                                        <br>{{ $event->cercity }}
                                        {{ $event->cerprovince }}<br>{{ $event->cerpc }}<br>{{ $event->cercountry }}</small>
                                </p>
                                @if ($event->certime)
                                    <p class="card-text text-center"><small class="text-muted"
                                            id='eventCer'>{{ \Carbon\Carbon::parse($event->certime)->setTimezone('-7')->format('g:i a') }}</small>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                @if ($event->boolreception)
                    <div class="col-12 col-lg-4">
                        <div class="card me-4 ms-4 mb-4">
                            <img src="{{ $event->recimg }}" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">EVENT RECEPTION</h4>
                                <p class="card-text">{{ $event->recdesc }}</p>
                                <p class="card-text"><small class="text-muted">{{ $event->recaddress }}
                                        <br>{{ $event->reccity }}
                                        {{ $event->recprovince }}<br>{{ $event->recpc }}<br>{{ $event->reccountry }}</small>
                                </p>
                                @if ($event->rectime)
                                    <p class="card-text text-center"><small class="text-muted"
                                            id='recTime'>{{ \Carbon\Carbon::parse($event->rectime)->setTimezone('-7')->format('g:i a') }}</small>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                @if ($event->boolparty)
                    <div class="col-12 col-lg-4">
                        <div class="card me-4 ms-4 mb-4">
                            <img src="{{ $event->parimg }}" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">{{ strtoupper($event->parname) }}</h4>
                                <p class="card-text">{{ $event->pardesc }}</p>
                                <p class="card-text"><small class="text-muted">{{ $event->paraddress }}
                                        <br>{{ $event->parcity }}
                                        {{ $event->parprovince }}<br>{{ $event->parpc }}<br>{{ $event->parcountry }}</small>
                                </p>
                                @if ($event->partime)
                                    <p class="card-text text-center"><small class="text-muted"
                                            id='parTime'>{{ \Carbon\Carbon::parse($event->partime)->setTimezone('-7')->format('g:i a') }}</small>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </section>
    @endif

    <footer class="container-fluid">
        <div class="row">
            <div class="col text-center">
                <p>Copyrights © 2022 All Rights Reserved by ClickInvitation</p>
            </div>
        </div>
    </footer>


    <script src="/assets/jspanel/bootstrap.min.js"></script>
</body>

</html>
<script>
    const months = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ]

    console.log("sdfasdf");

    if (("{{ $event->date }}").length > 0) {
        console.log({{ strtotime(now()) * 1000 }});
        console.log({{ strtotime($event->date) * 1000 }});
        console.log("aa {{ $event->date }}");
        console.log(new Date("{{ $event->date }}"));
        let eDate = document.getElementById('eventDate');
        let newEDate = new Date("{{ $event->date }}");
        let min = newEDate.getMinutes();
        if (min == "0") {
            min = "00";
        } else if (parseInt(min) < 10) {
            min = "0" + min;
        }
        eDate.innerHTML = months[newEDate.getMonth()] + " " + newEDate.getDate() + ", " + newEDate.getFullYear() + " " +
            newEDate.getHours() + ":" + min;
    }

    if (("{{ $event->certime }}").length > 0) {
        console.log("{{ $event->certime }}");
        console.log(new Date("{{ $event->certime }}"));
        let eDate = document.getElementById('eventCer');
        let newEDate = new Date("{{ $event->certime }}");
        let hr = newEDate.getHours();
        let min = newEDate.getMinutes();
        let ft = 'AM';
        if (parseInt(hr) > 11) {
            ft = "PM";
            if (parseInt(hr) > 12) {
                hr = parseInt(hr) - 12;
            }
        }
        if (parseInt(hr) == 0) {
            hr = "12";
        }
        if (min == "0") {
            min = "00";
        } else if (parseInt(min) < 10) {
            min = "0" + min;
        }
        eDate.innerHTML = hr + ":" + min + " " + ft;
    }

    if (("{{ $event->partime }}").length > 0) {
        console.log("{{ $event->partime }}");
        console.log(new Date("{{ $event->partime }}"));
        let eDate = document.getElementById('parTime');
        let newEDate = new Date("{{ $event->partime }}");
        let hr = newEDate.getHours();
        let min = newEDate.getMinutes();
        let ft = 'AM';
        if (parseInt(hr) > 11) {
            ft = "PM";
            if (parseInt(hr) > 12) {
                hr = parseInt(hr) - 12;
            }
        }
        if (parseInt(hr) == 0) {
            hr = "12";
        }
        if (min == "0") {
            min = "00";
        } else if (parseInt(min) < 10) {
            min = "0" + min;
        }
        eDate.innerHTML = hr + ":" + min + " " + ft;
    }

    if (("{{ $event->rectime }}").length > 0) {
        console.log("{{ $event->rectime }}");
        console.log(new Date("{{ $event->rectime }}"));
        let eDate = document.getElementById('recTime');
        let newEDate = new Date("{{ $event->rectime }}");
        let hr = newEDate.getHours();
        let min = newEDate.getMinutes();
        let ft = 'AM';
        if (parseInt(hr) > 11) {
            ft = "PM";
            if (parseInt(hr) > 12) {
                hr = parseInt(hr) - 12;
            }
        }
        if (parseInt(hr) == 0) {
            hr = "12";
        }
        if (min == "0") {
            min = "00";
        } else if (parseInt(min) < 10) {
            min = "0" + min;
        }
        eDate.innerHTML = hr + ":" + min + " " + ft;
    }
</script>
