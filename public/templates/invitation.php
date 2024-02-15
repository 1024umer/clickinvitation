<div style="
position: fixed;
z-index: 2;
padding: 25px;
background: #f3eadf;
border-radius: 25px;
width: 444px;
box-shadow: 3px 2px 34px 0px rgba(0,0,0,0.75);
-webkit-box-shadow: 3px 2px 34px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 3px 2px 34px 0px rgba(0,0,0,0.75);
right: 16px;
width: 408px;
" id="popUpWin">
	<p style="
    text-align: center;
    font-size: 25px;
    font-weight: bold;
    padding: 0;
    margin: 0;
">Tutorial</p>
<iframe width="350" height="200" src="https://www.youtube.com/embed/ND5GHyBDENQ" title="Invitation Card how to" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
	
	<button style="
    position: absolute;
    border: 0;
    background: red;
    color: white;
    border-radius: 50%;
    top: -4px;
    right: -4px;
    width: 30px;
    height: 30px;
" onclick="closePopup()">X</button>
</div>
<script>
	let pageData ="";

	function closePopup(){
	document.getElementById("popUpWin").style.display = "none";
	}
</script>
<div class="container">
	<div class="row" style="margin-top: 30px">
		<!-- form start here-->

		<div class="col-sm-12 col-md-12 col-lg-4">
			<div class="card" style="padding: 10px;">

				

				<!-- new -->
				<div class="col-12">
					<!-- Title One lable & text input -->
					
					<label for="text1" class="form-label">Title 1</label>
					<input type="text" value=" WITH OUR FIRENDS " class="form-control" id="title1" placeholder="Write your title here" onkeyup="textChanger(this, 'atitle1')">
				</div>
				<div class="col-12">
					<!-- Title Two lable & text input -->
					<label for="text1" class="form-label">Title 2</label>
					<input type="text" value="AND FAMILY"class="form-control" id="title2" placeholder="Write your title here" onkeyup="textChanger(this, 'atitle2')">
				</div> <div class="col-12">
					<!-- Title Three lable & text input -->
					<label for="text1" class="form-label">Title 3</label>
					<input type="text"value="HONOUR US WITH YOUR PRESENCE" class="form-control" id="title3" placeholder="Write your title here" onkeyup="textChanger(this, 'atitle3')">
				</div> <div class="col-12">
					<!-- Title Four lable & text input -->
					<label for="text1" class="form-label">Title 4</label>
					<input type="text"value="SAVE THE DATE" class="form-control" id="title4" placeholder="Write your title here" onkeyup="textChanger(this, 'atitle4')">
				</div>
				<div class="col-12" style="
				display: flex;
				flex-direction: row;
				align-items: center;
				padding: 0 10px;
				justify-content: space-between; ">
					<div>
						<label for="title1" class="form-label">Pick Color</label><br>
						
						<div class="input-color-container">
							<!-- Title Color pallate -->
							<input id="input-color-title" value="#c1baa5" class="input-color" type="color" id="favcolor" name="favcolor" onchange="fontcolorChanger(this, 'atitle1'); fontcolorChanger(this, 'atitle2'); fontcolorChanger(this, 'atitle3'); fontcolorChanger(this, 'atitle4');" />
						  </div>
					</div>
					<div>
						<!-- Title font family -->
						<label for="title1" class="form-label">Select Font</label><br>
						<select id="titleFont" class="form-select" onchange="fontfamilyChanger(this, 'atitle1'); fontfamilyChanger(this, 'atitle2'); fontfamilyChanger(this, 'atitle3'); fontfamilyChanger(this, 'atitle4');" style="display: block ; width: 100%;  "  >
							<option  value="MONTEZ-REGULAR" >MONTEZ-REGULAR</option>
							<option value="DANCINGSCRIPT-BOLD" >DANCINGSCRIPT-BOLD</option>
							<option selected value="AGENCYB" >AGENCYB</option>
							<option value="FREESCPT" >FREESCPT</option>
						</select>
					</div>
				  
				</div>
<!-- older -->
<hr>
		<div class="col-12">
			<!-- Name One lable & text input -->
			<label for="name1" class="form-label">Name 1</label>
			<input type="text" value="First name" class="form-control" id="name1" placeholder="Write your first name here" onkeyup="changeName1()">
		</div>
		<div class="col-12">
			<!-- Name Two lable & text input -->
			<label for="name2" class="form-label" id="name2label">Name 2</label>
			<input type="text" value="Second name" class="form-control" id="name2" placeholder="Write your second name here" onkeyup="changeName2()">
		</div>
		<br>

				<div class="col-12" style="
				display: flex;
				flex-direction: row;
				align-items: center;
				padding: 0 10px;
				justify-content: space-between; ">
					<div>
						<label for="name1" class="form-label">Pick Color</label><br>
						<!-- Names Color pallate -->
						<div class="input-color-container">
							<input id="input-color-name" value="#a0634a" class="input-color" type="color" id="favcolor" name="favcolor" onchange="changeFont1(this.value)">
						  </div>
					</div>
					<div>
						<!-- Names Font family -->
						<label for="name1" class="form-label">Select Font</label><br>
						<select id="nameFont" class="form-select" onchange="changeText2(this.value)" style="display: block ; width: 100%;  "  >
							<option selected="selected" value="MONTEZ-REGULAR" >MONTEZ-REGULAR</option>
							<option value="DANCINGSCRIPT-BOLD" >DANCINGSCRIPT-BOLD</option>
							<option value="AGENCYB" >AGENCYB</option>
							<option value="FREESCPT" >FREESCPT</option>
						</select>
					</div>
				  
				</div>
				<hr>
<div class="col-12">
<!-- Cermony text lable & text input -->
<label for="cermony" class="form-label">Cermony Title</label>
<input type="text" value="IN OUR WEDDING" class="form-control" id="cermony" placeholder="Write your Cermony here" onkeyup="textChanger(this, 'acermony')">
</div>
<div class="col-12" style="
display: flex;
flex-direction: row;
align-items: center;
padding: 0 10px;
justify-content: space-between; ">
<div>
	<!-- Cermony text Color pallate -->
	<label for="name1" class="form-label">Pick Color</label><br>
	
	<div class="input-color-container">
		<input id="input-color-cer" value="#c1baa5" class="input-color" type="color" id="favcolor" name="favcolor" onchange="fontcolorChanger2(this,'acermony')">
	  </div>
</div>
<div>
	<!-- Cermony text font family -->
	<label for="name1" class="form-label">Select Font</label><br>
	<select id="cerFont" class="form-select" onchange="fontfamilyChanger2(this, 'acermony');" style="display: block ; width: 100%;  "  >
		<option value="MONTEZ-REGULAR" >MONTEZ-REGULAR</option>
		<option value="DANCINGSCRIPT-BOLD" >DANCINGSCRIPT-BOLD</option>
		<option selected value="AGENCYB" >AGENCYB</option>
		<option value="FREESCPT" >FREESCPT</option>
	</select>
</div>

</div>
<hr>
			 
			   
			 <div class="col-12">
				<!-- Other one text lable & text input -->
					<label for="text1" class="form-label">Other Text 1</label>
					<input type="text" value="ONE O CLOCK IN THE AFTERNOON" class="form-control" id="txtOther1" placeholder="Write other text or leave blank" onkeyup="changeOther1(this)">
			 </div>
				<div class="col-12">
					<!-- Other two text lable & text input -->
					<label for="text1" class="form-label">Other Text 2</label>
					<input type="text" value="WHITE CHURCH" class="form-control" id="txtOther2" placeholder="Write other text or leave blank" onkeyup="changeOther2(this)">
				</div>
				<div class="col-12">
					<!-- Other three text lable & text input -->
					<label for="text1" class="form-label">Other Text 3</label>
					<input type="text" value="YOUR CITY GOES HERE" class="form-control" id="txtOther3" placeholder="Write other text or leave blank" onkeyup="changeOther3(this)">
				</div>

				<div class="col-12" style="
				display: flex;
				flex-direction: row;
				align-items: center;
				padding: 0 10px;
				justify-content: space-between; ">
					<div>
						<label for="name1" class="form-label">Pick Color</label><br>
						<!-- Other texts color pallate -->
						<div class="input-color-container">
							<input id="input-color-other" value="#c1baa5" class="input-color" type="color" id="favcolor" name="favcolor" onchange="fontcolorChanger3(this,'other1');fontcolorChanger3(this,'other2');fontcolorChanger3(this,'other3')">
						  </div>
					</div>
					<div>
						<!-- Other texts font family -->
						<label for="name1" class="form-label">Select Font</label><br>
						<select id="otherFont" class="form-select" onchange="fontfamilyChanger3(this, 'other1');fontfamilyChanger3(this, 'other2'); fontfamilyChanger3(this, 'other3');" style="display: block ; width: 100%;  "  >
							<option  value="MONTEZ-REGULAR" >MONTEZ-REGULAR</option>
							<option value="DANCINGSCRIPT-BOLD" >DANCINGSCRIPT-BOLD</option>
							<option selected value="AGENCYB" >AGENCYB</option>
							<option value="FREESCPT" >FREESCPT</option>
						</select>
					</div>
				  
				</div>
				<hr>
				

				<div class="col-12" style="
				display: flex;
				flex-direction: row;
				align-items: center;
				padding: 0 10px;
				justify-content: space-between; ">
					
						<label for="name1" class="form-label">Envelope Outer Color</label>
						<!-- Other texts color pallate -->
						<div class="input-color-container">
							<input  value="#efd7d1" class="input-color" type="color" id="cardOut" name="favcolor" onchange="cardColorChngOut()">
						  </div>
					
					
				  
				</div>
				<br/>
				<div class="col-12" style="
				display: flex;
				flex-direction: row;
				align-items: center;
				padding: 0 10px;
				justify-content: space-between; ">
					
						<label for="name1" class="form-label">Envelope Inner Color</label><br>
						<!-- Other texts color pallate -->
						<div class="input-color-container">
							<input  value="#f0b5aa" class="input-color" type="color" id="cardIn" name="favcolor" onchange="cardColorChngIn()">
						  </div>
					
				
				  
				</div>
				<hr>
			</div>
			<div class="card" style="padding: 10px;margin-top: 5px;">
			<label for="name1" class="form-label">RSVP Options</label>
			<div style="display: flex;flex-direction: row;flex-wrap: wrap;justify-content: space-between;font-size: 1.1em;">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1" checked>
				<label class="form-check-label" for="flexCheckChecked1">
					Attending
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2" checked>
				<label class="form-check-label" for="flexCheckChecked2">
					Gift Suggestion
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3" checked>
				<label class="form-check-label" for="flexCheckChecked3">
					At the reception Check-In
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked4" checked>
				<label class="form-check-label" for="flexCheckChecked4">
					Upload your Photos
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked5" checked>
				<label class="form-check-label" for="flexCheckChecked5">
					Sorry! I Can't
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked6" checked>
				<label class="form-check-label" for="flexCheckChecked6">
					Go to the website
				</label>
			</div>
			</div>
			</div>

			
		</div> <!-- col-6-->
		<!-- form end here-->

		<!-- Card start here-->
		<div class="col-sm-12 col-md-12 col-lg-8 py-2 px-2">
			<div style="padding: 10px;margin-bottom: 10px;" class="card">
				<label style="text-align: center;" class="form-label">Invitation Message title</label>
				<input type="text" class="form-control" placeholder="Message Title" id='msgTitle'>
    		</div>
			<div>
			<div class="letter" id="cardBG">
				<span style="
				display: flex;
				justify-content: center;flex-direction: column; ">
				
				<p class="allTitle" id="atitle1" style="color: #c1baa5 !important;"> WITH OUR FIRENDS</p>
				<p class="allTitle" id="atitle2" style="color: #c1baa5 !important;">AND FAMILY</p>
				<p class="allTitle" id="atitle3" style="color: #c1baa5 !important;">HONOUR US WITH YOUR PRESENCE</p>
				<p class="allTitle" id="atitle4" style="color: #c1baa5 !important;">SAVE THE DATE</p>
					<p class="main-names" id="display-name1">First name & Second name</p>
					<p class="cermony" id="acermony" style="color: #c1baa5 !important;">IN OUR WEDDING </p>
					<p class="other1" id="other1" style="color: #c1baa5 !important;">ONE O CLOCK IN THE AFTERNOON</p>
					<p class="other2" id="other2" style="color: #c1baa5 !important;">WHITE CHURCH</p>
					<p class="other3" id="other3" style="color: #c1baa5 !important;">YOUR CITY GOES HERE</p>
				</div>
			</div>
				<div class="">
				<p style="
					font-family: monospace;
					font-size: 1.5em;
					color: #2c2c2c;
					text-align: center;
				">Select Card Design</p>
					<div style="text-align: center;">
						<div id="cardCollection">
							<label class="borderCard py-2" >
								<input type="radio" onclick="cardSelector(this.value)" name="cardDesign" value="Card0.png" id="card0">
								<img    src="/assets/images/cardAnimation/Card0.png" alt="Option 1">
							</label>
							
							<label class="borderCard py-2" >
								<input type="radio" onclick="cardSelector(this.value)"  name="cardDesign" value="Card2.png" id="card2">
								<img  src="/assets/images/cardAnimation/Card2.png" alt="Option 2">
							</label>
							
							
							<label class="borderCard py-2" >
								<input type="radio" onclick="cardSelector(this.value)"  name="cardDesign" value="Card3.png" id="card3">
								<img  src="/assets/images/cardAnimation/Card3.png" alt="Option 3">
							</label>
							
							<label class="borderCard py-2" >
								<input type="radio" onclick="cardSelector(this.value)"  name="cardDesign" value="Card4.png" id="card4">
								<img  src="/assets/images/cardAnimation/Card4.png" alt="Option 4">
							</label>

							<label class="borderCard py-2" >
								<input type="radio" onclick="cardSelector(this.value)"  name="cardDesign" value="Card5.png" id="card5">
								<img  src="/assets/images/cardAnimation/Card5.png" alt="Option 4">
							</label>
						</div>
						
						<label class="borderCard py-2 px-4" id="uploadedCard" style="display: none">
							<input type="radio" onclick="cardSelectorUpload(this.value)" name="cardDesign" value="" id="card6">
							<img    src="/assets/images/cardAnimation/Card1.png" alt="Option 1" id="card6IMG">
						</label>
						<div style="background: #c1b0d1;margin: 0 20px;padding: 10px;border-radius: 15px;">
							<p style="color: white;font-size: 1.2em;padding: 0;margin: 0; font-weight:bold">OR Upload your own</p>
							<input type="file" accept="image/*" id="imgUploder"/>	
							<button for="imgUploder" class="btn" style="background: #9b69cd;color: white;font-weight:bold" onclick="cardUpload()">Upload Image</button>
							&nbsp;OR &nbsp;<a target="_blank" class="btn" style="background: #9b69cd;color: white;font-weight:bold"  href="https://www.zazzle.ca">Design Your Own Card</a>
							<p id="imgError" style="color: red;"></p>
							<p style="color: white;padding: 0;margin: 0;">Note: Only Image files are acceptable(jpg, jpeg, png), the file size should not exceed 1 mb & the dimensions of image should be 432 x 600 pixels </p>
						</div>
					</div>
					
					
				</div>

				<div class="bg-seletor">
					<br>
					<p style="
					font-family: monospace;
					font-size: 1.7em;
					font-weight: 600;
					color: #ffffff;
					text-align: center;
				">Select Background</p>
					<div style="text-align: center;" id="bgImgData">
						<label class="borderPc py-2" >
							<input type="radio" onclick="backgroundSelecetor(this.value)" name="test" value="bg4.webp" id="bg4" >
							
								<img    src="/assets/images/cardAnimation/bg4.webp" alt="Option 1">
							
							
						</label>
						
						<label class="borderPc py-2" >
							<input type="radio" onclick="backgroundSelecetor(this.value)"  name="test" value="bg2.jpg" id="bg2">
							<img  src="/assets/images/cardAnimation/bg2.jpg" alt="Option 2">
						</label>
						
						
						<label class="borderPc py-2" >
							<input type="radio" onclick="backgroundSelecetor(this.value)"  name="test" value="bg3.jpg" id="bg3">
							<img  src="/assets/images/cardAnimation/bg3.jpg" alt="Option 3">
						</label>
						
						<label class="borderPc py-2" >
							<input type="radio" onclick="backgroundSelecetor(this.value)"  name="test" value="bg1.jpg" id="bg1">
							<img  src="/assets/images/cardAnimation/bg1.jpg" alt="Option 4">
						</label>
					</div>
				</div>

			</div>
			
			<div class="col-md-5 col-12 mt-2">
				<!-- submit button-->
				<button class="btnDownload" id="" onclick="printCard()">Download</button>
			</div>
			<div class="col-md-7 col-12 mt-2">
				<!-- submit button-->
				<button class="btnPreview" id="myBtn" onclick="animationPage()">Preview Animation</button>
			</div>

			
			
		</div> <!-- col-6-->
	</div> <!-- row-->
		<!-- Card end here-->

		<!-- Background selector start here-->
</div> <!--container-->

<!-- Background selector END here-->

<div class="modal" id="myModal">
	<div class="frame modal-content">
		<button onclick="closeModal()" class="btnClose"></button>
		<iframe src="/" frameborder="0" id="animationFram"></iframe>
		<button class="btnSaveAni" id="btnAnimationSave">SAVE</button>
	</div>
</div>


<div id="popupBasic" style="
    display: none;
    position: absolute;
    background: white;
    padding: 15px;
    border-radius: 15px;
    box-shadow: 6px 6px 14px 0 rgb(0 0 0 / 20%), -8px -8px 18px 0 rgb(255 255 255 / 55%);
    width: 90%;
    text-align: center;
    font-size: 1.5em;
    top: 95%;
    left: 50%;
    transform: translateX(-50%);
	opacity:0;
">
	<p>Please Wait generating PDF</p>
</div>

<script src="/assets/js/jspdf.umd.min.js"></script>
<script src="/assets/js/animationScript.js"></script>

<script>
	loadOldData2();
</script>
<style>

	/*all font family added here*/

@font-face {
  font-family: MONTEZ-REGULAR;
  src: url(/assets/fonts/animationFont/MONTEZ-REGULAR.TTF);
}

@font-face {
  font-family: NIGHT-DEMO;
  src: url(/assets/fonts/animationFont/NIGHT-DEMO.TTF);
}

@font-face {
  font-family: DANCINGSCRIPT-BOLD;
  src: url(/assets/fonts/animationFont/DANCINGSCRIPT-BOLD.TTF);
}
@font-face {
  font-family: DANCINGSCRIPT-REGULAR;
  src: url(/assets/fonts/animationFont/DANCINGSCRIPT-REGULAR.TTF);
}
@font-face {
  font-family: FREESCPT;
  src: url(/assets/fonts/animationFont/FREESCPT.TTF);
}

@font-face {
  font-family: NIGHT-DEMO;
  src: url(/assets/fonts/animationFont/NIGHT-DEMO.TTF);
}

@font-face {
  font-family: AGENCYB;
  src: url(/assets/fonts/animationFont/AGENCYB.TTF);
}

.btnSaveAni{
	position: absolute;
    bottom: 0px;
    left: 50%;
    transform: translateX(-50%) translateY(50%);
    font-size: 1.5em;
    color: white;
    background: #ff9900;
    border: 0;
    padding: 10px;
    width: 300px;
}
.frame {
    position: absolute;
    display: block;
    background: white;
    border-radius: 5px;
    top: 50%;
    left: 50%;
    width: 80%;
    transform: translateX(-50%) translateY(-50%);
    height: 700px;
	border: 15px solid #9172b1
}
.frame>iframe {
	width: 100%;
	height: 100%;
}

.frame>.btnClose {
	border-radius: 50%;
  padding: 0.5em;
  width: 50px;
  height: 50px;
  border: 2px solid rgb(255, 59, 59);
  color: rgb(255, 59, 59);
  position: absolute;
  right: -35px;
  top: -30px;
}

.frame>.btnClose:hover {
	background-color: rgb(255, 59, 59);
	color: white;
}
.frame>.btnClose:hover::after, .frame>.btnClose:hover::before{
	background-color: white;	
}
.frame>.btnClose::before {
  content: " ";
  position: absolute;
  display: block;
  background-color: rgb(255, 59, 59);
  width: 2px;
  left: 22px;
  top: 5px;
  bottom: 5px;
  transform: rotate(45deg);
}
.frame>.btnClose::after {
  content: " ";
  position: absolute;
  display: block;
  background-color: rgb(255, 59, 59);
  height: 2px;
  top:22px;
  left: 5px;
  right: 5px;
  transform: rotate(45deg);
}

/* Card styles */
.letter {
  height: 600px;
  width: 432px;
  background-color: rgb(167, 167, 167);
  border-radius: 1px;
  background: url(/assets/images/cardAnimation/Card0.png);
  background-position: center !important;
  background-size: cover !important;
  background-repeat: no-repeat;
  box-shadow: 6px 6px 14px 0 rgb(0 0 0 / 20%), -8px -8px 18px 0 rgb(255 255 255 / 55%);
  margin: 0 auto;
  transition-property: all;
  transition-timing-function: linear;
  opacity: 1;
}

/* Card styles */
.letter p {
  text-align: center;
  /*font-size: 30px;*/
  /*color: #a0634a;*/
  /*font-family: MONTEZ-REGULAR;*/
  /* margin: 0 5px; */
}

#atitle1 {
  padding-top: 140px;
}
.allTitle {
  font-family: AGENCYB;
  font-size: 1em;
  margin: 0;
}

.main-names {
  margin: 10px auto;
  font-family: MONTEZ-REGULAR;
  font-size: 35px;
  color: #a0634a;
}
.cermony{
  font-family: AGENCYB;
  font-size: 1.2em;
}

.other1, .other2, .other3{
  text-align: center;
  padding-top: 0px !important;
  font-size: 12px !important;
  margin: 0;
  font-family: AGENCYB ;
}
.other1{
  padding-top: 0px !important;
}

.input-color-container {
  position: relative;
  overflow: hidden;
  width: 40px;
  height: 40px;
  border: solid 2px #ddd;
  border-radius: 40px;
}

.input-color {
  position: absolute;
  right: -8px;
  top: -8px;
  width: 56px;
  height: 56px;
  border: none;
}

.input-color-label {
  cursor: pointer;
  text-decoration: underline;
  color: #3498db;
}

    /* HIDE RADIO */
[type=radio] { 
position: absolute;
opacity: 0;
width: 0;
height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
cursor: pointer;
border-radius: 10px;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
border: 3px solid rgba(0, 174, 255, 0.568);
border-style: outset;
}


.borderPc{
margin: 0 5px;
}

.bg-seletor{
	/* border: 4px solid #639;*/
	box-shadow: 6px 6px 14px 0 rgb(0 0 0 / 20%), -8px -8px 18px 0 rgb(255 255 255 / 55%);
    border-radius: 20px;
    margin: 20px 10px;
    padding: 10px;
    background: #66339954;
}
.borderPc> img{
  width: 200px;
}

.borderCard> img {
	width: 70px;
	margin: 2px;
}

.form-label {
    margin-bottom: 0.5rem;
    font-weight: 500;
}

.btnPreview {
	width: 100%;
    color: white;
    margin-bottom: 20px;
    border-radius: 0px;
    background: #639;
    border-color: #639;
	border-style: solid;
    height: 50px;
    font-size: 1.5em;
}

.btnPreview:hover {
	background: rgb(172, 140, 204);
	color: #639;
	border-color: #639;
}

.btnDownload{
	width: 100%;
    color: white;
    margin-bottom: 20px;
    border-radius: 0px;
    background: #3368ff;
    border-color: #3368ff;
	border-style: solid;
    height: 50px;
    font-size: 1.5em;
}

.btnDownload:hover {
	background: #113aad;
	
}
@media only screen and (max-width: 540px) {
  .bg-seletor{
      border: 2px solid #639;
      border-radius: 20px;
      margin: 10px 10px;
      padding: 10px;
      background: #66339954;
  }
  .borderPc{
    width: 100%;
    margin: 5px auto;;
  }
  .borderPc>img{
    width: 100%;
  }
}

@media only screen and (max-width: 845px) {
  .borderPc{
    width: 100%;
    margin: 5px auto;;
  }
  .borderPc>img{
    width: 100%;
  }
}

@media only screen and (max-width: 460px) {
  .letter{
    width: auto;
    min-height: 432px;
  }
}


.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:50%; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:50%; opacity:1}
}


#main-bg {
    background:url("/assets/images/cardAnimation/bg4.webp");
  }

  .wrapper {
    top: 185px;
    margin: 0px auto;
    height: 200px;
    width: 300px;
    background-color: #f0b5aa;
    position: relative;
    display: flex;
    justify-content: center;
    z-index: 0;
  }
</style>