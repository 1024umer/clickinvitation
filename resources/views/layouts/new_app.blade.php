<!DOCTYPE html>
<html lang="en">

<head>

<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-QD4QH7KNBF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-QD4QH7KNBF');
    </script> -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <meta name="description" content="@yield('description')">
  @yield('tags')
  <!--============== Bootstrap link =============-->

  <!-- _____ Slick Slider _____ -->
  <link rel="icon" type="image/x-icon" href="assets/newimages/Fav-Icon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
  <link href="https://fonts.cdnfonts.com/css/night" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" href="/assets/newcss/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</head>

<body>

  <header class="header-area">
    <!-- site-navbar start -->
    <div class="navbar-area">
      <div class="container">
        <nav class="site-navbar">

          <!-- site menu/nav -->
       
          <ul>
            <li><a href="/events">{{ __('new_home.Events') }}</a></li>
            <li><a href="/features">{{ __('new_home.Features') }}</a></li>
            <li><a href="/about">{{ __('new_home.About') }} </a></li>
            <li><a href="/contact">{{ __('new_home.Contact') }}</a></li>
            <li><a href="/blog">{{ __('new_home.Blogs') }}</a></li>
            <li><a href="/tutorial">{{ __('new_home.Tutorial') }}</a></li>
            <li><a href="/login">Login</a></li>
            <li><a href="/register">signup</a></li>
          </ul>
        
          <!-- site logo -->
          <a href="/" class="site-logo"><img src="/assets/newimages/Group 1.svg" alt="click-invitation"></a>
<div style="display:"></div>
          <!-- <li class="dropdown d-sm-inline">
                        <a class="header-button dropdown-toggle" href="#" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="border: 0;">
                            {{ Config::get('languages')[App::getLocale()] }}
                        </a>
                        <div class="dropdown-menu">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                        {{ $language }}</a>
                                @endif
                            @endforeach
                        </div>
                    </li> -->
                 
     <!-- <span class="header-buttons">   -->
                    <!-- <button class="login"> <a href="#" style="text-decoration: none; color:black;"> {{ Config::get('languages')[App::getLocale()] }}</a> </button> -->
                <!-- </span>  -->
                            <span class="header-buttons">
                           
               <!-- <a href="" class="login"> Login</a> -->
               <!-- <button class="language">  @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}" style="text-decoration: none; color:black;">
                                        {{ $language }}</a>
                                @endif
                            @endforeach </button> -->
            
            <button class="login"> <a href="/login" style="text-decoration: none; color:black;"> {{ __('new_home.Login') }}</a> </button>
            <a class="register" href="/register" style="text-decoration: none; color:black;">{{ __('new_home.Register') }}</a>
          </span>

  

          <!-- nav-toggler for mobile version only -->
          <button class="nav-toggler">
            <span>
              
            </span>
          </button>
        </nav>
      </div>
    </div><!-- navbar-area end -->
  </header>
  @yield('content')
  <!-- <div class="container">


    <div class="heading-text">
      <h1>
        Organize Your Event or Special Day
        & <span class="bold-text">Immortalize</span> Your Memories
      </h1>
      <p>
        Digitize Your Invites, Control your guest List.
      </p>

    </div>

    <div class="form-container">
      <input type="email" placeholder="Enter your email address">
      <button type="submit">Get Started</button>
    </div>
  </div>
  <div class="container">
    <div class="couple-img">
      <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Frame 8.png" alt="">
    </div>
  </div>



  <div class="container">

    <div class="text-center">
      <h1>
        Some of most <span class="bold-text">popular</span> events by click invitation
      </h1>
      <p>
        Porem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus.
        Sed dignissim, metus nec fringilla accumsan, isus sem sollicitudin lacus, ut interdum tellus elit
      </p>

    </div>


    <div class="popular-events">

      <div class="col-1">
        <div class="inner-sec">
          <div class="Wedding-Events">
            <div class="gradient-anim">
              <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Vector (1).png" alt="">

            </div>

            <h3>Wedding Events</h3>

            <div>
              <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Group 12.png" alt="">

            </div>
          </div>
        </div>


        <div class="Anniversary-Events">
          <div class="inner-sec">
            <div class="Wedding-Events">
              <div class="gradient-anim">
                <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Group 13.png" alt="">

              </div>

              <h3 class="text-width">Anniversary Events</h3>

              <div>
                <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 5.png" alt="">

              </div>
            </div>
          </div>
        </div>

        <div class="Baby-Shower-Events">
          <div class="inner-sec">
            <div class="Wedding-Events">
              <div class="gradient-anim">
                <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Vector (3).png" alt="">

              </div>

              <h3 class="text-width">Baby Shower Events</h3>

              <div>
                <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 5.png" alt="">

              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="col-2">

        <div class="Corporate-Events">
          <div class="inner-sec">
            <div class="Wedding-Events">
              <div class="gradient-anim">
                <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Group 14.png" alt="">

              </div>

              <h3>Corporate Events</h3>

              <div>
                <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Group 12.png" alt="">

              </div>
            </div>
          </div>
        </div>
        <div class="Baptism-Events">
          <div class="inner-sec">
            <div class="Wedding-Events">
              <div class="gradient-anim">
                <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Vector (2).png" alt="">

              </div>

              <h3 class="text-width">Baptism Events</h3>

              <div>
                <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 5.png" alt="">

              </div>
            </div>
          </div>
        </div>
        <div class="Birthday-Events">
          <div class="inner-sec">
            <div class="Wedding-Events">
              <div class="gradient-anim">
                <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Vector (4).png" alt="">

              </div>

              <h3 class="text-width">Birthday Events</h3>

              <div>
                <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 5.png" alt="">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <button class="view-more-events">
      View Events <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Group 12 (2).png" alt="">
    </button>


    <div class="head-area">
      <h1 class="heading-center">
        Some of the <span class="bold-text">features </span>that are going to blow you away
      </h1>
    </div>


    <div class="container">


      <div class="main-text">

        <div class="sub-text1">

          <div class="first-area">

            <div class="sub-area">

              <div> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Group 16.png" alt=""></div>
              <div>
                <h3>Received Confirmations</h3>
              </div>
            </div>
            <p class="text1">
              Worem ipsum dolor sit amet, consectetur
              adipiscing elit. Nunc vulputate libero et velit
              interdum, ac aliquet odio mattis. Class aptent
              taciti sociosqu ad litora torquent per conubia
              nostra, per inceptos himenaeos.
              <span class="dots"></span>
              <span class="moreText1">
                <br>
                Anticoagulant Specialist from USI, USA, C.H.Q.P. She has completed her Pharm.D, C.R.C.P, & Dip.
              </span>
            </p>
            <button class="read-more-btn1">Read More...</button>
          </div>

          <div class="sec-area">

            <div class="sub-area">

              <div> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/icons.png" alt=""></div>
              <div>
                <h3>Professional Photographers</h3>
              </div>
            </div>

            <p class="text2">
              Worem ipsum dolor sit amet, consectetur
              adipiscing elit. Nunc vulputate libero et velit
              interdum, ac aliquet odio mattis. Class aptent
              taciti sociosqu ad litora torquent per conubia
              nostra, per inceptos himenaeos.
              <span class="dots"></span>
              <span class="moreText2">
                <br>
                Anticoagulant Specialist from USI, USA, C.H.Q.P. She has completed her Pharm.D, C.R.C.P, & Dip.
              </span>
            </p>
            <button class="read-more-btn2">Read More...</button>
          </div>

          <div class="third-area">

            <div class="sub-area">

              <div> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Vector (5).png" alt=""></div>
              <div>
                <h3>Custom Personalization</h3>
              </div>
            </div>
            <p class="text3">
              Worem ipsum dolor sit amet, consectetur
              adipiscing elit. Nunc vulputate libero et velit
              interdum, ac aliquet odio mattis. Class aptent
              taciti sociosqu ad litora torquent per conubia
              nostra, per inceptos himenaeos.
              <span class="dots"></span>
              <span class="moreText3">
                <br>
                Anticoagulant Specialist from USI, USA, C.H.Q.P. She has completed her Pharm.D, C.R.C.P, & Dip.
              </span>
            </p>
            <button class="read-more-btn3">Read More...</button>
          </div>

        </div>

        <div class="sub-text2">

          <div class="first-area">

            <div class="sub-area">

              <div> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Group 17.png" alt=""></div>
              <div>
                <h3>Tasks Organizer</h3>
              </div>
            </div>
            <p class="text4">
              Worem ipsum dolor sit amet, consectetur
              adipiscing elit. Nunc vulputate libero et velit
              interdum, ac aliquet odio mattis. Class aptent
              taciti sociosqu ad litora torquent per conubia
              nostra, per inceptos himenaeos.
              <span class="dots"></span>
              <span class="moreText4">
                <br>
                Anticoagulant Specialist from USI, USA, C.H.Q.P. She has completed her Pharm.D, C.R.C.P, & Dip.
              </span>
            </p>
            <button class="read-more-btn4">Read More...</button>
          </div>

          <div class="sec-area">

            <div class="sub-area">

              <div> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Vector (6).png" alt=""></div>
              <div>
                <h3>Time Management</h3>
              </div>
            </div>
            <p class="text5">
              Worem ipsum dolor sit amet, consectetur
              adipiscing elit. Nunc vulputate libero et velit
              interdum, ac aliquet odio mattis. Class aptent
              taciti sociosqu ad litora torquent per conubia
              nostra, per inceptos himenaeos.
              <span class="dots"></span>
              <span class="moreText5">
                <br>
                Anticoagulant Specialist from USI, USA, C.H.Q.P. She has completed her Pharm.D, C.R.C.P, & Dip.
              </span>
            </p>
            <button class="read-more-btn5">Read More...</button>
          </div>

          <div class="third-area">

            <div class="sub-area">

              <div> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Language_translator.png" alt=""></div>
              <div>
                <h3>Multiple Languages</h3>
              </div>
            </div>
            <p class="text6">
              Worem ipsum dolor sit amet, consectetur
              adipiscing elit. Nunc vulputate libero et velit
              interdum, ac aliquet odio mattis. Class aptent
              taciti sociosqu ad litora torquent per conubia
              nostra, per inceptos himenaeos.
              <span class="dots"></span>
              <span class="moreText6">
                <br>
                Anticoagulant Specialist from USI, USA, C.H.Q.P. She has completed her Pharm.D, C.R.C.P, & Dip.
              </span>
            </p>
            <button class="read-more-btn6">Read More...</button>
          </div>

        </div>
        <div class="sub-text3">

          <div class="first-area">

            <div class="sub-area">

              <div> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Group 18.png" alt=""></div>
              <div>
                <h3>QR Code Scanning's</h3>
              </div>
            </div>
            <p class="text7">
              Worem ipsum dolor sit amet, consectetur
              adipiscing elit. Nunc vulputate libero et velit
              interdum, ac aliquet odio mattis. Class aptent
              taciti sociosqu ad litora torquent per conubia
              nostra, per inceptos himenaeos.
              <span class="dots"></span>
              <span class="moreText7">
                <br>
                Anticoagulant Specialist from USI, USA, C.H.Q.P. She has completed her Pharm.D, C.R.C.P, & Dip.
              </span>
            </p>
            <button class="read-more-btn7">Read More...</button>
          </div>

          <div class="sec-area">

            <div class="sub-area">

              <div> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Group 19.png" alt=""></div>
              <div>
                <h3>Best & Elegant Design</h3>
              </div>
            </div>
            <p class="text8">
              Worem ipsum dolor sit amet, consectetur
              adipiscing elit. Nunc vulputate libero et velit
              interdum, ac aliquet odio mattis. Class aptent
              taciti sociosqu ad litora torquent per conubia
              nostra, per inceptos himenaeos.
              <span class="dots"></span>
              <span class="moreText8">
                <br>
                Anticoagulant Specialist from USI, USA, C.H.Q.P. She has completed her Pharm.D, C.R.C.P, & Dip.
              </span>
            </p>
            <button class="read-more-btn8">Read More...</button>
          </div>

          <div class="third-area">

            <div class="sub-area">

              <div> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Vector (7).png" alt=""></div>
              <div>
                <h3>Track RSVPs</h3>
              </div>
            </div>
            <p class="text9">
              Worem ipsum dolor sit amet, consectetur
              adipiscing elit. Nunc vulputate libero et velit
              interdum, ac aliquet odio mattis. Class aptent
              taciti sociosqu ad litora torquent per conubia
              nostra, per inceptos himenaeos.
              <span class="dots"></span>
              <span class="moreText9">
                <br>
                Anticoagulant Specialist from USI, USA, C.H.Q.P. She has completed her Pharm.D, C.R.C.P, & Dip.
              </span>
            </p>
            <button class="read-more-btn9">Read More...</button>
          </div>

        </div>


      </div>


      



      <div class="head-area">
        <h1 class="heading-center second">
          Some of our top invitations
          designs <span class="bold-text">recommended </span> by our users
        </h1>
        <p>
          Porem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis
          tellus. Sed dignissim, metus nec fringilla accumsan,
          risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet
          feugiat lectus. Class aptent taciti sociosqu ad
          litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac
          scelerisque ante pulvinar. Donec ut rhon
          ex. Suspendisse ac rhoncus nisl, eu tempor urna. Curabitur vel bibendum lorem. Morbi convallis convallis diam
          sit amet lacinia. Aliquam in eleme..
        </p>

      </div>

    </div>

    <div class="container my-2 py-4">


      <div class="slider">
        <div class="mx-3">
          <div class="card border-0 rounded-0">
            <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 27 (1).png" alt="">
          </div>
        </div>
        <div class="mx-3">
          <div class="card border-0 rounded-0">
            <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 27 (2).png" alt="">
          </div>
        </div>
        <div class="mx-3">
          <div class="card border-0 rounded-0">
            <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 28.png" alt="">
          </div>
        </div>
        <div class="mx-3">
          <div class="card border-0 rounded-0">
            <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 33 (2).png" alt="">
          </div>
        </div>
        <div class="mx-3">
          <div class="card border-0 rounded-0">
            <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 27 (1).png" alt="">
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="container">

    <button class="view-more-events second">
      View Events <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Group 12 (2).png" alt="">
    </button>

    <div class="content-box">
      <h1 class="heading-center third">
        TAKE A LOOK AT WHAT
        OUT <span class="bold-text">CUSTOMERS </span> SAYS ABOUT US
      </h1>

    </div>


    <div class="owl-carousel owl-theme">

      <div class="item">
        <div class="testimonial">

          <div class="testimonial-container">
            <div class="testimonial-img"> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 6 (1).png" alt=""></div>
            <div class="testimonial-name">
              <h5>Adams Seir</h5>
            </div>
            <div class="testimonial-date">
              <p>Dec 02 2021</p>
            </div>

          </div>

          <div class="testimonial-text">
            <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum,
              ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
              inceptos himenaeos.</p>
          </div>
        </div>
        <div class="testimonial">

          <div class="testimonial-container">
            <div class="testimonial-img"> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 6 (1).png" alt=""></div>
            <div class="testimonial-name">
              <h5>Adams Seir</h5>
            </div>
            <div class="testimonial-date">
              <p>Dec 02 2021</p>
            </div>

          </div>

          <div class="testimonial-text">
            <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum,
              ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
              inceptos himenaeos.</p>
          </div>
        </div>

      </div>
      <div class="item">
        <div class="testimonial">

          <div class="testimonial-container">
            <div class="testimonial-img"> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 6 (1).png" alt=""></div>
            <div class="testimonial-name">
              <h5>Adams Seir</h5>
            </div>
            <div class="testimonial-date">
              <p>Dec 02 2021</p>
            </div>

          </div>

          <div class="testimonial-text">
            <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum,
              ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
              inceptos himenaeos.</p>
          </div>
        </div>
        <div class="testimonial">

          <div class="testimonial-container">
            <div class="testimonial-img"> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 6 (1).png" alt=""></div>
            <div class="testimonial-name">
              <h5>Adams Seir</h5>
            </div>
            <div class="testimonial-date">
              <p>Dec 02 2021</p>
            </div>

          </div>

          <div class="testimonial-text">
            <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum,
              ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
              inceptos himenaeos.</p>
          </div>
        </div>

      </div>
      <div class="item">
        <div class="testimonial">

          <div class="testimonial-container">
            <div class="testimonial-img"> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 6 (1).png" alt=""></div>
            <div class="testimonial-name">
              <h5>Adams Seir</h5>
            </div>
            <div class="testimonial-date">
              <p>Dec 02 2021</p>
            </div>
          </div>
          <div class="testimonial-text">
            <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum,
              ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
              inceptos himenaeos.</p>
          </div>
        </div>
        <div class="testimonial">
          <div class="testimonial-container">
            <div class="testimonial-img"> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 6 (1).png" alt=""></div>
            <div class="testimonial-name">
              <h5>Adams Seir</h5>
            </div>
            <div class="testimonial-date">
              <p>Dec 02 2021</p>
            </div>

          </div>
          <div class="testimonial-text">
            <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum,
              ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
              inceptos himenaeos.</p>
          </div>
        </div>

      </div>
      <div class="item">
        <div class="testimonial">

          <div class="testimonial-container">
            <div class="testimonial-img"> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 6 (1).png" alt=""></div>
            <div class="testimonial-name">
              <h5>Adams Seir</h5>
            </div>
            <div class="testimonial-date">
              <p>Dec 02 2021</p>
            </div>
          </div>

          <div class="testimonial-text">
            <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum,
              ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
              inceptos himenaeos.</p>
          </div>
        </div>
        <div class="testimonial">

          <div class="testimonial-container">
            <div class="testimonial-img"> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 6 (1).png" alt=""></div>
            <div class="testimonial-name">
              <h5>Adams Seir</h5>
            </div>
            <div class="testimonial-date">
              <p>Dec 02 2021</p>
            </div>
          </div>
          <div class="testimonial-text">
            <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum,
              ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
              inceptos himenaeos.</p>
          </div>
        </div>

      </div>
      <div class="item">
        <div class="testimonial">

          <div class="testimonial-container">
            <div class="testimonial-img"> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 6 (1).png" alt=""></div>
            <div class="testimonial-name">
              <h5>Adams Seir</h5>
            </div>
            <div class="testimonial-date">
              <p>Dec 02 2021</p>
            </div>
          </div>
          <div class="testimonial-text">
            <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum,
              ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
              inceptos himenaeos.</p>
          </div>
        </div>
        <div class="testimonial">

          <div class="testimonial-container">
            <div class="testimonial-img"> <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 6 (1).png" alt=""></div>
            <div class="testimonial-name">
              <h5>Adams Seir</h5>
            </div>
            <div class="testimonial-date">
              <p>Dec 02 2021</p>
            </div>

          </div>

          <div class="testimonial-text">
            <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum,
              ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
              inceptos himenaeos.</p>
          </div>
        </div>
      </div>

    </div>

   
    <div class="testomonials">
      <h1>hello</h1>
    </div> -->


    <!-- <div class="content-section">
      <h1 class="heading-center fourth">
        Rorem ipsum dolor sit amet,
        consectetur dolor sit <span class="bold-text">adipiscing۔ </span>
      </h1>
      <p>
        Porem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis
        tellus. Sed dignissim, metus nec fringilla accumsan,
        risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet
        feugiat lectus. Class aptent taciti sociosqu ad
        litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac
        scelerisque ante pulvinar. Donec ut rhon
        ex. Suspendisse ac rhoncus nisl, eu tempor urna. Curabitur vel bibendum lorem. Morbi convallis convallis diam
        sit amet lacinia. Aliquam in eleme..
      </p>

    </div>

    <div class="phone-img">
      <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Group 29.png" alt="">
    </div>


    <h1 class="heading-center fifth">
      FREQUENTLY <span class="bold-text">ASK </span>QUESTIONS
    </h1>

    <div class="accordion">
      <div class="accordion-item">
        <div class="accordion-item-header">
          Dorem ipsum dolor sit amet, consectetur adipiscing elit.?
        </div>
        <div class="accordion-item-body">
          <div class="accordion-item-body-content">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis recusandae amet quasi nisi, quibusdam
            laboriosam a quidem facere atque reiciendis harum, tempora cupiditate dolorem. Doloremque eum quibusdam
            distinctio nam consequatur!Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis recusandae amet
            quasi nisi, quibusdam laboriosam a quidem facere atque reiciendis harum, tempora cupiditate dolorem.
            Doloremque eum quibusdam distinctio nam consequatur!
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <div class="accordion-item-header">
          Dorem ipsum dolor sit amet, consectetur adipiscing elit.?
        </div>
        <div class="accordion-item-body">
          <div class="accordion-item-body-content">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis recusandae amet quasi nisi, quibusdam
            laboriosam a quidem facere atque reiciendis harum, tempora cupiditate dolorem. Doloremque eum quibusdam
            distinctio nam consequatur!
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <div class="accordion-item-header">
          Dorem ipsum dolor sit amet, consectetur adipiscing elit.?
        </div>
        <div class="accordion-item-body">
          <div class="accordion-item-body-content">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis recusandae amet quasi nisi, quibusdam
            laboriosam a quidem facere atque reiciendis harum, tempora cupiditate dolorem. Doloremque eum quibusdam
            distinctio nam consequatur!
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <div class="accordion-item-header">
          Dorem ipsum dolor sit amet, consectetur adipiscing elit.?
        </div>
        <div class="accordion-item-body">
          <div class="accordion-item-body-content">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis recusandae amet quasi nisi, quibusdam
            laboriosam a quidem facere atque reiciendis harum, tempora cupiditate dolorem. Doloremque eum quibusdam
            distinctio nam consequatur!
          </div>
        </div>
      </div>
    </div>

    <div class="inner-heading">
      <h1 class="heading-center sixth">
        <span class="bold-text">About</span> Clickinvitation.com
      </h1>
    </div>


    <div class="background-picture-box">

      <h1>Dorem ipsum dolor sit</h1>


      <p>
        Korem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus.
        Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus.
        Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per
        conubia nostra,
        <br>
        per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut
        rhoncus ex. Suspendisse ac rhoncus nisl, eu tempor urna. Curabitur vel bibendum lorem. Morbi convallis convallis
        diam sit amet lacinia. Aliquam in elementum tellus.

      </p>
      <button class="view-more-events third">
        Learn More <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Group 12 (3).png" alt="">
      </button>

    </div>

    <div class="text-content-holder">
      <h1 class="heading-center seventh">
        <span class="bold-text">Subscribe</span> For our latest offers
      </h1>
    </div>

    <div class="image-container">

      <div class="left-img">
        <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 27 (2).png" alt="">

        <p class="text10">
          Dorem ipsum dolor sit
          <span class="dots"></span>
          <span class="moreText10">
            <br>
            Anticoagulant Specialist from USI, USA, C.H.Q.P. She has completed her Pharm.D, C.R.C.P, & Dip.
          </span>
        </p>
        <button class="read-more-btn10">Read More...</button>
      </div>
      <div class="right-img">
        <img src="assets/newimages/assets/newimages/assets/newimages/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/assets/new_images/Component 33.png" alt="">
        <p class="text11">
          Dorem ipsum dolor sit
          <span class="dots"></span>
          <span class="moreText11">
            <br>
            Anticoagulant Specialist from USI, USA, C.H.Q.P. She has completed her Pharm.D, C.R.C.P, & Dip.
          </span>
        </p>
        <button class="read-more-btn11">Read More...</button>
      </div>

    </div> --> 
    {{-- <div class="footer">

      <div class="pages">

        <a href="#" class="privacy-page">Privacy Policy - Terms & Conditions</a>

      </div>

      <div class="footer-logo">

        <a href="#"><img src="assets/new_images/Frame 1.png" alt=""></a>

      </div>
      <div class="social-icons">

        <a href=""><img src="assets/new_images/Vector (8).png" alt=""></a>
        <a href=""><img src="assets/new_images/Vector (9).png" alt=""></a>
        <a href=""><img src="assets/new_images/Vector (10).png" alt=""></a>
        <a href=""><img src="assets/new_images/Vector (11).png" alt=""></a>

      </div>

    </div> --}}
    <div class="container">
    @include('layouts.newfooter')
  </div>
  </div>
  </div>

  <script src="assets/newjs/index.js"></script>
  <script src="assets/newjs/script.js"></script>
  <script src="assets/js/contact.js"></script>
  
 
 
  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      // autoplay: true,
      autoplaySpeed: 1000, // Set a slower autoplay speed (e.g., 5000 milliseconds)
      nav: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
    });
  </script>
  <!-- ___________ Slick Slider ______________ -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  <script>

$('.slider').slick({
  centerMode: true,
  dots: true,
  centerPadding: '60px',
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 992, // Breakpoint for tablets (768px and above)
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 2 // Set slidesToShow to 2 for tablets
      }
    },
    {
      breakpoint: 768, // Breakpoint for mobile devices (less than 768px)
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1 // Set slidesToShow to 1 for mobile devices
      }
    }
  ]
});



  </script>
</body>

</html>