var selectedText;
var interval = null;
var interval1 = null;
var copiedText;
var text;
var textSize = "12px";
var font_number = document.getElementById("font-size");
var textalign = document.getElementById("textalign");
var textalignleft = document.getElementById("textalign-left");
var textalignright = document.getElementById("textalign-right");
var trash = document.getElementById("trash");
var trash2 = document.getElementById("trash2");
var clone = document.getElementById("clone");
var export1 = document.getElementById("export");
var addsticker = document.getElementById("addsticker");
var sidebaraddtext = document.getElementById("sidebaraddtext");
var body1 = document.querySelector("body");
var sideshow = document.getElementsByClassName('sidebar')[0]
var body = document.getElementsByTagName("body")[0];
var topBar = document.getElementsByClassName("topBar")[0];
var sideimg = document.getElementsByClassName("sidebaraddimg")[0];
var sideimgbtn = document.getElementsByClassName("topbtns")[0];
const stickers = [];
var clonedText;
let canv;

window.addEventListener("load",()=>{
  $(document).ready(function () {
    $("body").css("background-color", "#e9e9e9");
    canv = new fabric.Canvas('canvas', {
      backgroundColor: 'white',
      width: 500,
      height: 680,
    
    });
    
    console.log("fabric canvas loaded");
    canv.on({
      'mouse:down': selectedObject,
    });
    getapi();
  })
  
})



function selectedObject(event) {
  canv.renderAll();
  selectedText = event.target;
  console.log('Selected object:', selectedText);
  clicktextshow();
  clickimgshow();
  canv.renderAll();

}

function clicktextshow() {
  try {
    if (typeof selectedText.text === 'string') {
      document.querySelector('.sidebaraddtext').style.display = "inline-block";
      document.querySelector('#sidebarbackgroundaddimg1').style.display = "none";
      document.querySelector('.sidebaraddimg').style.display = "none"
      console.log("show");
    }
  }
  catch {
    document.querySelector('#sidebarbackgroundaddimg1').style.display = "none";
    document.querySelector('.sidebaraddimg').style.display = "none"
    console.log("no text");
    document.querySelector('.sidebaraddtext').style.display = "none";
     
  }
}

function clickimgshow() {
  try {
    if (selectedText._element.className == 'canvas-img') {
      document.querySelector('.sidebaraddtext').style.display = "none"
      document.querySelector('.sidebaraddimg').style.display = "inline-block";
      document.querySelector('#sidebarbackgroundaddimg1').style.display = "none";
    }
  }
  catch {
    document.querySelector('.sidebaraddimg').style.display = "none";
    document.querySelector('#sidebarbackgroundaddimg1').style.display = "none";
    console.log("no text");
  }
}



function sideimg1() {
  document.querySelector('.sidebaraddtext').style.display = "none";
  document.querySelector('#sidebarbackgroundaddimg1').style.display = "none";
  document.querySelector('.sidebaraddimg').style.display = "inline-block";
}


function sidebarbackaddimg() {
  document.querySelector('.sidebaraddtext').style.display = "none";
  document.querySelector('.sidebaraddimg').style.display = "none";
  document.querySelector('#sidebarbackgroundaddimg1').style.display = "inline-block";
  console.log("background add img")
}


trash.addEventListener("click", () => {
  canv.remove(selectedText);
  canv.renderAll();
})

trash2.addEventListener("click", () => {
  canv.remove(selectedText);
  canv.renderAll();
})

textalign.addEventListener("click", () => {
  var center = 'center';
  selectedText.set({ textAlign: center })
  canv.renderAll();
})

textalignleft.addEventListener("click", () => {
  var left = 'left';
  selectedText.set({ textAlign: left })
  canv.renderAll();
})
textalignright.addEventListener("click", () => {
  var right = 'right';
  selectedText.set({ textAlign: right })
  canv.renderAll();
})

function showTxtTool() {
  document.querySelector('.sidebaraddtext').style.display = "inline-block";
  document.querySelector('.sidebaraddimg').style.display = "none";
  document.querySelector('#sidebarbackgroundaddimg1').style.display = "none";
}



function increaseText() {
  var currentFontSize = selectedText.get('fontSize');
  var newFontSize = currentFontSize + 2;
  selectedText.set({ fontSize: newFontSize });
  canv.renderAll();
  console.log("text size increased to " + newFontSize);
  font_number.innerText = newFontSize;
}

function increaseImageSize() {

  var currentScaleX = selectedText.scaleX;
  var currentScaleY = selectedText.scaleY;
  var newScaleX = currentScaleX * 1.2;
  var newScaleY = currentScaleY * 1.2;
  selectedText.set({ scaleX: newScaleX, scaleY: newScaleY });



  canv.renderAll();

  console.log("Image size increased");
}

function decreaseImageSize() {

  var currentScaleX = selectedText.scaleX;
  var currentScaleY = selectedText.scaleY;
  var newScaleX = currentScaleX * 0.8;
  var newScaleY = currentScaleY * 0.8;
  selectedText.set({ scaleX: newScaleX, scaleY: newScaleY });


  canv.renderAll();

  console.log("Image size decreased");
}
function decreaseText() {
  var currentFontSize = selectedText.get('fontSize');
  var newFontSize = currentFontSize - 2;
  selectedText.set({ fontSize: newFontSize });
  canv.renderAll();
  console.log("text size increased to " + newFontSize);
  font_number.innerText = newFontSize;
}


function toggleColorChange() {
  if (interval) {

    clearInterval(interval);
    interval = null;
  } else {
    changeTextColor();
    interval = setInterval(changeTextColor, 100);
  }
}
function stopColorChange() {

  clearInterval(interval);
  interval = null;
}
function changeTextColor() {
  var colorPicker = document.getElementById('colorPicker');
  var newColor = colorPicker.value;
  console.log(newColor);
  canv.renderAll();
  try {
    selectedText.set({ fill: newColor });
    canv.renderAll();
  } catch { console.log(newColor) }
}

function addTxt() {
  text = new fabric.IText('Enter Text', { left: 150, top: 250, fontSize: 20 });
  canv.add(text);

}



const fontSelector = document.getElementById('font-selector');
const font = document.getElementById('font');
fontSelector.addEventListener('click', function fontselect() {
  const selectedFont = this.value;
  font.style.fontFamily = selectedFont;
  selectedText.set({ fontFamily: selectedFont });
  canv.renderAll();
});



clone.addEventListener('click', function cloneTxt() {
  if (selectedText) {
    var clonedText = new fabric.IText(selectedText.text, {
      left: selectedText.left + 20,
      top: selectedText.top + 20,
      fontSize: selectedText.fontSize,
      fill: selectedText.fill,
      fontFamily: selectedText.fontFamily,

    });
    canv.add(clonedText);
    canv.renderAll();
  }
  canv.renderAll();
})

function downloadJSON() {
  const json = JSON.stringify(canv.toJSON());
  console.log(json)
  const blob = new Blob([json], { type: 'application/json' });
  const url = (window.webkitURL || window.URL).createObjectURL(blob);
  const a = document.createElement('a');
  a.href = url;
  a.download = 'canvas.json';
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
  (window.webkitURL || window.URL).revokeObjectURL(url);
}

function downloadImage() {
  const imgData = canv.toDataURL({ format: 'png', quality: 1 });
  const link = document.createElement('a');
  link.href = imgData;
  link.download = 'canvas.png';
  link.click();
}

function downloadSVG() {
  const svgData = canv.toSVG();
  const blob = new Blob([svgData], { type: 'image/svg+xml' });
  const url = URL.createObjectURL(blob);
  const a = document.createElement('a');
  a.href = url;
  a.download = 'canvas.svg';
  a.click();
  URL.revokeObjectURL(url);
}

export1.addEventListener('click', async () => {
  try {
    const pdfDoc = await PDFLib.PDFDocument.create();
    const page = pdfDoc.addPage([612, 792]);

    const imgData = canv.toDataURL('image/png');

    const image = await pdfDoc.embedPng(imgData);
    const { width, height } = image.scale(0.5);
    page.drawImage(image, {
      x: 100,
      y: 300,
      width,
      height,
      opacity: 1,
    });

    const pdfBytes = await pdfDoc.save();
    const pdfBlob = new Blob([pdfBytes], {
      type: 'application/pdf'
    });
    const downloadLink = document.createElement('a');
    if (typeof window.URL.createObjectURL === 'undefined') {
      if (typeof webkitURL !== 'undefined') {
        window.URL = webkitURL;
      } else {
        throw new Error('Your browser does not support downloading files.');
      }
    }
    downloadLink.href = window.URL.createObjectURL(pdfBlob);
    downloadLink.download = 'output.pdf';
    downloadLink.click();
  } catch (error) {
    console.error('Error:', error);
  }
});






var imageInput = document.getElementById("imageInput");

imageInput.addEventListener("change", function (e) {
  var files = e.target.files;

  if (files) {
    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      var reader = new FileReader();
      reader.onload = function (event) {
        var img = new Image();
        img.src = event.target.result;
        img.onload = function () {
          const desiredWidth = 200;
          const desiredHeight = 200;
          img.scaleX = desiredWidth / img.width;
          img.scaleY = desiredHeight / img.height;
          var fabricImage = new fabric.Image(img, {
            left: 100,
            top: 100,
            width: img.width,
            height: img.height,
            scaleX: img.scaleX,
            scaleY: img.scaleY,
          });
          addImageToCanvas(fabricImage);
        };
      };
      reader.readAsDataURL(file);
    }
  }
});

function addImageToCanvas(fabricImage) {

  canv.add(fabricImage);
}

function generateCanvasImageFromJSON(jsonData) {
  const canvasData = JSON.parse(jsonData);
  const canvas = document.createElement('canvas');
  const ctx = canvas.getContext('2d');
  canvas.width = canvasData.width;
  canvas.height = canvasData.height;
  const img = new Image();
  img.src = canvasData.imageDataUrl;
  img.onload = function () {
    ctx.drawImage(img, 0, 0);
    const canvasImageDataUrl = canvas.toDataURL('image/png');
    const imgElement = document.createElement('img');
    imgElement.src = canvasImageDataUrl;
    document.body.appendChild(imgElement);
  };
}

function handleJSONImport() {
  
  var id = window.location.pathname.split("/")[2];

  $.ajax({
    type: "GET",
    url: "/get-json?id=" + id,
    success: function (response) {
      if (response) {
        console.log('Data Received:', response);
      } else {
        console.log('Empty Data');
      }
    },
    error: function (xhr, status, error) {
      console.error('Error:', error);
    }
  });
  console.log("test")
  // if (file) {
    //   const reader = new FileReader();
    //   reader.onload = function (e) {
      //     try {
        //       const jsonData = JSON.parse(e.target.result);
        //       canv.clear();
        //       canv.loadFromJSON(jsonData, () => {
          //         canv.renderAll();
          //       });
          //     } catch (error) {
            //       console.error('Error loading JSON:', error);
            //     }
            //   };
            //   reader.readAsText(file);
            // }
            var id = window.location.pathname.split("/")[2];      
}


function handleSVGImport(event) {
  const fileInput1 = event.target;
  const file1 = fileInput1.files[0];
  if (file1) {
    const reader = new FileReader();
    reader.onload = function (e) {
      try {
        const svgData = e.target.result;
        canv.clear();
        console.log(svgData);
        fabric.loadSVGFromString(svgData, (objects, options) => {
          const group = new fabric.Group(objects, options);
          canv.add(group);
          canv.renderAll();
        });
      } catch (error) {
        console.error('Error loading SVG:', error);
      }
    };

    reader.readAsText(file1);
  }
}


addsticker.addEventListener("click", () => {
  (sideshow.style.display == "none") ? sideshow.style.display = "inline-block" : sideshow.style.display = "none";
}
)
document.getElementById('imageInput1').addEventListener('change', function (e) {
  var fileInput = e.target;
  var file = fileInput.files[0];
  if (file) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var imgURL = e.target.result;


      fabric.Image.fromURL(imgURL, function (img) {
        canv.setBackgroundImage(img, canv.renderAll.bind(canv), {
          scaleX: canv.width / img.width,
          scaleY: canv.height / img.height
        });
      });
    };

    reader.readAsDataURL(file);
  }
});





var API_KEY = '39819870-b0f877f9b101769c1f36d42d9';
var resultsDiv = document.getElementById("stickerList");

document.getElementById("btnSearch").addEventListener("click", ev => {
  ev.preventDefault();
  var searchTerm = document.getElementById("searchInput").value;
  var URL = `https://pixabay.com/api/?key=39819870-b0f877f9b101769c1f36d42d9&q= ${encodeURIComponent(searchTerm)}&safeSearch=true`;
  var spinner = `<div class="spinner-border text-primary" role="status">
  <span class="visually-hidden">Loading...</span>
  </div>`;
  document.getElementById("btnSearch").innerHTML = spinner;
  fetch(URL)
    .then(response => response.json())
    .then(data => {
      var html = "<br>";
      if (data.totalHits > 0) {
        data.hits.forEach(function (hit, i) {
          html += `<img src="${hit.previewURL}" alt="${hit.tags}" width="150px" height="150px">`;
          stickers.push({ src: hit.previewURL });
        });
        resultsDiv.innerHTML = html;
      } else {
        resultsDiv.innerHTML = 'No hits';
      }
      document.getElementById("btnSearch").innerText = `Search`;
    })
    .catch(error => {
      console.error("Error fetching data:", error);
    });
});
function show() {

  var API_KEY = '39819870-b0f877f9b101769c1f36d42d9';

  URL = `https://pixabay.com/api/?key=39819870-b0f877f9b101769c1f36d42d9&q=cake&safeSearch=true`;
  var spinner = `<div class="spinner-border text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
    </div>`;
  document.getElementById("btnSearch").innerHTML = spinner;
  fetch(URL)
    .then(response => response.json())
    .then(data => {
      var html = "<br>";
      if (data.totalHits > 0) {
        data.hits.forEach(function (hit, i) {
          html += `<img src="${hit.previewURL}" alt="${hit.tags}" width="150px" height="150px">`;
          stickers.push({ src: hit.previewURL });
        });
        resultsDiv.innerHTML = html;
      } else {
        resultsDiv.innerHTML = 'No hits';
      }
      document.getElementById("btnSearch").innerText = `Search`;
    })
    .catch(error => {
      console.error("Error fetching data:", error);
    });
};
show();
resultsDiv.addEventListener('click', (event) => {
  if (event.target.tagName === 'IMG') {
    const clickedImgSrc = event.target.src;

    const clickedSticker = stickers.find((sticker) => sticker.src === clickedImgSrc);

    console.log(clickedImgSrc);
    if (clickedSticker) {
      addStickerToCanvas(clickedSticker);
    }
  }
});

function addStickerToCanvas(sticker) {
  fabric.Image.fromURL(sticker.src, (img) => {
    const desiredWidth = 100;
    const desiredHeight = 100;
    img.scaleToWidth(desiredWidth);
    img.scaleToHeight(desiredHeight);
    img.set({
      left: 100,
      top: 100,
    });
    canv.add(img);
  });
}

let token = "";
async function getapi() {
  // Storing response
  const response = await fetch("/get-csrf-token");

  // Storing data in form of JSON
  var data = await response.text();

  token = data;
}


// Save Button 
var save1 = document.getElementById("save");
save1.addEventListener('click', function () {
  // const blob = new Blob([canv.toJSON()], { type: 'application/json' });
  // // console.log(canv.toJSON());
  // console.log(blob);
  // Create a FormData object and append the Blob data

  const json = JSON.stringify(canv.toJSON());
  console.log(json)
  const blob = new Blob([json], { type: 'application/json' });
  console.log(blob);

  const formData = new FormData();
  var filename = window.location.pathname.split("/")[2] + ".json";
  
  formData.append('json_blob', [json]);
  formData.append('event_id', window.location.pathname.split("/")[2]);
  formData.append('_token',token);
  // Make an HTTP POST request to a Laravel route
  fetch('/save-blob', {
    method: 'POST',
    body: formData,
  })
  .then(response => {
    if (response.ok) {
      console.log('Blob data saved on the server.');
    } else {
      console.error('Failed to save Blob data on the server.');
    }
  })
  .catch(error => {
    console.error('Error:', error);
  });
});







const stickers1 = [
  "https://plus.unsplash.com/premium_photo-1690481529194-6087914e096e?auto=format&fit=crop&q=80&w=1887&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
  "https://images.unsplash.com/photo-1698840473350-f2b13fb9c309?auto=format&fit=crop&q=60&w=500&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwzfHx8ZW58MHx8fHx8fA",
  "https://images.unsplash.com/photo-1518173946687-a4c8892bbd9f?auto=format&fit=crop&q=60&w=500&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fG5hdHVyZXxlbnwwfHwwfHww",
  "https://images.unsplash.com/photo-1501854140801-50d01698950b?auto=format&fit=crop&q=60&w=500&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8bmF0dXJlfGVufDB8fDB8fHww",
  "https://images.unsplash.com/photo-1433086966358-54859d0ed716?auto=format&fit=crop&q=60&w=500&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8bmF0dXJlfGVufDB8fDB8fHww",
  "https://plus.unsplash.com/premium_photo-1675827055620-24d540e0892a?auto=format&fit=crop&q=60&w=500&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8bmF0dXJlfGVufDB8fDB8fHww",
  "https://plus.unsplash.com/premium_photo-1675827055620-24d540e0892a?auto=format&fit=crop&q=60&w=500&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8bmF0dXJlfGVufDB8fDB8fHww",
  "https://images.unsplash.com/photo-1518173946687-a4c8892bbd9f?auto=format&fit=crop&q=60&w=500&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fG5hdHVyZXxlbnwwfHwwfHww"
];

var imgDiv = document.getElementById('imgDiv');

for (let i = 0; i < stickers1.length; i++) {
  const colDiv = document.createElement('div');
  colDiv.className = 'col-6 mb-3';

  const img = document.createElement('img');
  img.src = stickers1[i];
  img.setAttribute('height', '200px');
  img.setAttribute('width', '200px');
  img.setAttribute('id', `img_${i}`);

  img.addEventListener('click', (event) => {
    const clickedImgSrc = event.target.src;
    const clickedSticker = stickers1.find((sticker) => sticker === clickedImgSrc);
    if (clickedSticker) {
      addStickerToCanvas1(clickedSticker);
    }
  });

  colDiv.appendChild(img);
  imgDiv.appendChild(colDiv);
}

function addStickerToCanvas1(sticker) {
  fabric.Image.fromURL(sticker, (img) => {
    img.set({
      scaleX: canv.width / img.width,
      scaleY: canv.height / img.height,
    });
    canv.setBackgroundImage(img, canv.renderAll.bind(canv));
  });
}

