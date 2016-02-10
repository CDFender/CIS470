<?php include 'view/header.php'; ?>

<main>		
	<div class="page" id="featured">
		<div class="jumbotron">
		<h1>Welcome to our new site!</h1>
		<p class="lead">We are your #1 print and engraving job specialists for all your home, business, 
				and enthusiast needs. Sign up to our website today to order your personalized print or 
				engraving product, with rush shipping available.</p>
		<p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today!</a></p>
		</div><!-- jumbotron -->
		
		<div class="row">
			<?php foreach ($products as $product) :
			$price = $product['price'];
			$description = $product['description'];
			
			// Get first paragraph of description
			$description_with_tags = add_tags($description);
			$i = strpos($description_with_tags, "</p>");
			$first_paragraph = substr($description_with_tags, 3, $i - 3);
			?>		
		
			<article class="product col-sm-3">
				<img class="img-thumbnail" src="images/<?php echo htmlspecialchars($product['product_id']);?>.png" alt="Thumbnail">
				<h3><a href="catalog?product_id=<?php echo $product['product_id'];?>"><?php echo htmlspecialchars($product['product_id']);?></a></h3>
				<p><b>Price:</b>$<?php echo number_format($price, 2);?></p>
				<p><?php echo $first_paragraph;?></p>
			</article>
			<?php endforeach; ?>			
		</div><!-- row -->		
	</div><!-- featured -->
</main><!-- main -->

<?php include 'view/footer.php'; ?>