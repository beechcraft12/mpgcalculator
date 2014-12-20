<?php
error_reporting(E_ALL);
ini_set('display_errors', '0');

session_start();
session_regenerate_id();
$li = hash('sha256', session_id());
setcookie("li", $li, time()+1440, "/", '0');
if(isset($_COOKIE["li"])) {
	$idli = $db->get_var("SELECT id FROM members WHERE li = '$li'");
	$cidli = $db->get_var("SELECT li FROM members WHERE id = '$li'");
	$cb = $idli . $cidli;
		
} else {
}

//if submit is hit
if(isset($_POST["submit"])){
	include 'includes/lf.php';
	fieldstryit();
} else {
	$messagedis = false;
}
?>

<html>
	<head> 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, height=device-height">
		<title>Log-In</title>
		<link rel="stylesheet" type="text/css" href="site_theme/css/logincss.css"> 
	</head>
	<body>
		<div class="banner" onclick="window.location='http://cody.depole.me/mpgcalculator/'"> 
			<!--
				<img id="img" src="http://cody.depole.me/mpgcalculator/site_theme/img/cbalogo.png">
			-->
				Code <b style="font-size: 35px; color:rgb(77, 77, 182);">Blue</b> Aviation
				<br>
		</div>
		<?php if($messagedis != false){ ?>
			<div class="message"> <?php echo $message; ?> </div>
		<?php } ?>
		
		
		<?php
			$test = $db->get_var("SELECT count(*) FROM members");
			echo "TEST->" . $db->debug();;
		?>
		
		
		
		<form name="loginbox" class="login" autocomplete="off" method="post"> 
			<div class="validate">
				<span>
					<br>
						<p> 
							<input placeholder="Username" type="text" name="username" value="<?php echo $nu; ?>" size="10" maxlength="25"/>				
							<input placeholder="Password" type="password" name="password" value="" size="8" maxlength="15"/>
							<input type="submit" name="submit" value="LOGIN!"/>
						</p>
					<hr>
					<p style="color: black; font-weight: bold; text-decoration: none;">
					<a class="btn" href="http://cody.depole.me/mpgcalculator/forgot">Forgot Username or Password?</a>
					</p> <br>
					<p style="color: white; font-weight: bold; text-decoration: none;">
					Not a Member yet? <a id="signup" class="btn" href="http://cody.depole.me/mpgcalculator/signup">Signup!</a>
					</p>
				</span>
			</div>
		</form>
	</body>
</html>	