<?php
ini_set('display_startup_errors',0);
ini_set('display_errors',0);
error_reporting(-1);
session_start();

include 'includes/lf.php';
include '/css/mcalc.css';
logorno();
 
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

ini_set('display_startup_errors',1);
ini_set('display_errors',0);
error_reporting(-1);


//song system

$nexts = $_POST ["nextsong"];
$prevs = $_POST ["prevsong"];
switch ($songid) {
	case 1:
		$artist = "Yellowcard";
		$songname = "Breathing";
		$newloc = './site_theme/music/YellowcardBreathing.mp3';
		break;
	case 2:
		$artist = "Yellowcard";
		$songname = "How I Go";
		$newloc = './site_theme/music/yellowcardhowigo.mp3';
		break;
	case 3:
		$artist = "Yellowcard";
		$songname = "Summer";
		$newloc = './site_theme/music/GreendaySummer.mp3';
		break;
	default:
		$artist = '**nothin for';
		$songname = 'this songid**';
		$newloc = '';
		break;
}

// song system

//scan dir


$dir = "./site_theme/music";

$files1 = scandir($dir, 1);
$results = print_r($files1, true);
$countfiles = count($files1);
$countjustfiles = $countfiles - 2;

//end scan dir


// Open a known directory, and proceed to read its contents
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            echo "filename: $file : filetype: .mp3" . filetype($dir . $file) . "\n";
			echo"<br>";
			echo "<br> $file";
        }
        closedir($dh);
    }
}



//key, counter, nexts prevs
 
$keyas = array_search('', $array);   // $key = 1;

$arraykeys = array_keys(print_r($files1));

foreach($files1 as $key => $value)
{
  $mykey = $key;
}

echo "<br> nexts and prevs states before calc: ";
echo '<br>';
var_dump ($nexts);
echo '<br>';
var_dump ($prevs);



function familyName($letter, $fname) {  
  echo "$fname .<br>";
}

familyName("Jani");
familyName("Hege");
familyName("Stale");
familyName("Kai Jim");
familyName("Borge"); 


/*
$songida = array(1, 2, 3, 4, 5, 6, 7, 8);
$songid = current($songida);
if ($_POST ["which"] == 'nexts') {
		next($songida);
} else if ($prevs == null) {	
		prev($songida);
		}

var_dump ($songida);
echo '<br>';
var_dump ($songid);

/*
if ($nexts == true) {
		$songid++;
	} else if ($prevs == true) {
		$songid--;
	} else {
	}
*/	

$x = 3;
switch($_POST ["which"]) {
	case "nexts":
		$x++;
	break;
	case "prevs":
		$x--;
	break;
	default:
	break;
	return;	
}

//key, counter, nexts prevs



/*
$slice = array_slice($files1, $x);
echo "<br> slice and $x";
echo $slice;
echo "<br>";
*/



$current_index = current($files1);


function dirtoarray() { 
   
   $result = ($files1); 

   $cdir = scandir($dir); 
   foreach ($cdir as $key => $countf) 
   { 
      if (!in_array($value,array(".",".."))) 
      { 
         if (is_dir($dir . DIRECTORY_SEPARATOR . $countf)) 
         { 
            $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $countf); 
         } 
         else 
         { 
            $result[] = $countf; 
         } 
      } 
   } 
   
   return $countf; 
} 


?>


<style type="text/css">
	
	body {
		background:url("../mpgcalculator/site_theme/img/bk.jpg");
		background-size: 100%;
		color: white;
	}
	footer {
		color: white;
		text-align: center;
	}
	form span:nth-child(1) {
		width: auto;
	}
	form q {
		background: linear-gradient(rgb(15, 16, 22), rgb(43, 70, 111), rgb(42, 42, 54));
		border-radius: 5;
		margin-left: 10px;
		font-size: 32px;
	}
	.which {
		margin-left: auto;
		margin-right: auto;
		width: 38%;
		background-color: gray;
		border: 5px solid rgb(95, 95, 95);
	}
	select {
		margin: 9 14 6 12;
	}
	#links {
		text-align: center;
		font-size: 30px;
		color: black;
		border: 3px solid black;
		border-radius: 3px;
		width: 39%;
		margin-left: auto;
		margin-right: auto;
		background-color: rgba(71, 150, 150, 0.7);
	}
	audio {
		margin: 15px 0px 3px 43px;  
		width: 70%; 
	} 
	.current {
		border: 3px solid green;
		border-radius: 10px;
	}
	.musicp {
		position:fixed;
		top:30px;
		right:5px;
		border: 12px solid black;
		border-radius: 10px;
		margin-right: auto;
		margin-left: auto;
		width: 30%;
		background-color: rgb(50, 26, 226);
	}
	.musicp p{
		font-size: 18px;
		color: red;
		margin: 0 auto 0 auto;
		width: 75%;
	}
	.musice {
		
	}
	embed {
		width="300";
		height="90";
	}
	#next {
		border: 4px solid rgba(33, 33, 39, 0.8);
		font-size: 20px;
		width: 30%;
		border-radius: 13px;
	}
	.songsel {
		width: 100%;
		margin-left: auto;
		margin-right: auto;
		text-align: center;
	}
	
	.showme {
		display: none;
	}
	.showhim:hover 
	.showme {
		display : block;
	}
	.hideme {
		display:block;
	}
	.showhim:hover 
	.hideme {
		display:none;
	}
	.csong {
		width: 31%;
		border: 10px solid black;
		border-radius: 14px;
		text-align: center;
		font-weight: bold;
		font-size: 18;
		margin: 8 0 -14 0;
	}
	
</style> 
<!DOCTYPE html>
<br>
<br>
<br>
<br>

<html>
	<head>
		<title> MUSIC PLAYER FIXED </title>
		<link rel="icon" href="favicon.ico">
	</head>
	<br>
	<body class="body">
		
		<div>
			<div class="showhim">
				<div class="musicp">
					<audio src="<?php echo $newloc;?>" controls>	
						<embed class="musice" src="<?php echo $newloc;?>" loop="false" autostart="true" volume="30"</embed>
					</audio> 
					<div class="showme">
					<div>
						<form method="post"> 
							Enter a song id (0- <?php echo $countfiles; ?>)  
							<input type="text" maxlength="2" size="1" value="<?php echo $songid; ?>" name="songidc">
							then press enter.
						</form> 
					</div>
						<div class="current">
							<span>
								<form class="songsel" method="post">
									<button name="which" type "submit" value="prevs">
										&#8592; Prev Song
									</button>
									
									<marquee class="csong" behavior="scroll" direction="left"> 
	<?php 
	if ($songid == 0) {
		echo "Enter a songid";
	} else if ($songid !== 0){
		echo "$artist - $songname";
	}
?> 
									</marquee>
									<button name="which" type"submit" value="nexts">
										Next Song &#8594;
									</button>
								</form>
							</span>
							<div class="songsel">
								 Playlist goes here from database
								 
								 <br>
								 <span> Artists

								 </span>
								 <span> Song
								 	dfasdf
								 </span>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
<p> DUMPS AFTER ALL PHP!!!!! </p>

<?php 
echo "|START DUMPS|";
echo "<br>";
echo "<br> songida: ";
var_dump ($songida);
echo "<br> songid: ";
echo $songid;
echo "<br> artist: ";
echo $artist;
echo "<br>";
echo '<br> this is how many files are in that dir (including . .. : ';
echo $countfiles;
echo '<br> this is how many files are in that dir (not including . .. : ';
echo $countjustfiles;
echo "<br>";
echo "<br> Value for thing: ";
echo $value;
echo "<br>";

echo "<br> whats in the music dir: ";
echo $files1;
echo $results;

echo "<br> dir location: ";
echo $dir;
echo "<br>";
echo "<br> this is the key for the current song: ";
echo $key;
echo "<br>";
echo "<br> X: is not song id- its the counter for nexts and prevs: ";
echo $x;
echo "<br>";
echo "<br> array keys: ";
echo $arraykeys;
echo "<br> Result: ";
echo $result;
echo "<br>";
echo '<br> reset in the $files1 array: ';
echo reset($files1);
echo "<br>";
echo '<br> current in the $files1 array: ';
echo current ($files1);
echo "<br>";
echo '<br> next in the $files1 array: ';
echo next($files1);
echo "<br>";
echo '<br> prev in the $files1 array: ';
echo prev($files1);
echo '<br> next in the $files1 array: ';
echo next($files1);
echo "<br>";
echo '<br> next in the $files1 array: ';
echo next($files1);
echo '<br> dir to array function $dire: ' ;
echo "<br>";
echo $nexts;
echo $prevs;
echo "<br>";
echo "<br>";
echo "<br> |END DUMPS|";
echo '<br>';

?>


	<br>
	<br>
	<br>
	<div>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER 
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		FILLER
		<br>
		
	</div>
	<footer>
		<hr>
		By your moms tits inc- cody ray 2014
		<hr>
	</footer>
</html>