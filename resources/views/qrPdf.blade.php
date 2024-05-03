<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest List</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');
        
        .guest-card {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .qr-code {
            max-width: 200px;
        }
        
        .name-text {
            font-size: 20px;
            margin-top: 10px;
        }
        
        .kindly {
            font-family: "Great Vibes", cursive;
            font-weight: 400;
            font-style: normal;
            font-size: 60px;
        }
        
        .date {
            font-family: arial !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            @foreach ($guests as $guest)
                <div class="col-md-6">
                    <div class="guest-card">
                        <p class="kindly">Kindly RSVP</p>
                        <p class="name-text">By {{ $guest['eventDate'] }}</p>
                        <p class="name-text" style="font-weight: bold;">Please scan this QR code to RSVP</p>
                        <img class="qr-code" src="{{ asset($guest['qr_code_path']) }}" width="200px" alt="QR Code">
                        <p class="name-text">Mr & Mrs {{ $guest['name'] }}</p>
                    </div>
                </div>
                <div style="page-break-before: always"></div>
            @endforeach
        </div>
    </div>
</body>

</html>
