<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>Guest List</title>

    <style type="text/css">
        body,
        html {
            height: 100%;
            font-family: "Calibri", sans-serif;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        img {
            max-width: 100px;
        }
    </style>

</head>

<body class="pdf">

    <body>
        <div class="container">
            <h1>Guest List</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>QR Code</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guests as $guest)
                        <tr>
                            <td>{{ $guest->id_guest }}</td>
                            <td>{{ $guest->name }}</td>
                            <td><img style="width: 100px;" src="{{ $guest->QrCodeImagePath }}" alt="QR Code"></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <hr>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>

    </html>
