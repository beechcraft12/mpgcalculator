<?php


 
 /*
error_reporting(E_ALL);
ini_set('display_errors', '0');
*/

// DEFINED VARIABLES STATIC //
$UserName = $_POST["username"];
$Password = $_POST["password"];



$messagedis = false;
if(isset($_POST["submit"])){
	unset($_POST["submit"]);
	
	$messagedis = true;
	include 'includes/lf.php';
	$message = fields();
	
	fields();
	if($m = 5){
		tryit();
	}
	var_dump($m);
} else {
	//unset($message); 
}


?>

<html>
	<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="site_theme/css/testlogin.css">
	</head>
	<body>
		<br>
		<form class="form" method="post"> 
		<div class="validate">
			<p>
			<hr>
			<p> Username<abbr>*</abbr>: <input type="text" name="username" value="<?php echo $UserName; ?>" size="10" maxlength="25"/>				
			Password<abbr>*</abbr>: <input type="password" name="password" value="" size="8" maxlength="15"/>
			<a maxlength
			</p>
			<br>
			<hr>
			<input class="button" type="submit" name="submit" value="SUBMIT!!!"/>
			<br>
		</form>
		</div>
		<?php if($messagedis != false){ ?>
			<div class="message"> <?php echo $message; ?> </div>
		<?php } ?>
			
		
		

	</body>
</html>	





