<?php   include "header.php"; 
        include "config.php";
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $cart_id=$_POST['cart_id'];
        $_SESSION['fname']=$fname;
        $_SESSION['lname']=$lname;
        $_SESSION['address']=$address;
        $_SESSION['phone']=$phone;
        $_SESSION['email']=$email;

?>
<div class="container">
    <div class="content">
        <form action="order_submit.php" method="post"> 
            <div class="row">
                <div class="col-5">
                    <div class="d-flex justify-content-center h-100 payment">
                        <div class="card payment">
                            <div class="card-header">
                                <h3>Payment Details</h3>
                            </div>
                            <div class="card-body payment">
                                <form> 
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <div class="form-row">
                                                <label class="cvv"> CARD NUMBER</label>
                                                <input type="text" class="form-control payment" placeholder="Valid Card Number" maxlength="12">	
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <div class="form-row">
                                                <label class="cvv"> EXPIRY DATE</label>
                                                <input type="text" class="form-control" id="expityMonth" maxlength="2" placeholder="MM" required />
                                                <input type="text" class="form-control" id="expityYear" maxlength="2"placeholder="YY" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <label class="cvv">CV CODE</label>
                                            <input type="password" class="form-control" id="cvCode" maxlength="3" placeholder="CVV" required />
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg btn-block">Pay</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="orders">
                        <div class="card-header">
                            <h3>Order Details</h3>
                        </div>
                        <div class="card-body orders">
                                <?php   
                                $query = "Select user_id,product.picture1,product.product_name,cart_details.product_size,product.product_price,cart_details.qty,product_id from cart JOIN cart_details using(cart_id)	JOIN product USING (product_id) where cart_id = $cart_id";
                                $result = mysqli_query($connect,$query);
                                if (!$result)
                                {
                                    die ("Could not successfully run the query $query".mysqli_error($connect));
                                }
                                else
                                {   
                                    $total = 0;
                                    $user_id = '';
                                    while ($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<div class='row order-info'>
                                                <div class='col-3'><img class='img-fluid' src='image/".$row['picture1']."' ></div>
                                                <div class='col-6'><p>".$row['product_name']." (".$row['product_size'].")</p></div>
                                                <div class='col-3'><p>".$row['product_price']." THB</p></div>
                                            </div>";
                                            $total += ($row['qty']*$row['product_price']);
                                            $user_id = $row['user_id'];
                                    }
                                    echo "<input type='hidden' name='total' value='".$total."'>";
                                    echo "<input type='hidden'  name='user_id' value='".$user_id."'>";
                                    echo "<input type='hidden'  name='cart_id' value='".$cart_id."'>";
                                }	
                                ?>
                        </div>
                    </div>
                    <div class="card shipping">
                        <div class="card-body shipping">
                            <p>Address </p><br>
                            <p class="address">Name: <?php echo $fname." ".$lname."<br>Address: ".$address."<br>Tel: ".$phone."<br>E-mail: ".$email;?></p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>



    <?php include "footer.php"; ?> 