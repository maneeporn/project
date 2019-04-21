<?php
	require_once "config.php";
	require "header.php";
	$product_id = $_GET['id'];

	$userquery = "Select * from product where product_id = $product_id ";
	$result = mysqli_query($connect,$userquery);
	if (!$result)
	{
		die ("Could not successfully run the query $userquery".mysqli_error($connect));
	}
	else
	{
		if(mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_assoc($result);
?>
<form name="form1" method="post" action="update_data_submit.php?id=<?php echo $product_id;?>">
	<div class="container">
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="<?php echo $row['facultyname'];?>" name="product_name">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Product price" name="product_price">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Product color" name="product_color">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Product description" name="product_description">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Quantity size s" name="size_s">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Quantity size m" name="size_m">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Quantity size l" name="size_l">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Picture" name="picture1">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Picture" name="picture2">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Picture" name="picture3">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Picture" name="picture4">
		</div>
		<div class="input-group">
			<input class="button1" type="submit" name="button" id="button" value="Submit" />
			<input class="button2" type="reset" name="button2" id="button2" value="Reset" />
		</div>
	</div>
</form>
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
