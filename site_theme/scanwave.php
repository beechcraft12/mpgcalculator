<br>
<hr>
Search the 'scan' table to get the ID and the contents of <u>'Col1, Col2, Col3'</u> based on row # request.
<hr>
<br>
hint: there are only 3 rows.
<br>
<hr>

<?php 


//variables

unset($search);
$search = $_POST["go"];
$row = $_POST["idlook"];
$rowid = "Row # and ID is: " . $row;
$go = "GO!!";

$searchdir = $db->get_results("SELECT * FROM `scan` WHERE id = '$row'");

print("<pre>" . print_r($searchdir,true) . "</pre>");

if($go == "Try again" OR "RESET!") {
	$id = "";
	$row = "";
}
$displayinput = "display:block";
$displayoutput = "display:none";
if($search == "GO!!") {
	unset($search);
	if($searchdir != NULL) {
		?> <a href="#anchorName"></a> <?
		$id = print_r($searchdir);
		$go = "RESET!";
		$displayinput = "display:none;";
		$displayoutput = "display:block";
	} else if($_POST['idlook'] == null) {
		$rowid = "enter something sha!!";
		$go = "RESET!";
		$displayinput = "display:none;";
		$displayoutput = "display:block";
	} else {
		$rowid = "theres nothing for that row!";
		$go = "Try again";
		$displayinput = "display:none;";
		$displayoutput = "display:block";
	}
} else {
} 



?>

<style>
body {
	background-color: black;
	color: white;
	margin: 4px auto;
	font-size: 40px;
	width:90%;
	border: 7px blue solid;
	
}

input {
	font-size: 60;
	margin: 4px auto;
	width:50%;
	text-align: center;
}
</style>
<!DOCTYPE html>

<body>
	<div>
		<form method="post">
			<input style="<? echo$displayinput;?>" type="text" name="idlook" placeholder="SEARCH ROW #" value="<?echo $row; ?>">
			<br>
			<input style="<? echo$displayoutput;?>" type="text" name="id" placeholder="Output ID" value="<?echo $rowid; ?>">
			<br>
			<input style="display:block;" type="submit" name="go" value="<?php echo$go;?>">
		</form>
	</div>
	<div> all of them:<br> 
		<?php
		$fuck = $db->get_results("SELECT ('col1', 'col2', 'col3') FROM scan, scan2, scan3");
		//$it = $db->get_results("SELECT * FROM scan2");
		//$hard = $db->get_results("SELECT * FROM scan3");
		//$yea = $fuck . $it . $hard;
//var_dump($yea);
print("<pre>" . print_r($fuck,true) . "</pre>");

?>
	
	</div>
</body>