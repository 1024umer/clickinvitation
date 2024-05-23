<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://searchmarketingservices.online/fonts/index.css">

    <style>

        body {
    overflow: hidden;
    }
#card {
    transform: scale(1.1);
    height: 100vh !important;
    /* overflow: hidden !important; */
}
.canvas-container {
    width: 30% !important;
    height: 95% !important;
    position: relative !important;
    user-select: none !important;
    display: block !important;
    margin: auto !important;
}
#card canvas{
    scale: 1 !important;
    width: 100% !important;
    height: 100% !important;
    touch-action: none;
    user-select: none;
    display: block !important;
    margin: auto !important;
}

@media screen and (max-width: 1199px){
    .canvas-container {
    width: 60% !important;
    }

}

@media screen and (max-width: 1199px){
    .canvas-container {
    width: 100% !important;
    height: 100%  !important; 
    }

}


    </style>



</head>

<body>

    <input type="hidden" id="id_event" value="{{ $eventData[0]->json }}">
        <div id="card" class="newBox">
            <canvas id="canvas" style="scale: 1.0 !important; width:100%">Your browser doesn't support canvas</canvas>
        </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

</body>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"
    integrity="sha512-CeIsOAsgJnmevfCi2C7Zsyy6bQKi43utIjdA87Q0ZY84oDqnI0uwfM9+bKiIkI75lUeI00WG/+uJzOmuHlesMA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    let canv;
    window.addEventListener("load", () => {
        $(document).ready(function() {
            $("body").css("background-color", "#e9e9e9");
            canv = new fabric.Canvas('canvas', {
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
                //console.log(jsonData);

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
            if (canv) {
                canv.clear();
                canv.loadFromJSON(jsonData, function() {
                    canv.renderAll();
                });
            }

        });
    // }
</script>
