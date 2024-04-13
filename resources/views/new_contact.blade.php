@extends('layouts.new_app')
@section('title')
    Contact Us - Your Event Partner | Click Invitation
@endsection
@section('description')
    Click Invitation is your trusted event partner, offering top-notch planning, organization, and execution services.
    Contact us today to start your Free trial.
@endsection

@section('tags')
<link rel="canonical" href="https://clickinvitation.com/contact">
@endsection

@section('content')
    <div class="container">
        <div class="heading-text">
            <h1>
                Have questions or suggestions? We're here to listen
            </h1>
            <p>
                We believe in the power of collaboration and look forward to helping you create events that
                leave a lasting impact.


            </p>
        </div>

        <div class="main-img">
            <img src="assets/newimages/Frame 774.webp" alt="get-in-touch">
        </div>

        <div class="heading-text">
            <h2>
                Get in Touch with <span class="bold-text"> ClickInvitation.com </span>
            </h2>
            <p class="textarea">
                Have questions, feedback, or ready to collaborate? We're here to connect. Your inquiries are our priority.
                Reach out to ClickInvitation and let's make your event planning experience even more extraordinary. Drop
                us a line, and together, we'll bring your vision to life.
            </p>
        </div>
        <div class="form-content">
            <form class="contact-form" id="contact_form_submit">
                <input type="text" id="name" name="fullName" placeholder="Enter Your Full Name" required><br>
                <input type="email" id="email" name="email" placeholder="Enter Your Email Address" required><br>

                <input type="text" id="subject" name="subject" placeholder="Enter Your subject" required><br>

                <textarea id="message" name="message" rows="4" cols="50" placeholder="Enter Your Message" required></textarea><br>


                <button type="submit" value="Send" id="sendButton">Send</button>
                <div id="okmessage" class="text-success text-center"></div>
            </form>

        </div>


        <div class="heading-text">
            <h2>
                Have <span class="bold-text"> any </span>questions?
            </h2>
            <p class="textarea">
                Contact Out Experience Team? Get Assistant Today with Our Experts.

            </p>
        </div>

        <div class="contact-info">
            <div class="email-content mailto">
                <img src="assets/newimages/Frame 775.png" alt="">
                <h3>Email us today at</h3>
                <a href="mailto:info@clickinvitation.com">Info@clickinvitation.com</a>
            </div>
            <div class="number-content mailto">
                <img src="assets/newimages/call.png" alt="">
                <h3>Give us a call</h3>
                <a href="tel:+1 (438) 303-9948">+1 (438) 303-9948</a>
            </div>
        </div>


















        <div class="image">
            <img src="assets/newimages/Component 39.webp" alt="contact-us">
        </div>

    </div>
    <div class="container">
    @endsection
