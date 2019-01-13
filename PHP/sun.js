function addElement() {
    "use strict";

    var newDiv = document.createElement("div");
    var newContent = document.createTextNode("Hi there and greetings!");
    newDiv.appendChild(newContent);
    var currentDiv = document.getElementById("new");
    document.body.insertBefore(newDiv, currentDiv);
}

window.onload = addElement;

function changeElements() {
    "use strict";

    var node = document.getElementById("m1");
    var parent = node.parentNode;
    var child = document.getElementById("content");
    parent.replaceChild(child, node);
}

function removeElements() {
    "use strict";

    var node = document.getElementById("m1");
    var parent = node.parentNode;
    parent.removeChild(node);
}

function count() {
    "use strict";

    var result = "";
    result += "Ilosc formularzy: " + document.forms.length;
    var x = document.images.namedItem("one").src;
    result += "<br>Źródło pierwszego obrazka: " + x;

    var txt = "";
    var r = document.links;
    var i = 0;
    while (i < r.length) {
        txt = txt + r[i].href + "<br>";
        i += 1;
    }

    var t = document.body.childNodes.item(0).tagName;
    result += "<br>Źródła linków: <br>" + txt;
    result += "<br>Ilosc obiektow anchor: " + document.anchors.length;
    result += "<br>Pierwszy child w body: " + t;
    document.getElementById("newdv").innerHTML = result;

}

function myMoveFunction() {
    "use strict";

    if (event.altKey) {
        window.alert("The ALT key was pressed!");
    } else {
        window.alert("The ALT key was NOT pressed!");
    }
}

function myOutFunction() {
    "use strict";

    document.getElementById("demo2").innerHTML = "You left the field!";
}

function myOverFunction() {
    "use strict";

    var cX = event.clientX;
    var sX = event.screenX;
    var cY = event.clientY;
    var sY = event.screenY;
    var coords1 = "client - X: " + cX + ", Y coords: " + cY;
    var coords2 = "screen - X: " + sX + ", Y coords: " + sY;
    var coor = coords1 + "<br>" + coords2;
    document.getElementById("demo3").innerHTML = coor;
}

function myDownFunction() {
    "use strict";

    document.getElementById("demo4").innerHTML = "Text changes after click";
}
