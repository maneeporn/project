<?php
	require_once "config.php";
	$product_name = $_POST['product_name'];
	$product_price = $_POST['product_price'];
	$product_color = $_POST['product_color'];
	$product_description = $_POST['product_description'];
	$size_s = $_POST['size_s'];
	$size_m = $_POST['size_m'];
	$size_l = $_POST['size_l'];
	$pic1 = $_POST['picture1'];
	$pic2 = $_POST['picture2'];
	$pic3 = $_POST['picture3'];
	$pic4 = $_POST['picture4'];

	$userquery = "INSERT INTO product
					VALUES ('','$product_name','$product_price','$product_color','$product_description','$size_s','$size_m','$size_l','$pic1','$pic2','$pic3','$pic4')";
	$result = mysqli_query($connect,$userquery);
	if (!$result)
	{
		die ("Could not successfully run the query $userquery".mysqli_error($connect));
	}
	else
	{
		header("Location:show_data_product.php");
	}

?>
