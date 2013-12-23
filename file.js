function validate_customer(){
	var name = document.getElementById("name").value;
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

function show_options(){
    var options = getElementByID()

}
function hidenavigation(){
	docment.getElementByName("navigation").style.display = "none";
}
function purchase_confirmation(){
    var message = "Mit OK bestätigen Sie Ihre Bestellung";
    result = window.confirm(message);
}
function main() {
	window.location ="g2g.php?id=main";
}
function menu() {
	window.location ="g2g.php?id=menu";
}
function information() {
	window.location = "g2g.php?id=location";
}
function login() {
	window.location = "g2g.php?id=login";
}
function cart() {
	window.location ="g2g.php?id=cart";
}
