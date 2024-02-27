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
var fontselector2 = document.getElementById("font-selector2");
var body1 = document.querySelector("body");
var colorpicker = document.querySelector("color-picker");
var sideshow = document.getElementsByClassName("sidebar")[0];
var body = document.getElementsByTagName("body")[0];
var topBar = document.getElementsByClassName("topBar")[0];
var sideimg = document.getElementsByClassName("sidebaraddimg")[0];
var sideimgbtn = document.getElementsByClassName("topbtns")[0];
var can = document.getElementById("canv");
const stickers = [];
var clonedText;
let canv;
let moveHistory = [];
let currentIndex = -1;
window.addEventListener("load", () => {
  $(document).ready(function () {
    $("body").css("background-color", "#e9e9e9");
    canv = new fabric.Canvas("canvas", {
      backgroundColor: "white",
      width: 450,
      height: 680,
      preserveObjectStacking: true,
    });

    canv.on({
      "mouse:down": selectedObject,
    });
    getapi();
    handleJSONImport();
    loadOldData2();
  });
});

function selectedObject(event) {
  //canv.renderAll();
  selectedText = event.target;
  clicktextshow();
  clickimgshow();
  //canv.renderAll();
}

function applyBold() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const isBold = !obj.get("fontWeight") || obj.get("fontWeight") === "bold"; // Toggle bold state
    obj.set({ fontWeight: isBold ? "normal" : "bold" });
    canv.renderAll();
    addToHistory(moveHistory);
  }
}

// Function to apply italic text effect
function applyItalic() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const isItalic = !obj.get("fontStyle") || obj.get("fontStyle") === "italic"; // Toggle italic state
    obj.set({ fontStyle: isItalic ? "normal" : "italic" });
    canv.renderAll();
    addToHistory(moveHistory);
  }
}

// Function to apply underline text effect
function applyUnderline() {

  const obj = canv.getActiveObject();

  if (obj && obj.type === "textbox") {

    if (obj.set("textDecoration" == "underline")) {
      obj.set("textDecoration", "none");
    } else {
      obj.set("textDecoration", "underline");
    }

    canv.renderAll();
    addToHistory();
  }
}

// Function to apply shadow text effect
function applyShadow() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const hasShadow = !obj.get("shadow") || obj.get("shadow") === null; // Toggle shadow state
    obj.set({ shadow: hasShadow ? "5px 5px 5px rgba(0,0,0,0.5)" : null });
    canv.renderAll();
    addToHistory(moveHistory);
  }
}
fontselector2.addEventListener("click", function fontselect2() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const font = this.value;
    obj.set({ fontFamily: font });
    canv.renderAll();
    addToHistory(moveHistory);
  }
});

// Function to apply letter spacing text effect
function applyLetterSpacing() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const letterSpacing = obj.get("charSpacing") || 0;
    const newLetterSpacing = letterSpacing === 5 ? 0 : letterSpacing + 5; // Increment letter spacing
    obj.set({ charSpacing: newLetterSpacing });
    canv.renderAll();
    addToHistory(moveHistory);
  }
}

// Function to apply line height text effect
function applyLineHeight() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const lineHeight = obj.get("lineHeight") || 1;
    const newLineHeight = lineHeight === 1.5 ? 1 : lineHeight + 0.5; // Increment line height
    obj.set({ lineHeight: newLineHeight });
    canv.renderAll();
    addToHistory(moveHistory);
  }
}

// Function to apply border text effect
function applyBorder() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const hasBorder = !obj.get("stroke") || obj.get("stroke") === null; // Toggle border state
    obj.set({
      stroke: hasBorder ? "#000000" : null,
      strokeWidth: hasBorder ? 1 : 0,
    });
    canv.renderAll();
    addToHistory(moveHistory);
  }
}

// Function to apply text alignment text effect
function applyTextAlignment() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentAlign = obj.get("textAlign") || "left";
    const newAlign =
      currentAlign === "left"
        ? "center"
        : currentAlign === "center"
          ? "right"
          : "left";
    obj.set({ textAlign: newAlign });
    canv.renderAll();
    addToHistory(moveHistory);
  }
}

// Function to apply text rotation text effect
function applyTextRotation() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentRotation = obj.get("angle") || 0;
    const newRotation = currentRotation === 45 ? 0 : 45; // Toggle between 0 and 45 degrees
    obj.set({ angle: newRotation });
    canv.renderAll();
    addToHistory(moveHistory);
  }
}

// Function to apply color gradient text effect
function applyColorGradient() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
  }
}

// Function to apply text flip text effect
function applyTextFlip() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const isFlipped = !obj.get("flipX"); // Toggle flip state
    obj.set({ flipX: isFlipped });
    canv.renderAll();
    addToHistory(moveHistory);
  }
}

// Function to apply text transform text effect
function applyTextTransform() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentTransform = obj.get("textTransform") || ""; // Get current transform
    const newTransform =
      currentTransform === "uppercase" ? "lowercase" : "uppercase"; // Toggle transform state
    obj.set({ textTransform: newTransform });
    canv.renderAll();
    addToHistory(moveHistory);
  }
}

// Function to apply text opacity text effect
function applyTextOpacity() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentOpacity = obj.get("opacity") || 1;
    const newOpacity = currentOpacity === 0.5 ? 1 : 0.5; // Toggle opacity state
    obj.set({ opacity: newOpacity });
    canv.renderAll();
    addToHistory(moveHistory);
  }
}

// Function to apply text effects presets text effect
function applyTextEffectsPresets() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
  }
}

function applyCustomFonts() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
  }
}

function applyHighlightColor() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
  }
}

function applyTextEffectsAnimations() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
  }
}

document
  .getElementById("uploadImage2")
  .addEventListener("change", function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function (e) {
      const imgObj = new Image();
      imgObj.src = e.target.result;
      imgObj.onload = function () {
        const image = new fabric.Image(imgObj);
        if (image.width > canv.width || image.height > canv.height) {
          const scaleFactor = Math.min(
            canv.width / image.width,
            canv.height / image.height
          );
          image.scale(scaleFactor);
        }

        canv.add(image);
        addToHistory();
      };
    };
    reader.readAsDataURL(file);
  });

document
  .getElementById("uploadImage")
  .addEventListener("change", function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function (e) {
      const imgObj = new Image();
      imgObj.src = e.target.result;
      imgObj.onload = function () {
        const image = new fabric.Image(imgObj);
        // Adjust image size to fit the canvas if it's larger
        if (image.width > canv.width || image.height > canv.height) {
          const scaleFactor = Math.min(
            canv.width / image.width,
            canv.height / image.height
          );
          image.scale(scaleFactor);
        }

        canv.add(image);
        addToHistory();
      };
    };
    reader.readAsDataURL(file);
  });

document.getElementById("deleteBtn").addEventListener("click", function () {
  const obj = canv.getActiveObject();
  if (obj) {
    canv.remove(obj);
    addToHistory();
  }
});

document.querySelector(".deleteBtn2").addEventListener("click", function () {
  const obj = canv.getActiveObject();
  if (obj) {
    canv.remove(obj);
    addToHistory();
  }
});

function moveForward() {
  canv.renderAll();

  const obj = canv.getActiveObject();
  if (obj) {
    canv.bringForward(obj);
    addToHistory();
    canv.renderAll();
  }
}

function moveBackword() {
  canv.renderAll();
  const obj = canv.getActiveObject();
  if (obj) {
    if (canv._currentTransform) {
      // If the canvas is in an editing mode (transforming an object),
      // cancel the editing mode before sending the object backward
      canv._currentTransform.target.setCoords();
    }

    canv.sendBackwards(obj);
    addToHistory();
    canv.renderAll();
  }
}
// Undo
document.getElementById("undoBtn").addEventListener("click", function () {
  if (currentIndex > 0) {
    currentIndex--;
    canv.loadFromJSON(moveHistory[currentIndex], function () {
      canv.renderAll();
    });
  }
});

// Redo
document.getElementById("redoBtn").addEventListener("click", function () {
  if (currentIndex < moveHistory.length - 1) {
    currentIndex++;
    canv.loadFromJSON(moveHistory[currentIndex], function () {
      canv.renderAll();
    });
  }
});
function giveRecordOfCard() {
  let record = [];
  for (let i = 0; i < canv._objects.length; i++) {
    if (
      typeof canv._objects[i] === "object" &&
      typeof canv._objects[i].toObject === "function"
    )
      record.push(canv._objects[i].toObject());
    else {
      continue;
    }
  }
  return JSON.stringify(record);
}

function boldBtn() {
  applyBold();
}

function italicBtn() {
  applyItalic();
}

function underlineBtn() {
  applyUnderline();
}

function shadowBtn() {
  applyShadow();
}

function letterSpacingBtn() {
  applyLetterSpacing();
}

function lineHeightBtn() {
  applyLineHeight();
}

function borderBtn() {
  applyBorder();
}

function textAlignmentBtn() {
  applyTextAlignment();
}

function textRotationBtn() {
  applyTextRotation();
}

function colorGradientBtn() {
  applyColorGradient();
}

function textFlipBtn() {
  applyTextFlip();
}

function textTransformBtn() {
  applyTextTransform();
}

function textOpacityBtn() {
  applyTextOpacity();
}

function textEffectsPresetsBtn() {
  applyTextEffectsPresets();
}

function customFontsBtn() {
  applyCustomFonts();
}

function highlightColorBtn() {
  applyHighlightColor();
}

function textEffectsAnimationsBtn() {
  applyTextEffectsAnimations();
}

// ... (add more event listeners for other text effects)

document.getElementById("opacityRange").addEventListener("input", function () {
  const obj = canv.getActiveObject();
  if (obj) {
    obj.set({ opacity: parseFloat(this.value) / 100 });
    canv.renderAll();
    addToHistory(moveHistory);
  }
});
document.getElementById("opacityRange2").addEventListener("input", function () {
  const obj = canv.getActiveObject();
  if (obj) {
    obj.set({ opacity: parseFloat(this.value) / 100 });
    canv.renderAll();
    addToHistory(moveHistory);
  }
});

function addText() {
  const text = document.getElementById("textInput").value;
  const font = document.querySelector(".fontSelector1").value;
  const textbox = new fabric.Textbox(text, {
    left: 100,
    top: 100,
    width: 200,
    fontFamily: font,
  });

  canv.add(textbox);
  addToHistory(moveHistory);
}

canv.setBackgroundColor({ source: "#ffffff" }, function () {
  canv.renderAll();
});

// document.getElementById('uploadImage').addEventListener('change', function (event) {
//   const file = event.target.files[0];
//   const reader = new FileReader();
//   reader.onload = function (e) {
//     const imgObj = new Image();
//     imgObj.src = e.target.result;
//     imgObj.onload = function () {
//       const image = new fabric.Image(imgObj);
//       // Adjust image size to fit the canvas if it's larger
//       if (image.width > canv.width || image.height > canv.height) {
//         const scaleFactor = Math.min(canv.width / image.width, canv.height / image.height);
//         image.scale(scaleFactor);
//       }

//       canv.add(image);
//       addToHistory(moveHistory);
//     };
//   };
//   reader.readAsDataURL(file);
// });

// Upload sticker
document
  .getElementById("uploadSticker")
  .addEventListener("change", function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function (e) {
      const imgObj = new Image();
      imgObj.src = e.target.result;
      imgObj.onload = function () {
        const sticker = new fabric.Image(imgObj);

        // Adjust sticker size to fit the canvas if it's larger
        if (sticker.width > canv.width || sticker.height > canv.height) {
          const scaleFactor = Math.min(
            canv.width / sticker.width,
            canv.height / sticker.height
          );
          sticker.scale(scaleFactor);
        }

        canv.add(sticker);
        addToHistory(moveHistory);
      };
    };
    reader.readAsDataURL(file);
  });

// Undo
document.getElementById("undoBtn").addEventListener("click", function () {
  if (currentIndex > 0) {
    currentIndex--;
    canv.loadFromJSON(moveHistory[currentIndex], function () {
      canv.renderAll();
    });
  }
});

// Redo
document.getElementById("redoBtn").addEventListener("click", function () {
  if (currentIndex < moveHistory.length - 1) {
    currentIndex++;
    canv.loadFromJSON(moveHistory[currentIndex], function () {
      canv.renderAll();
    });
  }
});

document.querySelector(".deleteBtn").addEventListener("click", function () {
  const obj = canv.getActiveObject();
  if (obj) {
    canv.remove(obj);
    addToHistory(moveHistory);
  }
});

document.querySelector(".deleteBtn1").addEventListener("click", function () {
  const obj = canv.getActiveObject();
  if (obj) {
    canv.remove(obj);
    addToHistory(moveHistory);
  }
});
document.querySelector(".deleteBtn2").addEventListener("click", function () {
  const obj = canv.getActiveObject();
  if (obj) {
    canv.remove(obj);
    addToHistory(moveHistory);
  }
});
document.querySelector(".deleteBtn3").addEventListener("click", function () {
  const obj = canv.getActiveObject();
  if (obj) {
    canv.remove(obj);
    addToHistory(moveHistory);
  }
});

document.addEventListener("keydown", function (event) {
  if (event.code === "Delete" || event.code === "Backspace") {
    const obj = canv.getActiveObject();
    if (obj) {
      canv.remove(obj);
      addToHistory(moveHistory);
    }
  }
});

document.getElementById("canvasColor").addEventListener("input", function () {
  const color = document.getElementById("canvasColor").value;
  canv.setBackgroundColor(color, function () {
    canv.renderAll();
    addToHistory(moveHistory);
  });
});

function chnageBGColor() {
  const color = document.getElementById("canvasColor").value;
  canv.setBackgroundColor(color, function () {
    canv.renderAll();
    addToHistory(moveHistory);
  });
}

document.getElementById("fontSelector").addEventListener("change", function () {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    obj.set({ fontFamily: this.value });
    canv.renderAll();
    addToHistory(moveHistory);
  }
});

document.getElementById("textColor").addEventListener("input", function () {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    obj.set({ fill: this.value });
    canv.renderAll();
    addToHistory(moveHistory);
  }
});

document.getElementById("fontSize").addEventListener("input", function () {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    obj.set({ fontSize: parseInt(this.value, 10) });
    canv.renderAll();
    addToHistory(moveHistory);
  }
});

document.getElementById("saveBtn").addEventListener("click", function () {
  alert("Work has been saved!");
});

document.getElementById("downloadBtn").addEventListener("click", function () {
  const dataUrl = canv.toDataURL({
    format: "png",
    multiplier: 2, // Increase multiplier for higher resolution
  });
  const link = document.createElement("a");
  link.href = dataUrl;
  link.download = "canvas_image.png";
  link.click();
});

canv.on("selection:created", function (options) {
  updateControls(options.target);
});

canv.on("selection:updated", function (options) {
  updateControls(options.target);
});

function updateControls(target) {
  if (target && target.type === "textbox") {
    document.getElementById("textInput").value = target.text;
    document.getElementById("textColor").value = target.fill;
    document.getElementById("fontSize").value = target.fontSize;
    document.getElementById("fontSelector").value = target.fontFamily;
  }
}

function clicktextshow() {
  try {
    if (typeof selectedText.text === "string") {
      document.querySelector(".sidebaraddtext").style.display = "inline-block";
      document.querySelector("#sidebarbackgroundaddimg1").style.display =
        "none";
      document.querySelector(".sidebaraddimg").style.display = "none";
    }
  } catch {
    document.querySelector("#sidebarbackgroundaddimg1").style.display = "none";
    document.querySelector(".sidebaraddimg").style.display = "none";
    document.querySelector(".sidebaraddtext").style.display = "none";
  }
}

function clickimgshow() {
  try {
    if (selectedText._element.className == "canvas-img") {
      document.querySelector(".sidebaraddtext").style.display = "none";
      document.querySelector(".sidebaraddimg").style.display = "inline-block";
      document.querySelector("#sidebarbackgroundaddimg1").style.display =
        "none";
    }
  } catch {
    document.querySelector(".sidebaraddimg").style.display = "none";
    document.querySelector("#sidebarbackgroundaddimg1").style.display = "none";
  }
}

function sideimg1() {
  document.querySelector(".sidebaraddtext").style.display = "none";
  document.querySelector("#sidebarbackgroundaddimg1").style.display = "none";
  document.querySelector(".sidebaraddimg").style.display = "inline-block";
}

function sidebarbackaddimg() {
  document.querySelector(".sidebaraddtext").style.display = "none";
  document.querySelector(".sidebaraddimg").style.display = "none";
  document.querySelector("#sidebarbackgroundaddimg1").style.display =
    "inline-block";
}

trash.addEventListener("click", () => {
  canv.remove(selectedText);
  canv.renderAll();
});

function deleteSelected() {
  const obj = canv.getActiveObject();
  canv.remove(obj);
  canv.renderAll();
}

trash2.addEventListener("click", () => {
  canv.remove(selectedText);
  canv.renderAll();
});

textalign.addEventListener("click", () => {
  var center = "center";
  selectedText.set({ textAlign: center });
  canv.renderAll();
});

textalignleft.addEventListener("click", () => {
  var left = "left";
  selectedText.set({ textAlign: left });
  canv.renderAll();
});
textalignright.addEventListener("click", () => {
  var right = "right";
  selectedText.set({ textAlign: right });
  canv.renderAll();
});

function showTxtTool() {
  document.querySelector(".sidebaraddtext").style.display = "inline-block";
  document.querySelector(".sidebaraddimg").style.display = "none";
  document.querySelector("#sidebarbackgroundaddimg1").style.display = "none";
}

function increaseText() {
  var currentFontSize = selectedText.get("fontSize");
  var newFontSize = currentFontSize + 2;
  selectedText.set({ fontSize: newFontSize });
  canv.renderAll();
  font_number.innerText = newFontSize;
}

function increaseImageSize() {
  var currentScaleX = selectedText.scaleX;
  var currentScaleY = selectedText.scaleY;
  var newScaleX = currentScaleX * 1.2;
  var newScaleY = currentScaleY * 1.2;
  selectedText.set({ scaleX: newScaleX, scaleY: newScaleY });

  canv.renderAll();

}

function decreaseImageSize() {
  var currentScaleX = selectedText.scaleX;
  var currentScaleY = selectedText.scaleY;
  var newScaleX = currentScaleX * 0.8;
  var newScaleY = currentScaleY * 0.8;
  selectedText.set({ scaleX: newScaleX, scaleY: newScaleY });

  canv.renderAll();

}
function decreaseText() {
  var currentFontSize = selectedText.get("fontSize");
  var newFontSize = currentFontSize - 2;
  selectedText.set({ fontSize: newFontSize });
  canv.renderAll();
  font_number.innerText = newFontSize;
}


function changeTextColor2() {
  const obj = canv.getActiveObject();
  const color = document.getElementById("colorPicker").value;
  if (obj && obj.type === "textbox") {
    obj.set({ fill: color });
    canv.renderAll();
    addToHistory();
  }
}



const fontSelector = document.getElementById("font-selector");
const font = document.getElementById("font");
fontSelector.addEventListener("click", function fontselect() {

});

clone.addEventListener("click", function cloneTxt() {
  if (selectedText) {
    var clonedText = new fabric.IText(selectedText.text, {
      left: selectedText.left + 20,
      top: selectedText.top + 20,
      fontSize: selectedText.fontSize,
      fill: selectedText.fill,
      fontFamily: selectedText.fontFamily,
    });
    canv.add(clonedText);
    clonedText.set("zIndex", 100);
    canv.bringForward(clonedText);
    canv.moveTo(object, clonedText);
    canv.renderAll();
  }
  canv.renderAll();
});

function downloadJSON() {
  const json = JSON.stringify(canv.toJSON());
  const blob = new Blob([json], { type: "application/json" });
  const url = (window.webkitURL || window.URL).createObjectURL(blob);
  const a = document.createElement("a");
  a.href = url;
  a.download = "canvas.json";
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
  (window.webkitURL || window.URL).revokeObjectURL(url);
}

function downloadImage() {
  const imgData = canv.toDataURL({ format: "png", quality: 1 });
  const link = document.createElement("a");
  link.href = imgData;
  link.download = "canvas.png";
  link.click();
}

function downloadSVG() {
  const svgData = canv.toSVG();
  const blob = new Blob([svgData], { type: "image/svg+xml" });
  const url = URL.createObjectURL(blob);
  const a = document.createElement("a");
  a.href = url;
  a.download = "canvas.svg";
  a.click();
  URL.revokeObjectURL(url);
}

export1.addEventListener("click", async () => {
  try {
    saveData();
    const pdfDoc = await PDFLib.PDFDocument.create();
    const page = pdfDoc.addPage([450, 680]);

    const imgData = canv.toDataURL("image/png");

    const image = await pdfDoc.embedPng(imgData);
    const { width, height } = image.scale(1);
    page.drawImage(image, {
      x: 0,
      y: 0,
      width,
      height,
      opacity: 1,
    });

    const pdfBytes = await pdfDoc.save();
    const pdfBlob = new Blob([pdfBytes], {
      type: "application/pdf",
    });
    const downloadLink = document.createElement("a");
    if (typeof window.URL.createObjectURL === "undefined") {
      if (typeof webkitURL !== "undefined") {
        window.URL = webkitURL;
      } else {
        throw new Error("Your browser does not support downloading files.");
      }
    }
    downloadLink.href = window.URL.createObjectURL(pdfBlob);
    downloadLink.download = "output.pdf";
    downloadLink.click();
  } catch (error) {
    console.error("Error:", error);
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
            zIndex: 50,
          });
          addImageToCanvas(fabricImage);
          fabricImage.set("zIndex", 50), fabricImage.sendToBack();
        };
      };
      reader.readAsDataURL(file);
    }
  }
});

function addImageToCanvas(fabricImage) {
  canv.add(fabricImage);
  canv.sendToBack(fabricImage);
}
function generateCanvasImageFromJSON(jsonData) {
  const canvasData = JSON.parse(jsonData);
  const canvas = document.createElement("canvas");
  const ctx = canvas.getContext("2d");
  canvas.width = canvasData.width;
  canvas.height = canvasData.height;
  const img = new Image();
  img.src = canvasData.imageDataUrl;
  img.onload = function () {
    ctx.drawImage(img, 0, 0);
    const canvasImageDataUrl = canvas.toDataURL("image/png");
    const imgElement = document.createElement("img");
    imgElement.src = canvasImageDataUrl;
    document.body.appendChild(imgElement);
  };
}
function handleJSONImport() {
  var id = window.location.pathname.split("/")[2];
  $.ajax({
    type: "GET",
    url: `/get-json?id=${id}`,
    success: function (response) {
      if (response) {
      } else {
      }
      const file = response.data;
      fetch(`/Json/${file}`)
        .then((res) => {
          return res.json();
        })
        .then(function (data) {
          const jsonData = data;
          if (canv) {
            canv.clear();
          }
          canv.loadFromJSON(jsonData, function () {
            canv.requestRenderAll();
          });
        });
    },
  });
}
function canvaClear() {
  // Clear the current canvas instance
  canv.clear();

  // Create a new Fabric.js canvas instance
  canv.add(
    new fabric.Rect({
      width: canv.width,
      height: canv.height,
      fill: "transparent",
      selectable: false,
    })
  );

  // Attach event listeners to the new canvas instance
  canv.on({
    "mouse:down": selectedObject,
  });
}

function dublicateObject() {
  var object = canv.getActiveObject();

  object.clone(function (e) {
    canv.add(
      e.set({
        left: object.left + 10,
        top: object.top + 10,
      })
    );
  });
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
        fabric.loadSVGFromString(svgData, (objects, options) => {
          const group = new fabric.Group(objects, options);
          canv.add(group);
          canv.renderAll();
        });
      } catch (error) {
        console.error("Error loading SVG:", error);
      }
    };
    reader.readAsText(file1);
  }
}

addsticker.addEventListener("click", () => {
  sideshow.style.display == "none"
    ? (sideshow.style.display = "inline-block")
    : (sideshow.style.display = "none");
});
document.getElementById("imageInput1").addEventListener("change", function (e) {
  var fileInput = e.target;
  var file = fileInput.files[0];
  if (file) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var imgURL = e.target.result;

      fabric.Image.fromURL(imgURL, function (img) {
        canv.setBackgroundImage(img, canv.renderAll.bind(canv), {
          scaleX: canv.width / img.width,
          scaleY: canv.height / img.height,
        });
      });
    };

    reader.readAsDataURL(file);
  }
});

var API_KEY = "39819870-b0f877f9b101769c1f36d42d9";
var resultsDiv = document.getElementById("stickerList");

document.getElementById("btnSearch").addEventListener("click", (ev) => {
  ev.preventDefault();
  var searchTerm = document.getElementById("searchInput").value;
  var URL = `https://pixabay.com/api/?key=39819870-b0f877f9b101769c1f36d42d9&q= ${encodeURIComponent(
    searchTerm
  )}&safeSearch=true`;
  var spinner = `<div class="spinner-border text-primary" role="status">
  <span class="visually-hidden">Loading...</span>
  </div>`;
  document.getElementById("btnSearch").innerHTML = spinner;
  fetch(URL)
    .then((response) => response.json())
    .then((data) => {
      var html = "<br>";
      if (data.totalHits > 0) {
        data.hits.forEach(function (hit, i) {
          html += `<img src="${hit.previewURL}" alt="${hit.tags}" width="150px" height="150px"  style='z-index: -10'  >`;
          stickers.push({ src: hit.previewURL });
        });
        resultsDiv.innerHTML = html;
      } else {
        resultsDiv.innerHTML = "No hits";
      }
      document.getElementById("btnSearch").innerText = `Search`;
    })
    .catch((error) => {
      console.error("Error fetching data:", error);
    });
});
function show() {
  var API_KEY = "39819870-b0f877f9b101769c1f36d42d9";

  URL = `https://pixabay.com/api/?key=39819870-b0f877f9b101769c1f36d42d9&q=cake&safeSearch=true`;
  var spinner = `<div class="spinner-border text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
    </div>`;
  document.getElementById("btnSearch").innerHTML = spinner;
  fetch(URL)
    .then((response) => response.json())
    .then((data) => {
      var html = "<br>";
      var resultsDiv = document.getElementById("stickerList");
      if (data.totalHits > 0) {
        data.hits.forEach(function (hit, i) {
          html += `<img src="${hit.previewURL}" alt="${hit.tags}" width="150px" height="150px" style='z-index: -10'  >`;
          stickers.push({ src: hit.previewURL });
        });
        sideshow.style.display = "inline-block";
        resultsDiv.innerHTML = html;
      } else {
        resultsDiv.innerHTML = "No hits";
      }
      document.getElementById("btnSearch").innerText = `Search`;
    })
    .catch((error) => {
      console.error("Error fetching data:", error);
    });
}
show();
resultsDiv.addEventListener("click", (event) => {
  if (event.target.tagName === "IMG") {
    const clickedImgSrc = event.target.src;

    const clickedSticker = stickers.find(
      (sticker) => sticker.src === clickedImgSrc
    );

    if (clickedSticker) {
      addStickerToCanvas(clickedSticker);
    }
  }
});

function addStickerToCanvas(sticker) {
  fabric.Image.fromURL(
    sticker.src,
    (img) => {
      const desiredWidth = 100;
      const desiredHeight = 100;
      img.scaleToWidth(desiredWidth);
      img.scaleToHeight(desiredHeight);
      img.set({
        left: 100,
        top: 100,
        zIndex: -10,
      });
      canv.add(img);
      canv.sendToBack(img);
    },
    { crossOrigin: "Anonymous" }
  );
}

let token = "";
async function getapi() {
  const response = await fetch("/get-csrf-token");

  var data = await response.text();

  this.token = data;
}

var save1 = document.getElementById("save2");
save1.addEventListener("click", function () {
  saveData();
});

function saveData() {
  const json = JSON.stringify(canv.toJSON());
  const blob = new Blob([json], { type: "application/json" });

  const formData = new FormData();
  var filename = window.location.pathname.split("/")[2] + ".json";

  formData.append("json_blob", [json]);
  formData.append("event_id", window.location.pathname.split("/")[2]);
  formData.append("_token", this.token);
  fetch("/save-blob", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (response.ok) {
        loadOldData2();
      } else {
        console.error("Failed to save Blob data on the server.");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function saveSetting() {
  let rspvVal = "";
  for (let index = 1; index <= 6; index++) {
    if (document.getElementById("flexCheckChecked" + index).checked) {
      rspvVal += "1,";
    } else {
      rspvVal += "0,";
    }

    AllBgname = document.getElementsByClassName("bgName");
    var bgName;
    for (let index = 0; index < AllBgname.length; index++) {
      if (AllBgname[index].checked) {
        bgName = AllBgname[index].value;
      }
    }
  }
  let msg = document.getElementById("msgTitle").value;
  getapi();

  $.ajax({
    type: "POST",
    url: "/event/card",
    data: JSON.stringify({
      _token: this.token,
      event_id: window.location.pathname.split("/")[2],
      rsvp: rspvVal.substring(0, 11),
      msg: msg,
      bgName: bgName,
      envTitleFont: document.getElementById("font-selectorsetting").value,
      envTitleColor: document.getElementById("colorPickersetting").value,
      colorOut: document.getElementById("colorPickerenvelope_outsetting").value,
      colorIn: document.getElementById("colorPickerenvelope_innersetting")
        .value,
    }),
    dataType: "json",
    contentType: "application/json",
    success: function (msg) {
      window.location =
        "/event/" + window.location.pathname.split("/")[2] + "/invitation-new";
    },
    error: function (xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      //console.log(err);
    },
  });
}

function loadCardImagesFromDB(data) {
  const stickers1 = [];

  var imgDiv = document.getElementById("imgDiv");
  for (let i = 0; i < data.length; i++) {
    const colDiv = document.createElement("div");
    colDiv.className = "col-6 mb-3";

    const img = document.createElement("img");
    img.src =
      "https://clickadmin.searchmarketingservices.co/eventcards/" + data[i].img;
    img.setAttribute("height", "200px");
    img.setAttribute("width", "200px");
    img.setAttribute("id", `img_${i}`);
    img.style.zIndex = "-10";

    stickers1.push(img);
    img.addEventListener("click", (event) => {
      const clickedImgSrc = event.target.src;
      const clickedSticker = stickers1.find(
        (sticker) => sticker.src === clickedImgSrc
      );
      if (clickedSticker) {
        addStickerToCanvas1(clickedSticker.src);
      }
    });

    colDiv.appendChild(img);
    imgDiv.appendChild(colDiv);
  }
}
for (let i = 0; i < stickers1.length; i++) {
  const colDiv = document.createElement("div");
  colDiv.className = "col-6 mb-3";
  const img = document.createElement("img");
  img.src = stickers1[i];
  img.setAttribute("height", "200px");
  img.setAttribute("width", "200px");
  img.setAttribute("id", `img_${i}`);
  img.style.zIndex = "-10";

  img.addEventListener("click", (event) => {
    const clickedImgSrc = event.target.src;
    const clickedSticker = stickers1.find(
      (sticker) => sticker === clickedImgSrc
    );
    if (clickedSticker) {
      addStickerToCanvas(clickedSticker);
    }
  });
  colDiv.appendChild(img);
  imgDiv.appendChild(colDiv);
}

can.addEventListener("click", function () {
  sideshow.style.display = "none";
});

function addStickerToCanvas1(sticker) {
  fabric.Image.fromURL(
    sticker,
    (img) => {
      img.set({
        scaleX: canv.width / img.width,
        scaleY: canv.height / img.height,
      });
      canv.setBackgroundImage(img, canv.renderAll.bind(canv));
    },
    { crossOrigin: "Anonymous" }
  );
}

async function loadOldData2() {
  //console.log('hi i m here')
  const response = await fetch(
    "/event/get-card/" + window.location.pathname.split("/")[2]
  );
  let res = await response.text();
  var data = JSON.parse(res);
  loadCardImagesFromDB(data.cardImgs);
  loadBgImagesFromDB(data.bgImgs);

  if (data.result != 0) {

    document.getElementById("id_card").value = data["id_card"];
    document.getElementById(
      "iframe"
    ).src = `${window.location.pathname}/babyShowerPreview/${data["id_card"]}`;
    document.getElementById(data.bgName).checked = true;
    let rsvpData = data.rsvp.split(",");

    rsvpData.forEach((element, key) => {
      if (element == 1) {
        document.getElementById("flexCheckChecked" + (key + 1)).checked = true;
      } else {
        document.getElementById("flexCheckChecked" + (key + 1)).checked = false;
      }
    });

    document.getElementById("msgTitle").value = data.msgTitle;
    document.getElementById("deleteBtn").addEventListener("click", function () {
      const obj = canv.getActiveObject();
      if (obj) {
        canv.remove(obj);
        addToHistory();
      }
    });

    document.addEventListener("keydown", function (event) {
      if (event.code === "Delete" || event.code === "Backspace") {
        const obj = canv.getActiveObject();
        if (obj) {
          canv.remove(obj);
          addToHistory();
        }
      }
    });


    document
      .getElementById("downloadBtn3")
      .addEventListener("click", function () {
        const dataUrl = canv.toDataURL({
          format: "png",
          multiplier: 2,
        });
        const link = document.createElement("a");
        link.href = dataUrl;
        link.download = "canvas_image.png";
        link.click();
      });
    canv.on("selection:created", function (options) {
      updateControls(options.target);
    });

    canv.on("selection:updated", function (options) {
      updateControls(options.target);
    });

    document.getElementById(data.bgName).checked = true;

    document.getElementById("colorPickerenvelope_outsetting").value =
      "#" + data.cardColorOut;
    document.getElementById("colorPickerenvelope_innersetting").value =
      "#" + data.cardColorIn;
    document.getElementById("msgTitle").value = data.msgTitle;
  } else {
    if (data.isCouple == 0) {
      document.getElementById("display-name1").innerHTML = "Name Here";
      document.getElementById("name1").value = "Name Here";
    }
  }

  isCouple = data.isCouple;
  if (data.isCouple == 0) {
    document.getElementById("name2").style.display = "none";
    document.getElementById("name2label").style.display = "none";
  }
}

function loadBgImagesFromDB(imgData) {
  let doc = document.getElementById("bgImgData");
  if (imgData.length > 0) {
    let tags = "";
    for (let i = 0; i < imgData.length; i++) {
      tags +=
        "<label class='borderPc py-2' >" +
        "<input type='radio' onclick='backgroundSelecetor(this.value)' name='test' class='bgName' value='" +
        imgData[i].img +
        "' id='" +
        imgData[i].img +
        "' >" +
        "<img src='https://clickadmin.searchmarketingservices.co/eventcards/" +
        imgData[i].img +
        "' alt='Option 1'  style='z-index: -10'>" +
        "</label>";
    }
    doc.innerHTML = tags;
  } else {
    doc.innerHTML = "";
  }
}

function updateControls(target) {
  if (target && target.type === "textbox") {
    document.getElementById("textInput").value = target.text;
    document.getElementById("textColor").value = target.fill;
    document.getElementById("fontSize").value = target.fontSize;
    document.getElementById("fontSelector").value = target.fontFamily;
  }
}

function addToHistory() {
  const jsonData = JSON.stringify(canv.toJSON());
  moveHistory = moveHistory.slice(0, currentIndex + 1);
  moveHistory.push(jsonData);
  if (moveHistory.length > 10) {
    moveHistory.shift();
  }
  currentIndex = moveHistory.length - 1;
}

function switchToOld() {
  window.location =
    "/event/" + window.location.pathname.split("/")[2] + "/invitation-old";
}
