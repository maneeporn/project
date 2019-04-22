<?php
     if (session_status() == PHP_SESSION_NONE) 
     {
       session_start();
     }
  session_destroy();
  session_start();
  $_SESSION['login_status'] = '0';
	header("Location: index.php");
?>