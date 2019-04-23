<?php
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
		    <img class="img-fluid" src="image/<?php echo $results['picture1'];?>" >
		    <img class="img-fluid" src="image/<?php echo $results['picture2'];?>" >
		    <img class="img-fluid" src="image/<?php echo $results['picture3'];?>" >
		    <img class="img-fluid" src="image/<?php echo $results['picture4'];?>" >
			</div>
			<div class="col-4">
				<div class="addtocart">
				   <form action="add_to_cart_summit.php" method="post">
						<input type="hidden" id="product_id" name="product_id" value="<?php echo $results['product_id'];?>">
						<input type="hidden" id="product_name" name="product_name" value="<?php echo $results['product_name'];?>">
						<input type="hidden" id="product_price" name="product_price" value="<?php echo $results['product_price'];?>">
						<input type="hidden" id="picture1" name="picture1" value="<?php echo $results['picture1'];?>">
						 <h2><?php echo $results['product_name'];?></h2>
						 <p>Details</p>
						 <p><?php echo $results['product_price'];?>THB</p>
						 <p>Color: <?php echo $results['product_color'];?> </p>
						 <p class="description"><?php echo $results['product_description'];?></p>
						 <br>
						 <div class="form-group">
								<label for="size">Size </label>
									<select id="size" name="size" class="form-control size">
									<?php 	$userquery = "Select * from size_product";
										$size = mysqli_query($connect,$userquery);
										while ($rowsize = mysqli_fetch_assoc($size))
            				{?>
											<option value="s"><?php echo $rowsize['size_name']?></option>
							<?php } ?>
									</select>
								</div>
						 <button id="add_cart" type="button" class="btn btn-light add-to-cart">Add to cart</button>
					</form>
			  </div>
			</div>
  	</div>
	</div>

<?php include "footer.php" ?>
