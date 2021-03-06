<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="main.css">
    <!-- libraries JS -->
    <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/return_to_top.js"></script>
    <script src="js/sticker.js"></script>
    <script src="js/cart.js"></script>
  </head>
  <body>
    <?php require "config.php"; 
      if (session_status() == PHP_SESSION_NONE) 
      {
        session_start();
		    $_SESSION['login_status'] = '0';
      }
    ?>
    <div class="content">
      <div class="nav-bar">
        <img class="img-fluid logo"src="image/logo.png">
        <ul class="nav justify-content-center">
          <li class="nav-item" >
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="aboutme.php">About me</a></li>
            <?php 
              if (!isset($_SESSION['user_id']) )
              {
                echo "<li class='nav-item'><a class=\"nav-link\" href=\"login.php\">Sign in</a></li>";      
              }
              else 
              {
                if($_SESSION['user_id']=='1')
                {
                  echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"admin.php\">Admin</a></li>";
                }
                echo "<li class='nav-item'><a class=\"nav-link\" href=\"logout.php\">Log out</a></li>";
              }?>
          
          <li class="nav-item">
            <a class="nav-link" href="register.php">Sign up</a>
          </li>
          <li class="nav-item">
            <a id="nav_cart" class="nav-link" data-toggle="modal" data-target="#cart">
              <i class="fas fa-shopping-cart"></i>
              (<span class="product_count">0</span>)
            </a>
          </li>
        </ul>
      </div>
      <!-- Return to Top -->
      <button id="return_to_top"><i class="fas fa-chevron-up"></i></button>
      <?php 
        if (isset($_SESSION['user_id'])) {
          echo "<script>function getUserId() { return user_id = '".$_SESSION['user_id']."';}</script>";
        } else { 
          echo "<script>function getUserId() { return user_id = '!login';}</script>";
        } 
      ?>
