<?php
ini_set('display_startup_errors',0);
ini_set('display_errors',0);
error_reporting(-1);
/*
session_start();
include 'includes/lf.php';
include '/css/mcalc.css';
logorno();
*/ 

//variables
echo "<br>";



$peoplearray = $person . "" . $number . "" . $ice;

if($_POST['boat'] == null or $_POST['pull'] == null or $_POST['boat'] == 't') {
	//$chosen = 'display: inline-block';
	$chosen = 'display: none';
} else {
	//$chosen = 'display: none';
	$chosen = 'display: inline-block';
}
echo var_dump($_POST['boat']) . " " . var_dump($_POST['pull']);
?>

<head>
		<!--
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, height=device-height">
		-->
		<title>SAFETY FIRST!</title>
		<link rel="stylesheet" type="text/css" href="site_theme/css/float.css">
		<link rel="shortcut icon" href="http://i.stack.imgur.com/FgfFI.png">
</head>
<!--begin body id-->	
	<div id="title"> 
		-Float Plan- <span id="span">Increasing Outing Safety Since 2015!</span>
	</div>
	<br><br>
	<div>
		<form id="test" method="post">
			<br>
			- Choose Vehicle for Your Outting!
			<select name="boat">
				<option value="t">Choose</option>
				<?php 
					$numberofcars = $db->get_var("SELECT count(*) FROM floatvehicle");
					$vehicles = $db->get_col("SELECT vehname FROM floatvehicle ORDER BY id");
					$numberofcars = $db->get_var("SELECT count(*) FROM floatvehicle");
					$countnc = 1;
					while ($countnc <= $numberofcars) {
						foreach ($vehicles as $veh) {
							echo ' <option value="' . $countnc . '"> ' . $veh . ' </option> ';
							$countnc++;
						}
					}
					$selectvehid = $_POST["boat"];
					$stuff = $db->get_row("SELECT vehname, cpt, hailing, typeveh, vehtype, fuelcaph, fuelcapg, sizel, sizew, sizeh, draft, material, color, makemod, year, visreg, hin, equipment, anchor, distress, pfd, oe, features, engine, propulsion1, propulsion2, radio, navigation FROM floatvehicle WHERE id = $selectvehid");
					$namehailing = $stuff->vehname . " of " . $stuff->hailing;
					$makemodelyear = $stuff->makemod . " " . $stuff->year;
				?>
			</select> -
			<br>
			<br>
			<div class="unitsel">- Select Unit of Length -<br>
				<div id="puts">
					<input checked type="radio" name="ul" value='u'>Imperial (Default)<br>
					<input type="radio" name="ul" value='m'>Metric (Meters)
				</div>
			</div>
<?
					switch ($_POST['ul']) {
						case 'u':
							$ul = 'ft';
							$um = 'gal';
							$lm = $stuff->sizel;
							$wm = $stuff->sizew;
							$hm = $stuff->sizeh;
							$dm = $stuff->draft;
							$capl = $stuff->fuelcapg;
							break;
						case 'm':
							$ul = 'm';
							$um = ' l';
							//echo $stuff->sizel . " * .3048 = ";
							$lm = $stuff->sizel * .3048;
							$wm = $stuff->sizew * .3048;
							$hm = $stuff->sizeh * .3048;
							$dm = $stuff->draft * .3048;
							$capl = $stuff->fuelcapg * 3.7854;
							break;
						default:
							//$ul = ' ft.';
							//$lm = $stuff->sizel;
							//$wm = $stuff->sizew;
							//$hm = $stuff->sizeh;
							//$dm = $stuff->draft;
							break;
					}
					$lwh = " L- " . $lm . $ul . " | W(beam)- " . $wm . $ul . " | H- " . $hm . $ul;
					$draft = $dm . $ul;
					$enginecapend = $capl . $um . " and " . $stuff->fuelcaph . " approximate hours of normal use";
					$typescon = $stuff->vehtype . " " . $stuff->typeveh;
?>
			<br>
			<button name="pull" value=" " type="submit">Grab Info!</button> 
				<br><br><br>
				<?//var_dump($_POST['ul']);?>
			<div id="identification" style="<?echo $chosen;?>">- Identification -<br><br>
				<div>
					Name and Hailing From: <span id="relinfo"><?echo $namehailing;?></span>
				</div>
				<br>
				<div>
					Visible Registration: <span id="relinfo"><?echo $stuff->visreg;?> | </span>
					<span>Hull Identification (HIN): <span id="relinfo"><?echo $stuff->hin?> </span></span>
				</div>
				<br>
				<div>
					Make/Model/Year: <span id="relinfo"><?echo $makemodelyear;?></span>
				</div>
				<br>
				<div> 
					Length/Width/Height: <span id="relinfo"><?echo $lwh;?></span>
				</div>
				<br>
				<div>
					Type: <span id="relinfo"><?echo $typescon; ?> | </span> 
					<span>Draft: <span id="relinfo"><?echo $draft; ?></span> | </span> 
					<span>Hull Material: <span id="relinfo"><?echo $stuff->material; ?></span></span>
				</div>
				<br>
				<div>
					Color: <span id="relinfo"><?echo $stuff->color; ?></span>
				</div>
				<br>
				<div>
					Prominent Features: <span id="relinfo"><?echo$stuff->features; ?></span>
				</div>
				<br>
			</div>
			<br><br>
			<div id="identification" style="<?echo $chosen;?>">- Propulsion -<br><br>
				<div>
					Primary Propulsion: <span id="relinfo"><?echo$stuff->propulsion1; ?></span><br>
					<span>
						Aux. Propulsion: <span id="relinfo"><?echo$stuff->propulsion2; ?></span>
					</span>
				</div>
				<div>
					If Applicable, Engine Info: <span id="relinfo"><?echo$stuff->engine; ?></span><br> 
					Fuel Capacity and Estimated Endurance: <span id="relinfo"><?echo$enginecapend; ?></span>
				
				</div>
				<br>
			</div>
			<br><br>
			<div id="identification" style="<?echo $chosen;?>">- Communication -<br><br>
				<div>
					Radio Call-Sign: <span id="relinfo"><?echo$stuff->vehname; ?></span><br>
					DSC MMSI No: <span id="relinfo">_________________</span><br>
					Onboard Radio and Usage Info: <span id="relinfo"><?echo$stuff->radio; ?></span><br>
					CELL******:<br> 
					EMAIL*****:<br>
					Captian Information: <span id="relinfo"><?echo$stuff->cpt; ?></span><br>
				</div>
			</div>
			<br><br>
			<div id="identification" style="<?echo $chosen;?>">- Navigation -<br><br>
				Onboard Navigation Equipment: <span id="relinfo"><?echo$stuff->navigation; ?></span><br>
			</div>
			<br><br><br>
			<div id="identification" style="<?echo $chosen;?>">- Safety and Survival -<br><br>
				<div>
					Distress Signals Onboard: <span id="relinfo"><?echo$stuff->distress; ?></span><br>
				</div>
				<div>
					PFD's Onboard: <span id="relinfo"><?echo$stuff->pfd; ?></span><br>
				</div>
				<div>
					Ground Tackle(anchor): <span id="relinfo"><?echo$stuff->anchor; ?></span><br>
				</div>
				<div>Other Equipment: <span id="relinfo"><?echo$stuff->oe; ?></span><br
				</div>
			</div>
			 
			<br><br>
			test area-------
			<div display="<? echo $chosen; ?>" id="testarea">  
				
				<?
				$doit = $_POST["pull"];
				//var_dump($_POST["pull"]);
				if($doit and $_POST["boat"] != 't') {
					echo $stuff-> vehname . " is a " . $stuff-> makemod . " " . $stuff-> vehtype . " type of " . $stuff-> typeveh . 
					". If this vehicle has an engine, it is a " . $stuff->engine . " hp with a fuel capacity of " . $stuff-> fuelcapg . " gallons which can give it about " . $stuff-> fuelcaph . " 
					hours of run time. It is " . $stuff-> sizel . " feet long by " . $stuff-> sizew . " feet wide by " . $stuff-> sizeh . 
					" feet high. Its colors are " . $stuff-> color . ". If there is any visible regestration, it is, " . $stuff-> visreg . 
					" and if there is any equipment on board, it is, " . $stuff-> equipment . ". ";
				} else {
					echo "Select one of the available vehicles from the test dropdown box and Get its Info.";
				}
				?> 
			</div> 
			<br>
			<br>
		</form>
	</div>
<? 
if($match == 1){
	get_footer();
} 

?>