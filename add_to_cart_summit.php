<?php
	include "config.php";
	include "header.php";
	$size = $_POST['size'];
	if($_SESSION['user_id'] == 0)
	{
		echo $_SESSION['user_id'];
		echo "Can not add product to cart,please login<br><br>";
		echo "<a href=\"login.php\">Click here to login</a>";
	}
	else
	{
		//$userquery = "INSERT INTO cart(size) values (\"$size\")";
		//$result = mysqli_query($connect,$userquery);
		//if (!$result)
		//{
			//die ("Could not successfully run the query $userquery".mysqli_error($connect));
		//}
		//else
		//{
			echo "Add to cart successfully";
			echo "<a href=\"cart.php\">view cart</a>";
			echo "<a href=\"index.php\">continue shopping </a>";
		//}
	}
?>
