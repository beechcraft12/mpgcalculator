<?php
ini_set('display_startup_errors',0);
ini_set('display_errors',0);
error_reporting(-1);
session_start();

include 'includes/lf.php';
include '/css/mcalc.css';
logorno();




$deffuel = "3.66";
$mpgroad = $_POST["road"];
//display add a vehicle or not
if (isset($_POST["addc"])) {
	$addc = "inline-block;";
	unset($_POST["addc"]);
} else if(!isset($_POST["addc"])){
	$addc = "none;";
}
//
// add to list stuff
$fuelcapa = $_POST["addfuelcap"];
$mpghwya = $_POST["addmpghwy"];
$mpgstreeta = $_POST["addmpgstreet"];
$veha = $_POST["addveh"];
$yeara = $_POST["addyear"];
$useradd = $_POST["adduser"];
if (isset($_POST['dontadd'])) {
	$addc = "none;";
} else if (isset($_POST['addtolist'])) {
	$tried = "";
}
if (isset($_POST['addtolist']) && $veha != "" && $veha != null && $useradd != null && $useradd != "" && $yeara != "Choose Year*"){
	$db->query("INSERT INTO mpgtable (id,fuelcap,mpghwy,mpgstreet,selectveh,vehyear,username) VALUES (NULL,'$fuelcapa','$mpghwya','$mpgstreeta','$veha','$yeara','$useradd')");
	unset($_POST["addtolist"]);
	unset($tried);
} else if (isset($tried)){
	$addc = "inline-block;";
	$adderror = "Fill In ALL Required Fields";
}
echo $headef;
include "/css/mcalc.css"; 
?>
<!--
	<form id="loginthing" <? echo $login; ?> method="post">
		<a class="btn" href="<?php site_url(); ?>/login"> LOGIN to CBA </a>
	</form>
-->
		<div <?php echo $logged; ?>>
			<div>
				<form method="post" class="selectveh">
					<hr>
					Select Vehicle Specs:
					<select id="dropdowns" name='selectveh'> <br>
							<option value="Choose Vehicle"> Choose Vehicle </option>
							<?php 
							$numberofcars = $db->get_var("SELECT count(*) FROM mpgtable");
							$vehicles = $db->get_col("SELECT selectveh FROM mpgtable ORDER BY id");
							$numberofcars = $db->get_var("SELECT count(*) FROM mpgtable");
							$countnc = 1;
							while ($countnc <= $numberofcars) {
								foreach ($vehicles as $veh) {
									echo ' <option value="' . $countnc . '"> ' . $veh . ' </option> ';
									$countnc++;
								}
							}
							
							if (isset($_POST["go"]) && $_POST["selectveh"] !== "Choose Vehicle") {
								$selectvehid = $_POST["selectveh"];
								$stuff = $db->get_row("SELECT username, selectveh, vehyear, fuelcap, mpghwy, mpgstreet FROM mpgtable WHERE id = '$selectvehid'");
								unset ($_POST["go"]);
								$doingit = "yes";
								
							} else if (isset($_POST["go"]) && $_POST["selectveh"] == "Choose Vehicle") {
								echo "Default will be id 1 or the fast fastcar one.";
								$stuff = $db->get_row("SELECT selectveh, vehyear, fuelcap, mpghwy, mpgstreet FROM mpgtable WHERE id = '1'");
								unset ($_POST["go"]);
								$doingit = "yes but the choose vehicle default";
							} else {
								$doingit = "no";
							}
	//road type selected
	if ($mpgroad == "street" ) {
		$mpgpost = $stuff->mpgstreet . " MPG on street";
	} else if($mpgroad == "hwy") {
		$mpgpost = $stuff->mpghwy . " MPG on highway";
	} else if ($mpgroad == null) {
		$mpgpost = "Select hwy or street";
	}
	//						
	?>
					</select>
						
					<button id="buttons" type="submit" name="go"> SPECS </button>
					<br>
					<hr>
					<span> Road Driving Conditions:
						<input style="width:20px; height:20px;" type="radio" name="road" value="hwy"/> HWY
					</span>
					<span>
						<input style="width:20px; height:20px;" type="radio" name="road" value="street"/> STREET 
					</span>
					<br>
					<hr>
					<button id="buttons" type="submit" name="addc" value="addc"> Add Custom Vehicle </button>
				</form>
					<div class="addcustom" style="display:<?php echo $addc; ?>">
						<form method="post" > | (*) Required Information To Add To List | <br>
								Your Username*: <input type="text" name="adduser" placeholder="User Name"> &nbsp; 
								Custom Make and Model*: <input type="text" name="addveh" placeholder="Make and Model"> &nbsp; <br>
								<select id="dropdowns" name="addyear">
									<option>Choose Year*</option>
									
									<?php 
									$count = date("Y") + 1;
									while($count > 1990){
										echo ' <option  value="' . $count . '"> ' . $count . '  </option> ';
										$count--;
									}
									?>
								</select> &nbsp;
								Custom Fuel Capacity: <input type="text" name="addfuelcap" placeholder="#" maxlength="3"> &nbsp; <br>
								Custom MPG Highway: <input type="text" name="addmpghwy" placeholder="#" maxlength="3"> &nbsp;
								Custom MPG Street: <input type="text" name="addmpgstreet" placeholder="#" maxlength="3"> &nbsp; <br> <br>
								<button id="buttons" type="submit" name="addtolist"> Add Custom Vehicle To List </button>
								<button id="buttons" type="submit" name="dontadd"> Cancel </button>
						</form>	
					</div>
			</div>
			<div class="vehtablespecs">	
<?php
$stuffisset = "$stuff->username";
if ($stuffisset) {
	$concat = $stuffisset . "'s ";
} else {
	$concat = "Choose a Vehicle!";
}
?>
					<span> 
						Specs for: <?php echo $concat; ?> <?php echo $stuff->selectveh . " "; echo $stuff->vehyear; ?>
						<br> 
						Vehicle Fuel Capacity: <?php echo $stuff->fuelcap; ?> /gal
						<br>
						Vehicle Does: <?php echo $mpgpost; ?>
					</span>
			</div>
		</div>
<br>
<br>
<br>



<? 
if($match == 1){
	get_footer();
} 

?>



