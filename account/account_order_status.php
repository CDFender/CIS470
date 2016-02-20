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
			<h1>Order Status</h1>
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
					<p>Status: <?php echo htmlspecialchars($order['Status']); ?></p>
					<button type="button" class="btn btn btn-info">Order Status</button>
					<button type="button" class="btn btn btn-danger">Cancel Order</button>
					<button type="button" class="btn btn btn-warning">Return Order</button>
				</div><!-- order item details -->
			</div><!-- row end -->			
		</div><!-- main section -->
</main>
<?php include '../view/header.php'; ?>