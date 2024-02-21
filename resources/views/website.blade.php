<!DOCTYPE html>
<html>

<head>
    <title>Web Template</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
        body {
            scroll-behavior: smooth;
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
        }

        #upload-button,
        #font-size,
        #font-family,
        #text-color {
            margin-right: 10px;
        }

        .webbodymain {
            padding-bottom: 60px;
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
            bottom: 70px;
            right: 10px;
            z-index: 1;
            border: none;
            outline: none;
            border-radius: 50%;
            padding: 20px 15px;
            background: #198754;
            color: white;
            display: none;
        }

        .SaveBtn:focus {
            outline: none;
            border: none;
            background: #105434;
        }
    </style>
</head>

<body class="webbodymain">
    <div class="overlay"></div>
    <div id="picture">
        <div id="text-overlay"></div>
    </div>
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
    @if (!$photogallery->isEmpty())
        <h1 id="gallery" class="gall text-center mt-5">Gallery</h1>
        <hr class="hr w-25 mb-5">

        <div class="custom-slider container">
            @foreach ($photogallery as $photo)
                <div class="custom-box ">
                    <img src="/event-images/{{ $photo->id_event }}/photogallery/{{ $photo->id_photogallery }}.jpg"
                        class="card-img-top">
                </div>
            @endforeach
        </div>
        <center>
            <button class="btn btn-primary mt-3" id="viewall"><a class="text-white text-decoration-none"
                    target="_blank" href="{{ url("/events/$event->id_event/show-gallery") }}">View All</a></button>
        </center>
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

    <footer class="footer">
        <div style="background-color: #7e7e7e; height: 70px; text-align: center; ">
            <p class="pt-4 text-white">Copyrights © 2022 All Rights Reserved by ClickInvitation</p>
        </div>
    </footer>

    <div id="bottom-bar">
        <input type="file" id="upload-button">
        <label for="font-size">Font Size:</label>
        <input type="number" id="font-size" min="1" max="100" value="24">
        <label for="font-family">Font Family:</label>
        <select class="form-select" id="font-family">
            <option value="Arial, sans-serif">Arial</option>
            <option value="Verdana, sans-serif">Verdana</option>
            <option value="Georgia, serif">Georgia</option>
            <option value="Times New Roman, serif">Times New Roman</option>
        </select>
        <label for="text-color">Text Color:</label>
        <input type="color" id="text-color">
        <button class="btn btn-primary" id="add-text-button">Add Text</button>
        <button class="btn btn-primary" id="addTemplateBtn">Add counter</button>
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
    <div class="fullscreen-image" id="fullscreenImage">
        <div class="fullscreen-content">
            <span class="close-btn">&times;</span>
            <img id="fullscreenImageContent">
        </div>
    </div>

    <script>
        // Define an array to store saved elements
        var savedElements = [];

        function centerElements() {
            var newText = document.querySelector('.text-element');
            var clock = document.querySelector('.hero.connect-page');

            if (newText && clock) {
                var containerWidth = Math.max(newText.offsetWidth, clock.offsetWidth);
                var containerHeight = newText.offsetHeight + clock.offsetHeight;

                var containerLeft = (window.innerWidth - containerWidth) / 2;
                var containerTop = (window.innerHeight - containerHeight) / 2;

                newText.style.left = containerLeft + 'px';
                newText.style.top = containerTop + 'px';

                clock.style.left = containerLeft + 'px';
                clock.style.top = containerTop + newText.offsetHeight + 'px';
            } else if (clock && !newText) {
                var clockLeft = (window.innerWidth - clock.offsetWidth) / 2;
                var clockTop = (window.innerHeight - clock.offsetHeight) / 2;
                clock.style.left = clockLeft + 'px';
                clock.style.top = clockTop + 'px';
            } else if (newText && !clock) {
                var newTextLeft = (window.innerWidth - newText.offsetWidth) / 2;
                var newTextTop = (window.innerHeight - newText.offsetHeight) / 2;
                newText.style.left = newTextLeft + 'px';
                newText.style.top = newTextTop + 'px';
            }
        }

        document.getElementById('responsiveButton').addEventListener('click', function() {
            centerElements();
        });

        window.addEventListener('resize', function() {
            centerElements();
        });

        $(document).ready(function() {
            getWebsite();
            $('.custom-slider').css('display', 'none');
            $('.gall').css('display', 'none');

            $('#toggleGallery').on('change', function() {
                if ($(this).is(':checked')) {
                    $('.gall').css('display', 'block');
                    $('.custom-slider').css('display', 'block');
                    $('#viewall').css('display', 'block');
                } else {
                    $('.gall').css('display', 'none');
                    $('.custom-slider').css('display', 'none');
                    $('#viewall').css('display', 'none');
                }
            });

            $('.event-section').css('display', 'none');
            $('#toggleEvent').on('change', function() {
                if ($(this).is(':checked')) {
                    $('.event-section').css('display', 'block');
                } else {
                    $('.event-section').css('display', 'none');
                }
            });
        })

        $(document).ready(function() {
            $("#addTemplateBtn").click(function() {
                var templateHTML = `
        <div class="hero connect-page">
          <span class="close-counter">&times;</span>
          <div class="hero-body">
            <div class="campaign campaign-0">
              <div class="counter timer">
                <span class="title">time remaining</span>
                <div class="counter-boxes">
                  <div class="count-box">
                    <h1 class="value day">0</h1>
                    <span>Days</span>
                  </div>
                  <div class="count-box">
                    <h1 class="value hour">0</h1>
                    <span>Hours</span>
                  </div>
                  <div class="count-box">
                    <h1 class="value minute">0</h1>
                    <span>Minutes</span>
                  </div>
                  <div class="count-box">
                    <h1 class="value second">0</h1>
                    <span>Seconds</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      `;

                $("#picture").append(templateHTML);
                var newTemplate = $(".hero.connect-page").last();
                makeDraggable(newTemplate);
                makeResizable(newTemplate);

                newTemplate.click(function() {
                    $(this).toggleClass("show-border");
                });

            });
            $('#picture').on('click', '.close-counter', function() {
                $(this).closest('.connect-page').remove();
            });
        });

        function makeResizable(element) {
            element.resizable({
                handles: "n, e, s, w, ne, se, sw, nw"
            });
        }
        $(document).on("click", ".delete-button", function() {
            $(this).parent().remove();
        });

        $(document).ready(function() {
            var fullscreenImage = $('#fullscreenImage');
            var fullscreenImageContent = $('#fullscreenImageContent');
            var holdTimer;

            $('.custom-slider img').mousedown(function() {
                holdTimer = setTimeout(function() {
                    clearTimeout(holdTimer);
                }, 500);
            }).mouseup(function() {
                clearTimeout(holdTimer);
                fullscreenImageContent.attr('src', $(this).attr('src'));
                fullscreenImage.show();
            });

            $('.close-btn').click(function() {
                fullscreenImage.hide();
            });

            $('.fullscreen-image').click(function() {
                fullscreenImage.hide();
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            var toggleSwitch = document.getElementById('toggleSwitch');
            var contentContainer = document.querySelector('.content-container');

            toggleSwitch.addEventListener('change', function() {
                contentContainer.classList.toggle('hidden', !toggleSwitch.checked);
            });
        });

        document.getElementById('upload-button').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var formData = new FormData();
            formData.append('image', file);
            formData.append('id_event', '{{ $event->id_event }}');
            var reader = new FileReader();
            console.log(file)
            $.ajax({
                url: "{{ route('image.store') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data.website.image);
                    document.getElementById('picture').style.backgroundImage = 'url(/website-banner/' +
                        data.website.image + ')';
                    getWebsite();
                },
                error: function(data) {
                    console.log(data);
                }
            })


            reader.readAsDataURL(file);
        });

        console.log({{ $event->id_event }});

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
                    document.getElementById('picture').style.backgroundImage = 'url(/website-banner/' + data
                        .website.image + ')';
                    if (data.websiteDetails) {
                        var Element = data.websiteDetails;
                        for (var i = 0; i < Element.length; i++) {
                            var element = Element[i].element;
                            element = JSON.parse(element);
                            console.log(element);
                            /// Get the div where you want to print the text elements
                            var printDiv = document.getElementById('text-overlay');
                            // Iterate over the savedElements array
                            element.forEach(function(element) {
                                // Create a new paragraph element
                                var printText = document.createElement('p');
                                console.log(element.text);
                                // Set the text content and style based on the saved data
                                printText.innerText = element.text;
                                printText.style.color = element.style.color;
                                printText.style.fontSize = element.style.fontSize;
                                printText.style.fontFamily = element.style.fontFamily;
                                printText.style.position = element.style.position;
                                printText.style.top = element.style.top;
                                printText.style.left = element.style.left;
                                printText.style.zIndex = 99999999;

                                // Apply !important to override any conflicting CSS rules
                                printText.style.setProperty('color', element.style.color, 'important');
                                printText.style.setProperty('font-size', element.style.fontSize,
                                    'important');
                                printText.style.setProperty('font-family', element.style.fontFamily,
                                    'important');

                                // Append the paragraph element to the printDiv
                                printDiv.appendChild(printText);
                            });
                        }
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
        var textOverlay = document.getElementById('text-overlay');
        var zIndexCounter = 1;
        var selectedText = null;

        // document.getElementById('add-text-button').addEventListener('click', function() {
        //     var newText = document.createElement('p');
        //     newText.contentEditable = true;
        //     newText.innerText = 'New text';
        //     newText.className = 'text-element';
        //     newText.style.color = document.getElementById('text-color').value;
        //     newText.style.fontSize = document.getElementById('font-size').value + 'px';
        //     newText.style.fontFamily = document.getElementById('font-family').value;
        //     var closeButton = document.createElement('span');
        //     closeButton.innerHTML = '&times;';
        //     closeButton.className = 'close-button';
        //     closeButton.style.position = 'absolute';
        //     closeButton.style.zIndex = '999'
        //     closeButton.style.cursor = 'pointer'

        //     makeDraggable(newText);

        //     newText.addEventListener('click', function() {
        //         selectText(newText);
        //     });
        //     closeButton.addEventListener('click', function() {
        //         textOverlay.removeChild(newText);
        //     })
        //     textOverlay.appendChild(newText);
        //     newText.appendChild(closeButton);

        //     newText.style.zIndex = '99999999';

        //     if ($(".text-element").length > 0) {
        //         $("#saveBtn").show();
        //     }
        // });

        document.getElementById('add-text-button').addEventListener('click', function() {
            var newText = document.createElement('p');
            newText.contentEditable = true;
            newText.innerText = 'New text';
            newText.className = 'text-element';
            newText.style.color = document.getElementById('text-color').value;
            newText.style.fontSize = document.getElementById('font-size').value + 'px';
            newText.style.fontFamily = document.getElementById('font-family').value;
            newText.style.position = 'absolute'; // Set position style
            newText.style.top = '0px'; // Set initial top position
            newText.style.left = '0px'; // Set initial left position
            var closeButton = document.createElement('span');
            closeButton.innerHTML = '&times;';
            closeButton.className = 'close-button';
            closeButton.style.position = 'absolute';
            closeButton.style.zIndex = '999';
            closeButton.style.cursor = 'pointer';

            makeDraggable(newText);

            newText.addEventListener('click', function() {
                selectText(newText);
            });
            closeButton.addEventListener('click', function() {
                textOverlay.removeChild(newText);
                // Remove newText from saved elements
                savedElements.splice(savedElements.indexOf(newText), 1);
                // Hide save button if no text elements left
                if (savedElements.length === 0) {
                    $("#saveBtn").hide();
                }
            });

            newText.addEventListener('input', function() {
                // Update the text content in the savedElements array
                var index = savedElements.findIndex(function(element) {
                    return element.textElement === newText;
                });
                if (index !== -1) {
                    savedElements[index].text = newText.innerText.replace(/[\n×]/g, '');
                }
            });

            ['input', 'change', 'keyup', 'mouseup'].forEach(function(eventType) {
                newText.addEventListener(eventType, function() {
                    // Update the style properties in the savedElements array
                    var index = savedElements.findIndex(function(element) {
                        return element.textElement === newText;
                    });
                    if (index !== -1) {
                        savedElements[index].style.color = newText.style.color;
                        savedElements[index].style.fontSize = newText.style.fontSize;
                        savedElements[index].style.fontFamily = newText.style.fontFamily;
                        savedElements[index].style.top = newText.style.top;
                        savedElements[index].style.left = newText.style.left;
                    }
                });
            });

            textOverlay.appendChild(newText);
            newText.appendChild(closeButton);

            newText.style.zIndex = '99999999';

            // Save the newly added text element
            savedElements.push({
                textElement: newText,
                text: newText.innerText.replace(/[\n×]/g, ''), // Remove newline and '×' characters
                style: {
                    color: newText.style.color,
                    fontSize: newText.style.fontSize,
                    fontFamily: newText.style.fontFamily,
                    position: 'absolute',
                    top: newText.style.top,
                    left: newText.style.left
                }
            });

            // Show save button
            $("#saveBtn").show();
        });

        var closeButtons = document.getElementsByClassName('close-button');
        for (var i = 0; i < closeButtons.length; i++) {
            closeButtons[i].addEventListener('click', function() {
                console.log("clicked");
                if ($(".text-element").length > 0) {
                    $("#saveBtn").show();
                } else {
                    $("#saveBtn").hide();
                }
            });
        }

        $("#saveBtn").on("click", function() {

            $.ajax({
                url: "{{ route('website.save') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'id_event': {{ $event->id_event }},
                    'elements': JSON.stringify(savedElements)
                },
                success: function(data) {
                    $(".text-element").remove();
                    getWebsite();

                },
                error: function(data) {
                    console.log(data);
                }
            });
            console.log(savedElements);
        });



        function editImage(button, imageNumber) {
            var input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.onchange = function(e) {
                var file = e.target.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    var img = button.previousElementSibling;
                    img.src = e.target.result;
                }

                reader.readAsDataURL(file);
            };

            input.click();
        }

        document.getElementById('text-color').addEventListener('input', function() {
            if (selectedText) {
                selectedText.style.color = this.value;
            }
        });

        document.getElementById('font-family').addEventListener('change', function() {
            if (selectedText) {
                selectedText.style.fontFamily = this.value;
            }
        });

        document.getElementById('font-size').addEventListener('input', function() {
            if (selectedText) {
                selectedText.style.fontSize = this.value + 'px';
            }
        });

        function selectText(textElement) {
            if (selectedText) {
                selectedText.classList.remove('selected');
            }
            selectedText = textElement;
            selectedText.classList.add('selected');
        }

        function makeDraggable(element) {
            if (element instanceof jQuery) {
                element = element.get(0);
            }

            var isDragging = false;
            var offsetX, offsetY;
            var pictureRect = document.getElementById('picture').getBoundingClientRect();

            element.addEventListener('mousedown', function(e) {
                isDragging = true;
                offsetX = e.clientX - element.getBoundingClientRect().left;
                offsetY = e.clientY - element.getBoundingClientRect().top;
            });

            document.addEventListener('mousemove', function(e) {
                if (isDragging) {
                    var left = e.clientX - offsetX;
                    var top = e.clientY - offsetY;

                    if (
                        left >= pictureRect.left &&
                        top >= pictureRect.top &&
                        left + element.offsetWidth <= pictureRect.right &&
                        top + element.offsetHeight <= pictureRect.bottom
                    ) {
                        element.style.left = left + 'px';
                        element.style.top = top + 'px';
                    }
                }
            });

            document.addEventListener('mouseup', function() {
                isDragging = false;
            });

            element.addEventListener('touchstart', function(e) {
                var touch = e.touches[0];
                isDragging = true;
                offsetX = touch.clientX - element.getBoundingClientRect().left;
                offsetY = touch.clientY - element.getBoundingClientRect().top;

                e.preventDefault();
            });

            document.addEventListener('touchmove', function(e) {
                if (isDragging) {
                    var touch = e.touches[0];
                    var left = touch.clientX - offsetX;
                    var top = touch.clientY - offsetY;

                    if (
                        left >= pictureRect.left &&
                        top >= pictureRect.top &&
                        left + element.offsetWidth <= pictureRect.right &&
                        top + element.offsetHeight <= pictureRect.bottom
                    ) {
                        element.style.left = left + 'px';
                        element.style.top = top + 'px';
                    }

                    e.preventDefault();
                }
            });

            document.addEventListener('touchend', function() {
                isDragging = false;
            });
        }
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
        document.addEventListener("DOMContentLoaded", function(event) {
            if (!document.querySelectorAll || !document.body.classList) {
                return;
            }

        });
        setupCountdown(".campaign-0", 1705780800000, 1709864300000);
    </script>
</body>

</html>
