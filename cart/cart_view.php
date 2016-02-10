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
                    <?php echo sprintf('$%.2f', $item['unit_price']); ?>
                </td>
                <td>
                    <input type="text" size="3"
                           name="items[<?php echo $product_id; ?>]"
                           value="<?php echo $item['quantity']; ?>">
                </td>
                <td>
                    <?php echo sprintf('$%.2f', $item['line_price']); ?>
                </td>
				<td><a href=".?action=delete&product_id=<?php echo $item['product_id'];?>" 
						class="btn btn-xs btn-warning" value="delete">Delete</a></td>
            </tr>
            <?php endforeach; ?>
			<tr>
				<td colspan="3"><b>Subtotal</b></td>
				<?php echo sprintf('$%.2f', cart_subtotal()); ?> 
			</tr>
            <tr>
                <td colspan="2"><a href=".?action=update" class="btn btn-xs btn-primary" value="update">
						Update</a></td>
				<td colspan="2"><a href=".?action=empty_cart" class="btn btn-xs btn-primary" value="empty_cart">
						Empty Cart</a></td>
            </tr>
            </table>			
        </form>
        
    <?php endif; ?>

    <p>Return to: <a href="../">Home</a></p>

    <!-- if cart has items, display the Checkout link -->
    <?php if (cart_product_count() > 0) : ?>
        <p>
            Proceed to: <a href="../checkout">Checkout</a>
        </p>
    <?php endif; ?>
</main>

<?php include '../view/footer.php'; ?>