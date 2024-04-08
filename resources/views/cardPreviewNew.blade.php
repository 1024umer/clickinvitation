<link rel="stylesheet" href="/fontstyle.css">
<div class="thisBody" style="display:none">
    <link rel="stylesheet" href="https://searchmarketingservices.online/fonts/index.css">

    <!-- data1: title1, title2, title3, title4, name1, name2, cermony, other1 other2, other3 -->
    <!-- data2: background, card, titleFont, titleColor, nameFont, nameColor, cermonyFont, cermonyColor, otherFont otherColor -->
    <div class="container-fluid" id="main-bg">
        <!-- background-->

        <!-- envlope-->
        <div class="wrapper theAnimation">
            <div class="lid one"></div>
            <div class="lid two"></div>
            <div class="envelope"></div>
            <div class="envelope_bottom"></div>

            <div class="letter">

                <canvas id="canvas" style=" scale: 0.4 !important;">Your browser doesn't support canvas</canvas>

            </div>
        </div>


    </div>
</div>
<input type="hidden" id="id_event" value="{{ $eventData[0]->json }}">
{{-- {{$eventData->json }} --}}
<script src="/assets/js/animationScript.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<style>
    #main-bg {
        background: url("http://clickadmin.searchmarketingservices.co/eventcards/{{ $cardData[0]->bgName }}");
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
        background-color: {{ $cardData[0]->cardColorIn }};
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
        border-top: 100px solid {{ $cardData[0]->cardColorOut }};
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

    .myCardView {
        position: absolute;
        left: 0;
        top: 0;



    }

    .envelope {
        position: absolute;
        height: 0%;
        width: 0%;
        top: 0;
        left: 0;
        border-top: 100px solid transparent;
        border-right: 150px solid {{ $cardData[0]->cardColorOut }};
        border-bottom: 100px solid {{ $cardData[0]->cardColorOut }};
        border-left: 150px solid {{ $cardData[0]->cardColorOut }};
        z-index: 5;


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
        font-size: 0.5em;
        margin: 0;

    }

    .main-names {
        margin: 10px auto;
        font-size: 1.2em !important;
    }

    .cermony {
        font-size: 0.5em;
        margin-bottom: 1em;
    }

    .other1,
    .other2,
    .other3 {
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

    /* left right */
    /* @keyframes slide-in-right {
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

    } */


    @keyframes slide-in-right {
        10% {
            transform: translateX(0) scale(1.5);
            -webkit-transform: translateX(0) scale(1.5);
            -moz-transform: translateX(0) scale(1.5);
        }

        20% {
            transform: translateX(0) scale(1.5);
            -webkit-transform: translateX(0) scale(1.5);
            -moz-transform: translateX(0) scale(1.5);
            rotate: 20deg;
            top: 185px;
        }

        25% {
            transform: translateX(0) scale(2);
            -webkit-transform: translateX(0) scale(2);
            -moz-transform: translateX(0) scale(2);
            top: 40%;
        }
        100% {
            transform: translateX(0) scale(2);
            -webkit-transform: translateX(0) scale(2);
            -moz-transform: translateX(0) scale(2);
            top: 40%;
        }

    }

    /* Lid */
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

        27% {
            transform: rotateX(90deg);
            -webkit-transform: rotateX(90deg);
            -moz-transform: rotateX(90deg);
            transition-delay: 0s;
        }

        30% {
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
            transform: rotateX(0deg);
            -webkit-transform: rotateX(0deg);
            -moz-transform: rotateX(0deg);
            transition-delay: 0.25s;
            z-index: -1;
            /* display: none; */
        }

        80%,
        100% {
            transform: rotateX(180deg);
            -webkit-transform: rotateX(180deg);
            -moz-transform: rotateX(180deg);

            z-index: -1;
            /* display: none; */
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

        50% {
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
            z-index: 5;
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

    #canvas {
        position: absolute;
        top: -205px !important;
        left: -135px !important;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
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
            handleJSONImport();
        })

    })


    function handleJSONImport() {
        var file = $('#id_event').val();
        fetch(`/Json/${file}`)
            .then((res) => res.json())
            .then(function(data) {
                const jsonData = data;
                if (canv) {
                    canv.clear();
                    canv.loadFromJSON(jsonData, function() {
                        canv.renderAll();
                    });
                }

                const letterDiv = document.getElementById("letter");
                if (letterDiv) {
                    letterDiv.textContent = JSON.stringify(jsonData, null, 2);
                }
            });
    }
</script>
