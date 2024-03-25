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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/fontstyle.css">
    <link rel="stylesheet" href="https://searchmarketingservices.online/fonts/index.css">
    <style>
        .btns {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            column-gap: 10px;
            max-width: 300px;
            height: 40px;
            padding: .25rem .5rem;
            font-size: 0.875rem;
            border-radius: .2rem;
            color: #fff;
            text-decoration: none;
            padding-left: 30px;
        }

        .btns:hover {
            color: #fff;
        }
    </style>
</head>
<div class="thisBody" style="display:none">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- data1: title1, title2, title3, title4, name1, name2, cermony, other1 other2, other3 -->
    <!-- data2: background, card, titleFont, titleColor, nameFont, nameColor, cermonyFont, cermonyColor, otherFont otherColor -->
    <div class="container-fluid" id="main-bg">
        <!-- background-->

        <!-- envlope-->
        <div class="wrapper theAnimation">
            <div class="lid one"></div>
            <div class="lid two"></div>
            {{-- <img class="envelope2" src="{{ asset('assets\images\envlope.png') }}" /> --}}
            <div class="envelope">

                <input type="hidden" id="id_event" value="{{ $eventData[0]->json }}">
            </div>
            @if (isset($guestName))
                <p
                    style="font-family: '{{ $card[0]->envTitleFont }}', cursive; color: {{ $card[0]->envTitleColor }};width: 300px;text-align: center;transform: translateX(-50%);margin-top: 50px;font-size: 1.2em;position: absolute;z-index: 6;left: 50%;bottom: 0;">
                    <sup style="font-size: 0.5em">TO</sup> {{ $guestName }}
                </p>
            @endif

            <div class="envelope_bottom"></div>
            <div class="letter">
                <canvas id="canvas" style=" scale: 0.4 !important;">Your browser doesn't support canvas</canvas>

            </div>
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
                    class="modify btns" style="background: #3A833A; border-color: #3A833A;">
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
                <a href="{{ env('APP_URL') }}website/{{ $card[0]->id_event }}" class="btns modify" style="background: #20809d; border-color: #20809d;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                    </svg>
                    {{ __('cardinvit.Go to the website') }}</a>
            @endif
            <br /><br /><br />
            <a href="https://www.youtube.com/watch?v=spxr19KtIuQ" target="blank"
                class="btn btn-secondary modify ">{{ __('cardinvit.Learn How RSVP work') }}</a>
        </div>
    </div>
</div>
</div>
<button class="btnPreview" id="myBtn" onclick="animationPage(), myBtn1()" hidden>Preview Animation</button>
<script src="/assets/js/animationScript.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<style>
    @font-face {
        font-family: MONTEZ-REGULAR;
        src: url(font/MONTEZ-REGULAR.TTF);
    }

    @font-face {
        font-family: NIGHT-DEMO;
        src: url(font/NIGHT-DEMO.TTF);
    }

    @font-face {
        font-family: DANCINGSCRIPT-BOLD;
        src: url(font/DANCINGSCRIPT-BOLD.TTF);
    }

    @font-face {
        font-family: DANCINGSCRIPT-REGULAR;
        src: url(font/DANCINGSCRIPT-REGULAR.TTF);
    }

    @font-face {
        font-family: FREESCPT;
        src: url(font/FREESCPT.TTF);
    }

    @font-face {
        font-family: NIGHT-DEMO;
        src: url(font/NIGHT-DEMO.TTF);
    }

    @font-face {
        font-family: AGENCYB;
        src: url(font/AGENCYB.TTF);
    }

    body {
        margin: 0;
    }

    #main-bg {
        background: url("http://clickadmin.searchmarketingservices.co/eventcards/{{ $card[0]->bgName }}");
    }

    .container-fluid {

        background-position: center;
        background-size: cover;
        height: 100vh;
    }

    .wrapper {
        top: 185px;
        margin: 0px auto;
        height: 200px;
        width: 300px;
        background-color: {{ $card[0]->cardColorIn }};
        position: relative;
        display: flex;
        justify-content: center;
        z-index: 0;

    }

    .lid {
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        border-right: 150px solid transparent;
        border-bottom: 100px solid transparent;
        border-left: 150px solid transparent;
        transform-origin: top;
        -webkit-transform-origin: top;
        -ms-transform-origin: top;
        -moz-transform-origin: top;

        transition: transform 0.25s linear;
    }

    /*efe7d1*/
    /* Lid when closed */
    .lid.one {
        border-top: 100px solid {{ $card[0]->cardColorOut }};
        transform: rotateX(0deg);
        -webkit-transform: rotateX(0deg);
        -moz-transform: rotateX(0deg);
        z-index: 3;
        transition-delay: 0.75s;
        -webkit-transition-delay: 0.75s;
        -moz-transition-delay: 0.75s;
        -o-transition-delay: 0.75s;

        animation: openLid1 10s;
        animation-fill-mode: forwards;
        width: 0px;
        animation-delay: 2.5s !important;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    /* Lid when opened */
    .lid.two {
        border-top: 100px solid #efd7d1;
        transform: rotateX(90deg);
        -webkit-transform: rotateX(90deg);
        -moz-transform: rotateX(90deg);
        z-index: 1;
        transition-delay: 0.5s;
        -webkit-transition-delay: 0.5s;
        -moz-transition-delay: 0.5s;
        -o-transition-delay: 0.5s;
        animation: openLid2 10s;
        animation-fill-mode: forwards;
        width: 0px;

        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    .envelope {
        position: absolute;
        height: 0%;
        width: 00%;
        top: 0;
        left: 0;
        border-top: 100px solid transparent;
        border-right: 150px solid {{ $card[0]->cardColorOut }};
        border-bottom: 100px solid {{ $card[0]->cardColorOut }};
        border-left: 150px solid {{ $card[0]->cardColorOut }};
        z-index: 5;
        /* display: none; */

    }

    .envelope2 {
        border: 1px solid #efd7d1;
        z-index: 5;
        width: -webkit-fill-available;
    }

    .envelope_bottom {
        height: 0%;
        width: 0%;
        top: 50%;

        position: absolute;
        z-index: 3;
        border-radius: 20px 0 0 0;
        border-top: 100px solid #efd7d1;
        border-bottom: 100px solid transparent;
        border-right: 100px solid transparent;
        border-left: 100px solid #f0b5aa;
        rotate: 45deg;

        box-shadow: -27px -27px 26px -45px rgba(0, 0, 0, 0.5);
        -webkit-box-shadow: -27px -27px 26px -45px rgba(0, 0, 0, 0.5);
        -moz-box-shadow: -27px -27px 26px -45px rgba(0, 0, 0, 0.5);

        /* -------- */
        display: none;
    }

    #canvas {
        position: absolute;
        top: -205px !important;
        left: -135px !important;
    }

    .letter {
        position: absolute;
        top: -38px;
        width: 60%;
        height: 140%;
        background-color: #a7a7a700;
        border-radius: 1px;
        z-index: 2;
        transition: 0.5s;
        animation: openLetter 10s;
        animation-fill-mode: forwards;
        transform: rotateX(90deg);
        -webkit-transform: rotateX(90deg);
        -moz-transform: rotateX(90deg);
        background-position: center !important;
        background-size: cover !important;

        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transform: translate3d(0, 0, 0);
    }

    .letter p {
        text-align: center;
    }

    #atitle1 {
        padding-top: 70px;
    }

    .allTitle {
        font-family: {{ $card[0]->titleFont }};
        font-size: 0.5em;
        margin: 0;
    }

    .main-names {
        margin: 10px auto;
        font-family: {{ $card[0]->fontFamily }};
        font-size: 1.2em !important;
        color: {{ $card[0]->fontColor }};
    }

    .cermony {
        font-family: {{ $card[0]->cermonyFont }};
        font-size: 0.5em;
        margin-bottom: 1em;
    }

    .other1,
    .other2,
    .other3 {
        font-family: {{ $card[0]->otherFont }};
        font-size: 0.4em !important;
        margin: 0 !important;
        color: #c1baa5;
    }

    .other1 {
        padding-top: 0px !important;
    }

    .theAnimation {
        animation: slide-in-right 13s;
        animation-fill-mode: forwards;
    }

    @keyframes slide-in-right {
        10% {
            transform: translateX(0) scale(0.5);
            -webkit-transform: translateX(0) scale(0.5);
            -moz-transform: translateX(0) scale(0.5);
        }

        20% {
            transform: translateX(-1500px) scale(0.5);
            -webkit-transform: translateX(-1500px) scale(0.5);
            -moz-transform: translateX(-1500px) scale(0.5);
        }

        30% {
            transform: translateX(1500px) scale(0.7);
            -webkit-transform: translateX(1500px) scale(0.7);
            -moz-transform: translateX(1500px) scale(0.7);
        }

        40% {
            transform: translateX(0) scale(1);
            -webkit-transform: translateX(0) scale(1);
            -moz-transform: translateX(0) scale(1);
            top: 185px;
        }

        100% {
            transform: translateX(0) scale(2.5);
            -webkit-transform: translateX(0) scale(2.5);
            -moz-transform: translateX(0) scale(2.5);
            top: 40%;
        }

    }

    @keyframes openLid1 {
        30% {
            transform: rotateX(0deg);
            -webkit-transform: rotateX(0deg);
            -moz-transform: rotateX(0deg);
            transition-delay: 0s;
        }

        /* 70% {
            transform: rotateX(90deg);
            -webkit-transform: rotateX(90deg);
            -moz-transform: rotateX(90deg);
            transition-delay: 0s;
        } */

        47% {
            transform: rotateX(90deg);
            -webkit-transform: rotateX(90deg);
            -moz-transform: rotateX(90deg);
            transition-delay: 0s;
        }

        100% {
            transform: rotateX(90deg);
            -webkit-transform: rotateX(90deg);
            -moz-transform: rotateX(90deg);
            transition-delay: 0s;
        }
    }

    @keyframes openLid2 {
        20% {
            /* transform: rotateX(0deg);
            -webkit-transform: rotateX(0deg);
            -moz-transform: rotateX(0deg);
            transition-delay: 0.25s;
            z-index: -1; */
            display: none;
        }

        80%,
        100% {
            transform: rotateX(180deg);
            -webkit-transform: rotateX(180deg);
            -moz-transform: rotateX(180deg);

            z-index: -1;
            display: none;
        }
    }

    @keyframes openLetter {
        0% {
            transform: translateY(0px) rotate(90deg);
            -webkit-transform: translateY(0px) rotate(90deg);
            -moz-transform: translateY(0px) rotate(90deg);
            transition-delay: 0.5s;
            z-index: 2;
        }

        70% {
            transform: translateY(0px) rotate(90deg);
            -webkit-transform: translateY(0px) rotate(90deg);
            -moz-transform: translateY(0px) rotate(90deg);
            transition-delay: 0.5s;
            z-index: 2;
        }

        80% {
            transform: translateY(-200px) rotate(90deg);
            -webkit-transform: translateY(-200px) rotate(90deg);
            -moz-transform: translateY(-200px) rotate(90deg);
            transition-delay: 0.5s;
            z-index: 2;
        }

        85% {
            z-index: 10;
        }

        90% {
            transform: translateY(-28px) rotate(0deg);
            -webkit-transform: translateY(-28px) rotate(0deg);
            -moz-transform: translateY(-28px) rotate(0deg);
            transition-delay: 0.5s;
            z-index: 10;
        }

        100% {
            transform: translateY(-28px) rotate(0deg);
            ;
            -webkit-transform: translateY(-28px) rotate(0deg);
            ;
            -moz-transform: translateY(-28px) rotate(0deg);
            ;
            z-index: 10;
        }

    }

    /*
  .wrapper:hover .lid.one {
      transform: rotateX(90deg);
      transition-delay: 0s;
  }
  
  .wrapper:hover .lid.two {
      transform: rotateX(180deg);
      transition-delay: 0.25s;
  }
  
  .wrapper:hover .letter {
    transform: translateY(-50px);
    transition-delay: 0.5s;
  }
*/



    .border {
        border: 1px solid red;
        ;
    }

    .modify {
        width: 100%;
        margin: 5px 0;
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

    @media only screen and (max-width: 900px) {
        @keyframes slide-in-right {
            10% {
                transform: translateX(0) scale(0.5);
                -webkit-transform: translateX(0) scale(0.5);
                -moz-transform: translateX(0) scale(0.5);
            }

            20% {
                transform: translateX(-950px) scale(0.5);
                -webkit-transform: translateX(-950px) scale(0.5);
                -moz-transform: translateX(-950px) scale(0.5);
            }

            30% {
                transform: translateX(950px) scale(0.7);
                -webkit-transform: translateX(950px) scale(0.7);
                -moz-transform: translateX(950px) scale(0.7);
            }

            40% {
                transform: translateX(0) scale(1);
                -webkit-transform: translateX(0) scale(1);
                -moz-transform: translateX(0) scale(1);
                top: 185px;
            }

            100% {
                transform: translateX(0) scale(2.5);
                -webkit-transform: translateX(0) scale(2.5);
                -moz-transform: translateX(0) scale(2.5);
                top: 40%;
            }

        }

    }

    @media only screen and (max-width: 750px) {
        @keyframes slide-in-right {
            10% {
                transform: translateX(0) scale(0.5);
                -webkit-transform: translateX(0) scale(0.5);
                -moz-transform: translateX(0) scale(0.5);
            }

            20% {
                transform: translateX(-800px) scale(0.5);
                -webkit-transform: translateX(-800px) scale(0.5);
                -moz-transform: translateX(-800px) scale(0.5);
            }

            30% {
                transform: translateX(800px) scale(0.7);
                -webkit-transform: translateX(800px) scale(0.7);
                -moz-transform: translateX(800px) scale(0.7);
            }

            40% {
                transform: translateX(0) scale(1);
                -webkit-transform: translateX(0) scale(1);
                -moz-transform: translateX(0) scale(1);
                top: 185px;
            }

            100% {
                transform: translateX(0) scale(2);
                -webkit-transform: translateX(0) scale(2);
                -moz-transform: translateX(0) scale(2);
                top: 40%;
            }

        }

    }

    @media only screen and (max-width: 600px) {

        @keyframes slide-in-right {
            10% {
                transform: translateX(0) scale(0.5);
                -webkit-transform: translateX(0) scale(0.5);
                -moz-transform: translateX(0) scale(0.5);
            }

            20% {
                transform: translateX(-650px) scale(0.5);
                -webkit-transform: translateX(-650px) scale(0.5);
                -moz-transform: translateX(-650px) scale(0.5);
            }

            30% {
                transform: translateX(650px) scale(0.7);
                -webkit-transform: translateX(650px) scale(0.7);
                -moz-transform: translateX(650px) scale(0.7);
            }

            40% {
                transform: translateX(0) scale(1);
                -webkit-transform: translateX(0) scale(1);
                -moz-transform: translateX(0) scale(1);
                top: 185px;
            }

            100% {
                transform: translateX(0) scale(1.5);
                -webkit-transform: translateX(0) scale(1.5);
                -moz-transform: translateX(0) scale(1.5);
                top: 40%;
            }

        }

        @keyframes openLetter {
            00% {
                transform: translateY(0px) rotate(90deg);
                -webkit-transform: translateY(0px) rotate(90deg);
                -moz-transform: translateY(0px) rotate(90deg);
                transition-delay: 0.5s;
                z-index: 2;
            }

            70% {
                transform: translateY(0px) rotate(90deg);
                -webkit-transform: translateY(0px) rotate(90deg);
                -moz-transform: translateY(0px) rotate(90deg);
                transition-delay: 0.5s;
                z-index: 2;
            }

            80% {
                transform: translateY(-200px) rotate(90deg) scale(1);
                -webkit-transform: translateY(-200px) rotate(90deg) scale(1);
                -moz-transform: translateY(-200px) rotate(90deg) scale(1);
                transition-delay: 0.5s;
                z-index: 2;
            }

            85% {
                z-index: 10;
            }

            90% {
                transform: translateY(-70px) rotate(0deg);
                -webkit-transform: translateY(-70px) rotate(0deg);
                -moz-transform: translateY(-70px) rotate(0deg);
                transition-delay: 0.5s;
                z-index: 10;
            }

            100% {
                transform: translateY(-70px) rotate(0deg) scale(1.5);
                -webkit-transform: translateY(-70px) rotate(0deg) scale(1.5);
                -moz-transform: translateY(-70px) rotate(0deg) scale(1.5);
                z-index: 10;
            }

        }
    }


    @media only screen and (max-width: 450px) {
        @keyframes slide-in-right {
            10% {
                transform: translateX(0) scale(0.5);
                -webkit-transform: translateX(0) scale(0.5);
                -moz-transform: translateX(0) scale(0.5);
            }

            20% {
                transform: translateX(-500px) scale(0.5);
                -webkit-transform: translateX(-500px) scale(0.5);
                -moz-transform: translateX(-500px) scale(0.5);
            }

            30% {
                transform: translateX(500px) scale(0.7);
                -webkit-transform: translateX(500px) scale(0.7);
                -moz-transform: translateX(500px) scale(0.7);
            }

            40% {
                transform: translateX(0) scale(1);
                -webkit-transform: translateX(0) scale(1);
                -moz-transform: translateX(0) scale(1);
                top: 185px;
            }

            100% {
                transform: translateX(0) scale(0.8);
                -webkit-transform: translateX(0) scale(0.8);
                -moz-transform: translateX(0) scale(0.8);
                top: 40%;
            }
        }

        @keyframes openLetter {
            0% {
                transform: translateY(0px) rotate(90deg);
                -webkit-transform: translateY(0px) rotate(90deg);
                -moz-transform: translateY(0px) rotate(90deg);
                transition-delay: 0.5s;
                z-index: 2;
            }

            70% {
                transform: translateY(0px) rotate(90deg);
                -webkit-transform: translateY(0px) rotate(90deg);
                -moz-transform: translateY(0px) rotate(90deg);
                transition-delay: 0.5s;
                z-index: 2;
            }

            80% {
                transform: translateY(-200px) rotate(90deg) scale(1);
                -webkit-transform: translateY(-200px) rotate(90deg) scale(1);
                -moz-transform: translateY(-200px) rotate(90deg) scale(1);
                transition-delay: 0.5s;
                z-index: 2;
            }

            85% {
                z-index: 10;
            }

            90% {
                transform: translateY(-70px) rotate(0deg);
                -webkit-transform: translateY(-70px) rotate(0deg);
                -moz-transform: translateY(-70px) rotate(0deg);
                transition-delay: 0.5s;
                z-index: 10;
            }

            100% {
                transform: translateY(-70px) rotate(0deg) scale(2);
                -webkit-transform: translateY(-70px) rotate(0deg) scale(2);
                -moz-transform: translateY(-70px) rotate(0deg) scale(2);
                z-index: 10;
            }

        }

        .show {
            width: 300px !important;
        }


    }

    .thisBody {
        display: block !important;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"
    integrity="sha512-CeIsOAsgJnmevfCi2C7Zsyy6bQKi43utIjdA87Q0ZY84oDqnI0uwfM9+bKiIkI75lUeI00WG/+uJzOmuHlesMA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    let canv;
    window.addEventListener("load", () => {
        $(document).ready(function() {
            $("body").css("background-color", "#e9e9e9");
            canv = new fabric.StaticCanvas('canvas', {
                backgroundColor: 'white',
                width: 450,
                height: 680,
            });

            console.log("fabric canvas loaded");
            handleJSONImport();


        })

    })


    function handleJSONImport() {
        var file = $('#id_event').val();
        //console.log('Handle ' + id);
        //   $.ajax({
        //     type: "GET",
        //     url: `/get-json?id=${id}`,
        //     success: function (response) {
        //       if (response) {
        //         console.log('Data Received:', response.data);
        //         const file = response.data;
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

                // Assuming you want to display the JSON data in a div with id 'letter'
                const letterDiv = document.getElementById("letter");
                if (letterDiv) {
                    letterDiv.textContent = JSON.stringify(jsonData, null, 2); // Display JSON data
                }
            });
    }
    //     },
    //   });
    // }

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

            // Assuming you want to display the JSON data in a div with id 'letter'
            const letterDiv = document.getElementById("letter");
            if (letterDiv) {
                letterDiv.textContent = JSON.stringify(jsonData, null, 2); // Display JSON data
            }
        });
</script>
