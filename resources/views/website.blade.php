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
    <link rel="stylesheet" href="{{ url('assets/css/website.module.css') }}">

</head>

<body class="webbodymain">
    <div id="canvas-container">
        <canvas id="canvas"></canvas>
    </div>
    <br>
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
        <section class="container gallery-section">
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
            <div class="container-fluid">
                <div class="row d-flex justify-content-between align-items-center">

                    <div class="col-md-12 d-flex align-items-center">

                        <input type="text" id="textInput" placeholder="Type text here" class="form-control w-25">
                        <button class="btn btn-outline-secondary" onclick="addText()">Add Text</button>

                        <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Text Effects
                        </button>
                        <ul class="dropdown-menu">
                            <li><button id="underlineBtn" class="dropdown-item" href="#">Underline</button></li>
                            <li><button id="boldBtn" class="dropdown-item" href="#">Bold</button></li>
                            <li><button id="italicBtn" class="dropdown-item" href="#">Italic</button></li>
                        </ul>
                        <button class="btn btn-outline-warning" onclick="addTimer()">Add Timer</button>

                        <input class="form-control w-25" type="color" id="textColorPicker" value="#000000">
                        <input class="form-control w-25" type="file" id="imageLoader" name="imageLoader">
                        <button class="btn btn-outline-primary" onclick="addImage()">Add Image</button>
                        <label class="form-label" for="font-family">Font Family:</label>
                        <select class="form-select w-25" id="font-family">
                            <option value="Arial, sans-serif" style="font-family: Arial, sans-serif">Arial</option>
                            <option value="Anta, sans-serif" style="font-family: Anta;">Anta</option>
                            <option value="calig, Arial, sans-serif" style="font-family: 'calig', Arial, sans-serif;">
                                calig
                            </option>
                            <option value="BLOODY, sans-serif" style="font-family: 'BLOODY', sans-serif;">BLOODY</option>
                            <option value="Evilof, sans-serif" style="font-family: 'Evilof', sans-serif;">Evilof</option>
                            <option value="Landliebe, sans-serif" style="font-family: 'Landliebe', sans-serif;">Landliebe
                            </option>
                            <option value="GREENFUZ, sans-serif" style="font-family: 'GREENFUZ', sans-serif;">GREENFUZ
                            </option>
                            <option value="Headhunter-Regular, sans-serif"
                                style="font-family: 'Headhunter-Regular', sans-serif;">
                                Headhunter Regular</option>
                            <option value="victoria, sans-serif" style="font-family: 'victoria', sans-serif;">victoria
                            </option>
                            <option value="Rock Salt, cursive" style="font-family: 'Rock Salt', cursive;">Rock Salt
                            </option>
                            <option value="playball, cursive" style="font-family: 'Playball', cursive;">Playball</option>
                            <option value="Rammetto One, sans-serif" style="font-family: 'Rammetto One', sans-serif;">
                                Playball</option>
                            <option value="Bungee Shade, sans-serif" style="font-family: 'Bungee Shade', sans-serif;">
                                Bungee
                                Shade</option>
                            <option value="HenryMorganHand, sans-serif"
                                style="font-family: 'HenryMorganHand', sans-serif;">
                                Henry MorganHand</option>
                            <option value="romeo, sans-serif" style="font-family: 'romeo', sans-serif;">Romeo</option>
                            <option value="XTRAFLEX, sans-serif" style="font-family: 'XTRAFLEX', sans-serif;">XTRAFLEX
                            </option>
                            <option value="DancingScript-Regular, sans-serif"
                                style="font-family: 'DancingScript-Regular', sans-serif;">DancingScript Regular</option>
                            <option value="MountainsofChristmas, sans-serif"
                                style="font-family: 'MountainsofChristmas', sans-serif;">
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
                            <option value="dephun2, sans-serif" style="font-family: 'dephun2', sans-serif;">dephun2
                            </option>
                            <option value="mysteron, sans-serif" style="font-family: 'mysteron', sans-serif;">mysteron
                            </option>
                            <option value="LETSEAT, sans-serif" style="font-family: 'LETSEAT', sans-serif;">LETSEAT
                            </option>
                            <option value="energydimension, sans-serif"
                                style="font-family: 'energydimension', sans-serif;">
                                Energy Dimension</option>
                            <option value="dipedthick, sans-serif" style="font-family: 'dipedthick', sans-serif;">
                                dipedthick
                            </option>

                            <option value="EB Garamond, serif" style="font-family: EB Garamond, serif">EB Garamond
                            </option>
                            <option value="Courier New, monospace" style="font-family: Courier New, monospace">Courier New
                            </option>
                            <option value="Lobster, sans-serif" style="font-family: Lobster;">Lobster</option>
                            <option value="Lucida Console, monospace" style="font-family: Lucida Console, monospace">
                                Lucida
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

                        </select>
                    </div>

                </div>
            </div>
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
            {{-- <button class="responsiveButton btn btn-primary" id="responsiveButton">Responsive</button> --}}
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
            // document.getElementById('textInput').style.fontSize = fontSize + 'px';
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
                    clearInterval(timerInterval);
                    timerObject.text = '00:00:00';
                    canvas.renderAll();
                    return;
                }

                var days = Math.floor(difference / (1000 * 60 * 60 * 24));
                var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((difference % (1000 * 60)) / 1000);

                var formattedTime = formatNumber(' ' + days) + '        ' + formatNumber(hours) + '         ' +
                    formatNumber(minutes) + '           ' + formatNumber(seconds) + '\n' +
                    'Days  Hours  Minutes  Seconds';

                timerObject.set({
                    'text': formattedTime,
                    'fill': textColor,
                    'fontSize': fontSize,
                });
                canvas.renderAll();
            }, 1000);

            function formatNumber(number) {
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
                    textColor = this.value;
                    selectedTextObject.set('fill', textColor);
                    canvas.renderAll();
                }
            });
        }

        var selectedTextObject = null;

        if ({{ auth()->user()->id ?? 0 }} > 0) {
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
                        selectedTextObject.set('fill', this.value);
                        canvas.renderAll();
                    }
                });
            }
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
        if ({{ auth()->user()->id ?? 0 }} > 0) {
            document.getElementById('underlineBtn').addEventListener('click', function() {
                if (selectedTextObject || timerObject) {
                    applyTextEffect('underline');
                }
            });

            document.getElementById('boldBtn').addEventListener('click', function() {
                if (selectedTextObject || timerObject) {
                    applyTextEffect('bold');
                }
            });

            document.getElementById('italicBtn').addEventListener('click', function() {
                if (selectedTextObject || timerObject) {
                    applyTextEffect('italic');
                }
            });
        }

        function applyTextEffect(effect) {
            if (selectedTextObject) {
                switch (effect) {
                    case 'underline':
                        selectedTextObject.set('underline', !selectedTextObject.underline);
                        break;
                    case 'bold':
                        selectedTextObject.set('fontWeight', selectedTextObject.fontWeight === 'bold' ? 'normal' : 'bold');
                        break;
                    case 'italic':
                        selectedTextObject.set('fontStyle', selectedTextObject.fontStyle === 'italic' ? 'normal' :
                            'italic');
                        break;
                }
                selectedTextObject.setCoords(); // Update object coordinates
            }
            if (timerObject) {
                switch (effect) {
                    case 'underline':
                        timerObject.set('underline', !timerObject.underline);
                        break;
                    case 'bold':
                        timerObject.set('fontWeight', timerObject.fontWeight === 'bold' ? 'normal' : 'bold');
                        break;
                    case 'italic':
                        timerObject.set('fontStyle', timerObject.fontStyle === 'italic' ? 'normal' : 'italic');
                        break;
                }
                timerObject.setCoords(); // Update object coordinates
            }
            canvas.renderAll();
        }



        document.addEventListener('keydown', function(event) {
            if (!['INPUT', 'TEXTAREA'].includes(event.target.tagName) && selectedTextObject) {
                switch (event.keyCode) {
                    case 37:
                        moveObject(selectedTextObject, 'left', -2);
                        event.preventDefault();
                        break;
                    case 38:
                        moveObject(selectedTextObject, 'top', -2);
                        event.preventDefault();
                        break;
                    case 39:
                        moveObject(selectedTextObject, 'left', 2);
                        event.preventDefault();
                        break;
                    case 40:
                        moveObject(selectedTextObject, 'top', 2);
                        event.preventDefault();
                        break;
                    case 46:
                        canvas.remove(selectedTextObject);
                        selectedTextObject = null;
                        break;
                }
            }
        });

        function moveObject(object, property, delta) {
            object.set(property, object.get(property) + delta);
            canvas.renderAll();
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
                    $('#saveBtn').css("display", 'none');
                    if ({{ auth()->user()->id ?? 0 }} > 0) {

                    } else {
                        $('#UpdateBtn').css("display", 'none');
                        $('#saveBtn').css("display", 'none');

                    }
                    $('#UpdateBtn').css("display", 'block');
                    $(".text-element").remove();
                    savedElements = [];
                },
                error: function(data) {}
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

            var toggleGallery = document.getElementById('toggleGallery');
            var gallerySection = document.querySelector('.gallery-section');
            if ({{ auth()->user()->id ?? 0 }} > 0) {
                gallerySection.style.display = "block";
                toggleGallery.checked = true;
                toggleGallery.addEventListener('change', function() {
                    if (this.checked) {
                        gallerySection.style.display = "block";
                    } else {
                        gallerySection.style.display = "none";
                    }

                })
            } else {
                gallerySection.style.display = "block";
            }


            var toggleEvent = document.getElementById('toggleEvent');
            var eventSection = document.querySelector('.event-section');
            if ({{ auth()->user()->id ?? 0 }} > 0) {
                eventSection.style.display = "block";
                toggleEvent.checked = true;
                toggleEvent.addEventListener('change', function() {
                    if (this.checked) {
                        eventSection.style.display = "block";
                    } else {
                        eventSection.style.display = "none";
                    }

                })
            } else {
                eventSection.style.display = "block";
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            if ({{ auth()->user()->id ?? 0 }} > 0) {

            } else {
                $('#UpdateBtn').css("display", 'none');
                $('#saveBtn').css("display", 'none');

            }
            getWebsite();
        });

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

        var timerInterval;

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
                        canvas.forEachObject(function(obj) {
                            if (obj.type === 'text' && obj.text.includes(
                                    'Days  Hours  Minutes  Seconds')) {
                                timerObject = obj;

                                if ({{ auth()->user()->id ?? 0 }} > 0) {} else {
                                    timerObject.set({
                                        selectable: false,
                                        evented: false
                                    })
                                }

                                updateTimer();
                                timerInterval = setInterval(updateTimer,
                                    1000);

                                timerObject.on('selected', function() {
                                    selectedTextObject = timerObject;
                                });
                                timerObject.on('deselected', function() {
                                    canvas.remove(timerObject.deleteButton);
                                });

                            }
                            console.log(obj);
                            if (obj.type === 'i-text') {
                                if ({{ auth()->user()->id ?? 0 }} > 0) {
                                    addText(obj);
                                } else {
                                    obj.set({
                                        selectable: false, 
                                        evented: false
                                    });
                                }

                                obj.on('selected', function() {
                                    selectedTextObject = obj;
                                });
                                obj.on('deselected', function() {
                                    canvas.remove(obj.deleteButton);
                                });
                            }
                        });
                        if ({{ auth()->user()->id ?? 0 }} > 0) {

                        } else {
                            canvas.selection = false;
                        }
                        canvas.renderAll();
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error retrieving website data:", error);
                }
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


        function updateTimer() {
            var now = new Date();
            var endTime = new Date('{{ $event->date }}');
            var difference = endTime - now;

            if (difference <= 0) {
                clearInterval(timerInterval);
                timerObject.text = '00:00:00';
                canvas.renderAll();
                return;
            }

            var days = Math.floor(difference / (1000 * 60 * 60 * 24));
            var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((difference % (1000 * 60)) / 1000);

            var formattedTime = formatNumber(' ' + days) + '        ' +
                formatNumber(hours) + '         ' +
                formatNumber(minutes) + '           ' + formatNumber(seconds) + '\n' +
                'Days  Hours  Minutes  Seconds';

            timerObject.set({
                'text': formattedTime
            });
            canvas.renderAll();
        }

        function formatNumber(number) {
            return (number < 10 ? '0' : '') + number;
        }

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
