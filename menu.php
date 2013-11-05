<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Gulasch-To-Go</title>
<link rel="stylesheet" type="text/css" media="screen" href="format.css">
</head>

<body background="kesselgulasch_2.jpg"> <!-- here starts the main part -->
<?php require("file.php")?> 
								

<!-- The navigation bar -->
<div class="navigation"> 
 <p>
	<?php navigation_list();?>
</p>
</div>		
<!-- Menu selection -->
<div ID="menue">
<p ID="first"> Stellen Sie sich ein Menu zusammen</p>

	<div ID="maincourse" ><h1>Gerichte</h1>
		<?php main_dishes(); ?>
	
	</div>
	
	<div ID="sidedish">	<h1>Beilagen und Extras</h1>
		<?php 
		side_dishes();
		?>
	</div>
	
	<div ID="extras">	<h1>Getränke</h1>
		<?php 
		extras();
		?>
<	/div>
</div>
<!-- footer -->
<div class="footer"><p> Gulasch-to-Go</p>
<p><a href="location.php">über uns</a></p>
</div>
</body>
</html>
