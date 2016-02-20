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

<h1>Product Details</h1>
<div class="row">
	<div class="col-sm-offset-1 col-sm-5">
		<img class="image" src="<?php echo $image_path; ?>"
				alt="<?php echo $image_alt; ?>">
	</div><!-- image on left -->
	<div class="col-sm-5">
		<form action="<?php echo $app_path . 'cart' ?>" method="get" 
					id="add_to_cart_form" class="form-horizontal">
			<input type="hidden" name="action" value="add">
			<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
			
			<div class="form-group">
				<h2><?php echo htmlspecialchars($name); ?></h2>
			</div><!-- form group end -->
				   
			<div class="form-group">
				<label for="price" class="col-sm-2">Price</label>
				<div class="col-sm-10">
					<?php echo '$' . $unit_price_f; ?>
				</div>
			</div><!-- form group end -->
			
			<div class="form-group">
				<label for="size" class="col-sm-2">Size: </label>
				<div class="col-sm-10">
					<input type="text" name="size" value="M" size="2">
				</div>
			</div><!-- form group end -->
				
			<div class="form-group">
				<label for="quantity" class="col-md-2">Quantity</label>
				<div class="col-md-10">
					<input type="text" name="quantity" value="1" size="2">
				</div>
			</div><!-- form group end -->
			
			<div class="form-group">
				<label for="inscription" class="col-lg-2">Inscription</label>
				<div class="col-lg-10">
					<textarea class="form-control" rows="4" cols="25" name="inscription" 
							maxlength="150" value="Enter inscription here"></textarea>
				</div>
			</div><!-- form group end -->
			
			<div class="form-group">			
				<input type="submit" value="Add to Cart" class="btn btn-primary">
			</div><!-- form group end -->
			
			<div class="form-group">
				<h3>Description</h3>
				<?php echo $description_with_tags; ?>
			</div><!-- form group end -->
		</form>
	</div><!-- product details on right -->		
</div><!-- row end -->
