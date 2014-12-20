<?


?>
<form method="post">
<?	
//date to age thing
for ($i = 1; $i <=31; $i++)
{
$arDays[] = $i;
}
echo '<select name="day">';
foreach ($arDays as $option) {
	echo '<option value="'.$option.'">'.$option.'</option';
}
echo '</select>';


//

?>
<div>
	<select name="month" id="month">
	    <option value="01">January</option>
	    <option value="02">February</option>
	    <option value="03">March</option>
	    <option value="04">April</option>
	    <option value="05">May</option>
	    <option value="06">June</option>
	    <option value="07">July</option>
	    <option value="08">August</option>
	    <option value="09">September</option>
	    <option value="10">October</option>
	    <option value="11">November</option>
	    <option value="12">December</option>
	</select>
	</

<?
$currentYear = date("Y");
for ($i = $currentYear; $i >= 1920; $i--)
{
	$arYears[] = $i;
}
echo '<select name="year">';
foreach ($arYears as $option) {
	echo '<option value="'.$option.'">'.$option.'</option';
}
echo '</select>';
?>
