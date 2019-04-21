<?php include "header.php";?>
  <div class="container">
		<div class="row">
      <?php $userquery = "Select * from product";
    				$result = mysqli_query($connect,$userquery);
            while ($row = mysqli_fetch_assoc($result))
            			{
                    echo '<div class="col-6">
                            <div class="product_card">
                              <img class="img-fluid" src="image/'.$row['picture1'].'">
                              <a class="btn btn-outline-dark" href="product.php?id='.$row['product_id'].'" role="button">see more</a>
                            </div>
                          </div>';
            			}
    	?>
    </div>
  </div>
<?php include "footer.php"; ?>
