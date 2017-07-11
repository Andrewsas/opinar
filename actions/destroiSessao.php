<!DOCTYPE html>
<html>
<head>
	<?php session_start(); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>HOME</title>

	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<script language="JavaScript" type="text/javascript">
		window.onresize = AjustarIFrame;
		function AjustarIFrame()
	   	{
		    if (navigator.appName.indexOf("Microsoft") != -1)
		    {
		 	   document.getElementById('meuiframe').height = document.documentElement.clientHeight;
		    }
		    else
		    {
		    	document.getElementById('meuiframe').height = window.innerHeight;
		    }
	   	}
	</script> 
<head>
<body onload="JavaScript:AjustarIFrame();">
	<?php
	session_start();

	echo "<script>
			window.open('../index.php','_top');
		</script>";

	session_destroy();	
?>
</body>

<html>

