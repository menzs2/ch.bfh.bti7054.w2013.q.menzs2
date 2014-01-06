<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php require("file.php");
?> 
<head>
<title><?php title();?></title>
<link rel="stylesheet" type="text/css" media="screen" href="format.css">
<script type="text/javascript" src="file.js"></script>
<script type="text/javascript" >
    function hideLogin() {
    var logform = document.getElementById("login");
        if (logform.style.visibility !== "hidden"){
            logform.style.visibility = "hidden";
        }
        else {
            logform.style.visibility = "visible";
        }
}    
function login(){document.getElementById("login").submit();}
function logout(){document.getElementById("logout").submit();}
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmLQ7T-fWHRisGsqZcuEpi55TECdSSZgQ&sensor=false"></script>
		<script type="text/javascript">
			function initialize() {
				var latLng = new google.maps.LatLng(46.964615,7.456132);
				
				var mapOptions = {
				  center: latLng,
				  zoom: 16
				};
				
				var map = new google.maps.Map(document.getElementById("g2gmap"), mapOptions);

				var marker = new google.maps.Marker({
					position: latLng,
					title:"Wankdorffeldstrasse 102"
				});
				marker.setMap(map);
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
</head>


<body >

	<!-- The Navigation Bar -->
	
	<?php 
        loginform();
        navigation();?>
	
	<!-- content -->

	<?php 
	content() ;
	?>

<!-- footer -->
	<div class="footer">
	<?php	footer();?>
	</div>

</body>
</html>
