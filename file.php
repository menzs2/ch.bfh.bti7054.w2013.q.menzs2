
<!-- Start Navigation -->
<?php
function navigation_bar() {
	pages ();
	language ();
	$page = get_param ( "id", 0 );
	if ($page != 'main') {
		login();
	}
}
function pages() {
	global $navigation;
	$lan = get_param ( "lan", "de" );
	foreach ( $navigation as $id => $name ) {
		$url = $_SERVER ['PHP_SELF'];
		$url = add_param ( $url, "id", $id, "?" );
		$url = add_param ( $url, "lan", $lan );
		referencing($url, $name);
		
	}
}
function language() {
	$url = $_SERVER ['PHP_SELF'];
	$url = add_param ( $url, "id", get_param ( "id", 0 ), "?" );
	referencing(add_param ( $url, "lan", "de" ), 'DE', "class=\"language\"");
	referencing(add_param ( $url, "lan", "fr" ), 'FR', "class=\"language\"");
}	
?>
<!-- End Navigation -->


<!--Content -->
<?php


function content() {
	global $content;
	$con = get_param ( "id", "main" );
	$content [$con] ();
}
?>


<!--footer-->
<?php
function footer() {
	if (get_param ( "id", 0 ) == 'main') {
		language();
	}
	
	$lan = get_param ( "lan", "de" );
	$url = $_SERVER ['PHP_SELF'];
	$url = add_param ( $url, "id", "location", "?" );
	$url = add_param ( $url, "lan", $lan );
	referencing($url, 'über uns');
}
?>


<!--functions -->


<!--Title-->
<?php
function title() {
	global $navigation;
	$name = get_param ( "id", "main" );
	echo "Gulasch-2-Go - $navigation[$name]";
}
?>
					
<?php
function main_page() {
	w_message ();
	main_page_content ();
}
function w_message() {
	global $welcome_message;
	$lan = get_param ( "lan", "de" );
	simple_div('welcome', $welcome_message[$lan]);

}
function main_page_content() {
	simple_div('main_login', login());
	
}
function menu_list() {
	global $language;
	$lan = get_param ( "lan", "de" );
	echo "<div ID=\"menu\"><p ID=\"first>\"> $language[$lan]</p>";
	echo "<div ID=\"maincourse\" ><h1>Gerichte</h1>";
	main_dishes ();
	echo "</div><div ID=\"sidedish\"> <h1>Beilagen und Extras</h1>";
	side_dishes ();
	echo "</div><div ID=\"extras\">	<h1>Getränke</h1>";
	extras ();
	echo "</div></div>";
}
function main_dishes() {
	global $maindishes;
	foreach ( $maindishes as $item ) {
		item_list($item);
	}
}
function side_dishes() {
	global $sidedishes;
	foreach ( $sidedishes as $item ) {
		item_list($item);
	}
}
function extras() {
	global $extras;
	foreach ( $extras as $item ) {
		item_list($item);
	}
}
function informations() {
	echo "<div ID=\"information\">						<p>
														Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod
														tempor incidunt ut labore et </br>dolore magna aliqua. Ut enim ad
														minim veniam, quis nostrud exercitation ullamco laboris
													</p>
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod
														tempor incidunt ut labore et </br>dolore magna aliqua. Ut enim ad
														minim veniam, quis nostrud exercitation ullamco laboris
													</p>
												</div>";
}

function cart(){

}

function client_information(){
	echo "<form action=\"g2g.php\" method=\"get\">		
			<input  type=\"text\" size=\"20\" name=\"first_name\">Vorname</input>
			<input  type=\"text\" size=\"20\" name=\"name\">Nachname</input>			
														<input type=\"submit\" value=\"Bestellen\" />	
			</form>";

}
?>

<!-- logic-->
<?php
function get_param($name, $default) {
	if (isset ( $_GET [$name] ))
		return urldecode ( $_GET [$name] );
	else
		return $default;
}
function add_param($url, $name, $value, $sep = "&") {
	$new_url = $url . $sep . $name . "=" . urlencode ( $value );
	return $new_url;
}
function amount_fields() {
	echo "<form action=\"g2g.php\" method=\"get\"><input  type=\"text\" size=\"5\" name=\"amount\">Menge</input>	
														<input type=\"submit\" value=\"Bestellen\" />	
			</form>";
}
function item_option($item){
	echo "<form action=\"g2g.php\" method=\"get\">";
	global $options;
	foreach ( $options as $item ) {	
	echo "	<input  type=\"checkbox\" >$item[name]</input>";
	}
	echo		"</form>";
}
function login() {
	echo "<form action=\"g2g.php\" method=\"get\" name=\"login1\"><input type=\"submit\" value=\"login\" />	</form>";
}
//creates a reference
function referencing($url, $text, $class=''){
	echo "<a $class href=\"$url\">$text</a> ";
}
//list menu items
function item_list($item){
	echo "<p>$item[name]</br>$item[description]</br>CHF ".number_format($item['price'],2)."</br>";
		amount_fields ();
		echo "</p>";
}
function simple_div($div_id, $div_content){
	echo "<div ID=\"$div_id\">$div_content</div>";
}
?>

<!--Text, Data to be moved to DB-->

<!-- menu items -->
<?php
$content = array ('main' => 'main_page','menu' => 'menu_list','location' => 'informations' ,'cart' => 'cart');

$navigation = array ('main' => "Main",'menu' => "Menu",'location' => "Location");

$maindishes = array(
					0=> array( 'name'=>"Rindsgulasch",'description'=> "lecker", 'price'=> 12.50), 
					1=> array( 'name'=>"Scharfes Rindsgulasch",'description'=> " auch lecker", 'price'=> 13.50),
					2=> array( 'name'=>"Schweinsgulasch",'description'=> " sehr lecker", 'price'=> 12.20),
					3=> array( 'name'=>"Wurstgulasch",'description'=> "wie von Mutti", 'price'=> 10.50), 
					4=> array( 'name'=>"Lamm Pilaw",'description'=> "eigentlich kein Gulasch, trotzdem lecker", 'price'=> 12.80),
 					5=> array( 'name'=>"Erädpfelgulasch",'description'=> "für Kartoffelliebhaber", 'price'=> 10.50)
					);

$sidedishes = array(
					0=> array( 'name'=>"Knödel",'description'=> "lecker", 'price'=> 2.50), 
					1=> array( 'name'=>"Kartoffelstock",'description'=> " auch lecker", 'price'=> 2.20),
					2=> array( 'name'=>"Breite Nudeln",'description'=> " sehr lecker", 'price'=> 2.50),
					3=> array( 'name'=>"Spätzle",'description'=> "mehr schärfe", 'price'=> 1.00), 
					4=> array( 'name'=>"Rösti",'description'=> "aber hallo", 'price'=> 2.80)
					)	;
$extras = array(
					0=> array( 'name'=>"Ueli Bier",'description'=> "ein feines aus der Schweiz", 'price'=> 2.50), 
					1=> array( 'name'=>"Pilsener Urquell",'description'=> "ein richtiges aus Tschechien", 'price'=> 2.20),
					2=> array( 'name'=>"Störtebeker Schwarzbier",'description'=> "ein dunkles von der Ostsee", 'price'=> 2.50),
					3=> array( 'name'=>"Merlot",'description'=> "Rotwein aus dem Tessin", 'price'=> 12.00), 
					4=> array( 'name'=>"Cola",'description'=> "Schwarz, süss, und kalt", 'price'=> 2.80)
					);	
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

?>
<!-- unused code-->
<?php
		
?>					
