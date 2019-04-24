<?php
    require_once "config.php";

    if(isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action']; 
        if(isset($_POST['product_id']) && !empty($_POST['product_id'])) { $product_id = $_POST['product_id'];}
        if(isset($_POST['product_size']) && !empty($_POST['product_size'])) { $product_size = $_POST['product_size'];}
        if(isset($_POST['qty']) && !empty($_POST['qty'])) { $qty = $_POST['qty'];}
        if(isset($_POST['user_id']) && !empty($_POST['user_id'])) { $user_id = $_POST['user_id'];}

        switch($action) {
            case 'get_cart_data' : get_cart_data($connect, $user_id);break;
            case 'add' : add($connect, $product_id, $product_size, $qty, $user_id);break;
            case 'remove' : remove($connect, $product_id, $product_size, $user_id);break;
            case 'setcount' : setcount();break;
            case 'clear' : clear();break;
        }
    }
    
    function get_cart_data($connect, $user_id) {
        $query = "Select product.picture1,product.product_name,cart_details.product_size,product.product_price,cart_details.qty,product_id from cart JOIN cart_details using(cart_id)	JOIN product USING (product_id) where user_id = $user_id";
        $result = mysqli_query($connect,$query);
		if (!$result)
		{
			die ("Could not successfully run the query $query".mysqli_error($connect));
		}
		else
		{
            $i = 0;
            while ($row = mysqli_fetch_assoc($result))
            {
                $results[$i] = $row;
                $product_id = $row['product_id'];
                $i++;
            }
            if($i != 0) {
                echo json_encode($results);
            } else {
                echo 'empty';
            }
		}
    }

    function add($connect, $product_id, $product_size, $qty, $user_id) {
        $querycart = "Select cart_id from cart where user_id = $user_id and cart_status = 'not paid'";
        $check_cart_status = mysqli_query($connect,$querycart);
        if (mysqli_num_rows($check_cart_status)==0) { 
            $insertquery = "INSERT INTO cart (user_id, cart_status) VALUES ('$user_id','not paid')";
            $result = mysqli_query($connect,$insertquery);
            if (!$result)
            {
                die ("Could not successfully run the query $query".mysqli_error($connect));
            }
            else
            {
                $querycart = "Select cart_id from cart where user_id = $user_id and cart_status = 'not paid'";
                $check_cart_status = mysqli_query($connect,$querycart);
                $data = mysqli_fetch_assoc($check_cart_status);
                $cart_id = $data['cart_id'];
                $query = "INSERT INTO cart_details (product_id, product_size, qty, cart_id)
                            VALUES ('$product_id','$product_size','1','$cart_id')";
                $kuy = '1';
            }
        } else {
            $data = mysqli_fetch_assoc($check_cart_status);
            $cart_id = $data['cart_id'];
            $queryqty = "Select cart_detail_id, qty from cart_details where cart_id = $cart_id and product_id = $product_id and product_size = '$product_size'";
            $check_duplicate = mysqli_query($connect,$queryqty);
            $data = mysqli_fetch_assoc($check_duplicate);
            $cart_detail_id = $data['cart_detail_id'];
            $i = $data['qty'];
            if($i > 0) {
                $i++;
                $query = "UPDATE cart_details SET qty = '$i' where cart_detail_id = $cart_detail_id";
                $kuy = '2';
            } else {
                $query = "INSERT INTO cart_details (product_id, product_size, qty, cart_id)
                            VALUES ('$product_id','$product_size','1',$cart_id)";
                $kuy = '3';
            }
        }

        $result = mysqli_query($connect,$query);

		if (!$result)
		{
			die ("Could $kuy not successfully run the query $query".mysqli_error($connect));
		}
		else
		{
			echo "success";
		}
    }

    function remove($connect, $product_id, $product_size, $user_id) {
        
        $query = "Delete from cart_details where product_size = '$product_size' and product_id = $product_id and user_id = $user_id";
		$result = mysqli_query($connect,$query);
		if (!$result)
		{
			die ("Could not successfully run the query $query".mysqli_error($connect));
		}
		else
		{
			echo "success";
		}
    }

    function setcount() {
        echo 'setcount';
    }

    function clear() {
        echo 'clear';
    }
?>