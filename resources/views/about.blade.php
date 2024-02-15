@extends('layouts.app')
@section('title') Click Invitation - {{__('home.Organize Your Event or Special Day')}} @endsection
@section('description')Your event website, your invitation sent by email, whatsapp or text message, table organizer, private photo gallery, registry page, auto count, and check-in tool. @endsection

@section('content')
    <!--============= Banner Section Starts Here =============-->
    <section class="banner-2 oh">
        <div class="banner-bg-2 bg_img" data-background="./assets/images/banner/banner-2.png"></div>
        <div class="elem-3">
            <img src="./assets/images/banner/t1.png" alt="counter">
        </div>
        <div class="elem-1">
            <img src="./assets/images/banner/t5.png" alt="counter">
        </div>
        <div class="elem-4">
            <img src="./assets/images/banner/t4.png" alt="counter">
        </div>
        <div class="elem-2">
            <img src="./assets/images/banner/t6.png" alt="counter">
        </div>
        <div class="elem-5">
            <img src="./assets/images/counter/tera.png" alt="counter">
        </div>
        <div class="elem-6">
            <img src="./assets/images/banner/t7.png" alt="counter">
        </div>
        <div class="elem-7">
            <img src="./assets/images/counter/tri2.png" alt="counter">
        </div>
        <div class="top-left d-none d-lg-block">
            <img src="./assets/images/banner/top-left.png" alt="counter">
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content-2">
                        <h1 class="title">About US</h1>
                        
                        
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner-1-slider-wrapper">
                        <div class="banner-1-slider owl-carousel owl-theme">
                            <div class="banner-thumb">
                                <img src="./assets/images/banner/banner1-1.png" alt="banner">
                            </div>
                            <div class="banner-thumb">
                                <img src="./assets/images/banner/banner1-2.png" alt="banner">
                            </div>
                            <div class="banner-thumb">
                                <img src="./assets/images/banner/banner1-3.png" alt="banner">
                            </div>
                            <div class="banner-thumb">
                                <img src="./assets/images/banner/banner1-1.png" alt="banner">
                            </div>
                            <div class="banner-thumb">
                                <img src="./assets/images/banner/banner1-2.png" alt="banner">
                            </div>
                            <div class="banner-thumb">
                                <img src="./assets/images/banner/banner1-3.png" alt="banner">
                            </div>
                        </div>
                        <div class="ban-click two">
                            <div class="arrow">
                                <img class="d-none d-lg-block" src="./assets/images/banner/arrow.png" alt="banner">
                                <img class="d-lg-none" src="./assets/images/banner/arrow2.png" alt="banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Banner Section Ends Here =============-->

    <!--============= Exclusive Section Starts Here =============-->
        <section class="exclusive-section padding-bottom-2 padding-top oh" id="primo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="section-header left-style">
                            
                            <h2 class="title">Welcome to ClickInvitation.com </h2><h2> Your Ultimate Event Planning Platform</h2><br/>
                            <p>
                                Make event planning a breeze with ClickInvitation.com, the all-in-one platform designed to simplify and enhance your event organization experience. Whether it's a corporate gathering, wedding celebration, or birthday party, our platform offers a wide range of features to ensure your event is a resounding success.
What sets ClickInvitation.com apart from other event planning platforms? We provide you with unparalleled options and flexibility. Send invitations to your guests via email, SMS, or even WhatsApp. Have a unique invitation card design? Simply upload it to our platform and share it with ease.
We understand the importance of personalization, which is why our platform allows you to customize every aspect of your invitation cards. Choose from a variety of fonts, colors, and envelope styles. You can even create your own card elsewhere and seamlessly upload it to our platform.
Managing your guest list has never been easier. Add guests individually, specify the number of accompanying members, or import your list using a convenient CSV format. You can also access guest lists from previous events, saving you time and effort.
When it comes to seating arrangements, ClickInvitation.com has you covered. Upload table plans, create tables, assign guests, and let our system automatically calculate guest counts and food preferences. Generate a printable PDF to ensure the reception hall serves your guests exactly what they've requested.
Simplify gift registries and money transfers with our platform. Add gift links from any website and track selections in real-time. Provide your PayPal account or e-transfer email for hassle-free cash gifts, eliminating the need for handling physical cash on the day of the event.
Share the joy and memories with our photo uploading feature. Guests can upload their photos directly to the event webpage's gallery, creating a collaborative experience and preserving precious moments.
After your event, express your gratitude and share event highlights with an acknowledgment message. Include a link to professional photographer's photos on the event webpage, ensuring everyone can relive the memorable moments.
Stay connected with your guests using our messaging system. Send updates, reminders, or changes with ease. While it's a one-way communication channel, you can rest assured that your message will reach all guests effectively.
At ClickInvitation.com, we offer a user-friendly and intuitive interface. No endless scrolling through pages - just a clear and lightweight platform that guides you through the event planning process. Need additional support? Our tutorial videos page provides step-by-step guidance for every feature.
Experience the convenience and power of ClickInvitation.com today. Start planning your next event with confidence and make it an unforgettable occasion for everyone involved.

                            </p>
                        </div>

                       
                        
                    </div>
                   
                </div>
            </div>
        </section>
    <!--============= Exclusive Section Ends Here =============-->

    <!--============= Feature Section Starts Here =============-->
    <section class="feature-section ovelflow-hidden padding-bottom padding-top" id="secondo">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="section-header mw-100">
                        <h5 class="cate">{{__('home.Features')}}</h5>
                        <h2 class="title">{{__('home.Some of the features that are going to blow you away')}}</h2>
                        <p class="mx-auto mw-540px">
                            {{__('home.Acknowledge the presence of your guests and send messages through our messaging system made for and directly from your event\'s panel. This is an all-in-one guest managing tool that will make your life easier preparing for your big day.')}}
                        </p>
                    </div>

                </div>
            </div>
            <div class="feature-wrapper-20">
                <div class="feature-wrapper-bg-20 bg_img" data-background="./assets/images/extra-2/feature/feature-bg.png">
                    <div class="row align-items-center">
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="feature-thumb-20 rtl">
                                <img src="./assets/images/extra-2/feature/phonedef.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feature-content-20 cl-white">
                                <div class="feature-content-slider-20 owl-theme owl-carousel">
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="./assets/images/extra-2/feature/01.png" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            {{__('home.Elegant and responsive designs that best showcase your love and celebration')}}
                                        </h3>
                                    </div>
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="./assets/images/extra-2/feature/01.png" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            {{__('home.Create your Guestlist and invite your guests to your wedding website')}}
                                        </h3>
                                    </div>
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="./assets/images/extra-2/feature/01.png" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            {{__('home.Invite your guests by text or by email')}}
                                        </h3>
                                    </div>
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="./assets/images/extra-2/feature/01.png" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            {{__('home.Gift registry')}}
                                        </h3>
                                    </div>
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="./assets/images/extra-2/feature/01.png" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            {{__('home.Table plan creation')}}
                                        </h3>
                                    </div>
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="./assets/images/extra-2/feature/01.png" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            {{__('home. plan')}}
                                        </h3>
                                    </div>
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="./assets/images/extra-2/feature/01.png" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            {{__('home.Private photo gallery')}}
                                        </h3>
                                    </div>
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="./assets/images/extra-2/feature/01.png" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            {{__('home.Offer your guests map directions to your special day\'s ceremony, reception, and after-party')}}
                                        </h3>
                                    </div>
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="./assets/images/extra-2/feature/01.png" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            {{__('home.Receive confirmations from attendees, with the number of guests and meal choice')}}
                                        </h3>
                                    </div>
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="./assets/images/extra-2/feature/01.png" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            {{__('home.Use our powerful Hall Seating Organizer to make this complicated task as easy as Cake')}}
                                        </h3>
                                    </div>
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="./assets/images/extra-2/feature/01.png" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            {{__('home.Steer your guests to their respective seats with our check in tool')}}
                                        </h3>
                                    </div>
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="./assets/images/extra-2/feature/01.png" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            {{__('home.Save your guests the hassle of putting money in envelopes and have your funds available earlier')}}
                                        </h3>
                                    </div>
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="./assets/images/extra-2/feature/01.png" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            {{__('home.Publish your beautiful photos taken by your guests or professional photographer')}}
                                        </h3>
                                    </div>
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="./assets/images/extra-2/feature/01.png" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            {{__('home.Our platform will save you a lot of time calling or on road trips to invite guests. It will also save you time knowing who\'s attending or not, the number of guests, meal choices, and allergies')}}
                                        </h3>
                                    </div>
                                 </div>
                                <div class="feat-nav mt-4">
                                    <a href="#0" class="feat-prev"><i class="flaticon-left"></i></a>
                                    <a href="#0" class="feat-next active"><i class="flaticon-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Feature Section Ends Here =============-->


    <!--============= Tool Section Starts Here =============-->
    <section class="tool-section padding-bottom padding-top" id="terzo">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 col-xl-5 rtl d-none d-lg-block">
                    <img src="./assets/images/recharge/tool.png" alt="recharge">
                </div>
                <div class="col-lg-6">
                    <div class="section-header left-style">
                        <h5 class="cate">{{__('home.About')}} clickinvitation.com</h5>
                        <h2 class="title">{{__('home.Our Wedding Webpage Help You Relax on Your Big Day')}}</h2>
                        <p><strong>{{__('home.For only 99$ you will Have:')}}</strong><br>{{__('home.Your event website, your invitation sent by email, whatsapp or text message, table organizer, private photo gallery, registry page, auto count, and check-in tool.')}}</p>
                    </div>

                    <div class="tool-wrapper mb-40">
                        <div class="tool-slider mb-30-none owl-carousel owl-theme">
                            <div class="to-access-item style-two">
                                <div class="to-access-thumb">
                                    <span class="anime"></span>
                                    <div class="thumb">
                                        <img src="./assets/images/recharge/1.png" alt="recharge">
                                    </div>
                                </div>
                                <h5 class="title">{{__('home.Ultra Responsive Layouts')}}</h5>
                            </div>
                            <div class="to-access-item style-two">
                                <div class="to-access-thumb">
                                    <span class="anime"></span>
                                    <div class="thumb">
                                        <img src="./assets/images/recharge/2.png" alt="recharge">
                                    </div>
                                </div>
                                <h5 class="title">{{__('home.Retina Ready Designs')}}</h5>
                            </div>
                            <div class="to-access-item style-two">
                                <div class="to-access-thumb">
                                    <span class="anime"></span>
                                    <div class="thumb">
                                        <img src="./assets/images/recharge/3.png" alt="recharge">
                                    </div>
                                </div>
                                <h5 class="title">{{__('home.Advanced Admin Panel')}}</h5>
                            </div>
                            <div class="to-access-item style-two">
                                <div class="to-access-thumb">
                                    <span class="anime"></span>
                                    <div class="thumb">
                                        <img src="./assets/images/recharge/4.png" alt="recharge">
                                    </div>
                                </div>
                                <h5 class="title">{{__('home.Tons of Time Saved')}}</h5>
                            </div>
                            <div class="to-access-item style-two">
                                <div class="to-access-thumb">
                                    <span class="anime"></span>
                                    <div class="thumb">
                                        <img src="./assets/images/recharge/5.png" alt="recharge">
                                    </div>
                                </div>
                                <h5 class="title">{{__('home.Freedom to Write About You')}}</h5>
                            </div>
                            <div class="to-access-item style-two">
                                <div class="to-access-thumb">
                                    <span class="anime"></span>
                                    <div class="thumb">
                                        <img src="./assets/images/recharge/6.png" alt="recharge">
                                    </div>
                                </div>
                                <h5 class="title">{{__('home.Eternal Photo Gallery')}}</h5>
                            </div>
                            <div class="to-access-item style-two">
                                <div class="to-access-thumb">
                                    <span class="anime"></span>
                                    <div class="thumb">
                                        <img src="./assets/images/recharge/7.png" alt="recharge">
                                    </div>
                                </div>
                                <h5 class="title">{{__('home.RSVP Organisation')}}</h5>
                            </div>
                            <div class="to-access-item style-two">
                                <div class="to-access-thumb">
                                    <span class="anime"></span>
                                    <div class="thumb">
                                        <img src="./assets/images/recharge/8.png" alt="recharge">
                                    </div>
                                </div>
                                <h5 class="title">{{__('home.Wedding Gift Money Transfer')}}</h5>
                            </div>
                        </div>
                    </div>
                    <a href="#primo" class="button-3 long-light">{{__('home.Get started now')}}<i class="flaticon-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!--============= Tool Section Ends Here =============-->

    <!--============= Custom-Plan Section Starts Here =============-->
    <section class="custom-plan bg_img oh" data-background="./assets/images/bg/line-bg.png">
        <div class="container">
            <div class="custom-wrapper">
                <span class="circle"></span>
                <span class="circle two"></span>
                <div class="calculate-bg">
                    <img src="./assets/images/bg/calculate-bg.png" alt="bg">
                </div>
                <div class="custom-area">
                    <div class="section-header cl-white">
                        <h5 class="cate">{{__('home.Start planning')}}</h5>
                        <h2 class="title">{{__('home.Enough? start planning!')}}</h2>
                        <p>
                            {{__('home.Now that you have read all the advantages, let\'s have FUN on YOUR WEDDING DAY')}}
                        </p>
                    </div>
                    <div class="text-center">
                        <a href="#primo" class="custom-button large-button theme-shadow">{{__('home.GET STARTED NOW')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Custom-Plan Section Ends Here =============-->

<br>
<br>
<br>
<br>
@endsection