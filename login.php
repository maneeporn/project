

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login_modal">
  Launch demo modal
</button>
<!-- Modal -->
<div id="login_modal"class="modal" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
				<form action="checklogin.php" method="post">
					<table>
						<tr>
							<td>Username</td>
							<td><input type="text" name="username"/></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="text" name="pw"/></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><input type ="submit" name="button" id="button" value="submit"/>
							<input type="reset" name="button2" id="button2" value="Reset" /></td>
						</tr>
					</table>
				</form>
      </div>
    </div>
  </div>
</div>
