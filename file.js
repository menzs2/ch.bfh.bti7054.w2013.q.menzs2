
function purchaseConfirmation() {
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



function validateLogin(){
    var username = document.getElementById("logform").value;
         if (username.length > 6 || username[0].length < 4) {
        window.alert("The user name must be 4-6 characters");
        document.getElementById("uname").select();
        return false;
    }
    var pword = document.getElementById("pwd").value;
    if (pword[0].length > 6 || pword.length < 4) {
        window.alert("The password must be 4-6 characters");
        document.getElementById("pwd").select();
        return false;
    }
    document.getElementById("logform").submit();
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


function addToCart(itemkey) {
    
    document.getElementById(itemkey).submit();
}
function removeFromCart(index){
    var cartItems = document.getElementsByName("cartItem");
    cartItems[index].submit();
}
function clearCart() {
    document.getElementById("clearcart").submit();
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
