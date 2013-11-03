<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Gulasch-To-Go</title>
<link rel="stylesheet" type="text/css" media="screen" href="format.css">
</head>


<body background="kesselgulasch_2.jpg">
<?php require("file.php")?> 
	<!-- The Navigation Bar -->

<div class='navigation'>
		<p> 
			<?php navigation_list();?>
		</p>

	</div>
	<div ID="welcome">
		<?php echo $welcome_message;?>
	</div>

	<!-- footer -->
	<div class="footer">
		<a href="location.php">über uns</a>
	</div>
</body>
</html>
