<?php include '../view/header.php'; ?>

<main>
	<h1><?php echo htmlspecialchars($type_name); ?></h1>
	<?php if (count($products) == 0) : ?>
		<p>There are no products of this type.</p>
	<?php else: ?>
		<div class="row">
			<ul>
			<?php foreach ($products as $product) :
			$price = $product['Price'];
			$description = $product['Description'];
			
			// Get first paragraph of description
			$description_with_tags = add_tags($description);
			$i = strpos($description_with_tags, "</p>");
			$first_paragraph = substr($description_with_tags, 3, $i - 3);
			?>		
		
			<li class="product col-sm-6 col-md-3">
				<img class="product_image_column" src="../images/<?php echo htmlspecialchars($product['Product_ID']);?>.jpg" 
						alt="Thumbnail">
				<h3 class="catalog_product"><a href="./?product_id=<?php echo $product['Product_ID'];?>">
						<?php echo htmlspecialchars($product['Name']);?></a></h3>
				<p><?php echo $first_paragraph;?></p>
				<p><b>Price: </b>$<?php echo number_format($price, 2);?></p>								
			</li>
			<?php endforeach; ?>			
			</ul>
		</div><!-- row -->		
	<?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>