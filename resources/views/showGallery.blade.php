<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- baguetteBox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.0/baguetteBox.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .gallery-image {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            width: 300px; /* Set a fixed width for all image containers */
            height: 200px; /* Set a fixed height for all image containers */
        }

        .gallery-image:hover {
            transform: translateY(-5px);
        }

        .gallery-image img {
            width: 100%;
            height: 100px;
            object-fit: cover; /* Ensure the image covers the entire container */
            transition: transform 0.3s ease;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .gallery-image:hover img {
            transform: scale(1.1);
        }

        .baguetteBox-button {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .baguetteBox-button:hover {
            background-color: rgba(0, 0, 0, 0.9);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Gallery</h1>
        <div class="row">
            @foreach ($photogallery as $photo)
            <div class="col-md-2 mb-4">
                <a href="/event-images/{{ $photo->id_event }}/photogallery/{{ $photo->id_photogallery }}.jpg" class="gallery-image">
                    <img src="/event-images/{{ $photo->id_event }}/photogallery/{{ $photo->id_photogallery }}.jpg" class="img-fluid" alt="Gallery Image">
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <!-- baguetteBox JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.0/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.gallery-image');
    </script>
</body>
</html>
