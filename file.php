<!-- Navigation -->
<?php 		$navigation = array('main' => "main.php", 'menu'=>"menu.php", 'location'=>"location.php");
			$text = array ("de" => "Seite","en" => "Page" );
			$title = array ("de" => "Willkommen","en" => "Welcome");
?>
<?php $navi = array('main' => "main", 'menu'=>"menu", 'location'=>"location")

?>

<?php $content = array("main" =>	"<div ID=\"welcome\">
									 $welcome_message 
									</div>", 
						"menu" => 	"<div ID=>\"menue\">
									<p ID=\"first>\"> Stellen Sie sich ein Menu zusammen</p>

										<div ID=\"maincourse\" ><h1>Gerichte</h1>
											<?php main_dishes(); ?>
										
										</div>
										
										<div ID=\"sidedish\">	<h1>Beilagen und Extras</h1>
											<?php 
											side_dishes();
											?>
										</div>
										
										<div ID=\"extras\">	<h1>Getränke</h1>
											<?php 
											extras();
											?>
									<	/div>
									</div>", 
									"location" => "<div ID=\"location\">
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
									)?>
<?php 
		//function navigation_list(){
			//global $navigation;
			//foreach ( $navigation as $name => $link ) {
			//echo "<a href=\></a>"$link?id=$name\">$name</a> ";
			//}
		//}
		
		?>
	
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
					
													
					
	<?php 
		function menu(){
			echo "<div ID=>\"menue\">
									<p ID=\"first>\"> Stellen Sie sich ein Menu zusammen</p>

										<div ID=\"maincourse\" ><h1>Gerichte</h1>
											<?php". main_dishes() ."
										?>
										</div>
										
										<div ID=\"sidedish\">	<h1>Beilagen und Extras</h1>
											<?php".
											side_dishes().
											"?>
										</div>
										
										<div ID=\"extras\">	<h1>Getränke</h1>
											<?php". 
											extras()
											."?>
									<	/div>
									</div>"
		;}
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
