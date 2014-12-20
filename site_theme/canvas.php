<?php
ini_set('display_startup_errors',0);
ini_set('display_errors',0);
error_reporting(-1);
session_start();

include 'includes/lf.php';
include '/css/mcalc.css';
logorno();

?>


<!DOCTYPE html>
<html>
	
	<header>
		<link rel="stylesheet" type="text/css" href="site_theme/css/canvas.css">
	</header>
	<body>
		<div>
			<canvas id="myCanvas">
			</canvas>
		</div>
	</body>
	<footer>
		
	</footer>
	
	<script>
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.fillStyle = "rgba(3 3 3 .4)";
		ctx.fillRect(30,45,150,75);
		ctx.fillline(0,0,35,45);
		ctx.moveTo(0,0);
		ctx.lineTo(200,100);
		ctx.stroke();
		ctx.beginPath();
		ctx.arc(95,50,40,0,2*Math.PI);
		ctx.stroke();
	</script>
	
	
</html>