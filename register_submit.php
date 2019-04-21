<?php
	session_start();
	require_once "config.php";
	$username = $_POST['username'];
  $password = $_POST['password'];
  $cfpassword = $_POST['confrimpassword'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];


$user = "SELECT  user_name FROM user";
$data = mysqli_query($connect,$user);
while ($row = mysqli_fetch_assoc($data))
        {
          if ($row==$username)
          {
            echo "<a href=\"register.php\">enter new username</a>";
            break;
          }
        }

if ($password!=$cfpassword)
{
  echo "pls enter password is okay tee";
  echo "<a href=\"register.php\">enter new username</a>";
}
else
{
  $userquery = "INSERT INTO user (user_name,firstname,lastname,email,password,phone,address,position_id)
              VALUES ('$username','$fname','$lname','$email','$password','$phone','$address',2)";
  $results = mysqli_query($connect,$userquery);

  if (!$results)
  {
  	die ("Could not successfully run the query $userquery".mysqli_error($connect));
  }
  else
  { 
	  echo "welcome<br><br>";
	  echo "<a href=\"homepage.php\">Go back to website</a>";
  } 
}




?>
