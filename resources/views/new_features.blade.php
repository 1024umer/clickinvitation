@extends('layouts.new_app')
@section('title') Discover Our Comprehensive Features For Unforgettable Events @endsection
@section('description')Elevate your event planning with our comprehensive features designed to create unforgettable experiences. Start planning your next memorable event with us. @endsection
@section('tags')
<link rel="canonical" href="https://clickinvitation.com/features">
@endsection

@section('content')

<div class="container">
        <div class="heading-text">
            <h1>
                Discover Our Comprehensive Features for<span class="bold-text"> Unforgettable </span>Events.
            </h1>

            <!-- <p>
                Yorem ipsum dolor sit amet, consectetur adipiscing elit. <br>
                Nunc vulputate libero et velit interdum, ac aliquet odio mattis.
            </p> -->

        </div>
        <div class="main-img">
            <img src="assets/newimages/Component 33 (5).png" alt="">
        </div>
        <div class="tab text-border">
            <input id="tab1" type="radio" name="tabs" checked>
            <label for="tab1">Event Webpage</label>
            <input id="tab2" type="radio" name="tabs">
            <label for="tab2" onclick="scrollToContent2()">Photo Gallery</label>
            <input id="tab3" type="radio" name="tabs">
            <label for="tab3" onclick="scrollToContent3()">Gifts and Payment Gateway</label>
            <input id="tab4" type="radio" name="tabs">
            <label for="tab4" onclick="scrollToContent4()">Main Meal Choices and Allergies</label>
            <input id="tab5" type="radio" name="tabs">
            <label for="tab5" onclick="scrollToContent5()">Pre-Made Invitations or Custom Designs</label>
            <input id="tab6" type="radio" name="tabs">
            <label for="tab6" onclick="scrollToContent6()">Tables and Seating Arrangements</label>
            <input id="tab7" type="radio" name="tabs">
            <label for="tab7" onclick="scrollToContent7()">Messaging System</label>
            <input id="tab8" type="radio" name="tabs">
            <label for="tab8" onclick="scrollToContent8()">QR Code Check-In with Acknowledgment</label>
            <input id="tab9" type="radio" name="tabs">
            <label for="tab9" onclick="scrollToContent9()">Guest Table Numbers at Check-In</label>
            <input id="tab10" type="radio" name="tabs">
            <label for="tab10" onclick="scrollToContent10()">Adding Family Members and Sharing Invitations</label>


            <div id="content1" class="tab-wrap">

                <div class="tab-content">
                    <img src="assets/newimages/Group 16.png" alt="">
                    <h2>
                        Event Webpage
                    </h2>

                </div>

                <p>
                    Create a dedicated webpage for your event, showcasing all the important details in one place.<span
                        class="bold-text font-default"> From event description and schedule to location and FAQs,
                    </span>your guests will have easy access to everything they need to know.

                </p>

            </div>
            <!-- end of div 1 -->
            <div id="content2" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/Group 17.png" alt="">
                    <h3>
                        Photo Gallery
                    </h3>

                </div>

                <p>
                    <span class="bold-text font-default">Capture the memories of your event through photos. </span>
                    Both organizers and guests can upload images to the event's photo gallery, ensuring that every
                    special moment is preserved.
                </p>


            </div>

            <!-- end of div 2 -->
            <div id="content3" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/Group 18.png" alt="">
                    <h3>
                        Gifts and Payment Gateway
                    </h3>

                </div>

                <p>
                    Streamline gift-giving with our integrated payment gateway. Guests can contribute to gifts or send
                    monetary presents directly through the platform, <span class="bold-text font-default">making the
                        experience convenient and hassle-free.</span>

                </p>

            </div>
            <!-- end of div 3 -->
            <div id="content4" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/icons.png" alt="">
                    <h3>
                        Main Meal Choices and Allergies
                    </h3>

                </div>

                <p>
                    Cater to your guests' dietary preferences and allergies by offering them meal choices. <span
                        class="bold-text font-default"> Collect their selections during the RSVP process</span>
                    and ensure that everyone enjoys a delicious dining experience.
                </p>

            </div>
            <!-- end of div 4 -->
            <div id="content5" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/Vector (6).png" alt="">
                    <h3>
                        Pre-Made Invitations or Custom Designs
                    </h3>

                </div>

                <p>
                    Choose from<span class="bold-text font-default"> a range of pre-made invitation cards or unleash
                        your</span> creativity by uploading your custom designs and logos. Make your event invitations
                    truly unique and reflective of your style.
                </p>

            </div>
            <!-- end of div 5 -->
            <div id="content6" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/Group 19.png" alt="">
                    <h3>
                        Tables and Seating Arrangements
                    </h3>

                </div>

                <p>
                    Effortlessly organize seating arrangements with our intuitive tools. Designate tables and seats for
                    your guests, <span class="bold-text font-default">ensuring a smooth and enjoyable event</span>
                    experience.
                </p>

            </div>
            <!-- end of div 6 -->
            <div id="content7" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/Vector (5).png" alt="">
                    <h3>
                        Messaging System
                    </h3>

                </div>

                <p>
                    Communicate seamlessly with your guests through our built-in messaging system. Send event updates,
                    <span class="bold-text font-default">reminders, and important information to keep everyone in the
                        loop.</span>
                </p>

            </div>
            <!-- end of div 7 -->
            <div id="content8" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/Language_translator.png" alt="">
                    <h3>
                        QR Code Check-In with Acknowledgment
                    </h3>

                </div>

                <p>
                    Streamline event check-in with QR codes. Guests can simply scan their codes at the reception,
                    receiving an acknowledgment <span class="bold-text font-default">of their attendance. Make the entry
                        process swift </span> and efficient.
                </p>

            </div>
            <!-- end of div 8 -->
            <div id="content9" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/Vector (7).png" alt="">
                    <h3>
                        Guest Table Numbers at Check-In
                    </h3>

                </div>

                <p>
                    Enhance guest<span class="bold-text font-default"> experience by providing them with their table
                    </span> numbers upon check-in. Avoid confusion and ensure everyone finds their designated seats
                    effortlessly.
                </p>

            </div>
            <!-- end of div 9 -->
            <div id="content10" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/Vector (7).png" alt="">
                    <h3>
                        Adding Family Members and Sharing Invitations
                    </h3>

                </div>
                
                <p>
                    Allow guests to include their family members when responding to invitations. <span class="bold-text font-default">Share the event details with the added members, ensuring all attendees are well-informed.
                    </span> 
                </p>

            </div>
            <!-- end of div 10 -->
        </div>
       
        <div class="heading-text">
            <h2>
                Why Chooses<span class="bold-text"> ClickInvitation</span> ?
            </h2>
        </div>
       
        <div class="container">
            <div class="main-text hs-space">
                <div class="sub-text1">  
                  <div class="first-area">  
                    <div class="sub-area">    
                      <div> <img src="assets/newimages/Group 16.png" alt=""></div>
                      <div>
                        <h3>All-in-One Solution</h3>
                      </div>
                    </div>
                    <p class="text1">
                        We provide a comprehensive suite of features that cover every aspect of event planning and management, ensuring a seamless and enjoyable experience for both organizers and guests.
                    </p>
                    
                  </div>
                </div>
                <div class="sub-text2">
                  <div class="first-area">
                    <div class="sub-area">
                      <div> <img src="assets/newimages/Group 17.png" alt=""></div>
                      <div>
                        <h3>Ease of Use</h3>
                      </div>
                    </div>
                    <p class="text4">
                        Our platform is designed with simplicity in mind. Whether you're a tech enthusiast or a novice, you'll find our tools intuitive and user-friendly.
                     
                    </p>
                  </div>
                </div>
                <div class="sub-text3"> 
                  <div class="first-area">
                    <div class="sub-area"> 
                      <div> <img src="assets/newimages/Group 18.png" alt=""></div>
                      <div>
                        <h3>Customization</h3>
                      </div>
                    </div>
                    <p class="text7">
                        Tailor every element to match your event's theme and style. From invitations to seating arrangements, you have full control over how your event is presented.
                    </p>
                  </div>
                </div>
                
              </div>
              
        </div>
        <div class="container text-border">
            <div class="main-text f-center hs-space">
                <div class="sub-text1 new-added">  
                  <div class="first-area">  
                    <div class="sub-area">    
                      <div> <img src="assets/newimages/Group 16.png" alt=""></div>
                      <div>
                        <h3>Efficiency</h3>
                      </div>
                    </div>
                    <p class="text1">
                        Save time and reduce stress with our streamlined features. Manage guest lists, communication, and event logistics effortlessly.
                    </p>
                    
                  </div>
                </div>
                <div class="sub-text2 new-added">
                  <div class="first-area">
                    <div class="sub-area">
                      <div> <img src="assets/newimages/Group 17.png" alt=""></div>
                      <div>
                        <h3>Memories That Last</h3>
                      </div>
                    </div>
                    <p class="text4">
                        Capture and cherish every moment with our photo gallery and memory-sharing features. Your event's essence will be preserved for years to come.
                     
                    </p>
                  </div>
                </div>
              
                
              </div>
              
        </div>
       



    </div>
    <div class="container">
@endsection