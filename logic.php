<!--
php code for Gulasch-2-Go 
Author: Stephan Menzi menzs2
-->

<?php
function checkForInput(){
    checkForLanguage();
    checkForCart();
    checkForLogin();
}

function checkforCart() {
    if (!isset($_SESSION["cart"])) {
        $shopcart = new shoppingcart();
    } else {
        $shopcart = unserialize(($_SESSION["cart"]));
    }
    $shopcart->checkForInputs();
}
function checkForLanguage(){
    if (isset($_GET ["lan"])) {
        $_SESSION["lan"] = urldecode($_GET ["lan"]);
        
    }
    
}
function checkForLogin(){    
    if (isset($_POST['logged'])){
        $_SESSION["logged"] =  $_POST["logged"];
        if(isset($_POST["uname"])){
            $_SESSION["username"] = $_POST['uname'];
        }
        else{
            $_SESSION["username"] = '';
        }
    }
}
function getTextelement($code) {
   $elements = array();
   if (!isset($_SESSION["lan"])){
        return $elements;
   }
    
    else{
    $myShopDB = new ShopDB();
    $res = $myShopDB->getText($code);
    while ($textelem = $res->fetch_object()) {
        $elements[$textelem->code] = $textelem->textelement;
    }
    
    $myShopDB->close();
    return $elements;
    }
}

function get_param($name, $default) {
    if (isset($_GET [$name])) {
        return urldecode($_GET [$name]);
    } else {
        return $default;
    }
}

function add_param($url, $name, $value, $sep = "&") {
    $new_url = $url . $sep . $name . "=" . urlencode($value);
    return $new_url;
}

//set the url to one of the pages
function set_url($page) {
    $url = $_SERVER ['PHP_SELF'];
    $url = add_param($url, "id", "$page", "?");
    return $url;
}

//Links for the pages
function pages() {
    global $navigation;
    foreach ($navigation as $id => $name) {
        $url = set_url($id);
        referencing($url, $name, "class=\"reference\"");
    }
}

//change the language
function languages($lenght = '') {
    global $language;
    $class = "class=\"reference\"";
    $url = set_url(get_param("id", "main"));
    if ($lenght == 'long') {
        referencing(add_param($url, "lan", "de"), 'Deutsch', $class);
        referencing(add_param($url, "lan", "fr"), 'Fran&ccedil;ais', $class);
    } else {
        referencing(add_param($url, "lan", "de"), 'DE', $class);
        referencing(add_param($url, "lan", "fr"), 'FR', $class);
    }
}

// creates a reference to another page
function referencing($url, $text, $class = '') {
    echo "<a $class href=\"$url\">$text</a> ";
    
}
function jhref($func, $text, $class = ''){
    echo "<a $class title=\"$text\" href=\"#\" onclick=\"$func();return false;\">$text</a>";
}

//a HTML DIV that has a String as the content
function simple_div($div_id, $div_content, $eventhandler = '') {
    echo "<div ID=\"$div_id\" $eventhandler>$div_content</div>";
}

//a HTML DIV that has a funtion as the content
function func_div($div_id, $func, $params = false, $eventhandler = '') {
    echo "<div ID=\"$div_id\" $eventhandler>";
    if ($params != false) {
        call_user_func_array($func, $params);
    } else {
        call_user_func($func);
    }
    echo"</div>";
}

//Functions for forms
//Creates a form
function form($action, $method, $name, $content) {
    echo "<form action=\"$action\" method=\"$method\" name=\"$name\">$content</form>";
}

// create an text input field
function text_input($name, $content, $class='',$size = 20) {
    echo "<input  $class type=\"text\" size=\"$size\" name=\"$name\">$content</input> </br>";
}

?>




<?php
$content = array('main' => 'main_page', 'menu' => 'menu_list', 'information' => 'information', 'cart' => 'cart', 'login'=>'userlogin');

$navigation = array('main' => "Main", 'menu' => "Menu", 'information' => "Information", 'cart' => 'Cart');

$titles = array('maindish' => 'Gerichte', 'sidedish' => 'Beilagen', 'beverages' => 'Getr&auml;nke');

$customer_form = array('salutation' => 'Anrede',
    'firstname' => 'Vorname',
    'lastname' => 'Nachname',
    'street' => 'Strasse',
    'postcode' => 'PLZ');

$options = array(
    0 => array('name' => "schärfer", 'description' => "lecker", 'price' => 2.50),
    1 => array('name' => "Sauerrahm", 'description' => " auch lecker", 'price' => 2.20),
    2 => array('name' => "mit Pilzen", 'description' => " sehr lecker", 'price' => 2.50),
    3 => array('name' => "Mehr Paprika", 'description' => "mehr schärfe", 'price' => 1.00),
    4 => array('name' => "Mehr Zwiebeln", 'description' => "aber hallo", 'price' => 2.80),
    5 => array('name' => "milder", 'description' => "aber hallo", 'price' => 0.00));

$places = array('Bern', 'Ostermundigen', 'K&ouml;niz', 'Ittigen');

$language = array('de' => "Deutsch", 'fr' => "Fran&ccedil;ais");

$information_message = array('de' => "<p>	Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod	tempor incidunt ut labore et </br>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>",
    'fr' => "<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod	tempor incidunt ut labore et </br>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>");
?>
