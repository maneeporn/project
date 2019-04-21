<?php
	require_once "config.php";
	require "header.php";

	$product_id = $_GET['id'];
    
    $userquery = "Delete from product where product_id = $product_id";
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
