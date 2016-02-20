<?php include '../view/header.php'; ?>

<main>
    <h1>Your Cart</h1>
    <?php if (cart_product_count() == 0) : ?>
        <p>There are no products in your cart.</p>
    <?php else: ?>		
        <form action="." method="post">
			<input type="hidden" name="action" value="update">
			
            <table id="cart" class="table table-striped">
            <tr id="cart_header">
                <th>Product</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total</th>
				<th>Inscription</th>
				<th>Delete</th>
            </tr>
            <?php foreach ($cart as $product_id => $item) : ?>
            <tr>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
				<td>
					<input type="text" value="<?php echo htmlspecialchars($item['inscription']);?>"
							maxlength="50" readonly>
				</td>
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
				<td><a href="./?action=remove&product_id=<?php echo $product_id;?>" 
						class="btn btn-xs btn-danger">Remove</a></td>
            </tr>
            <?php endforeach; ?>
				<tr>
					<td colspan="4"><b>Subtotal</b></td>
					<td><?php echo sprintf('$%.2f', cart_subtotal()); ?> </td>
				</tr>
			</table>
			
			<div class="form-group">
				<div class="col-sm-2">
					<a href="../checkout" class="btn btn-large btn-success">Checkout</a>
				</div><!-- checkout column -->
				<div class="col-sm-offset-6 col-sm-2">
					<input type="submit" value="Update Cart" class="btn btn-large btn-primary">
				</div><!-- update cart column -->
				<div class="col-sm-2">
					<a href=".?action=empty_cart" class="btn btn-large btn-warning" value="empty_cart">Empty Cart</a>     			
				</div><!-- empty cart column -->	
				</div><!-- form group end -->
        </form>
    <?php endif; ?>
</main>

<?php include '../view/footer.php'; ?>