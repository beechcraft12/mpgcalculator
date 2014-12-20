<?php
ini_set('display_startup_errors',0);
ini_set('display_errors',0);
error_reporting(-1);
session_start();

include 'includes/lf.php';
include '/css/mcalc.css';
logorno();

$message = "this page will eventualy be for the graphs";

echo $message;

$points = array(
    array(5,20),
    array(30,120),
    array(90,100),
    array(180,196)
);

function drawhtmlline($x1,$y1,$x2,$y2) {
    $rise = $y2-$y1;
    $run = $x2-$x1;
    $length = sqrt(pow($rise,2)+pow($run,2));
    $angle = 180-round(rad2deg(atan($rise/$run)));
    $xoffset = abs(($length/2)-abs($run/2));//fix from rotating from center of object
    echo '<div style="background-color:red;height:1px;width:'.round($length).'px;position:absolute;top:'.round(200-$y2+($rise/2)-2).'px;left:'.round(2+$x2-$xoffset).'px;-moz-transform:rotate('.$angle.'deg);-webkit-transform:rotate('.$angle.'deg);-o-transform:rotate('.$angle.'deg);-ms-transform:rotate('.$angle.'deg);transform:rotate('.$angle.'deg);"></div>';
}



?>


<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>
<body>
	<hr>
	<div class="js">
		this is gonna be some java scrip shit
		<p>Click the button to display the date.</p>
		<p id="demo"></p>
		<button type="button" onclick="myFunction()">Try it</button>
			<script>
			function myFunction()
			{
			document.getElementById("demo").innerHTML = Date();
			}
			</script>
	</div>
	<hr>
<div class="progress">
	Progress Graph
	<div style="position:relative;width:200px;height:200px;background-color:#CCCCCC;border:1px solid black;">
	<?php
	    foreach($points as $pk=>$point) {
	        ?>
	        <div style="background:red;position:absolute;top:<?php echo (-4)+200-($point[1]); ?>px;left:<?php echo $point[0]; ?>px;width:4px;height:4px;"></div>
	        <?php
	        if ($pk!==0) {
	            drawhtmlline($point[0],$point[1],$points[$pk-1][0],$points[$pk-1][1]);
	        }
	    }
	?>
	</div>
</div>
	
</body>
</html>