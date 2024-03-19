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
                From Chaos to Celebration: How ClickInvitation.com Creates Smiles
            </h1>

        </div>
        <div class="text-inner">

            <p>
                Event planning can be a rollercoaster of emotions, but it doesn't have to be. At ClickInvitation.com, we've
                harnessed the power of innovation to turn chaos into celebration. Explore how we've helped users embrace
                stress-free planning, efficient seating arrangements, and an eco-friendly approach. Join the
                ClickInvitation.com family, where events are filled with smiles and happiness.

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
