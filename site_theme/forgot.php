<?php
//get_header();

error_reporting(E_ALL);
ini_set('display_errors', '0');

$username = $_POST['username'];
$eemail = $_POST["email"];
$eemail2 = $_POST["email2"];

$pwhash = hash("sha256", $_POST["password"]);


if ($_POST["email"] != null && $_POST["password"] != null && isset($_POST["retun"])) {
	$idlookup = $db->get_var("SELECT id FROM members WHERE password = '$pwhash' AND email = '$eemail'");
	$unlookup = $db->get_var("SELECT username FROM members WHERE password = '$pwhash'");
	$idcomp = $db->get_var("SELECT id FROM members WHERE username = '$unlookup'");
	if ($idlookup == $idcomp && $idlookup != null) {
		$subject2 = "ACTIVITY NOTICE-Requested Username";
		$to2 = $eemail;
		$headers2 = "From: mail server CBA" . strip_tags($_POST['req-email']) . "\r\n";
		$headers2 .= "Reply-To: CBA ADMIN ". strip_tags($_POST['req-email']) . "\r\n";
		$headers2 .= "MIME-Version: 1.0\r\n";
		$headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$date2 = new DateTime();
		$time2 = $date2->format('h:i d/m/y');
		$eto2 = $eemail;
		$esubject2 = "ACTIVITY NOTICE-Requested Username";
		$emessage2 = "<html style='border: 10 black solid;border-radius: 10px;width: 90%;margin-left: auto;margin-right: auto;background-color: rgb(175, 175, 199);'>
				<body style='background: linear-gradient(rgb(36, 36, 39), rgb(54, 54, 133)); font-size: 40px;'><br><hr><br>
					<div style='font-size: 72px;width: 60%;margin-left: auto;margin-right: auto;text-align: center;font-weight: bold;background-color: rgb(175, 175, 199);border: 12 black solid;border-radius: 20px;color: rgb(105, 0, 0);'>
						ALERT-Requested Username!
					</div> 
					<br>
					<hr>
					<br>
					<div style='font-size: 60px;width:81%;margin-left: auto;margin-right: auto;text-align: center;font-weight: bold;background-color: rgb(175, 175, 199);border-radius: 10px;'>
							Hello $unlookup, at $time2, a request was made to view your username. 
					</div>
					<hr style='width:70%;margin-left:auto;margin-right:auto;'>
					<div style='border-radius: 10px;width:90%;margin-left: auto;margin-right: auto;background-color: rgb(175, 175, 199);font-size: 60px;text-align: center;'>
						Your Username for CBA is, $unlookup.
					</div>
					<br>
					<hr>
					<br>
					<div style='border: 18 black solid;border-radius: 10px; width:50%; margin-left: auto; margin-right: auto; background-color: rgb(175, 175, 199); font-size: 40px; text-align: center;'>
						If this is an error or you did not prompt this email, visit: <a href='http://bit.ly/uStgVd'>Report!</a>
					</div>
				</body>
			</html>";
$emsg2 = wordwrap($emessage2,70);
		mail($eto2,$esubject2,$emsg2,$headers2);
		$message11 = "An email will arrive shortly with your username.";
		unset($eemail);
	} else {
		$message = "No email address found for that password.";
	}
} else {
	
}


$switch = "";
$switch2 = 'none;';
if ($_POST['email2'] && isset($_POST['resetpw'])) {
	$ver = $db->get_var("SELECT username FROM members WHERE email = '$eemail2'");
	if ($ver == $_POST['username']) {
		$verifcodep = rand (10000 , 99999);
		$pwupdate = $db->query("UPDATE members SET password = '$verifcodep' WHERE email = '$eemail2'");
		$message5 = "An email will arrive shortly with your new Verification Code.";
		$eto = $eemail2;
		$esubject = "Requested Password Reset Verification Code.";
		$emessage = "Hello! Heres your Varification Code: $verifcodep";
		mail($eto,$esubject,$emessage,$eheaders,$eparameters);
		$sentver = true;
		$message = "Verification Code Sent";
		$switch = "none;";
		$switch2 = "";
	} else {
		$message6 = "Theres no email address with that username.";
		
	} 
} else {
	}

if(isset($_POST['go']) && $_POST['vercode']) {
	unset($_POST['go']);
	$switch2 = "";
	if ($_POST['newpass'] == $_POST['newpass2'] AND $_POST['newpass'] != null ){
		$pwm = true;
		
		$message7 = "passwords good";
	} else {
		$pwm = false;
	} 
		if ($pwm) {
			$cc = $db->get_var("SELECT password FROM members WHERE username = '$username'");
			if ($_POST['vercode'] == $cc) {
				$passh = $_POST['newpass2'];
				$hashpw = hash("sha256", $passh);
				$db->query("UPDATE members SET password = '$hashpw' WHERE email = '$eemail2'");
				$anun = $db->get_var("SELECT FirstName, LastName FROM members WHERE email = '$eemail2'");
				$message = "new password set. An email informing you of this change has been sent.";
				$switch2 = "none;";
				$headers1 = "From: mail server CBA" . strip_tags($_POST['req-email']) . "\r\n";
				$headers1 .= "Reply-To: CBA ADMIN ". strip_tags($_POST['req-email']) . "\r\n";
				$headers1 .= "MIME-Version: 1.0\r\n";
				$headers1 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$date1 = new DateTime();
				$time1 = $date1->format('h:i d/m/y');
				$eto1 = $eemail2;
				$esubject1 = "ACTIVITY NOTICE-Password";
				$emessage1= "
					<html style='border: 10 black solid;border-radius: 10px;width: 90%;margin-left: auto;margin-right: auto;background-color: rgb(175, 175, 199);'>
						<body style='background-color: rgb(235, 235, 238); font-size: 40px;'>
							<div style='font-size: 72px;width: 60%;margin-left: auto;margin-right: auto;text-align: center;font-weight: bold;background-color: rgb(175, 175, 199);border: 12 black solid;border-radius: 20px;color: rgb(105, 0, 0);'>
								ALERT-Password Change!
							</div> 
							<br>
							<hr>
							<br>
							<div style='font-size: 60px;width:81%;margin-left: auto;margin-right: auto;text-align: center;font-weight: bold;background-color: rgb(175, 175, 199);border-radius: 10px;'>
									Hello, $anun, at, $eemail2. Around, $time1, you have had a change on your account.
							</div>
							<hr style='width:70%;margin-left:auto;margin-right:auto;'>
							<div style='border-radius: 10px;width:90%;margin-left: auto;margin-right: auto;background-color: rgb(175, 175, 199);font-size: 60px;text-align: center;'>
								Password has been changed. Ignore if thats ROIIIITEEEEeeeee. If this is an issue, reset your password. <a href='http://cody.depole.me/mpgcalculator/forgot'>RESET PASSWORD!</a>
							</div>
							<br>
							<hr>
							<br>
							<div style='border: 18 black solid;border-radius: 10px; width:50%; margin-left: auto; margin-right: auto; background-color: rgb(175, 175, 199); font-size: 40px; text-align: center;'>
								If this is an error or you did not prompt this email, visit: <a href='http://bit.ly/uStgVd'>Report!</a>
							</div>
						</body>
					</html>";
		$emsg2 = wordwrap($emessage1,70);
				mail($eto1,$esubject1,$emessage1,$headers1);
				$message112 = "hung at mail";
				unset($eemail2);
				unset($username);
				} else {
					$message3 = "Verification Code Incorrect.";
				}
				
	} else if ($pwm == false){
		$message2 = "Passwords do not match and cannot be blank.";
		$message4 = "new password not set";
	}
} else {
	$message = "$message2  $message3  $message4  $message5  $message6  $message7 $message11 $message12";
}



?>




<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, height=device-height">
		<title>Log-In</title>
		<link rel="stylesheet" type="text/css" href="site_theme/css/forgot.css">
	</head>
	<body>
			<div class="banner" onclick="window.location='http://cody.depole.me/mpgcalculator/'"> 
					<img id="img" src="http://cody.depole.me/mpgcalculator/site_theme/img/cbalogo.png">
						Code <b style="font-size: 80px; color:rgb(77, 77, 182);">Blue</b> Aviation
						<br>
						Click the Banner to Go Home
			</div>
		<div> 
			<form method="post" class="forgot"> 
				<hr>
				<br>
				<div> Forgot Username?
						<input type="text" placeholder="Email Address" name="email" value="<?php echo $eemail; ?>" />
						<input type="password" placeholder="Password" name="password" /> 
						<input type="submit" name="retun" value="Retrieve Username!"/>
				</div>
				<br> <hr><hr> <br>
			
				<div> Reset Password?
						<input type="text" placeholder="Email Address" name="email2" value="<?php echo $eemail2; ?>" />
						<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" />
						<input style="display:<?echo $switch;?>" type="submit" name="resetpw" value="Send Verification Code"/>
				</div>
				<br>
				<hr>
				<div style="display:<?echo $switch2;?>"> Reset Password: 
					<br>
						<input type="text" placeholder=":Verification Code:" name="vercode" />
						<br>
						<input type="text" placeholder="New Password" name="newpass" />
						<br>
						<input type="text" placeholder="Re-Type New Password" name="newpass2"  />
						<br>
						<input type="submit" name="go" value="Reset Password"/>
						<hr>
						<br>
						
				</div>
			</form>
		</div>
		
		<br>
		
		<div id="message">
		<p>
			<?php echo $message; ?>
		</p>
	</div>
	</body>
</html>