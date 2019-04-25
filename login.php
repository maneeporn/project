<?php include "header.php";?>

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
			</div>
			<div class="card-body">
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
	</div>
</div>