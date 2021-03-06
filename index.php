<?php
require_once('util/main.php');
require_once('model/product_db.php');
require_once('model/cart.php');

// Set featured product IDs in an array
$product_ids = array(1, 5, 12, 20);

// Get an array of featured products from the database
$products = array();
foreach ($product_ids as $product_id) {
	$product = get_product($product_id);
	$products[] = $product; // add product to array
}

$cart_items = cart_item_count();

// Display the home page
include('home_view.php');
?>