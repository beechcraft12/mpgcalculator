<?php

session_start();
// store session data
$_SESSION['views']=1;


?>



<!DOCTYPE html>

<html>
	<header>
		
	</header>
	<body>
<br>
		
<?php


//retrieve session data
echo "Pageviews= ". $_SESSION['views'];

echo "<br>";

$kookie = implode ($_COOKIE);
$HKOOKIE = hash(sha256, $kookie);
$db->query("UPDATE members SET salt = '$HKOOKIE' WHERE username = 'Temp'");
$sidc = $db->get_var("SELECT salt FROM members WHERE username = 'Temp'");

if ($sidc == $HKOOKIE) {
	$val = "delete";
	$match = "matching session id found in the database for the current user <br> <form> <input type='submit' value = '$val'> </form> <br>";
	
} else {
	$val = "insert";
	$match = "no matching session id found to database for current user Temp. so click to insert one... <br> <form method='post'> <input type='submit' name='insert' value = '$val'> </form> <br>";
}
if ($_POST["insert"] == $val) {
	echo "insert!!!!";
} else if ($_POST["delete"] == $val){
	echo "delete!!!!";
} else {
	echo "NOOOOPE!!!";
}
print_r ($_COOKIE);
echo "<br> your current hashed cookie from this page = $HKOOKIE <br>";
echo "<br> sidc = $sidc <br>";
echo "<br> kookie = $kookie <br>";
echo "Message: '$match'"
?>	


	</body>
	
</html>
