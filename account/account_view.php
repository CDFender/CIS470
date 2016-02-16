<?php include '../view/header.php'; ?>

<main>
	<div class="row">
		<div class="col-sm-3">
			<p>Hi, <?php echo htmlspecialchars($first_name);?></p>
			<ul>
				<li><a href="<?php echo './?action=view_account'; ?>">Personal Details</a></li>
				<li><a href="<?php echo './?action=view_order_history'; ?>">Order History</a></li>
			</ul>
		</div><!-- links -->
		<div class="col-sm-9">
			<h1>My Account</h1>
			<form action="." method="post">
				<input type="hidden" name="action" value="update_account">
				<p><label>First Name</label>
				<input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>"></p>
				<p><label>Last Name</label>
				<input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name);; ?>"></p>
				<p><label>Street Address</label>
				<input type="text" name="address" value="<?php echo htmlspecialchars($address);; ?>"></p>
				<p><label>City</label>
				<input type="text" name="city" value="<?php echo htmlspecialchars($city);; ?>"></p>
				<p><label>State</label>
				<input type="text" name="state" value="<?php echo htmlspecialchars($state); ?>"></p>
				<p><label>Zip</label>
				<input type="text" name="zip" value="<?php echo htmlspecialchars($zip);; ?>"></p>
				<p><label>Email Address</label>
				<input type="email" name="email" value="<?php echo htmlspecialchars($email);; ?>"></p>
				<p><label>Password</label>
				<input type="password" name="password_1"></p>
				<p><label>Retype Password</label>
				<input type="password" name="password_2"></p>
				<input type="submit" value="Save" class="btn btn-primary">
				<a href=".?action=view_account" class="btn btn-warning">Undo Changes</a>
			</form>
		</div><!-- main section -->
	</div><!-- row end -->
</main>

<?php include '../view/footer.php'; ?>