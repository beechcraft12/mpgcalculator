<?php
global $loggedinornot;
if($match == 1){
	$loggedornot = "Logout of man";
} else if($match == 0){
	$loggedornot = "LOGOUT OF ";
}
?>
<html>
	<head>
		<title>MPGCalc</title>
		<link rel="stylesheet" id="mqueries-style-css" href="<?php theme_url(); ?>/css/styles.css " type="text/css" media="all">
	</head>
		<body>
			</div>
			<form method="post"> 
				<div class="navbar">
						<a class="btnm" href="<?php site_url(); ?>"> Home </a>
						<a class="btnm" href="<?php site_url(); ?>/login"> <?echo $loggedornot; ?> CBA </a>
						<a class="btnm" href="<?php site_url(); ?>/info"> Test PHP Status </a>
						<br><br>
					<span class="spancurrent">Old Projects:
						<a class="btn" href="<?php site_url(); ?>/howfunctionswork"> How Functions Work </a>
						<a class="btn" href="<?php site_url();?>/getontrack"> Get on Track </a>
						<a class="btn" href="<?php site_url(); ?>/graphs"> Graphs </a>
						<a class="btn" href="<?php site_url(); ?>/fixedplayer"> Fixed Player </a>
						<a class="btn" href="<?php site_url(); ?>/scalemebaby"> ScaleMeBaby </a> 
						<a class="btn" href="<?php site_url(); ?>/cookpract"> Cookie Practice </a>
						<a class="btn" href="<?php site_url(); ?>/testemail"> Test Email </a>
						<a class="btn" href="<?php site_url();?>/canvas"> Canvas </a>
						<a class="btn" href="<?php site_url();?>/wbnitedaydemo"> wbdaynitedemo </a>
					</span>
						<br><br> <span class="spancurrent">Current Projects: 
						<br>
						<br>	
						<a class="btncurrent" href="<?php site_url(); ?>/mpgcalc"> MPG Calc </a>
						<br><br>
						<a class="btncurrent" href="<?php site_url(); ?>/wb"> Custom Weight and Balance </a>
						<br><br>
						<a class="btncurrent" href="<?php site_url();?>/floatplan"> Float Plan </a>
						<br>
					</span>
						<br>
					
				</div>
			</form>
			
			
