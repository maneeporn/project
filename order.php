<?php   include "header.php"; 
        include "config.php";
        if(isset($_SESSION['user_id']))
        {
            $user_id=$_SESSION['user_id'];
        }
        else
        {
            $user_id= 0;
        }
        $userquery = "Select * from user where user_id =".$user_id;
        $result = mysqli_query($connect,$userquery);
        $row = mysqli_fetch_assoc($result);
        if (!$result)
        {
            die ("Could not successfully run the query $userquery".mysqli_error($connect));
        }
        else
        {?>
            <div class="content">
                <div class="row">
                    <div class="col-7">
                        <div class="card address">
                            <div class="card-title">
                                <h3 class="addressh3">Address<h3>
                            </div>
                            <div class="card-body address">

                    <?php   if($_SESSION['login_status'] = '0')
                            {?>
                                <form  method="post" action="payment.php">
                                <div class="form-group address">
                                    <label>Firstname</label>
                                    <input type="text" class="form-control" name="fname">
                                    <label>Lastname</label>
                                    <input type="text" class="form-control" name="lname">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone">
                                    <label>E-mail</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                <div class="input-group">
                                    <input class="button1" type="submit" name="button" id="button" value="Submit" />
                                    <input class="button2" type="reset" name="button2" id="button2" value="Reset" />
                                </div>
                                </form>
                    <?php   }
                            else
                            {?>
                                <form  method="post" action="payment.php">
                                <div class="form-group address">
                                    <label>Firstname</label>
                                    <input type="text" class="form-control" name="fname" value="<?php echo $row['firstname'];?>">
                                    <label>Lastname</label>
                                    <input type="text" class="form-control" name="lname" value="<?php echo $row['lastname'];?>">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>">
                                    <label>E-mail</label>
                                    <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>">
                                </div>
                                <div class="input-group">
                                    <input class="button1" type="submit" name="button" id="button" value="Submit" />
                                    <input class="button2" type="reset" name="button2" id="button2" value="Reset" />
                                </div>
                                </form>
                                
                    <?php   }?> 
                            </div>
                         </div>
                    </div>
                    <div class="col-5">
                        <?php
                            $query = "Select * from cart join cart_details using (cart_id) join product using (product_id) where cart.user_id =".$user_id;
                            $cartdetails = mysqli_query($connect,$query);
                            while ($row = mysqli_fetch_assoc($cartdetails));
                            {?>
                            <div class="card">
                                <div class="card-header">
                                    <h3>Sign In</h3>
                                </div>
                                <div class="card-body">\
                                    <form action="check_login.php" method="post"> 
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="text" class="form-control login" placeholder="username" name="username">	
                                            </div>
                                        </div>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                <input type="password" class="form-control login" placeholder="password" name="password">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <input class="button1" type="submit" name="button" id="button" value="sign in" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php }?>                           

    <?php include "footer.php"; ?> 