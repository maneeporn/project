<?php
	require_once "config.php";
	$fac_ID = $_GET['id'];
	$userquery = "Select * from faculty where facultyID = $fac_ID ";
	$result = mysqli_query($connect,$userquery);
	if (!$result)
	{
		die ("Could not successfully run the query $userquery".mysqli_error($connect));
	}
	else
	{
		echo "Update data<br><br>";
		if(mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_assoc($result);
?>
<html>
	<head>
	<body>
		<form name="form1" method="post" action="update_data_submit.php?id=<?php echo $fac_ID;?>">
		<table width="416" border="0">
		<tr>
			<td width="160">Faculty Name</td>
			<td width="246"><input type="text" name="fac_name" value="<?php echo $row['facultyname'];?>"></td>
		</tr>
		<tr>
			<td align="right"><input type="submit" name="button" value="Submit"></td>
			<td><input type="reset" name="button2" value="Cancel"></td>
		</tr>
		</table>
		</form>
	</body>
<?php
}
	else
	{
		echo "Not found this record<br><br>";
		echo "<a href=\"show_faculty.php\">Go back to display all faculty</a>";
	}
}
?>
