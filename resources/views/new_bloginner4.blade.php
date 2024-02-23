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
                Capturing Joy and Memories: The ClickInvitation.com Photo Gallery
            </h1>

        </div>
        <div class="text-inner">

            <p>
                In the realm of event planning, there's something magical about those candid moments, those unscripted
                smiles, and the palpable joy in the air. At ClickInvitation.com, we understand that an event isn't just an
                occasion; it's a story waiting to be told. And what's a story without pictures?
            </p>
            <p>
                Our secret ingredient? The ClickInvitation.com Photo Gallery – a place where organizers and guests come
                together to create a visual narrative of unforgettable moments. Imagine a gallery filled with images, each a
                chapter in the tale of your event. It's like writing a love letter to your memories.
            </p>
        </div>
        <div class="inner-coloumn">
            <img src="/assets/newimages/Component 34 (3).png" alt="">
            <p>
                The magic begins when your guests and the organizers upload and share their pictures, adding to the
                collective memory of your event. Whether it's the happy faces, the heartfelt toasts, or the surprise dance
                moves, it all lives here. And that's not all; our Protogalaxy feature allows you to cherish these moments
                forever, turning your event into a storybook of joy.
                <br>
                <br>
                With ClickInvitation.com, we're not just streamlining event planning; we're celebrating the joy and
                preserving the memories. It's about more than a successful event; it's about a legacy of happiness that
                lasts a lifetime. So, let's make those memories – one click at a time.

            </p>
        </div>
        <br>
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
