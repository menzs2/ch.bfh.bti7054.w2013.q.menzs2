<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Gulasch-To-Go</title>
<link rel="stylesheet" type="text/css" media="screen" href="format.css">
</head>
<body> <!-- here starts the main part -->
<?php $dishes = array(0=>"Rindsgulasch", 1=>"Scharfes Rindsgulasch", 2=>"Schweinsgulasch", 3=>"Wurstgulasch")?>
<?php $navigation = array('main' => "main.php", 'menu'=>"menu.php", 'location'=>"location.php")?>
<div class="navigation"> <p ID="mainnavigation"> 
<?php 
				foreach($navigation as $name => $link){
						echo "<a href=\"$link\">$name</a> ";
				}
				?>
				</p>
</div>				
<div ID="menue">
<p ID="first"> Stellen Sie sich ein Menu zusammen</p>
<p><?php 
	foreach($dishes as $item){
		echo "$item</br>";
		}
	?>
	</p>
</div>
<!-- footer -->
<div class="footer"><p> Gulasch-to-Go</p>
<p><a href="location.html">�ber uns</a></p>
</div>
</body>
</html>