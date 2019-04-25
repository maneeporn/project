<?php
    require_once "header.php";
	require_once "config.php";
	$fname=$_SESSION['fname'];
    $lname=$_SESSION['lname'];
    $address=$_SESSION['address'];
    $phone=$_SESSION['phone'];
    $email=$_SESSION['email'];
    $total=$_POST['total'];
    $user_id=$_POST['user_id'];
    $cart_id=$_POST['cart_id'];

	$userquery = "INSERT INTO orders (total,user_id,cart_id)
					VALUES ($total,$user_id,$cart_id)";
	$result = mysqli_query($connect,$userquery);
	if (!$result)
	{
		die ("Could not successfully run the query $userquery".mysqli_error($connect));
	}
	else
	{?>
        <div class="container">
            <div class="card-body orders">
                <p style=" margin-bottom: 1%; font-weight: bold; ">Shipping to</p>
                <p><b>Name :</b> <?php echo $fname.' '.$lname;?></p>
                <p><b>Address :</b> <?php echo $address;?></p>
                <p><b>Phone :</b> <?php echo $phone;?></p>
                <p style=" margin-bottom: 1%;"><b>E-mail :</b> <?php echo $email;?></p>
                <p><b>Total :</b> <?php echo $total;?> THB</p>
            </div>
        </div>
        
    <?php $userquery = "Update  cart set cart_status='paid' where cart_id=$cart_id and user_id=$user_id";
	        $result = mysqli_query($connect,$userquery);
} ?>

