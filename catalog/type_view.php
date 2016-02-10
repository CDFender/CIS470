<?php include '../view/header.php'; ?>

<main>
	<h1><?php echo htmlspecialchars($type_name); ?></h1>
	<?php if (count($products) == 0) : ?>
		<p>There are no products of this type.</p>
	<?php else: ?>
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
				<img class="thumbnail" src="images/<?php echo htmlspecialchars($product['product_id']);?>.png" 
						alt="Thumbnail">
				<h3><a href="catalog?product_id=<?php echo $product['product_id'];?>">
						<?php echo htmlspecialchars($product['product_id']);?></a></h3>
				<p><b>Price:</b>$<?php echo number_format($price, 2);?></p>
				<p><?php echo $first_paragraph;?></p>
			</article>
			<?php endforeach; ?>			
		</div><!-- row -->		
	<?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>