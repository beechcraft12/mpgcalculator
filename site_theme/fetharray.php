<?php
ini_set('display_startup_errors',0);
ini_set('display_errors',0);
error_reporting(-1);
session_start();

include 'includes/lf.php';
include '/css/mcalc.css';
logorno();

$array = array(
    "foo" => "bar",
    "bar" => "foo",
);
print_r($array);
$all = $array;

$nnumber = "N4381T";
$db->get_row("SELECT maxthings FROM wb WHERE nnumber = '$nnumber'");
$insert= $db->query("UPDATE wb SET maxthings = '$all' WHERE nnumber = '$nnumber'");

echo $insert;
?>