<form method="post"> 
				<div class="navbar">
					<a class="btn" href="<?php site_url(); ?>"> Home </a>
					<a class="btn" href="<?php site_url(); ?>/info"> Test PHP Status </a>
					<a class="btn" href="<?php site_url(); ?>/login"> LOGOUT OF CBA </a>
					<a class="btn" href="<?php site_url(); ?>/wb"> Reset This Page </a>
				</div>
			</form>
<?php
$mult = 3 * 2;
$multw = 83.3;
$selnnumber2 = 2;
$stuff = $db->get_row("SELECT dseatfarm FROM wb WHERE ID = '$selnnumber2'");
$multw2 = $stuff->dseatfarm;



error_reporting(E_ALL);
ini_set('display_errors', '0');

$whichtime = $_POST["whichtime"];
if ($whichtime == "day") {
	$cssref = './site_theme/css/wb.css';
	$engaged = "day";
} else if ($whichtime == "nite") {
	$cssref = './site_theme/css/nite.css';
	$engaged = "nite";
} else if ($whichtime === null) {
	$whichtime = "day";
	$cssref = './site_theme/css/wb.css';
} else {
		
}
//$nnumber = $_POST["nnumber"];
?>

<!DOCTYPE html>
<html>
<head>
<title>Weight & Balance</title>
<link rel="stylesheet" type="text/css" href="<?php echo $cssref; ?>" >
</head>

<body>
<div style="display:none;"	>
	<div style="font-weight:bold; border: 3px dashed black; border-radius: 10px; background-color: green; float:right; position:fixed; top:30px; right:5px;">
		<u>VIEW-COLOR-MODE: </u> 
		<form method="post"> 
			<input type="radio" name="whichtime" value="day">Day </input>
			<input type="radio" name="whichtime" value="nite">Nite </input>
			<input type="submit" name"submit" value"submit"</input>
		</form>
	</div>
</div>
<div>
	Put your shit in at the bottom and select n-number....
</div>
<div>
	<form method="post" class="selectveh">
		<hr>
		<div id="addnewplane>">
			Select N-Number:
			<select name='selnnumber'> <br>
					<option value="<?echo $number;?>"><?echo $number;?></option>
					<?php 
					$number = $selnnumber;
					$numberofcars = $db->get_var("SELECT count(*) FROM wb");
					$vehicles = $db->get_col("SELECT nnumber FROM wb ORDER BY id");
					$countnc = 1;
					while ($countnc <= $numberofcars) {
						foreach ($vehicles as $veh) {
							echo ' <option value="' . $countnc . '"> ' . $veh . ' </option> ';
							$countnc++;
						}
					}
					
					if (isset($_POST["go"]) && $_POST["selnnumber"]) {
						$selnnumber = $_POST["selnnumber"];
						$selnnumber2 = $selnnumber;
						$number = $selnnumber;
						$stuff = $db->get_row("SELECT nnumber, aircraft, maxfuel, dbew, dmom, dfuelarm, dbagarm, dseatfarm, dseatrarm, doilarm FROM wb WHERE ID = '$number'");
						$chosen = 'block;';
						unset ($_POST["go"]);
					} else {
						$chosen = 'none;';
						//$stuff = $db->get_row("SELECT nnumber, aircraft, maxfuel, dbew, dmom, dfuelarm, dbagarm, dseatfarm, dseatrarm, doilarm FROM wb WHERE ID = '$selnnumber'");
					}
	
	
	$fuarm = $stuff->dfuelarm;
	$barm = $stuff->dbagarm;
	$farm = $stuff->dseatfarm;
	$rarm = $stuff->dseatrarm;
	$oilarm = $stuff->doilarm;
	print_r($fuarm);	
	
	
	$pi1 = $_POST['pi1'];
	$pi2 = $_POST['pi2'];
	$pa1 = $_POST['pa1'];
	$pa2 = $_POST['pa2'];
	$bag1 = $_POST['bag1'];
	$fuel1 = $_POST['fuel1'];
	$BEW = $stuff->dbew;
	
	//if($_POST['getmom']) {
	$p12 = $pi1 + $pi2;
	$pa12 = $pa1 + $pa2;
	$pcmom = $p12 * $farm;
	$pacmom = $pa12 * $rarm;
	$b1mom = $bag1 * $barm;
	$fuel11 = $fuel1 * '6';
	$f1mom = $fuel11 * $fuarm;
	$totwe1 = $p12 + $pa12 + $bag1 + $BEW;
	$totmom1 = $pcmom + $pacmom + $b1mom;
	$totwe = $totwe1 + $fuel11;
	$totmom = $totmom1 + $f1mom; 
	
	$chosen = 'block;';
		//unset($_POST['getmom']);
	//} else {
	//}
		
	
	
	$add = $_POST['addnew'];
	$cancadd = $_POST['canceladd'];
	if($add) {
		$customplane = 'block;';
		unset($add);
	} else if($cancadd){
		$customplane = 'none;';
	} else {
		$customplane = 'none;';
	}
	?>
			</select>
		</div>
<?php

?>
		<input type="submit" name="go" value="Choose!"/>
		<input id="addnewplane" type="submit" name="addnew" value="Add New Plane"/>
		<div>
		<br>
		<div class="customplane" style="display:<?echo $customplane;?>">
			Add the New Plane to the DB
			<form method="post">
				<input type="text" name="annumber" placeholder="ex: N123FU" />
				<input type="text" name="atype" placeholder="ex: pa28" />
				<input type="text" name="abew" placeholder="Aircraft BEW" />
				<input type="text" name="amom" placeholder="Aircraft Moment" />
				<br>
				Optional:
				<input type="text" name="lemac" placeholder="LE MAC" />
				<input type="text" name="mac" placeholder="MAC" />
				<br>
				<input id="canceladd" type="submit" name="enter" value="Add to DB" />
				<input id="canceladd" type="submit" name="canceladd" value="Cancel" />
			</form>
		</div>
		<br>
		<br>
		<div id="info">
			<table class="info" style="width:auto;">
				<th>Aircraft Info: </th>
					<tr id="info"> 
						<td> N#: <?php echo $stuff->nnumber; ?> </td>
						<td> Type: <?php echo $stuff->aircraft; ?> </td>
						<td> BEW: <?php echo $stuff->dbew; ?> </td>
						<td> BoM: <?php echo $adjmom . " " . $unit . " " . "OR" . " " . $stuff->dmom; ?> </td>
					</tr>
			</table>
		</div>
		<br>
		<br>
<?php

//$stuff->nnumber;
//$stuff->aircraft;
//$stuff->maxfuel;
//$stuff->dbew;
//$stuff->dmom;

$unit = '/1000';
?>			
		<table>
				<tr>
				  <th>WEIGHT</th>
				  <th>MOMENT - <?php echo $unit; ?></th> 
				</tr>
				<tr>
				  <td><input type="text" name = "pi1" placeholder="pilot1 weight" value="<? echo $pi1; ?>"><input type="text" name = "pi2" placeholder="pilot2 weight" value="<? echo $pi2; ?>"> Total Weight of Pilots: <?php $pilots = $pi1 + $pi2; echo $pilots;?></td>
				  <td><?echo $pcmom;?> </td>			  
				</tr>
				<tr>
				  <td><input type="text" name = "pa1" placeholder="passenger 1 weight" value="<? echo $pa1; ?>"><input type="text" name = "pa2" placeholder="passenger 2 weight" value="<? echo $pa2; ?>"> Total Weight of Passengers: <?php $passengers = $pa1 + $pa2; echo $passengers;?></td>
				  <td><?echo $pacmom;?> </td>			  
				</tr>
				<tr>
				  <td><input type="text" name = "bag1" placeholder="baggage weight" value="<? echo $bag1; ?>">
				  <td><?echo $b1mom;?> </td>			  
				</tr>
				<tr>
				  <td id="into">Total Weight Before Fuel: <?echo $totwe1;?></td>
				  <td id="into">Total Moment BEfore Fuel: <?echo $totmom1;?></td>			  
				</tr>
				<tr>
				  <td><input type="text" name = "fuel1" placeholder="fuel gallons" value="<? echo $fuel1; ?>">Total Weight of the Fuel: <?php echo $fuel1 * 6;?></td>
				  <td><?echo $f1mom;?> </td>			  
				</tr>
				<tr>
				  <td id="into">Total Weight: <?echo $totwe;?></td>
				  <td id="into">Total Moment: <?echo $totmom;?></td>			  
				</tr>
		</table>
		<!-- <input type="submit" name="getmom" value="Get Moments"</input> -->
</div>
	</form>

	
</div>
<?php
/*
if($_POST['getmom']) {
	$p12 = $pi1 + $pi2;
	$pa12 = $pa1 + $pa2;
	$pcmom = $p12 = $farm;
	$pacmom = $pa12 = $rarm;
	$bag1mom = $bag1 = $barm;
	$fuel11 = $fuel1 = '6';
	$f1mom = $fuel11 = $fuarm;
	$chosen = 'block;';
	//unset($_POST['getmom']);
} else {
}
*/
if ($_POST['enter']) {
	$db->query("INSERT INTO wb (id, nnumber, aircraft, maxfuel, dbew, dmom, dfuelarm, dbagarm, dseatfarm, dseatrarm, doilarm, lemac, mac) VALUES (NULL, $who, m)");
	unset($_POST['enter']);
}



$adjmom = $stuff->dmom / 1000;



//$customplane = 'none;';
//$selnnumber = "N4381T";
//$iid = $db->get_var("SELECT ID FROM wb WHERE nnumber = '$selnnumber'");
//$stuff = $db->get_row("SELECT aircraft, maxfuel, dbew, dmom, dfuelarm, dbagarm, dseatfarm, dseatrarm, doilarm FROM wb WHERE ID = '$iid'");
//echo "<br> db object dumps: " . $stuff->aircraft;
//echo $stuff->dbew;
?>


</body>

</html>