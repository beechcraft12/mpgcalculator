<?php get_header(); ?>

<?php 
	$user_id = $_POST['user'];
	$galons = $_POST['galons'];
	$miles = $_POST['miles'];
	$secret = $_POST['secret'];
	$time_stamp = date('m/d/Y');
	$message = null;
	$success = false;
	
	if($user_id && $galons && $miles && $secret && $time_stamp){
		$user = $db->get_row("SELECT * FROM `members` WHERE ID = $user_id");
		if($secret != $user->password){
			$message = "Secret is incorrect";
		}else{
			//$db->query("INSERT INTO `mpg_log`(`user_id`, `miles`, `galons`, `time_stamp`) VALUES ([$user],[$miles],[$galons],[$time_stamp]))");	
			$db->query("INSERT INTO mpg_log SET user_id='$user_id', miles='$miles', galons='$galons', time_stamp='$time_stamp' ");
			//$db->query("INSERT INTO mpg_log SET user_id=".$user.", miles=".$miles.", galons=".$galons.", time_stamp='".$time_stamp."' ");
			$success = true;
			$message = "success";
		}
	}
?>

<?php if($success == false){ ?>

<form method="post">

<div class="message"><?php echo $message; ?></div>

<div>
	<div class="label">User</div>
	<select name="user">
		<option value="2"> Thomas </option>
		<option value="1"> Cody </option>
	</select>
</div>

<div>
	<div class="label">Galons</div>
	<input type="text" name="galons" value="<?php echo $_POST['galons']; ?>" />
</div>

<div>
	<div class="label">Miles</div>
	<input type="text" name="miles" value="<?php echo $_POST['miles']; ?>" />
</div>

<div>
	<div class="label">Secret</div>
	<input type="password"  name="secret"/>
</div>

<div>
	<button type="submit"> Save </button>
</div>
 

</form>

<?php }else{ 
	
	$history = $db->get_results("SELECT * FROM `mpg_log` WHERE user_id = '$user_id'");
?>
	
<table>
	
	<tr>
		<td>Time Stamp</td>
		<td>MPG</td>
	</tr>
	
	<?php foreach($history as $item) { ?>

		<tr>
			<td><?php echo $item->time_stamp; ?></td>
			<td><?php echo $item->miles / $item->galons; ?>  </td>
		</tr>

	<?php } ?>
</table>

<?php } ?>

<?php get_footer(); ?>