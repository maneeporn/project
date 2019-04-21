<?php
	session_start();
	require_once "config.php";
	require "header.php";
?>
	<form action="add_product_submit.php" method="post">
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Product name" name="product_name">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Product price" name="product_price">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Product color" name="product_color">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Product description" name="product_description">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Quantity size s" name="size_s">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Quantity size m" name="size_m">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Quantity size l" name="size_l">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Picture" name="picture1">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Picture" name="picture2">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Picture" name="picture3">
		</div>
		<div class="input-group">
			<input class="input--style-3" type="text" placeholder="Picture" name="picture4">
		</div>

		<input class="button" type="submit" name="button" id="button" value="Submit" />
		<input class="button" type="reset" name="button2" id="button2" value="Reset" /></td>
	</form>

<?php include "footer.php" ?>
