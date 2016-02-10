<?php
    // Parse data
	$product_id = $product['product_id'];
	$media_type = $product['media_type'];
	$price = $product['price'];
	$description = $product['description'];
	$size = $product['size'];
	$stock_available = $product['stock_available'];
	
    // Add HMTL tags to the description
    $description_with_tags = add_tags($description);

    // Add format to price
    $unit_price_f = number_format($price, 2);

    // Get image URL and alternate text
    $image_filename = $product_id . '.png';
    $image_path = $app_path . 'images/' . $image_filename;
    $image_alt = 'Image filename: ' . $image_filename;
?>

<h1><?php echo htmlspecialchars($product_name); ?></h1>
<div class="row">
	<div class="col-sm-8">
		<img class="image" src="<?php echo $image_path; ?>"
				alt="<?php echo $image_alt; ?>" />
	</div><!-- left image -->
	<div class="col-sm-4">
		<p><b>Price:</b>
        <?php echo '$' . $price; ?></p>
		<form action="<?php echo $app_path . 'cart' ?>" method="get" 
			  id="add_to_cart_form">
			<input type="hidden" name="action" value="add" />
			<input type="hidden" name="product_id"
				   value="<?php echo $product_id; ?>" />
			<b>Size:</b>&nbsp;
			<input type="text" name="size" value="M" size="3" />
			<b>Quantity:</b>&nbsp;
			<input type="text" name="quantity" value="1" size="2" />
			<input type="submit" value="Add to Cart" />
		</form>
	</div><!-- right details -->	
    <h2>Description</h2>
    <?php echo $description_with_tags; ?>
</div>
