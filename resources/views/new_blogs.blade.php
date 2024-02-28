@extends('layouts.new_app')
@section('title')
    Have a Look At The Latest News and Trends With Our Blogs
@endsection
@section('description')
    Read our interesting blogs to stay up to date on the newest event planning trends. Our team of knowledgeable writers
    handles a broad variety of subjects.
@endsection

@section('tags')
    <link rel="canonical" href="https://clickinvitation.com/blog">
@endsection

@section('content')
    {{-- {{ dd($blogs) }} --}}
    <div class="container">
        <div class="blog-section">
            <div class="inner-blog-col1">
                <h1>
                    Todays trending
                </h1>
                @foreach ($trending_blogs as $blog)
                    @if ($blog->is_trending == 1)
                        <img src="https://clickadmin.searchmarketingservices.online/storage/{{ $blog->image }}"
                            alt="" style="height: 480px; width: 848px; border-radius: 30px;">

                        <div class="des-container">
                            <p class="date-time">{{ $blog->created_at }}</p>

                        </div>
                        <h1>
                            {{ $blog->title }}
                        </h1>
                        <p>
                            {{ $blog->short_description }}
                        </p>
                        <button onclick="window.location.href='/blog/{{ $blog->slug }}';">Read this article</button> -
                    @endif
                @endforeach
            </div>

            {{-- popular --}}
            <div class="inner-blog-col2">
                <h1>
                    Popular blogs
                </h1>
                @foreach ($popular_blogs as $blog)
                    @if ($blog->is_popular == 1)
                        <img src="https://clickadmin.searchmarketingservices.online/storage/{{ $blog->image }}"
                            alt=""
                            style="    height: 236px;
                width: 349px;
                border-radius: 20px;">
                        <div class="des-container">
                            <p class="date-time">{{ $blog->created_at }}</p>
                        </div>
                        <h2 class="blogheading1">
                            {{ $blog->title }}
                        </h2>
                        <p>
                            {{ $blog->short_description }}

                        </p>
                        <button onclick="window.location.href='/blog/{{ $blog->slug }}';">Read this article</button>
                    @endif
                @endforeach

            </div>


        </div>
        <div class="headind-latest-blogs">
            <h1>Latest blogs</h1>
        </div>



        {{-- <div class="blog-section">
            @include('layouts.blogSection')
        </div> --}}

        <div class="blog-section">
            <div class="owl-carousel owl-theme">
                @foreach ($latest_blogs as $blog)
                    @if ($blog->is_latest == 1)
                        <div class="item">
                            <div class="testimonial" id="image-carousel">
                                <img src="https://clickadmin.searchmarketingservices.online/storage/{{ $blog->image }}"
                                    alt="" style="height: 280px; width: 390px; border-radius: 30px">
                                <div class="des-container">
                                    <p class="date-time">{{ $blog->created_at }}</p>
                                </div>
                                <h2>
                                    {{ $blog->title }}
                                </h2>
                                <p> {{ $blog->short_description }}</p>
                                <button onclick="window.location.href='/blog/{{ $blog->slug }}';">Read this
                                    article</button>
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
            <button class="btn-new" type="submit">Get Started</button>
        </div>

    </div>
@endsection
