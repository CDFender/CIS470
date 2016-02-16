<?php include 'view/header.php'; ?>

<main>		
	<div class="page" id="featured">
		<div class="jumbotron">
		<h1>Welcome to our new site!</h1>
		<p class="lead">We are your #1 print and engraving job specialists for all your home, business, 
				and enthusiast needs. Sign up to our website today to order your personalized print or 
				engraving product, with rush shipping available.</p>
		<p><a class="btn btn-lg btn-success" href="<?php echo $app_path . 'account?action=view_register'; ?>" role="button">Sign up today!</a></p>
		</div><!-- jumbotron -->
		
		<h1>Featured Products</h1>
		
		<div class="row">
			<?php foreach ($products as $product) :
			$price = $product['Price'];
			$description = $product['Description'];
			
			// Get first paragraph of description
			$description_with_tags = add_tags($description);
			$i = strpos($description_with_tags, "</p>");
			$first_paragraph = substr($description_with_tags, 3, $i - 3);
			?>		
		
			<article class="product col-sm-3">
				<img class="product_image_column" src="images/<?php echo htmlspecialchars($product['Product_ID']);?>.jpg" alt="Thumbnail">
				<h3><a href="catalog?product_id=<?php echo $product['Product_ID'];?>"><?php echo htmlspecialchars($product['Name']);?></a></h3>
				<p><b>Price: </b>$<?php echo number_format($price, 2);?></p>
				<p><?php echo $first_paragraph;?></p>
			</article>
			<?php endforeach; ?>			
		</div><!-- row -->	
	</div><!-- featured -->		
</main><!-- main -->

<?php include 'view/footer.php'; ?>