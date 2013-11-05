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
			<?php navigation_menu();?>
		</p>

	</div>
	<div><?php content();?></div>
	
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
			
			<?php function navigation_menu() {
				  global $navi;
						  $lan = get_param ( "lan", "de" );
						foreach ( $navi as $name ){
							$url = $_SERVER ['PHP_SELF'];
							$url = add_param ( $url, "id", $name, "?" );
							$url = add_param ( $url, "lan", $lan );
							echo "<a href=\"$url\">$name</a> ";
				}?>
		<?php
			
			}
			function content() {
				global $content;
				$con = get_param ( "id", "main" );
				echo $content[$con] ;
			}
			//function language() {
				//$url = $_SERVER ['PHP_SELF'];
				//$url = add_param ( $url, "id", get_param ( "id", 0 ), "?" );
				//echo "<a href=\"" . add_param ( $url, "lan", "de" ) . "\">DE</a> ";
				//echo "<a href=\"" . add_param ( $url, "lan", "en" ) . "\">EN</a> ";
			//}
			
			?>



	<!-- footer -->
	<div class="footer">
		<a href="location.php">über uns</a>
	</div>
</body>
</html>
