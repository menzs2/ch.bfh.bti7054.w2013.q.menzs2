
function purchaseConfirmation() {
    var message = "Mit OK bestätigen Sie Ihre Bestellung";
    result = window.confirm(message);
    if (result){
        document.getElementByID("shoppingcart").submit();
    }
}
function topage(toid) {
        var ref = "g2g.php?id=";
        var id = toid;
        window.location.href = ref.concat(id);
}
function tomenu() {
    window.location = "g2g.php?id=menu";
}

function toinformation() {
    window.location = "g2g.php?id=information";
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
