<?php include '../view/header.php'; ?>

<main>
	<div class="row">
		<div class="col-sm-3">
			<br>
			<h5><strong>Welcome back, <?php echo htmlspecialchars($first_name);?>!</strong></h5>
			<ul class="account_links">
				<li><a href="<?php echo './?action=view_account'; ?>">Personal Details</a></li>
				<li><a href="<?php echo './?action=view_order_history'; ?>">Order History</a></li>
			</ul>
		</div><!-- links -->
		<div class="col-sm-9">
			<h1>My Account</h1>
			<div class="row">
				<form action="." method="post" class="form-horizontal">
					<input type="hidden" name="action" value="update_account">
					
					<div class="form-group">
						<label for="first_name" class="col-sm-3 control-label">First Name</label>						
						<div class="col-sm-5">
							<input class="form-control" type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>">						
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">						
						<label for="last_name" class="col-sm-3 control-label">Last Name</label>						
						<div class="col-sm-5">
							<input class="form-control" type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>">						
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">
						<label for="address" class="col-sm-3 control-label">Street Address</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="address" value="<?php echo htmlspecialchars($address); ?>">						
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">
						<label for="city" class="col-sm-3 control-label">City</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="city" value="<?php echo htmlspecialchars($city); ?>">						
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">
						<label for="state" class="col-sm-3 control-label">State</label>						
						<div class="col-sm-5">
							<input class="form-control" type="text" name="state" value="<?php echo htmlspecialchars($state); ?>">
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">
						<label for="zip" class="col-sm-3 control-label">Zip</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="zip" value="<?php echo htmlspecialchars($zip); ?>">
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">
						<label for="email" class="col-sm-3 control-label">Email Address</label>
						<div class="col-sm-5">
							<input class="form-control" type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">
						<label for="password_1" class="col-sm-3 control-label">Password</label>
						<div class="col-sm-5">
							<input class="form-control" type="password" name="password_1">
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">
						<label for="password_2" class="col-sm-3 control-label">Retype Password</label>
						<div class="col-sm-5">
							<input class="form-control" type="password" name="password_2">
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-2">
							<input type="submit" value="Update" class="btn btn-primary btn-block">		
						</div>
						<div class="col-sm-2">
							<a href=".?action=view_account" class="btn btn-warning btn-block">Cancel</a>						
						</div>
					</div><!-- form group end -->
					
					<?php if (!empty($password_message)) : ?>
						<div class="alert alert-danger" role="alert">
							<span class="error"><?php echo $password_message; ?></span>
						</div>
					<?php endif; ?>
				</form>
			</div><!-- row end -->
		</div><!-- main section -->
	</div><!-- row end -->
</main>

<?php include '../view/footer.php'; ?>