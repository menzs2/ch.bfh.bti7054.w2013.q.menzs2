<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Gulasch-To-Go</title>
<link rel="stylesheet" type="text/css" media="screen" href="format.css">
</head>

<body> <!-- here starts the main part -->
<?php $maindishes = array(
					0=> array( 'name'=>"Rindsgulasch",'description'=> "lecker", 'price'=> 12.50), 
					1=> array( 'name'=>"Scharfes Rindsgulasch",'description'=> " auch lecker", 'price'=> 13.50),
					2=> array( 'name'=>"Schweinsgulasch",'description'=> " sehr lecker", 'price'=> 12.20),
					3=> array( 'name'=>"Wurstgulasch",'description'=> "wie von Mutti", 'price'=> 10.50), 
					4=> array( 'name'=>"Lamm Pilaw",'description'=> "eigentlich kein Gulasch, trotzdem lecker", 'price'=> 12.80)
					)?>
<?php $extras = array(
					0=> array( 'name'=>"Knödel",'description'=> "lecker", 'price'=> 2.50), 
					1=> array( 'name'=>"Sauerrahm",'description'=> " auch lecker", 'price'=> 2.20),
					2=> array( 'name'=>"Pilze",'description'=> " sehr lecker", 'price'=> 2.50),
					3=> array( 'name'=>"Mehr Paprika",'description'=> "mehr schärfe", 'price'=> 1.00), 
					4=> array( 'name'=>"Mehr Zwiebeln",'description'=> "aber hallo", 'price'=> 2.80)
					)?>					
<?php $navigation = array('main' => "main.php", 'menu'=>"menu.php", 'location'=>"location.php")?>

<!-- The navigation bar -->
<div class="navigation">  <p>
<?php 
				foreach($navigation as $name => $link){
						echo "<a href=\"$link\">$name</a> ";
				}
				?>
				</p>
</div>		

<div ID="menue">
<p ID="first"> Stellen Sie sich ein Menu zusammen</p>
<div ID="maincourse"<p><?php 
	foreach($maindishes as $item){
		echo "<p>$item[name]</br>$item[description]</br>CHF $item[price]</p>";
		}
	?></div>
	
<div ID="extras">	
<?php 
	foreach($extras as $item){
		echo "<p>$item[name]</br>$item[description]</br>CHF $item[price]</p>";
		}
	?>
</div>

<!-- footer -->
<div class="footer"><p> Gulasch-to-Go</p>
<p><a href="location.php">über uns</a></p>
</div>
</body>
</html>