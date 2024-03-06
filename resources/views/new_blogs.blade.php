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
<style>
    .search-anchor{
        transition: all 0.3s ease-in-out;
    }
    .search-anchor:hover {
        text-decoration: underline;
        background-color: rgb(240, 240, 240);
        border-radius:10px;
        padding: 0px 20px;
    }
</style>

@section('content')
    <div class="container">
        <div class="form-container new-form">
            <input type="email" placeholder="Search Blogs" name="search" id="search">
            <button class="btn-new" type="button" id="clear">Clear</button>
        </div>
        <div class="" style="display: flex;
        justify-content: center;
        align-items: center;
        min-width: 280px;
        padding: 10px;
        margin: 0 auto;
        margin-top: 25px;
        width: 80%;">
            <div class="col-md-12">
                <div class="" id="results"></div>
            </div>
        </div>

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
                        <h2 class="blogheading1" style="font-size: 22px;
                        font-family: 'night';
                        font-weight: 400;
                        margin-top: 10px;" title="{{ $blog->title }}">
                           {{ str_limit($blog->title, 50) }}
                        </h2>
                        <p style="" title="{{ $blog->short_description }}"> 
                            {{ str_limit($blog->short_description, 100) }}  

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
                                <h2 title="{{ $blog->title }}">
                                    {{ str_limit($blog->title, 50) }}
                                </h2>
                                <p title="{{ $blog->short_description }}">  {{ str_limit($blog->short_description, 100) }}</p>
                                <button onclick="window.location.href='/blog/{{ $blog->slug }}';">Read this
                                    article</button>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>


        <div class="testimonial" style="padding: 0px !important; margin: 0px 0px  0px 0px!important; border: 0px; align-items: center !important;">
            <a href="{{ route('blog.all') }}"><button type="button" >All Blogs</button></a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search').on('input', function() {
            var query = $(this).val();
            $.ajax({
                url: "{{ route('blogs.search') }}",
                type: "GET",
                data: {
                    query: query
                },
                success: function(response) {
                    // Clear previous results
                    $('#results').empty();

                    // Append new results
                    $('#results').empty();
                    $.each(response, function(index, blog) {
                        $('#results').append('<a  target="_blank" class="search-anchor" style="margin: 10px; color: black; text-decoration: none;" href="/blog/' + blog.slug + '">' + blog.title + '</a> <br>');
                    });
                }
            });
        });


        $('#clear').click(function() {
            $('#search').val('');
            $('#results').empty();
        });
    });
</script>
