<?php
error_reporting(E_ALL);
ini_set('display_errors', '0');
$tpass1 = $_POST["tpass1"];
$tpass2 = $_POST["tpass2"];
$UserName = $_POST["username"];
if ($UserName != null) {
} else {
	$UserName = "Guest";
}
$FirstName = $_POST["firstname"];
$LastName = $_POST["lastname"];
$email = $_POST["email"];
$submit = $_POST["submit"];
if ($submit == "Register!" && $tpass1 != null && $tpass2 != null){
	$passh = hash('sha256', $tpass1);
	$passh2 = hash('sha256', $tpass2);
	$message = "Complete ALL Fields";
} else {
	$message = "Hello, Guest. All Fields Are Required*";
}
if ($tpass1 == $tpass2 && $tpass1 != null) {
	$pwm = "go";
	$accp = a;
} else {
	$pwm = "nogo";
	$message = "Sorry, $UserName, required fields are missing info. Fill out ALL fields.";
}
$ec = $db->get_var("SELECT username from members WHERE username = '$UserName'");
$ecc = $db->get_var("SELECT email from members WHERE email = '$email'");
if ($ec == $UserName || $ecc == $email && isset($_POST['submit'])) {
	unset($_POST['submit']);
	$message = "Username and/or Email Address Already Taken";
	$pwm = "hellnogo";
} else {
}
$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
if (preg_match($pattern, $email) === 1) {
    // emailaddress is valid
    $emailadd = "email address is good";
	$eg = 1;
} else {
	$eg = 0;
	$emailadd = "email address is not good";
}
if ($pwm == "go" && $UserName != null && $eg == 1 && $FirstName != null && $LastName != null) {
	$alertthing = 'alert("Thank you for registering,' . $FirstName . ', you will recieve email shortly!")';
	$db->query("INSERT INTO members (id, username, FirstName, LastName, password, email, accountp) VALUES (NULL,'$UserName', '$FirstName', '$LastName', '$passh2','$email', '$accp')");
	$subject3 = "Welcome to CBA- New Member";
	$headers3 = "MIME-Version: 1.0\r\n";
	$headers3 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$date3 = new DateTime();
	$time3 = $date3->format('h:i d/m/y');
	$fn = $db->get_var("SELECT FirstName FROM members WHERE email = '$email'");
	$ln = $db->get_var("SELECT LastName FROM members WHERE email = '$email'");
	$fnln = "$fn $ln";
	$message3 = "<html style='border: 10 black solid;border-radius: 10px;width: 90%;margin-left: auto;margin-right: auto;background-color: rgb(175, 175, 199);'>
							<body style='background-color: rgb(235, 235, 238); font-size: 40px;'>
								<div style='font-size: 72px;width: 60%;margin-left: auto;margin-right: auto;text-align: center;font-weight: bold;background-color: rgb(175, 175, 199);border: 12 black solid;border-radius: 20px;color: rgb(105, 0, 0);'>
									Welcome to Code Blue Aviation!
								</div> 
								<br>
								<hr>
								<br>
								<div style='font-size: 60px;width:80%;margin-left: auto;margin-right: auto;text-align: center;font-weight: bold;background-color: rgb(175, 175, 199);border-radius: 10px;'>
										Hello, $fnln. Welcome to Code Blue Aviation (CBA). It seems you have registered an account to CBA. Thank you for joining, $UserName.
										Your Login Info:
										<br>
										<br>
										<div style='margin-right:auto;width:60%;margin-left:70px;text-align:left;border:5px solid black;'>
											<hr>
												Email: <br> $email 
											<br> <br>
												Usname: <br> $UserName
											<hr>
										</div>
								</div>
								<hr style='width:70%;margin-left:auto;margin-right:auto;'>
								<br>
								<hr>
								<br>
								<div style='border: 18 black solid;border-radius: 10px; width:50%; margin-left: auto; margin-right: auto; background-color: rgb(175, 175, 199); font-size: 40px; text-align: center;'>
									If this is an error or you did not prompt this email, visit: <a href='http://bit.ly/uStgVd'>Report!</a>
								</div>
							</body>
						</html>";
	$msg3 = wordwrap($message3,70);
	mail($email, $subject3, $msg3, $headers3);
	$qgo = "go";
	unset($UserName);
	header("Location: http://cody.depole.me/mpgcalculator/login");
} else if($pwm == "nogo" && isset($_POST['submit'])){
	$message = "Sorry, $UserName, Password is required or they do not match. ";
	$qgo = "nogo";
}
if ($pwm = 3) {
} else {
}
 ?>
<html>
	<head> 
		<title>SIGN-UP</title>
		<link rel="stylesheet" type="text/css" href="site_theme/css/logincss.css"> 
	</head>
	<body>
		<div class="banner" onclick="window.location='http://cody.depole.me/mpgcalculator/'"> 
			<img id="img" src="http://cody.depole.me/mpgcalculator/site_theme/img/cbalogo.png">
				Code <b style="color:rgb(77, 77, 182);">Blue</b> Aviation
				<br>
				Click the Banner to go Home!
		</div>
		
		<?php if($message != null){ ?>
			
			<div class="message"> <?php echo $message; ?>  </div>
		<?php } ?>
		

<form method="post"> 
		<div class="validate">
			<br> 
			<hr>
			<p>
			<span>
				First Name: <input type="text" name="firstname" value="<?php echo $FirstName; ?>" size="10" maxlength="25"/>
			</span>
			<span>
				Last Name: <input type="text" name="lastname" value="<?php echo $LastName; ?>" size="10" maxlength="25"/>
			</span>
			</p>
			<hr>
			<p>
				Email (max 30 characters): <input class="bday" type="text" name="email" value="<?php echo $email; ?>" size="30" maxlength="30" />
			</p>
			<hr>
			<p> 
				Desired Username: <input type="text" name="username" value="<?php echo $UserName; ?>" size="10" maxlength="25"/>
				<br>
				<br>
			</p>
			<p>
				Password: <input type="password" name="tpass1" value="" size="8" maxlength="15"/> <br>
				Re-type Password: <input type="password" name="tpass2" value="" size="8" maxlenght="15" />
			</p>
			<hr>
			<input class="button" type="submit" name="submit" value="Register!"/>
			<br>
		</form>		



	</body>
</html>	


