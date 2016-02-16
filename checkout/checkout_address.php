<?php include '../view/header.php'; ?>

<main>		
	<div class="page" id="featured">
		<div class="row">
			<h1>Billing & Shipping Address</h1>
			<div class="col-sm-8">
				<form action="." method="post">
					<input type="hidden" name="action" value="payment">
					<p><label>First Name</label>
						<input type="text" name="first_name" maxlength="50" 
								value="<?php echo htmlspecialchars($first_name); ?>"/></p>
					<p><label>Last Name</label>
						<input type="text" name="last_name" maxlength="50" 
								value="<?php echo htmlspecialchars($last_name); ?>"/></p>
					<p><label>Street Address</label>
						<input type="text" name="address" maxlength="100" 
								value="<?php echo htmlspecialchars($address); ?>"/></p>
					<p><label>City</label>
						<input type="text" name="city" maxlength="40" 
								value="<?php echo htmlspecialchars($city); ?>"/></p>
					<p><label>State</label>
						<input type="text" name="state" maxlength="20" 
								value="<?php echo htmlspecialchars($state); ?>"/></p>
					<p><label>Zip</label>
						<input type="text" name="zip" maxlength="5" 
								value="<?php echo htmlspecialchars($zip); ?>"/></p>
					<p>Shipping Method</p>
					<input type="radio" name="shipping" value="free" checked="checked" /> Standard (Free)<br>
					<input type="radio" name="shipping" value="express" /> Express ($7.99)<br>
					
					<input type="submit" value="Continue" class="btn btn-large btn-success"><br>
				</form>
			</div><!-- shipping info -->
			<div class="col-sm-4">
				<h3>Cart Summary</h3>
				<p>Subtotal:     <?php echo sprintf('$%.2f', $subtotal); ?></p>
				<p>Total:        <?php echo sprintf('$%.2f', $subtotal); ?></p>
			</div><!--cart summary -->
		</div><!-- row -->
	</div><!-- page -->		
</main><!-- main -->

<?php include '../view/footer.php'; ?>