function changeStyle() {
    "use strict";

    if (document.getElementById("default").checked) {
        document.body.style.backgroundColor = "white";
        document.body.style.color = "black";
        document.body.style.fontFamily = "Arial";
    } else if (document.getElementById("fancy").checked) {
        document.body.style.backgroundColor = "#DDDDDD";
        document.body.style.color = "black";
        document.body.style.fontFamily = "Calibri";
    } else {
        document.body.style.backgroundColor = "#33A3A1";
        document.body.style.color = "red";
        document.body.style.fontFamily = "Impact";
    }
}

window.onload = changeStyle;

function uniCharCode(event) {
    "use strict";

    var char = event.which || event.keyCode;
    document.getElementById("text1").innerHTML =
            "Unicode CHARACTER code: " + char;
}

function myFocus() {
    "use strict";

    document.getElementsByName("lastname")[0].style.backgroundColor = "yellow";
}

function myBlur() {
    "use strict";

    document.getElementsByName("lastname")[0].style.backgroundColor = "white";
}

function confirm_reset() {
    "use strict";

    return window.confirm("Are you sure you want to reset all text?");
}

function confirm_submit() {
    "use strict";

    return window.confirm("Are you sure you want to submit the form?");
}
