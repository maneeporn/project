<?php
		session_start();
	require_once "config.php";
	require "header.php";
	$id=$_GET['id'];
	$userquery = "Select * from product where product_id=$id";
	$result = mysqli_query($connect,$userquery);
	$results = $result->fetch_assoc();
?>
  <div class="container">
		<div class="row">
			<div class="col-12">
				<h1><?php echo $results['product_name'];?></h1>
			</div>
			<div class="col-8">
		    <img class="img-responsive" src="image/<?php echo $results['picture1'];?>" >
		    <img class="img-responsive" src="image/<?php echo $results['picture2'];?>" >
		    <img class="img-responsive" src="image/<?php echo $results['picture3'];?>" >
		    <img class="img-responsive" src="image/<?php echo $results['picture4'];?>" >
			</div>
			<div class="col-4">
				<div class="addtocart">
				   <form action="add_to_cart_summit.php" method="post">
						 <h2><?php echo $results['product_name'];?></h2>
						 <p>Details</p>
						 <p><?php echo $results['product_price'];?>THB</p>
						 <p>Color: <?php echo $results['product_color'];?> </p>
						 <p class="description"><?php echo $results['product_description'];?></p>
						 <br>
						 <div class="form-group">
							 <label for="size">Size </label>
						 		<select id="size" class="form-control" name="size">
					  			<option value="s">S</option>
					  			<option value="m">M</option>
					  			<option value="l">L</option>
								</select>
						 </div>
						 <button type="submit" class="btn btn-light">Add to cart</button>
					</form>
			  </div>
			</div>
  	</div>
	</div>

<a class="nav-link" href="homepage.php">Back to shop</a></li>
<?php include "footer.php" ?>
