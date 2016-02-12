<?php
    // Parse data
	$product_id = $product['Product_ID'];
	$name = $product['Name'];
	$media_type = $product['Media_Type'];
	$price = $product['Price'];
	$description = $product['Description'];
	$size = $product['Size'];
	
    // Add HMTL tags to the description
    $description_with_tags = add_tags($description);

    // Add format to price
    $unit_price_f = number_format($price, 2);

    // Get image URL and alternate text
    $image_filename = $product_id . '.jpg';
    $image_path = $app_path . 'images/' . $image_filename;
?>

<h1><?php echo htmlspecialchars($name); ?></h1>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-6">
		<img class="image" src="<?php echo $image_path; ?>"
				alt="<?php echo $image_alt; ?>" />
	</div><!-- left image -->
	<div class="col-sm-5">
		<p><b>Price: </b>
        <?php echo '$' . $unit_price_f; ?></p>
		<form action="<?php echo $app_path . 'cart' ?>" method="get" 
			  id="add_to_cart_form">
			<input type="hidden" name="action" value="add" />
			<input type="hidden" name="product_id"
				   value="<?php echo $product_id; ?>" />
			<p><b>Size:</b>
			<input type="text" name="size" value="M" size="3" /></p>
			<p><b>Quantity:</b>&nbsp;
			<input type="text" name="quantity" value="1" size="2" /></p>
			<p><input type="submit" value="Add to Cart" /><p>
		</form>
	</div><!-- right details -->	
	<h2>Description</h2>
	<?php echo $description_with_tags; ?>
</div><!-- row end -->
