<?php
		session_start();
	require_once "config.php";
	require "header.php";
?>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row">
    <div class="col-12">
      <div class="card-body">
        <h5 class="card-title">SIGN UP</h5>
        <form method="post" action="register_submit.php">
          <div class="input-group">
            <input class="input--style-3" type="text" placeholder="username" name="username">
          </div>
          <div class="input-group">
            <input class="input--style-3" type="text" placeholder="password" name="password">
          </div>
          <div class="input-group">
            <input class="input--style-3" type="text" placeholder="confrim password" name="confrimpassword">
          </div>
          <div class="input-group">
            <input class="input--style-3" type="text" placeholder="first name" name="fname">
          </div>
          <div class="input-group">
            <input class="input--style-3" type="text" placeholder="last name" name="lname">
          </div>
          <div class="input-group">
            <input class="input--style-3" type="text" placeholder="e-mail" name="email">
          </div>
          <div class="input-group">
            <input class="input--style-3" type="text" placeholder="phone" name="phone">
          </div>
          <div class="input-group">
            <input class="input--style-3" type="text" placeholder="address" name="address">
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php" ?>
