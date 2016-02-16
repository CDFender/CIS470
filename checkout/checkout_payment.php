<?php include '../view/header.php'; ?>

<main>		
	<div class="page" id="featured">
		<div class="row">
			<h1>Payment Information</h1>
			<div class="col-sm-8">
				<form action="." method="post" id="payment_form">				
					<input type="hidden" name="action" value="process">
					<label>Card Type:</label>
					<select name="card_type">
						<option value="1">MasterCard</option>
						<option value="2">Visa</option>
						<option value="3">Discover</option>
						<option value="4">American Express</option>
					</select>
					<br>

					<label>Card Number:</label>
					<input type="text" name="card_number" 
						   value="<?php echo htmlspecialchars($card_number); ?>">
					<span class="error"><?php echo $cc_number_message; ?></span>
					<span>No dashes or spaces.</span>
					<br>

					<label>CVV:</label>
					<input type="text" name="card_cvv" 
						   value="<?php echo htmlspecialchars($card_cvv); ?>">
					<span class="error"><?php echo $cc_ccv_message; ?></span>
					<br>

					<label>Expiration:</label>
					<input type="text" name="card_expires" 
						   value="<?php echo htmlspecialchars($card_expires); ?>">
					<span class="error"><?php echo $cc_expiration_message; ?></span>
					<span>MM/YYYY</span>
					<br>

					<label>&nbsp;</label>
					<input type="submit" value="Place Order" class="btn btn-large btn-success">
				</form>
				<form action="." method="post">
					<input type="hidden" name="action" value="cancel">
					<input type="submit" value="Cancel Order" class="btn btn-large btn-danger">
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