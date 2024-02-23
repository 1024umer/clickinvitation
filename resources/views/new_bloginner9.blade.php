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
                Inspiration Unleashed: Your Source for Unforgettable Events
            </h1>

        </div>
        <div class="text-inner">

            <p>
                Experience digital elegance with ClickInvitation.com. Our customizable digital invitations set the stage for
                stylish events. Seamlessly plan and manage your gatherings, including online RSVP and intuitive table
                seating charts. It's the future of event perfection.
            </p>

            <p>
                Say hello to stress-free event planning with ClickInvitation.com. Our digital invitations, online RSVP, and
                smart seating arrangements redefine event management. It's the future of events, designed for ease and
                style.
            </p>
        </div>



        <div class="inner-coloumn">
            <img src="/assets/newimages/Component 34 (3).png" alt="">
            <p>
                Let ClickInvitation.com work its table seating magic. Simplify event organization with smart seating charts
                and digital invitations. No more wrestling with details – just easy, breezy event planning.
                <br>
                <br>
                Discover the ClickInvitation.com experience. We redefine event management with digital invitations, event
                planning, smart table seating charts, and real-time online RSVP. Your events, our expertise.
                <br>
                <br>
                ClickInvitation.com is your event organizer extraordinaire. Beyond invitations, we offer seamless event
                planning, intuitive table seating charts, and real-time online RSVP. Explore the limitless possibilities
                with us.
            </p>
        </div>
        <br>

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
