<?php
ini_set('display_startup_errors',0);
ini_set('display_errors',0);
error_reporting(-1);
session_start();

include 'includes/lf.php';
include '/css/mcalc.css';
logorno(); 
// this is to be able to get on track with programming again
//variables

$datathing = $_POST['hiinput'];
$hi = "Hey dude, :) ";

$button = "Put It!";
$resb = "none;";



if($datathing == "") {
	$datathing = 'nothing? :(';
} else {
}
$res = "inline-block;";
if($_POST['put']) {
	$hi = "Whooooaahhh dude, The button seems to work! Also, you wanted to aparentally put";
	$hi .= ',"' . $datathing . '", in this box. :)';
	$resb = "inline-block";
	$res = "none;";
	unset($_POST['put']);
	$_POST['put'] = null;
} else {
	$hi .= "The button is not active, so, put something in the box below and 'Put It' in this box!";	
}

if($_POST['put'] == "Reset!") {
	header('Location: http://cody.depole.me/mpgcalculator/getontrack');
} else {
	
}
?>


<!DOCTYPE html/css>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="site_theme/css/getontrack.css">
	</head>
	<body>
		<br>
		<div class="banner">-Get my Programming Skills Back on Track-</div>
		<br>
		<form method="post">
			<div>
				<textarea class="area" name="hioutput"><? echo $hi; ?></textarea>
				<input autocomplete="off" style="display:<?echo $res;?>" type="text" placeholder="Put something here and Put It!" class="area2" name="hiinput"/>
				<input style="display:<?echo $res; ?>" class="putit" type="submit" value="Put It!" name="put"/> 
				<input style="display:<?echo $resb; ?>" class="putit" type="submit" value="Reset!" onclick="window.location='http://cody.depole.me/mpgcalculator/getontrack';" />
			</div>
		</form>	
		<div style="text-align:left;">
			CODE: PHP
			<br>
<pre>
	<code>

datathing = $_POST['hiinput'];
$hi = "Hey dude, :) ";

$button = "Put It!";
$resb = "none;";



if($datathing == "") {
	$datathing = 'nothing? :(';
} else {
}
$res = "inline-block;";
if($_POST['put']) {
	$hi = "Whooooaahhh dude, The button seems to work! Also, you wanted to aparentally put";
	$hi .= ',"' . $datathing . '", in this box. :)';
	$resb = "inline-block";
	$res = "none;";
	unset($_POST['put']);
	$_POST['put'] = null;
} else {
	$hi .= "The button is not active, so, put something in the box below and 'Put It' in this box!";	
}

if($_POST['put'] == "Reset!") {
	header('Location: http://cody.depole.me/mpgcalculator/getontrack');
} else {
	
}

	</code>
</pre>

<br>
CODE: HTML
<br>
 <img class="codepic" src="site_theme/img/code.png" alt="html code involved" class="code">
<br>

		</div>
	</body>

</html>


<?
echo "<br> ALL THE VAR_DUMPS: <br> put";
var_dump($_POST['put']);
echo "<br> area1";
var_dump($_POST['hioutput']);
echo "<br>";
echo "<br>";
// current directory
echo getcwd() . "\n";

chdir('cvs');

// current directory
echo getcwd() . "\n";

echo "<br>";
echo "<br>";


?>
