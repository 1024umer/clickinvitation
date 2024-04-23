<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://searchmarketingservices.online/fonts/index.css">
    <style>
        .bgImg {
            background: url('/bday.png');
            height: 100vh;
            background-position: center;

            background-size: contain;
            background-repeat: no-repeat;
        }

        body {
            height: 100vh;

            background-image: linear-gradient(purple, #bc98dc);
            background-size: cover;
            background-repeat: no-repeat, repeat;


        }

        .cakee {
            display: block;
            position: fixed;
            top: 50%;
            left: 50%;
            width: 5px;
            transform: translate(-50%, -50%) scale(1);
            /* transform: ; */
        }

        .newBox {
            width: 150px;
            height: 200px;
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(1);
            background: bisque;
            z-index: -1;
            transition: 2.5s;

            transform-origin: center;

        }

        .cardScale {
            transform: translate(-50%, -75%) scale(2.3);
        }

        @media screen and (max-width: 820px) {
            .cakee {

                /* display: none; */
                transform: translate(-50%, -50%) scale(0.6);

            }

            .newBox {
                transform: translate(-50%, -50%) scale(0.6);

            }

            .cardScale {
                transform: translate(-70%, -75%) scale(2.2);
            }

        }

        @media screen and (max-width: 390px) {
            .cakee {

                /* display: none; */
                transform: translate(-50%, -50%) scale(0.3);

            }

            .newBox {
                transform: translate(-50%, -50%) scale(0.4);

            }

            .cardScale {
                transform: translate(-70%, -75%) scale(1.7);
            }


        }

        #canvas {
            top: -205px !important;
            left: -135px !important;
        }

        .extra-card {
            animation: fade-in 10s;
            animation-fill-mode: forwards;
            opacity: 0;
        }

        @keyframes fade-in {
            90% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }

        }
    </style>



</head>

<body>

    <input type="hidden" id="id_event" value="{{ $eventData[0]->json }}">
    <div class="bgImg">




        <div class="container my-5">
            <img id="cake" class="cakee" src="/cake1.gif" alt="">
        </div>

        <div id="card" class="newBox">
            <canvas id="canvas" style=" scale: 0.4 !important;">Your browser doesn't support canvas</canvas>
        </div>
    </div>
    @if ($card[0]->rsvp != '0,0,0,0,0,0')
        <!-- Button to submit RSVP -->
        <a class="btn btn-primary extra-card" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
            aria-controls="offcanvasExample"
            style="
     
     z-index: 7;
     position: absolute;
     bottom: 20px;
     left: 40%;
     transform: translateX(-50%);
     width: 70%;
     /* margin: 0 5px; */
 
 ">
            {{ __('cardinvit.SUBMIT YOUR RSVP') }}
        </a>
        <a class="btn btn-success extra-card"
            href="https://clickadmin.searchmarketingservices.co/QR/?code=https://clickinvitation.searchmarketingservices.online/guest-checked/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
            target="_blank"
            style="
           
     z-index: 7;
     position: absolute;
     bottom: 20px;
     left: 86%;
     transform: translateX(-50%);
     width: 20%;
     /* margin: 0 5px; */
 
        ">
            {{ __('cardinvit.Check in QR Code') }}
        </a>
    @endif
    <!-- Toggle sidebar of RSVP -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">{{ __('cardinvit.SUBMIT YOUR RSVP') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body ">

            @if ($card[0]->rsvp[0] == '1')
                <a href="{{ env('APP_URL') }}attending/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btn btn-outline-success modify ">{{ __('cardinvit.Attending') }}</a><br>
            @endif

            @if ($card[0]->rsvp[2] == '1')
                <a href="{{ env('APP_URL') }}gift-suggestion/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btn btn-outline-primary modify ">{{ __('cardinvit.Gift Suggestions') }}</a><br>
            @endif

            @if ($card[0]->rsvp[4] == '1')
                <a href="{{ env('APP_URL') }}check-in/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btn btn-outline-primary modify ">{{ __('cardinvit.At the reception Check-In') }}</a><br>
            @endif

            @if ($card[0]->rsvp[6] == '1')
                <a href="{{ env('APP_URL') }}add-photos/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btn btn-outline-primary modify ">{{ __('cardinvit.Upload your Photos') }}</a><br>
            @endif

            @if ($card[0]->rsvp[8] == '1')
                <a href="{{ env('APP_URL') }}sorry-cant/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btn btn-outline-secondary modify ">{{ __('cardinvit.Sorry! I Can\'t') }}</a>
            @endif

            @if ($card[0]->rsvp[10] == '1')
                <a href="{{ env('APP_URL') }}website/{{ $card[0]->id_event }}"
                    class="btn btn-outline-success modify ">{{ __('cardinvit.Go to the website') }}</a>
            @endif
            <br /><br /><br />
            <a href="https://www.youtube.com/watch?v=spxr19KtIuQ" target="blank"
                class="btn btn-outline-secondary modify ">{{ __('cardinvit.Learn How RSVP work') }}</a>
        </div>
    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"
    integrity="sha512-CeIsOAsgJnmevfCi2C7Zsyy6bQKi43utIjdA87Q0ZY84oDqnI0uwfM9+bKiIkI75lUeI00WG/+uJzOmuHlesMA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {

        // console.log("cake");
        $('#cake').animate({
            width: "250px"
        }, 1000);
        $('#cake').animate({
            width: "900px"
        }, 2850, function() {
            $('#cake').attr("src", "/cake113.png");
            $('#card').css({
                display: "block"
            });
        });
        $('#cake').animate({
            top: "100%",
            left: "50%"
        }, 2000, function() {
            $('#card').css({
                'z-index': "2",
            }, $('#card').toggleClass('cardScale'));
        });
    });



    let canv;
    window.addEventListener("load", () => {
        $(document).ready(function() {
            $("body").css("background-color", "#e9e9e9");
            canv = new fabric.Canvas('canvas', {
                backgroundColor: 'white',
                width: 450,
                height: 680,
                selection: false,
            });
            canv.forEachObject(function(obj) {
                obj.lockMovementX = true;
                obj.lockMovementY = true;
                obj.lockScalingX = true;
                obj.lockScalingY = true;
                obj.lockRotation = true;
                obj.lockUniScaling = true;
                obj.hasControls = false;
                obj.hasBorders = false;
            });

            console.log("fabric canvas loaded");
            handleJSONImport();


        })

    })


    function handleJSONImport() {
        var file = $('#id_event').val();

        fetch(`/Json/${file}`)
            .then((res) => res.json())
            .then(function(data) {
                const jsonData = data;
                console.log(jsonData);

                // Assuming 'canv' is your canvas element
                if (canv) {
                    canv.clear();
                    canv.loadFromJSON(jsonData, function() {
                        canv.renderAll();
                    });
                }


            });
    }

    var file = $('#id_event').val();

    fetch(`/Json/${file}`)
        .then((res) => res.json())
        .then(function(data) {
            const jsonData = data;
            console.log(jsonData);

            // Assuming 'canv' is your canvas element
            if (canv) {
                canv.clear();
                canv.loadFromJSON(jsonData, function() {
                    // generateCanvasImageFromJSON(jsonData);
                    canv.renderAll();
                });
            }


        });
</script>
