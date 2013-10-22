<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Gulasch-To-Go</title>
<link rel="stylesheet" type="text/css" media="screen" href="format.css">
</head>
<body> <!-- here starts the main part -->
<?php $navigation = array('main' => "main.php", 'menu'=>"menu.php", 'location'=>"location.php")?>
<div Class="navigation">  <p ID="navi">
<?php 
				foreach($navigation as $name => $link){
						echo "<a href=\"$link\">$name</a> ";
				}				?>
				</p>

</div>
<div ID="location">
<p> Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et </br>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et </br>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
</div>
<!-- footer -->
<div class="footer"><p> Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et</p>
	<a href="location.html">über uns</a>
</div>
</body>
</html>