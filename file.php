
<!-- Start Navigation -->
<?php 
$navigation = array( 'main' => "Main", 'menu' =>"Menu", 'location'=> "Location");


function navigation_bar() {
	pages();
	language();
	$page = get_param("id", 0);
	if ($page != 'main'){
		login();
	}
	
}
				
function pages(){
	global $navigation;
	$lan = get_param ( "lan", "de" );
		foreach ( $navigation as $id => $name){
			$url = $_SERVER ['PHP_SELF'];
			$url = add_param ( $url, "id", $id, "?" );
			$url = add_param ( $url, "lan", $lan );
			echo "<a href=\"$url\">$name</a> ";
			}
}
		

function language() {
	$url = $_SERVER ['PHP_SELF'];
	$url = add_param ( $url, "id", get_param ( "id", 0 ), "?" );
	echo "<a class=\"language\" href=\"" . add_param ( $url, "lan", "de" ) . "\">DE</a> ";
	echo "<a class=\"language\" href=\"" . add_param ( $url, "lan", "fr" ) . "\">FR</a> ";
}

function login(){
	echo 'login';
}
?>
<!-- End Navigation -->	

			
<!--Content -->
<?php $content = array('main' =>	'main_page', 'menu' => 'menu_list' ,'location' => 'informations'
									);
function content() {
	global $content;
		$con = get_param ( "id", "main" );
		$content[$con]();
				 
				
}?>

	
<!--footer-->
<?php 
function footer(){
	$lan = get_param ( "lan", "de" );
	$url = $_SERVER ['PHP_SELF'];
	$url = add_param ( $url, "id", "location", "?" );
	$url = add_param ( $url, "lan", $lan );
	echo "<a href=\"$url\">über uns</a> ";
	
}
?>
				
													
<!--functions -->


<!--Title-->
<?php 
function title(){
		global $navigation;
		$name = get_param("id", "main");
		echo "Gulasch-2-Go - $navigation[$name]";
		
}
?>
					
<?php 
function main_page(){
	w_message();
	main_page_content();
	
	
}

function w_message(){
	global $welcome_message;
	$lan = get_param ( "lan", "de" );
	echo "<div ID=\"welcome\">$welcome_message[$lan]</div>";
}

function main_page_content(){
echo "<div ID=\"main_login\">".login()."</div>"
		<div ID=\"main_DE\">".		;
}



function menu_list(){
	global $language;
	$lan = get_param ( "lan", "de" );
	echo "<div ID=\"menu\"><p ID=\"first>\"> $language[$lan]</p>";
	echo "<div ID=\"maincourse\" ><h1>Gerichte</h1>";
		main_dishes();
	echo "</div><div ID=\"sidedish\">	<h1>Beilagen und Extras</h1>";
		side_dishes();
	echo "</div><div ID=\"extras\">	<h1>Getränke</h1>";
		extras();
	echo"</div></div>";
}

function main_dishes(){
	global $maindishes;
	foreach($maindishes as $item){
		echo "<p>$item[name]</br>$item[description]</br>CHF $item[price]</br>";
		amount_fields();
		echo "</p>";
	}
}
		
function side_dishes(){
	global $sidedishes;
	foreach($sidedishes as $item){
		echo "<p>$item[name]</br>$item[description]</br>CHF $item[price]</br>";
		amount_fields();
		echo "</p>";
	}
}
		
function extras(){
	global $extras;
	foreach($extras as $item){
		echo "<p>$item[name]</br>$item[description]</br>CHF $item[price]</br>";
		amount_fields();
		echo "</p>";
	}
}	
		
function informations(){
	echo "<div ID=\"location\">						<p>
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
function amount_fields(){
		echo 	"<form action=\"g2g.php\" method=\"get\"><input  type=\"text\" size=\"5\" name=\"amount\">Menge</input>	</form>";

}	
?>	
			
<!--Text, Data-->
			
	<!-- menu items -->
<?php
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
					1=> array( 'name'=>"Sauerrahm",'description'=> " auch lecker", 'price'=> 2.20),
					2=> array( 'name'=>"mit Pilzen",'description'=> " sehr lecker", 'price'=> 2.50),
					3=> array( 'name'=>"Mehr Paprika",'description'=> "mehr schärfe", 'price'=> 1.00), 
					4=> array( 'name'=>"Mehr Zwiebeln",'description'=> "aber hallo", 'price'=> 2.80)
					)	;
$extras = array(
					0=> array( 'name'=>"Ueli Bier",'description'=> "ein feines aus der Schweiz", 'price'=> 2.50), 
					1=> array( 'name'=>"Pilsener Urquell",'description'=> "ein richtiges aus Tschechien", 'price'=> 2.20),
					2=> array( 'name'=>"Störtebeker Schwarzbier",'description'=> "ein dunkles von der Ostsee", 'price'=> 2.50),
					3=> array( 'name'=>"Merlot",'description'=> "Rotwein aus dem Tessin", 'price'=> 12.00), 
					4=> array( 'name'=>"Cola",'description'=> "Schwarz, süss, und kalt", 'price'=> 2.80)
					);	
	

$welcome_message = array(	'de'=> "<p>Willkommen bei Gulasch-2-Go </p><p>Wir liefern die besten und herzhaftesten Gulasche und Eintöpe direkt zu Ihnen </br>nach Hause.</p>",
									'fr'=>"<p>Bienvenue chéz Gulasch-2-Go </p><p>Wir liefern die besten und herzhaftesten Gulasche und Eintöpe direkt zu Ihnen </br>nach Hause.</p>");
	
	
$language = array ('de' => "Stellen Sie sich ein Menu zusammen" , 'fr' =>"Choissisez votre menue");

?>	
<!-- unused code-->	
<?php
		//function languages(){
						//global $navigation;
						//global $language;
						//$id = get_param ( "id", "main" );
						//for ( $i = 0; $i <2;$i++){
							//$url = $_SERVER ['PHP_SELF'];
							//$url = add_param ( $url, "id", $id, "?" );
							//$url = add_param ( $url, "lan", $language[$i] );
							//echo "<a href=\"$url\">$language[$i]</a> ";
					//}
					//}
?>					
