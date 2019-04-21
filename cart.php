<?php
	require_once "config.php";
	if(isset($_SESSION['user_id']))
	{
		$userquery = "Select * from cart";
		$result = mysqli_query($connect,$userquery);
		if (!$result)
		{
			die ("Could not successfully run the query $userquery".mysqli_error($connect));
		}
		if (mysqli_num_rows($result) == 0)
		{
			echo "No records were found with query $userquery";
		}
		else
		{
			echo "<table cellspacing = \"0\" border = \"1\">";
			echo "<tr bgcolor=\"#D4DFFF\"><th>Product ID</th><th>Product Name</th><th>Delete</th></tr>";
			while ($row = mysqli_fetch_assoc($result))
			{
				echo "<tr><td>".$row['productid']."</td><td>".$row['productname']."</td>";
				echo "<td><a href=\"delete_data.php?id=".$row['productid']."\">";
			}
			echo "</table>";
		}
		echo "<a href=\"home_page.html\">Back to shop</a><br><br>";
    echo "<a href=\"#\">Payment</a><br><br>";
		mysqli_close($connect);
	}
	else
	{
		echo "Can not show data,please login<br><br>";
		echo "<a href=\"login.php\">Click here to login</a>";
	}
?>
