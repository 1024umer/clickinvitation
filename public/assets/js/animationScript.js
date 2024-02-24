//starting
// INDEX.HTML file JS code

//empty variables for globle use
let cardId,
  title1 = "WITH OUR FIRENDS",
  title2 = "AND FAMILY",
  title3 = "HONOUR US WITH YOUR PRESENCE",
  title4 = "SAVE THE DATE",
  titleFont = "AGENCYB",
  titleColor = "#c1baa5",
  name1 = "First name",
  name2 = "Second name",
  cermony = "IN OUR WEDDING",
  cermonyFont = "AGENCYB",
  cermonyColor = "#c1baa5",
  other1 = "ONE O CLOCK IN THE AFTERNOON",
  other2 = "WHITE CHURCH",
  other3 = "YOUR CITY GOES HERE",
  otherFont = "AGENCYB",
  otherColor = "#c1baa5",
  bgName = "bg4.webp",
  cardName = "Card0.png",
  fontColor = "#A0634A",
  fontFamily = "MONTEZ-REGULAR",
  colorOut = "efd7d1",
  colorIn = "f0b5aa";
  isCouple = "1";
let customCard = 0;

getapi();

//Runtime changing text function for Name1
function changeName1() {
  let a = document.getElementById("name1").value;
  let b = document.getElementById("name2").value;
  name1 = a;
  if(isCouple == 1){
    if (a.trim().length > 0) {
      if (b.trim().length > 0) {
        document.getElementById("display-name1").innerHTML = a + " & " + b;
      } else {
        document.getElementById("display-name1").innerHTML = a;
      }
    } else {
      if (b.trim().length > 0) {
        document.getElementById("display-name1").innerHTML = b;
      } else {
        document.getElementById("display-name1").innerHTML = "";
      }
    }
  }else{
    document.getElementById("display-name1").innerHTML = a;
  }
  
  //console.log(name1);
}

//Runtime changing text function for Name2
function changeName2() {
  let a = document.getElementById("name1").value;
  let b = document.getElementById("name2").value;
  name2 = b;
  if (b.trim().length > 0) {
    if (a.trim().length > 0) {
      document.getElementById("display-name1").innerHTML = a + " & " + b;
    } else {
      document.getElementById("display-name1").innerHTML = b;
    }
  } else {
    document.getElementById("display-name1").innerHTML =
      (a.trim().length > 0 ? a : "First Name") + " & last Name";
    if (a.trim().length > 0) {
      document.getElementById("display-name1").innerHTML = a;
    } else {
      document.getElementById("display-name1").innerHTML = "";
    }
  }
  //console.log(a);
}

//Runtime changing text function for Other1
function changeOther1(e) {
  other1 = e.value;
  document.getElementById("other1").innerHTML = e.value;
}

//Runtime changing text function for Other2
function changeOther2(e) {
  other2 = e.value;
  document.getElementById("other2").innerHTML = e.value;
}

//Runtime changing text function for Other3
function changeOther3(e) {
  other3 = e.value;
  document.getElementById("other3").innerHTML = e.value;
}

//sending data to backend to store in SQL
function animationPage() {
  /*
    var data = new FormData();
    data.append('cardId', 'person');
    data.append('name1', name1);
    data.append('name2', name2);
    data.append('other1', other1);
    data.append('other2', other2);
    data.append('other3',other3 );
    data.append('fontColor', fontColor);
    data.append('fontFamily', fontFamily);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add.php", true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(data);
*/
  //Default or empty URL with starting "?"
  let url = "";

  //adding URL part to url variable

  if (typeof title1 !== "undefined") {
    url += title1 + "&&";
  } else {
    url += "WITH OUR FIRENDS&&";
  }

  if (typeof title2 !== "undefined") {
    url += title2 + "&&";
  } else {
    url += "AND FAMILY&&";
  }

  if (typeof title3 !== "undefined") {
    url += title3 + "&&";
  } else {
    url += "HONOUR US WITH YOUR PRESENCE&&";
  }

  if (typeof title4 !== "undefined") {
    url += title4 + "&&";
  } else {
    url += "SAVE THE DATE&&";
  }

  if(isCouple == 1){
    if (typeof name1 !== "undefined") {
      url += name1 + "&&";
    } else {
      url += "First name&&";
    }
  
    if (typeof name2 !== "undefined") {
      url += name2 + "&&";
    } else {
      url += "Second name&&";
    }
  }else{
    if (typeof name1 !== "undefined") {
      url += name1 + "&&";
      url += "" + "&&";
    }else {
      url += "First name";
    }
  }
  

  if (typeof cermony !== "undefined") {
    url += cermony + "&&";
  } else {
    url += "IN OUR WEDDING&&";
  }

  if (typeof other1 !== "undefined") {
    url += other1 + "&&";
  } else {
    url += "ONE O CLOCK IN THE AFTERNOON&&";
  }

  if (typeof other2 !== "undefined") {
    url += other2 + "&&";
  } else {
    url += "WHITE CHURCH&&";
  }

  if (typeof other3 !== "undefined") {
    url += other3 + "&&";
  } else {
    url += "YOUR CITY GOES HERE&&";
  }

  if (typeof bgName !== "undefined") {
    url += bgName + "&&";
  } else {
    url += "bg4.webp&&";
  }
  if (typeof cardName !== "undefined") {
    url += cardName + "&&";
  } else {
    url += "card0.png&&";
  }

  //-----------------------------------
  if (typeof titleFont !== "undefined") {
    url += titleFont + "&&";
  } else {
    url += "AGENCYB&&";
  }

  if (typeof titleColor !== "undefined") {
    url += titleColor.substring(1) + "&&";
  } else {
    url += "c1baa5&&";
  }

  if (typeof fontFamily !== "undefined") {
    url += fontFamily + "&&";
  } else {
    url += "MONTEZ-REGULAR&&";
  }

  if (typeof fontColor !== "undefined") {
    if (fontColor.indexOf("#") > -1) {
      url += fontColor.substring(1) + "&&";
      //console.log("after " + fontColor.substring(1));
    } else {
      url += fontColor + "&&";
    }
    //console.log("after " + fontColor.substring(1));
  } else {
    url += "A0634A&&";
  }

  if (typeof cermonyFont !== "undefined") {
    url += cermonyFont + "&&";
  } else {
    url += "AGENCYB&&";
  }

  if (typeof cermonyColor !== "undefined") {
    url += cermonyColor.substring(1) + "&&";
  } else {
    url += "c1baa5&&";
  }

  if (typeof otherFont !== "undefined") {
    url += otherFont + "&&";
  } else {
    url += "AGENCYB&&";
  }
  if (typeof otherColor !== "undefined") {
    url += otherColor.substring(1) + "&&";
  } else {
    url += "=c1baa5&&";
  }
  if (typeof colorIn !== "undefined") {
    url += colorIn + "&&";
  } else {
    url += "=f0b5aa&&";
  }
  if (typeof colorOut !== "undefined") {
    url += colorOut + "&&";
  } else {
    url += "=efd7d1&&";
  }
  url += customCard + "&&";

  document.getElementById("animationFram").src = "/cardPreview/" + url;
  //console.log(url);
  //console.log("perview = "+isCouple);
}

function printPage() {
  /*
    var data = new FormData();
    data.append('cardId', 'person');
    data.append('name1', name1);
    data.append('name2', name2);
    data.append('other1', other1);
    data.append('other2', other2);
    data.append('other3',other3 );
    data.append('fontColor', fontColor);
    data.append('fontFamily', fontFamily);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add.php", true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(data);
*/
  //Default or empty URL with starting "?"
  let url = "";

  //adding URL part to url variable

  if (typeof title1 !== "undefined") {
    url += title1 + "&&";
  } else {
    url += "WITH OUR FIRENDS&&";
  }

  if (typeof title2 !== "undefined") {
    url += title2 + "&&";
  } else {
    url += "AND FAMILY&&";
  }

  if (typeof title3 !== "undefined") {
    url += title3 + "&&";
  } else {
    url += "HONOUR US WITH YOUR PRESENCE&&";
  }

  if (typeof title4 !== "undefined") {
    url += title4 + "&&";
  } else {
    url += "SAVE THE DATE&&";
  }

  if (typeof name1 !== "undefined") {
    url += name1 + "&&";
  } else {
    url += "First name&&";
  }

  if (typeof name2 !== "undefined") {
    url += name2 + "&&";
  } else {
    url += "Second name&&";
  }

  if (typeof cermony !== "undefined") {
    url += cermony + "&&";
  } else {
    url += "IN OUR WEDDING&&";
  }

  if (typeof other1 !== "undefined") {
    url += other1 + "&&";
  } else {
    url += "ONE O CLOCK IN THE AFTERNOON&&";
  }

  if (typeof other2 !== "undefined") {
    url += other2 + "&&";
  } else {
    url += "WHITE CHURCH&&";
  }

  if (typeof other3 !== "undefined") {
    url += other3 + "&&";
  } else {
    url += "YOUR CITY GOES HERE&&";
  }

  if (typeof bgName !== "undefined") {
    url += bgName + "&&";
  } else {
    url += "bg4.webp&&";
  }
  if (typeof cardName !== "undefined") {
    url += cardName + "&&";
  } else {
    url += "card0.png&&";
  }

  //-----------------------------------
  if (typeof titleFont !== "undefined") {
    url += titleFont + "&&";
  } else {
    url += "AGENCYB&&";
  }

  if (typeof titleColor !== "undefined") {
    url += titleColor.substring(1) + "&&";
  } else {
    url += "c1baa5&&";
  }

  if (typeof fontFamily !== "undefined") {
    url += fontFamily + "&&";
  } else {
    url += "MONTEZ-REGULAR&&";
  }

  if (typeof fontColor !== "undefined") {
    url += fontColor.substring(1) + "&&";
  } else {
    url += "A0634A&&";
  }

  if (typeof cermonyFont !== "undefined") {
    url += cermonyFont + "&&";
  } else {
    url += "AGENCYB&&";
  }

  if (typeof cermonyColor !== "undefined") {
    url += cermonyColor.substring(1) + "&&";
  } else {
    url += "c1baa5&&";
  }

  if (typeof otherFont !== "undefined") {
    url += otherFont + "&&";
  } else {
    url += "AGENCYB&&";
  }
  if (typeof otherColor !== "undefined") {
    url += otherColor.substring(1) + "&&";
  } else {
    url += "=c1baa5&&";
  }
  url += "card_" + window.location.pathname.split("/")[2];

  window.open("/testPrint/" + url, "_blank");
  //console.log("/testPrint/" + url);
}

// ending

//starting
// ANIMATIONCARD1.HTML file JS code

//Runtime changing text function for all text in card
function changeAllText(element) {
  document.getElementById("body").style.display = "none";
  let data;

  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  let cardId = urlParams.get("id");

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState != 4) return;

    if (this.status == 200) {
      data = JSON.parse(this.responseText);
    }

    var atitle1 = document.getElementById("atitle1");
    atitle1.innerHTML = data.title1;
    atitle1.style.fontFamily = data.titleFont;
    atitle1.style.color = "#" + data.titleColor;

    var atitle2 = document.getElementById("atitle2");
    atitle2.innerHTML = data.title2;
    atitle2.style.fontFamily = data.titleFont;
    atitle2.style.color = "#" + data.titleColor;

    var atitle3 = document.getElementById("atitle3");
    atitle3.innerHTML = data.title3;
    atitle3.style.fontFamily = data.titleFont;
    atitle3.style.color = "#" + data.titleColor;

    var atitle4 = document.getElementById("atitle4");
    atitle4.innerHTML = data.title4;
    atitle4.style.fontFamily = data.titleFont;
    atitle4.style.color = "#" + data.titleColor;

    var mainName = document.getElementById("name1");
    mainName.innerHTML = data.name1 + " & " + data.name2;
    mainName.style.fontFamily = data.fontFamily;
    mainName.style.color = "#" + data.fontColor;

    var aCermony = document.getElementById("acermony");
    aCermony.innerHTML = data.cermony;
    aCermony.style.fontFamily = data.cermonyFont;
    aCermony.style.color = "#" + data.cermonyColor;

    var aOther1 = document.getElementById("other1");
    aOther1.innerHTML = data.other1;
    aOther1.style.fontFamily = data.otherFont;
    aOther1.style.color = "#" + data.otherColor;

    var aOther2 = document.getElementById("other2");
    aOther2.innerHTML = data.other2;
    aOther2.style.fontFamily = data.otherFont;
    aOther2.style.color = "#" + data.otherColor;

    var aOther3 = document.getElementById("other3");
    aOther3.innerHTML = data.other3;
    aOther3.style.fontFamily = data.otherFont;
    aOther3.style.color = "#" + data.otherColor;

    document.getElementById("main-bg").style.background =
      "url('https://clickadmin.searchmarketingservices.co/eventcards/" + data.bgName + "')";
    //console.log("backend/getDetails.php?id=" + cardId);
    document.getElementById("body").style.display = "block";
  };

  xhr.open("GET", "backend/getDetails.php?id=" + cardId, true);
  xhr.send();

  /*
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);

    document.getElementById("name1").innerHTML = (urlParams.get("name1") != null? urlParams.get("name1"):"") + " & " + (urlParams.get("name2") != null? urlParams.get("name2"):"");
    
    document.getElementById("other1").innerHTML = (urlParams.get("other1") != null? urlParams.get("other1"):"");
    document.getElementById("other2").innerHTML = (urlParams.get("other2") != null? urlParams.get("other2"):"");
    document.getElementById("other3").innerHTML = (urlParams.get("other3") != null? urlParams.get("other3"):"");
    */
}

//changing font & color of text
function changeFont1(value) {
  //console.log("thiscolor=" + value);
  document.getElementById("display-name1").style.color = value;
  fontColor = value;
}

//changing font & color of text
function changeText2(value) {
  document.getElementById("display-name1").style.fontFamily = value;
  fontFamily = value;
}

//changing font & color of text
function backgroundSelecetor(value) {
  bgName = value;
}

function cardSelector(imgName) {
  //console.log("cardselect: " + imgName);
  cardName = imgName;
  customCard = 0;
  let card = document.getElementById("cardBG");
  //card.style.opacity = 0.5;
  //card.style.background = "url(/assets/images/cardAnimation/"+ value +")";
  //card.style.opacity = 1;
  $("#cardBG").animate({ opacity: "0.1" });

  setTimeout(() => {
    $("#cardBG").css(
      "background-image",
      "url('https://clickadmin.searchmarketingservices.co/eventcards/" + imgName + "')"
    );
    $("#cardBG").animate({ opacity: "1" });
  }, 500);
}

function cardSelectorUpload(value) {  
  //console.log("card upload select : " + value);
  cardName = value;
  let card = document.getElementById("cardBG");
  //card.style.opacity = 0.5;
  //card.style.background = "url(/assets/images/cardAnimation/"+ value +")";
  //card.style.opacity = 1;
  $("#cardBG").animate({ opacity: "0.1" });

  setTimeout(() => {
    $("#cardBG").css(
      "background-image",
      "url('https://clickinvitation.com/assets/images/cardAnimation/" + value + "')"
    );
    $("#cardBG").animate({ opacity: "1" });
  }, 500);
}

//changing font & color of text
function textChanger(element, targetId) {
  //console.log("text=" + element.value + " id=" + targetId);
  document.getElementById(targetId).innerHTML = element.value;
  //console.log(targetId + " = " + element.value);
  if (targetId == "atitle1") {
    title1 = element.value;
    //console.log("asdfsd");
  }
  if (targetId == "atitle2") {
    title2 = element.value;
  }
  if (targetId == "atitle3") {
    title3 = element.value;
  }
  if (targetId == "atitle4") {
    title4 = element.value;
  }
  if (targetId == "acermony") {
    cermony = element.value;
  }
}

//ending

//starting
// INDEX.HTML JS code extended / updated

//changing text color & storing value in variable
function fontcolorChanger(element, targetId) {
  document.getElementById(targetId).style.color = element.value;

  titleColor = element.value;
}

//changing text color & storing value in variable
function fontcolorChanger2(element, targetId) {
  document.getElementById(targetId).style.color = element.value;

  cermonyColor = element.value;
}

//changing text color & storing value in variable
function fontcolorChanger3(element, targetId) {
  document.getElementById(targetId).style.color = element.value;

  otherColor = element.value;
}

//changing text font & storing value in variable
function fontfamilyChanger(element, targetId) {
  document.getElementById(targetId).style.fontFamily = element.value;

  titleFont = element.value;
}

//changing text font & storing value in variable
function fontfamilyChanger2(element, targetId) {
  document.getElementById(targetId).style.fontFamily = element.value;

  cermonyFont = element.value;
}

//changing text font & storing value in variable
function fontfamilyChanger3(element, targetId) {
  document.getElementById(targetId).style.fontFamily = element.value;

  otherFont = element.value;
}

//changing color Card Outter & storing value in variable
function cardColorChngOut() {
  colorOut = document.getElementById("cardOut").value.substring(1);
  //console.log(colorOut);
}

//changing color Card Inner & storing value in variable
function cardColorChngIn() {
  colorIn = document.getElementById("cardIn").value.substring(1);
  //console.log(colorIn);
}

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("btnClose");

// When the user clicks the button, open the modal
 function myBtn1() {
  modal.style.display = "block";
  animationPage();
};

// When the user clicks on <span> (x), close the modal
function closeModal() {
  modal.style.display = "none";
  document.getElementById("animationFram").src = "";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

//==================================================================================================
let token = "";
async function getapi() {
  // Storing response
  const response = await fetch("/get-csrf-token");

  // Storing data in form of JSON
  var data = await response.text();
  //console.log(data);
  this.token = data;
  
}
// Calling that async function

// $("#btnAnimationSave").click(function () {
//   getapi();
//   let rspvVal = "";
//   for (let index = 1; index <= 6; index++) {
//     if (document.getElementById("flexCheckChecked" + index).checked) {
//       rspvVal += "1,";
//     } else {
//       rspvVal += "0,";
//     }
//   }
//   let msg = document.getElementById("msgTitle").value;
  

//   $.ajax({
//     type: "POST",
//     url: "/event/card",
//     data: JSON.stringify({
//       _token: token,
//       event_id: window.location.pathname.split("/")[2],
//       title1: title1,
//       title2: title2,
//       title3: title3,
//       title4: title4,
//       titleFont: titleFont,
//       titleColor: titleColor,
//       name1: name1,
//       name2: name2,
//       cermony: cermony,
//       cermonyFont: cermonyFont,
//       cermonyColor: cermonyColor,
//       other1: other1,
//       other2: other2,
//       other3: other3,
//       otherFont: otherFont,
//       otherColor: otherColor,
//       bgName: bgName,
//       cardName: cardName,
//       fontColor: fontColor,
//       fontFamily: fontFamily,
//       customCard: customCard,
//       colorOut: colorOut,
//       colorIn: colorIn,
//       rsvp: rspvVal.substring(0, 11),
//       msg: msg,
//     }),
//     dataType: "json",
//     contentType: "application/json",
//     success: function (msg) {
//       window.location =
//         "/event/" + window.location.pathname.split("/")[2] + "/invitation";
//     },
//     error: function (xhr, status, error) {
//       var err = eval("(" + xhr.responseText + ")");
//       //console.log(err);
//     },
//   });
// });

function loadOldData() {
  getapi();
  //console.log("sadfsdf: " + token);
  $.ajax({
    type: "POST",
    url: "/event/get-card",
    data: JSON.stringify({
      _token: token,
      event_id: window.location.pathname.split("/")[2],
    }),
    dataType: "json",
    contentType: "application/json",
    success: function (msg) {
      //console.log("card data: " + msg);
    },
    error: function (xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
    },
  });
}

async function loadOldData2() {
  // Storing response
  const response = await fetch(
    "/event/get-card/" + window.location.pathname.split("/")[2]
  );

  // Storing data in form of JSON
  let res = await response.text();
  var data = JSON.parse(res);
  
  //console.log(res);
  //console.log("card data: " + data.eventType);
  translateData();
  //loadCardIMG(data.eventType);
  loadCardImagesFromDB(data.cardImgs);
  loadBgImagesFromDB(data.bgImgs);
  if (data.result != 0) {
    ////console.log(data.id_card);
    document.getElementById("title1").value = data.title1;
    document.getElementById("title2").value = data.title2;
    document.getElementById("title3").value = data.title3;
    document.getElementById("title4").value = data.title4;
    document.getElementById("input-color-title").value = data.titleColor;
    document.getElementById("titleFont").value = data.titleFont;

    titleColor = data.titleColor;
    titleFont = data.titleFont;
    title1 = data.title1;
    title2 = data.title2;
    title3 = data.title3;
    title4 = data.title4;

    let t1 = document.getElementById("atitle1");
    t1.innerHTML = data.title1;
    t1.style.fontFamily = data.titleFont;
    t1.style.color = data.titleColor;

    let t2 = document.getElementById("atitle2");
    t2.innerHTML = data.title2;
    t2.style.fontFamily = data.titleFont;
    t2.style.color = data.titleColor;

    let t3 = document.getElementById("atitle3");
    t3.innerHTML = data.title3;
    t3.style.fontFamily = data.titleFont;
    t3.style.color = data.titleColor;

    let t4 = document.getElementById("atitle4");
    t4.innerHTML = data.title4;
    t4.style.fontFamily = data.titleFont;
    t4.style.color = data.titleColor;

    if (data.fontColor.indexOf("#") > -1) {
      data.fontColor = data.fontColor;
    } else {
      data.fontColor = "#" + data.fontColor;
    }

    document.getElementById("name1").value = data.name1;
    document.getElementById("name2").value = data.name2;
    document.getElementById("input-color-name").value = data.fontColor;
    document.getElementById("nameFont").value = data.fontFamily;

    fontFamily = data.fontFamily;
    fontColor = data.fontColor;
    name1 = data.name1;
    name2 = data.name2;

    let n1 = document.getElementById("display-name1");
    if(data.isCouple == 1){
      
      if (data.name1.length > 0 && data.name2.length > 0) {
        n1.innerHTML = data.name1 + " & " + data.name2;
      } else if (data.name1.length > 0) {
        n1.innerHTML = data.name1;
      } else if (data.name2.length > 0) {
        n1.innerHTML = data.name2;
      } else {
        n1.innerHTML = "";
      }
    }else{
      if (data.name1.length > 0) {
        n1.innerHTML = data.name1;
      } else {
        n1.innerHTML = "";
      }
    }
    n1.style.fontFamily = data.fontFamily;
    n1.style.color = data.fontColor;

    document.getElementById("cermony").value = data.cermony;
    document.getElementById("input-color-cer").value = data.cermonyColor;
    document.getElementById("cerFont").value = data.cermonyFont;

    cermonyColor = data.cermonyColor;
    cermonyFont = data.cermonyFont;
    cermony = data.cermony;

    let cer = document.getElementById("acermony");
    cer.innerHTML = data.cermony;
    cer.style.fontFamily = data.cermonyFont;
    cer.style.color = data.cermonyColor;

    document.getElementById("txtOther1").value = data.other1;
    document.getElementById("txtOther2").value = data.other2;
    document.getElementById("txtOther3").value = data.other3;
    document.getElementById("input-color-other").value = data.otherColor;
    document.getElementById("otherFont").value = data.otherFont;

    otherColor = data.otherColor;
    otherFont = data.otherFont;
    other1 = data.other1;
    other2 = data.other2;
    other3 = data.other3;

    let o1 = document.getElementById("other1");
    o1.innerHTML = data.other1;
    o1.style.fontFamily = data.otherFont;
    o1.style.color = data.otherColor;

    let o2 = document.getElementById("other2");
    o2.innerHTML = data.other2;
    o2.style.fontFamily = data.otherFont;
    o2.style.color = data.otherColor;

    let o3 = document.getElementById("other3");
    o3.innerHTML = data.other3;
    o3.style.fontFamily = data.otherFont;
    o3.style.color = data.otherColor;

    document.getElementById("cardBG").style.background =
      "url('https://clickadmin.searchmarketingservices.co/eventcards/" + data.cardName + "')";

    //console.log("custome card = " + data.customCard);
    if (data.customCard == 1) {
      document.getElementById("card6").checked = true;
      document.getElementById("card6").value = data.cardName;
      document.getElementById("card6IMG").src =
        "/assets/images/cardAnimation/" + data.cardName;
      document.getElementById("uploadedCard").style.display = "block";
      cardSelectorUpload(data.cardName);
      customCard = 1;
      document.getElementById("cardBG").style.background =
      "url('/assets/images/cardAnimation/" + data.cardName + "')";
    } else {
      /*let c0 = document.getElementById("card0");
      let c1 = document.getElementById("card1");
      let c2 = document.getElementById("card2");
      let c3 = document.getElementById("card3");
      let c4 = document.getElementById("card4");

      if (data.cardName == c0.value) {
        c0.checked = true;
      } else if (data.cardName == c1.value) {
        c1.checked = true;
      } else if (data.cardName == c2.value) {
        c2.checked = true;
      } else if (data.cardName == c3.value) {
        c3.checked = true;
      } else if (data.cardName == c4.value) {
        c4.checked = true;
      }*/


      customCard = 0;
      cardSelector(data.cardName);
      document.getElementById("card" + data.cardName).checked = true;
    }
    

    // let bg1 = document.getElementById("bg1");
    // let bg2 = document.getElementById("bg2");
    // let bg3 = document.getElementById("bg3");
    // let bg4 = document.getElementById("bg4");
    // if (data.bgName == bg1.value) {
    //   bg1.checked = true;
    // } else if (data.bgName == bg2.value) {
    //   bg2.checked = true;
    // } else if (data.bgName == bg3.value) {
    //   bg3.checked = true;
    // } else if (data.bgName == bg4.value) {
    //   bg4.checked = true;
    // }
    backgroundSelecetor(data.bgName);
    document.getElementById(data.bgName).checked = true;

    document.getElementById("cardOut").value = "#" + data.cardColorOut;
    document.getElementById("cardIn").value = "#" + data.cardColorIn;
    cardColorChngOut();
    cardColorChngIn();

    let rsvpData = data.rsvp.split(",");

    rsvpData.forEach((element, key) => {
      if (element == 1) {
        document.getElementById("flexCheckChecked" + (key + 1)).checked = true;
      } else {
        document.getElementById("flexCheckChecked" + (key + 1)).checked = false;
      }
    });

    document.getElementById("msgTitle").value = data.msgTitle;
  }else{
    //console.log("got it here " + data.isCouple);
    if(data.isCouple == 0){
      document.getElementById("display-name1").innerHTML = "Name Here";
      document.getElementById("name1").value = "Name Here";
    }  
  }

  isCouple = data.isCouple;
  //console.log("is couple" +data.isCouple);
  if(data.isCouple == 0){
    document.getElementById('name2').style.display = "none";
    document.getElementById('name2label').style.display = "none";
    
  }
}


function loadCardImagesFromDB(imgData){
  //console.log(imgData);
  let doc = document.getElementById("cardCollection");
  if(imgData.length > 0){
    let tags = "";
    for (let i = 0; i < imgData.length; i++) {
      tags +=
        "<label class='borderCard py-2'><input type='radio' onclick='cardSelector(this.value)' name='cardDesign' value='" +
        imgData[i].img +
        "' id='card" +
        imgData[i].img +
        "'><img src='https://clickadmin.searchmarketingservices.co/eventcards/" +
        imgData[i].img +
        "' alt='Option 1'></label>";
    }
    doc.innerHTML = tags;
    cardSelector(imgData[0].img);
  }else{
    doc.innerHTML = "";
  }
}

function loadBgImagesFromDB(imgData){
  //console.log(imgData);
  let doc = document.getElementById("bgImgData");
  if(imgData.length > 0){
    let tags = "";
    for (let i = 0; i < imgData.length; i++) {
      tags +=
        "<label class='borderPc py-2'>" +
        "<input type='radio' onclick='backgroundSelecetor(this.value)' name='test' value='"+
        imgData[i].img
        +"' id='"+
        imgData[i].img
        +"'>"+
        
          "<img src='https://clickadmin.searchmarketingservices.co/eventcards/"+
          imgData[i].img
          +"' alt='Option 1'>"+
        "</label>";
    }
    doc.innerHTML = tags;
    backgroundSelecetor(imgData[0].img);
  }else{
    doc.innerHTML = "";
  }
}

function loadCardIMG(eventType) {
  //   0=>wedding, 1=>anniversary, 2=>babyShower, 3=>baptisum, 4=>birthday, 5=>corporate
  let count = [5, 3, 3, 3, 3, 3];
  let doc = document.getElementById("cardCollection");
  if (eventType == "WEDDING") {
    let tags = "";
    for (let i = 0; i < count[0]; i++) {
      tags +=
        "<label class='borderCard py-2'><input type='radio' onclick='cardSelector(this.value)' name='cardDesign' value='Card" +
        i +
        ".webp' id='card" +
        i +
        "'><img src='/assets/images/cardAnimation/Card" +
        i +
        ".webp' alt='Option 1'></label>";
    }
    cardSelector("Card0.webp");
    doc.innerHTML = tags;
  } else if (eventType == "ANNIVERSARY") {
    let tags = "";
    for (let i = 0; i < count[1]; i++) {
      tags +=
        "<label class='borderCard py-2'><input type='radio' onclick='cardSelector(this.value)' name='cardDesign' value='ANNIVERSARY" +
        i +
        ".webp' id='card" +
        i +
        "'><img src='/assets/images/cardAnimation/ANNIVERSARY" +
        i +
        ".webp' alt='Option 1'></label>";
    }
    cardSelector("ANNIVERSARY0.webp");
    doc.innerHTML = tags;
  } else if (eventType == "BABY-SHOWER") {
    let tags = "";
    for (let i = 0; i < count[2]; i++) {
      tags +=
        "<label class='borderCard py-2'><input type='radio' onclick='cardSelector(this.value)' name='cardDesign' value='BABY-SHOWER" +
        i +
        ".webp' id='card" +
        i +
        "'><img src='/assets/images/cardAnimation/BABY-SHOWER" +
        i +
        ".webp' alt='Option 1'></label>";
    }
    cardSelector("BABY-SHOWER0.webp");
    doc.innerHTML = tags;
  } else if (eventType == "BAPTISM") {
    let tags = "";
    for (let i = 0; i < count[3]; i++) {
      tags +=
        "<label class='borderCard py-2'><input type='radio' onclick='cardSelector(this.value)' name='cardDesign' value='BAPTISM" +
        i +
        ".webp' id='card" +
        i +
        "'><img src='/assets/images/cardAnimation/BAPTISM" +
        i +
        ".webp' alt='Option 1'></label>";
    }
    cardSelector("BAPTISM0.webp");
    doc.innerHTML = tags;
  } else if (eventType == "BIRTHDAY") {
    let tags = "";
    for (let i = 0; i < count[4]; i++) {
      tags +=
        "<label class='borderCard py-2'><input type='radio' onclick='cardSelector(this.value)' name='cardDesign' value='BIRTHDAY" +
        i +
        ".webp' id='card" +
        i +
        "'><img src='/assets/images/cardAnimation/BIRTHDAY" +
        i +
        ".webp' alt='Option 1'></label>";
    }
    doc.innerHTML = tags;
    cardSelector("BIRTHDAY0.webp");
  } else if (eventType == "CORPORATE") {
    let tags = "";
    for (let i = 0; i < count[5]; i++) {
      tags +=
        "<label class='borderCard py-2'><input type='radio' onclick='cardSelector(this.value)' name='cardDesign' value='CORPORATE" +
        i +
        ".webp' id='card" +
        i +
        "'><img src='/assets/images/cardAnimation/CORPORATE" +
        i +
        ".webp' alt='Option 1'></label>";
    }
    doc.innerHTML = tags;
    cardSelector("CORPORATE0.webp");
  }
}
async function cardUpload() {
  //console.log(token);
  var img = document.getElementById("imgUploder");
  let formData = new FormData();
  formData.append("_token", token);
  formData.append("file", img.files[0]);
  formData.append("event", window.location.pathname.split("/")[2]);
  const res = await fetch("/upload-image", {
    method: "POST",
    body: formData,
  });

  ////console.log(await res.text());
  let data = JSON.parse(await res.text());
  if (data.error) {
    document.getElementById("imgError").innerHTML = "ERROR: " + data.error;
    //console.log("found error:" + data.error);
  } else {
    document.getElementById("imgError").innerHTML = "";
    document.getElementById("card6").checked = true;
    document.getElementById("card6").value = data.imgName;
    document.getElementById("card6IMG").src =
      "/assets/images/cardAnimation/" + data.imgName;
    document.getElementById("uploadedCard").style.display = "block";
    //cardSelector(data.imgName);
    cardSelectorUpload(data.imgName);
    customCard = 1;
    //console.log("card upload active : " + customCard);
    //console.log("found no error");
  }
}

async function translateData() {
  // Storing response
  const response = await fetch(
    "/translate/" + window.location.pathname.split("/")[3]
  );

  // Storing data in form of JSON
  pageData = JSON.parse(await response.text());

  ////console.log("card data: "+pageData['Title 1']);
}

async function printCard() {
  //console.log("asdf");

  //ocument.getElementById("popupBasic").style.display = "block";
  await setTimeout(() => {
    $("#popupBasic").css("display", "block");
    $("#popupBasic").animate({ opacity: "1" });
  }, 0);

  await setTimeout(() => {
    printingJS();
    $("#popupBasic").css("display", "none");
    $("#popupBasic").animate({ opacity: "0" });
  }, 2000);
}
//const { jsPDF } = window.jspdf;
// async function printingJS() {
//   const doc = new jsPDF();

//   await doc.addFont(
//     "/assets/fonts/animationFont/MONTEZ-REGULAR.TTF",
//     "MONTEZ-REGULAR",
//     "normal"
//   );
//   await doc.addFont(
//     "/assets/fonts/animationFont/NIGHT-DEMO.TTF",
//     "NIGHT-DEMO",
//     "normal"
//   );
//   await doc.addFont(
//     "/assets/fonts/animationFont/DANCINGSCRIPT-BOLD.TTF",
//     "DANCINGSCRIPT-BOLD",
//     "normal"
//   );
//   await doc.addFont(
//     "/assets/fonts/animationFont/DANCINGSCRIPT-REGULAR.TTF",
//     "DANCINGSCRIPT-REGULAR",
//     "normal"
//   );
//   await doc.addFont(
//     "/assets/fonts/animationFont/FREESCPT.TTF",
//     "FREESCPT",
//     "normal"
//   );
//   await doc.addFont(
//     "/assets/fonts/animationFont/AGENCYB.TTF",
//     "AGENCYB",
//     "normal"
//   );
//     let cardNamePrint = new Image();
//     cardNamePrint.src = "https://clickadmin.searchmarketingservices.co/eventcards/" + cardName;

//     const corsImageModified = new Image();
//     corsImageModified.crossOrigin = "Anonymous";
//     corsImageModified.src = "https://clickadmin.searchmarketingservices.co/eventcards/" + cardName + "?not-from-cache-please";
    
//   await doc.addImage(
    
//     corsImageModified,
//     "JPEG",
//     0,
//     0,
//     220,
//     300
//   );

//   await doc.setFont(titleFont);
//   await doc.setTextColor(titleColor);
//   await doc.setFontSize(26);
//   await doc.text(title1, 105, 83, null, null, "center");
//   await doc.text(title2, 105, 95, null, null, "center");
//   await doc.text(title3, 105, 107, null, null, "center");
//   await doc.text(title4, 105, 119, null, null, "center");

//   await doc.setFont(fontFamily);
//   await doc.setTextColor(fontColor);
//   await doc.setFontSize(50);
//   if (name1.length > 0 && name2.length > 0) {
//     await doc.text(name1 + " & " + name2, 110, 150, null, null, "center");
//   } else {
//     await doc.text(name1 + name2, 110, 150, null, null, "center");
//   }

//   await doc.setFont(cermonyFont);
//   await doc.setTextColor(cermonyColor);
//   await doc.setFontSize(26);
//   await doc.text(cermony, 105, 180, null, null, "center");

//   await doc.setFont(otherFont);
//   await doc.setTextColor(otherColor);
//   await doc.setFontSize(21);
//   await doc.text(other1, 105, 200, null, null, "center");
//   await doc.text(other2, 105, 210, null, null, "center");
//   await doc.text(other3, 105, 220, null, null, "center");

//   const d = new Date();

//   await doc.save(
//     "card_" + window.location.pathname.split("/")[2] + "_" + d.getMilliseconds()
//   );
// }
