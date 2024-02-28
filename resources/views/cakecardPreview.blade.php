<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://searchmarketingservices.online/fonts/index.css">

    <style>
        .bgImg {
            background: url('/bday.png');
            height: 100vh;
            background-position: center;
            
            background-size:contain;
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

    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <script>

        $(document).ready(function () {

            // //console.log("cake");
            $('#cake').animate({
                width: "250px"
            }, 1000);
            $('#cake').animate({
                width: "900px"
            }, 2850, function () {
                $('#cake').attr("src", "/cake113.png");
                $('#card').css({
                    display: "block"
                });
            });
            $('#cake').animate({
                top: "100%",
                left: "50%"
            }, 2000, function () {
                $('#card').css({
                    'z-index': "2",
                }, $('#card').toggleClass('cardScale')
                );
            });
        });


    </script>
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

            //console.log("fabric canvas loaded");
            handleJSONImport();


        })

    })


    function handleJSONImport() {
        var file = $('#id_event').val();
        ////console.log('Handle '+id);
        //   $.ajax({
        //     type: "GET",
        //     url: `/get-json?id=${id}`,
        //     success: function (response) {
        //       if (response) {
        //         //console.log('Data Received:', response.data);
        //         const file = response.data;
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

                // Assuming you want to display the JSON data in a div with id 'letter'
                // const letterDiv = document.getElementById("card");
                // if (letterDiv) {
                //     letterDiv.textContent = JSON.stringify(jsonData, null, 2); // Display JSON data
                // }
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
            //console.log(jsonData);

            // Assuming 'canv' is your canvas element
            if (canv) {
                canv.clear();
                canv.loadFromJSON(jsonData, function() {
                    // generateCanvasImageFromJSON(jsonData);
                    canv.renderAll();
                });
            }

            // Assuming you want to display the JSON data in a div with id 'letter'
            // const letterDiv = document.getElementById("card");
            // if (letterDiv) {
            //     letterDiv.textContent = JSON.stringify(jsonData, null, 2); // Display JSON data
            // }
        });
    //       } else {
    //         //console.log('Empty Data');
    //       }
    //     },
    //   });


    // function generateCanvasImageFromJSON(jsonData) {
    //   const canvasData = JSON.parse(jsonData);

    //   canv.width = canvasData.width;
    //   canv.height = canvasData.height;
    //   const img = new Image();
    //   img.src = canvasData.imageDataUrl;
    //   img.onload = function () {
    //     ctx.drawImage(img, 0, 0);
    //     const canvasImageDataUrl = canv.toDataURL('image/png');
    //     const imgElement = document.createElement('img');
    //     imgElement.src = canvasImageDataUrl;
    //     document.body.appendChild(imgElement);
    //   };
    // }
</script>
