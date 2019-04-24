<?php   include "header.php"; 
        include "config.php";
        $fname=$_SESSION['fname'];
        $lname=$_SESSION['lname'];
        $address=$_SESSION['address'];
        $phone=$_SESSION['phone'];
        $email=$_SESSION['email'];

        $userquery="INSERT INTO orders ";
?>