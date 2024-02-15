@extends('layouts.layoutpanel')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-4 mb-4">GALLERY</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="gallery" class="row">
                    @foreach ($photogallery as $photo)
                        <div class="col-md-4 my-2 p-2">
                            <img src="/event-images/{{ $photo->id_event }}/photogallery/{{ $photo->id_photogallery }}.jpg"
                                class="d-block w-100">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
