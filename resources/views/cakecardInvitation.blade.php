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
        .btns {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            column-gap: 10px;
            width: 300px;
            height: 40px;
            padding: .25rem .5rem;
            font-size: 0.875rem;
            border-radius: .2rem;
            color: #fff;
            text-decoration: none;
            padding-left: 30px;
            margin-bottom: 10px;
        }

        .btns:hover {
            color: #fff;
        }

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
            Check in QR Code
        </a>
    @endif
    <!-- Toggle sidebar of RSVP -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">{{ __('cardinvit.SUBMIT YOUR RSVP') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column align-items-center mt-5">

            @if ($card[0]->rsvp[0] == '1')
                <a href="{{ env('APP_URL') }}attending/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btns modify" style="background: #3A833A; border-color: #3A833A;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        <path fill-rule="evenodd"
                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                    </svg>
                    {{ __('cardinvit.Attending') }}</a>
            @endif

            @if ($card[0]->rsvp[2] == '1')
                <a href="{{ env('APP_URL') }}gift-suggestion/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btns modify" style="background: #ec971f; border-color: #ec971f;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-gift-fill" viewBox="0 0 16 16">
                        <path
                            d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A3 3 0 0 1 3 2.506zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43zM9 3h2.932l.023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0zm6 4v7.5a1.5 1.5 0 0 1-1.5 1.5H9V7zM2.5 16A1.5 1.5 0 0 1 1 14.5V7h6v9z" />
                    </svg>
                    {{ __('cardinvit.Gift Suggestions') }}</a>
            @endif

            @if ($card[0]->rsvp[4] == '1')
                <a href="{{ env('APP_URL') }}check-in/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btns modify" style="background: #006599; border-color: #006599;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                    {{ __('cardinvit.At the reception Check-In') }}</a>
            @endif

            @if ($card[0]->rsvp[6] == '1')
                <a href="{{ env('APP_URL') }}add-photos/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btns modify" style="background: #5c636a; border-color: #5c636a;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-upload" viewBox="0 0 16 16">
                        <path
                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                        <path
                            d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                    </svg>
                    {{ __('cardinvit.Upload your Photos') }}</a>
            @endif

            @if ($card[0]->rsvp[8] == '1')
                <a href="{{ env('APP_URL') }}sorry-cant/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btns modify" style="background: #D4403A; border-color: #D4403A;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-ban-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M2.71 12.584q.328.378.706.707l9.875-9.875a7 7 0 0 0-.707-.707l-9.875 9.875Z" />
                    </svg>
                    {{ __('cardinvit.Sorry! I Can\'t') }}</a>
            @endif

            @if ($card[0]->rsvp[10] == '1')
                <a href="{{ env('APP_URL') }}website/{{ $card[0]->id_event }}"
                    class="btns modify" style="background: #20809d; border-color: #20809d;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                    </svg>
                    {{ __('cardinvit.Go to the website') }}</a>
            @endif
            <br /><br /><br />
            <a href="https://www.youtube.com/watch?v=spxr19KtIuQ" target="blank"
                class="btn btn-outline-secondary modify ">
                {{ __('cardinvit.Learn How RSVP work') }}</a>
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
