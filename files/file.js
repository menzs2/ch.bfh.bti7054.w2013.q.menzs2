
function purchaseConfirmation() {
    var message = "Mit OK bestätigen Sie Ihre Bestellung";
    if (confirm(message)){
        document.getElementById("longshoppingcart").submit();
    }
    else{
        return;
    }
}
function topage(toid) {
        var ref = "g2g.php?id=";
        var id = toid;
        window.location.href = ref.concat(id);
}
function tomenu() {
    window.location = "index.php?id=menu";
}

function toinformation() {
    window.location = "index.php?id=information";
}

function tocart() {
    window.location = "index.php?id=cart";
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
