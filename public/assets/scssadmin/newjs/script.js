// define all UI variable
const navToggler = document.querySelector('.nav-toggler');
const navMenu = document.querySelector('.site-navbar ul');
const navLinks = document.querySelectorAll('.site-navbar a');
 
// load all event listners
allEventListners();
 
// functions of all event listners
function allEventListners() {
  // toggler icon click event
  navToggler.addEventListener('click', togglerClick);
  // nav links click event
  navLinks.forEach( elem => elem.addEventListener('click', navLinkClick));
}
 
// togglerClick function
function togglerClick() {
  navToggler.classList.toggle('toggler-open');
  navMenu.classList.toggle('open');
}
 
// navLinkClick function
function navLinkClick() {
  if(navMenu.classList.contains('open')) {
    navToggler.click();
  }
}

// accordion starts
const accordionItemHeaders = document.querySelectorAll(
    ".accordion-item-header"
  );
  
  accordionItemHeaders.forEach((accordionItemHeader) => {
    accordionItemHeader.addEventListener("click", (event) => {
      // Uncomment in case you only want to allow for the display of only one collapsed item at a time!
  
      const currentlyActiveAccordionItemHeader = document.querySelector(
        ".accordion-item-header.active"
      );
      if (
        currentlyActiveAccordionItemHeader &&
        currentlyActiveAccordionItemHeader !== accordionItemHeader
      ) {
        currentlyActiveAccordionItemHeader.classList.toggle("active");
        currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
      }
      accordionItemHeader.classList.toggle("active");
      const accordionItemBody = accordionItemHeader.nextElementSibling;
      if (accordionItemHeader.classList.contains("active")) {
        accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
      } else {
        accordionItemBody.style.maxHeight = 0;
      }
    });
  });

// accordion ends here


const readMoreBtn1 = document.querySelector(".read-more-btn1");
const text1 = document.querySelector(".text1");
readMoreBtn1.addEventListener("click", (e) => {
    text1.classList.toggle("show-more");
    if (readMoreBtn1.innerText === "Read More...") {
        readMoreBtn1.innerText = "Read Less";
    } else {
        readMoreBtn1.innerText = "Read More...";
    }
});


const readMoreBtn2 = document.querySelector(".read-more-btn2");
const text2 = document.querySelector(".text2");
readMoreBtn2.addEventListener("click", (e) => {
    text2.classList.toggle("show-more");
    if (readMoreBtn2.innerText === "Read More...") {
        readMoreBtn2.innerText = "Read Less";
    } else {
        readMoreBtn2.innerText = "Read More...";
    }
});

const readMoreBtn3 = document.querySelector(".read-more-btn3");
const text3 = document.querySelector(".text3");
readMoreBtn3.addEventListener("click", (e) => {
    text3.classList.toggle("show-more");
    if (readMoreBtn3.innerText === "Read More...") {
        readMoreBtn3.innerText = "Read Less";
    } else {
        readMoreBtn3.innerText = "Read More...";
    }
});

const readMoreBtn4 = document.querySelector(".read-more-btn4");
const text4 = document.querySelector(".text4");
readMoreBtn4.addEventListener("click", (e) => {
    text4.classList.toggle("show-more");
    if (readMoreBtn4.innerText === "Read More...") {
        readMoreBtn4.innerText = "Read Less";
    } else {
        readMoreBtn4.innerText = "Read More...";
    }
});

const readMoreBtn5 = document.querySelector(".read-more-btn5");
const text5 = document.querySelector(".text5");
readMoreBtn5.addEventListener("click", (e) => {
    text5.classList.toggle("show-more");
    if (readMoreBtn5.innerText === "Read More...") {
        readMoreBtn5.innerText = "Read Less";
    } else {
        readMoreBtn5.innerText = "Read More...";
    }
});

const readMoreBtn6 = document.querySelector(".read-more-btn6");
const text6 = document.querySelector(".text6");
readMoreBtn6.addEventListener("click", (e) => {
    text6.classList.toggle("show-more");
    if (readMoreBtn6.innerText === "Read More...") {
        readMoreBtn6.innerText = "Read Less";
    } else {
        readMoreBtn6.innerText = "Read More...";
    }
});

const readMoreBtn7 = document.querySelector(".read-more-btn7");
const text7 = document.querySelector(".text7");
readMoreBtn7.addEventListener("click", (e) => {
    text7.classList.toggle("show-more");
    if (readMoreBtn7.innerText === "Read More...") {
        readMoreBtn7.innerText = "Read Less";
    } else {
        readMoreBtn7.innerText = "Read More...";
    }
});

const readMoreBtn8 = document.querySelector(".read-more-btn8");
const text8 = document.querySelector(".text8");
readMoreBtn8.addEventListener("click", (e) => {
    text8.classList.toggle("show-more");
    if (readMoreBtn8.innerText === "Read More...") {
        readMoreBtn8.innerText = "Read Less";
    } else {
        readMoreBtn8.innerText = "Read More...";
    }
});

const readMoreBtn9 = document.querySelector(".read-more-btn9");
const text9 = document.querySelector(".text9");
readMoreBtn9.addEventListener("click", (e) => {
    text9.classList.toggle("show-more");
    if (readMoreBtn9.innerText === "Read More...") {
        readMoreBtn9.innerText = "Read Less";
    } else {
        readMoreBtn9.innerText = "Read More...";
    }
});


const readMoreBtn10 = document.querySelector(".read-more-btn10");
const text10 = document.querySelector(".text10");
readMoreBtn10.addEventListener("click", (e) => {
    text10.classList.toggle("show-more");
    if (readMoreBtn10.innerText === "Read More...") {
        readMoreBtn10.innerText = "Read Less";
    } else {
        readMoreBtn10.innerText = "Read More...";
    }
});

const readMoreBtn11 = document.querySelector(".read-more-btn11");
const text11 = document.querySelector(".text11");
readMoreBtn11.addEventListener("click", (e) => {
    text11.classList.toggle("show-more");
    if (readMoreBtn11.innerText === "Read More...") {
        readMoreBtn11.innerText = "Read Less";
    } else {
        readMoreBtn11.innerText = "Read More...";
    }
});



    function scrollToContent2() {
    var content = document.getElementById("content2");
    content.scrollIntoView({ behavior: 'smooth' });
  }
  function scrollToContent3() {
    var content = document.getElementById("content3");
    content.scrollIntoView({ behavior: 'smooth' });
  }
  function scrollToContent4() {
    var content = document.getElementById("content4");
    content.scrollIntoView({ behavior: 'smooth' });
  }
  function scrollToContent5() {
    var content = document.getElementById("content5");
    content.scrollIntoView({ behavior: 'smooth' });
  }
  function scrollToContent6() {
    var content = document.getElementById("content6");
    content.scrollIntoView({ behavior: 'smooth' });
  }
  function scrollToContent7() {
    var content = document.getElementById("content7");
    content.scrollIntoView({ behavior: 'smooth' });
  }
  function scrollToContent8() {
    var content = document.getElementById("content8");
    content.scrollIntoView({ behavior: 'smooth' });
  }
  function scrollToContent9() {
    var content = document.getElementById("content9");
    content.scrollIntoView({ behavior: 'smooth' });
  };
  function scrollToContent10() {
    var content = document.getElementById("content10");
    content.scrollIntoView({ behavior: 'smooth' });
  };