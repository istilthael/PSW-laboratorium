var i = 3;

function MyFunction1() {
    "use strict";
    document.writeln("Hi there!");
}

function listener() {
    "use strict";
    document.getElementById("is").innerHTML = "Hello World";
}

function MyFunction3() {
    "use strict";
    document.getElementById("button1").addEventListener("click", listener);
}

function myFunction() {
    "use strict";
    var person = window.prompt("Enter a number:", "0");
    var number = parseInt(person);
    var result = 0 + "<br>";
    if (number === Math.floor(parseFloat(person))) {
        result = result + number + "<br>";
    }

    switch (number % 2) {
    case 0:
        result = result + "Liczba jest parzysta<br>";
        break;
    case 1:
        result = result + "Liczba jest nieparzysta<br>";
        break;
    }

    var temp = 0;
    while (i > 0) {
        temp = temp + Math.random();
        i -= 1;
    }

    i = 0;
    do {
        result = result + i + ". iteracja<br>";
        i += 1;
    } while (i < 5);

    var values = ["Jeden", "Dwa", "Trzy"];

    values.forEach(function (element, i) {
        result += "<br>Element " + i + " to " + element;
    });

//    for(var j = 0;j < values.length;j++){
//      result += "<br>" + values[j];
//    }



    document.getElementById("test").innerHTML = result;

}

function myFunction2() {
    "use strict";

    var person = window.prompt("Enter a name:", "No name");
    if (person !== "") {
        document.getElementById("test").innerHTML =
                "Hello, " + person;
    } else {
        window.alert("write anything");
    }
}
