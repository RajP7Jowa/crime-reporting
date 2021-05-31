<?php
include 'php/includes/header.php';


?>
<div class="container" id="wrapper">
	<div id="header">
		<div class="logo" style="margin-top:-40px;margin-bottom:8px;"><img src="assets/images/lg.png" width="60px" height="50px" /> Crime <span> reporter</span></div>
	</div>
	<div style="clear:both;"></div>
	<div id="nav">
		<?php include 'php/includes/navigation.php' ?>
	</div>
	<div id="main">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-9">
				<form method="post" action="file_handler.php" role="form">
					<fieldset>
						<legend>Register</legend>
						<p>
						<table width="300px">
							<tr>
								<td>
									<label>FirstName: </label><br>
									<input type="text" name="firstName" id="firstname" class="form-control input-sm" style="width:250px;" min="3" required>
									</p>
									<p>
										<label>LastName: </label><br>
										<input type="text" name="lastName" id="lastname" class="form-control input-sm" style="width:250px;" min="3" required>
									</p>
									<p>
										<label>ID number: </label><br>
										<input type="text" name="id_number" id="id_number" class="form-control input-sm" style="width:250px;" min="5" required>
									</p>


									<label>Password: </label><br>
									<input type="password" name="password" id="password" class="form-control input-sm" style="width:250px;" required>
								</td>
								<td>
								</td>
								<td width="50%" style="padding-left:15px;">&nbsp;

									<label>Confirm Password: </label><br>
									<input type="password" name="password1" id="password1" class="form-control input-sm" style="width:250px;" required>
									</p>
									<p>
										<label>Email: </label><br>
										<input type="email" name="email" id="email" class="form-control input-sm" style="width:250px;" min="4" required>
									</p>
									<p>
										<label>County: </label><br>
										<input type="text" name="county" id="county" class="form-control input-sm" style="width:250px;" min="4" required>
									</p>
									<p>
										<label>Gender: </label><br>
										<select name="gender" id="gender" required>
											<option>-- Select --</option>
											<option value="m">Male</option>
											<option value="f">Female</option>
										</select>
									</p>
									<p>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><br /><br />
									<input type="submit" name="regist" id="register" value="Register" class="btn btn-info btn-sm pull-right">
								</td>
							</tr>
							</p>
						</table>

					</fieldset>
				</form>
			</div>

		</div>
		<div class="row" style="height:30px;"></div>
		<div class="row">
			<?php include 'php/includes/footer.php';

			?>
		</div>

	</div>
</div>