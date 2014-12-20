<div>
		<form id="test" method="post">
			<br>
			<select name="boat">
				<option value="test">Choose Vessel</option>
				<?php 
					$numberofcars = $db->get_var("SELECT count(*) FROM vehicle");
					$vehicles = $db->get_col("SELECT vehname FROM vehicle ORDER BY id");
					$numberofcars = $db->get_var("SELECT count(*) FROM vehicle");
					$countnc = 1;
					while ($countnc <= $numberofcars) {
						foreach ($vehicles as $veh) {
							echo ' <option value="' . $countnc . '"> ' . $veh . ' </option> ';
							$countnc++;
						}
					}
					$selectvehid = $_POST["boat"];
					$stuff = $db->get_row("SELECT vehname, typeveh, vehtype, fuelcaph, fuelcapg, sizel, sizew, sizeh, color, makemod, visreg, equipment FROM vehicle WHERE id = $selectvehid");
				?>
			</select> 
			<br><br>
			<div id="testarea"> 
				
				<?
				$doit = $_POST["pull"];
				//var_dump($_POST["pull"]);
				if($doit and $_POST["boat"] != 'test') {
					echo $stuff-> vehname . " is a " . $stuff-> makemod . " " . $stuff-> vehtype . " type of " . $stuff-> typeveh . 
					". Its fuel capacity is " . $stuff-> fuelcapg . " gallons which can give it about " . $stuff-> fuelcaph . " 
					hours of run time. It is " . $stuff-> sizel . " feet long by " . $stuff-> sizew . " feet wide by " . $stuff-> sizeh . 
					" feet high. Its colors are " . $stuff-> color . ". If there is any visible regestration, it is, " . $stuff-> visreg . 
					" and if there is any equipment on board, it is, " . $stuff-> equipment . ". ";
				} else {
					echo "Select one of the available vehicles from the test dropdown box and Get its Info.";
				}
				?> 
			</div> 
			<br>
			<button name="pull" value=" " type="submit">Get Info On Selected Vehicle!</button>
			<br>
		</form>
	</div>