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
			<h1>View Order</h1>
			<div class="row">
				<div class="col-sm-3">
					<p>Date: <?php echo htmlspecialchars($order['Order_Date']); ?></p>
					<p>Shipping Address:</p>
					<p><?php echo htmlspecialchars($order['Shipping_Address']); ?></p>
					<p><?php echo htmlspecialchars($order['Shipping_City']); ?>, 
					<?php echo htmlspecialchars($order['Shipping_State']); ?>,
					<?php echo htmlspecialchars($order['Shipping_ZIP']); ?></p>
				</div><!-- order date and shipping info -->
				<div class="col-sm-9">
					<p>Order #: <?php echo htmlspecialchars($order['Order_ID']); ?></p>
				
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>Product</th>
								<th>Unit Price</th>
								<th>Quantity</th>
								<th>Total</th>
						</thead>
						<?php foreach($order_items as $item) :
							$product_id = $item['Product_ID'];
							$product = get_product($product_id);
							$name = $product['Name'];
							$price = $product['Price'];
							$quantity = $item['Quantity'];
							$total = $price * $quantity;
							$subtotal =+ $total;
						?>
						<tr>
							<td><?php echo htmlspecialchars($name); ?></td>
							<td><?php echo htmlspecialchars($price); ?></td>
							<td><?php echo htmlspecialchars($quantity); ?></td>
							<td><?php echo htmlspecialchars($total); ?></td>
						</tr>
						<?php endforeach; ?>
					<tr>
						<td colspan="3">Subtotal:</td>
						<td><?php echo sprintf('$%.2f', $subtotal); ?></td>
					</tr>					
					</table>
					<button type="button" class="btn btn btn-danger">Cancel Order</button>
					<button type="button" class="btn btn btn-warning">Return Order</button>
				</div><!-- order item details -->
			</div><!-- row end -->			
		</div><!-- main section -->
	</div><!-- row end -->
</main>

<?php include '../view/footer.php'; ?>