<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Check-in QR Code</title>
    <link rel="shortcut icon" href="/assets/images/favicon2.png" type="image/x-icon">
</head>

<body
    style="background-color: #000000 !important; height: 100vh!important; width: 100%!important; margin: 0!important; padding: 0!important; overflow: hidden !important; display: flex; align-items: center; justify-content: center  ">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <?php
            require_once 'C:\xampp 7.4.1\htdocs\Clickinvitation\app\Http\Controllers/phpqrcode/qrlib.php';
            // require_once '/var/www/html/clickinvitation/app/Http/Controllers/phpqrcode/qrlib.php';

            $path = 'images/';
            $qrcode = $path . $guest_code . '.png';
            if (!file_exists($qrcode)) {
                QRcode::png($url, $qrcode, 'H', 4, 4);
            }
            ?>
            <div class="col-md-12 col-lg-6 col-xl-6 col-xxl-6 col-sm-">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <span class="bg-white pt-3 ps-3 pe-3 pb-1">
                        {{-- {!! $qrCodes['simple'] !!} --}}
                        <img src="{{ asset($qrcode) }}" alt="">
                        <p class="text-center mt-2 mb-0 text-dark fw-bold fs-6 ff-arial">Click Invitation</p>
                    </span>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
