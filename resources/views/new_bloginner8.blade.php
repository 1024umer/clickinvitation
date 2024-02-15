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
                Capturing the Moments That Matter: ClickInvitation.com's Event Photography
            </h1>

        </div>
        <div class="text-inner">

            <p>
                It's not just an event; it's a treasure trove of moments. Explore how ClickInvitation.com's event
                photography elevates your celebration, preserving memories that last a lifetime.
            </p>
        </div>

        <div class="owl-carousel owl-theme">

          <div class="item">
              <div class="testimonial" id="image-carousel">
                  <img src="/assets/newimages/Group 789.png" alt="">
                  <div class="des-container">
                      <p class="date-time">01-07-2023 - 01:00 PM</p>
                  </div>
                  <h1>
                      From Dreams to Reality: Your Guide to Seamless Event Execution
                  </h1>
                  <p>
                      Your event dreams are about to become reality with ClickInvitation.com. Dive into our comprehensive
                      guide to execute flawless events with ease.
                  </p>
                  <button onclick="window.location.href='/blog/6';">Read this article</button>

              </div>


          </div>
          <div class="item">
              <div class="testimonial" id="image-carousel">

                  <img src="/assets/newimages/Group 789.png" alt="">
                  <div class="des-container">
                      <p class="date-time">01-07-2023 - 01:00 PM</p>
                  </div>
                  <h1>
                      Efficiency Meets Elegance: The Power of ClickInvitation.com
                  </h1>
                  <p>
                      Discover the perfect balance of efficiency and elegance with ClickInvitation.com. We've transformed
                      event planning into a seamless, stylish journey you won't want to miss.
                  </p>
                  <button onclick="window.location.href='/blog/7';">Read this article</button>


              </div>


          </div>
          <div class="item">
              <div class="testimonial" id="image-carousel">

                  <img src="/assets/newimages/Group 795.png" alt="">
                  <div class="des-container">
                      <p class="date-time">01-07-2023 - 01:00 PM</p>
                  </div>
                  <h1>
                      Capturing the Moments That Matter: ClickInvitation.com's Event Photography
                  </h1>
                  <p>
                      It's not just an event; it's a treasure trove of moments. Explore how ClickInvitation.com's event
                      photography elevates your celebration, preserving memories that last a lifetime.
                  </p>
                  <button onclick="window.location.href='/blog/8';">Read this article</button>

              </div>


          </div>
          <div class="item">

              <div class="testimonial" id="image-carousel">

                  <img src="/assets/newimages/Group 790.png" alt="">
                  <div class="des-container">
                      <p class="date-time">01-07-2023 - 01:00 PM</p>
                  </div>
                  <h1>
                      Inspiration Unleashed: Your Source for Unforgettable Events
                  </h1>
                  <p>
                      Unleash your creativity and make every event unforgettable with ClickInvitation.com. Our platform is
                      your source of inspiration, offering themed gatherings, décor ideas, and endless celebration
                      possibilities.
                  </p>
                  <button onclick="window.location.href='/blog/9';">Read this article</button>

              </div>

          </div>
          <div class="item">

              <div class="testimonial" id="image-carousel">

                  <img src="/assets/newimages/Group 795.png" alt="">
                  <div class="des-container">
                      <p class="date-time">01-07-2023 - 01:00 PM</p>
                  </div>
                  <h1>
                      Embracing Sustainability with Digital Invitations: A Bright, Paperless Event
                  </h1>
                  <p>
                      In a world transitioning to sustainability, traditional envelopes and paper are giving way to a more
                      eco-conscious approach to event planning
                  </p>
                  <button onclick="window.location.href='/blog/10';">Read this article</button>
              </div>
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
