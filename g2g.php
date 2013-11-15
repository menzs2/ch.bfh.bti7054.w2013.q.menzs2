<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php require("file.php")?> 
<head>
<title><?php title();?></title>
<link rel="stylesheet" type="text/css" media="screen" href="format.css">
</head>


<body background="kesselgulasch_2.jpg">

	<!-- The Navigation Bar -->

	<div class="navigation">
		<p> 
			<?php navigation_bar();?>
		</p>
	</div>
	
<!-- content -->

<?php content();?>

<!-- footer -->
	<div class="footer">
	<?php	footer();?>
	</div>
	

			



	
</body>
</html>
