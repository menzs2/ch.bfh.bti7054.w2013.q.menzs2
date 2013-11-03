<!-- Navigation -->
<?php $navigation = array('main' => "main.php", 'menu'=>"menu.php", 'location'=>"location.php")

?>
<?php 
		function navigation_list(){
			global $navigation;
			foreach ( $navigation as $name => $link ) {
			echo "<a href=\"$link?id=$name\">$name</a> ";
			}
		}
		
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
	<?php $welcome_message =	<<<WELC
	<p>Willkommen bei Gulasch-To-Go </p>
			
	Wir liefern die besten und herzhaftesten Gulasche und Eintöpe direkt zu Ihnen
	nach Hause.		
	
	
WELC;
	
			
?>			
