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
			$row = mysqli_fetch_assoc($result);
?>
			<form name="form1" method="post" action="update_product_submit.php?id=<?php echo $product_id;?>">
				<div class="form-group update">
					<label >Product Name:</label>
					<input type="text" class="form-control" name="product_name" value="<?php echo $row['product_name'];?>">
				</div>
				<div class="form-group update">
					<label >Product Price:</label>
					<input type="text" class="form-control" name="product_price" value="<?php echo $row['product_price'];?>">
				</div>
				<div class="form-group update">
					<label >Product Color:</label>
					<input type="text" class="form-control" name="product_color" value="<?php echo $row['product_color'];?>">
				</div>
				<div class="form-group update">
					<label>Product Description:</label>
					<input type="text" class="form-control" name="product_description" value="<?php echo $row['product_description'];?>">
				</div>
				<div class="form-group update">
					<label >Quantity size S:</label>
					<input type="text" class="form-control" name="size_s" value="<?php echo $row['size_s'];?>">
				</div>
				<div class="form-group update">
					<label >Quantity size M:</label>
					<input type="text" class="form-control" name="size_m" value="<?php echo $row['size_m'];?>">
				</div>
				<div class="form-group update">
					<label>Quantity size L:</label>
					<input type="text" class="form-control" name="size_l" value="<?php echo $row['size_l'];?>">
				</div>
				<div class="form-group update">
					<label>Picture 1</label>
					<input type="text" class="form-control" name="picture1" value="<?php echo $row['picture1'];?>">
				</div>
				<div class="form-group update">
					<label >Picture 2</label>
					<input type="text" class="form-control" name="picture2" value="<?php echo $row['picture2'];?>">
				</div>
				<div class="form-group update">
					<label >Picture 3</label>
					<input type="text" class="form-control" name="picture3" value="<?php echo $row['picture3'];?>">
				</div>
				<div class="form-group update">
					<label >Picture 4</label>
					<input type="text" class="form-control" name="picture4" value="<?php echo $row['picture4'];?>">
				</div>
				<div class="input-group">
					<input class="button1" type="submit" name="button" id="button" value="Submit" />
					<input class="button2" type="reset" name="button2" id="button2" value="Reset" />
				</div>
			</form>
<?php 
	}
	
	
	include "footer.php";
?>