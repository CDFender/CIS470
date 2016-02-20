<?php include '../view/header.php'; ?>

<main>		
	<div class="page" id="featured">
		<div class="row">
			<h1>Billing & Shipping Address</h1>
			<div class="col-sm-8">
				<form action="." method="post" class="form-horizontal">
					<input type="hidden" name="action" value="payment">
					
					<div class="form-group">
						<label for="first_name" class="col-sm-2 control-label">First Name</label>						
						<div class="col-sm-5">
							<input class="form-control" type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>">						
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">						
						<label for="last_name" class="col-sm-2 control-label">Last Name</label>						
						<div class="col-sm-5">
							<input class="form-control" type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>">						
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">
						<label for="address" class="col-sm-2 control-label">Street Address</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="address" value="<?php echo htmlspecialchars($address); ?>">						
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">
						<label for="city" class="col-sm-2 control-label">City</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="city" value="<?php echo htmlspecialchars($city); ?>">						
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">
						<label for="state" class="col-sm-2 control-label">State</label>						
						<div class="col-sm-5">
							<input class="form-control" type="text" name="state" value="<?php echo htmlspecialchars($state); ?>">
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">
						<label for="zip" class="col-sm-2 control-label">Zip</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="zip" value="<?php echo htmlspecialchars($zip); ?>">
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">
						<label class="col-sm-offset-2 control-label">Shipping Method</label>
						<div class="radio">
							<label class="col-sm-offset-2">
							<input type="radio" name="shipping" value="free" checked="checked">
							Standard (Free)</label>
						</div>
						<div class="radio">
							<label class="col-sm-offset-2">
							<input type="radio" name="shipping" value="express">
							Express ($7.99)</label>
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">
						<input type="submit" value="Continue" class="col-sm-offset-2 btn btn-large btn-success">
					</div><!-- form group end -->
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