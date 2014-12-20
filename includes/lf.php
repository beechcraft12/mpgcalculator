<?php
//function redirectcody($location){
	//header($location);
    //die();
//}
function logorno(){
	//get_header();
	global $db, $m, $message, $match;
	$HKOOKIE = hash('sha256', session_id());
	if($exists2 = $db->get_var("SELECT salt FROM members WHERE salt = '$HKOOKIE'")) {
		$sidcomp = $exists2;
		if ($sidcomp == $HKOOKIE) {
			$selectunwid = $db->get_var("SELECT username FROM members WHERE salt = '$HKOOKIE'");
			//get_header(); lol
			$match = 1;
			$loggedinornot = "Logout of manualy";
			get_header();
			$m = 1;
		} else {
			//echo '<script type="text/javascript"> alert(\'doesnt match redirect to login\'); </script>';
			header('Location: http://cody.depole.me/mpgcalculator/login');
			$m = 2;
			$loggedinornot = "Logout into manualy";
			$match = 0;
			//redirectcody('/login'); lol
		}
	} else {
		$m = 2;
		$match = 0;
		//echo '<script type="text/javascript"> alert(\'doesnt exist redirect to login\'); </script>';
		header('Location: http://cody.depole.me/mpgcalculator/login');
		//redirectcody('/login'); lol
	}
	switch ($m) {
	case (1):
			$message = "$selectunwid is logged in.";
		break;
	case (2):
			$message = 'Nobody is logged in.';
		break;
	default:
		break;
	}

return $match;
echo "from the lf inside page: match: $match and m: $m.";	
}
// username and password fields filled out? yes or no
function fieldstryit() {
		global $db, $message;
		$pwh = hash('sha256', $_POST["password"]);
		$nu = $_POST['username'];
		$dwp = $_POST['password'];
		$messagedis = true;
		if($nu == "" && $dwp == "") {
			$m = 1;
		} else if($nu != "" && $dwp == "") {
			$m = 2;
		} else if($nu == "" && $dwp != "") {
			$m = 3;
		} else if($both = $db->query("SELECT password, username FROM members WHERE username = '$nu' AND password = '$pwh'")) {
			$unid = $db->get_var("SELECT id FROM members WHERE username = '$nu'");
			$idpw = $db->get_var("SELECT password FROM members WHERE id = '$unid'");
			if($pwh == $idpw) {
				$kookie = session_id();
				$HKOOKIE = hash('sha256', $kookie);
				$db->query("update members set salt = '$HKOOKIE' where username = '$nu'");
				setcookie("WORK_YOU_FUCKER", "GODDAMMIT");
				get_header();
				//redirect('/');
				exit;
			} else {
				$m = 4;
			}
		} else {
			$m = 4;
		}
unset($nu, $pwh, $_POST["password"], $_POST["submit"]);
	switch ($m) {
case (1):
	$message = "You must enter a username and password!";
	break;
case (2):
	$message = "Enter a password!";
	break;
case (3):
	$message = "Enter a username!";
	break;
case (4):
	$message = "Invalid Username and/or Password";
	break;
default:
	$message = "Hello, Guest. Welcome to CBA!";
	break;
	}
	return $message;
}

function late(){
	include_once 'includes/functions.php';
	sec_session_start();
	// Unset all session values 
	$_SESSION = array();
	// get session parameters 
	$params = session_get_cookie_params();
	// Delete the actual cookie. 
	setcookie(session_name(),
	        '', time() - 42000, 
	        $params["path"], 
	        $params["domain"], 
	        $params["secure"], 
	        $params["httponly"]);
	// Destroy session 
	session_destroy();
	header('Location: http://cody.depole.me/mpgcalculator');
}

