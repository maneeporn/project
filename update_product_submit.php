<?php
	require_once "config.php";
	require "header.php";
	$product_id = $_GET['id'];
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
    
    $userquery = "UPDATE product SET    product_name = '$product_name',
                                        product_price = '$product_price',
                                        product_color = '$product_color',
                                        product_description = '$product_description',
                                        size_s = '$size_s',
                                        size_m = '$size_m',
                                        size_l = '$size_l',
                                        picture1 = '$pic1',
                                        picture2 = '$pic2',
                                        picture3 = '$pic3',
                                        picture4 = '$pic4'
                                 WHERE product_id = '$product_id'";
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