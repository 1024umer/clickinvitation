var boxes = document.getElementById("boxes");
var navbar = document.getElementById("navbar");
var demonav = document.getElementById("navbody");
var increment = -1;
var i = 0;
var j = 200, k = 300, l = 400, m = 500, n = 600, a = 700, z = 800;
loadData();

function loadData() {
    var xhr = new XMLHttpRequest();

    // Define the request method, URL, and set asynchronous to true
    xhr.open(
        "GET",
        "/web-new/get/" + window.location.pathname.split("/")[2],
        true
    );

    // Set up a callback function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Request was successful, handle the response
                var responseData = JSON.parse(xhr.responseText);
                console.log(responseData);

                let htDoc = "";

                responseData.forEach(element => {
                    htDoc += element.html_doc;
                    i = element.id;
                    j += element.id;
                    k += element.id;
                    l += element.id;
                    m += element.id;
                    n += element.id;
                    a += element.id;
                    z += element.id;
                });
                document.getElementById('boxes').innerHTML = htDoc;
                console.log(i);
            } else {
                // There was an error with the request
                console.error("Error:", xhr.status);
            }
        }
    };

    // Send the request
    xhr.send();
}

function closeElement(elementID) {
    console.log("deleting : " + elementID);
    var xhr = new XMLHttpRequest();

    // Define the request method, URL, and set asynchronous to true
    xhr.open(
        "GET",
        "/web-new/delete/" + window.location.pathname.split("/")[2] + "/" + elementID,
        true
    );

    // Set up a callback function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Request was successful, handle the response
                var responseData = JSON.parse(xhr.responseText);
                console.log(responseData);
                document.getElementById(elementID).remove()
            } else {
                // There was an error with the request
                console.error("Error:", xhr.status);
            }
        }
    };

    // Send the request
    xhr.send();
}


function saveTemplate1(saveButton) {
    // Extract the numeric value from the Save button's class

    //var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
    var i = parseInt(saveButton, 10);
    var color = document.getElementById("TextColor" + i).value;
    var text = document.getElementById("box" + i);
    var textContent = document.getElementById("textContent" + i).value;
    var fontselector1 = document.querySelector(".fontselector1" + i).value;
    text.innerHTML = textContent;

    let combobox = document.getElementById('template1' + i);
    combobox.style.color = color;
    combobox.style.fontFamily = fontselector1;

    // Define an array of style properties and their corresponding input types
    var styleProperties = [
        { name: "backgroundColor", type: "color" },
        { name: "TextColor", type: "color", id: "TextColor" },
        { name: "borderRadius", type: "number" },
        { name: "fontselector1", type: "select", id: "fontFamily" + i },
        // Add more style properties as needed
    ];

    // Helper function to update styles
    function updateStyle(thisStyle) {
        console.log(thisStyle);
        var inputId = thisStyle.name + i;
        var inputElement = document.getElementById(inputId);

        if (inputElement) {
            var newValue = inputElement.value;
            // Update the style of the combobox
            var combobox = document.querySelector(".comboboxtemp1" + i);
            var borderRadius = document.getElementById("innerimage" + i);

            console.log(borderRadius);
            if (combobox) {
                if (thisStyle.type === "color") {
                    combobox.style[thisStyle.name] = newValue;
                } else if (thisStyle.type === "number") {
                    borderRadius.style.borderRadius = newValue + "%";
                } else if (thisStyle.type === "select") {
                    combobox.style[thisStyle.name] = newValue;
                }
            }
            console.log("Save button clicked");
        } else {
            console.error(
                "Input element not found for " +
                thisStyle.name +
                " with ID: " +
                inputId
            );
        }
    }
    // Iterate through the style properties and update them
    styleProperties.forEach(updateStyle);


    //save function, programmed sepratly
    saveUpdateElement('template1' + i);

}

async function saveUpdateElement(elementID) {
    // ajax

    const response = await fetch("/get-csrf-token");

    // Storing data in form of JSON
    var data = await response.text();

    let token = data;
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Define the request method, URL, and set asynchronous to true
    xhr.open("POST", "/web-new/update", true);

    // Set the request header if needed (e.g., for JSON content type)
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.setRequestHeader("X-CSRF-TOKEN", token);

    // Set up a callback function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Request was successful, handle the response
                console.log(xhr.responseText);
            } else {
                // There was an error with the request
                console.error("Error:", xhr.status);
            }
        }
    };

    //console.log(document.getElementById('template1' + i).outerHTML);
    // Prepare the data to be sent (in this case, a simple JSON object)
    var dataToSend = {
        _token: token,
        event_id: window.location.pathname.split("/")[2],
        element_name: elementID,
        html_doc: document.getElementById(elementID).outerHTML,
    };

    // Convert the data to a JSON string
    var jsonData = JSON.stringify(dataToSend);

    // Send the request with the data
    xhr.send(jsonData);
}
function save() {
    var backgroundColor = document.getElementById("backgroundColor").value;
    var imageradius = document.getElementById("imageradius").value;
    var fontselector = document.getElementById("fontselector1").value;
    var TextColor = document.getElementById("TextColor").value;
    document.body.style.backgroundColor = backgroundColor;
    document.body.style.fontFamily = fontselector;
    console.log(fontselector);
    console.log(backgroundColor);
    document.querySelectorAll("p").forEach(function (element) {
        element.style.color = TextColor;
    });

    document.body.style.fontFamily = fontselector;

    console.log(fontselector);
    document.querySelectorAll("img").forEach(function (element) {
        element.style.borderRadius = imageradius + "%";
    });
}
function save2() {
    var backgroundColor2 = document.getElementById("backgroundColor2").value;
    var fontselector2 = document.getElementById("fontselector12").value;
    var TextColor2 = document.getElementById("TextColor2").value;
    var color = document.getElementById("comboboxtemp5501").value;
    navbar.style.backgroundColor = backgroundColor2;
    navbar.style.fontFamily = fontselector2;
    console.log(fontselector2);
    console.log(backgroundColor2);
    document.querySelectorAll("a").forEach(function (element) {
        element.style.color = TextColor2;
    });


    navbar.style.fontFamily = fontselector2;

    console.log(fontselector2);
}

function display() {
    // Check if the script is running in a new window/tab
    if (!window.opener) {
        // Hide specific elements
        var elementsToHide = document.querySelectorAll(
            ".inner, .file-upload, #mainbuttonhome, .rounded-circle, #preview, #imageInput, .slideinputpreview, #mainbuttonhome2"
        );
        elementsToHide.forEach(function (element) {
            element.style.display = "none";
        });

        setTimeout(function () {
            var d = document.querySelector(".rounded-circle");
            var pr = document.querySelector("#preview");
            d.style.display = "none";
            pr.style.display = "none";
        }, 0);

        // Get the HTML content
        var htmlContent = document.documentElement.outerHTML;
        // var previewWindow = window.open();
        previewWindow.document.write(htmlContent);
    }
}

function hide() {
    document.body.style.display = "none";
    alert("Your page is loading. Please wait...");
}

function shown() {
    document.body.style.display = "";
}

var navinput;

function template1() {
    i++;
    increment++;

    var combobox = document.createElement("div");
    combobox.classList.add("comboboxtemp1" + i);
    combobox.classList.add("combobox");

    combobox.id = "template1" + i;
    var li = document.createElement("li");
    li.className = "nav-item";
    var a = document.createElement("a");
    a.className = "nav-link";
    a.classList.add("nav" + increment);
    a.href = "#" + "template1" + i;
    a.textContent = "nav" + increment;
    li.appendChild(a);
    navbar.appendChild(li);
    console.log(navbar);

    function navbarName() {
        var div = document.createElement("div");
        div.classList.add("col-4");
        var div1 = document.createElement("div");
        div1.classList.add("col-8");
        var label = document.createElement("label");
        label.textContent = "navbar" + i;
        label.classList.add("navlabel");
        label.textContent = "navbar" + increment;
        navinput = document.createElement("input");
        navinput.classList.add("navinput");
        navinput.classList.add("navinput" + increment);
        div.appendChild(label);
        div1.appendChild(navinput);
        demonav.appendChild(div);
        demonav.appendChild(div1);
        const navInputs = document.querySelectorAll(".navinput");
        for (let i = 0; i < navInputs.length; i++) {
            const navInput = navInputs[i];
            console.log(navInput);
            console.log(navInputs);
            navInput.addEventListener("change", function () {
                // Get the first class from the classList
                const numericClass = this.classList[1];
                // Assuming the first class is the numeric value and starts with "nav"
                const numericValue = numericClass
                    ? parseInt(numericClass.replace("navinput", ""), 10)
                    : null;
                const a = document.querySelector(".nav" + numericValue);

                console.log("Numeric value from class:", numericValue);
                console.log(this.value);

                a.innerHTML = this.value;
            });
        }
    }
    // Assuming you have elements with the class "navinput"

    navbarName();
    // Create the offcanvas container
    var offcanvas = document.createElement("div");
    offcanvas.classList.add("offcanvas");
    offcanvas.classList.add("offcanvas-start");
    offcanvas.id = "demo" + i;
    // Create the offcanvas header
    var offcanvasHeader = document.createElement("div");
    offcanvasHeader.classList.add("offcanvas-header");
    offcanvasHeader.style.color = "black";
    var h1 = document.createElement("h1");
    h1.classList.add("offcanvas-title");
    h1.textContent = "Style the theme";
    var closeButton = document.createElement("button");
    closeButton.type = "button";
    closeButton.classList.add("btn-close");
    closeButton.setAttribute("data-bs-dismiss", "offcanvas");


    offcanvasHeader.appendChild(h1);
    offcanvasHeader.appendChild(closeButton);
    // Create the offcanvas body
    var offcanvasBody = document.createElement("div");
    offcanvasBody.classList.add("offcanvas-body");
    offcanvasBody.style.color = "black";
    offcanvasBody.style.fontSize = "15px";

    // Create the row and columns
    var row = document.createElement("div");
    row.classList.add("row");
    offcanvasBody.appendChild(row);
    offcanvas.appendChild(offcanvasHeader);
    offcanvas.appendChild(offcanvasBody);
    // Append the offcanvas to the document body
    combobox.appendChild(offcanvas);

    // Create the button to toggle the offcanvas
    var offcanvasToggle = document.createElement("button");
    offcanvasToggle.classList.add("btn");
    offcanvasToggle.setAttribute("type", "button");
    offcanvasToggle.setAttribute("data-bs-toggle", "offcanvas");
    offcanvasToggle.setAttribute("data-bs-target", "#demo" + i);
    var icon = document.createElement("i");
    icon.style.fontSize = "40px";
    icon.classList.add("fa-regular");
    icon.classList.add("slideinputpreview");
    icon.classList.add("fa-pen-to-square");
    offcanvasToggle.appendChild(icon);
    // Append the button to the document body
    combobox.appendChild(offcanvasToggle);
    var spanbutton = document.createElement("button");
    spanbutton.classList.add("item-1");
    spanbutton.classList.add("close");
    spanbutton.setAttribute("onClick", "closeElement('template1" + i + "')");

    var innerspan = document.createElement("span");
    var labelspan = document.createElement("span");
    innerspan.classList.add("inner");
    labelspan.classList.add("label");
    labelspan.textContent = "Close";
    innerspan.appendChild(labelspan);
    spanbutton.appendChild(innerspan);
    combobox.appendChild(spanbutton);

    var box = document.createElement("div");
    box.classList.add("box");
    box.classList.add("textContentInput");
    box.setAttribute("id", "box" + i);
    box.classList.add("col-lg-6");
    box.classList.add("col-auto");

    combobox.appendChild(box);

    var containers = document.createElement("div");
    containers.classList.add("containers");
    containers.classList.add("col-lg-6");
    containers.classList.add("col-auto");
    //close buttons
    // end close button

    var div = document.createElement("div");
    containers.appendChild(div);
    combobox.appendChild(containers);
    boxes.appendChild(combobox);
    var img = document.createElement("img");
    img.src = "http://via.placeholder.com/700x500";
    img.classList.add("image");
    img.classList.add("img-fluid");
    img.setAttribute("id", "innerimage" + i);
    div.appendChild(img);
    console.log(boxes);

    var button = document.createElement("button");
    button.classList.add("btn");
    button.classList.add("file-upload");
    button.style.height = "50px";
    button.style.setProperty("font-size", "15px", "important");

    var input = document.createElement("input");
    input.classList.add("file-input");
    offcanvasBody.classList.add("file-input");
    input.type = "file";

    button.textContent = "Choose File";
    button.appendChild(input);
    containers.appendChild(button);

    spanbutton.onclick = function () {
        //boxes.removeChild(combobox);
    };

    $(input).change(function () {
        var curElement = $(this).closest(".containers").find(".image");
        console.log(curElement);
        var reader = new FileReader();
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            curElement.attr("src", e.target.result);
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    $(combobox)
        .find(".edit-on-click")
        .click(function () {
            var $text = $(this),
                $input = $('<textarea style="width: 100%;" rows="4" />');
            $text.hide().after($input);
            $(combobox).find(".controls-update").show();
            $input
                .val($text.html())
                .show()
                .focus()
                .keypress(function (e) {
                    var key = e.which;
                    $(combobox)
                        .find(".controls-update")
                        .click(function () {
                            $input.hide();
                            $text.html($input.val()).show();
                            return false;
                        });
                })
                .focusout(function () {
                    $input.hide();
                    $text.show();
                });
        });

    $(combobox)
        .find(".controls-update")
        .click(function () {
            $(combobox).find(".controls-update").hide();
        });


    $(document).ready(function () {
        $(".file-input").change(function () {
            // Triggered when a file is selected
            var curElement = $(this).closest(".containers").find(".image");
            console.log(" image file-input")

            // Trigger the custom event with curElement as a parameter
            $(document).trigger('imageSelected', [curElement]);

            // Continue with the existing code
            readURL(this);
        });

        $(".file-upload").click(function () {
            // Triggered when the "Upload Image" button is clicked
            uploadImage();
        });

        function readURL(file, curElement) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // Display the selected image in the preview
                curElement.attr("src", e.target.result);
            };

            // Use FileReader's readAsDataURL method directly on the file
            reader.readAsDataURL(file);
        }


        function uploadImage() {
            // Existing uploadImage function remains unchanged
        }
    });

    // New event handler for your custom event
    $(document).on('imageSelected', async function (event, curElement) {
        // You can perform additional actions or send curElement details to the server here
        console.log("Image selected. Element details:", curElement);
        const response = await fetch("/get-csrf-token");

        // Storing data in form of JSON
        var data = await response.text();

        let token = data;
        // Example: Send details to the server via AJAX
        var xhr = new XMLHttpRequest();
        var url = "/web-new/upload-image-details";
        var formData = new FormData();
        var fileInput = document.querySelector(".file-input");
        console.log("asdadlkjalksdjlk" + fileInput)

        $(".file-input").change(function () {
            var fileInput = this.files[0];

            if (fileInput instanceof Blob) {
                var curElement = $(this).closest(".containers").find(".image");

                // Display the selected image in the preview
                readURL(fileInput, curElement);

                // Rest of your code
                // ...
            } else {
                console.error("Invalid file type or no file selected");
            }
        });

        function readURL(file, curElement) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // Display the selected image in the preview
                curElement.attr("src", e.target.result);
            };

            // Use FileReader's readAsDataURL method directly on the file
            reader.readAsDataURL(file);
        }


        console.log("file nin[i" + fileInput)
        var curElement = "your_element_details";
        formData.append("_token", token);
        formData.append("elementDetails", curElement);
        formData.append("image", fileInput);
        formData.append("element_name", "template1" + i);
        formData.append("event_id", window.location.pathname.split("/")[2]);

        xhr.open("POST", url, true);

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Request was successful
                console.log("Details sent successfully. Response:", xhr.responseText);
            } else {
                // Request failed
                console.error("Error sending details. Status:", xhr.status, "Response:", xhr.responseText);
            }
        };

        xhr.onerror = function () {
            console.error("Network error occurred");
        };

        xhr.send(formData);

    });





    var spanbutton = combobox.querySelector(".close");
    spanbutton.onclick = function () {
        // boxes.removeChild(combobox);
        // li.removeChild(a);
        // navbar.removeChild(li);
        closeElement("template1" + i);
    };

    boxes.appendChild(combobox);

    async function generateDynamicHTML() {
        // Example: Generate label and input for background color
        generateLabelInputPair(
            row,
            "Select Background Color",
            "backgroundColor" + i,
            "color"
        );
        // Example: Generate label and input for text color
        generateLabelInputPair(row, "Select Font Color", "TextColor" + i, "color");

        // Example: Generate label and input for image radius
        generateLabelInputPair(
            row,
            "Select Image Radius",
            "borderRadius" + i,
            "number",
            1,
            1,
            50
        );
        //text
        generateLabelInputPair(row, "Enter the text", "textContent" + i, "text");
        // Example: Generate label and select for font style
        generateLabelSelectPair(row, "Select Font Style", "fontselector" + i);

        generateLabelInputPair(row, 'Select Font Size', 'fontsize' + i, 'number');

        var saveButton = document.createElement("button");
        saveButton.className = "btn btn-primary";
        saveButton.classList.add("save" + i);
        saveButton.type = "button";
        saveButton.textContent = "Save";
        saveButton.setAttribute('onclick', "saveTemplate1(" + i + ")");
        saveButton.setAttribute('data-bs-toggle', "offcanvas");
        saveButton.setAttribute('data-bs-target', "#demo1");
        saveButton.onclick = function () {
            save(this); // Pass the clicked Save button to the save function
        };
        row.appendChild(saveButton);
        offcanvasBody.appendChild(row);
        // Append the generated content to offcanvasBody
        offcanvas.appendChild(offcanvasBody);
        offcanvasBody.appendChild(row);
        offcanvasBody.appendChild(saveButton);

        // ajax

        const response = await fetch("/get-csrf-token");

        // Storing data in form of JSON
        var data = await response.text();

        let token = data;
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Define the request method, URL, and set asynchronous to true
        xhr.open("POST", "/web-new/add-new", true);

        // Set the request header if needed (e.g., for JSON content type)
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", token);

        // Set up a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    console.log(xhr.responseText);
                } else {
                    // There was an error with the request
                    console.error("Error:", xhr.status);
                }
            }
        };

        //console.log(document.getElementById('template1' + i).outerHTML);
        // Prepare the data to be sent (in this case, a simple JSON object)
        var dataToSend = {
            _token: token,
            nav_name: "navbar" + i,
            event_id: window.location.pathname.split("/")[2],
            element_name: "template1" + i,
            html_doc: document.getElementById("template1" + i).outerHTML,
        };

        // Convert the data to a JSON string
        var jsonData = JSON.stringify(dataToSend);

        // Send the request with the data
        xhr.send(jsonData);

    }
    function generateLabelInputPair(
        container,
        labelText,
        inputId,
        inputType = "color",
        inputValue = "",
        min = 0,
        max = 50
    ) {
        var labelCol = document.createElement("div");
        labelCol.className = "col-7";
        var label = document.createElement("label");
        label.textContent = labelText;
        labelCol.appendChild(label);
        var inputCol = document.createElement("div");
        inputCol.className = "col-5";
        var input = document.createElement("input");
        input.type = inputType;
        input.name = "";
        input.className = "ColorInput";
        input.id = inputId;
        input.value = inputValue;

        if (inputType === "number") {
            input.min = min;
            input.max = max;
            input.classList.remove("ColorInput");
        }
        if (inputType === "text") {
            input.classList.remove("ColorInput");
            input.classList.add("textContent");
            labelCol.classList.remove("col-7");
            labelCol.className = "col-6";
            inputCol.classList.remove("col-5");
            inputCol.className = "col-6";
            input.type = inputType;
        }
        inputCol.appendChild(input);
        row.appendChild(labelCol);
        row.appendChild(inputCol);
        offcanvasBody.appendChild(row);
        offcanvasBody.appendChild(row);
    }
    // Function to generate label and select pair
    function generateLabelSelectPair(container, labelText, selectId) {
        console.log(container);
        var labelCol = document.createElement("div");
        labelCol.className = "col-6";
        var label = document.createElement("label");
        label.textContent = labelText;
        labelCol.appendChild(label);
        var selectCol = document.createElement("div");
        selectCol.className = "col-6";
        var customSelect = document.createElement("div");
        customSelect.className = "custom-select";
        var selectWrapper = document.createElement("div");
        selectWrapper.className = "select-wrapper";
        var span = document.createElement("span");
        span.id = "font";
        span.style.fontFamily = "'Abramo Serif'";
        var select = document.createElement("select");
        span.appendChild(select);
        select.classList.add("fontselector1" + i);
        select.classList.add("fontselector1");
        select.setAttribute("id", "fontselector1" + i);
        selectWrapper.appendChild(span);
        selectWrapper.appendChild(select);
        customSelect.appendChild(selectWrapper);

        selectCol.appendChild(customSelect);

        // Example: Add font options to the select
        addFontOption(select, "Abramo Serif", "Abramo Serif");
        addFontOption(select, "Roboto-BlackItalic", "Roboto-BlackItalic, cursive");
        addFontOption(select, "Roboto-BlackItalic", "Roboto-BlackItalic, cursive");
        addFontOption(select, "RacingSansOne-Regular", "RacingSansOne-Regular");
        addFontOption(
            select,
            "PTSansNarrow-Regular",
            "PTSansNarrow-Regular, cursive"
        );
        addFontOption(select, "PTSansNarrow-Bold", "PTSansNarrow-Bold, cursive");
        row.appendChild(labelCol);
        row.appendChild(selectCol);
        customSelect.appendChild(select);
        // Add more font options as needed
    }

    function addFontOption(select, fontFamily, fontName, options, labelCol) {
        var option = document.createElement("option");
        option.value = fontFamily;
        option.style.fontFamily = fontName;
        option.textContent = fontName;
        select.appendChild(option);
        offcanvasBody.appendChild(select);
    }
    function save(saveButton) {
        // Extract the numeric value from the Save button's class

        var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
        var i = parseInt(buttonClass.replace("save", ""), 10);
        var color = document.getElementById("TextColor" + i).value;
        var text = document.getElementById("box" + i);
        var textContent = document.getElementById("textContent" + i).value;
        var fontselector1 = document.querySelector(".fontselector1" + i).value;
        text.innerHTML = textContent;

        combobox.style.color = color;
        combobox.style.fontFamily = fontselector1;

        $(document).ready(function () {
            console.log(i)
            var newSize = $("#fontsize" + i).val();
            console.log("fontsize" + i)
            $("#template1" + i).css("font-size", newSize + "px");

        })


        // ... (your existing code)

        // Add these lines to your existing code
        $(document).ready(function () {
            $("#imageInput").change(function () {
                // Triggered when a file is selected
                readURL(this);
            });

            $("#uploadButton").click(function () {
                // Triggered when the "Upload Image" button is clicked
                uploadImage();
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        // Display the selected image in the preview
                        $("#previewImage").attr("src", e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            function uploadImage() {
                var formData = new FormData();
                var fileInput = $("#imageInput")[0].files[0];
                formData.append("image", fileInput);

                $.ajax({
                    type: "POST",
                    url: "/web-new/upload-image", // Change this to the actual server-side script handling the upload
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // Handle the response (URL of the uploaded image)
                        console.log("Image uploaded successfully. URL:", response);

                        // Update your code to use the returned image URL as needed
                        // For example, you can update the image source
                        var curElement = $(".containers").find(".image");
                        curElement.attr("src", response);
                    },
                    error: function (error) {
                        console.error("Error uploading image:", error);
                    }
                });
            }
        });


        // Define an array of style properties and their corresponding input types
        var styleProperties = [
            { name: "backgroundColor", type: "color" },
            { name: "TextColor", type: "fontColor", id: "TextColor" },
            { name: "borderRadius", type: "number" },
            { name: "fontselector1", type: "select" },
            // Add more style properties as needed
        ];

        console.log("1first")
        var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
        var n = parseInt(buttonClass.replace('save', ''), 10);
        console.log(n)
        var align = document.querySelector(".form-check-input:checked");
        console.log(align)


        var align = document.querySelector(".form-check-input");
        if (align.id == "right") {

            document.querySelector('#box' + n).style.textAlign = "end";
            console.log(align.id)
        }
        else if (align.id == "left") {

            document.querySelector('#box' + n).style.textAlign = "start";
            console.log("start")
        }
        if (align.id == "center") {

            document.querySelector('#box' + n).style.textAlign = "center";
        }

        // Helper function to update styles
        async function updateStyle(styleProperty) {
            var inputId = styleProperty.name + i;
            var inputElement = document.getElementById(inputId);

            if (inputElement) {
                var newValue = inputElement.value;
                // Update the style of the combobox
                var combobox = document.querySelector('.comboboxtemp1' + i);
                var borderRadius = document.getElementById('innerimage' + i);

                console.log(borderRadius)
                if (combobox) {
                    if (styleProperty.type === 'color') {
                        combobox.style[styleProperty.name] = newValue;
                    } else if (styleProperty.type === 'fontColor') {
                        combobox.style[styleProperty.id] = newValue;
                    }
                    else if (styleProperty.type === 'number') {
                        borderRadius.style.borderRadius = newValue + '%';
                    } else if (styleProperty.type === 'select') {
                        combobox.style[styleProperty.name] = newValue;
                    }
                }
                console.log('Save button clicked');

                const response = await fetch("/get-csrf-token");

                // Storing data in form of JSON
                var data = await response.text();

                let token = data;
                // Create a new XMLHttpRequest object
                var xhr = new XMLHttpRequest();

                // Define the request method, URL, and set asynchronous to true
                xhr.open("POST", "/web-new/update", true);

                // Set the request header if needed (e.g., for JSON content type)
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.setRequestHeader("X-CSRF-TOKEN", token);

                // Set up a callback function to handle the response
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Request was successful, handle the response
                            console.log(xhr.responseText);
                        } else {
                            // There was an error with the request
                            console.error("Error:", xhr.status);
                        }
                    }
                };

                //console.log(document.getElementById('template1' + i).outerHTML);
                // Prepare the data to be sent (in this case, a simple JSON object)
                var dataToSend = {
                    _token: token,
                    event_id: window.location.pathname.split("/")[2],
                    element_name: "template1" + i,
                    html_doc: document.getElementById("template1" + i).outerHTML,
                };

                // Convert the data to a JSON string
                var jsonData = JSON.stringify(dataToSend);

                // Send the request with the data
                xhr.send(jsonData);
            } else {
                console.error('Input element not found for ' + styleProperty.name + ' with ID: ' + inputId);
            }
        }
        // Iterate through the style properties and update them
        styleProperties.forEach(updateStyle);




    }


    var formRow = document.createElement('div');
    formRow.className = 'row';

    var labelCol = document.createElement('div');
    labelCol.className = 'col-md-auto';
    labelCol.classList.add('col-5');
    var label = document.createElement('label');
    label.textContent = 'Text Alignment';
    labelCol.appendChild(label);

    var radioCol = document.createElement('div');
    radioCol.className = 'col-md-auto';
    radioCol.classList.add('col-7');

    console.log("first")
    var alignments = ['center', 'left', 'right'];
    alignments.forEach(function (align) {
        var radioDiv = document.createElement('div');
        radioDiv.className = 'form-check form-check-inline';
        console.log("first")
        var radio = document.createElement('input');
        radio.className = 'form-check-input';
        radio.type = 'radio';
        radio.name = 'alignment';
        radio.id = align;

        var label = document.createElement('label');
        label.className = 'form-check-label';
        label.htmlFor = align;
        var icon = document.createElement('i');
        icon.className = getIconClass(align);
        label.appendChild(icon);
        radioDiv.appendChild(radio);
        radioDiv.appendChild(label);
        radioCol.appendChild(radioDiv);
    })


    formRow.appendChild(labelCol);
    formRow.appendChild(radioCol);
    row.appendChild(formRow);

    var textContainer = document.createElement('div');
    textContainer.id = 'textContainer';
    textContainer.className = 'mt-3';
    row.appendChild(textContainer);

    function setTextAlignment() {
        document.querySelector('#box' + n).style.textAlign = align;
        console.log(align)
    }

    function handleSaveButtonClick(saveButton) {
        var buttonClass = saveButton.classList[2];
        var n = parseInt(buttonClass.replace('save', ''), 10);

        // Assuming you have a function getIconClass defined.
        var align = document.querySelector(".form-check-input:checked").id;
        document.querySelector('#box' + n).style.textAlign = align;

        // Assuming you have a function setTextAlignment defined.
        setTextAlignment(align, n);

        // Assuming you have a function updateTextContent defined.
        updateTextContent(n);
    }


    function getIconClass(align) {
        switch (align) {
            case 'center':
                console.log("asda" + align)
                console.log("first")
                return 'fas fa-align-center';
            case 'left':
                closeButton;
                console.log("sec")
                return 'fas fa-align-left';
            case 'right':
                console.log("third")
                return 'fas fa-align-right';
            default:
                return '';
        }
    }


    generateDynamicHTML();


    function closeElement(elementID) {
        console.log("deleting : " + elementID);
        var xhr = new XMLHttpRequest();

        // Define the request method, URL, and set asynchronous to true
        xhr.open(
            "GET",
            "/web-new/delete/" + window.location.pathname.split("/")[2] + "/" + elementID,
            true
        );

        // Set up a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    var responseData = JSON.parse(xhr.responseText);
                    console.log(responseData);
                    document.getElementById(elementID).remove()
                } else {
                    // There was an error with the request
                    console.error("Error:", xhr.status);
                }
            }
        };

        // Send the request
        xhr.send();
    }
}

function template2() {
    // navabr

    j++;
    increment++;
    var combobox = document.createElement("div");
    combobox.classList.add("comboboxtemp2" + j);
    combobox.classList.add("combobox");
    // Create the offcanvas container
    var offcanvas = document.createElement("div");
    offcanvas.classList.add("offcanvas");
    offcanvas.classList.add("offcanvas-start");
    offcanvas.id = "demo" + j;

    combobox.id = "template2" + j;
    var li = document.createElement("li");
    li.className = "nav-item";
    var a = document.createElement("a");
    a.className = "nav-link";
    a.classList.add("nav" + increment);
    a.href = "#" + "template2" + j;
    a.textContent = "nav" + increment;
    li.appendChild(a);
    navbar.appendChild(li);
    console.log(navbar);

    function navbarName() {
        var div = document.createElement("div");
        div.classList.add("col-4");
        var div1 = document.createElement("div");
        div1.classList.add("col-8");
        var label = document.createElement("label");
        label.textContent = "navbar" + i;
        label.classList.add("navlabel");
        label.textContent = "navbar" + increment;
        navinput = document.createElement("input");
        navinput.classList.add("navinput");
        navinput.classList.add("navinput" + increment);
        div.appendChild(label);
        div1.appendChild(navinput);
        demonav.appendChild(div);
        demonav.appendChild(div1);
        const navInputs = document.querySelectorAll(".navinput");
        for (let i = 0; i < navInputs.length; i++) {
            const navInput = navInputs[i];
            console.log(navInput);
            console.log(navInputs);
            navInput.addEventListener("change", function () {
                // Get the first class from the classList
                const numericClass = this.classList[1];

                const numericValue = numericClass
                    ? parseInt(numericClass.replace("navinput", ""), 10)
                    : null;
                const a = document.querySelector(".nav" + numericValue);

                console.log("Numeric value from class:", numericValue);
                console.log(this.value);

                a.innerHTML = this.value;
            });
        }
    }

    navbarName();
    // Create the offcanvas header
    var offcanvasHeader = document.createElement("div");
    offcanvasHeader.classList.add("offcanvas-header");

    var h1 = document.createElement("h1");
    h1.classList.add("offcanvas-title");
    h1.textContent = "Style the theme";

    var closeButton = document.createElement("button");
    closeButton.type = "button";
    closeButton.classList.add("btn-close");
    closeButton.setAttribute("data-bs-dismiss", "offcanvas");


    offcanvasHeader.appendChild(h1);
    offcanvasHeader.appendChild(closeButton);

    // Create the offcanvas body
    var offcanvasBody = document.createElement("div");
    offcanvasBody.classList.add("offcanvas-body");
    offcanvasBody.style.color = "black !important";
    offcanvasBody.style.fontSize = "15px !important";
    // Create the row and columns
    var row = document.createElement("div");
    row.classList.add("row");
    offcanvasBody.appendChild(row);
    offcanvas.appendChild(offcanvasHeader);
    offcanvas.appendChild(offcanvasBody);
    // Append the offcanvas to the document body
    combobox.appendChild(offcanvas);
    // Create the button to toggle the offcanvas
    var offcanvasToggle = document.createElement("button");
    offcanvasToggle.classList.add("btn");
    offcanvasToggle.setAttribute("type", "button");
    offcanvasToggle.setAttribute("data-bs-toggle", "offcanvas");
    offcanvasToggle.setAttribute("data-bs-target", "#demo" + j);

    var icon = document.createElement("i");
    icon.style.fontSize = "40px";
    icon.classList.add("fa-regular");
    icon.classList.add("slideinputpreview");
    icon.classList.add("fa-pen-to-square");

    offcanvasToggle.appendChild(icon);

    combobox.appendChild(offcanvasToggle);

    var containers1 = document.createElement("div");
    containers1.classList.add("containers1");
    containers1.classList.add("col-12");
    var innerspan = document.createElement("span");
    var labelspan = document.createElement("span");
    var div = document.createElement("div");
    button2 = document.createElement("button");
    button2.classList.add("item-1");
    button2.classList.add("close1");
    innerspan.classList.add("inner");
    innerspan.appendChild(labelspan);
    button2.appendChild(innerspan);
    combobox.appendChild(containers1);
    containers1.appendChild(div);
    combobox.appendChild(button2);
    var img = document.createElement("img");
    img.src = "http://via.placeholder.com/700x500";
    img.classList.add("image");
    img.classList.add("img-fluid");
    img.setAttribute("id", "borderRadius" + j);
    div.appendChild(img);
    combobox.appendChild(containers1);
    button1 = document.createElement("button");
    button1.classList.add("btn");
    button1.classList.add("file-upload");
    containers1.appendChild(button1);
    input1 = document.createElement("input");
    input1.classList.add("file-input");
    input1.type = "file";
    button1.textContent = "Choose a file";
    labelspan.classList.add("label");
    labelspan.textContent = "Close";
    button1.appendChild(input1);
    boxes.appendChild(combobox);
    button1.classList.add("center1");
    console.log(boxes);

    var spanbutton = combobox.querySelector(".close1");
    spanbutton.setAttribute("onClick", "closeElement('template2" + j + "')");
    spanbutton.onclick = function () {
        boxes.removeChild(combobox);
        li.removeChild(a);
        navbar.removeChild(li);

        closeElement("template2" + j);

    };

// imageupload template2

    $(document).on('imageSelected', async function (event, curElement) {
        // You can perform additional actions or send curElement details to the server here
        console.log("Image selected. Element details:", curElement);
        const response = await fetch("/get-csrf-token");

        // Storing data in form of JSON
        var data = await response.text();

        let token = data;
        // Example: Send details to the server via AJAX
        var xhr = new XMLHttpRequest();
        var url = "/web-new/upload-image-details";
        var formData = new FormData();
        var fileInput = document.querySelector(".file-input");
        console.log("asdadlkjalksdjlk" + fileInput)

        $(".file-input").change(function () {
            var fileInput = this.files[0];

            if (fileInput instanceof Blob) {
                var curElement = $(this).closest(".containers").find(".image");

                // Display the selected image in the preview
                readURL(fileInput, curElement);

                // Rest of your code
                // ...
            } else {
                console.error("Invalid file type or no file selected");
            }
        });

        function readURL(file, curElement) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // Display the selected image in the preview
                curElement.attr("src", e.target.result);
            };

            // Use FileReader's readAsDataURL method directly on the file
            reader.readAsDataURL(file);
        }


        console.log("file nin[i" + fileInput)
        var curElement = "your_element_details";
        formData.append("_token", token);
        formData.append("elementDetails", curElement);
        formData.append("image", fileInput);
        formData.append("element_name", "template1" + i);
        formData.append("event_id", window.location.pathname.split("/")[2]);

        xhr.open("POST", url, true);

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Request was successful
                console.log("Details sent successfully. Response:", xhr.responseText);
            } else {
                // Request failed
                console.error("Error sending details. Status:", xhr.status, "Response:", xhr.responseText);
            }
        };

        xhr.onerror = function () {
            console.error("Network error occurred");
        };

        xhr.send(formData);

    });



    function closeElement(elementID) {
        console.log("deleting : " + elementID);
        var xhr = new XMLHttpRequest();

        // Define the request method, URL, and set asynchronous to true
        xhr.open(
            "GET",
            "/web-new/delete/" + window.location.pathname.split("/")[2] + "/" + elementID,
            true
        );

        // Set up a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    var responseData = JSON.parse(xhr.responseText);
                    console.log(responseData);
                    document.getElementById(elementID).remove()
                } else {
                    // There was an error with the request
                    console.error("Error:", xhr.status);
                }
            }
        };

        // Send the request
        xhr.send();
    }
    $(input1).change(function () {
        var curElement = $(this).closest(".containers1").find(".image");
        console.log(curElement);
        var reader = new FileReader();
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            curElement.attr("src", e.target.result);
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
    async function generateDynamicHTML() {
        // Example: Generate label and input for background color
        generateLabelInputPair(
            row,
            "Select Background Color",
            "backgroundColor" + j,
            "color"
        );

        generateLabelInputPair(
            row,
            "Select Image Radius",
            "imageradius" + j,
            "number",
            1,
            1,
            50
        );

        var saveButton = document.createElement("button");
        saveButton.className = "btn btn-primary";
        saveButton.type = "button";
        saveButton.textContent = "Save";
        saveButton.onclick = save;
        row.appendChild(saveButton);
        offcanvasBody.appendChild(row);
        // Append the generated content to offcanvasBody
        offcanvas.appendChild(offcanvasBody);
        offcanvasBody.appendChild(saveButton);
        saveButton.setAttribute('onclick', "saveTemplate2(" + j + ")");
        saveButton.setAttribute('data-bs-toggle', "offcanvas");
        saveButton.setAttribute('data-bs-target', "#demo" + j);
        // ajax

        const response = await fetch("/get-csrf-token");

        // Storing data in form of JSON
        var data = await response.text();
        console.log(data);
        let token = data;
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Define the request method, URL, and set asynchronous to true
        xhr.open("POST", "/web-new/add-new", true);

        // Set the request header if needed (e.g., for JSON content type)
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", token);

        // Set up a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    console.log(xhr.responseText);
                } else {
                    // There was an error with the request
                    console.error("Error:", xhr.status);
                }
            }
        };

        //console.log(document.getElementById('template1' + i).outerHTML);
        // Prepare the data to be sent (in this case, a simple JSON object)
        var dataToSend = {
            _token: token,
            nav_name: "navbar" + j,
            event_id: window.location.pathname.split("/")[2],
            element_name: "template2" + j,
            html_doc: document.getElementById("template2" + j).outerHTML,
        };

        // Convert the data to a JSON string
        var jsonData = JSON.stringify(dataToSend);

        // Send the request with the data
        xhr.send(jsonData);


    }
    // Function to generate label and input pair
    function generateLabelInputPair(
        container,
        labelText,
        inputId,
        inputType = "color",
        inputValue = "",
        min = 0,
        max = 50
    ) {
        var labelCol = document.createElement("div");
        labelCol.className = "col-7";
        var label = document.createElement("label");
        label.textContent = labelText;
        labelCol.appendChild(label);
        var inputCol = document.createElement("div");
        inputCol.className = "col-5";
        var input = document.createElement("input");
        input.type = inputType;
        input.name = "";
        input.className = "ColorInput";
        input.id = inputId;
        input.value = inputValue;
        if (inputType === "number") {
            input.min = min;
            input.max = max;
            input.classList.remove("ColorInput");
        }
        inputCol.appendChild(input);

        row.appendChild(labelCol);
        row.appendChild(inputCol);
        offcanvasBody.appendChild(row);
        offcanvasBody.appendChild(row);
    }

    // Function to generate label and select pair
    function generateLabelSelectPair(container, labelText, selectId) {
        console.log(container);
        var labelCol = document.createElement("div");
        labelCol.className = "col-6";
        var label = document.createElement("label");
        label.textContent = labelText;
        labelCol.appendChild(label);
        var selectCol = document.createElement("div");
        selectCol.className = "col-6";
        var customSelect = document.createElement("div");
        customSelect.className = "custom-select";
        var selectWrapper = document.createElement("div");
        selectWrapper.className = "select-wrapper";
        var span = document.createElement("span");
        span.id = "font";
        span.style.fontFamily = "'Abramo Serif'";
        var select = document.createElement("select");
        span.appendChild(select);
        select.classList.add("fontselector1");
        selectWrapper.appendChild(span);
        selectWrapper.appendChild(select);
        customSelect.appendChild(selectWrapper);

        selectCol.appendChild(customSelect);
    }


    function generateLabelInputPair(
        container,
        labelText,
        inputId,
        inputType = "color",
        inputValue = "",
        min = 0,
        max = 50
    ) {
        var labelCol = document.createElement("div");
        labelCol.className = "col-7";
        var label = document.createElement("label");
        label.textContent = labelText;
        labelCol.appendChild(label);
        var inputCol = document.createElement("div");
        inputCol.className = "col-5";
        var input = document.createElement("input");
        input.type = inputType;
        input.name = "";
        input.className = "ColorInput";
        input.id = inputId;
        input.value = inputValue;

        if (inputType === "number") {
            input.min = min;
            input.max = max;
            input.classList.remove("ColorInput");
        }
        if (inputType === "text") {
            input.classList.remove("ColorInput");
            input.classList.add("textContent");
            labelCol.classList.remove("col-7");
            labelCol.className = "col-6";
            inputCol.classList.remove("col-5");
            inputCol.className = "col-6";
            input.type = inputType;
        }
        inputCol.appendChild(input);
        row.appendChild(labelCol);
        row.appendChild(inputCol);
        offcanvasBody.appendChild(row);
        offcanvasBody.appendChild(row);
    }

    function save(saveButton) {
        // Extract the numeric value from the Save button's class
        var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
        var j = parseInt(buttonClass.replace("save", ""), 10);


        var styleProperties = [
            { name: "template2", type: "color", id: "backgroundColor" },
            { name: "borderRadius", type: "number", id: "imageradius" },
        ];


        // Helper function to update styles
        function updateStyle(styleProperty) {
            var inputId = styleProperty.name + j;
            var inputElement = document.getElementById(inputId);

            if (inputElement) {
                var newValue = inputElement.value;
                // Update the style of the combobox
                var combobox = document.querySelector(".comboboxtemp2" + j);
                var borderRadius = document.querySelector(".borderRadius" + j);
                console.log(newValue);
                console.log(borderRadius);
                if (combobox) {
                    if (styleProperty.type === "color") {
                        combobox.style[styleProperty.name] = newValue;
                    } else if (styleProperty.type === "number") {
                        borderRadius.style.borderRadius = newValue + "%";
                    } else if (styleProperty.type === "select") {
                        combobox.style[styleProperty.name] = newValue;
                    }
                }
                console.log("Save button clicked");
            } else {
                console.error(
                    "Input element not found for " +
                    styleProperty.name +
                    " with ID: " +
                    inputId
                );
            }
        }
        // Iterate through the style properties and update them
        styleProperties.forEach(updateStyle);
    }

    generateDynamicHTML();
}



function saveTemplate2(saveButton) {
    // Extract the numeric value from the Save button's class

    //var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
    var j = parseInt(saveButton, 10);



    var styleProperties = [
        { name: "template2", type: "color", id: "backgroundColor" },
        { name: "borderRadius", type: "number", id: "imageradius" },
    ];

    // Helper function to update styles
    function updateStyle(styleProperty) {
        console.log(styleProperty);
        var inputId = styleProperty.id + j;
        var inputElement = document.getElementById(inputId);
        var borderRadiusValue = document.getElementById("imageradius" + j).value;
        if (inputElement) {
            var newValue = inputElement.value;

            // Update the style of the combobox
            var combobox = document.querySelector(".comboboxtemp2" + j);
            var borderRadiusEle = document.querySelector("#borderRadius" + j);
            console.log(newValue);
            console.log(borderRadiusEle);
            if (combobox) {
                if (styleProperty.type === "color") {
                    combobox.style[styleProperty.name] = newValue;
                    document.getElementById(styleProperty.name + j).style.backgroundColor = newValue;
                } else if (styleProperty.type === "number") {
                    document.getElementById(styleProperty.name + j).style.borderRadius = borderRadiusValue + "%";
                } else if (styleProperty.type === "select") {
                    combobox.style[styleProperty.name] = newValue;
                }
            }
            console.log("Save button clicked");
        } else {
            console.error(
                "Input element not found for " +
                styleProperty.name +
                " with ID: " +
                inputId
            );
        }
    }
    // Iterate through the style properties and update them
    styleProperties.forEach(updateStyle);


    //save function, programmed sepratly
    saveUpdateElement('template2' + j);
}


function saveTemplate3(saveButton) {

    var k = parseInt(saveButton, 10);
    // Extract the numeric value from the Save button's class

    var combobox = document.querySelector(".comboboxtemp3" + k);
    var smallimg1 = document.querySelector(".smallimg1" + k);
    var smallimg2 = document.querySelector(".smallimg2" + k);

    // Define an array of style properties and their corresponding input types
    var styleProperties = [
        { name: "backgroundColor", type: "color" },
        { name: "borderRadius", type: "number" },

        // Add more style properties as needed
    ];

    // Helper function to update styles
    function updateStyle(styleProperty) {
        var inputId = styleProperty.name + k;
        var inputElement = document.getElementById(inputId);

        if (inputElement) {
            var newValue = inputElement.value;
            console.log(newValue);
            // Update the style of the combobox
            var comboboxtemp3 = document.querySelector(".comboboxtemp3" + k);
            var smallimg1 = document.querySelector(".smallimg1" + k);
            var smallimg2 = document.querySelector(".smallimg2" + k);
            console.log(smallimg1);
            console.log(smallimg2);
            console.log(newValue);
            console.log(newValue);

            if (combobox) {
                if (styleProperty.type === "color") {
                    comboboxtemp3.style[styleProperty.name] = newValue;
                    console.log(newValue);
                } else if (styleProperty.type === "number") {
                    smallimg1.style[styleProperty.name] = newValue + "%";
                    console.log(newValue);
                    smallimg2.style[styleProperty.name] = newValue + "%";
                }
            }
            console.log("Save button clicked");
        } else {
            console.error(
                "Input element not found for " +
                styleProperty.name +
                " with ID: " +
                inputId
            );
        }
    }
    // Iterate through the style properties and update them
    styleProperties.forEach(updateStyle);

    //save function, programmed sepratly
    saveUpdateElement('template3' + k);
}
function template3() {
    k++;
    increment++;
    var combobox = document.createElement("div");
    combobox.classList.add("comboboxtemp3" + k);
    combobox.classList.add("combobox");
    // Create the offcanvas container
    var offcanvas = document.createElement("div");
    offcanvas.classList.add("offcanvas");
    offcanvas.classList.add("offcanvas-start");
    offcanvas.id = "demo" + k;

    combobox.id = "template3" + k;
    var li = document.createElement("li");
    li.className = "nav-item";
    var a = document.createElement("a");
    a.className = "nav-link";
    a.href = "#" + "template3" + k;
    a.textContent = "nav" + increment;
    a.classList.add("nav" + increment);
    li.appendChild(a);
    navbar.appendChild(li);
    console.log(navbar);

    // Create the offcanvas header
    var offcanvasHeader = document.createElement("div");
    offcanvasHeader.classList.add("offcanvas-header");

    var h1 = document.createElement("h1");
    h1.classList.add("offcanvas-title");
    h1.textContent = "Style the theme";

    var closeButton = document.createElement("button");
    closeButton.type = "button";
    closeButton.classList.add("btn-close");
    closeButton.setAttribute("data-bs-dismiss", "offcanvas");



    offcanvasHeader.appendChild(h1);
    offcanvasHeader.appendChild(closeButton);

    function navbarName() {
        var div = document.createElement("div");
        div.classList.add("col-4");
        var div1 = document.createElement("div");
        div1.classList.add("col-8");
        var label = document.createElement("label");
        label.textContent = "navbar" + i;
        label.classList.add("navlabel");
        label.textContent = "navbar" + increment;
        navinput = document.createElement("input");
        navinput.classList.add("navinput");
        navinput.classList.add("navinput" + increment);
        div.appendChild(label);
        div1.appendChild(navinput);
        demonav.appendChild(div);
        demonav.appendChild(div1);
        const navInputs = document.querySelectorAll(".navinput");
        for (let i = 0; i < navInputs.length; i++) {
            const navInput = navInputs[i];
            console.log(navInput);
            console.log(navInputs);
            navInput.addEventListener("change", function () {
                // Get the first class from the classList
                const numericClass = this.classList[1];
                // Assuming the first class is the numeric value and starts with "nav"
                const numericValue = numericClass
                    ? parseInt(numericClass.replace("navinput", ""), 10)
                    : null;
                const a = document.querySelector(".nav" + numericValue);

                console.log("Numeric value from class:", numericValue);
                console.log(this.value);

                a.innerHTML = this.value;
            });
        }
    }

    navbarName();
    // Create the offcanvas body
    var offcanvasBody = document.createElement("div");
    offcanvasBody.classList.add("offcanvas-body");
    // Create the row and columns
    var row = document.createElement("div");
    row.classList.add("row");
    offcanvasBody.appendChild(row);
    offcanvas.appendChild(offcanvasHeader);
    offcanvas.appendChild(offcanvasBody);
    // Append the offcanvas to the document body
    combobox.appendChild(offcanvas);

    // Create the button to toggle the offcanvas
    var offcanvasToggle = document.createElement("button");
    offcanvasToggle.classList.add("btn");
    offcanvasToggle.setAttribute("type", "button");
    offcanvasToggle.setAttribute("data-bs-toggle", "offcanvas");
    offcanvasToggle.setAttribute("data-bs-target", "#demo" + k);

    var icon = document.createElement("i");
    icon.style.fontSize = "40px";
    icon.classList.add("fa-regular");
    icon.classList.add("slideinputpreview");
    icon.classList.add("fa-pen-to-square");

    offcanvasToggle.appendChild(icon);

    // Append the button to the document body
    combobox.appendChild(offcanvasToggle);

    var spanbutton = document.createElement("button");
    spanbutton.classList.add("item-1");
    spanbutton.classList.add("close");
    var innerspan = document.createElement("span");
    var labelspan = document.createElement("span");
    innerspan.classList.add("inner");
    labelspan.classList.add("label");
    labelspan.textContent = "Close";

    innerspan.appendChild(labelspan);
    spanbutton.appendChild(innerspan);
    combobox.appendChild(spanbutton);
    spanbutton.setAttribute("onClick", "closeElement('template3" + k + "')");
    var containers1 = document.createElement("div");

    combobox.appendChild(containers1);
    boxes.appendChild(combobox);
    // combobox.appendChild(button2);
    containers1.classList.add("containers");
    containers1.classList.add("col-lg-6");
    containers1.classList.add("col-auto");
    var containers2 = document.createElement("div");
    containers2.classList.add("containers");
    containers2.classList.add("col-lg-6");
    containers2.classList.add("col-auto");
    combobox.appendChild(containers1);
    combobox.appendChild(containers2);
    var div = document.createElement("div");
    var div1 = document.createElement("div");
    var img1 = document.createElement("img");
    img1.src = "http://via.placeholder.com/700x500";
    img1.classList.add("image");
    img1.classList.add("img-fluid");
    img1.classList.add("smallimg1" + k);
    div.appendChild(img1);
    containers1.appendChild(div);
    var img2 = document.createElement("img");
    img2.src = "http://via.placeholder.com/700x500";
    img2.classList.add("image");
    img2.classList.add("img-fluid");
    img2.classList.add("smallimg2" + k);
    div1.appendChild(img2);
    containers1.appendChild(div);
    containers2.appendChild(div1);
    button1 = document.createElement("button");
    button1.classList.add("btn");
    button1.classList.add("file-upload");
    button1.textContent = "Choose a file";
    containers1.appendChild(button1);
    input1 = document.createElement("input");
    input1.classList.add("file-input");
    input1.type = "file";
    button1.appendChild(input1);
    //all ok button
    button3 = document.createElement("button");
    button3.classList.add("btn");
    button3.classList.add("file-upload");
    button3.textContent = "Choose a file";
    containers2.appendChild(button3);
    input2 = document.createElement("input");
    input2.classList.add("file-input");
    input2.type = "file";
    button3.appendChild(input2);
    console.log(boxes);
    var spanbutton = combobox.querySelector(".close");
    spanbutton.onclick = function () {
        boxes.removeChild(combobox);
        li.removeChild(a);
        navbar.removeChild(li);
        closeElement("template3" + k);
    };

    $(input2).change(function () {
        var curElement = $(this).closest(".containers").find(".image");
        console.log(curElement);
        var reader = new FileReader();
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            curElement.attr("src", e.target.result);
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
    $(input1).change(function () {
        var curElement = $(this).closest(".containers").find(".image");
        console.log(curElement);
        var reader = new FileReader();
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            curElement.attr("src", e.target.result);
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });


    // imageupload template3

    $(document).on('imageSelected', async function (event, curElement) {
        // You can perform additional actions or send curElement details to the server here
        console.log("Image selected. Element details:", curElement);
        const response = await fetch("/get-csrf-token");

        // Storing data in form of JSON
        var data = await response.text();

        let token = data;
        // Example: Send details to the server via AJAX
        var xhr = new XMLHttpRequest();
        var url = "/web-new/upload-image-details";
        var formData = new FormData();
        var fileInput = document.querySelector(".file-input");
        console.log("asdadlkjalksdjlk" + fileInput)

        $(".file-input").change(function () {
            var fileInput = this.files[0];

            if (fileInput instanceof Blob) {
                var curElement = $(this).closest(".containers").find(".image");

                // Display the selected image in the preview
                readURL(fileInput, curElement);

                // Rest of your code
                // ...
            } else {
                console.error("Invalid file type or no file selected");
            }
        });

        function readURL(file, curElement) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // Display the selected image in the preview
                curElement.attr("src", e.target.result);
            };

            // Use FileReader's readAsDataURL method directly on the file
            reader.readAsDataURL(file);
        }


        console.log("file nin[i" + fileInput)
        var curElement = "your_element_details";
        formData.append("_token", token);
        formData.append("elementDetails", curElement);
        formData.append("image", fileInput);
        formData.append("element_name", "template1" + i);
        formData.append("event_id", window.location.pathname.split("/")[2]);

        xhr.open("POST", url, true);

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Request was successful
                console.log("Details sent successfully. Response:", xhr.responseText);
            } else {
                // Request failed
                console.error("Error sending details. Status:", xhr.status, "Response:", xhr.responseText);
            }
        };

        xhr.onerror = function () {
            console.error("Network error occurred");
        };

        xhr.send(formData);

    });
    function closeElement(elementID) {
        console.log("deleting : " + elementID);
        var xhr = new XMLHttpRequest();

        // Define the request method, URL, and set asynchronous to true
        xhr.open(
            "GET",
            "/web-new/delete/" + window.location.pathname.split("/")[2] + "/" + elementID,
            true
        );

        // Set up a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    var responseData = JSON.parse(xhr.responseText);
                    console.log(responseData);
                    document.getElementById(elementID).remove()
                } else {
                    // There was an error with the request
                    console.error("Error:", xhr.status);
                }
            }
        };

        // Send the request
        xhr.send();
    }
    async function generateDynamicHTML() {
        generateLabelInputPair(
            row,
            "Select Background Color",
            "backgroundColor" + k,
            "color"
        );

        generateLabelInputPair(
            row,
            "Select Image Radius",
            "borderRadius" + k,
            "number",
            1,
            1,
            50
        );

        var saveButton = document.createElement("button");
        saveButton.className = "btn btn-primary";
        saveButton.classList.add("save" + k);
        saveButton.type = "button";
        saveButton.textContent = "Save";
        saveButton.onclick = function () {
            save(this); // Pass the clicked Save button to the save function
        };
        saveButton.setAttribute('onclick', "saveTemplate3(" + k + ")");
        saveButton.setAttribute('data-bs-toggle', "offcanvas");
        saveButton.setAttribute('data-bs-target', "#demo" + k);

        row.appendChild(saveButton);
        offcanvasBody.appendChild(row);
        // Append the generated content to offcanvasBody
        offcanvas.appendChild(offcanvasBody);
        offcanvasBody.appendChild(saveButton);


        const response = await fetch("/get-csrf-token");

        // Storing data in form of JSON
        var data = await response.text();
        console.log(data);
        let token = data;
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Define the request method, URL, and set asynchronous to true
        xhr.open("POST", "/web-new/add-new", true);

        // Set the request header if needed (e.g., for JSON content type)
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", token);

        // Set up a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    console.log(xhr.responseText);
                } else {
                    // There was an error with the request
                    console.error("Error:", xhr.status);
                }
            }
        };

        //console.log(document.getElementById('template1' + i).outerHTML);
        // Prepare the data to be sent (in this case, a simple JSON object)
        var dataToSend = {
            _token: token,
            nav_name: "navbar" + k,
            event_id: window.location.pathname.split("/")[2],
            element_name: "template3" + k,
            html_doc: document.getElementById("template3" + k).outerHTML,
        };

        // Convert the data to a JSON string
        var jsonData = JSON.stringify(dataToSend);

        // Send the request with the data
        xhr.send(jsonData);


    }
    // Function to generate label and input pair
    function generateLabelInputPair(
        container,
        labelText,
        inputId,
        inputType = "color",
        inputValue = "",
        min = 0,
        max = 50
    ) {
        var labelCol = document.createElement("div");
        labelCol.className = "col-7";
        var label = document.createElement("label");
        label.textContent = labelText;
        labelCol.appendChild(label);
        var inputCol = document.createElement("div");
        inputCol.className = "col-5";
        var input = document.createElement("input");
        input.type = inputType;
        input.name = "";
        input.className = "ColorInput";
        input.id = inputId;
        input.value = inputValue;
        if (inputType === "number") {
            input.min = min;
            input.max = max;
            input.classList.remove("ColorInput");
        }
        inputCol.appendChild(input);
        row.appendChild(labelCol);
        row.appendChild(inputCol);
        offcanvasBody.appendChild(row);
        offcanvasBody.appendChild(row);
    }
    // Function to generate label and select pair
    function generateLabelSelectPair(container, labelText, selectId) {
        console.log(container);
        var labelCol = document.createElement("div");
        labelCol.className = "col-6";
        var label = document.createElement("label");
        label.textContent = labelText;
        labelCol.appendChild(label);
        var selectCol = document.createElement("div");
        selectCol.className = "col-6";
        var customSelect = document.createElement("div");
        customSelect.className = "custom-select";
        var selectWrapper = document.createElement("div");
        selectWrapper.className = "select-wrapper";
        var span = document.createElement("span");
        span.id = "font";
        span.style.fontFamily = "'Abramo Serif'";
        var select = document.createElement("select");
        span.appendChild(select);
        select.classList.add("fontselector1");
        selectWrapper.appendChild(span);
        selectWrapper.appendChild(select);
        customSelect.appendChild(selectWrapper);
        selectCol.appendChild(customSelect);
        // Example: Add font options to the select
        addFontOption(select, "Abramo Serif", "Abramo Serif");
        addFontOption(select, "Roboto-BlackItalic", "Roboto-BlackItalic, cursive");
        addFontOption(select, "Roboto-BlackItalic", "Roboto-BlackItalic, cursive");
        addFontOption(select, "RacingSansOne-Regular", "RacingSansOne-Regular");
        addFontOption(
            select,
            "PTSansNarrow-Regular",
            "PTSansNarrow-Regular, cursive"
        );
        addFontOption(select, "PTSansNarrow-Bold", "PTSansNarrow-Bold, cursive");
        row.appendChild(labelCol);
        row.appendChild(selectCol);
        customSelect.appendChild(select);
        // Add more font options as needed
    }
    function addFontOption(select, fontFamily, fontName, options, labelCol) {
        var option = document.createElement("option");
        option.value = fontFamily;
        option.style.fontFamily = fontName;
        option.textContent = fontName;
        select.appendChild(option);
        offcanvasBody.appendChild(select);
    }

    function save(saveButton) {
        // Extract the numeric value from the Save button's class
        var buttonClass = saveButton.classList[2];
        console.log(buttonClass); // Assuming the third class is the numeric value
        var k = parseInt(buttonClass.replace("save", ""), 10);
        // var color = document.getElementById('TextColor' + i).value;

        var combobox = document.querySelector(".comboboxtemp3" + k);
        var smallimg1 = document.querySelector(".smallimg1" + k);
        var smallimg2 = document.querySelector(".smallimg2" + k);

        // Define an array of style properties and their corresponding input types
        var styleProperties = [
            { name: "backgroundColor", type: "color" },
            { name: "borderRadius", type: "number" },

            // Add more style properties as needed
        ];

        // Helper function to update styles
        async function updateStyle(styleProperty) {
            var inputId = styleProperty.name + k;
            var inputElement = document.getElementById(inputId);

            if (inputElement) {
                var newValue = inputElement.value;
                console.log(newValue);
                // Update the style of the combobox
                var comboboxtemp3 = document.querySelector(".comboboxtemp3" + k);
                var smallimg1 = document.querySelector(".smallimg1" + k);
                var smallimg2 = document.querySelector(".smallimg2" + k);
                console.log(smallimg1);
                console.log(smallimg2);
                console.log(newValue);
                console.log(newValue);

                if (combobox) {
                    if (styleProperty.type === "color") {
                        comboboxtemp3.style[styleProperty.name] = newValue;
                        console.log(newValue);
                    } else if (styleProperty.type === "number") {
                        smallimg1.style[styleProperty.name] = newValue + "%";
                        console.log(newValue);
                        smallimg2.style[styleProperty.name] = newValue + "%";
                    }
                }
                console.log("Save button clicked");

                const response = await fetch("/get-csrf-token");

                // Storing data in form of JSON
                var data = await response.text();

                let token = data;
                // Create a new XMLHttpRequest object
                var xhr = new XMLHttpRequest();

                // Define the request method, URL, and set asynchronous to true
                xhr.open("POST", "/web-new/update", true);

                // Set the request header if needed (e.g., for JSON content type)
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.setRequestHeader("X-CSRF-TOKEN", token);

                // Set up a callback function to handle the response
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Request was successful, handle the response
                            console.log(xhr.responseText);
                        } else {
                            // There was an error with the request
                            console.error("Error:", xhr.status);
                        }
                    }
                };

                //console.log(document.getElementById('template1' + i).outerHTML);
                // Prepare the data to be sent (in this case, a simple JSON object)
                var dataToSend = {
                    _token: token,
                    event_id: window.location.pathname.split("/")[2],
                    element_name: "template3" + k,
                    html_doc: document.getElementById("template3" + k).outerHTML,
                };

                // Convert the data to a JSON string
                var jsonData = JSON.stringify(dataToSend);

                // Send the request with the data
                xhr.send(jsonData);
            } else {
                console.error(
                    "Input element not found for " +
                    styleProperty.name +
                    " with ID: " +
                    inputId
                );
            }
        }
        // Iterate through the style properties and update them
        styleProperties.forEach(updateStyle);
    }




    generateDynamicHTML();
}


function saveTemplate4(saveButton) {
    // Extract the numeric value from the Save button's class

    //var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
    var l = parseInt(saveButton, 10);
    console.log(l)
    var color1 = document.getElementById('color' + l);
    // var background = document.getElementById('backgroundColor' + l).value;
    var text = document.getElementById('boxes' + l);
    // var fontselector1 = document.querySelector('.fontselector1' + l);
    var asd = document.querySelector('#textContent' + l).value;
    var backgroundColor = document.querySelector('#backgroundColor' + l).value;
    console.log("asd" + asd)
    text.innerText = asd;
    let combobox = document.getElementById("template4" + l);
    combobox.style.background = backgroundColor;
    var color1 = document.getElementById('color' + l);
    var fontselector1 = document.querySelector('.fontselector1' + l);

    combobox.style.color = color1.value;
    combobox.style.fontFamily = fontselector1.value;
    // console.log("asd" + text);
    // console.log("fontselector1" + fontselector1);
    // console.log("text" + text);
    // console.log("text" + color1);

    var newSize = $("#fontsize" + l).val();
    console.log("fontsize" + l)
    $("#boxes" + l).css("font-size", newSize + "px");



    $(document).ready(function () {
        console.log(i)
        var newSize = $("#fontsize" + l).val();
        console.log("fontsize" + l)
        $("#template4" + l).css("font-size", newSize + "px");

    })

    combobox.style.color = color1.value;
    combobox.style.fontFamily = fontselector1.value;
    // Define an array of style properties and their corresponding input types
    var styleProperties = [
        { name: 'backgroundColor', type: 'color' },
        { name: 'textContent' },
        { name: 'borderRadius', type: 'number' },

        // Add more style properties as needed
    ];
    console.log("1first")

    console.log(l)
    var align = document.querySelector(".form-check-input:checked");
    console.log(align)


    var align = document.querySelector(".form-check-input:checked");
    try {
        if (align.id == "right") {

            text.style.textAlign = "end";
            console.log(align.id)
        }
        else if (align.id == "left") {

            text.style.textAlign = "start";
            console.log("start")
        }
        if (align.id == "center") {

            text.style.textAlign = "center";
        }
    }
    catch {
        console.log("no align selected")
    }

    function updateStyle(styleProperty) {
        var inputId = styleProperty.name + l;
        var inputElement = document.getElementById(inputId);

        if (inputElement) {
            var newValue = inputElement.value;
            // Update the style of the combobox
            var combobox = document.querySelector('.comboboxtemp1' + l);
            var borderRadius = document.getElementById('innerimage' + l);

            console.log(borderRadius)
            if (combobox) {
                if (styleProperty.type === 'color') {
                    combobox.style[styleProperty.name] = newValue;
                } else if (styleProperty.type === 'number') {
                    borderRadius.style.borderRadius = newValue + '%';
                } else if (styleProperty.type === 'select') {
                    combobox.style[styleProperty.name] = newValue;
                }
            }
            console.log('Save button clicked');
        } else {
            console.error('Input element not found for ' + styleProperty.name + ' with ID: ' + inputId);
        }
    }



    // imageupload template4

    $(document).on('imageSelected', async function (event, curElement) {
        // You can perform additional actions or send curElement details to the server here
        console.log("Image selected. Element details:", curElement);
        const response = await fetch("/get-csrf-token");

        // Storing data in form of JSON
        var data = await response.text();

        let token = data;
        // Example: Send details to the server via AJAX
        var xhr = new XMLHttpRequest();
        var url = "/web-new/upload-image-details";
        var formData = new FormData();
        var fileInput = document.querySelector(".file-input");
        console.log("asdadlkjalksdjlk" + fileInput)

        $(".file-input").change(function () {
            var fileInput = this.files[0];

            if (fileInput instanceof Blob) {
                var curElement = $(this).closest(".containers").find(".image");

                // Display the selected image in the preview
                readURL(fileInput, curElement);

                // Rest of your code
                // ...
            } else {
                console.error("Invalid file type or no file selected");
            }
        });

        function readURL(file, curElement) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // Display the selected image in the preview
                curElement.attr("src", e.target.result);
            };

            // Use FileReader's readAsDataURL method directly on the file
            reader.readAsDataURL(file);
        }


        console.log("file nin[i" + fileInput)
        var curElement = "your_element_details";
        formData.append("_token", token);
        formData.append("elementDetails", curElement);
        formData.append("image", fileInput);
        formData.append("element_name", "template1" + i);
        formData.append("event_id", window.location.pathname.split("/")[2]);

        xhr.open("POST", url, true);

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Request was successful
                console.log("Details sent successfully. Response:", xhr.responseText);
            } else {
                // Request failed
                console.error("Error sending details. Status:", xhr.status, "Response:", xhr.responseText);
            }
        };

        xhr.onerror = function () {
            console.error("Network error occurred");
        };

        xhr.send(formData);

    });








    // Helper function to update styles
    function updateStyle(styleProperty) {
        var inputId = styleProperty.name + l;
        var inputElement = document.getElementById(inputId);


        if (inputElement) {
            var newValue = inputElement.value;
            // Update the style of the combobox
            var combobox = document.querySelector('.comboboxtemp4' + l);
            var borderRadius1 = document.querySelector('.borderRadiusimg' + l);
            console.log(borderRadius1)
            if (combobox) {
                if (styleProperty.type === 'color') {
                    combobox.style.backgroundColor = newValue;

                } else if (styleProperty.type === 'number') {
                    borderRadius1.style.borderRadius = newValue + '%';
                }
            }
            console.log('Save button clicked');
        } else {
            console.error('Input element not found for ' + styleProperty.name + ' with ID: ' + inputId);
        }
    }
    // Iterate through the style properties and update them
    styleProperties.forEach(updateStyle);


    //save function, programmed sepratly
    saveUpdateElement('template4' + l);
}
function template4() {
    // navbar

    l++;
    increment++;
    var combobox = document.createElement("div");
    combobox.classList.add('comboboxtemp4' + l);
    combobox.classList.add('combobox');
    // Create the offcanvas container
    var offcanvas = document.createElement("div");
    offcanvas.classList.add("offcanvas");
    offcanvas.classList.add("offcanvas-start");
    offcanvas.id = "demo" + l;
    combobox.id = 'template4' + l;
    var li = document.createElement("li");
    li.className = "nav-item";
    var a = document.createElement("a");
    a.className = "nav-link";
    a.href = "#" + "template4" + l;
    a.textContent = "nav" + increment;
    a.classList.add("nav" + increment);
    li.appendChild(a);
    navbar.appendChild(li);
    console.log(navbar)
    // close

    console.log(navbar)
    function navbarName() {
        var div = document.createElement("div");
        div.classList.add("col-4");
        var div1 = document.createElement("div");
        div1.classList.add("col-8");
        var label = document.createElement("label");
        label.textContent = "navbar" + i;
        label.classList.add("navlabel")
        label.textContent = "navbar" + increment;
        navinput = document.createElement("input");
        navinput.classList.add("navinput");
        navinput.classList.add("navinput" + increment);
        div.appendChild(label);
        div1.appendChild(navinput);
        demonav.appendChild(div);
        demonav.appendChild(div1);
        const navInputs = document.querySelectorAll(".navinput");
        for (let i = 0; i < navInputs.length; i++) {
            const navInput = navInputs[i];
            console.log(navInput)
            console.log(navInputs)
            navInput.addEventListener("change", function () {
                // Get the first class from the classList
                const numericClass = this.classList[1];
                // Assuming the first class is the numeric value and starts with "nav"
                const numericValue = numericClass ? parseInt(numericClass.replace('navinput', ''), 10) : null;
                const a = document.querySelector(".nav" + numericValue);

                console.log("Numeric value from class:", numericValue);
                console.log(this.value);

                a.innerHTML = this.value;
            });
        }
    }
    // Assuming you have elements with the class "navinput"


    navbarName();
    // Create the offcanvas header
    var offcanvasHeader = document.createElement("div");
    offcanvasHeader.classList.add("offcanvas-header");

    var h1 = document.createElement("h1");
    h1.classList.add("offcanvas-title");
    h1.textContent = "Style the theme";

    // add text
    var box = document.createElement("div");
    box.classList.add('box');
    box.classList.add('textContentInput');
    box.setAttribute('id', 'box' + l);
    box.classList.add('col-lg-6');
    box.classList.add('col-auto');

    combobox.appendChild(box);

    // button
    var closeButton = document.createElement("button");
    closeButton.type = "button";
    closeButton.classList.add("btn-close");
    closeButton.setAttribute("data-bs-dismiss", "offcanvas");

    offcanvasHeader.appendChild(h1);
    offcanvasHeader.appendChild(closeButton);

    // Create the offcanvas body
    var offcanvasBody = document.createElement("div");
    offcanvasBody.classList.add("offcanvas-body");
    // Create the row and columns
    var row = document.createElement("div");
    row.classList.add("row");
    offcanvasBody.appendChild(row);
    offcanvas.appendChild(offcanvasHeader);
    offcanvas.appendChild(offcanvasBody);
    // Append the offcanvas to the document body
    combobox.appendChild(offcanvas);


    var box = document.createElement("div");
    box.classList.add('box');
    box.classList.add('textContentInput1' + l);
    box.setAttribute('id', 'box1' + l);
    box.classList.add('col-lg-6');
    box.classList.add('col-auto');


    combobox.appendChild(box);

    var containers = document.createElement("div");
    containers.classList.add('containers');
    containers.classList.add('col-lg-6');
    containers.classList.add('col-auto');

    // Create the button to toggle the offcanvas
    var offcanvasToggle = document.createElement("button");
    offcanvasToggle.classList.add("btn");
    offcanvasToggle.setAttribute("type", "button");
    offcanvasToggle.setAttribute("data-bs-toggle", "offcanvas");
    offcanvasToggle.setAttribute("data-bs-target", "#demo" + l);

    // combobox.style.color = color;
    // combobox.style.fontFamily = fontselector1;

    var icon = document.createElement("i");
    icon.style.fontSize = "40px";
    icon.classList.add("fa-regular");
    icon.classList.add("slideinputpreview");
    icon.classList.add("fa-pen-to-square");

    offcanvasToggle.appendChild(icon);

    // Append the button to the document body
    combobox.appendChild(offcanvasToggle);


    var spanbutton = document.createElement("button");
    spanbutton.classList.add('item-1');
    spanbutton.classList.add('close');
    var innerspan = document.createElement("span");
    var labelspan = document.createElement("span");
    innerspan.classList.add("inner");
    labelspan.classList.add("label");
    labelspan.textContent = "Close";

    innerspan.appendChild(labelspan);
    spanbutton.appendChild(innerspan);
    combobox.appendChild(spanbutton);


    //close buttons


    //add text 
    var box = document.createElement("div");
    box.classList.add('box');
    box.classList.add('col-lg-6');
    box.classList.add('col-auto');
    box.classList.add('textContentInput');
    box.setAttribute('id', 'boxes' + l);
    box.classList.add('col-lg-6');
    box.classList.add('col-auto');
    combobox.appendChild(box);
    box.textContent = "asd"
    var containers = document.createElement("div");
    containers.classList.add('containers');
    containers.classList.add('col-lg-6');
    containers.classList.add('col-auto');
    containers.classList.add('imgleft');
    // end close button
    var div = document.createElement("div");



    var img = document.createElement("img");
    img.src = "http://via.placeholder.com/700x500";
    img.classList.add('image');
    img.classList.add('img-fluid');
    img.classList.add('borderRadiusimg' + l);
    console.log(boxes);
    var button = document.createElement("button");
    button.classList.add("btn");
    button.classList.add("file-upload")
    var input = document.createElement("input");
    input.classList.add("file-input");
    input.type = "file";
    button.textContent = "Choose File";
    combobox.appendChild(spanbutton);
    combobox.appendChild(box);
    div.appendChild(img);
    button.appendChild(input);
    innerspan.appendChild(labelspan);
    containers.appendChild(div);
    containers.appendChild(button);
    boxes.appendChild(combobox);
    combobox.appendChild(containers);
    combobox.appendChild(box);
    boxes.appendChild(combobox);
    offcanvasBody.style.color = "black";
    offcanvasBody.style.fontSize = "15px";
    button.style.height = "50px";
    button.style.setProperty("font-size", "15px", "important");
    spanbutton.setAttribute("onClick", "closeElement('template4" + l + "')");

    spanbutton.onclick = function () {
        boxes.removeChild(combobox);
        closeElement("template4" + l);
    }
    $(input).change(function () {
        var curElement = $(this).closest('.containers').find(".image");
        console.log(curElement);
        var reader = new FileReader();
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            curElement.attr("src", e.target.result);
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });




    var spanbutton = combobox.querySelector('.close');
    spanbutton.onclick = function () {
        boxes.removeChild(combobox);
        li.removeChild(a);
        navbar.removeChild(li);
        closeElement("template4" + l);
    };

    function closeElement(elementID) {
        console.log("deleting : " + elementID);
        var xhr = new XMLHttpRequest();

        // Define the request method, URL, and set asynchronous to true
        xhr.open(
            "GET",
            "/web-new/delete/" + window.location.pathname.split("/")[2] + "/" + elementID,
            true
        );

        // Set up a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    var responseData = JSON.parse(xhr.responseText);
                    console.log(responseData);
                    document.getElementById(elementID).remove()
                } else {
                    // There was an error with the request
                    console.error("Error:", xhr.status);
                }
            }
        };

        // Send the request
        xhr.send();
    }


    async function generateDynamicHTML() {
        // Example: Generate label and input for background color
        generateLabelInputPair(row, 'Select Background Color', 'backgroundColor' + l, 'color',);
        // Example: Generate label and input for text color
        generateLabelInputPair(row, 'Select Font Color', 'color' + l);
        // Example: Generate label and input for image radius
        generateLabelInputPair(row, 'Select Image Radius', 'borderRadius' + l, 'number', 1, 1, 50);

        generateLabelInputPair(row, 'Enter the text', 'textContent' + l, 'text');
        // Example: Generate label and select for font style
        generateLabelSelectPair(row, 'Select Font Style', 'fontselector');

        generateLabelInputPair(row, 'Select Font Size', 'fontsize' + l, 'number');


        // Example: Generate Save button
        var saveButton = document.createElement('button');
        saveButton.className = 'btn btn-primary';
        saveButton.type = 'button';
        saveButton.classList.add('save' + l);
        saveButton.textContent = 'Save';
        console.log("save button" + saveButton)
        saveButton.onclick = function () {
            save(this);
        };
        saveButton.setAttribute('onclick', "saveTemplate4(" + l + ")");
        saveButton.setAttribute('data-bs-toggle', "offcanvas");
        saveButton.setAttribute('data-bs-target', "#demo" + l);


        row.appendChild(saveButton);
        offcanvasBody.appendChild(row);
        // Append the generated content to offcanvasBody
        offcanvas.appendChild(offcanvasBody);
        offcanvasBody.appendChild(saveButton);



        const response = await fetch("/get-csrf-token");

        // Storing data in form of JSON
        var data = await response.text();
        console.log(data);
        let token = data;
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Define the request method, URL, and set asynchronous to true
        xhr.open("POST", "/web-new/add-new", true);

        // Set the request header if needed (e.g., for JSON content type)
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", token);

        // Set up a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    console.log(xhr.responseText);
                } else {
                    // There was an error with the request
                    console.error("Error:", xhr.status);
                }
            }
        };

        //console.log(document.getElementById('template1' + i).outerHTML);
        // Prepare the data to be sent (in this case, a simple JSON object)
        var dataToSend = {
            _token: token,
            nav_name: "navbar" + l,
            event_id: window.location.pathname.split("/")[2],
            element_name: "template4" + l,
            html_doc: document.getElementById("template4" + l).outerHTML,
        };

        // Convert the data to a JSON string
        var jsonData = JSON.stringify(dataToSend);

        // Send the request with the data
        xhr.send(jsonData);




    }


    // Function to generate label and input pair
    function generateLabelInputPair(container, labelText, inputId, inputType = 'color', inputValue = '', min = 1, max = 50) {

        var labelCol = document.createElement('div');
        labelCol.className = 'col-7';
        var label = document.createElement('label');
        label.textContent = labelText;
        labelCol.appendChild(label);
        var inputCol = document.createElement('div');
        inputCol.className = 'col-5';
        var input = document.createElement('input');
        input.type = inputType;
        input.name = '';
        input.className = 'ColorInput';
        input.id = inputId;
        input.value = inputValue;
        if (inputType === 'number') {
            input.min = min;
            input.max = max;
            input.classList.remove('ColorInput');
        }
        if (inputType === 'text') {
            input.classList.remove('ColorInput');
            input.classList.add('textContent');
            labelCol.classList.remove('col-7')
            labelCol.className = 'col-6';
            inputCol.classList.remove('col-5');
            inputCol.className = 'col-6';
            input.type = inputType;

        }
        inputCol.appendChild(input);

        row.appendChild(labelCol);
        row.appendChild(inputCol);
        offcanvasBody.appendChild(row);
        offcanvasBody.appendChild(row);
    }

    // Function to generate label and select pair
    function generateLabelSelectPair(container, labelText, selectId) {
        console.log(container)
        var labelCol = document.createElement('div');
        labelCol.className = 'col-6';
        var label = document.createElement('label');
        label.textContent = labelText;
        labelCol.appendChild(label);
        var selectCol = document.createElement('div');
        selectCol.className = 'col-6';
        var customSelect = document.createElement('div');
        customSelect.className = 'custom-select';
        var selectWrapper = document.createElement('div');
        selectWrapper.className = 'select-wrapper';
        var span = document.createElement('span');
        span.id = 'font';
        span.style.fontFamily = "'Abramo Serif'";
        var select = document.createElement('select');
        span.appendChild(select);
        select.classList.add('fontselector1');
        select.classList.add('fontselector1' + l);
        selectWrapper.appendChild(span);
        selectWrapper.appendChild(select);
        customSelect.appendChild(selectWrapper);
        selectCol.appendChild(customSelect);

        // Example: Add font options to the select
        addFontOption(select, 'Abramo Serif', 'Abramo Serif');
        addFontOption(select, 'Roboto-BlackItalic', 'Roboto-BlackItalic, cursive');
        addFontOption(select, 'Roboto-BlackItalic', 'Roboto-BlackItalic, cursive');
        addFontOption(select, 'RacingSansOne-Regular', 'RacingSansOne-Regular');
        addFontOption(select, 'PTSansNarrow-Regular', 'PTSansNarrow-Regular, cursive');
        addFontOption(select, 'PTSansNarrow-Bold', 'PTSansNarrow-Bold, cursive');
        row.appendChild(labelCol);
        row.appendChild(selectCol);
        customSelect.appendChild(select);
        // Add more font options as needed
    }

    function addFontOption(select, fontFamily, fontName, options, labelCol) {
        var option = document.createElement('option');
        option.value = fontFamily;
        option.style.fontFamily = fontName;
        option.textContent = fontName;
        select.appendChild(option);
        offcanvasBody.appendChild(select);
    }
    // var buttonClass = saveButton.classList[1]; // Assuming the third class is the numeric value
    // var l = parseInt(buttonClass.replace('save', ''), 10);
    // console.log(l)save
    // var color1 = document.getElementById('color' + l);
    // // var background = document.getElementById('backgroundColor' + l).value;
    // var text = document.getElementById('boxes' + l);
    // var fontselector1 = document.querySelector('.fontselector1' + l);
    // var asd = document.querySelector('#textContent' + l);
    // console.log("asd" + text);
    // console.log("fontselector1" + fontselector1);
    // console.log("text" + text);
    // console.log("text" + color1);

    function save(saveButton) {
        // Extract the numeric value from the Save button's class
        var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
        var l = parseInt(buttonClass.replace('save', ''), 10);
        console.log(l)
        var color1 = document.getElementById('color' + l);
        // var background = document.getElementById('backgroundColor' + l).value;
        var text = document.getElementById('boxes' + l);
        // var fontselector1 = document.querySelector('.fontselector1' + l);
        var asd = document.querySelector('#textContent' + l).value;
        var backgroundColor = document.querySelector('#backgroundColor' + l).value;
        console.log("asd" + asd)
        text.innerText = asd;
        combobox.style.background = backgroundColor;
        var color1 = document.getElementById('color' + l);
        var fontselector1 = document.querySelector('.fontselector1' + l);

        combobox.style.color = color1.value;
        combobox.style.fontFamily = fontselector1.value;
        // console.log("asd" + text);
        // console.log("fontselector1" + fontselector1);
        // console.log("text" + text);
        // console.log("text" + color1);

        var newSize = $("#fontsize" + l).val();
        console.log("fontsize" + l)
        $("#boxes" + l).css("font-size", newSize + "px");



        $(document).ready(function () {
            console.log(i)
            var newSize = $("#fontsize" + l).val();
            console.log("fontsize" + l)
            $("#template4" + l).css("font-size", newSize + "px");

        })

        combobox.style.color = color1.value;
        combobox.style.fontFamily = fontselector1.value;
        // Define an array of style properties and their corresponding input types
        var styleProperties = [
            { name: 'backgroundColor', type: 'color' },
            { name: 'textContent' },
            { name: 'borderRadius', type: 'number' },

            // Add more style properties as needed
        ];
        console.log("1first")
        var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
        var l = parseInt(buttonClass.replace('save', ''), 10);
        console.log(l)
        var align = document.querySelector(".form-check-input:checked");
        console.log(align)


        var align = document.querySelector(".form-check-input:checked");
        try {
            if (align.id == "right") {

                text.style.textAlign = "end";
                console.log(align.id)
            }
            else if (align.id == "left") {

                text.style.textAlign = "start";
                console.log("start")
            }
            if (align.id == "center") {

                text.style.textAlign = "center";
            }
        }
        catch {
            console.log("no align selected")
        }

        function updateStyle(styleProperty) {
            var inputId = styleProperty.name + l;
            var inputElement = document.getElementById(inputId);

            if (inputElement) {
                var newValue = inputElement.value;
                // Update the style of the combobox
                var combobox = document.querySelector('.comboboxtemp1' + l);
                var borderRadius = document.getElementById('innerimage' + l);

                console.log(borderRadius)
                if (combobox) {
                    if (styleProperty.type === 'color') {
                        combobox.style[styleProperty.name] = newValue;
                    } else if (styleProperty.type === 'number') {
                        borderRadius.style.borderRadius = newValue + '%';
                    } else if (styleProperty.type === 'select') {
                        combobox.style[styleProperty.name] = newValue;
                    }
                }
                console.log('Save button clicked');
            } else {
                console.error('Input element not found for ' + styleProperty.name + ' with ID: ' + inputId);
            }
        }
        // Helper function to update styles
        function updateStyle(styleProperty) {
            var inputId = styleProperty.name + l;
            var inputElement = document.getElementById(inputId);


            if (inputElement) {
                var newValue = inputElement.value;
                // Update the style of the combobox
                var combobox = document.querySelector('.comboboxtemp4' + l);
                var borderRadius1 = document.querySelector('.borderRadiusimg' + l);
                console.log(borderRadius1)
                if (combobox) {
                    if (styleProperty.type === 'color') {
                        combobox.style.backgroundColor = newValue;

                    } else if (styleProperty.type === 'number') {
                        borderRadius1.style.borderRadius = newValue + '%';
                    }
                }
                console.log('Save button clicked');
            } else {
                console.error('Input element not found for ' + styleProperty.name + ' with ID: ' + inputId);
            }
        }
        // Iterate through the style properties and update them
        styleProperties.forEach(updateStyle);
    }


    var formRow = document.createElement('div');
    formRow.className = 'row';

    var labelCol = document.createElement('div');
    labelCol.className = 'col-md-auto';
    labelCol.classList.add('col-5');
    var label = document.createElement('label');
    label.textContent = 'Text Alignment';
    labelCol.appendChild(label);

    var radioCol = document.createElement('div');
    radioCol.className = 'col-md-auto';
    radioCol.classList.add('col-7');

    console.log("first")
    var alignments = ['center', 'left', 'right'];
    alignments.forEach(function (align) {
        var radioDiv = document.createElement('div');
        radioDiv.className = 'form-check form-check-inline';
        console.log("first")
        var radio = document.createElement('input');
        radio.className = 'form-check-input';
        radio.type = 'radio';
        radio.name = 'alignment';
        radio.id = align;

        var label = document.createElement('label');
        label.className = 'form-check-label';
        label.htmlFor = align;
        var icon = document.createElement('i');
        icon.className = getIconClass(align);
        label.appendChild(icon);
        radioDiv.appendChild(radio);
        radioDiv.appendChild(label);
        radioCol.appendChild(radioDiv);
    })


    formRow.appendChild(labelCol);
    formRow.appendChild(radioCol);
    row.appendChild(formRow);

    var textContainer = document.createElement('div');
    textContainer.id = 'textContainer';
    textContainer.className = 'mt-3';
    row.appendChild(textContainer);

    function setTextAlignment() {
        document.querySelector('#box' + l).style.textAlign = align;
        console.log(align)
    }

    function handleSaveButtonClick(saveButton) {
        var buttonClass = saveButton.classList[2];
        var n = parseInt(buttonClass.replace('save', ''), 10);

        // Assuming you have a function getIconClass defined.
        var align = document.querySelector(".form-check-input:checked").id;
        document.querySelector('#box' + l).style.textAlign = align;

        // Assuming you have a function setTextAlignment defined.
        setTextAlignment(align, l);

        // Assuming you have a function updateTextContent defined.
        updateTextContent(l);
    }


    function getIconClass(align) {
        switch (align) {
            case 'center':
                console.log("asda" + align)
                console.log("first")
                return 'fas fa-align-center';
            case 'left':
                closeButton;
                console.log("sec")
                return 'fas fa-align-left';
            case 'right':
                console.log("third")
                return 'fas fa-align-right';
            default:
                return '';
        }
    }
    generateDynamicHTML();
}


function saveTemplate5(saveButton) {
    // Extract the numeric value from the Save button's class

    //var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
    var m = parseInt(saveButton, 10);
    // Extract the numeric value from the Save button's class
    var font = document.querySelector('.fontselector1' + m);
    // var color = document.getElementById('TextColor' + i).value;
    var text = document.getElementById('box' + m);
    var text2 = document.getElementById('box2' + m);
    var textValue = document.getElementById('textContent' + m);
    var textValue2 = document.getElementById('textContent2' + m);


    var textColor = document.getElementById('TextColor' + m);
    console.log("asdasdasd color" + textColor.value);


    text.innerHTML = textValue.value;
    text2.innerHTML = textValue2.value;
    let combobox = document.getElementById("template5" + m)
    combobox.style.fontFamily = font.value;

    combobox.style.color = textColor.value;



    $(document).ready(function () {
        var a = $('#backgroundColor' + m).val();
        $(combobox).css("backgroundColor", a);
    });




    var align = document.querySelector(".form-check-input");
    console.log(align)


    var align = document.querySelector(".form-check-input");
    if (align.id == "right") {

        text.style.textAlign = "end";
        text2.style.textAlign = "end";
        console.log(align.id)
    }
    else if (align.id == "left") {

        text.style.textAlign = "start";
        text2.style.textAlign = "start";
        console.log("start")
    }
    if (align.id == "center") {

        text.style.textAlign = "center";
        text2.style.textAlign = "center";
    }


    // Helper function to update styles
    function updateStyle(styleProperty) {
        var inputId = styleProperty.name + l;
        var inputElement = document.getElementById(inputId);


        if (inputElement) {
            var newValue = inputElement.value;
            // Update the style of the combobox
            var combobox = document.querySelector('.comboboxtemp4' + m);
            var borderRadius1 = document.querySelector('.borderRadiusimg' + m);
            console.log(borderRadius1)
            if (combobox) {
                if (styleProperty.type === 'color') {
                    combobox.style.backgroundColor = newValue;

                } else if (styleProperty.type === 'number') {
                    borderRadius1.style.borderRadius = newValue + '%';
                }
            }
            console.log('Save button clicked');
        } else {
            console.error('Input element not found for ' + styleProperty.name + ' with ID: ' + inputId);
        }
    }
    // It

    //save function, programmed sepratly
    saveUpdateElement('template5' + m);
}

function template5() {
    m++;
    increment++;
    var combobox = document.createElement("div");
    combobox.classList.add('comboboxtemp5' + m);
    combobox.classList.add('combobox');
    // Create the offcanvas container
    var offcanvas = document.createElement("div");
    offcanvas.classList.add("offcanvas");
    offcanvas.classList.add("offcanvas-start");
    offcanvas.id = "demo" + m;

    combobox.id = 'template5' + m;
    var li = document.createElement("li");
    li.className = "nav-item";
    var a = document.createElement("a");
    a.className = "nav-link";
    a.href = "#" + "template5" + m;
    a.textContent = "nav" + increment
    li.appendChild(a);
    navbar.appendChild(li);
    console.log(navbar)

    var containers = document.createElement("div");
    containers.classList.add('containers');
    containers.classList.add('col-lg-6');
    containers.classList.add('col-auto');
    containers.classList.add('imgleft');

    // Create the offcanvas header
    var offcanvasHeader = document.createElement("div");
    offcanvasHeader.classList.add("offcanvas-header");

    var h1 = document.createElement("h1");
    h1.classList.add("offcanvas-title");
    h1.textContent = "Style the theme";

    var closeButton = document.createElement("button");
    closeButton.type = "button";
    closeButton.classList.add("btn-close");
    closeButton.setAttribute("data-bs-dismiss", "offcanvas");

    offcanvasHeader.appendChild(h1);
    offcanvasHeader.appendChild(closeButton);
    a.classList.add("nav" + increment);

    // Create the offcanvas body
    var offcanvasBody = document.createElement("div");
    offcanvasBody.classList.add("offcanvas-body");
    // Create the row and columns
    var row = document.createElement("div");
    row.classList.add("row");
    offcanvasBody.appendChild(row);
    offcanvas.appendChild(offcanvasHeader);
    offcanvas.appendChild(offcanvasBody);
    // Append the offcanvas to the document body
    combobox.appendChild(offcanvas);


    console.log(navbar)
    function navbarName() {
        var div = document.createElement("div");
        div.classList.add("col-4");
        var div1 = document.createElement("div");
        div1.classList.add("col-8");
        var label = document.createElement("label");
        label.textContent = "navbar" + i;
        label.classList.add("navlabel")
        label.textContent = "navbar" + increment;
        navinput = document.createElement("input");
        navinput.classList.add("navinput");
        navinput.classList.add("navinput" + increment);
        div.appendChild(label);
        div1.appendChild(navinput);
        demonav.appendChild(div);
        demonav.appendChild(div1);
        const navInputs = document.querySelectorAll(".navinput");
        for (let i = 0; i < navInputs.length; i++) {
            const navInput = navInputs[i];
            console.log(navInput)
            console.log(navInputs)
            navInput.addEventListener("change", function () {
                // Get the first class from the classList
                const numericClass = this.classList[1];
                // Assuming the first class is the numeric value and starts with "nav"
                const numericValue = numericClass ? parseInt(numericClass.replace('navinput', ''), 10) : null;
                const a = document.querySelector(".nav" + numericValue);

                console.log("Numeric value from class:", numericValue);
                console.log(this.value);

                a.innerHTML = this.value;
            });
        }
    }
    // Assuming you have elements with the class "navinput"


    navbarName();
    // Create the button to toggle the offcanvas
    var offcanvasToggle = document.createElement("button");
    offcanvasToggle.classList.add("btn");
    offcanvasToggle.setAttribute("type", "button");
    offcanvasToggle.setAttribute("data-bs-toggle", "offcanvas");
    offcanvasToggle.setAttribute("data-bs-target", "#demo" + m);

    // icon
    var icon = document.createElement("i");
    icon.style.fontSize = "40px";
    icon.classList.add("fa-regular");
    icon.classList.add("slideinputpreview");
    icon.classList.add("fa-pen-to-square");

    offcanvasToggle.appendChild(icon);

    // Append the button to the document body
    combobox.appendChild(offcanvasToggle);
    var closeButton = document.createElement("button");
    closeButton.classList.add('item-1');
    closeButton.classList.add('close');
    var innerSpan = document.createElement("span");
    var labelSpan = document.createElement("span");
    innerSpan.classList.add("inner");
    labelSpan.classList.add("label");
    labelSpan.textContent = "Close";
    innerSpan.appendChild(labelSpan);
    closeButton.appendChild(innerSpan);
    closeButton.setAttribute("onClick", "closeElement('template5" + m + "')");
    combobox.appendChild(closeButton);
    boxes.appendChild(combobox);
    // add text
    var box = document.createElement("div");
    box.classList.add('box');
    box.classList.add('col-lg-6');
    box.classList.add('col-auto');
    box.classList.add('textContentInput');
    box.setAttribute('id', 'box' + m);
    box.classList.add('col-lg-6');
    box.classList.add('col-auto');
    combobox.appendChild(box);


    var box2 = document.createElement("div");
    box2.classList.add('box2');
    box2.classList.add('col-lg-6');
    box2.classList.add('col-auto');
    box2.classList.add('textContentInput');
    box2.setAttribute('id', 'box2' + m);
    box2.classList.add('col-lg-6');
    box2.classList.add('col-auto');
    combobox.appendChild(box2);


    // imageupload template5

    $(document).on('imageSelected', async function (event, curElement) {
        // You can perform additional actions or send curElement details to the server here
        console.log("Image selected. Element details:", curElement);
        const response = await fetch("/get-csrf-token");

        // Storing data in form of JSON
        var data = await response.text();

        let token = data;
        // Example: Send details to the server via AJAX
        var xhr = new XMLHttpRequest();
        var url = "/web-new/upload-image-details";
        var formData = new FormData();
        var fileInput = document.querySelector(".file-input");
        console.log("asdadlkjalksdjlk" + fileInput)

        $(".file-input").change(function () {
            var fileInput = this.files[0];

            if (fileInput instanceof Blob) {
                var curElement = $(this).closest(".containers").find(".image");

                // Display the selected image in the preview
                readURL(fileInput, curElement);

                // Rest of your code
                // ...
            } else {
                console.error("Invalid file type or no file selected");
            }
        });

        function readURL(file, curElement) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // Display the selected image in the preview
                curElement.attr("src", e.target.result);
            };

            // Use FileReader's readAsDataURL method directly on the file
            reader.readAsDataURL(file);
        }


        console.log("file nin[i" + fileInput)
        var curElement = "your_element_details";
        formData.append("_token", token);
        formData.append("elementDetails", curElement);
        formData.append("image", fileInput);
        formData.append("element_name", "template1" + i);
        formData.append("event_id", window.location.pathname.split("/")[2]);

        xhr.open("POST", url, true);

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Request was successful
                console.log("Details sent successfully. Response:", xhr.responseText);
            } else {
                // Request failed
                console.error("Error sending details. Status:", xhr.status, "Response:", xhr.responseText);
            }
        };

        xhr.onerror = function () {
            console.error("Network error occurred");
        };

        xhr.send(formData);

    });

    // var spanbutton = document.createElement("button");
    // spanbutton.classList.add('item-1');
    // spanbutton.classList.add('close');
    // var innerspan = document.createElement("span");
    // var labelspan = document.createElement("span");
    // innerspan.classList.add("inner");
    // labelspan.classList.add("label");
    // labelspan.textContent = "Close";

    // innerspan.appendChild(labelspan);
    // spanbutton.appendChild(innerspan);
    // combobox.appendChild(spanbutton);

    // Text Column 1
    // var textColumn1 = createTextColumn("lorem ipsum");
    // combobox.appendChild(textColumn1);
    // // Text Column 2 (Duplicate)
    // var textColumn2 = createTextColumn("lorem text");
    // combobox.appendChild(textColumn2);
    // Close button functionality
    closeButton.onclick = function () {
        boxes.removeChild(combobox);
        li.removeChild(a);
        navbar.removeChild(li);
        closeElement("template5" + m);
    };





    // Append the combobox to the 'boxes' element
    async function generateDynamicHTML() {
        // Example: Generate label and input for background color
        generateLabelInputPair(row, 'Select Background Color', 'backgroundColor' + m, 'color',);
        // Example: Generate label and input for text color
        generateLabelInputPair(row, 'Select Font Color', 'TextColor' + m);
        // Example: Generate label and input for image radius

        generateLabelInputPair(row, 'Enter text', 'textContent' + m, 'text');
        generateLabelInputPair(row, 'Enter 2nd text', 'textContent2' + m, 'text');
        // Example: Generate label and select for font style
        generateLabelSelectPair(row, 'Select Font Style', 'fontselector');
        generateLabelInputPair(row, 'Select Font  Size', 'fontsize' + m, 'number');
        generateLabelInputPair(row, 'Select 2nd Font Size', 'fontsize1' + m, 'number');

        // Example: Generate Save button

        var saveButton = document.createElement('button');
        saveButton.className = 'btn btn-primary';
        saveButton.classList.add('save' + m)
        saveButton.type = 'button';
        saveButton.textContent = 'Save';
        saveButton.onclick = function () {
            save(this); // Pass the clicked Save button to the save function
        };
        saveButton.setAttribute('onclick', "saveTemplate5(" + m + ")");
        saveButton.setAttribute('data-bs-toggle', "offcanvas");
        saveButton.setAttribute('data-bs-target', "#demo" + m);


        //saveButton.setAttribute("onClick", "closeElement('template5" + m + "')");
        row.appendChild(saveButton);
        offcanvasBody.appendChild(row);
        // Append the generated content to offcanvasBody
        offcanvas.appendChild(offcanvasBody);
        offcanvasBody.appendChild(saveButton);

        const response = await fetch("/get-csrf-token");

        // Storing data in form of JSON
        var data = await response.text();
        console.log(data);
        let token = data;
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Define the request method, URL, and set asynchronous to true
        xhr.open("POST", "/web-new/add-new", true);

        // Set the request header if needed (e.g., for JSON content type)
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", token);

        // Set up a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    console.log(xhr.responseText);
                } else {
                    // There was an error with the request
                    console.error("Error:", xhr.status);
                }
            }
        };
        //console.log(document.getElementById('template1' + i).outerHTML);
        // Prepare the data to be sent (in this case, a simple JSON object)
        var dataToSend = {
            _token: token,
            nav_name: "navbar" + m,
            event_id: window.location.pathname.split("/")[2],
            element_name: "template5" + m,
            html_doc: document.getElementById("template5" + m).outerHTML,
        };
        // Convert the data to a JSON string
        var jsonData = JSON.stringify(dataToSend);
        // Send the request with the data
        xhr.send(jsonData);
    }
    // Function to generate label and input pair
    function generateLabelInputPair(container, labelText, inputId, inputType = 'color', inputValue = '', min = 0, max = 50) {
        var labelCol = document.createElement('div');
        labelCol.className = 'col-7';
        var label = document.createElement('label');
        label.textContent = labelText;
        labelCol.appendChild(label);
        var inputCol = document.createElement('div');
        inputCol.className = 'col-5';
        var input = document.createElement('input');
        input.type = inputType;
        input.name = '';
        input.className = 'ColorInput';
        input.id = inputId;
        input.value = inputValue;
        if (inputType === 'number') {
            input.min = min;
            input.max = max;
            input.classList.remove('ColorInput');
        } if (inputType === 'text') {
            input.classList.remove('ColorInput');
            input.classList.add('textContent');
            labelCol.classList.remove('col-7')
            labelCol.className = 'col-6';
            inputCol.classList.remove('col-5');
            inputCol.className = 'col-6';
            input.type = inputType;
        }
        inputCol.appendChild(input);
        row.appendChild(labelCol);
        row.appendChild(inputCol);
        offcanvasBody.appendChild(row);
        offcanvasBody.appendChild(row);
    }

    // Function to generate label and select pair
    function generateLabelSelectPair(container, labelText, selectId) {
        console.log(container)
        var labelCol = document.createElement('div');
        labelCol.className = 'col-6';
        var label = document.createElement('label');
        label.textContent = labelText;
        labelCol.appendChild(label);
        var selectCol = document.createElement('div');
        selectCol.className = 'col-6';
        var customSelect = document.createElement('div');
        customSelect.className = 'custom-select';
        var selectWrapper = document.createElement('div');
        selectWrapper.className = 'select-wrapper';
        var span = document.createElement('span');
        span.id = 'font';
        span.style.fontFamily = "'Abramo Serif'";
        var select = document.createElement('select');
        span.appendChild(select);
        select.classList.add('fontselector1' + m);
        select.classList.add('fontselector1');
        selectWrapper.appendChild(span);
        selectWrapper.appendChild(select);
        customSelect.appendChild(selectWrapper);

        selectCol.appendChild(customSelect);

        // Example: Add font options to the select
        addFontOption(select, 'Abramo Serif', 'Abramo Serif');
        addFontOption(select, 'Roboto-BlackItalic', 'Roboto-BlackItalic, cursive');
        addFontOption(select, 'Roboto-BlackItalic', 'Roboto-BlackItalic, cursive');
        addFontOption(select, 'RacingSansOne-Regular', 'RacingSansOne-Regular');
        addFontOption(select, 'PTSansNarrow-Regular', 'PTSansNarrow-Regular, cursive');
        addFontOption(select, 'PTSansNarrow-Bold', 'PTSansNarrow-Bold, cursive');
        row.appendChild(labelCol);
        row.appendChild(selectCol);
        customSelect.appendChild(select);
        // Add more font options as needed
    }

    function addFontOption(select, fontFamily, fontName, options, labelCol) {
        var option = document.createElement('option');
        option.value = fontFamily;
        option.style.fontFamily = fontName;
        option.textContent = fontName;
        select.appendChild(option);
        offcanvasBody.appendChild(select);
    }

    offcanvasBody.style.color = "black";
    offcanvasBody.style.fontSize = "15px";


    function save(saveButton) {
        // Extract the numeric value from the Save button's class
        var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
        var m = parseInt(buttonClass.replace('save', ''), 10);
        var font = document.querySelector('.fontselector1' + m);
        // var color = document.getElementById('TextColor' + i).value;
        var text = document.getElementById('box' + m);
        var text2 = document.getElementById('box2' + m);
        var textValue = document.getElementById('textContent' + m);
        var textValue2 = document.getElementById('textContent2' + m);


        var textColor = document.getElementById('TextColor' + m);
        console.log("asdasdasd color" + textColor.value);


        text.innerHTML = textValue.value;
        text2.innerHTML = textValue2.value;
        combobox.style.fontFamily = font.value;

        combobox.style.color = textColor.value;



        $(document).ready(function () {
            var a = $('#backgroundColor' + m).val();
            $(combobox).css("backgroundColor", a);
        });

        function closeElement(elementID) {
            console.log("deleting : " + elementID);
            var xhr = new XMLHttpRequest();

            // Define the request method, URL, and set asynchronous to true
            xhr.open(
                "GET",
                "/web-new/delete/" + window.location.pathname.split("/")[2] + "/" + elementID,
                true
            );

            // Set up a callback function to handle the response
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Request was successful, handle the response
                        var responseData = JSON.parse(xhr.responseText);
                        console.log(responseData);
                        document.getElementById(elementID).remove()
                    } else {
                        // There was an error with the request
                        console.error("Error:", xhr.status);
                    }
                }
            };

            // Send the request
            xhr.send();
        }

        console.log("1first")
        var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
        var m = parseInt(buttonClass.replace('save', ''), 10);
        console.log(l)
        var align = document.querySelector(".form-check-input:checked");
        console.log(align)


        var align = document.querySelector(".form-check-input:checked");
        if (align.id == "right") {

            text.style.textAlign = "end";
            text2.style.textAlign = "end";
            console.log(align.id)
        }
        else if (align.id == "left") {

            text.style.textAlign = "start";
            text2.style.textAlign = "start";
            console.log("start")
        }
        if (align.id == "center") {

            text.style.textAlign = "center";
            text2.style.textAlign = "center";
        }


        // Helper function to update styles
        function updateStyle(styleProperty) {
            var inputId = styleProperty.name + l;
            var inputElement = document.getElementById(inputId);


            if (inputElement) {
                var newValue = inputElement.value;
                // Update the style of the combobox
                var combobox = document.querySelector('.comboboxtemp4' + m);
                var borderRadius1 = document.querySelector('.borderRadiusimg' + m);
                console.log(borderRadius1)
                if (combobox) {
                    if (styleProperty.type === 'color') {
                        combobox.style.backgroundColor = newValue;

                    } else if (styleProperty.type === 'number') {
                        borderRadius1.style.borderRadius = newValue + '%';
                    }
                }
                console.log('Save button clicked');
            } else {
                console.error('Input element not found for ' + styleProperty.name + ' with ID: ' + inputId);
            }
        }
        // Iterate through the style properties and update them
        // styleProperties.forEach(updateStyle);
    }


    var formRow = document.createElement('div');
    formRow.className = 'row';

    var labelCol = document.createElement('div');
    labelCol.className = 'col-md-auto';
    labelCol.classList.add('col-5');
    var label = document.createElement('label');
    label.textContent = 'Text Alignment';
    labelCol.appendChild(label);

    var radioCol = document.createElement('div');
    radioCol.className = 'col-md-auto';
    radioCol.classList.add('col-7');

    console.log("first")
    var alignments = ['center', 'left', 'right'];
    alignments.forEach(function (align) {
        var radioDiv = document.createElement('div');
        radioDiv.className = 'form-check form-check-inline';
        console.log("first")
        var radio = document.createElement('input');
        radio.className = 'form-check-input';
        radio.type = 'radio';
        radio.name = 'alignment';
        radio.id = align;

        var label = document.createElement('label');
        label.className = 'form-check-label';
        label.htmlFor = align;
        var icon = document.createElement('i');
        icon.className = getIconClass(align);
        label.appendChild(icon);
        radioDiv.appendChild(radio);
        radioDiv.appendChild(label);
        radioCol.appendChild(radioDiv);
    })


    formRow.appendChild(labelCol);
    formRow.appendChild(radioCol);
    row.appendChild(formRow);

    var textContainer = document.createElement('div');
    textContainer.id = 'textContainer';
    textContainer.className = 'mt-3';
    row.appendChild(textContainer);

    function setTextAlignment() {
        document.querySelector('#box' + m).style.textAlign = align;
        console.log(align)
    }

    function handleSaveButtonClick(saveButton) {
        var buttonClass = saveButton.classList[2];
        var n = parseInt(buttonClass.replace('save', ''), 10);

        // Assuming you have a function getIconClass defined.
        var align = document.querySelector(".form-check-input:checked").id;
        document.querySelector('#box' + m).style.textAlign = align;

        // Assuming you have a function setTextAlignment defined.
        setTextAlignment(align, m);

        // Assuming you have a function updateTextContent defined.
        updateTextContent(m);
    }


    function getIconClass(align) {
        switch (align) {
            case 'center':
                console.log("asda" + align)
                console.log("first")
                return 'fas fa-align-center';
            case 'left':
                closeButton;
                console.log("sec")
                return 'fas fa-align-left';
            case 'right':
                console.log("third")
                return 'fas fa-align-right';
            default:
                return '';
        }
    }

    generateDynamicHTML();
}

function createTextColumn(initialText) {
    var textColumn = document.createElement("div");
    textColumn.classList.add("box");
    textColumn.classList.add("col-lg-6");
    textColumn.classList.add("col-auto");
    var textSpan = document.createElement("span");
}
window.addEventListener("DOMContentLoaded", () => {
    console.log("DOM content loaded");
    var isSmallScreen = window.matchMedia("(max-width: 680px)").matches;
    if (isSmallScreen == true) {
        var imgElements = document.getElementsByTagName("img");
        for (var i = 0; i < imgElements.length; i++) {
            if (imgElements[i].classList.contains("image")) {
                imgElements[i].classList.remove("image");
            }
        }
    }
});


function saveTemplate6(saveButton) {
    // Extract the numeric value from the Save button's class

    //var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
    var n = parseInt(saveButton, 10);

    // var color = document.getElementById('TextColor' + i).value;
    var text = document.getElementById('box' + n);

    var textValue = document.getElementById('textContent' + n);
    var font = document.querySelector('.fontselector1' + n);

    var textColor = document.getElementById('TextColor' + n).value;
    console.log(('textContent' + n));
    console.log(textValue)
    text.innerHTML = textValue.value;
    var combobox = document.getElementById("template6" + n);
    combobox.style.fontFamily = font.value;







    console.log(n)
    var newSize = $("#fontsize" + n).val();
    console.log("fontsize" + n)
    $("#box" + n).css("font-size", newSize + "px");
    // var textValue = document.getElementById('textContent' + m).value;

    var comboboxtemp2 = document.querySelector('.comboboxtemp6' + n);
    // text.innerHTML = textValue;
    comboboxtemp2.style.color = textColor;

    // combobox.style.color = color;
    // Define an array of style properties and their corresponding input types
    var styleProperties = [
        { name: 'backgroundColor', type: 'color' },
        { name: 'TextColor', type: 'color', id: 'TextColor' + n },


        // Add more style properties as needed
    ];

    // Helper function to update styles
    function updateStyle(styleProperty) {
        var inputId = styleProperty.name + n;
        var inputElement = document.getElementById(inputId);

        if (inputElement) {
            var newValue = inputElement.value;
            // Update the style of the combobox
            var combobox = document.querySelector('.comboboxtemp6' + n);


            if (combobox) {
                if (styleProperty.type === 'color') {
                    combobox.style[styleProperty.name] = newValue;
                }

                else if (styleProperty.type === 'text') {
                    combobox.innerHTML = newValue;
                }
            }
            console.log('Save button clicked');
        } else {
            console.error('Input element not found for ' + styleProperty.name + ' with ID: ' + inputId);
        }
    }
    // Iterate through the style properties and update them
    styleProperties.forEach(updateStyle);
    //save function, programmed sepratly
    saveUpdateElement('template6' + n);
}


// imageupload template6

$(document).on('imageSelected', async function (event, curElement) {
    // You can perform additional actions or send curElement details to the server here
    console.log("Image selected. Element details:", curElement);
    const response = await fetch("/get-csrf-token");

    // Storing data in form of JSON
    var data = await response.text();

    let token = data;
    // Example: Send details to the server via AJAX
    var xhr = new XMLHttpRequest();
    var url = "/web-new/upload-image-details";
    var formData = new FormData();
    var fileInput = document.querySelector(".file-input");
    console.log("asdadlkjalksdjlk" + fileInput)

    $(".file-input").change(function () {
        var fileInput = this.files[0];

        if (fileInput instanceof Blob) {
            var curElement = $(this).closest(".containers").find(".image");

            // Display the selected image in the preview
            readURL(fileInput, curElement);

            // Rest of your code
            // ...
        } else {
            console.error("Invalid file type or no file selected");
        }
    });

    function readURL(file, curElement) {
        var reader = new FileReader();

        reader.onload = function (e) {
            // Display the selected image in the preview
            curElement.attr("src", e.target.result);
        };

        // Use FileReader's readAsDataURL method directly on the file
        reader.readAsDataURL(file);
    }


    console.log("file nin[i" + fileInput)
    var curElement = "your_element_details";
    formData.append("_token", token);
    formData.append("elementDetails", curElement);
    formData.append("image", fileInput);
    formData.append("element_name", "template1" + i);
    formData.append("event_id", window.location.pathname.split("/")[2]);

    xhr.open("POST", url, true);

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Request was successful
            console.log("Details sent successfully. Response:", xhr.responseText);
        } else {
            // Request failed
            console.error("Error sending details. Status:", xhr.status, "Response:", xhr.responseText);
        }
    };

    xhr.onerror = function () {
        console.error("Network error occurred");
    };

    xhr.send(formData);

});


function template6() {
    n++;
    increment++;
    var combobox = document.createElement("div");
    combobox.classList.add('comboboxtemp6' + n);
    combobox.classList.add('combobox');
    // Create the offcanvas container
    var offcanvas = document.createElement("div");
    offcanvas.classList.add("offcanvas");
    offcanvas.classList.add("offcanvas-start");
    offcanvas.id = "demo" + n;

    combobox.id = 'template6' + n;
    var li = document.createElement("li");
    li.className = "nav-item";
    var a = document.createElement("a");
    a.className = "nav-link";
    a.href = "#" + "template6" + n;
    a.textContent = "nav" + increment;
    li.appendChild(a);
    navbar.appendChild(li);
    console.log(navbar)


    // Create the offcanvas header
    var offcanvasHeader = document.createElement("div");
    offcanvasHeader.classList.add("offcanvas-header");

    var h1 = document.createElement("h1");
    h1.classList.add("offcanvas-title");
    h1.textContent = "Style the theme";

    var closeButton = document.createElement("button");
    closeButton.type = "button";
    closeButton.classList.add("btn-close");
    closeButton.setAttribute("data-bs-dismiss", "offcanvas");
    closeButton.setAttribute("onClick", "closeElement('template6" + n + "')");
    offcanvasHeader.appendChild(h1);
    offcanvasHeader.appendChild(closeButton);
    a.classList.add("nav" + increment);

    console.log(navbar)
    function navbarName() {
        var div = document.createElement("div");
        div.classList.add("col-4");
        var div1 = document.createElement("div");
        div1.classList.add("col-8");
        var label = document.createElement("label");
        label.textContent = "navbar" + increment;
        label.classList.add("navlabel")
        label.textContent = "navbar" + increment;
        navinput = document.createElement("input");
        navinput.classList.add("navinput");
        navinput.classList.add("navinput" + increment);
        div.appendChild(label);
        div1.appendChild(navinput);
        demonav.appendChild(div);
        demonav.appendChild(div1);
        const navInputs = document.querySelectorAll(".navinput");
        for (let i = 0; i < navInputs.length; i++) {
            const navInput = navInputs[i];
            console.log(navInput)
            console.log(navInputs)
            navInput.addEventListener("change", function () {
                // Get the first class from the classList
                const numericClass = this.classList[1];
                // Assuming the first class is the numeric value and starts with "nav"
                const numericValue = numericClass ? parseInt(numericClass.replace('navinput', ''), 10) : null;
                const a = document.querySelector(".nav" + numericValue);

                console.log("Numeric value from class:", numericValue);
                console.log(this.value);

                a.innerHTML = this.value;
            });
        }
    }
    // Assuming you have elements with the class "navinput"
    function closeElement(elementID) {
        console.log("deleting : " + elementID);
        var xhr = new XMLHttpRequest();

        // Define the request method, URL, and set asynchronous to true
        xhr.open(
            "GET",
            "/web-new/delete/" + window.location.pathname.split("/")[2] + "/" + elementID,
            true
        );

        // Set up a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    var responseData = JSON.parse(xhr.responseText);
                    console.log(responseData);
                    document.getElementById(elementID).remove()
                } else {
                    // There was an error with the request
                    console.error("Error:", xhr.status);
                }
            }
        };

        // Send the request
        xhr.send();
    }
    navbarName();
    // Create the offcanvas body
    var offcanvasBody = document.createElement("div");
    offcanvasBody.classList.add("offcanvas-body");
    // Create the row and columns
    var row = document.createElement("div");
    row.classList.add("row");
    offcanvasBody.appendChild(row);
    offcanvas.appendChild(offcanvasHeader);
    offcanvas.appendChild(offcanvasBody);
    // Append the offcanvas to the document body
    combobox.appendChild(offcanvas);

    // Create the button to toggle the offcanvas
    var offcanvasToggle = document.createElement("button");
    offcanvasToggle.classList.add("btn");
    offcanvasToggle.setAttribute("type", "button");
    offcanvasToggle.setAttribute("data-bs-toggle", "offcanvas");
    offcanvasToggle.setAttribute("data-bs-target", "#demo" + n);

    var icon = document.createElement("i");
    icon.style.fontSize = "40px";
    icon.classList.add("fa-regular");
    icon.classList.add("slideinputpreview");
    icon.classList.add("fa-pen-to-square");

    offcanvasToggle.appendChild(icon);
    // add text
    var box = document.createElement("div");

    box.classList.add('col-lg-6');
    box.classList.add('col-auto');
    box.classList.add('textContentInput');
    box.setAttribute('id', 'box' + n);
    box.classList.add('col-lg-12');
    box.classList.add('col-auto');
    combobox.appendChild(box);
    offcanvasBody.style.color = "black";
    offcanvasBody.style.fontSize = "15px";

    // Append the button to the document body
    combobox.appendChild(offcanvasToggle);
    var spanbutton = document.createElement("button");
    spanbutton.classList.add('item-1');
    spanbutton.classList.add('close');
    var innerspan = document.createElement("span");
    var labelspan = document.createElement("span");
    innerspan.classList.add("inner");
    labelspan.classList.add("label");
    labelspan.textContent = "Close";
    innerspan.appendChild(labelspan);
    spanbutton.appendChild(innerspan);
    combobox.appendChild(spanbutton);
    // boxes.appendChild(combobox);



    //close buttons

    // end close button
    var div = document.createElement("div");
    var input = document.createElement("input");
    input.classList.add("file-input");
    input.type = "file";

    offcanvasBody.style.color = "black";
    offcanvasBody.style.fontSize = "15px";
    combobox.appendChild(box);

    innerspan.appendChild(labelspan);
    boxes.appendChild(combobox);
    combobox.appendChild(box);
    boxes.appendChild(combobox);
    spanbutton.onclick = function () {
        boxes.removeChild(combobox);
        li.removeChild(a);
        navbar.removeChild(li);
        closeElement("template6" + i);
    }
    $(input).change(function () {
        var curElement = $(this).closest('.containers').find(".image");
        console.log(curElement);
        var reader = new FileReader();
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            curElement.attr("src", e.target.result);
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    var spanbutton = combobox.querySelector('.close');

    spanbutton.setAttribute("onClick", "closeElement('template6" + n + "')");


    async function generateDynamicHTML() {
        // Example: Generate label and input for background color
        generateLabelInputPair(row, 'Select Background Color', 'backgroundColor' + n, 'color',);
        // Example: Generate label and input for text color
        generateLabelInputPair(row, 'Select Font Color', 'TextColor' + n, 'color');


        generateLabelInputPair(row, 'Enter your text', 'textContent' + n, 'text');
        // Example: Generate label and input for image radius
        // Example: Generate label and select for font style
        generateLabelSelectPair(row, 'Select Font Style' + n, 'fontselector');

        generateLabelInputPair(row, 'Select Font  Size', 'fontsize' + n, 'number');



        // Example: Generate Save button
        var saveButton = document.createElement('button');
        saveButton.className = 'btn btn-primary';
        saveButton.classList.add('save' + n)
        saveButton.type = 'button';
        saveButton.textContent = 'Save';
        saveButton.onclick = function () {
            save(this); // Pass the clicked Save button to the save function
            save1(this); // Pass the clicked Save button to the save function
        };
        saveButton.setAttribute('onclick', "saveTemplate6(" + n + ")");
        saveButton.setAttribute('data-bs-toggle', "offcanvas");
        saveButton.setAttribute('data-bs-target', "#demo" + n);

        row.appendChild(saveButton);
        offcanvasBody.appendChild(row);
        // Append the generated content to offcanvasBody
        offcanvas.appendChild(offcanvasBody);
        offcanvasBody.appendChild(saveButton);


        const response = await fetch("/get-csrf-token");

        // Storing data in form of JSON
        var data = await response.text();
        console.log(data);
        let token = data;
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Define the request method, URL, and set asynchronous to true
        xhr.open("POST", "/web-new/add-new", true);

        // Set the request header if needed (e.g., for JSON content type)
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", token);

        // Set up a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    console.log(xhr.responseText);
                } else {
                    // There was an error with the request
                    console.error("Error:", xhr.status);
                }
            }
        };

        //console.log(document.getElementById('template1' + i).outerHTML);
        // Prepare the data to be sent (in this case, a simple JSON object)
        var dataToSend = {
            _token: token,
            nav_name: "navbar" + n,
            event_id: window.location.pathname.split("/")[2],
            element_name: "template6" + n,
            html_doc: document.getElementById("template6" + n).outerHTML,
        };

        // Convert the data to a JSON string
        var jsonData = JSON.stringify(dataToSend);

        // Send the request with the data
        xhr.send(jsonData);



    }
    $(".form-check-input").change(function () {
        var align = document.querySelector(".form-check-input:checked");
    })
    // Function to generate label and input pair
    function generateLabelInputPair(container, labelText, inputId, inputType = 'color', inputValue = '', min = 0, max = 50) {

        var labelCol = document.createElement('div');
        labelCol.className = 'col-7';
        var label = document.createElement('label');
        label.textContent = labelText;
        labelCol.appendChild(label);
        var inputCol = document.createElement('div');
        inputCol.className = 'col-5';
        var input = document.createElement('input');
        input.type = inputType;
        input.name = '';
        input.className = 'ColorInput';
        input.id = inputId;
        input.value = inputValue;
        if (inputType === 'number') {
            input.min = min;
            input.max = max;
            input.classList.remove('ColorInput');
        } if (inputType === 'text') {
            input.classList.remove('ColorInput');
            input.classList.add('textContent');
            labelCol.classList.remove('col-7')
            labelCol.className = 'col-6';
            inputCol.classList.remove('col-5');
            inputCol.className = 'col-6';
            input.type = inputType;

        }
        inputCol.appendChild(input);
        row.appendChild(labelCol);
        row.appendChild(inputCol);

        offcanvasBody.appendChild(row);
        offcanvasBody.appendChild(row);
    }


    var formRow = document.createElement('div');
    formRow.className = 'row';

    var labelCol = document.createElement('div');
    labelCol.className = 'col-md-auto';
    labelCol.classList.add('col-5');
    var label = document.createElement('label');
    label.textContent = 'Text Alignment';
    labelCol.appendChild(label);

    var radioCol = document.createElement('div');
    radioCol.className = 'col-md-auto';
    radioCol.classList.add('col-7');
    function save1(saveButton) {
        console.log("1first")
        var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
        var n = parseInt(buttonClass.replace('save', ''), 10);
        console.log(n)
        var align = document.querySelector(".form-check-input:checked").id;
        console.log(align)


        var align = document.querySelector(".form-check-input:checked");
        if (align.id == "right") {

            document.querySelector('#box' + n).style.textAlign = "end";
            console.log(align.id)
        }
        else if (align.id == "left") {

            document.querySelector('#box' + n).style.textAlign = "start";
            console.log("start")
        }
        if (align.id == "center") {

            document.querySelector('#box' + n).style.textAlign = "center";
        }
    }
    console.log("first")
    var alignments = ['center', 'left', 'right'];
    alignments.forEach(function (align) {
        var radioDiv = document.createElement('div');
        radioDiv.className = 'form-check form-check-inline';
        console.log("first")
        var radio = document.createElement('input');
        radio.className = 'form-check-input';
        radio.type = 'radio';
        radio.name = 'alignment';
        radio.id = align;

        var label = document.createElement('label');
        label.className = 'form-check-label';
        label.htmlFor = align;
        var icon = document.createElement('i');
        icon.className = getIconClass(align);
        label.appendChild(icon);
        radioDiv.appendChild(radio);
        radioDiv.appendChild(label);
        radioCol.appendChild(radioDiv);
    })


    formRow.appendChild(labelCol);
    formRow.appendChild(radioCol);
    row.appendChild(formRow);

    var textContainer = document.createElement('div');
    textContainer.id = 'textContainer';
    textContainer.className = 'mt-3';
    row.appendChild(textContainer);

    function setTextAlignment() {
        document.querySelector('#box' + n).style.textAlign = align;
        console.log(align)
    }

    function handleSaveButtonClick(saveButton) {
        var buttonClass = saveButton.classList[2];
        var n = parseInt(buttonClass.replace('save', ''), 10);

        // Assuming you have a function getIconClass defined.
        var align = document.querySelector(".form-check-input:checked").id;
        document.querySelector('#box' + n).style.textAlign = align;

        // Assuming you have a function setTextAlignment defined.
        setTextAlignment(align, n);

        // Assuming you have a function updateTextContent defined.
        updateTextContent(n);
    }


    function getIconClass(align) {
        switch (align) {
            case 'center':
                console.log("asda" + align)
                console.log("first")
                return 'fas fa-align-center';
            case 'left':
                closeButton;
                console.log("sec")
                return 'fas fa-align-left';
            case 'right':
                console.log("third")
                return 'fas fa-align-right';
            default:
                return '';
        }
    }


    // Function to generate label and select pair
    function generateLabelSelectPair(container, labelText, selectId) {
        console.log(container)
        var labelCol = document.createElement('div');
        labelCol.className = 'col-6';
        var label = document.createElement('label');
        label.textContent = labelText;
        labelCol.appendChild(label);
        var selectCol = document.createElement('div');
        selectCol.className = 'col-6';
        var customSelect = document.createElement('div');
        customSelect.className = 'custom-select';
        var selectWrapper = document.createElement('div');
        selectWrapper.className = 'select-wrapper';
        var span = document.createElement('span');
        span.id = 'font';
        span.style.fontFamily = "'Abramo Serif'";
        var select = document.createElement('select');
        span.appendChild(select);
        select.classList.add('fontselector1' + n);
        select.classList.add('fontselector1');
        selectWrapper.appendChild(span);
        selectWrapper.appendChild(select);
        customSelect.appendChild(selectWrapper);

        selectCol.appendChild(customSelect);


        // Example: Add font options to the select
        addFontOption(select, 'Abramo Serif', 'Abramo Serif');
        addFontOption(select, 'Roboto-BlackItalic', 'Roboto-BlackItalic, cursive');
        addFontOption(select, 'Roboto-BlackItalic', 'Roboto-BlackItalic, cursive');
        addFontOption(select, 'RacingSansOne-Regular', 'RacingSansOne-Regular');
        addFontOption(select, 'PTSansNarrow-Regular', 'PTSansNarrow-Regular, cursive');
        addFontOption(select, 'PTSansNarrow-Bold', 'PTSansNarrow-Bold, cursive');
        row.appendChild(labelCol);
        row.appendChild(selectCol);
        customSelect.appendChild(select);
        // Add more font options as needed
    }

    function addFontOption(select, fontFamily, fontName, options, labelCol) {
        var option = document.createElement('option');
        option.value = fontFamily;
        option.style.fontFamily = fontName;
        option.textContent = fontName;
        select.appendChild(option);
        offcanvasBody.appendChild(select);
    }
    function save(saveButton) {
        // Extract the numeric value from the Save button's class
        console.log("first")
        var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
        var n = parseInt(buttonClass.replace('save', ''), 10);
        // var color = document.getElementById('TextColor' + i).value;
        var text = document.getElementById('box' + n);

        var textValue = document.getElementById('textContent' + n);
        var font = document.querySelector('.fontselector1' + n);

        var textColor = document.getElementById('TextColor' + n).value;
        console.log(('textContent' + n));
        console.log(textValue)
        text.innerHTML = textValue.value;
        combobox.style.fontFamily = font.value;







        console.log(n)
        var newSize = $("#fontsize" + n).val();
        console.log("fontsize" + n)
        $("#box" + n).css("font-size", newSize + "px");
        // var textValue = document.getElementById('textContent' + m).value;

        var comboboxtemp2 = document.querySelector('.comboboxtemp6' + n);
        // text.innerHTML = textValue;
        comboboxtemp2.style.color = textColor;

        // combobox.style.color = color;
        // Define an array of style properties and their corresponding input types
        var styleProperties = [
            { name: 'backgroundColor', type: 'color' },
            { name: 'TextColor', type: 'color', id: 'TextColor' + n },


            // Add more style properties as needed
        ];

        // Helper function to update styles
        function updateStyle(styleProperty) {
            var inputId = styleProperty.name + n;
            var inputElement = document.getElementById(inputId);

            if (inputElement) {
                var newValue = inputElement.value;
                // Update the style of the combobox
                var combobox = document.querySelector('.comboboxtemp6' + n);


                if (combobox) {
                    if (styleProperty.type === 'color') {
                        combobox.style[styleProperty.name] = newValue;
                    }

                    else if (styleProperty.type === 'text') {
                        combobox.innerHTML = newValue;
                    }
                }
                console.log('Save button clicked');
            } else {
                console.error('Input element not found for ' + styleProperty.name + ' with ID: ' + inputId);
            }
        }
        // Iterate through the style properties and update them
        styleProperties.forEach(updateStyle);
    }

    generateDynamicHTML();


}

function saveTemplate7(saveButton) {
    // Extract the numeric value from the Save button's class

    //var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
    var a = parseInt(saveButton, 10);
    console.log(a)
    var color = document.getElementById("colorInput" + a);
    var color1 = document.getElementById("colorInput3" + a);
    var color2 = document.getElementById("colorInput2" + a);
    console.log(color)
    var text = document.getElementById("groom" + a);
    var input2 = document.getElementById("textInputand" + a);
    var text1 = document.querySelector(".lead" + a);
    console.log(text)
    var textContent = document.getElementById("textInput" + a);
    var fontselector1 = document.querySelector(".fontselector1" + a).value;
    var input3 = document.querySelector("#Bride" + a);
    var text2 = document.querySelector(".Bridehtml" + a);
    console.log(input2.value)
    console.log(input3.value)
    console.log(text1)
    console.log(text2)


    text.innerText = textContent.value;
    text1.innerText = input2.value;
    text2.innerText = input3.value;

    let combobox = document.getElementById('template7' + a);
    text.style.color = color.value;
    text1.style.color = color1.value;
    text2.style.color = color2.value;
    combobox.style.fontFamily = fontselector1;

    // Define an array of style properties and their corresponding input types
    var styleProperties = [
        { name: "backgroundColor", type: "color" },
        { name: "TextColor", type: "color", id: "TextColor" },
        { name: "borderRadius", type: "number" },
        { name: "fontFamily1", type: "select", class: "fontFamily108" },
        // Add more style properties as needed
    ];

    // Helper function to update styles
    function updateStyle(thisStyle) {
        console.log(thisStyle);
        var inputId = thisStyle.name + n;
        var inputElement = document.getElementById(inputId);

        if (inputElement) {
            var newValue = inputElement.value;
            // Update the style of the combobox
            var combobox = document.querySelector(".comboboxtemp1" + a);
            var borderRadius = document.getElementById("innerimage" + a);

            console.log(borderRadius);
            if (combobox) {
                if (thisStyle.type === "color") {
                    combobox.style[thisStyle.name] = newValue;
                } else if (thisStyle.type === "number") {
                    borderRadius.style.borderRadius = newValue + "%";
                } else if (thisStyle.type === "select") {
                    combobox.style[thisStyle.name] = newValue;
                }
            }
            console.log("Save button clicked");
        } else {
            console.error(
                "Input element not found for " +
                thisStyle.name +
                " with ID: " +
                inputId
            );
        }
    }
    // Iterate through the style properties and update them
    styleProperties.forEach(updateStyle);


    //save function, programmed sepratly
    saveUpdateElement('template7' + a);
}

// imageupload template7

$(document).on('imageSelected', async function (event, curElement) {
    // You can perform additional actions or send curElement details to the server here
    console.log("Image selected. Element details:", curElement);
    const response = await fetch("/get-csrf-token");

    // Storing data in form of JSON
    var data = await response.text();

    let token = data;
    // Example: Send details to the server via AJAX
    var xhr = new XMLHttpRequest();
    var url = "/web-new/upload-image-details";
    var formData = new FormData();
    var fileInput = document.querySelector(".file-input");
    console.log("asdadlkjalksdjlk" + fileInput)

    $(".file-input").change(function () {
        var fileInput = this.files[0];

        if (fileInput instanceof Blob) {
            var curElement = $(this).closest(".containers").find(".image");

            // Display the selected image in the preview
            readURL(fileInput, curElement);

            // Rest of your code
            // ...
        } else {
            console.error("Invalid file type or no file selected");
        }
    });

    function readURL(file, curElement) {
        var reader = new FileReader();

        reader.onload = function (e) {
            // Display the selected image in the preview
            curElement.attr("src", e.target.result);
        };

        // Use FileReader's readAsDataURL method directly on the file
        reader.readAsDataURL(file);
    }


    console.log("file nin[i" + fileInput)
    var curElement = "your_element_details";
    formData.append("_token", token);
    formData.append("elementDetails", curElement);
    formData.append("image", fileInput);
    formData.append("element_name", "template1" + i);
    formData.append("event_id", window.location.pathname.split("/")[2]);

    xhr.open("POST", url, true);

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Request was successful
            console.log("Details sent successfully. Response:", xhr.responseText);
        } else {
            // Request failed
            console.error("Error sending details. Status:", xhr.status, "Response:", xhr.responseText);
        }
    };

    xhr.onerror = function () {
        console.error("Network error occurred");
    };

    xhr.send(formData);

});

function template7() {
    a++;
    increment++;
    console.log(a);
    var combobox = document.createElement("div");
    combobox.classList.add("comboboxtemp7" + a);
    combobox.classList.add("combobox3");
    combobox.classList.add("combobox");
    combobox.id = "template7" + a;
    var li = document.createElement("li");
    li.className = "nav-item";
    var hyperlink = document.createElement("a");
    hyperlink.className = "nav-link";
    hyperlink.href = "#" + "template7" + a;
    hyperlink.textContent = "nav" + increment;
    li.appendChild(hyperlink);
    navbar.appendChild(li);
    console.log(navbar);
    hyperlink.classList.add("nav" + increment);
    console.log(navbar);
    // Create the offcanvas container
    var offcanvas = document.createElement("div");
    offcanvas.classList.add("offcanvas");
    offcanvas.classList.add("offcanvas-start");
    offcanvas.id = "demo" + a;
    // Create the offcanvas header
    var offcanvasHeader = document.createElement("div");
    offcanvasHeader.classList.add("offcanvas-header");
    var h1 = document.createElement("h1");
    h1.classList.add("offcanvas-title");
    h1.textContent = "Style the theme";
    var closeButton = document.createElement("button");
    closeButton.type = "button";
    closeButton.classList.add("btn-close");
    closeButton.setAttribute("data-bs-dismiss", "offcanvas");
    closeButton.setAttribute("onClick", "closeElement('template7" + a + "')");
    offcanvasHeader.appendChild(h1);
    offcanvasHeader.appendChild(closeButton);

    function navbarName() {
        var div = document.createElement("div");
        div.classList.add("col-4");
        var div1 = document.createElement("div");
        div1.classList.add("col-8");
        var label = document.createElement("label");
        label.textContent = "navbar" + i;
        label.classList.add("navlabel");
        label.textContent = "navbar" + increment;
        navinput = document.createElement("input");
        navinput.classList.add("navinput");
        navinput.classList.add("navinput" + increment);
        div.appendChild(label);
        div1.appendChild(navinput);
        demonav.appendChild(div);
        demonav.appendChild(div1);
        const navInputs = document.querySelectorAll(".navinput");
        for (let i = 0; i < navInputs.length; i++) {
            const navInput = navInputs[i];
            console.log(navInput);
            console.log(navInputs);
            navInput.addEventListener("change", function () {
                // Get the first class from the classList
                const numericClass = this.classList[1];
                // Assuming the first class is the numeric value and starts with "nav"
                const numericValue = numericClass
                    ? parseInt(numericClass.replace("navinput", ""), 10)
                    : null;
                const a = document.querySelector(".nav" + numericValue);

                console.log("Numeric value from class:", numericValue);
                console.log(this.value);

                a.innerHTML = this.value;
            });
        }
    }

    navbarName();
    // Create the offcanvas body
    var offcanvasBody = document.createElement("div");
    offcanvasBody.classList.add("offcanvas-body");
    // Create the row and columns
    var row = document.createElement("div");
    row.classList.add("row");
    row.classList.add("temp7image" + a);
    offcanvasBody.appendChild(row);
    offcanvas.appendChild(offcanvasHeader);
    offcanvas.appendChild(offcanvasBody);
    // Append the offcanvas to the document body
    combobox.appendChild(offcanvas);
    // Create the button to toggle the offcanvas
    var offcanvasToggle = document.createElement("button");
    offcanvasToggle.classList.add("btn");
    offcanvasToggle.setAttribute("type", "button");
    offcanvasToggle.setAttribute("data-bs-toggle", "offcanvas");
    offcanvasToggle.setAttribute("data-bs-target", "#demo" + a);

    var icon = document.createElement("i");
    icon.style.fontSize = "40px";
    icon.classList.add("fa-regular");
    icon.classList.add("slideinputpreview");
    icon.classList.add("fa-pen-to-square");

    offcanvasToggle.appendChild(icon);

    // Append the button to the document body
    combobox.appendChild(offcanvasToggle);

    var containers1 = document.createElement("div");
    containers1.classList.add("containers1");
    containers1.classList.add("col-12");
    var innerspan = document.createElement("span");
    var labelspan = document.createElement("span");
    var div = document.createElement("div");
    var button2 = document.createElement("button");
    button2.classList.add("item-1");
    button2.classList.add("close1");
    innerspan.classList.add("inner");
    innerspan.appendChild(labelspan);
    button2.appendChild(innerspan);
    combobox.appendChild(containers1);
    containers1.appendChild(div);
    combobox.appendChild(button2);

    labelspan.classList.add("label");
    labelspan.textContent = "Close";
    // button1.appendChild(input1);
    boxes.appendChild(combobox);
    console.log(boxes);
    var header = document.createElement("header");
    header.classList.add("masthead" + a);
    header.setAttribute("id", "customMasthead" + a);
    header.style.height = "100vh";
    header.style.minHeight = "500px";
    header.style.backgroundImage =
        "url(https://source.unsplash.com/BtbjCFUvBXs/1920x1080)";
    header.style.backgroundSize = "cover";
    header.style.backgroundPosition = "center";
    header.style.backgroundRepeat = "no-repeat";
    var container = document.createElement("div");
    container.classList.add("container");
    container.classList.add("h-100");
    var row2 = document.createElement("div");
    row2.classList.add("row");
    row2.classList.add("h-100");
    row2.classList.add("align-items-center");
    var col = document.createElement("div");
    col.classList.add("col-12");
    col.classList.add("text-center");
    var heading1 = document.createElement("h1");
    heading1.classList.add("fw-light");

    heading1.setAttribute("id", "groom" + a);
    heading1.textContent = "Groom";
    var paragraph = document.createElement("p");
    paragraph.classList.add("lead" + a);
    paragraph.textContent = "&";
    var heading2 = document.createElement("h1");
    heading2.classList.add("fw-light");
    heading2.classList.add("Bridehtml" + a);
    heading2.textContent = "Bride";
    col.appendChild(heading1);
    col.appendChild(paragraph);
    col.appendChild(heading2);
    row2.appendChild(col);
    container.appendChild(row2);
    header.appendChild(container);

    function generateLabelSelectPair(container, labelText, selectId) {
        console.log(container);
        var labelCol = document.createElement("div");
        labelCol.className = "col-6";
        var label = document.createElement("label");
        label.textContent = labelText;
        labelCol.appendChild(label);
        var selectCol = document.createElement("div");
        selectCol.className = "col-6";
        var customSelect = document.createElement("div");
        customSelect.className = "custom-select";
        var selectWrapper = document.createElement("div");
        selectWrapper.className = "select-wrapper";
        var span = document.createElement("span");
        span.id = "font";
        span.style.fontFamily = "'Abramo Serif'";
        var select = document.createElement("select");
        span.appendChild(select);
        select.classList.add("fontselector1" + a);
        select.classList.add("fontselector1");
        selectWrapper.appendChild(span);
        selectWrapper.appendChild(select);
        customSelect.appendChild(selectWrapper);

        selectCol.appendChild(customSelect);

        // Example: Add font options to the select
        addFontOption(select, "Abramo Serif", "Abramo Serif");
        addFontOption(select, "Roboto-BlackItalic", "Roboto-BlackItalic, cursive");
        addFontOption(select, "Roboto-BlackItalic", "Roboto-BlackItalic, cursive");
        addFontOption(select, "RacingSansOne-Regular", "RacingSansOne-Regular");
        addFontOption(
            select,
            "PTSansNarrow-Regular",
            "PTSansNarrow-Regular, cursive"
        );
        addFontOption(select, "PTSansNarrow-Bold", "PTSansNarrow-Bold, cursive");
        row.appendChild(labelCol);
        row.appendChild(selectCol);
        customSelect.appendChild(select);
        // Add more font options as needed
    }
    generateLabelSelectPair("", "Select Font size");
    function addFontOption(select, fontFamily, fontName, options, labelCol) {
        var option = document.createElement("option");
        option.value = fontFamily;
        option.style.fontFamily = fontName;
        option.textContent = fontName;
        select.appendChild(option);
        offcanvasBody.appendChild(select);
    }

    var imageInput = document.createElement("input");
    imageInput.setAttribute("type", "file");
    imageInput.setAttribute("id", "imageInput" + a);
    imageInput.setAttribute("accept", "image/*");
    imageInput.addEventListener("change", function () {
        handleImageUpload(); // Call the handleImageUpload function when a file is uploaded
    });
    imageInput.style.marginTop = "10px";
    imageInput.style.marginBottom = "10px";
    // Append the header to the document body or any other desired container
    combobox.appendChild(header);
    var spanbutton = combobox.querySelector(".close1");
    spanbutton.onclick = function () {
        boxes.removeChild(combobox);
        li.removeChild(a);
        navbar.removeChild(li);
        closeElement("template7" + a);
    };

    spanbutton.setAttribute("onClick", "closeElement('template7" + a + "')");
    function closeElement(elementID) {
        console.log("deleting : " + elementID);
        var xhr = new XMLHttpRequest();

        // Define the request method, URL, and set asynchronous to true
        xhr.open(
            "GET",
            "/web-new/delete/" + window.location.pathname.split("/")[2] + "/" + elementID,
            true
        );

        // Set up a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    var responseData = JSON.parse(xhr.responseText);
                    console.log(responseData);
                    document.getElementById(elementID).remove()
                } else {
                    // There was an error with the request
                    console.error("Error:", xhr.status);
                }
            }
        };

        // Send the request
        xhr.send();
    }

    async function generateDynamicHTML() {
        generateForm();
        generateForm3();
        generateFormInput2();
        generateForm2();
        // Example: Generate Save button
        // Create button element
        var button = document.createElement("button");
        button.setAttribute("id", "buttonstyle" + a);
        button.className = "btn btn-primary";
        button.textContent = "Save";
        button.classList.add("saveButton");
        button.classList.add("save" + a);
        button.onclick = function () {
            save(this); // Pass the clicked Save button to the save function
        };
        button.setAttribute('onclick', "saveTemplate7(" + a + ")");
        button.setAttribute('data-bs-toggle', "offcanvas");
        button.setAttribute('data-bs-target', "#demo" + a);

        button.addEventListener("click", updateHeader2);
        button.addEventListener("click", updateHeader);
        // button.addEventListener("click", updateHeader3);
        row.appendChild(button);
        offcanvasBody.appendChild(row);
        // Append the generated content to offcanvasBody
        offcanvas.appendChild(offcanvasBody);
        offcanvasBody.appendChild(button);


        const response = await fetch("/get-csrf-token");

        // Storing data in form of JSON
        var data = await response.text();
        console.log(data);
        let token = data;
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Define the request method, URL, and set asynchronous to true
        xhr.open("POST", "/web-new/add-new", true);

        // Set the request header if needed (e.g., for JSON content type)
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", token);

        // Set up a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    console.log(xhr.responseText);
                } else {
                    // There was an error with the request
                    console.error("Error:", xhr.status);
                }
            }
        };

        //console.log(document.getElementById('template1' + i).outerHTML);
        // Prepare the data to be sent (in this case, a simple JSON object)
        var dataToSend = {
            _token: token,
            nav_name: "navbar" + a,
            event_id: window.location.pathname.split("/")[2],
            element_name: "template7" + a,
            html_doc: document.getElementById("template7" + a).outerHTML,
        };

        // Convert the data to a JSON string
        var jsonData = JSON.stringify(dataToSend);

        // Send the request with the data
        xhr.send(jsonData);


    }

    generateDynamicHTML();

    function generateForm() {
        var label = document.createElement("label");
        label.className = "inputlabel";
        label.textContent = "First Text";
        label.setAttribute("for", "textInput" + a);
        // Create input element
        var input = document.createElement("input");
        input.className = "col-12";
        input.setAttribute("type", "text");
        input.setAttribute("id", "textInput" + a);
        input.setAttribute("placeholder", "Type text here");
        input.style.paddingTop = "10px";
        input.style.marginTop = "10px";
        input.style.marginBottom = "10px";
        input.style.paddingBottom = "10px";
        input.style.borderRadius = "10px";
        var label2 = document.createElement("label");
        label2.textContent = "Select First Text Color";
        label2.setAttribute("for", "colorInput" + a);

        // Create second input element for selecting color
        var colorInput = document.createElement("input");
        colorInput.setAttribute("type", "color");
        colorInput.setAttribute("id", "colorInput" + a);
        row.appendChild(label);
        row.appendChild(input);
        row.appendChild(label2);
        row.appendChild(colorInput);
        offcanvasBody.appendChild(row);
    }
    // Example function to update the header (modify as needed)
    function updateHeader() {
        var textInput = document.getElementById("textInput" + a);
        var colorInput = document.getElementById("colorInput" + a);
        var header = document.querySelector(".masthead" + a + " h1");

        if (header) {
            header.textContent = textInput.value;
            header.style.color = colorInput.value;
        }
    }

    // Example function to update the header (modify as needed)
    function updateHeader2() {
        var textInput2 = document.getElementById("textInput2" + a);
        var colorInput = document.getElementById("colorInput2" + a);
        // Get all h1 elements on the page
        var headers = document.querySelectorAll(".masthead" + a + " h1");

        // Check if there is at least a second h1 element
        if (headers.length >= 2) {
        }
    }

    function generateForm3() {
        var label = document.createElement("label");
        label.className = "inputlabel";
        label.textContent = "Second Text";
        label.setAttribute("for", "textInput" + a);
        var input2 = document.createElement("input");
        input2.className = "col-12";
        input2.setAttribute("type", "text");
        input2.setAttribute("id", "textInputand" + a);
        input2.setAttribute("placeholder", "Type text here");
        input2.style.paddingTop = "10px";
        input2.style.marginTop = "10px";
        input2.style.marginBottom = "10px";
        input2.style.paddingBottom = "10px";
        input2.style.borderRadius = "10px";
        var label4 = document.createElement("label");
        label4.textContent = "Select Second Text Color";
        label4.setAttribute("for", "colorInput3" + a);
        var colorInput = document.createElement("input");
        colorInput.setAttribute("type", "color");
        colorInput.setAttribute("id", "colorInput3" + a);
        // Append input and button to the body or any desired container
        row.appendChild(label);
        row.appendChild(input2);
        row.appendChild(label4);
        row.appendChild(colorInput);
        offcanvasBody.appendChild(row);
    }

    function generateFormInput2() {
        var label = document.createElement("label");
        label.className = "inputlabel";
        label.textContent = "Second Text";
        label.setAttribute("for", "textInput" + a);
        // Create input element
        var input2 = document.createElement("input");
        input2.className = "col-12";
        input2.setAttribute("type", "text");
        input2.setAttribute("id", "Bride" + a);
        input2.setAttribute("placeholder", "Type text here");
        input2.style.paddingTop = "10px";
        input2.style.marginTop = "10px";
        input2.style.marginBottom = "10px";
        input2.style.paddingBottom = "10px";
        input2.style.borderRadius = "10px";
        var label4 = document.createElement("label");
        label4.textContent = "Select Second Text Color";
        label4.setAttribute("for", "colorInput2" + a);
        var colorInput = document.createElement("input");
        colorInput.setAttribute("type", "color");
        colorInput.setAttribute("id", "colorInput2" + a);
        // Append input and button to the body or any desired container
        row.appendChild(label);
        row.appendChild(input2);
        row.appendChild(label4);
        row.appendChild(colorInput);
        offcanvasBody.appendChild(row);
    }

    function save(saveButton) {
        // Assuming the third class is the numeric value
        var buttonClass = saveButton.classList[3];
        var a1 = parseInt(buttonClass.replace("save", ""), 10);
        var b = document.querySelector(".masthead" + a1);
        var fontselector = document.querySelector(".fontselector1" + a1).value;
        console.log(a1, b);
        combobox.style.fontFamily = fontselector;
        // Adjust the class name as needed
        const curElement = document.querySelector(".masthead" + a1);
        console.log(" curElement");
        console.log(curElement);

        // Assuming you have a variable 'files' defined somewhere
        var imageInput = document.getElementById("imageInput" + a1);
        var textInput = document.getElementById("textInput" + a1).value;
        var groom = document.getElementById("groom" + a1);
        var textInputand = document.getElementById("textInputand" + a1).value;
        var textInput2 = document.getElementById("Bride" + a1).value;
        var bridehtml = document.querySelector(".Bridehtml" + a1);
        var colorInput3 = document.querySelector("#colorInput3" + a1).value;
        var colorInput2 = document.querySelector("#colorInput2" + a1).value;

        var lead = document.querySelector(".lead" + a1);

        groom.innerHTML = textInput;
        bridehtml.innerHTML = textInput2;
        bridehtml.style.color = colorInput2;
        lead.innerHTML = textInputand;
        lead.style.color = colorInput3;

        handleImageChange();
        function handleImageChange() {
            console.log("2");

            // Assuming files is a FileList from the input file element
            const files = imageInput.files;

            if (files.length > 0) {
                console.log("3");

                const reader = new FileReader();

                reader.onload = function (e) {
                    console.log(e.target.result);
                    // Update the appropriate element with the loaded image
                    b.style.backgroundImage = "url(" + e.target.result + ")";
                    groom.innerHTML = textInput;
                    lead.innerHTML = textInputand;
                    bridehtml.innerHTML = textInput2;
                    lead.style.color = colorInput3;
                    bridehtml.style.color = colorInput2;
                };

                // Read the first file in the list as a data URL.
                reader.readAsDataURL(files[0]);
            }
        }
    }

    function generateForm2() {
        var imageInput = document.createElement("input");
        imageInput.setAttribute("type", "file");
        imageInput.setAttribute("id", "imageInput" + a);
        imageInput.setAttribute("accept", "image/*");
        imageInput.style.marginTop = "10px";
        imageInput.style.marginBottom = "10px";

        row.appendChild(imageInput);
        offcanvasBody.appendChild(row);
    }
}


function saveTemplate8(saveButton) {
    // Extract the numeric value from the Save button's class
    //var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
    var z = parseInt(saveButton, 10);
    var color = document.getElementById("backgroundColor" + z).value;




    let combobox = document.getElementById('template8' + z);
    combobox.style.background = color;
    var sliderContainer = document.getElementById("commonId" + n);
    if (sliderContainer) {
        const files = saveButton.files;

        for (let i = 0; i < files.length; i++) {
            const reader = new FileReader();

            let currentN = n;

            reader.onload = function (event) {
                const imageUrl = event.target.result;
                console.log(currentN);

                const image = $("<img>", {
                    src: imageUrl,
                    alt: "",
                });

                // Append the image directly within the onload event
                $(sliderContainer).append($("<div>").addClass("slide").append(image));
                saveButton.files = " ";
            };

            reader.readAsDataURL(files[i]);
        }

        // Continue with any additional logic as needed for styling or other actions
    } else {
        console.error("Slider container not found for ID: ");
    }


    // Define an array of style properties and their corresponding input types
    var styleProperties = [
        { name: "backgroundColor", type: "color" },
        { name: "TextColor", type: "color", id: "TextColor" },
        { name: "borderRadius", type: "number" },
        { name: "fontFamily1", type: "select", id: "fontFamily108" },
        // Add more style properties as needed
    ];

    // Helper function to update styles
    function updateStyle(thisStyle) {
        console.log(thisStyle);
        var inputId = thisStyle.name + z;
        var inputElement = document.getElementById(inputId);

        if (inputElement) {
            var newValue = inputElement.value;
            // Update the style of the combobox
            var combobox = document.querySelector(".comboboxtemp1" + z);
            var borderRadius = document.getElementById("innerimage" + z);

            console.log(borderRadius);
            if (combobox) {
                if (thisStyle.type === "color") {
                    combobox.style[thisStyle.name] = newValue;
                } else if (thisStyle.type === "number") {
                    borderRadius.style.borderRadius = newValue + "%";
                } else if (thisStyle.type === "select") {
                    combobox.style[thisStyle.name] = newValue;
                }
            }
            console.log("Save button clicked");
        } else {
            console.error(
                "Input element not found for " +
                thisStyle.name +
                " with ID: " +
                inputId
            );
        }
    }
    // Iterate through the style properties and update them
    styleProperties.forEach(updateStyle);


    //save function, programmed sepratly
    saveUpdateElement('template8' + z);
}

function template8() {
    z++;
    increment++;
    console.log(z);
    var combobox = document.createElement("div");
    combobox.classList.add("comboboxtemp8" + z);
    combobox.classList.add("combobox");
    combobox.id = "template8" + z;
    var li = document.createElement("li");
    li.className = "nav-item";
    var a = document.createElement("a");
    a.className = "nav-link";
    a.href = "#" + "template8" + z;
    a.classList.add("nav" + increment);
    a.textContent = "nav" + increment;
    li.appendChild(a);
    navbar.appendChild(li);
    console.log(navbar);

    var commonId = "commonId" + z;
    var commonId2 = "commonId2" + z;
    var li = document.createElement("li");

    // Create the offcanvas container
    var offcanvas = document.createElement("div");
    offcanvas.classList.add("offcanvas");
    offcanvas.classList.add("offcanvas-start");
    offcanvas.id = "demo" + z;
    // Create the offcanvas header
    var offcanvasHeader = document.createElement("div");
    offcanvasHeader.classList.add("offcanvas-header");
    var h1 = document.createElement("h1");
    h1.classList.add("offcanvas-title");
    h1.textContent = "Style the theme";
    var closeButton = document.createElement("button");
    closeButton.type = "button";
    closeButton.classList.add("btn-close");
    closeButton.setAttribute("data-bs-dismiss", "offcanvas");

    offcanvasHeader.appendChild(h1);
    offcanvasHeader.appendChild(closeButton);

    // Create the offcanvas body
    var offcanvasBody = document.createElement("div");
    offcanvasBody.classList.add("offcanvas-body");
    // Create the row and columns
    var row = document.createElement("div");
    row.classList.add("row");
    row.classList.add("temp7image" + z);
    offcanvasBody.appendChild(row);
    offcanvas.appendChild(offcanvasHeader);
    offcanvas.appendChild(offcanvasBody);
    // Append the offcanvas to the document body
    combobox.appendChild(offcanvas);
    // Create the button to toggle the offcanvas
    var offcanvasToggle = document.createElement("button");
    offcanvasToggle.classList.add("btn");
    offcanvasToggle.setAttribute("type", "button");
    offcanvasToggle.setAttribute("data-bs-toggle", "offcanvas");
    offcanvasToggle.setAttribute("data-bs-target", "#demo" + z);

    var icon = document.createElement("i");
    icon.style.fontSize = "40px";
    icon.classList.add("fa-regular");
    icon.classList.add("slideinputpreview");
    icon.classList.add("fa-pen-to-square");

    offcanvasToggle.appendChild(icon);

    function navbarName() {
        var div = document.createElement("div");
        div.classList.add("col-4");
        var div1 = document.createElement("div");
        div1.classList.add("col-8");
        var label = document.createElement("label");
        label.textContent = "navbar" + i;
        label.classList.add("navlabel");
        label.textContent = "navbar" + increment;
        navinput = document.createElement("input");
        navinput.classList.add("navinput");
        navinput.classList.add("navinput" + increment);
        div.appendChild(label);
        div1.appendChild(navinput);
        demonav.appendChild(div);
        demonav.appendChild(div1);
        const navInputs = document.querySelectorAll(".navinput");
        for (let i = 0; i < navInputs.length; i++) {
            const navInput = navInputs[i];
            console.log(navInput);
            console.log(navInputs);
            navInput.addEventListener("change", function () {
                // Get the first class from the classList
                const numericClass = this.classList[1];
                // Assuming the first class is the numeric value and starts with "nav"
                const numericValue = numericClass
                    ? parseInt(numericClass.replace("navinput", ""), 10)
                    : null;
                const a = document.querySelector(".nav" + numericValue);

                console.log("Numeric value from class:", numericValue);
                console.log(this.value);
                console.log(numericValue);
                a.innerHTML = this.value;
            });
        }
    }

    navbarName();

    // Append the button to the document body
    combobox.appendChild(offcanvasToggle);

    var containers1 = document.createElement("div");
    containers1.classList.add("containers1");
    containers1.classList.add("col-12");

    var spanbutton = document.createElement("button");
    spanbutton.classList.add("item-1");
    spanbutton.classList.add("close");
    spanbutton.setAttribute("onClick", "closeElement('template8" + z + "')");
    var innerspan = document.createElement("span");
    var labelspan = document.createElement("span");
    innerspan.classList.add("inner");
    labelspan.classList.add("label");
    labelspan.textContent = "Close";
    innerspan.appendChild(labelspan);
    spanbutton.appendChild(innerspan);
    combobox.appendChild(spanbutton);
    spanbutton.setAttribute("onClick", "closeElement('template8" + z + "')");
    const sliderContainer = document.createElement("div");
    sliderContainer.id = commonId;
    sliderContainer.classList.add("slider");
    sliderContainer.classList.add("sliderr" + z);
    combobox.appendChild(containers1);

    const overlay = document.createElement("div");
    overlay.classList.add("overlay");

    const imageInput = document.createElement("input");
    imageInput.type = "file";
    imageInput.id = commonId2;
    imageInput.classList.add("slideinputpreview");
    imageInput.multiple = true;

    const overlay2 = document.createElement("div");
    overlay2.classList.add("overlay2");

    const controlPrevBtn = document.createElement("button");
    controlPrevBtn.classList.add("control-prev-btn" + z);
    controlPrevBtn.classList.add("control-prev-btnn");
    controlPrevBtn.innerHTML = '<i class="fas fa-arrow-left"></i>';

    const controlNextBtn = document.createElement("button");
    controlNextBtn.classList.add("control-next-btn" + z);
    controlNextBtn.classList.add("control-next-btnn");
    controlNextBtn.innerHTML = '<i class="fas fa-arrow-right"></i>';

    combobox.appendChild(sliderContainer);
    combobox.appendChild(overlay);
    combobox.appendChild(imageInput);
    combobox.appendChild(overlay2);
    overlay2.appendChild(controlPrevBtn);
    overlay2.appendChild(controlNextBtn);

    imageInput.onclick = function () {
        save(this);
    };

    boxes.appendChild(combobox);
    $(document).ready(function () {
        // Update this with your actual commonId
        const imageInput = document.getElementById(commonId2);
        const sliderContainer = document.getElementById(commonId);
        const overlay = document.querySelector(".overlay");

        imageInput.addEventListener("change", handleFileSelect);
        $(".overlay").on("click", function () {
            $(".slide img").removeClass("zoomed");
            overlay.classList.remove("active");
        });

        function handleFileSelect(event) {
            const files = event.target.files;

            for (let i = 0; i < files.length; i++) {
                const reader = new FileReader();

                reader.onload = function (event) {
                    const imageUrl = event.target.result;
                    const image = $("<img>", {
                        src: imageUrl,
                        alt: "",
                    });
                    // Append the image directly within the onload event
                    $(sliderContainer).append($("<div>").addClass("slide").append(image));
                    imageInput.value = "";
                };
                reader.readAsDataURL(files[i]);
            }
        }
        // Rest of your code
        spanbutton.onclick = function () {
            boxes.removeChild(combobox);
            li.removeChild(a);
            navbar.removeChild(li);
            closeElement("template8" + z);
        };

        document
            .querySelector(".control-prev-btn" + z)
            .addEventListener("click", function () {
                sliderContainer.scrollLeft -= 270;
            });

        document
            .querySelector(".control-next-btn" + z)
            .addEventListener("click", function () {
                sliderContainer.scrollLeft += 270;
            });
    });

    function save(saveButton) {
        var buttonId = saveButton.id;
        var n = parseInt(buttonId.replace("commonId2", ""), 10);

        var sliderContainer = document.getElementById("commonId" + n);

        if (sliderContainer) {
            const files = saveButton.files;

            for (let i = 0; i < files.length; i++) {
                const reader = new FileReader();

                let currentN = n;

                reader.onload = function (event) {
                    const imageUrl = event.target.result;
                    console.log(currentN);

                    const image = $("<img>", {
                        src: imageUrl,
                        alt: "",
                    });

                    // Append the image directly within the onload event
                    $(sliderContainer).append($("<div>").addClass("slide").append(image));
                    saveButton.files = " ";
                };

                reader.readAsDataURL(files[i]);
            }

            // Continue with any additional logic as needed for styling or other actions
        } else {
            console.error("Slider container not found for ID: " + buttonId);
        }
    }

    function closeElement(elementID) {
        console.log("deleting : " + elementID);
        var xhr = new XMLHttpRequest();

        // Define the request method, URL, and set asynchronous to true
        xhr.open(
            "GET",
            "/web-new/delete/" + window.location.pathname.split("/")[2] + "/" + elementID,
            true
        );

        // Set up a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    var responseData = JSON.parse(xhr.responseText);
                    console.log(responseData);
                    document.getElementById(elementID).remove()
                } else {
                    // There was an error with the request
                    console.error("Error:", xhr.status);
                }
            }
        };

        // Send the request
        xhr.send();
    }

    overlay.appendChild(imageInput);

    async function generateDynamicHTML() {
        // Example: Generate label and input for background color
        generateLabelInputPair(
            row,
            "Select Background Color",
            "backgroundColor" + z,
            "color"
        );

        var saveButton = document.createElement("button");
        saveButton.className = "btn btn-primary";
        saveButton.classList.add("save" + z);
        saveButton.type = "button";
        saveButton.textContent = "Save";
        saveButton.onclick = function () {
            save(this); // Pass the clicked Save button to the save function
        };
        saveButton.setAttribute('onclick', "saveTemplate8(" + z + ")");
        saveButton.setAttribute('data-bs-toggle', "offcanvas");
        saveButton.setAttribute('data-bs-target', "#demo" + z);


        row.appendChild(saveButton);
        offcanvasBody.appendChild(row);
        // Append the generated content to offcanvasBody
        offcanvas.appendChild(offcanvasBody);
        offcanvasBody.appendChild(row);
        offcanvasBody.appendChild(saveButton);


        const response = await fetch("/get-csrf-token");

        // Storing data in form of JSON
        var data = await response.text();
        console.log(data);
        let token = data;
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Define the request method, URL, and set asynchronous to true
        xhr.open("POST", "/web-new/add-new", true);

        // Set the request header if needed (e.g., for JSON content type)
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", token);

        // Set up a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    console.log(xhr.responseText);
                } else {
                    // There was an error with the request
                    console.error("Error:", xhr.status);
                }
            }
        };

        //console.log(document.getElementById('template1' + i).outerHTML);
        // Prepare the data to be sent (in this case, a simple JSON object)
        var dataToSend = {
            _token: token,
            nav_name: "navbar" + z,
            event_id: window.location.pathname.split("/")[2],
            element_name: "template8" + z,
            html_doc: document.getElementById("template8" + z).outerHTML,
        };

        // Convert the data to a JSON string
        var jsonData = JSON.stringify(dataToSend);

        // Send the request with the data
        xhr.send(jsonData);


    }
    function generateLabelInputPair(
        container,
        labelText,
        inputId,
        inputType = "color",
        inputValue = "",
        min = 0,
        max = 50
    ) {
        var labelCol = document.createElement("div");
        labelCol.className = "col-7";
        var label = document.createElement("label");
        label.textContent = labelText;
        labelCol.appendChild(label);
        var inputCol = document.createElement("div");
        inputCol.className = "col-5";
        var input = document.createElement("input");
        input.type = inputType;
        input.name = "";
        input.className = "ColorInput";
        input.id = inputId;
        input.value = inputValue;

        if (inputType === "number") {
            input.min = min;
            input.max = max;
            input.classList.remove("ColorInput");
        }
        if (inputType === "text") {
            input.classList.remove("ColorInput");
            input.classList.add("textContent");
            labelCol.classList.remove("col-7");
            labelCol.className = "col-6";
            inputCol.classList.remove("col-5");
            inputCol.className = "col-6";
            input.type = inputType;
        }
        inputCol.appendChild(input);
        row.appendChild(labelCol);
        row.appendChild(inputCol);
        offcanvasBody.appendChild(row);
        offcanvasBody.appendChild(row);
    }
    // Function to generate label and select pair
    function generateLabelSelectPair(container, labelText, selectId) {
        console.log(container);
        var labelCol = document.createElement("div");
        labelCol.className = "col-6";
        var label = document.createElement("label");
        label.textContent = labelText;
        labelCol.appendChild(label);
        var selectCol = document.createElement("div");
        selectCol.className = "col-6";
        var customSelect = document.createElement("div");
        customSelect.className = "custom-select";
        var selectWrapper = document.createElement("div");
        selectWrapper.className = "select-wrapper";
        var span = document.createElement("span");
        span.id = "font";
        span.style.fontFamily = "'Abramo Serif'";
        var select = document.createElement("select");
        span.appendChild(select);
        select.classList.add("fontselector1" + z);
        select.classList.add("fontselector1");
        selectWrapper.appendChild(span);
        selectWrapper.appendChild(select);
        customSelect.appendChild(selectWrapper);

        selectCol.appendChild(customSelect);

        // Example: Add font options to the select
        addFontOption(select, "Abramo Serif", "Abramo Serif");
        addFontOption(select, "Roboto-BlackItalic", "Roboto-BlackItalic, cursive");
        addFontOption(select, "Roboto-BlackItalic", "Roboto-BlackItalic, cursive");
        addFontOption(select, "RacingSansOne-Regular", "RacingSansOne-Regular");
        addFontOption(
            select,
            "PTSansNarrow-Regular",
            "PTSansNarrow-Regular, cursive"
        );
        addFontOption(select, "PTSansNarrow-Bold", "PTSansNarrow-Bold, cursive");
        row.appendChild(labelCol);
        row.appendChild(selectCol);
        customSelect.appendChild(select);
        // Add more font options as needed
    }

    function addFontOption(select, fontFamily, fontName, options, labelCol) {
        var option = document.createElement("option");
        option.value = fontFamily;
        option.style.fontFamily = fontName;
        option.textContent = fontName;
        select.appendChild(option);
        offcanvasBody.appendChild(select);
    }
    function save(saveButton) {
        var buttonClass = saveButton.classList[2]; // Assuming the third class is the numeric value
        var i = parseInt(buttonClass.replace("save", ""), 10);
        var color = document.getElementById("backgroundColor" + z).value;
        var text = document.getElementById("box" + j);

        combobox.style.background = color;

        var styleProperties = [
            { name: "backgroundColor", type: "color" },

            // Add more style properties as needed
        ];
    }

    generateDynamicHTML();
}
