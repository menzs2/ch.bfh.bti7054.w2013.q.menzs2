<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Gulasch-To-Go</title>
<link rel="stylesheet" type="text/css" media="screen" href="format.css">
</head>


<body>
<?php require("file.php")?> 
	<!-- The Navigation Bar -->

<div class='navigation'>
		<p> 
			<?php navigation_list();?>
		</p>

	</div>
	<?php
		function get_param($name, $default) {
		if (isset($_GET[$name])) return urldecode($_GET[$name]);
		else return $default;
}
		function add_param($url, $name, $value, $sep="&") {
		$new_url = $url.$sep.$name."=".urlencode($value);
		return $new_url;
}
		function menu() {
		global $text;
		$lan = get_param("lan", "de");
		echo "<h1>Menu</h1>";
		for ($i = 0; $i < 10; $i++) {
		$url = $_SERVER['PHP_SELF'];
		$url = add_param($url, "id", $i, "?");
		$url = add_param($url, "lan", $lan);
		echo "<a href=\"$url\">{$text[$lan]} $i</a><br />";
}
}
function content() {
	global $text;
	global $title;
	$lan = get_param("lan", "de");
	echo "<h1>".$title[$lan]."</h1>";
	echo $text[$lan]." ".get_param("id",0);
}
function language() {
	$url = $_SERVER['PHP_SELF'];
	$url = add_param($url, "id", get_param("id", 0), "?");
	echo "<a href=\"".add_param($url,"lan","de")."\">DE</a> ";
	echo "<a href=\"".add_param($url,"lan","en")."\">EN</a> ";
}
$text = array("de"=>"Seite", "en"=>"Page");
$title = array("de"=>"Willkommen", "en"=>"Welcome");
?>


	<!-- footer -->
	<div class="footer">
		<a href="location.php">über uns</a>
	</div>
</body>
</html>