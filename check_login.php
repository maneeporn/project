<?php
	session_unset();
	if (session_status() == PHP_SESSION_NONE) 
	{
	  session_start();
	}
	if(isset($_SESSION['warning']))
	{
		echo "<p align='center'><font color='FF0000'><B>".$_SESSION['warning']."</B></font></p>";
		unset($_SESSION['warning']);
	}

	require_once "config.php";
	$a1 = $_POST['username'];
	$a2 = $_POST['password'];
	$sql="SELECT * FROM user WHERE user_name = '$a1' AND password = '$a2' ";
	$query = mysqli_query($connect,$sql);

	if(mysqli_num_rows($query) > 0)
	{
		$row = mysqli_fetch_assoc($query);
		$l=$row['position_id'];
		$_SESSION['login_status'] = '1';
		$_SESSION['user_id'] = $row['user_id'];
		if($l=='1')
		{
			header("Location:admin.php");
		}
		else
		{
			header("Location:index.php");
		}	
	}
	else
	{
		// die ("Could not successfully run the query $query".mysqli_error($connect));
		header("Location: login.php");
	}
	mysqli_close($connect);
?>
