<!--php code for Gulasch-2-Go Author: menzs2-->

<script type="text/javascript" src="file.js"></script>
<!--Title-->
<?php
function title() {
	global $navigation;
	$name = get_param ( "id", "main" );
	echo "Gulasch-2-Go - $navigation[$name]";
}
?>
<!-- Start Navigation -->
    <?php
function navigation_bar() {
	pages ();
	$page = get_param ( "id", 0 );
	if ($page != 'main') {
		login();
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
	$con = get_param ( "id", "main" );
	func_div('content', $content [$con]);
}
?>


<!--footer-->
<?php
function footer() {
	if (get_param ( "id", 0 ) == 'main') {
		languages();
	}
	else{
	$url = set_url('location');
            referencing ( $url, 'über uns' );
        }
}
?>


<!--Content Functions -->

<?php


function main_page() {
	w_message ();
	main_page_content ();
}
	function w_message() {
		global $welcome_message;
		$lan = get_param ( "lan", "de" );
		simple_div ( 'welcome', $welcome_message [$lan] );
	}
	function main_page_content() {
		global $information_message;
		simple_div('withlogin', "Bestellen mit Login", "onclick=\"purchase_confirmation()\"");
		simple_div('justinfo', "Ich schau mich um");
		simple_div('nologin',"Bestellen ohne login","onclick=\"to_page()\"");
	}
// list menu items
function menu_list() {
	global $language;
	global $dishes;
	$lan = get_param ( "lan", "de" );
	$productlist = new productList($dishes);
		echo "<div ID=\"menu\"><p ID=\"first>\"> $language[$lan]</p>";
	$productlist->displayProductList(); 
	echo "</div>";
}

function informations() {
	global $information_message;
	$lan = get_param ( "lan", "de" );
	simple_div ( 'information', $information_message [$lan] );
}

function cart() {
	$shopcart = new shoppingcart();
        func_div ( 'client', 'client_information' );
        $shopcart->displayCart();
        
        
}
function client_information() {
	global $customer_form;
        $action= set_url('cart');
	$size = "size=\"20\"";
	echo "<form action=\"$action\" method=\"get\">";
            foreach ( $customer_form as $name => $displayed_name ) {
                    text_input ( $name, $displayed_name, $size );
            }
            submit_input('purchase', "onclick=\"purchase_confirmation()\"");
        echo "</form>";
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
function pages() {
	global $navigation;
	$lan = get_param ( "lan", "de" );
	foreach ( $navigation as $id => $name ) {
		$url = $_SERVER ['PHP_SELF'];
		$url = add_param ( $url, "id", $id, "?" );
		$url = add_param ( $url, "lan", $lan );
		referencing ( $url, $name );
	}
}
function languages() {
	$class = "class=\"language\"";
	$url = $_SERVER ['PHP_SELF'];
	$url = add_param ( $url, "id", get_param ( "id", 0 ), "?" );
	referencing ( add_param ( $url, "lan", "de" ), 'DE', $class );
	referencing ( add_param ( $url, "lan", "fr" ), 'FR', $class );
}?>

<!-- logic-->
<?php
function get_param($name, $default) {
	if (isset ( $_GET [$name] )){
		return urldecode ( $_GET [$name] );
        }
	else{
        return $default;}
}
function add_param($url, $name, $value, $sep = "&") {
	$new_url = $url . $sep . $name . "=" . urlencode ( $value );
	return $new_url;
}
function set_url($page){
        $lan = get_param ( "lan", "de" );
	$url = $_SERVER ['PHP_SELF'];
	$url = add_param ( $url, "id", "$page", "?" );
	$url = add_param ( $url, "lan", $lan );
        return $url;
}
function amount_fields() {
	text_input("amount", "Menge", 5);
        submit_input("to Cart");
}


function login() {
	form ( "g2g.php", "get", "login", submit_input ( "login" ) );
}

// creates a reference to another page
function referencing($url, $text, $class = '') {
	echo "<a $class href=\"$url\">$text</a> ";
}
//a HTML DIV that has a String as the content
function simple_div($div_id, $div_content, $eventhandler='') {
	echo "<div ID=\"$div_id\" $eventhandler>$div_content</div>";
}
//a HTML DIV that has a funtion as the content
function func_div($div_id, $func, $params=false) {
	echo "<div ID=\"$div_id\">";
        if ($params != false){
            call_user_func_array($func, $params); 
        }
        else {
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
function submit_input($value, $eventhandler='', $displayed_name = '') {
	echo "<input  type=\"submit\" value=\"$value\" $eventhandler>$displayed_name</input> </br>";
}
?>

<!--Classes-->

<?php
class productList{
	
	private $items = array();
        
        function __construct($dishes){
           foreach ($dishes as $items){		
                $this->add_item( new shop_Item($items));
                }  
        }
	
	private function add_item($item){
		$itemkey = $item->name;
		$typekey = $item->type;
		if (!isset($this->items[$typekey])) {
			$this->items[$typekey] = array();
			}
		$this->items[$typekey][$itemkey] = $item;
	}
	public function displayProductList(){
		foreach($this->items as $typekey=>$type){
			global $titles;
			echo "<div ID=\"$typekey\">";
			$this->displayItemTypeList($type, $titles[$typekey]);
			echo"</div>";
			}
	}
	private function displayItemTypeList($type,$group_title){
			echo "<h1>$group_title</h1>";
			foreach($type as $item){
				$item->displayItem();
			}
		}
}
//a product
class shop_Item{

	public $name;
	public $type;
	private $description;
	private $price;
	
	function __construct($item){
		$this->name = $item['name'];
		$this->type = $item['type'];
		$this->description = $item['description'];
		$this->price = $item['price'];
	}
	function displayItem(){
		echo "<p>$this->name</br>$this->description</br>CHF " . number_format ( $this->price, 2 ) . "</br>";
		form('g2g.php', "get", "amount", amount_fields ());
		echo "</p>";
	}
        
	
}

//a shopping cart that stores all selected Items
class shoppingcart{
	private $items= array();
	//function __construct();
	
	public function add_item($item, $quantity){
		if (!isset($this->items[$item])) $this->items[$item] = 0;
		$this->items[$art] += $quantity;
}
	public function removeItem($art, $num) {
		if (isset($this->items[$art]) && $this->items[$art] >= $num) {
		$this->items[$art] -= $num;
		if ($this->items[$art] == 0) unset($this->items[$art]);
		return true;
		}
		else return false;
		}
                
        public function displayCart(){
                    echo "<div ID=\"cart\">";
                        foreach ($items as $shopitem){
                            $shopitem->displayItem();
                        }                            
			echo"</div>"; ;
                }

	 
}
?>



<!--Text, Data to be moved to DB-->

<!-- menu items -->


<?php

$mysqli = new mysqli("localhost", "root", "");

$content = array ('main' => 'main_page','menu' => 'menu_list','location' => 'informations' ,'cart' => 'cart');

$navigation = array ('main' => "Main",'menu' => "Menu",'location' => "Location", 'cart' => 'Cart');

$titles = array('maincourse'=>'Gerichte', 'sidedish'=>'Beilagen', 'extras'=>'Getränke');

$customer_form = array(	'salutation' => 'Anrede',
						'firstname' => 'Vorname',
						'lastname' => 'Nachname',
						'street' => 'Strasse',
						'postcode' => 'PLZ',
						'place' => 'Ort');
						
$dishes = array(	0=> array( 'name'=>"Rindsgulasch",'type'=>'maincourse','description'=> "lecker", 'price'=> 12.50), 
					1=> array( 'name'=>"Scharfes Rindsgulasch",'type'=>'maincourse','description'=> " auch lecker", 'price'=> 13.50),
					2=> array( 'name'=>"Schweinsgulasch",'type'=>'maincourse','description'=> " sehr lecker", 'price'=> 12.20),
					3=> array( 'name'=>"Wurstgulasch",'type'=>'maincourse','description'=> "wie von Mutti", 'price'=> 10.50), 
					4=> array( 'name'=>"Lamm Pilaw",'type'=>'maincourse','description'=> "eigentlich kein Gulasch, trotzdem lecker", 'price'=> 12.80),
 					5=> array( 'name'=>"Erädpfelgulasch",'type'=>'maincourse','description'=> "für Kartoffelliebhaber", 'price'=> 10.50),
					6=> array( 'name'=>"Knödel",'type'=>'sidedish','description'=> "lecker", 'price'=> 2.50), 
					7=> array( 'name'=>"Kartoffelstock",'type'=>'sidedish','description'=> " auch lecker", 'price'=> 2.20),
					8=> array( 'name'=>"Breite Nudeln",'type'=>'sidedish','description'=> " sehr lecker", 'price'=> 2.50),
					9=> array( 'name'=>"Spätzle",'type'=>'sidedish','description'=> "mehr schärfe", 'price'=> 1.00), 
					10=> array( 'name'=>"Rösti",'type'=>'sidedish','description'=> "aber hallo", 'price'=> 2.80),
					11=> array( 'name'=>"Ueli Bier",'type'=>'extras','description'=> "ein feines aus der Schweiz", 'price'=> 2.50), 
					12=> array( 'name'=>"Pilsener Urquell",'type'=>'extras','description'=> "ein richtiges aus Tschechien", 'price'=> 2.20),
					13=> array( 'name'=>"Störtebeker Schwarzbier",'type'=>'extras','description'=> "ein dunkles von der Ostsee", 'price'=> 2.50),
					14=> array( 'name'=>"Merlot",'type'=>'extras','description'=> "Rotwein aus dem Tessin", 'price'=> 12.00), 
					15=> array( 'name'=>"Cola",'type'=>'extras','description'=> "Schwarz, süss, und kalt", 'price'=> 2.80));

$options = array(
					0=> array( 'name'=>"schärfer",'description'=> "lecker", 'price'=> 2.50), 
					1=> array( 'name'=>"Sauerrahm",'description'=> " auch lecker", 'price'=> 2.20),
					2=> array( 'name'=>"mit Pilzen",'description'=> " sehr lecker", 'price'=> 2.50),
					3=> array( 'name'=>"Mehr Paprika",'description'=> "mehr schärfe", 'price'=> 1.00), 
					4=> array( 'name'=>"Mehr Zwiebeln",'description'=> "aber hallo", 'price'=> 2.80),
					5=> array( 'name'=>"milder",'description'=> "aber hallo", 'price'=> 0.00))	;					
	

$welcome_message = array(	'de'=> "<p>Willkommen bei Gulasch-2-Go </p><p>Wir liefern die besten und herzhaftesten Gulasche und Eintöpe direkt zu Ihnen </br>nach Hause.</p>",
									'fr'=>"<p>Bienvenue chéz Gulasch-2-Go </p><p>Wir liefern die besten und herzhaftesten Gulasche und Eintöpe direkt zu Ihnen </br>nach Hause.</p>");
	
	
$language = array ('de' => "Stellen Sie sich ein Menu zusammen" , 'fr' =>"Choissisez votre menue");

$information_message = array(	'de' =>"<p>	Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod	tempor incidunt ut labore et </br>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>",
								'fr' => "<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod	tempor incidunt ut labore et </br>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>");

?>
