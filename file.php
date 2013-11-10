<!-- Navigation -->

<?php 
$navigation = array( "main","menu", "location");

function navigation_bar() {
			global $navigation;
						 $lan = get_param ( "lan", "de" );
						foreach ( $navigation as $name ){
							$url = $_SERVER ['PHP_SELF'];
							$url = add_param ( $url, "id", $name, "?" );
							$url = add_param ( $url, "lan", $lan );
							echo "<a href=\"$url\">$name</a> ";
				}}?>
				
<!--Content -->
<?php $content = array('main' =>	'main_page', 'menu' => 'menu_list' ,
						
									'location' => "<div ID=\"location\">
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod
														tempor incidunt ut labore et </br>dolore magna aliqua. Ut enim ad
														minim veniam, quis nostrud exercitation ullamco laboris
													</p>
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod
														tempor incidunt ut labore et </br>dolore magna aliqua. Ut enim ad
														minim veniam, quis nostrud exercitation ullamco laboris
													</p>
												</div>"
									);
function content() {
				global $content;
				$con = get_param ( "id", "main" );
				$content[$con]();
				 
				
			}?>

	
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
					);	?>
					
													
	<!--functions -->				
	<?php 
	    function main_page(){
			global $welcome_message;
		  echo "<div ID=\"welcome\">$welcome_message</div>";
	
		}
		?>
		<?php
		function menu_list(){
			echo "<div ID=>\"menu\"><p ID=\"first>\"> Stellen Sie sich ein Menu zusammen</p>";
			echo "<div ID=\"maincourse\" ><h1>Gerichte</h1>";
			main_dishes();
			echo "</div><div ID=\"sidedish\">	<h1>Beilagen und Extras</h1>";
			side_dishes();
			echo "</div><div ID=\"extras\">	<h1>Getränke</h1>";
			extras();
			echo"<	/div></div>";
			}
		function main_dishes(){
			global $maindishes;
			foreach($maindishes as $item){
				echo "<p>$item[name]</br>$item[description]</br>CHF $item[price]</p>";
			}
		}
		
		function side_dishes(){
			global $sidedishes;
			foreach($sidedishes as $item){
				echo "<p>$item[name]</br>$item[description]</br>CHF $item[price]</p>";
			}
		}
		
		function extras(){
				global $extras;
				foreach($extras as $item){
					echo "<p>$item[name]</br>$item[description]</br>CHF $item[price]</p>";
			}
		}	
	?>
<!-- welcome message -->	
	<?php $welcome_message=	 <<<WELC
	<p>Willkommen bei Gulasch-To-Go </p>
			
	Wir liefern die besten und herzhaftesten Gulasche und Eintöpe direkt zu Ihnen
	nach Hause.		
	
	
WELC;

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
			}?>
			

		<?php
			
			
			
			
			
			//function language() {
				//$url = $_SERVER ['PHP_SELF'];
				//$url = add_param ( $url, "id", get_param ( "id", 0 ), "?" );
				//echo "<a href=\"" . add_param ( $url, "lan", "de" ) . "\">DE</a> ";
				//echo "<a href=\"" . add_param ( $url, "lan", "en" ) . "\">EN</a> ";
			//}
			
			?>	
