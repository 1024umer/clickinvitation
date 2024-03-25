<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://searchmarketingservices.online/fonts/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    </style>
</head>
<body style="background-color: #87ceeb;">
   
    <input type="hidden" id="id_event" value="{{ $eventData[0]->json }}">
   

<marquee behavior="" direction="right">
    <img class="cloud" src="/cloud1.png" alt=""> <img class="cloudb" src="/cloud2.png" alt=""></div> 
</marquee>
    

    <div style="position: relative;" >
    <object id="baby_move" type="image/svg+xml" data="/baby.svg">
    <img   class="bride" src="/baby.svg" />
    </object>
    </div>
    <div >
    <img id="boomm" src=""  alt="">
    </div>
    <div class="baby_card">
        <canvas id="canvas" style="">Your browser doesn't support canvas</canvas>
    </div>
    <div class="baby_mountain" ><img  src="/Mountain.png" alt="">
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
            href="{{env('APP_URL')}}/guest-checked/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
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
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="visibility: visible;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">{{ __('cardinvit.SUBMIT YOUR RSVP') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column align-items-center mt-5">

            @if ($card[0]->rsvp[0] == '1')
                <a href="{{env('APP_URL')}}/attending/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
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
                <a href="{{env('APP_URL')}}/gift-suggestion/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btns modify" style="background: #ec971f; border-color: #ec971f;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-gift-fill" viewBox="0 0 16 16">
                        <path
                            d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A3 3 0 0 1 3 2.506zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43zM9 3h2.932l.023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0zm6 4v7.5a1.5 1.5 0 0 1-1.5 1.5H9V7zM2.5 16A1.5 1.5 0 0 1 1 14.5V7h6v9z" />
                    </svg>
                    {{ __('cardinvit.Gift Suggestions') }}</a>
            @endif

            @if ($card[0]->rsvp[4] == '1')
                <a href="{{env('APP_URL')}}/check-in/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btns modify" style="background: #006599; border-color: #006599;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                    {{ __('cardinvit.At the reception Check-In') }}</a>
            @endif

            @if ($card[0]->rsvp[6] == '1')
                <a href="{{env('APP_URL')}}/add-photos/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
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
                <a href="{{env('APP_URL')}}/sorry-cant/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btns modify" style="background: #D4403A; border-color: #D4403A;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-ban-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M2.71 12.584q.328.378.706.707l9.875-9.875a7 7 0 0 0-.707-.707l-9.875 9.875Z" />
                    </svg>
                    {{ __('cardinvit.Sorry! I Can\'t') }}</a>
            @endif

            @if ($card[0]->rsvp[10] == '1')
                <a href="{{env('APP_URL')}}/website/{{ $card[0]->id_event }}"
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
                class="btn btn-outline-secondary modify ">{{ __('cardinvit.Learn How RSVP work') }}</a>
        </div>
    </div>

<style>
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
  .cloud{
    padding-right: 30%;
    
  }
  .cloudb{
   margin-top: 50px;
  }
.baby_mountain img{
      position: fixed;
     bottom: 0;
     width: -webkit-fill-available;
     z-index: -1;
}
.baby_card{
   
    width: 450px;
    height: 680px;
    background-color: rgb(236, 220, 185);
    position: fixed;
    display: block;
    top:20%;
    left: 56%;
    transform: translate(-56%,-50%) scale(0.001);
    transition: 5s;
    
}
#boomm{
    position: fixed;
    display: block;
    top:25%;
    left: 33%;
  
}
.baby_card_animation{
    transform: translate(-50%,-50%) scale(0.8);
}

#baby_move{
    position: fixed;
    top: 17%;
    left: -10%;
    display: block;
    width: 100%;
}

@media screen and (min-width:280px ) {
    .baby_card{
        top:50%; 
        left: 50%;
    }


    #baby_move{
        width: 600px;
        left: -50%;
    }
}

@media screen and (min-width:460px ) {
    .baby_card{
        top:60%; 
        left: 50%;
    }

    #baby_move{
        width: 700px;
        left: -60%;
    }
}
@media screen and (min-width:500px ) {
    .baby_card{
        top:60%; 
        left: 50%;
    }

    #baby_move{
        width: 610px;
        left: -50%;
    }
}
@media screen and (min-width:600px ) {

    .baby_card{
        top:50%; 
        left: 50%;
    }

    #baby_move{
        width: 700px;
        left: -50%;
        top: 10%;
    }
}
@media screen and (min-width:700px ) {
    .baby_card{
        top:65%; 
        left: 50%;
    }

    #baby_move{
        width: 960px;
        left: -50% ;
    }
}
@media screen and (min-width:850px ) {
    .baby_card{
        top:65%; 
        left: 50%;
    }

    #baby_move{
        width: 1050px;
        left: -50% ;
        top: 0%;
    }
}
@media screen and (min-width:900px ) {
    .baby_card{
        top:65%; 
        left: 50%;
    }

    #baby_move{
        width: 1070px;
        left: -50% ;
        top: 0%;
    }
}
@media screen and (min-width:1000px ) {
    .baby_card{
        top:65%; 
        left: 50%;
    }

    #baby_move{
        width: 1150px;
        left: -50% ;
        top: 0%;
    }
}
@media screen and (min-width:1100px ) {
    .baby_card{
        top:65%; 
        left: 50%;
    }

    #baby_move{
        width: 1250px;
        left: -30% ;
        
    }
}
@media screen and (min-width:600px ) and (max-width:700px ) {
  

#boomm {
    position: fixed;
    display: block;
    top:5%;
    left: 16%;
  
}}
@media screen and (min-width:700px ) and (max-width:800px ) {
    
#boomm{
    position: fixed;
    display: block;
    top:20%;
    left: 23%;
  
}}
@media screen and (min-width:800px ) and (max-width:900px ) {
    
#boomm{
    position: fixed;
    display: block;
    top:20%;
    left: 27%;
  
}}

@media screen and (min-width:900px ) and (max-width:1000px ) {
    
#boomm{
    position: fixed;
    display: block;
    top:20%;
    left: 27%;
  
}}
@media screen and (min-width:1000px ) and (max-width:1100px ) {
 
#boomm{
    position: fixed;
    display: block;
    top:20%;
    left: 28%;
  
}}

@media screen and (min-width:1100px ) and (max-width:1200px ) {
 
#boomm{
    position: fixed;
    display: block;
    top:20%;
    left: 30%;
  
}}
@media  screen and (min-width:1200px) and (max-width:1300px ) {
 
#boomm{
    position: fixed;
    display: block;
    top:20%;
    left: 32%;
  
}}
@media screen and (min-width:1300px) and (max-width:1400px ) {
 
#boomm{
    position: fixed;
    display: block;
    top:20%;
    left: 31%;
  
}}
@media screen and (min-width:500px) and (max-width:600px ) {
#boomm{
    
    position: fixed;
    display: block;
    top:13%;
    left: 10%;

}

}

@media screen and (min-width:460px) and (max-width:500px ) {
    #boomm{
    position: fixed;
    display: block;
    top:15%;
    left: 4%;
  
}

}

@media screen and (min-width:390px) and (max-width:460px ) {
#boomm{
    position: fixed;
    display: block;
    top:5%;
    left: 0%;
}

}
@media screen and (min-width:200px) and (max-width:390px ) {
#boomm{
    position: fixed;
    display: block;
    top:5%;
    left: -15%;
}

}
@media screen and (min-width:340px) and (max-width:390px ) {
    }
@media screen and (min-width:280px) and (max-width:340px ) {
 }
@media screen and (max-width:200px ) {
#boomm{
    position: fixed;
    display: block;
    top:5%;
    left: -10%;
   
  
}
}


</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"
    integrity="sha512-CeIsOAsgJnmevfCi2C7Zsyy6bQKi43utIjdA87Q0ZY84oDqnI0uwfM9+bKiIkI75lUeI00WG/+uJzOmuHlesMA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.js"
         integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" 
         crossorigin="anonymous">
        </script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
         
        <script> 

let canv;
    window.addEventListener("load", () => {
        console.log("fabric canvas loaded11");
        $(document).ready(function() {
            //$("body").css("background-color", "#e9e9e9");
            canv = new fabric.Canvas('canvas', {
                backgroundColor: 'white',
                width: 450,
                height: 680,
                selectable: false,
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

            handleJSONImport();


        })

    });

    function handleJSONImport() {
        var file = $('#id_event').val();
        
        fetch(`/Json/${file}`)
            .then((res) => res.json())
            .then(function(data) {
                const jsonData = data;
                if (canv) {
                    canv.clear();
                    canv.loadFromJSON(jsonData, function() {
                        canv.forEachObject(function(obj) {
                        obj.set({
                            selectable: false
                        });
                    });
                        canv.renderAll();
                    });
                }
            });
    }
            $(document).ready(function(){
                setTimeout(function(){
                  $('#boomm').attr("src", "/fire-effect-6229760-5117280-1--unscreen (2).gif");
                },5000)
                $("#baby_move").animate({left: '100%'},10000,function(){
                    $("#baby_move").css.display='none';
                });
                setTimeout(function(){
                  $('.baby_card').toggleClass('baby_card_animation')
                  $(".baby_card").animate({top: '48%'},1000)
                },5000)
                
            });
        </script> 
</body>
</html>