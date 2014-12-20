<form method="post">
	<input type="submit" name="send2" value="send">
</form>
<?php
//define the receiver of the email
$subject3 = "Welcome to CBA- New Member";
$eto3 = 'beechcraft12@gmail.com';
$headers3 = "From: mail server CBA" . strip_tags($_POST['req-email']) . "\r\n";
$headers3 .= "Reply-To: CBA ADMIN ". strip_tags($_POST['req-email']) . "\r\n";
$headers3 .= "MIME-Version: 1.0\r\n";
$headers3 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$date3 = new DateTime();
$time3 = $date3->format('h:i d/m/y');
$fnln= "Cody Ray";
$email = "beechcraft12@gmail.com";
$UserName = "beech";
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
if($_POST['send3']) {
	unset($_POST['send3']);
	$mail_sent3 = @mail( $eto3, $subject3, $msg3, $headers3);
	echo "<br>" . $mail_sent3 ? "Mail sent3" : "Mail faile3";
} else {
	
}
echo $msg3;



?>
<form method="post">
	<input type="submit" name="send2" value="send">
</form>
<?php 
//define the receiver of the email
$subject2 = "ACTIVITY NOTICE-Requested Username";
$to2 = 'beechcraft12@gmail.com';
$headers2 = "From: mail server CBA" . strip_tags($_POST['req-email']) . "\r\n";
$headers2 .= "Reply-To: CBA ADMIN ". strip_tags($_POST['req-email']) . "\r\n";
$headers2 .= "MIME-Version: 1.0\r\n";
$headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$unlookup = "beech";
$date = new DateTime();
$time = $date->format('h:i d/m/y');
$message2 = "
	
<html style='border: 10 black solid;border-radius: 10px;width: 90%;margin-left: auto;margin-right: auto;background-color: rgb(175, 175, 199);'>
				<body style='border: 18 black solid;border-radius: 10px;background-color: rgb(235, 235, 238); font-size: 40px;'>
				<br>
				<br>
					<div style='font-size: 72px;width: 60%;margin-left: auto;margin-right: auto;text-align: center;font-weight: bold;background-color: rgb(175, 175, 199);border: 12 black solid;border-radius: 20px;color: rgb(105, 0, 0);'>
						ALERT-Requested Username!
					</div> 	
					<br>
					<hr>
					<br>
					<div style='font-size: 60px;width:81%;margin-left: auto;margin-right: auto;text-align: center;font-weight: bold;background-color: rgb(175, 175, 199);border-radius: 10px;'>
							Hello '$unlookup', at '$time', a request was made to view your username. 
					</div>
					<hr style='width:70%;margin-left:auto;margin-right:auto;'>
					<div style='border-radius: 10px;width:90%;margin-left: auto;margin-right: auto;background-color: rgb(175, 175, 199);font-size: 60px;text-align: center;'>
						Your Username for CBA is, '$unlookup'.
					</div>
					<br>
					<hr>
					<br>
					<div style='border: 18 black solid;border-radius: 10px; width:50%; margin-left: auto; margin-right: auto; background-color: rgb(175, 175, 199); font-size: 40px; text-align: center;'>
						If this is an error or you did not prompt this email, visit: <a href='http://bit.ly/uStgVd'>Report!</a>
					</div>
				</body>
			</html> <br><br><br>";
$msg2 = wordwrap($message2,70);
if($_POST['send2']) {
	unset($_POST['send2']);
	$mail_sent2 = @mail( $to2, $subject2, $msg2, $headers2 );
	echo "<br>" . $mail_sent2 ? "Mail sent2" : "Mail failed2";
} else {
	
}
echo $msg2;
?>

<br>
<br>
<hr>
<hr>
<hr>
<br>
<br>

<form method="post">
	<input type="submit" name="send" value="send">
</form>


<?php
//define the receiver of the email
$subject = "ACTIVITY NOTICE-Password";
$to = 'beechcraft12@gmail.com';
$headers = "From: mail server CBA" . strip_tags($_POST['req-email']) . "\r\n";
$headers .= "Reply-To: CBA ADMIN ". strip_tags($_POST['req-email']) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$anun = "Cody Ray";
$date1 = new DateTime();
$time1 = $date1->format('h:i d/m/y');
$eemail2 = "beechcraft12@gmail.com";
$message = "
					<html style='border: 10 black solid;border-radius: 10px;width: 90%;margin-left: auto;margin-right: auto;background-color: rgb(175, 175, 199);'>
						<body style='background-color: rgb(235, 235, 238); font-size: 40px;'>
							<div style='font-size: 72px;width: 60%;margin-left: auto;margin-right: auto;text-align: center;font-weight: bold;background-color: rgb(175, 175, 199);border: 12 black solid;border-radius: 20px;color: rgb(105, 0, 0);'>
								ALERT-Password Change!
							</div> 
							<br>
							<hr>
							<br>
							<div style='font-size: 60px;width:81%;margin-left: auto;margin-right: auto;text-align: center;font-weight: bold;background-color: rgb(175, 175, 199);border-radius: 10px;'>
									Hello, $anun, at, '$eemail2'. Around, '$time1', you have had a change on your account.
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
$msg = wordwrap($message,70);
if($_POST['send']) {
	unset($_POST['send']);
	$mail_sent = @mail( $to, $subject, $msg, $headers );
	echo $mail_sent ? "Mail sent" : "Mail failed";
} else {
	
}
echo $msg;
?>


















