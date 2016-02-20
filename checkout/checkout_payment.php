<?php include '../view/header.php'; ?>

<main>		
	<div class="page" id="featured">
		<div class="row">
			<h1>Payment Information</h1>
			<div class="col-sm-8">
				<form action="." method="post" id="payment_form" class="form-horizontal">				
					<input type="hidden" name="action" value="process">
					
					<div class="form-group">
						<label for="card_type" class="col-sm-2 control-label">Card Type:</label>
						<div class="col-sm-5">
							<select class="form-control" name="card_type">
								<option value="1">MasterCard</option>
								<option value="2">Visa</option>
								<option value="3">Discover</option>
								<option value="4">American Express</option>
							</select>
						</div>
					</div><!-- form group end -->
					
					<div class="form-group">
						<label for="card_number" class="col-sm-2 control-label">Card Number:</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="card_number" 
									value="<?php echo htmlspecialchars($card_number); ?>">
							<span class="error"><?php echo $cc_number_message; ?></span>
							<span>No dashes or spaces.</span>
						</div>
					</div><!-- form group end -->

					<div class="form-group">
						<label for="card_cvv" class="col-sm-2 control-label">CVV:</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="card_cvv" 
									value="<?php echo htmlspecialchars($card_cvv); ?>">
							<span class="error"><?php echo $cc_ccv_message; ?></span>
						</div>
					</div><!-- form group end -->

					<div class="form-group">
						<label for="card_expires" class="col-sm-2 control-label">Expiration:</label>
						<div class="col-sm-2">
							<input class="form-control" type="text" name="card_expires" 
									value="<?php echo htmlspecialchars($card_expires); ?>">
							<span class="error"><?php echo $cc_expiration_message; ?></span>
							<span>MM/YYYY</span>
						</div>
					</div><!-- form group end -->

					<div class="form-group">
						<input type="submit" value="Place Order" class="col-sm-offset-2 btn btn-large btn-success">
					</div><!-- form group end -->
				</form>
				
				<form action="." method="post" class="form-horizontal">
					<input type="hidden" name="action" value="cancel">
					<div class="form-group">
						<input type="submit" value="Cancel Order" class="col-sm-offset-2 btn btn-large btn-danger">
					</div><!-- form group end -->
				</form>
			</div><!-- shipping info -->
			
			<div class="col-sm-4">
				<h3>Cart Summary</h3>
				<p>Subtotal:     <?php echo sprintf('$%.2f', $subtotal); ?></p>
				<p>Shipping:     <?php echo sprintf('$%.2f', $shipping); ?></p>
				<p>Total:        <?php $total = $subtotal + $shipping; 
									echo sprintf('$%.2f', $total); ?></p>
			</div><!--cart summary -->
		</div><!-- row -->
	</div><!-- page -->		
</main><!-- main -->

<?php include '../view/footer.php'; ?>