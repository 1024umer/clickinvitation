<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://searchmarketingservices.online/fonts/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        href="{{env('APP_URL')}}CheckInQr/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
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
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="visibility: visible;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">{{ __('cardinvit.SUBMIT YOUR RSVP') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body ">

            @if ($card[0]->rsvp[0] == '1')
                <a href="{{env('APP_URL')}}/attending/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btn btn-outline-success modify ">{{ __('cardinvit.Attending') }}</a><br>
            @endif

            @if ($card[0]->rsvp[2] == '1')
                <a href="{{env('APP_URL')}}/gift-suggestion/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btn btn-outline-primary modify ">{{ __('cardinvit.Gift Suggestions') }}</a><br>
            @endif

            @if ($card[0]->rsvp[4] == '1')
                <a href="{{env('APP_URL')}}/check-in/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btn btn-outline-primary modify ">{{ __('cardinvit.At the reception Check-In') }}</a><br>
            @endif

            @if ($card[0]->rsvp[6] == '1')
                <a href="{{env('APP_URL')}}/add-photos/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btn btn-outline-primary modify ">{{ __('cardinvit.Upload your Photos') }}</a><br>
            @endif

            @if ($card[0]->rsvp[8] == '1')
                <a href="{{env('APP_URL')}}/sorry-cant/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                    class="btn btn-outline-secondary modify ">{{ __('cardinvit.Sorry! I Can\'t') }}</a>
            @endif

            @if ($card[0]->rsvp[10] == '1')
                <a href="{{env('APP_URL')}}/website/{{ $card[0]->id_event }}"
                    class="btn btn-outline-success modify ">{{ __('cardinvit.Go to the website') }}</a>
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