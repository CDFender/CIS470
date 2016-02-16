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
			<h1>Order History</h1>
			<?php if (count($orders) > 0) : ?>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Date</th>
							<th>Order #</th>
							<th>Status</th>
							<th>Select</th>
						</tr>
					</thead>
					<?php foreach($orders as $order) : 
						$order_id = $order['Order_ID'];
						$order_date = strtotime($order['Order_Date']);
						$order_date = date('M j, Y', $order_date);
						$status = $order['Status'];
						?>
					
					<tr>
						<td><?php echo htmlspecialchars($order_date); ?></td>
						<td>#<?php echo htmlspecialchars($order_id); ?></td>
						<td><?php echo htmlspecialchars($status); ?></td>
						<td><a href="./?action=view_order&order_id=<?php echo htmlspecialchars($order_id); ?>"
								class="btn btn-lg btn-warning">View Order</td>
					</tr>
				
					<?php endforeach; ?>							
				</table>
			<?php else: ?>
			<p>There are no orders to show.</p>
			<?php endif; ?>
		</div><!-- main section -->
	</div><!-- row end -->
</main>

<?php include '../view/footer.php'; ?>