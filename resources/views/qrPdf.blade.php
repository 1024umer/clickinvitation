<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest List</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');

        @font-face {
            font-family: 'AbhayaLibreMedium';
            src: url('fonts/AbhayaLibreMedium.ttf') format('truetype');
        }
        @font-face {
            font-family: 'Mozart';
            src: url('fonts/Mozart.otf') format('opentype');
        }
        @font-face {
            font-family: 'MozartScriptEXTBold';
            src: url('fonts/MozartScriptEXTBold.ttf') format('truetype');
        }

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
            font-family: 'AbhayaLibreMedium';
            font-size: 20px;
            margin-top: 10px;
        }

        .kindly {
            /* font-family: "Great Vibes", cursive; */
            font-family: 'MozartScriptEXTBold';
            font-size: 60px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            @foreach ($guests as $guest)
                <div class="col-md-6">
                    <div class="guest-card">
                        <p class="kindly">Kindly Rsvp</p>
                        {{-- <img src="{{ asset('kindly.png') }}" style="max-width: 400px;" alt=""> --}}
                        <p class="name-text" style="letter-spacing: 3px; text-transform: uppercase;">BY {{ $guest['eventDate'] }}</p>
                        <p class="name-text" style="font-weight: 400;">Please scan this QR code to RSVP</p>
                        <img class="qr-code" src="{{ asset($guest['qr_code_path']) }}" width="200px" alt="QR Code">
                        <p class="name-text">{{ $guest['name'] }}</p>
                    </div>
                </div>
                <div style="page-break-before: always"></div>
            @endforeach
        </div>
    </div>
</body>

</html>
