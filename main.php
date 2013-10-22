<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Gulasch-To-Go</title>
<link rel="stylesheet" type="text/css" media="screen" href="format.css">
</head>


<body background="kesselgulasch_2.jpg"> 

<!-- The Navigation Bar -->
<?php $navigation = array('main' => "main.php", 'menu'=>"menu.php", 'location'=>"location.php")?>
<div class='navigation'> <p> 
					<?php	foreach($navigation as $name => $link){
							echo "<a href=\"$link\">$name</a> ";
					}?>
						</p>

</div>
<div ID="welcome">
	<p> Willkommen bei Gulasch-to-Go </br>Stellen Sie sich ihr Saucengericht zusammen</p>
	<p>Pizza-Lieferdienste gibt es wie Sand am Meer</br></p>
</div>

<!-- footer -->
<div class="footer"><a href="location.php">über uns</a></div>
</body>
</html>