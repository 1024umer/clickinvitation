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
    /* .search-anchor {
        transition: all 0.3s ease-in-out;
    } */

    .search-anchor:hover {
        text-decoration: underline;
        background-color: rgb(189, 185, 185);
        border-radius: 5px;

        /* padding: 10px; */
    }

    .category {
        font-family: 'night' !important;
        font-weight: 400 !important;
    }

    .headingblog {
        font-family: 'night' !important;
        font-weight: 400 !important;
    }

    .headingPop {
        font-size: 22px !important;
        font-family: 'night' !important;
        font-weight: 400 !important;
    }
</style>
@section('content')
    <div class="container">
        <div class="form-container new-form">
            <input type="email" placeholder="Search Blogs" name="search" id="search">
            <button class="btn-new" type="button" id="clear">Clear</button>
        </div>
        <div class="" id="ResultsBox"
            style="display: flex; justify-content: center; align-items: center; min-width: 280px; padding: 10px; margin: 0 auto; display: none; width: 74%; background-color: rgb(244, 244, 244);">
            <div class="col-md-12">
                <div class="mt-3" id="results"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 ">
                <div>
                    <h1 class="category mt-3">
                        Todays trending
                    </h1>
                    @foreach ($trending_blogs as $blog)
                        @if ($blog->is_trending == 1)
                            <div class="testimonial" style="border: 0px !important; margin-top: 0px !important;">
                                <img width="100%"
                                    src="https://clickadmin.searchmarketingservices.online/storage/{{ $blog->image }}"
                                    alt="">

                                <div class="des-container">
                                    <p class="date-time">{{ $blog->created_at }}</p>

                                </div>
                                <h1 class="headingblog">
                                    {{ $blog->title }}
                                </h1>
                                <p>
                                    {{ $blog->short_description }}
                                </p>
                                {{-- <button class="read-more-btn"
                                    onclick="window.location.href='/blog/{{ $blog->slug }}';">Read this article</button> --}}
                                    <a href="/blog/{{ $blog->slug }}" style="margin-top: 10px !important;">Read this article</a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- popular --}}
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div>
                    <h1 class="category mt-3 text-start">
                        Popular blogs
                    </h1>
                    @foreach ($popular_blogs as $blog)
                        @if ($blog->is_popular == 1)
                            <div  class="testimonial" style="border: 0px !important; margin-top: 0px !important;">
                                <img width="100%"
                                    src="https://clickadmin.searchmarketingservices.online/storage/{{ $blog->image }}"
                                    alt="" style="">
                                <div class="des-container">
                                    <p class="date-time">{{ $blog->created_at }}</p>
                                </div>
                                <h2 class="headingPop" title="{{ $blog->title }}">
                                    {{ str_limit($blog->title, 50) }}
                                </h2>
                                <p style="" title="{{ $blog->short_description }}">
                                    {{ str_limit($blog->short_description, 100) }}

                                </p>
                                {{-- <button class="read-more-btn"
                                    onclick="window.location.href='/blog/{{ $blog->slug }}';">Read this article</button> --}}
                                    <a href="/blog/{{ $blog->slug }}">Read this article</a>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>


        </div>
        <div class="headind-latest-blogs mt-5">
            <h1>Latest blogs</h1>
        </div>



        {{-- <div class="blog-section">
            @include('layouts.blogSection')
        </div> --}}

        <div class="blog-section" style="margin-bottom: 0px !important; padding-bottom: 0px !important;">
            <div class="owl-carousel owl-theme">
                @foreach ($latest_blogs as $blog)
                    @if ($blog->is_latest == 1)
                        <div class="item">
                            <div class="testimonial" id="image-carousel">
                                <img src="https://clickadmin.searchmarketingservices.online/storage/{{ $blog->image }}"
                                    alt="" style="border-radius: 30px">
                                <div class="des-container">
                                    <p class="date-time">{{ $blog->created_at }}</p>
                                </div>
                                <h2 title="{{ $blog->title }}">
                                    {{ str_limit($blog->title, 50) }}
                                </h2>
                                <p title="{{ $blog->short_description }}"> {{ str_limit($blog->short_description, 100) }}
                                </p>
                                {{-- <button onclick="window.location.href='/blog/{{ $blog->slug }}';">Read this
                                    article</button> --}}
                                    <a href="/blog/{{ $blog->slug }}">Read this article</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>


        <div class="testimonial"
            style="padding:0px !important; margin: 40px!important; border: 0px; text-align: center !important;">
            <a href="{{ route('blog.all') }}" class="mt-5" style="">All Blogs</a>
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
                        $('#results').empty();
                        if (Array.isArray(response) && response.length === 0) {
                            $('#results').append(
                                '<p style="text-align: center; margin-top: 10px;">No results found</p>'
                            );
                        } else if (typeof response === 'object' && Object.keys(response)
                            .length === 0) {
                            $('#ResultsBox').hide();
                        } else {
                            $("#ResultsBox").show();
                            var html = '';
                            $.each(response, function(index, blog) {
                                html +=
                                    '<a target="_blank" class="search-anchor" style="margin: 10px; color: black; text-decoration: none;" href="/blog/' +
                                    blog.slug + '">' + blog.title + '</a> <br>';
                            });
                            $('#results').append(html);
                        }
                    }
                });
            });

            $('#clear').click(function() {
                $('#search').val('');
                $('#results').empty();
                $("#ResultsBox").hide();
            });
        });
    </script>
