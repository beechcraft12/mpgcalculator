<?php
ini_set('display_startup_errors',0);
ini_set('display_errors',0);
error_reporting(-1);
session_start();

include 'includes/lf.php';
include '/css/mcalc.css';
logorno();

 

$name = "SessionIDbrah";

$value = "this_is the session id";

$time = "()+3600";

$path = "/";

$host = ".localhost.com";

$security = "0";


setcookie ("$name", $value, $time, $path, $host, $security);
setcookie ("test", "FUCKMERUNNING",$time, $path, 0);

setcookie ("FUCKYA",$value,$host);




$value1 = 'something from somewhere';

setcookie("TestCookie", $value1);

setcookie("setfucker", "GODDAMMIT", time()+3600);







?>




