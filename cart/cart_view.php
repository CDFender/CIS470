<?php include '../view/header.php'; ?>

<main>
    <h1>Your Cart</h1>
    <?php if (cart_product_count() == 0) : ?>
        <p>There are no products in your cart.</p>
    <?php else: ?>
        <form action="." method="post">
            <table id="cart" class="table table-striped">
            <tr id="cart_header">
                <th>Product</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total</th>
				<th>Delete</th>
            </tr>
            <?php foreach ($cart as $product_id => $item) : ?>
            <tr>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td>
                    <?php echo sprintf('$%.2f', $item['price']); ?>
                </td>
                <td>
                    <input type="text" size="3"
                           name="items[<?php echo $product_id; ?>]"
                           value="<?php echo $item['quantity']; ?>">
                </td>
                <td>
                    <?php echo sprintf('$%.2f', $item['line_price']); ?>
                </td>
				<td><a href=".?action=remove&product_id=<?php echo $item['product_id'];?>" 
						class="btn btn-xs btn-danger" value="remove">Remove</a></td>
            </tr>
            <?php endforeach; ?>
			</table>
			<table class="table">
				<tr>
					<td colspan="4"><b>Subtotal</b></td>
					<td><?php echo sprintf('$%.2f', cart_subtotal()); ?> </td>
				</tr>
			</table>
        </form>
		
		<div class="row">
			<div class="col-sm-1">
				<a href="../checkout" class="btn btn-large btn-success">Checkout</a>
			</div><!-- checkout column -->
			<div class="col-sm-8">
			</div>
			<div class="col-sm-1">
				<a href=".?action=update" class="btn btn-large btn-primary" value="update">Update</a>
			</div><!-- update cart column -->
			<div class="col-sm-1">
				<a href=".?action=empty_cart" class="btn btn-large btn-warning" value="empty_cart">Empty Cart</a>     			
			</div><!-- empty cart column -->
			
			
		</div><!-- row end -->
        
    <?php endif; ?>
</main>

<?php include '../view/footer.php'; ?>