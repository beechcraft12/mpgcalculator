<?php
ini_set('display_startup_errors',0);
ini_set('display_errors',0);
error_reporting(-1);
session_start();

include 'includes/lf.php';
include '/css/mcalc.css';
logorno();


error_reporting(E_ALL);
ini_set('display_errors', '1');

$numberofoptions = $db->get_var("SELECT ID FROM wb");
echo $numberofoptions;
var_dump ($numberofoptions);
$countn = 1;	

var_dump ($engaged);

$whichtime = $_POST["whichtime"];
var_dump ($whichtime);
if ($whichtime == "day") {
	$cssref = './site_theme/css/wb.css';
	$engaged = "day";
} else if ($whichtime == "nite") {
	$cssref = './site_theme/css/nite.css';
	$engaged = "nite";
} else {
	
}


echo "<br> vardump whichtime";
var_dump ($whichtime);
?>


<!DOCTYPE html>
<html>
<head>
<title>Weight & Balance</title>
<link rel="stylesheet" type="text/css" href="<?php echo $cssref; ?>" >
</head>

<body>
	<div style="font-weight:bold; border: 3px dashed black; border-radius: 10px; background-color: green; float:right; position:fixed; top:30px; right:5px;">
		<u>VIEW-COLOR-MODE: </u> 
		<form method="post"> 
			<input type="radio" name="whichtime" value="day">Day </input>
			<input type="radio" name="whichtime" value="nite">Nite </input>
			<input type="submit" name"submit" value"submit"</input>
		</form>
	</div>
<div>
	<table>
		<th>Weight and Balance Using Moments and Weights</th>
		<tr>
			<td> Aircraft Basic Empty Weight: <?php echo $bew; ?>
			</td>
			<td>
			2
			</td>
			<td>
			3
			</td>
		</tr>
		<tr>
			<td>
			1
			</td>
			<td>
			2
			</td>
			<td>
			3
			</td>
		</tr>
	</table>
</div>
<div>
	Form to fill in the values
	<form method="post">
		<input type="text" name="atype" placeholder="Aircraft Type" />
		<input type="text" name="abew" placeholder="Aircraft BEW" />
		<input type="text" name="amom" placeholder="Aircraft Moment" />
		<br>
		<select name="annumber"> 
<?php
		while($countn < 31){
						if($countn == 26){
							echo ' <option  value="' . $countn . '">  ' . $countn . ' :)  </option> ';
						} else if($count == 16){
							echo ' <option  value="' . $countn . '">  ' . $countn . ' :)  </option> ';	
						}else{
							echo ' <option  value="' . $countn . '">  ' . $countn . '  </option> ';
						}
						$countn++;
					}
?>
		</select>
		
	</form>
</div>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
<p>FILLER</p>
</body>

</html>