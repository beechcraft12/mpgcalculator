<head>
		<!--
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, height=device-height">
		-->
		<title>SAFETY FIRST!</title>
		<link rel="stylesheet" type="text/css" href="site_theme/css/float.css">
		<link rel="shortcut icon" href="http://i.stack.imgur.com/FgfFI.png">
</head>

<br><br>


	<form method='post'>
		<input id="adds" type="submit" name="addnewperson" value="Add New Person to DB">
	</form>
	
<!-- da ting sha for souls -->


<?
if($_POST['addnewperson'] or $message !== null ){
	$addperson = "display:inline-block;";
} else {
	$addperson = 'display:none;';
}

echo "<br> <br>";
var_dump($addornot);
echo "<br>";
echo $addornot;
echo "<br>";


?>

	
</div>
<form style="<?echo $addperson;?>" method='post' class="souls">
	<div id="addperson" >
		<input autocomplete="off" type="text" name="addname" placeholder="Soul's Name"/><br>
		<input autocomplete="off" type="text" name="addage" placeholder="Age"/><br>
		Sex: Male-<input id="radio" type="radio" value="m" name="addsex"/> Female-<input id="radio" type="radio" value="f" name="addsex"/><br>
		<input autocomplete="off" type="text" name="addaddress" placeholder="Primary Home Address?"/><br>
		<input autocomplete="off" type="text" name="addphone" placeholder="Primary Phone Number? xxx-xxx-xxxx"/><br>
		<input autocomplete="off" type="text" name="addvehloc" placeholder="What is your vehicle make and model and it's location?"/><br>
		<input autocomplete="off" type="text" name="addpnotes" placeholder="What are some special notes about yourself? Medical? Safety?"/><br>
		<input autocomplete="off" type="text" name="addexperience" placeholder="Sum in brief your boating experience in general."/><br>
		<br>
		<input id="adds" type="submit" name="addsoul" value="Add Person to DB">
	</div> 
	<?
	$addname = $_POST['addname'];
	$addsex = $_POST['addsex'];
	$addage = $_POST['addage'];
	$addaddress = $_POST['addaddress'];
	$addphone = $_POST['addphone'];
	$addvehloc = $_POST['addvehloc'];
	$addpnotes = $_POST['addpnotes'];
	$addexperience = $_POST['addexperience'];
	
	
	if($_POST['addsoul'] && $addname != null && $addsex != null && $addage != null && $addaddress != null && $addphone != null && $addvehloc != null && $addpnotes != null && $addexperience != null){
		$db->query("INSERT INTO floatpeople (id, fullname, sex, age, primaddress, phone, vehandloc, pnotes, experience) VALUES (NULL, '$addname', '$addsex', '$addage', '$addaddress', '$addphone', '$addvehloc', '$addpnotes', '$addexperience')");
		$db->update("ALTER TABLE floatpeople AUTO_INCREMENT = 1");
		$db->debug(); 
	} else {
		$message = 'Fill All Fields';
		
		$addperson = "display:inline-block;";
		
	}
	echo $message;
	?>
<br><br>
</form>
<form style="border 4px solid green;" method="post">
	<select name="person">
		<option value="as"> -Available Souls- </option>	
	<?
	$numberofsouls = $db->get_var("SELECT count(*) FROM floatpeople");
	$people = $db->get_col("SELECT fullname FROM floatpeople ORDER BY id");
	$i = 1;
		while ($i <= $numberofsouls) {
			foreach ($people as $soul) {
				echo ' <option value="' . $i . '"> ' . $soul . ' </option> ';
				$i++;
			}
		}
	?>
	</select> -
	
	<span><button name="addtolist" value="">Add Person To Aboard</button></span>
	<table border='1'>
	<?
	if($_POST['addtolist']){
			for ($_POST['person']; $person;) {
				 
				echo '<tr>';
				echo '<td>' . $person . '<button style="width: 30%;margin: 0 auto 0 auto;float: right;" name="del" value=' . '>Remove</button>' . '</td>';
				echo '</tr>';
			}
		}

	?>
	 </table>
</form>

- Souls Aboard -
<table style="font-size: 30px;" border="1">
	<tr>
		<th>People that are going Aboard!</th>
	</tr>
<?
$numberofusers = $db->get_var("SELECT count(*) FROM floatpeople");
$nameofpersonfromtable = $db->get_col("SELECT fullname FROM floatpeople ORDER BY id");
$mi = 2;
while ($mi <= $numberofusers){
		foreach ($nameofpersonfromtable as $aperson) {
			echo '<tr>';
			echo '<td>' . $aperson . '<button style="width: 30%;margin: 0 auto 0 auto;float: right;" name="del" value=' . $mi++ . '>Remove</button>' . '</td>';
			echo '</tr>';
		}
	$mi++;
}
echo '<tr>' . '<td>' . 'TEST- FUCKIT' . '<td>' . '</tr>';
echo "<br>";
?>
</table>


<br><br><br><br><br>

- Souls Aboard TEST -
<table style="font-size: 30px;" border="1">
	<tr>
		<th>People that are going Aboard!</th>
	</tr>
<?
$numberofusers = $db->get_var("SELECT count(*) FROM floatpeople");
$nameofpersonfromtable = $db->get_col("SELECT fullname FROM floatpeople ORDER BY id");
$mi = 2;
while ($mi <= $numberofusers){
		foreach ($nameofpersonfromtable as $aperson) {
			echo '<tr>';
			echo '<td>' . $aperson . '<button style="width: 30%;margin: 0 auto 0 auto;float: right;" name="del" value=' . $mi++ . '>Remove</button>' . '</td>';
			echo '</tr>';
		}
	$mi++;
}
echo '<tr>' . '<td>' . 'TEST- FUCKIT' . '<td>' . '</tr>';
echo "<br>";
?>
</table> 

<br><br><br><br>
<table border="1">
  <tr>
    <td>Cell A</td>
    <td>Cell B</td>
  </tr>
</table>





		
<?