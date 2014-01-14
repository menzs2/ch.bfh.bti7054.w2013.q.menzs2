<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php require("files/content.php");?> 
<head>

<link rel="stylesheet" type="text/css" media="screen" href="files/format.css">
<script type="text/javascript" src="files/file.js"></script>
<script type="text/javascript" >
 function purchaseConfirmation() {
    var message = "Mit OK bestätigen Sie Ihre Bestellung";
    if (confirm(message)){
        document.getElementById("longshoppingcart").submit();
    }
    else{
        return;
    }
}
    function hideLogin() {
    var logform = document.getElementById("login");
        if (logform.style.visibility !== "hidden"){
            logform.style.visibility = "hidden";
        }
        else {
            logform.style.visibility = "visible";
        }
}    
function login(){
        var username = document.getElementsByName("uname");
        
         if (username[0].value.length > 15 || username[0].value.lengthuser < 4) {
            window.alert("The user name must be 4-15 characters");
            document.getElementsByName("uname")[0].select();
            return false;
        }
        var pword =  document.getElementsByName("pwd");
        if (pword[0].value.length < 4) {
            window.alert("The password is to short");
            document.getElementsByName("pwd")[0].select();
            return false;
        }
        document.getElementById("login").submit();}       
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
<title><?php title();?></title>
<?php  checkForInput();?>
</head>


<body >

	<!-- The Navigation Bar -->
	<div ID="navigation">
	<?php	navigation();?>
	</div>
	
	<!-- content -->
	<div ID="content">
 	<?php	content() ;	?>
	</div>


<!-- footer -->
	<div ID="footer">
	<?php	footer();?>
	</div>

</body>
</html>
