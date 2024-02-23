@extends('layouts.new_app')
@section('title')
    Click Invitation - {{ __('home.Organize Your Event or Special Day') }}
@endsection
@section('description')
    Your event website, your invitation sent by email, whatsapp or text message, table organizer, private photo gallery,
    registry page, auto count, and check-in tool.
@endsection

@section('content')
    <div class="container">

        <div class="blog-inner">
            <img src="/assets/newimages/Component 33 (7).png" alt="">
            <div class="des-container">
                <p class="date-time">01-07-2023 - 01:00 PM</p>
            </div>
            <h1>
                Embracing Sustainability with Digital Invitations: A Bright, Paperless Event
            </h1>

        </div>
        <div class="text-inner">
            <p>
                In a world transitioning to sustainability, traditional envelopes and paper are giving way to a more
                eco-conscious approach to event planning. Bid adieu to conventional greeting cards and usher in a new era of
                paperless invites. It's like stepping onto a sunlit island of digital sophistication. RSVPs become seamless,
                tables are easily arranged, and your event radiates in an environmentally friendly light. Welcome the
                future, where every invitation not only brightens your event but also contributes to a greener world
            </p>

            <p>
                Envelopes and paper have had their time, but it's time for a brighter, more eco-conscious approach to event
                planning. Say goodbye to the traditional greeting card and hello to paperless invites. It's like stepping
                onto a sunlit island of digital elegance. RSVPs are a breeze, tables are easily arranged, and your event
                shines in the greenest light. Embrace the future, where every invite is a ray of positivity for your event
                and the planet.
            </p>

        </div>

        <div class="blog-section">
            @include('layouts.blogSection')
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
