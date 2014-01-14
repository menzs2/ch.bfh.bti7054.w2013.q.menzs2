<!--
php code for Gulasch-2-Go 
Author: Stephan Menzi menzs2
-->

<?php
require("files/logic.php");
require ("files/classes.php");
?>
<?php

function title() {
    global $navigation;
    $name = get_param("id", "main");
    echo "Gulasch-2-Go - $navigation[$name]";
}
?>
<!-- Start Navigation -->
<?php
function navigation(){
    
    loginform();
    func_div("navigationbar", 'navigationBar');
    echo "</div>";
}


function navigationBar() {
    $page = get_param("id", 0);
    pages();
    if ($page != 'main') {
        languages();
    }
    login();
    
}
?>
<!-- End Navigation -->


<!--Content -->
<?php

//the main content chooser
function content() {

    global $content;
    $con = $content[get_param("id", "main")];
    if (!isset($_SESSION["lan"])) {
        
        call_user_func('chooselanguage');
        
    } 
    else {
        call_user_func($con);
    }
}
?>

<!--footer-->
<?php

function footer() {
    if (get_param("id", 0) == 'main') {
        languages();
    } else {
        $g2gadress = 'Gulasch-To-Go, Wankdorffeldstrasse 102, 3014 Bern';
        echo "$g2gadress";
    }
}
?>


<!--Main Content Functions: Calls the functions that displays the main content of the page-->
<?php

//Choose the language if it is no already set
function chooselanguage() {
        func_div('chooselan', 'languages', array('long'));
        
}

//The main/welcome page
function main_page() {
    w_message();
    main_page_content();
}

//the list of the menu items
function menu_list() {
    $shopcart = unserialize($_SESSION["cart"]);
    $menu_message = implode(getTextelement("choose"));
    $productlist = new productList();
    echo "<div ID=\"menu\"><p ID=\"first>\"><h1>$menu_message</h1></p>";
    $productlist->displayProductList();
    $shopcart->displayCart('short');
    echo "</div>";
}

//information on our shop
function information() {
    informationMessage();
    echo "<p>".implode(getTextelement("location"))."</p>";
    echo "<div id=\"g2gmap\"></div>";
}

//the shoppingcart and the clientInformation
function cart() {

    func_div('client', 'client_information');
    $shopcart = unserialize($_SESSION["cart"]);
    $shopcart->displayCart('long');
}

?>
<!-- specific functions for pages-->
<?php

function w_message() {
    $texts = getTextelement('welcome');
    echo "<div ID=\"welcome\">";
    foreach ($texts as $element) {
        echo "<p>$element</p>";
    }
    echo "</div>";
}

function main_page_content() {
    simple_div('withlogin', "Bestellen mit Login", "onclick=\"tomenu()\"");
    simple_div('justinfo', "Ich schau mich um", "onclick=\"toinformation()\"");
    simple_div('nologin', "Bestellen ohne login", "onclick=\"tomenu()\"");
}

function client_information() {
    global $customer_form;
    $class = "class=\"clientinput\"";
    $action = set_url('cart');
    $size = "size=\"20\"";
    echo "<form ID=\"customerform\" action=\"$action\" method=\"post\">";
    foreach ($customer_form as $name => $displayed_name) {
        echo "$displayed_name:";
        text_input($name, '',$class, $size);
    }
    echo "Ort:";
    echo "<select $class name=\"place\" size=\"1\">";
    global $places;
    foreach ($places as $place) {
        echo "<option value=\"$place\">$place</option>";
    }
    echo "</select></br>";
    jhref("purchaseConfirmation",'purchase',"class=\"tocart\"" );
    echo "</form>";
}


//login field
function login(){
    $class= "class=\"reference\"";
    $action = set_url(get_param("id", "main"));
    if((isset($_SESSION['logged']) && $_SESSION['logged']=== 'true')){
        jhref("logout", 'logout',  $class);
        echo "<form ID=\"logout\" action=\"$action\" method=\"post\">";
                echo "<input type=\"hidden\" name=\"logged\" value='false'></input>";
        echo "</form>";
        
    }
    else {
        jhref('hideLogin', "Login", $class );    
    }
}   
//login form
 function loginform(){
     if ((isset($_SESSION['logged']) && $_SESSION['logged']=== 'true')){
         $username = $_SESSION["username"];
         echo "<p>Hallo $username, sie sind eingelogt</p>";
     }
     else{
     $action = set_url(get_param("id", "main"));
     $texts = getTextelement("login");
     echo "<form ID=\"login\" action=\"$action\" method=\"post\" style=\"visibility:hidden\">";
                echo $texts['loginname']. "<input type=\"text\" name=\"uname\"></input>";
                echo $texts['loginpword']. "<input type=\"password\" name=\"pwd\"></input>";
                echo "<input type=\"hidden\"  name=\"logged\" value='true'></input>";
                jhref("login", 'login',"class=\"reference\"");
     echo "</form>";
     }
}
function informationMessage(){
    $inf = getTextelement('inform');
    echo "<div ID=\"information\">";
    foreach($inf as $textelement){
        echo $textelement;
    }
    
    }   

$content = array('main' => 'main_page', 'menu' => 'menu_list', 'information' => 'information', 'cart' => 'cart', 'login'=>'userlogin');

$navigation = array('main' => "Main", 'menu' => "Menu", 'information' => "Information", 'cart' => 'Cart');

$places = array('Bern', 'Ostermundigen', 'K&ouml;niz', 'Ittigen');

?>
