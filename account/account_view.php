<?php include '../view/header.php'; ?>

<main>
	<div class="row">
		<div class="col-sm-4">
			<p>Hi, <?php echo htmlspecialchars($first_name);?></p>
			<ul>
				<li><a href="">Personal Details</a></li>
				<li><a href="">Order History</a></li>
				<li><a href="">Order Status</a></li>
			</ul>
		</div><!-- links -->
		<div class="col-sm-8">
			<h1>My Account</h1>
			<form action="." method="post">
				<input type="hidden" name="action" value="update_account">
				<label>First Name</label>
				<input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>">
				<label>Last Name</label>
				<input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>">
				<label>Street Address</label>
				<input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>">
				<label>City</label>
				<input type="text" name="city" value="<?php echo htmlspecialchars($city); ?>">
				<label>State</label>
				<input type="text" name="state" value="<?php echo htmlspecialchars($state); ?>">
				<label>Zip</label>
				<input type="text" name="zip" value="<?php echo htmlspecialchars($zip); ?>">
				<label>Email Address</label>
				<input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
				<label>Password</label>
				<input type="password" name="password_1" value="New password">
				<label>Retype Password</label>
				<input type="password" name="password_2" value="Retype new password">
				<a href=".?action=update_account" class="btn btn-primary">Save</a>
				<a href=".?action=view_account" class="btn btn-warning">Undo Changes</a>
			</form>
		</div><!-- main section -->
</main>

<?php include '../view/footer.php'; ?>