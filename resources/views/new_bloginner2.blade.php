@extends('layouts.new_app')
@section('title')
    {{ $blog->page_title }}
@endsection
@section('description')
 {{ print( $blog->meta_tag) }} 
@endsection
@section('tags')
    <link rel="canonical" href="https://clickinvitation.com/blog/{{ $blog->slug }}">
@endsection
@section('content')
    <div class="container">
        {{-- {{ dd($blog) }} --}}
        <div class="blog-inner">
            <img src="https://clickadmin.searchmarketingservices.online/storage/{{ $blog->image }}" alt=""  style="
            border-radius: 30px;" class="mt-5">
            <div class="des-container">
                <p class="date-time">{{ $blog->created_at }}</p>
            </div>
            <h1>
                {{ $blog->title }}
            </h1>
        </div>

        <div class="text-inner">
            <p> {{ print($blog->long_description) }}</p>
            {{-- <p>
                Every moment of your event should be a celebration, and that includes the planning process. ClickInvitation.com is your secret ingredient for happiness. To elevate your joy on completing your eighteen years of roller coaster life, we have put together some 18th birthday celebration ideas for you to make your birthday party even more lively than before. 
            </p>
            <h2>
                Should your 18th birthday be special?
            </h2>
            <p>
                If you are asking yourself the question- should your 18th birthday be special? Then, stop thinking about this question and start thinking about the things to do at an 18th birthday party. Obviously, you have completed a milestone in your life, and the day is supposed to be celebrated with zeal and zest.
            </p>
            <h3>Memorable 18th birthday celebration ideas</h3>
            <p>Get loads of love and spread smiles on the faces of your friends and family with unique birthday suggestions. Make your day special and memorable with our meticulously selected 18th birthday celebration ideas.</p>
            <h3>1. Beautiful digital invites to your friends and family</h3>
            <p>Whether you are planning a funky theme or a soft theme, excite your friends and family by inviting them through beautiful digital invitations wherein you can add personalized touch according to your preferences. Click Invitation digital invitations are beautifully crafted to make it look pleasant and give the vibe that clients desire. </p>
            <h3>2. Themed Party </h3>
            <p><a href="https://www.mixandtwist.co.uk/blog/20-unique-party-ideas/">A themed party</a> is a fun idea to make your 18th birthday celebration life-long memorable. Any party may become remarkable with the right theme, especially if you get creative with the music, costumes, and décor. Some themed party ideas include a decade-themed party, an Under the Sea-themed party, a Harry Potter-themed party, and the list continues. It already sounds so exciting, doesn't it? </p>
            <h3>3. Movie Night</h3>
            <p>Movie night is one of the best 18th birthday celebration ideas that never gets old. Invite your friends to have a night stay at your home for an unforgettable movie night. Place a movie set up in your room or roof-top with a cozy setting to create a theater-like experience. 
                <br><br>
                Think of turning it into a themed movie night centered around the birthday person's preferred genre of films to amp up the fun. You might have everyone dress up as their favorite horror movie character, for instance, if they are all big fans of the genre.
            </p>
            <h3>4. Backyard BBQ</h3>
            <p>The list of 18th birthday celebration ideas is incomplete without a backyard BBQ. Mouthwatering barbeque with creamy bacon salad is a must-have at any 18th birthday party. To take your guests' considerations into account regarding chicken or beef barbeque don’t forget to utilize the feature of <a href="https://clickinvitation.com/">Click Invitation</a>  where you can collect guests’ meal selections during the RSVP process.  </p>
            <h3>5. Setting up a Photo Booth</h3>
            <p>Find a perfect spot to place a photo booth to capture all the beautiful memories from your special day. To make it look more enthralling buy some photo booth props and add more fun to your 18th birthday. </p>
            <h3>Conclusion</h3>
            <p>Click Invitation has listed down the best 18th birthday celebration ideas for you. So, enjoy your day to the fullest after all you are eighteen now! Whether it is a glamorous party, a cozy gathering, or an adventurous outing, the key is to create unforgettable memories that reflect your unique style and interests. It’s your moment to shine, so go ahead and make it a birthday to remember.</p> --}}


        </div>
        {{-- latest  blogs --}}

        <div class="blog-section">
            <div class="owl-carousel owl-theme">
                @foreach ($latest_blogs as $latest_blog)
                @if ($latest_blog->is_latest == 1)
                    <div class="item">
                        <div class="testimonial" id="image-carousel">
                            <img src="https://clickadmin.searchmarketingservices.online/storage/{{ $latest_blog->image }}" alt="" style="border-radius: 30px">
                            <div class="des-container">
                                <p class="date-time">{{ $latest_blog->created_at }}</p>
                            </div>
                            <h2>
                                {{ $latest_blog->title }}
                            </h2>
                            <p> {{ $latest_blog->short_description }}</p>
                            <button onclick="window.location.href='/blog/{{ $latest_blog->slug }}';">Read this article</button>
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
