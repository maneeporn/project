<?php   include "header.php"; 
        include "config.php";
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];

        $_SESSION['fname']=$fname;
        $_SESSION['lname']=$lname;
        $_SESSION['address']=$address;
        $_SESSION['phone']=$phone;
        $_SESSION['email']=$email;

?>
<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-7">
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
                                            <input type="text" class="form-control payment" placeholder="Valid Card Number">	
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <div class="form-row">
                                            <label class="cvv"> EXPIRY DATE</label>
                                            <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                            <input type="text" class="form-control" id="expityYear" placeholder="YY" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <label class="cvv">CV CODE</label>
                                        <input type="password" class="form-control" id="cvCode" placeholder="CVV" required />
                                    </div>
                                </div>
                                <a href="order_submit.php" class="btn btn-success btn-lg btn-block" role="button">Pay</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
            <div class="card orders">
                <div class="card-header">
                    <h3>Order Details</h3>
                </div>
                <div class="card-body orders">
                    <form> 
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <div class="form-row">
                                    <label>Total</label>
                                    .......................................	
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card shipping">
                <div class="card-body shipping">
                    <form> 
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <div class="form-row">
                                    <label>Address </label>
                                </div>
                                <div class="form-row header">
                                    <label class="address"><?php echo $fname." ".$lname."<br>Address:".$address."<br>Tel:".$phone."<br>E-mail:".$email;?></label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



    <?php include "footer.php"; ?> 