<?php   include "header.php"; 
        include "config.php";
?>
<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-7">
                <div class="d-flex justify-content-center h-100">
                    <div class="card">
                        <div class="card-header">
                            <h3>Payment Details</h3>
                        </div>
                        <div class="card-body">
                            <form> 
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <div class="form-row">
                                            <label class="cvv">CARD NUMBER</label>
                                            <input type="text" class="form-control" placeholder="Valid Card Number">	
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <div class="form-row">
                                            <label class="cvv">EXPIRY DATE</label>
                                            <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                            <input type="text" class="form-control" id="expityYear" placeholder="YY" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <label class="cvvv">CV CODE</label>
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
            <div class="card">
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
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <div class="form-row">
                                    <label class="cvv">EXPIRY DATE</label>
                                    <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                    <input type="text" class="form-control" id="expityYear" placeholder="YY" required />
                                </div>
                            </div>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <label class="cvvv">CV CODE</label>
                                <input type="password" class="form-control" id="cvCode" placeholder="CVV" required />
                            </div>
                        </div>
                        <a href="order_submit.php" class="btn btn-success btn-lg btn-block" role="button">Pay</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



    <?php include "footer.php"; ?> 