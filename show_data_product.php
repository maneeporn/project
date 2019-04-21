<?php
	require_once "config.php";
    require "header.php";
    
	$userquery = "Select * from product";
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
        echo "<table class=\"showdata\">";
        echo "<tr><th>Product ID</th><th>Product Name</th><th>Product Price</th><th>Product Color</th><th>Product Description</th><th>Quantity Size S</th><th>Quantity Size M</th><th>Quantity Size L</th><th>Picture1</th><th>Picture2</th><th>Picture3</th><th>Picture4</th><th>Update Product</th><th>Delete Product</th></tr>";
        while ($row = mysqli_fetch_assoc($result))
        {
            echo "<tr><th>".$row['product_id']."</th><th>".$row['product_name']."</th><th>".$row['product_price']."</th><th>".$row['product_color']."</th><th>".$row['product_description']."</th><th>".$row['size_s']."</th><th>".$row['size_m']."</th><th>".$row['size_l']."</th><th>".$row['picture1']."</th><th>".$row['picture2']."</th><th>".$row['picture3']."</th><th>".$row['picture4']."</th>";
            echo "<th><a href=\"update_product.php?id=".$row['product_id']."\">";
            echo "<i class=\"fas fa-wrench\"></i></a></th>";
            echo "<th><a href=\"delete_product.php?id=".$row['product_id']."\">";
            echo "<i class=\"fas fa-minus-circle\"></i></a></th></tr>";
        }
        echo "</table>";
    }
    mysqli_close($connect);

    include "footer.php";
?>