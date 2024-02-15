@extends('layouts.app')
@section('title') Click Invitation - Contact @endsection
@section('description')Your event website, your invitation sent by email or text message, table organizer, private photo gallery, registry page, auto count, and check-in tool. @endsection

@section('content')


    <!--============= Header Section Ends Here =============-->
    <section class="page-header single-header bg_img oh" data-background="./assets/images/page-header.png">
        <div class="bottom-shape d-none d-md-block">
            <img src="./assets/css/img/page-header.png" alt="css">
        </div>
    </section>
    <!--============= Header Section Ends Here =============-->


    
    <!--============= Contact Section Starts Here =============-->
    <section class="contact-section padding-top padding-bottom">
        <div class="container">
            <div class="section-header mw-100 cl-white">
                <h2 class="title">Get in touch</h2>
                <p>Organize Your Event or Special Day & Immortalize Your Memories</p>
            </div>
            <div class="row justify-content-center justify-content-lg-between">
                <div class="col-lg-7">
                    <div class="contact-wrapper">
                        <h4 class="title text-center mb-30">Get in Touch</h4>
                        <form class="contact-form" id="contact_form_submit">
                            <div class="form-group">
                                <label for="name">Your Full Name</label>
                                <input type="text" placeholder="Enter Your Full Name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email </label>
                                <input type="text" placeholder="Enter Your Email " id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="subject">Your Subject</label>
                                <input type="text" placeholder="Enter Your Subject " id="subject" required>
                            </div>
                            <div class="form-group mb-0">
                                <label for="message">Your Message </label>
                                <textarea id="message" placeholder="Enter Your Message" required></textarea>
                            </div>
                            <div class="form-group">
                                <input class="send" type="submit" value="Send Message">
                                <div id="okmessage" class="text-success text-center"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-content">
                        <div class="man d-lg-block d-none">
                            <img src="./assets/images/contact/man.png" alt="bg">
                        </div>
                        <div class="section-header left-style">
                            <h3 class="title">Have questions?</h3>
                            <p>Have questions about payments or price 
                                plans? We have answers!</p>
                        </div>
                        <div class="contact-area">
                            <div class="contact-item">
                                <div class="contact-thumb">
                                    <img src="./assets/images/contact/contact1.png" alt="contact">
                                </div>
                                <div class="contact-contact">
                                    <h5 class="subtitle">Email Us</h5>
                                    <a href="Mailto:info@mosto.com">info@clickinvitation.com</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-thumb">
                                    <img src="./assets/images/contact/contact2.png" alt="contact">
                                </div>
                                <div class="contact-contact">
                                    <h5 class="subtitle">Call Us</h5>
                                    <a href="Tel:565656855">(514)730-1730</a>
                                </div>
                            </div>
                            <!--<div class="contact-item">
                                <div class="contact-thumb">
                                    <img src="./assets/images/contact/contact3.png" alt="contact">
                                </div>
                                <div class="contact-contact">
                                    <h5 class="subtitle">Visit Us</h5>
                                    <p>470 Rue Dugas, Laval, QC, Canada, H7X 3T6</p>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Contact Section Ends Here =============-->


    <!--============= Map Section Starts Here =============-->
    <div class="map-section padding-bottom-2">
        <div class="container">
            <div class="section-header">
                <div class="thumb">
                    <img src="./assets/images/contact/earth.png" alt="contact">
                </div>
                <h3 class="title">We Are Easy To Find</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 text-center">
                    
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2794.8573179536147!2d-73.80398008423141!3d45.533076736865674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc92361d5d63d41%3A0xc029eddebfd6401!2s470%20Rue%20Dugas%2C%20Laval%2C%20QC%20H7X%203T6%2C%20Canada!5e0!3m2!1sit!2sit!4v1646524748846!5m2!1sit!2sit" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                   
                </div>
            </div>
        </div>
    </div>
    <!--============= Map Section Ends Here =============-->


    <!--============= Do Section Starts Here =============-->
    <div class="do-section padding-bottom padding-top-2">
        <div class="container">
            <div class="row mb-30-none justify-content-center">
                <div class="col">
                    <div class="do-item cl-white">
                        <h3 class="title">About Us</h3>
                        <p>Find out who we are and what we do!</p>
                        <a href="/#terzo"><i class="fas fa-angle-left"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============= Do Section Ends Here =============-->
@endsection