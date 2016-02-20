<?php include '../view/header.php'; ?>
<main>
	<h1>Register</h1>
	<form action="." method="post" id="register_form" class="form-horizontal">
		<input type="hidden" name="action" value="register">
		
		<div class="form-group">
			<label for="email" class="col-sm-3 control-label">Email Address:</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" name="email" value="<?php echo htmlspecialchars($email);?>" size="30">
			</div>
		</div><!-- form group end -->
		
		<div class="form-group">
			<label for="password_1" class="col-sm-3 control-label">Password:</label>
			<div class="col-sm-6">
				<input class="form-control" type="password" name="password_1" size="30">
				<span class="error"><?php echo htmlspecialchars($password_message); ?></span>
			</div>
		</div><!-- form group end -->
		
		<div class="form-group">
			<label for="password_2" class="col-sm-3 control-label">Retype Password:</label>
			<div class="col-sm-6">
				<input class="form-control" type="password" name="password_2" size="30">
			</div>
		</div><!-- form group end -->
		
		<div class="form-group">
			<label for="first_name" class="col-sm-3 control-label">First Name:</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" 
						size="30">
			</div>
		</div><!-- form group end -->
		
		<div class="form-group">
			<label for="last_name" class="col-sm-3 control-label">Last Name:</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>"
						size="30">
			</div>
		</div><!-- form group end -->
		
		<div class="form-group">
			<label for="address" class="col-sm-3 control-label">Street Address:</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" name="address" value="<?php echo htmlspecialchars($address); ?>"
						size="30">
			</div>
		</div><!-- form group end -->
		
		<div class="form-group">
			<label for="city" class="col-sm-3 control-label">City:</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" name="city" value="<?php echo htmlspecialchars($city); ?>"
						size="30">
			</div>
		</div><!-- form group end -->
		
		<div class="form-group">
			<label for="state" class="col-sm-3 control-label">State:</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" name="state" value="<?php echo htmlspecialchars($state); ?>"
						size="30">
			</div>
		</div><!-- form group end -->
		
		<div class="form-group">
			<label for="zip" class="col-sm-3 control-label">Zip Code:</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" name="zip" value="<?php echo htmlspecialchars($zip); ?>"
						size="30">
			</div>
		</div><!-- form group end -->
		
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-3">
				<input type="submit" value="Register" class="btn btn-lg btn-primary btn-block">
			</div>
			<div class="col-sm-3">
				<a href="./?action=view_register" class="btn btn-lg btn-warning btn-block">Clear</a>
			</div>
			<div class="col-sm-3">
			</div>
		</div><!-- form group end -->		
	</form>
</main>
<?php include '../view/footer.php'; ?>