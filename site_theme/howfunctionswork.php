<? 
ini_set('display_startup_errors',0);
ini_set('display_errors',0);
error_reporting(-1);
session_start();

include 'includes/lf.php';
include '/css/mcalc.css';
logorno();
?>

<div>
	html before
</div>
<?php

//echo $id = get_url_varible(2);

function say_my_name($name){
	echo "Hello, my name is " . $name . "<br />";
}

say_my_name("thomas");
say_my_name("cody");



function return_my_name($name){
	return "Hello, my name is " . $name . "<br />";
}

echo return_my_name("John");

$myname = return_my_name("bob");
echo $myname;




echo "<br><br><br><br><br>";




function first() {
	echo 'echo first()';
}

echo first() . "<br>";

function welcome2($parent, $do) {
	echo 'welcome to the website2, ' . ' ' . $parent . ' ' . $do;
}

echo welcome2('mother', 'fucker' );

echo '<br> echo login() "$m mt": ' . login($mt);
echo '<br> var_dump login(): ' . var_dump(login());



function login($mt) {
	$num = 4;
	if($num == 3) {
		echo "<br>number is equal to 3 and return<br>";
		$m = 2;
	} else {
		echo "<br>number is not equal to 3 its 4<br>";
		$m = 4;
	}
	return $m;
}
echo 'mt: ' . $mt;
?>
<div>
	html after
</div>

