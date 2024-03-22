<!DOCTYPE html>
<html>

<head>
    <title>Web Template</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <link href="
        https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css
        "
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://searchmarketingservices.online/fonts/index.css">
    {{-- @php
        include_once public_path('templates/fontsLink.php');
    @endphp --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .swal2-container {
            z-index: 9999999999
        }

        body {
            scroll-behavior: smooth;
            overflow-y: scroll;
        }

        a {
            text-decoration: none;
            color: black;
        }

        a:hover {
            text-decoration: none;
        }

        .fullscreen-image {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 9999;
            overflow: auto;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #fff;
            cursor: pointer;
            font-size: 24px;
        }

        .close-btn:hover {
            color: #ccc;
        }

        .fullscreen-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .fullscreen-content img {
            max-width: 90%;
            max-height: 90%;
        }

        #picture {
            width: 100%;
            height: 80vh;
            background: url('') no-repeat center center;
            background-size: cover;
            position: relative;
        }

        .text-element {
            position: absolute;
            cursor: move;
        }

        span.close-button {
            font-weight: 700;
            font-size: 18px !important;
            color: white !important;
            background: black;
            position: absolute;
            top: -25px;
            /* width: 19px; */
            /* height: 27px; */
            border-radius: 100%;
            padding: 0px 6px;
            /* padding-top: 0px; */
        }

        span.close-counter {
            font-weight: 700;
            font-size: 18px !important;
            color: white !important;
            background: black;
            position: absolute;
            top: -31px;
            /* width: 19px; */
            /* height: 27px; */
            border-radius: 100%;
            padding: 0px 6px;
            /* padding-top: 0px; */
        }

        .selected {
            border: 2px solid #ff0000;
        }

        .template {
            display: none;
            justify-content: space-between;
            margin: 20px 0;
        }

        .template img {
            width: 100%;
            height: auto;
        }

        .edit-image-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 8px;
            cursor: pointer;
            margin-top: 5px;
            border-radius: 5px;
        }

        #bottom-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            z-index: 99999;
        }

        #upload-button,
        #font-size,
        #font-family,
        #text-color {
            margin-right: 10px;
        }

        .webbodymain {
            /* padding-bottom: 60px; */
            margin: 0px !important;
        }

        .switchtoggle {
            position: relative;
            display: inline-block;
            width: 45px;
            height: 25px;
        }

        .switchtoggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slidertoggle {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slidertoggle:before {
            position: absolute;
            content: "";
            height: 17px;
            width: 17px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .inputtoggle:checked+.slidertoggle {
            background-color: #2196F3;
        }

        .inputtoggle:focus+.slidertoggle {
            box-shadow: 0 0 1px #2196F3;
        }

        .inputtoggle:checked+.slidertoggle:before {
            -webkit-transform: translateX(17px);
            -ms-transform: translateX(17px);
            transform: translateX(22px);
        }

        /* Rounded sliders */
        .slidertoggle.roundtoggle {
            border-radius: 34px;
        }

        .slidertoggle.roundtoggle:before {
            border-radius: 50%;
        }

        .content-container.hidden {
            display: none;
        }

        .close-counter {
            cursor: pointer;
        }

        .gall {
            color: #043e46;
            font-size: 2.2em;
        }

        .custom-slider {
            width: 90%;
            margin: auto;
        }

        .slick-prev,
        .slick-next {
            position: absolute;
            line-height: 0;
            top: 50%;
            width: 30px;
            height: 29px;
            display: block;
            padding: 0;
            -webkit-transform: translate(0, -50%);
            transform: translate(0, -50%);
            cursor: pointer;
            color: transparent;
            border: none;
            outline: none;
            border-radius: 50px;
            background: #043e46;
        }

        .slick-slider {
            user-select: none;
        }

        .slick-next {
            right: -30px;
        }

        .slick-prev {
            left: -30px;
        }

        .spana {
            color: #d6d6d6b3;
        }

        .section.pair .pair-steps .step .step-number .value {
            color: #fff;
            font-weight: 700;
            font-size: 3rem;
        }

        .hero.connect-page {
            position: absolute;
            cursor: move;
            z-index: 99999999;
        }

        .show-border {
            border: 2px dashed #ccc;

        }

        .hero.connect-page .hero-body {
            cursor: auto;
        }

        @media screen and (max-width: 768px) {
            .hero .hero-body .counter {
                margin: 2rem 0 0;
            }
        }

        .hero .hero-body .counter .title {
            color: #9c9c9c;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
            text-shadow: 0 1px 2px #0003;
        }

        .hero .hero-body .counter .counter-boxes {
            display: flex;
            flex-direction: row;
        }

        .hero .hero-body .counter .counter-boxes .count-box {
            background-color: #1a1c1ccc;
            box-shadow: 0 5px 10px #0000004d;
            border-radius: 8px;
            backdrop-filter: blur(5px);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100px;
            height: 100px;
            margin-right: 4px;
            text-shadow: 0 1px 0 #0000004d;
        }

        @media screen and (max-width: 768px) {
            .hero .hero-body .counter .counter-boxes .count-box {
                width: 70px;
                height: 70px;
            }
        }

        .hero .hero-body .counter .counter-boxes .count-box h1 {
            color: #fff;
            padding: 8px 0 0;
            margin: 0;
            font-size: 2.5rem;
            line-height: 2rem;
        }

        @media screen and (max-width: 768px) {
            .hero .hero-body .counter .counter-boxes .count-box h1 {
                font-size: 2rem;
            }
        }

        .hero .hero-body .counter .counter-boxes .count-box span {
            color: #9c9c9c;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        @media screen and (max-width: 768px) {
            .hero .hero-body .counter .counter-boxes .count-box span {
                font-size: 10px;
                letter-spacing: 0;
            }
        }

        /* @media screen and (min-width: 1024px) {
            #text-overlay p {
                transform: translate(-19%, 4%);
            }
            .overlay {
                height: 100vh !important;
            }
            #picture {
                height: 100vh !important;
            }
        }
        @media screen and (min-width: 768px) {
            #text-overlay p {
                transform: translate(-118px, 73px);
            }
        } */

        /* @media screen and (min-width: 425px) and (max-width: 450px) {
            .overlay {
                height: 50vh !important;
            }
            #picture {
                height: 50vh !important;
            }
        } */

        .hero .hero-body .counter .counter-boxes .count-box:last-of-type {
            margin-right: 0;
        }

        .menu {
            padding-top: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #dfdfdf;
            background: #f7f7f7;
        }

        .card-img-top {
            height: 255px;
        }

        .slick-slide {
            margin: 0 20px;
        }

        .overlay {
            background: #00000060;
            width: 100%;
            height: 80vh;
            position: absolute;
            z-index: 9999;
        }

        .SaveBtn {
            position: fixed;
            bottom: 100px;
            right: 10px;
            z-index: 9999;
            border: none;
            outline: none;
            border-radius: 50%;
            padding: 20px 15px;
            background: #198754;
            color: white;
            display: block;
            cursor: pointer;
        }

        .SaveBtn:focus {
            outline: none;
            border: none;
            background: #105434;
        }

        /* #text-overlay p {
            line-height: 120px;
        } */

        .UpdateBtn {
            position: fixed;
            bottom: 110px;
            right: 10px;
            z-index: 9999;
            border: none;
            outline: none;
            border-radius: 30px;
            padding: 10px 10px;
            background: #871919;
            color: white;
            cursor: pointer;
            display: none;
        }

        .UpdateBtn:focus {
            outline: none;
            border: none;
            background: #5d1212;
        }

        /* .Uploadbtn{
            position: absolute;
            right: 10px;
        } */
        #canvas-container {
            width: 90%;
            margin: 0 auto;
            height: 1000px;
        }

        canvas {
            display: block;
            width: 100%;
            height: 1000px;
        }
    </style>
</head>

<body class="webbodymain">
    <div id="canvas-container">
        <canvas id="canvas"></canvas>
    </div>
    <br>

    {{-- <div class="overlay"></div>
    <div id="picture">
        <div id="text-overlay"></div>
    </div> --}}
    <div id="template-container">
        <div class="template">
            <div>
                <img src="" alt="Image 1">
                <button class="edit-image-button" onclick="editImage(this, 1)">Edit Image 1</button>
            </div>
            <div>
                <img src="" alt="Image 2">
                <button class="edit-image-button" onclick="editImage(this, 2)">Edit Image 2</button>
            </div>
        </div>
    </div>
    <section class="container-fluid menu">
        <div class="row justify-content-md-center" id="sp">
            <div class="col-md-2 offset-md-2">
                <a href="#start">START</a>
                <hr class="d-block d-md-none">
            </div>
            <div class="col-md-2">
                <a href="#thecouple">
                    THE COUPLE
                </a>
                <hr class="d-block d-md-none">
            </div>
            <div class="col-md-2">
                <a href="#gallery">GALLERY</a>
                <hr class="d-block d-md-none">
            </div>
            <div class="col-md-2">
                <a href="#eventsc">EVENT SCHEDULE</a>
                <hr class="d-block d-md-none">
            </div>
        </div>
    </section>

    <div id="couple" class="container text-center content-container hidden pt-5 ">
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
        @if ($eventType->couple_event)
            <div class="row gy-3 mt-3 ">
                <div class="col-sm">
                    <div class="card h-100">
                        @if ($event->imggroom)
                            <img src="{{ $event->imggroom }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h4 class="card-title">{{ $event->groomfname }} {{ $event->groomlname }}</h4>
                            <i>Groom</i>
                            <p class="card-text">{{ $event->groomsummary }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card h-100">
                        @if ($event->imgbride)
                            <img src="{{ $event->imgbride }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h4 class="card-title">{{ $event->bridefname }} {{ $event->bridelname }}</h4>
                            <i>Bride</i>
                            <p class="card-text">{{ $event->bridesummary }}</p>
                        </div>
                    </div>
                </div>

            </div>
        @endif
    </div>
    <div class="modal" tabindex="-1" id="uploadModal">
        <form action="{{ route('image.upload', [$event->id_event]) }}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
    @if (!$photogallery->isEmpty())
        <section class="container">
            <h1 id="gallery" class="gall text-center mt-5">Gallery</h1>
            <hr class="hr w-25 mb-2">
            <div style="text-align: end; padding:0px 70px 8px 5px;">

                @if (!auth()->user())
                    <button class="btn btn-success Uploadbtn" type="button" id="uploadImage">Upload Image</button>
                @endif
            </div>


            <div class="custom-slider container">
                @foreach ($photogallery as $photo)
                    <div class="custom-box ">
                        <img src="/event-images/{{ $photo->id_event }}/photogallery/{{ $photo->id_photogallery }}.jpg"
                            class="card-img-top">
                    </div>
                @endforeach
            </div>
            <center>
                <button class="btn btn-primary mt-3 " id="viewall"><a class="text-white text-decoration-none"
                        target="_blank" href="{{ url("/events/$event->id_event/show-gallery") }}">View
                        All</a></button>
            </center>
        </section>
    @endif

    @if ($event->boolcerimony || $event->boolreception || $event->boolparty)
        <section id="eventsc" class="event-section container mb-5">
            <div class="text-center my-5">
                <h2>EVENT SCHEDULE</h2>
                <h4>List of all the Scheduled Event for your Information</h4>
                <hr class="hr w-25">
            </div>
            <div class="row">
                @if ($event->boolcerimony)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{ $event->cerimg }}" width="100%" height="100%" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->cerdesc }}</h5>
                                <p class="card-text">{{ $event->ceraddress }}
                                    {{ $event->cercity }}<br>
                                    {{ $event->cerprovince }}<br>
                                    {{ $event->cerpc }}<br>
                                    {{ $event->cercountry }}</p>
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
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{ $event->recimg }}" width="100%" height="100%" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->recdesc }}</h5>
                                <p class="card-text">{{ $event->recaddress }}
                                    <br>{{ $event->reccity }}
                                    {{ $event->recprovince }}<br>{{ $event->recpc }}<br>{{ $event->reccountry }}
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
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{ $event->parimg }}" width="100%" height="100%" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ strtoupper($event->parname) }}</h5>
                                <p class="card-text">{{ $event->pardesc }}</p>
                                <p class="card-text text-muted">{{ $event->paraddress }}
                                    <br>{{ $event->parcity }}
                                    {{ $event->parprovince }}<br>{{ $event->parpc }}<br>{{ $event->parcountry }}
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



    <button class="SaveBtn" id="saveBtn">Save</button>
    <button class="UpdateBtn" id="UpdateBtn">Remove Text</button>

    <footer class="footer">
        <div style="background-color: #7e7e7e; height: 70px; text-align: center; ">
            <p class="pt-4 text-white">Copyrights © 2022 All Rights Reserved by ClickInvitation</p>
        </div>
    </footer>
    @auth
        <div id="bottom-bar">
            <button onclick="addTimer()">Add Timer</button>
            <input type="text" id="textInput" placeholder="Type text here">
            <button onclick="addText()">Add Text</button>
            <input type="color" id="textColorPicker" value="#000000">
            <br>
            <input type="file" id="imageLoader" name="imageLoader">
            <button onclick="addImage()">Add Image</button>
            {{-- <input type="file" id="upload-button"> --}}
            {{-- <label for="font-size">Font Size:</label>
            <input type="number" id="font-size" min="1" max="100" value="24"> --}}
            <label for="font-family">Font Family:</label>
            <select class="form-select" id="font-family">
                <option value="Arial, sans-serif" style="font-family: Arial, sans-serif">Arial</option>
                <option value="Anta, sans-serif" style="font-family: Anta;">Anta</option>
                <option value="calig, Arial, sans-serif" style="font-family: 'calig', Arial, sans-serif;">calig
                </option>
                <option value="BLOODY, sans-serif" style="font-family: 'BLOODY', sans-serif;">BLOODY</option>
                <option value="Evilof, sans-serif" style="font-family: 'Evilof', sans-serif;">Evilof</option>
                <option value="Landliebe, sans-serif" style="font-family: 'Landliebe', sans-serif;">Landliebe
                </option>
                <option value="GREENFUZ, sans-serif" style="font-family: 'GREENFUZ', sans-serif;">GREENFUZ
                </option>
                <option value="Headhunter-Regular, sans-serif" style="font-family: 'Headhunter-Regular', sans-serif;">
                    Headhunter Regular</option>
                <option value="victoria, sans-serif" style="font-family: 'victoria', sans-serif;">victoria
                </option>
                <option value="Rock Salt, cursive" style="font-family: 'Rock Salt', cursive;">Rock Salt</option>
                <option value="playball, cursive" style="font-family: 'Playball', cursive;">Playball</option>
                <option value="Rammetto One, sans-serif" style="font-family: 'Rammetto One', sans-serif;">
                    Playball</option>
                <option value="Bungee Shade, sans-serif" style="font-family: 'Bungee Shade', sans-serif;">Bungee
                    Shade</option>
                <option value="HenryMorganHand, sans-serif" style="font-family: 'HenryMorganHand', sans-serif;">
                    Henry MorganHand</option>
                <option value="romeo, sans-serif" style="font-family: 'romeo', sans-serif;">Romeo</option>
                <option value="XTRAFLEX, sans-serif" style="font-family: 'XTRAFLEX', sans-serif;">XTRAFLEX
                </option>
                <option value="DancingScript-Regular, sans-serif"
                    style="font-family: 'DancingScript-Regular', sans-serif;">DancingScript Regular</option>
                <option value="MountainsofChristmas, sans-serif" style="font-family: 'MountainsofChristmas', sans-serif;">
                    Mountains of Christmas</option>
                <option value="Kingthings_Foundation, sans-serif"
                    style="font-family: 'Kingthings_Foundation', sans-serif;">Kingthings_Foundation</option>
                <option value="Royalacid_o, sans-serif" style="font-family: 'Royalacid_o', sans-serif;">
                    Royalacid_o</option>
                <option value="Royalacid, sans-serif" style="font-family: 'Royalacid', sans-serif;">Royalacid
                </option>
                <option value="OrotundCaps, sans-serif" style="font-family: 'OrotundCaps', sans-serif;">
                    OrotundCaps</option>
                <option value="qurve, sans-serif" style="font-family: 'qurve', sans-serif;">qurve</option>
                <option value="dephun2, sans-serif" style="font-family: 'dephun2', sans-serif;">dephun2</option>
                <option value="mysteron, sans-serif" style="font-family: 'mysteron', sans-serif;">mysteron
                </option>
                <option value="LETSEAT, sans-serif" style="font-family: 'LETSEAT', sans-serif;">LETSEAT</option>
                <option value="energydimension, sans-serif" style="font-family: 'energydimension', sans-serif;">
                    Energy Dimension</option>
                {{-- <option value="Popups, sans-serif" style="font-family: 'Popups', sans-serif;">Popups</option> --}}
                <option value="dipedthick, sans-serif" style="font-family: 'dipedthick', sans-serif;">dipedthick
                </option>

                <option value="EB Garamond, serif" style="font-family: EB Garamond, serif">EB Garamond</option>
                <option value="Courier New, monospace" style="font-family: Courier New, monospace">Courier New
                </option>
                <option value="Lobster, sans-serif" style="font-family: Lobster;">Lobster</option>
                <option value="Lucida Console, monospace" style="font-family: Lucida Console, monospace">Lucida
                    Console</option>
                <option value="Montserrat, sans-serif" style="font-family: Montserrat, sans-serif">Montserrat
                </option>
                <option value="Pacifico, cursive" style="font-family: Pacifico, cursive">Pacifico</option>
                <option value="PT Sans, sans-serif" style="font-family: PT Sans, sans-serif">PT Sans</option>
                <option value="Quicksand, sans-serif" style="font-family: Quicksand, sans-serif">Quicksand
                </option>
                <option value="Roboto, sans-serif" style="font-family: Roboto, sans-serif">Roboto</option>
                <option value="Source Code Pro, monospace" style="font-family: Source Code Pro, monospace">
                    Source Code Pro</option>
                <option value="Ubuntu, sans-serif" style="font-family: Ubuntu, sans-serif">Ubuntu</option>
                {{-- <option value="Ubuntu, sans-serif">Ubuntu</option> --}}

            </select>
            {{-- <label for="text-color">Text Color:</label>
            <input type="color" id="text-color"> --}}
            {{-- <button class="btn btn-primary" id="add-text-button">Add Text</button>
            <button class="btn btn-primary" id="addTemplateBtn">Add counter</button>
            <button class="btn btn-primary" style="display: none;" id="saveCounterBtn">Save counter</button> --}}
            <label>Show template:</label>
            <label class="switchtoggle">
                <input class="inputtoggle" type="checkbox" id="toggleSwitch">
                <span class="slidertoggle roundtoggle"></span>
            </label>
            <label>Show Gallery:</label>
            <label class="switchtoggle">
                <input class="inputtoggle" type="checkbox" id="toggleGallery">
                <span class="slidertoggle roundtoggle"></span>
            </label>
            <label>Show Event:</label>
            <label class="switchtoggle">
                <input class="inputtoggle" type="checkbox" id="toggleEvent">
                <span class="slidertoggle roundtoggle"></span>
            </label>
            <button class="responsiveButton btn btn-primary" id="responsiveButton">Responsive</button>
        </div>
    @endauth
    <div class="fullscreen-image" id="fullscreenImage">
        <div class="fullscreen-content">
            <span class="close-btn">&times;</span>
            <img id="fullscreenImageContent">
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>

    <script>
        let canvas = new fabric.Canvas('canvas');

        function resizeCanvas() {
            var canvasContainer = document.getElementById('canvas-container');
            var containerWidth = canvasContainer.offsetWidth;
            var containerHeight = canvasContainer.offsetHeight;
            canvas.setDimensions({
                width: containerWidth,
                height: containerHeight
            });

            var fontSize = Math.min(containerWidth / 20, 30);
            document.getElementById('textInput').style.fontSize = fontSize + 'px';
        }

        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);
        var timerObject = null;


        function addTimer() {
            var fontSize = parseInt(window.getComputedStyle(document.getElementById('textInput')).fontSize, 10);
            var fontFamily = document.getElementById('font-family').value;
            var textColor = document.getElementById('textColorPicker').value;

            if (timerObject) {
                canvas.remove(timerObject);
                clearInterval(timerInterval);
            }

            let EventDate = '{{ $event->date }}';
            var endTime = new Date(EventDate);
            console.log(endTime);
            // Create timer object
            timerObject = new fabric.Text('00:00:00', {
                left: canvas.width / 2,
                top: canvas.height / 2,
                fontFamily: fontFamily,
                fontSize: fontSize,
                fill: textColor,
                originX: 'center',
                originY: 'center',
                editable: true,
                zIndex: 1
            });

            canvas.add(timerObject);

            endTime.setDate(endTime.getDate() + 4);

            timerInterval = setInterval(function() {
                var now = new Date();
                var difference = endTime - now;

                if (difference <= 0) {
                    clearInterval(timerInterval); // Clear timer if it reached the end
                    timerObject.text = '00:00:00'; // Set text to zero
                    canvas.renderAll();
                    return;
                }

                var days = Math.floor(difference / (1000 * 60 * 60 * 24));
                var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((difference % (1000 * 60)) / 1000);

                // Format the time string
                var formattedTime = formatNumber(' ' + days) + '        ' + formatNumber(hours) + '         ' +
                    formatNumber(minutes) + '           ' + formatNumber(seconds) + '\n' +
                    'Days  Hours  Minutes  Seconds';

                // Update text color and font size
                timerObject.set({
                    'text': formattedTime,
                    'fill': textColor,
                    'fontSize': fontSize,
                });
                canvas.renderAll();
            }, 1000);

            function formatNumber(number) {
                // Add leading zero if number is less than 10
                return (number < 10 ? '0' : '') + number;
            }

            timerObject.on('selected', function() {
                selectedTextObject = timerObject;
            });

            document.getElementById('font-family').addEventListener('change', function() {
                if (selectedTextObject) {
                    selectedTextObject.set('fontFamily', this.value);
                    canvas.renderAll();
                }
            });

            document.getElementById('textColorPicker').addEventListener('input', function() {
                if (selectedTextObject) {
                    textColor = this.value; // Update the textColor variable
                    selectedTextObject.set('fill', textColor); // Update text color
                    canvas.renderAll();
                }
            });
        }

        var selectedTextObject = null;

        function addText() {
            var textInput = document.getElementById('textInput').value;
            var fontFamily = document.getElementById('font-family').value;
            var textColor = document.getElementById('textColorPicker').value;
            var fontSize = parseInt(window.getComputedStyle(document.getElementById('textInput')).fontSize, 10);
            var text = new fabric.IText(textInput, {
                left: canvas.width / 2,
                top: canvas.height / 2,
                fontFamily: fontFamily,
                fontSize: fontSize,
                fill: textColor,
                originX: 'center',
                originY: 'center',
                editable: true,
                zIndex: 1
            });
            canvas.add(text);
            text.on('selected', function() {
                selectedTextObject = text;
            });
            document.getElementById('font-family').addEventListener('change', function() {
                if (selectedTextObject) {
                    selectedTextObject.set('fontFamily', this.value);
                    canvas.renderAll();
                }
            });
            document.getElementById('textColorPicker').addEventListener('input', function() {
                if (selectedTextObject) {
                    selectedTextObject.set('fill', this.value); // Update text color
                    canvas.renderAll();
                }
            });
        }

        function addImage() {
            var input = document.getElementById('imageLoader');
            var reader = new FileReader();
            reader.onload = function(event) {
                var imgObj = new Image();
                imgObj.src = event.target.result;
                imgObj.onload = function() {
                    var img = new fabric.Image(imgObj);
                    canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas), {
                        scaleX: canvas.width / img.width,
                        scaleY: canvas.height / img.height
                    });
                };
            };
            reader.readAsDataURL(input.files[0]);
        }

        $("#saveBtn").on("click", function() {
            var jsonData = JSON.stringify(canvas.toJSON());
            $.ajax({
                url: "{{ route('website.save') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'id_event': {{ $event->id_event }},
                    'elements': jsonData
                },
                success: function(data) {
                    $('#saveBtn').css("display", 'none'); // Add !important
                    $('#UpdateBtn').css("display", 'block');
                    $(".text-element").remove();
                    savedElements = [];
                },
                error: function(data) {
                    //console.log(data);
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var toggleSwitch = document.getElementById('toggleSwitch');
            var contentContainer = document.querySelector('.content-container');
            if ({{ auth()->user()->id ?? 0 }} > 0) {
                contentContainer.style.display = "block";
                toggleSwitch.checked = true;
                toggleSwitch.addEventListener('change', function() {
                    if (this.checked) {
                        contentContainer.style.display = "block";
                    } else {
                        contentContainer.style.display = "none";
                    }
                });
            } else {
                contentContainer.style.display = "block";
            }

        });

        document.addEventListener("DOMContentLoaded", function() {
            getWebsite();
        });

        function getWebsite() {
            $.ajax({
                url: "{{ route('website.get') }}",
                type: "GET",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'id_event': {{ $event->id_event }}
                },
                success: function(data) {
                    if (data.websiteDetails == null) {
                        canvas.clear();
                        return;
                    }
                    var jsonData = JSON.parse(data.websiteDetails.element);
                    canvas.clear();
                    canvas.loadFromJSON(jsonData, function() {
                        canvas.forEachObject(function(obj) {});
                        canvas.renderAll();
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error retrieving website data:", error);
                }
            });
        }



        $("#UpdateBtn").on("click", function() {
            return Swal.fire({
                    icon: 'warning',
                    title: 'Confirmed?',
                    text: 'This will remove all text. Are you sure you want to remove all text?',
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('website.update') }}",
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                'id_event': {{ $event->id_event }},
                            },
                            success: function(data) {
                                getWebsite();
                                $('#saveBtn').css("display", 'block');
                                $(".text-element").remove();
                                $("#UpdateBtn").css("display", 'none');
                                savedElements = [];
                            },
                            error: function(data) {
                                //console.log(data);
                            }
                        });
                    }
                });
        });
        $('.custom-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            centerPadding: '20px',
            autoplaySpeed: 2000,
            arrows: false,
            infinite: true,
            cssEase: 'linear',
            variableWidth: true,
            centerMode: true,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 900,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 550,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                }
            ]
        });

        function setupCountdown(campaignSelector, startTimeMillis, endTimeMillis) {
            var second = 1000;
            var minute = second * 60;
            var hour = minute * 60;
            var day = hour * 24;

            function calculateRemaining() {
                var now = new Date().getTime();
                return now >= startTimeMillis && now < endTimeMillis ? endTimeMillis - now : 0;
            }

            var didRefresh = false;
            var previousGap = calculateRemaining();

            function countdown() {
                var gap = calculateRemaining();
                var shouldRefresh = previousGap > day && gap <= day || previousGap > 0 && gap === 0;

                previousGap = gap;

                var textDay = Math.floor(gap / day);
                var textHour = Math.floor((gap % day) / hour);
                var textMinute = Math.floor((gap % hour) / minute);
                var textSecond = Math.floor((gap % minute) / second);

                if (document.querySelector(campaignSelector + ' .timer')) {
                    document.querySelector(campaignSelector + ' .day').innerText = textDay;
                    document.querySelector(campaignSelector + ' .hour').innerText = textHour;
                    document.querySelector(campaignSelector + ' .minute').innerText = textMinute;
                    document.querySelector(campaignSelector + ' .second').innerText = textSecond;
                }
                if (shouldRefresh && !didRefresh) {
                    didRefresh = true;
                    setTimeout(function() {
                        window.location.reload();
                    }, 30000 + Math.random() * 90000);
                }
            }
            countdown();
            setInterval(countdown, 1000);
        }



        let isCounterAdded = false;

        $("#addTemplateBtn").click(function() {
            if (!isCounterAdded) {
                let eventDate = new Date("{{ $event->date }}").getTime();
                let currentDate = new Date().getTime();

                setupCountdown(".campaign-0", currentDate, eventDate);
                // $(this).text("Save Counter");
                $(this).css("display", 'none');
                $('#saveCounterBtn').css("display", 'inline-block');
                isCounterAdded = true;
            } else {
                $(this).prop("enabled", true);
            }
        })
        $('#saveCounterBtn').click(function() {
            const formData = new FormData();
            formData.append('id_event', '{{ $event->id_event }}');
            formData.append('counter', 1);
            $.ajax({
                url: "{{ route('counter.store') }}",
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#saveCounterBtn').css("display", 'none');
                },
                error: function(error) {
                    console.error(error);
                }
            })
        })
    </script>
</body>

</html>
