<?php include '../view/header.php'; ?>
<main>
	<div class="row">
		<div class="col-sm-4">
			<p>Hi, <?php echo htmlspecialchars($first_name);?></p>
			<ul>
				<li><a href="<?php echo $app_path . 'catalog?action=view_account'?>">Personal Details</a></li>
				<li><a href="<?php echo $app_path . 'catalog?action=view_order'?>">Order History</a></li>
				<li><a href="<?php echo $app_path . 'catalog?action=view_status'?>">Order Status</a></li>
			</ul>
		</div><!-- links -->
		<div class="col-sm-8">
			<h1>Order History</h1>
			<?php if (count($orders) > 0) : ?>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Date</th>
							<th>Order #</th>
						</tr>
					</thead>
					<?php foreach($orders as $order) : 
						$order_id = $order['order_id'];
						$order_date = strtotime($order['order_date']);
						$order_date = date('M j, Y', $order_date);
						?>
					
					<tr>
						<td><?php echo $order_date; ?>
						<td>#<?php echo $order_id; ?>
					</tr>
				
					<?php endforeach; ?>							
				</table>
			<?php else: ?>
			<p>There are no orders to show.</p>
			<?php endif; ?>
			
			<h2>Your Order</h2>
			<div class="row">
				<div class="col-sm-6">
					<p>Date: <?php echo htmlspecialchars($order['order_date']); ?></p>
				</div><!-- order date -->
				<div class="col-sm-6">
					<p>Order #: <?php echo htmlspecialchars($order['order_id']); ?></p>
				<div><!-- order number -->
				<p>Shipping Address:</p>
				<p><?php echo htmlspecialchars($order['shipping_address']); ?></p>
				<p><?php echo htmlspecialchars($order['shipping_state']); ?></p>
				<p><?php echo htmlspecialchars($order['shipping_zip']); ?></p>				
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>Product</th>
							<th>Unit Price</th>
							<th>Quantity</th>
							<th>Total</th>
					</thead>
					<?php foreach($order_items as $item) :
						$product_id = $item['product_id'];
						$product = get_product($productid);
						$name = $product['product_name'];
						$price = $product['price'];
						$quantity = $item['quantity'];
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
				<button type="button" class="btn btn-lg btn-info">Order Status</button>
				<button type="button" class="btn btn-lg btn-danger">Cancel Order</button>
				<button type="button" class="btn btn-lg btn-warning">Return Order</button>
			</div>			
		</div><!-- main section -->
</main>
<?php include '../view/footer.php'; ?>