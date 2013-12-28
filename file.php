<!--
php code for Gulasch-2-Go 
Author: Stephan Menzi menzs2
-->

<!--Title-->
<?php

function title() {
    global $navigation;
    $name = get_param("id", "main");
    echo "Gulasch-2-Go - $navigation[$name]";
}
?>
<!-- Start Navigation -->
<?php

function navigation_bar() {
    $page = get_param("id", 0);
    pages();
    if ($page != 'main') {
        languages();
    }
}
?>
<!-- End Navigation -->


<!--Content -->
<?php

//the main content chooser
function content() {
    global $content;
    $con = $content[get_param("id", "main")];
    if (isset($_GET ["lan"])) {
        $_SESSION["lan"] = urldecode($_GET ["lan"]);
    }
    if (!isset($_SESSION["lan"])) {
        echo "<div ID=\"content\"\">";
        call_user_func('chooselanguage');
        echo "</div>";
    } else {
        func_div('content', $con);
    }
}
?>
<!--Content -->

<!--footer-->
<?php

function footer() {
    if (get_param("id", 0) == 'main') {
        languages();
    } else {
        $g2gadress = 'Gulasch-To-Go, Zähringerstrasse 34, 3012 Bern';
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
    checkforCart();
    $shopcart = unserialize($_SESSION["cart"]);
    $menu_message = getTextelement("choose");
    $productlist = new productList();
    echo "<div ID=\"menu\"><p ID=\"first>\"> $menu_message[0]</p>";
    $productlist->displayProductList();
    $shopcart->displayCart('short');
    echo "</div>";
}

//information on our shop
function information() {
    $inf = getTextelement('inforamtion');
    global $information_message;
    $lan = get_param("lan", "de");
    simple_div('information', $information_message [$lan]);
}

//the shoppingcart and the clientInformation
function cart() {
    checkforCart();
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
    simple_div('withlogin', "Bestellen mit Login", "onclick=\"menu()\"");
    simple_div('justinfo', "Ich schau mich um", "onclick=\"information()\"");
    simple_div('nologin', "Bestellen ohne login", "onclick=\"menu()\"");
}

function client_information() {
    global $customer_form;
    $action = set_url('cart');
    $size = "size=\"20\"";
    echo "<form ID=\"customerform\"action=\"$action\" method=\"post\">";
    foreach ($customer_form as $name => $displayed_name) {
        echo "$displayed_name";
        text_input($name, '', $size);
    }
    echo "<select name=\"place\" size=\"1\">";
    global $places;
    foreach ($places as $place) {
        echo "<option value=\"$place\">$place</option>";
    }
    echo "</select>";
    submit_input('purchase', "onclick=\"purchase_confirmation()\"");
    echo "</form>";
}

function amount_fields($itemkey) {
    echo "<input  type=\"hidden\"  name=\"add\" value=\"true\">";
    echo "<input  type=\"hidden\"  name=\"itemkey\" value=\"$itemkey\">";
    echo "<select name=\"qty\" size=\"1\">";
    for ($i = 0; $i < 7; $i++) {
        echo "<option value=\"$i\">$i</option>";
    }
    echo "</select>";
    submit_input("to Cart");
}

function checkforCart() {
    $shopcart;
    if (!isset($_SESSION["cart"])) {
        $shopcart = new shoppingcart();
    } else {
        $shopcart = unserialize(($_SESSION["cart"]));
    }
    $shopcart->checkForInput();
}

/*
  function item_option($item) {
  global $options;
  echo "<form action=\"g2g.php\" method=\"get\">";
  foreach ( $options as $item ) {
  echo "	<input  type=\"checkbox\" >$item[name]</input>";
  }
  echo "</form>";
  }
 */
?>
<!-- general logic-->

<?php

function getTextelement($code) {
    $elements = array();
    $myShopDB = new ShopDB();
    $res = $myShopDB->getText('welcome');
    while ($textelem = $res->fetch_object()) {
        $elements[] = $textelem->textelement;
    }
    $myShopDB->close();
    return $elements;
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

//set the language
function setlanguage($language) {
    $_SESSION["lan"] = $language;
    javascript:main();
}

//change the language
function languages($lenght = '') {
    global $language;
    $class = "class=\"reference\"";
    $url = set_url(get_param("id", 0));
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

//a HTML DIV that has a String as the content
function simple_div($div_id, $div_content, $eventhandler = '') {
    echo "<div ID=\"$div_id\" $eventhandler>$div_content</div>";
}

//a HTML DIV that has a funtion as the content
function func_div($div_id, $func, $params = false) {
    echo "<div ID=\"$div_id\">";
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
function text_input($name, $content, $size = 20) {
    echo "<input  type=\"text\" size=\"$size\" name=\"$name\">$content</input> </br>";
}

// create an text input field
function submit_input($value, $eventhandler = '', $displayed_name = '') {
    echo "<input  type=\"submit\" value=\"$value\" $eventhandler>$displayed_name</input> </br>";
}
?>


<!--Classes-->

<?php

//HTML Form as a class ->not usabele yet
class Form {

    private $action;
    private $method;
    private $formname;
    private $formcontent = array();

    function __construct($action, $name, $method = 'get') {
        $this->action = $action;
        $this->formname = $name;
        $this->method = $method;
    }

    public function addInput($type, $name, $value, $eventhandler = '', $displayed_name = '') {
        $formcontent[] = "<input  type=\"$type\" name=\"$name\" value=\"$value\" $eventhandler>$displayed_name</input> </br>";
    }

    public function addString($str) {
        $formcontent[] = $str;
    }

    public function displayForm() {
        echo "<form action=\"$this->action\" method=\"$this->method\" name=\"$this->formname\">";
        foreach ($this->formcontent as $content) {
            echo $content;
        }
        echo "</form>";
    }

}

//The productlist 
class productList {

    private $items = array();

    function __construct() {
        $myShopDB = new ShopDB();
        $res = $myShopDB->getAllProducts();
        while ($items = $res->fetch_object()) {
            $this->addShopItem(new shop_Item($items));
        }
        $myShopDB->close();
    }

    private function addShopItem($item) {
        $itemkey = $item->name;
        $typekey = $item->type;
        if (!isset($this->items[$typekey])) {
            $this->items[$typekey] = array();
        }
        $this->items[$typekey][$itemkey] = $item;
    }

    public function displayProductList() {
        foreach ($this->items as $typekey => $type) {
            global $titles;
            echo "<div ID=\"$typekey\">";
            $this->displayItemTypeList($type, $titles[$typekey]);
            echo"</div>";
        }
    }

    private function displayItemTypeList($type, $group_title) {
        echo "<h1>$group_title</h1>";
        foreach ($type as $item) {
            $item->displayShopItem();
        }
    }

    public function displayItem($itemkey) {
        $this->items[$itemkey]->displayShopItem;
    }

}

//a product
class shop_Item {

    public $itemkey;
    public $name;
    public $type;
    private $description;
    private $price;

    function __construct($item) {
        $this->itemkey = $item->itemkey;
        $this->name = $item->name;
        $this->type = $item->type;
        $this->description = $item->description;
        $this->price = $item->price;
    }

    function displayShopItem() {
        $url = set_url('menu');
        echo "<p>$this->name</br>$this->description</br>CHF " . number_format($this->price, 2) . "</br>";
        echo "<form action=\"$url\" method=\"post\" name=\"$this->itemkey\">";
        amount_fields($this->itemkey);
        echo "</form></p>";
    }

}

//a shopping cart that stores all selected Items
class shoppingcart {

    private $items = array();

    function __construct() {
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = serialize($this);
        }
    }

    public function addItemFromMenu($itemkey, $qty) {
        for ($i = 0; $i < $qty; $i++) {
            $this->items[] = $itemkey;
        }
        $this->resetIndices();
        $_SESSION["cart"] = serialize($this);
    }

    public function removeItem($index) {
        unset($this->items[$index]);
        $this->resetIndices();
        $_SESSION["cart"] = serialize($this);
    }

    public function displayCart($cartType) {
        $url = set_url(get_param("id", "cart"));
        $cartID = $cartType . 'shoppingcart';
        echo "<div ID=\"$cartID\">";
        echo "<h1>Ihr Warenkorb</h1>";
        if (count($this->items) == 0) {
            echo "Es ist noch nichts im Warenkorb";
        } else {
            $myShopDB = new ShopDB();
            echo "<form action=\"$url\" method=\"post\" name=\"remove\">";
            foreach ($this->items as $index => $shopItemKey) {
                $res = $myShopDB->getProduct($shopItemKey);
                $item = $res->fetch_object();
                echo "<p>$index $item->name" . number_format($item->price, 2) . "</p>";
                echo "<input  type=\"hidden\"  name=\"remove\" value=\"$index\">";
                echo submit_input("remove");
            }
            echo "</form></p>";
            echo "<form action=\"$url\" method=\"post\" name=\"remove\">";
            echo "<input  type=\"hidden\"  name=\"remove\" value=\"all\">";
            echo submit_input("remove all");
            echo "</form></p>";
            $myShopDB->close();
        }
        echo"</div>";
        ;
    }

    public function checkForInput() {
        $this->checkForAdd();
        $this->checkForRemove();
    }

    private function checkForAdd() {
        if (isset($_POST["add"])) {
            $itemkey = $_POST["itemkey"];
            $quantity = $_POST["qty"];
            $this->addItemFromMenu($itemkey, $quantity);
        }
    }

    private function checkForRemove() {
        if (isset($_POST["remove"])) {
            if ($_POST["remove"] == 'all') {
                $this->resetCart();
            } else {
                $this->removeItem($_POST["remove"]);
            }
        }
    }

    private function resetIndices() {
        $temp = $this->items;
        $this->items = array_values($temp);
    }

    function resetCart() {
        foreach ($this->items as $key => $item) {
            unset($this->items[$key]);
        }
        $this->items = array();
        $_SESSION["cart"] = serialize($this);
    }

}
?>

<!-- SQL -->

<?php

//SQL functions
class ShopDB extends mysqli {

    function __construct() {
        parent::__construct("localhost", "root", "");
        parent::select_db("g2g");
    }

    function getAllProducts() {
        $lan = $_SESSION['lan'];
        $fields = "MIT_PK AS itemkey, MIT_Type AS type, name.name, descr.TXT_$lan AS description, MIT_Price AS price";
        $innerquery = "(SELECT MIT_PK, MIT_Type, MIT_Description, MIT_price, TXT_$lan as name FROM `MenuItem` Join Texts on TXT_PK = MIT_Name)";
        return $this->query("SELECT $fields FROM Texts as descr JOIN $innerquery as name ON descr.TXT_PK = MIT_Description");
    }

    function getProduct($key) {
        $lan = $_SESSION['lan'];
        $fields = "MIT_PK AS itemkey, MIT_Type AS type, name.name, descr.TXT_$lan AS description, MIT_Price AS price";
        $innerquery = "(SELECT MIT_PK, MIT_Type, MIT_Description, MIT_price, TXT_$lan as name FROM `MenuItem` Join Texts on TXT_PK = MIT_Name)";
        return $this->query("SELECT $fields FROM Texts as descr JOIN $innerquery as name ON descr.TXT_PK = MIT_Description WHERE MIT_PK = $key");
    }

    function insertOrder() {
        
    }

    public function getText($code) {
        $lan = $_SESSION['lan'];
        return $this->query("SELECT TXT_$lan as textelement FROM Texts where TXT_code like \"$code%\"");
    }

}
?>

<!--Text, Data to be moved to DB-->




<?php
$content = array('main' => 'main_page', 'menu' => 'menu_list', 'information' => 'information', 'cart' => 'cart');

$navigation = array('main' => "Main", 'menu' => "Menu", 'information' => "Information", 'cart' => 'Cart');

$titles = array('maindish' => 'Gerichte', 'sidedish' => 'Beilagen', 'extras' => 'Getränke');

$customer_form = array('salutation' => 'Anrede',
    'firstname' => 'Vorname',
    'lastname' => 'Nachname',
    'street' => 'Strasse',
    'postcode' => 'PLZ');

// TODELETE $dishes = array(	0=> array( 'name'=>"Rindsgulasch",'type'=>'maincourse','description'=> "lecker", 'price'=> 12.50), 
//1=> array( 'name'=>"Scharfes Rindsgulasch",'type'=>'maincourse','description'=> " auch lecker", 'price'=> 13.50),
//2=> array( 'name'=>"Schweinsgulasch",'type'=>'maincourse','description'=> " sehr lecker", 'price'=> 12.20),
//3=> array( 'name'=>"Wurstgulasch",'type'=>'maincourse','description'=> "wie von Mutti", 'price'=> 10.50), 
//4=> array( 'name'=>"Lamm Pilaw",'type'=>'maincourse','description'=> "eigentlich kein Gulasch, trotzdem lecker", 'price'=> 12.80),
//5=> array( 'name'=>"Erädpfelgulasch",'type'=>'maincourse','description'=> "für Kartoffelliebhaber", 'price'=> 10.50),
//6=> array( 'name'=>"Knödel",'type'=>'sidedish','description'=> "lecker", 'price'=> 2.50), 
//7=> array( 'name'=>"Kartoffelstock",'type'=>'sidedish','description'=> " auch lecker", 'price'=> 2.20),
//8=> array( 'name'=>"Breite Nudeln",'type'=>'sidedish','description'=> " sehr lecker", 'price'=> 2.50),
//9=> array( 'name'=>"Spätzle",'type'=>'sidedish','description'=> "mehr schärfe", 'price'=> 1.00), 
//10=> array( 'name'=>"Rösti",'type'=>'sidedish','description'=> "aber hallo", 'price'=> 2.80),
//11=> array( 'name'=>"Ueli Bier",'type'=>'extras','description'=> "ein feines aus der Schweiz", 'price'=> 2.50), 
//12=> array( 'name'=>"Pilsener Urquell",'type'=>'extras','description'=> "ein richtiges aus Tschechien", 'price'=> 2.20),
//13=> array( 'name'=>"Störtebeker Schwarzbier",'type'=>'extras','description'=> "ein dunkles von der Ostsee", 'price'=> 2.50),
//14=> array( 'name'=>"Merlot",'type'=>'extras','description'=> "Rotwein aus dem Tessin", 'price'=> 12.00), 
//15=> array( 'name'=>"Cola",'type'=>'extras','description'=> "Schwarz, süss, und kalt", 'price'=> 2.80));

$options = array(
    0 => array('name' => "schärfer", 'description' => "lecker", 'price' => 2.50),
    1 => array('name' => "Sauerrahm", 'description' => " auch lecker", 'price' => 2.20),
    2 => array('name' => "mit Pilzen", 'description' => " sehr lecker", 'price' => 2.50),
    3 => array('name' => "Mehr Paprika", 'description' => "mehr schärfe", 'price' => 1.00),
    4 => array('name' => "Mehr Zwiebeln", 'description' => "aber hallo", 'price' => 2.80),
    5 => array('name' => "milder", 'description' => "aber hallo", 'price' => 0.00));

$places = array('Bern', 'Ostermundigen', 'Köniz', 'Ittigen');

$menu_message = array('de' => "Stellen Sie sich ein Menu zusammen", 'fr' => "Choissisez votre menue");


$language = array('de' => "Deutsch", 'fr' => "Fran&ccedil;ais");

$information_message = array('de' => "<p>	Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod	tempor incidunt ut labore et </br>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>",
    'fr' => "<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod	tempor incidunt ut labore et </br>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>");
?>
