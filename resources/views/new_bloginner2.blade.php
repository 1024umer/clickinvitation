@extends('layouts.new_app')
@section('title')
    {{ $blog->page_title }}
@endsection
@section('description')
    {{ print $blog->meta_tag }}
@endsection
@section('tags')
    <link rel="canonical" href="https://clickinvitation.com/blog/{{ $blog->slug }}">
@endsection
@section('content')
    <div class="container">
        {{-- {{ dd($blog) }} --}}
        <div class="blog-inner">
            <img src="https://clickadmin.searchmarketingservices.online/storage/{{ $blog->image }}" alt=""
                style="
            border-radius: 30px;" class="mt-5">
            <div class="des-container">
                <p class="date-time">{{ $blog->created_at }}</p>
            </div>
            <h1>
                {{ $blog->title }}
            </h1>
        </div>

        <div class="text-inner">
            <p> {{ print $blog->long_description }}</p>
        </div>
        {{-- latest  blogs --}}
        {{-- {{ dd($latest_blogs) }} --}}
        <div class="blog-section">
            <div class="owl-carousel owl-theme">
                @foreach ($latest_blogs as $latest_blog)
                    @if ($latest_blog->is_latest == 1)
                        <div class="item">
                            <div class="testimonial" id="image-carousel">
                                <img src="https://clickadmin.searchmarketingservices.online/storage/{{ $latest_blog->image }}"
                                    alt="" style="border-radius: 30px">
                                <div class="des-container">
                                    <p class="date-time">{{ $latest_blog->created_at }}</p>
                                </div>
                                <h2 title="{{ $latest_blog->title }}">
                                    {{ str_limit($latest_blog->title, 50) }}
                                </h2>
                                <p title="{{ $latest_blog->short_description }}">
                                    {{ str_limit($latest_blog->short_description, 100) }}
                                </p>
                                {{-- <button onclick="window.location.href='/blog/{{ $latest_blog->slug }}';">Read this article</button> --}}
                                <a href="/blog/{{ $latest_blog->slug }}">Read this article</a>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>



        <div class="heading-text hs-border">
            <h1>
                ORGANIZE YOUR EVENT OR SPECIAL DAY & <span class="bold-text"> IMMORTALIZE </span>YOUR MEMORIES
            </h1>
            <p>
                Digitize Your Invites, Control your guest List.

            </p>
        </div>

        <div class="form-container new-form form-153">
            <input type="email" placeholder="Enter your email address">
            <button class="btn-new" type="submit" id="register">Get Started</button>
        </div>


    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#register').click(function() {
            window.location.href = "{{ url('/register') }}";
        });
    });

    function redirect() {
        window.location.replace(
            `${window.location.url}/blog/capturing-the-moment-that-matter-click-invitations-event-photographer`);
    }
    window.onload = function() {
        redirect();
    };
</script>
