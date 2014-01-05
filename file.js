
function purchase_confirmation() {
    var message = "Mit OK bestätigen Sie Ihre Bestellung";
    result = window.confirm(message);
}
function tomain() {
    window.location = "g2g.php?id=main";
}
function tomenu() {
    window.location = "g2g.php?id=menu";
}

function toinformation() {
    window.location = "g2g.php?id=information";
}

function login() {
    var logform = document.getElementById("logform");
        if (logform.style.visibility !== "hidden"){
            logform.style.visibility = "hidden";
        }
        else {
            logform.style.visibility = "visible";
        }
}

function tocart() {
    window.location = "g2g.php?id=cart";
}

//function create(htmlStr) {
//var frag = document.createDocumentFragment(),
//temp = document.createElement('div');
//temp.innerHTML = htmlStr;
//while (temp.firstChild) {
//frag.appendChild(temp.firstChild);
//}
//return frag;
//}


function toCart() {
    var element = "checkforCart();";
    var firstnode = document.getElementById("content").childNodes[0];
    document.insertbefore(element, firstnode);
}

function validate_customer() {
    var customerform = document.getElementById("customerform");
    if (name.length > 6 || name.length < 4) {
        alert("The user name must be 4-6 characters");
        document.getElementById("name").select();
        return false;
    }
    var age = document.getElementById("age").value;
    if (isNaN(age) || age < 1 || age > 100) {
        alert("The age must be a number between 1 and 100");
        document.getElementById("age").select();
        return false;
    }
    document.getElementById("form").submit();

}

function show_options() {
    var options = getElementByID()

}

function hideNavigation() {
    var navigation =  document.getElementById("navigation");
        if (navigation.style.visibility !== "hidden"){
            navigation.style.visibility = "hidden";
        }
        else {
            navigation.style.visibility = "visible";
        }
    
}
function showNavigation() {
    var element = docment.getElementByID("navigation");
    element.style.visibility = "visible";
    document.getElementByTagName("body").removeEventListener("onload", hideNavigation, false);
}
