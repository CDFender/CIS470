<?php
require_once('../util/main.php');
require_once('../model/product_db.php');
require_once('../model/cart.php');

$type = filter_input(INPUT_GET, 'type');
$product_id = filter_input(INPUT_GET, 'product_id');

if ($type !== null) {
	$action = $type;
} elseif ($product_id !== null) {
	$action = 'product';
} else {
	$action = '';
}

$cart_items = cart_item_count();

switch ($action) {
	// Display the specified media type
	case 'clothing':
		$type_name = 'Clothing';
		$products = get_products_by_type($type_name);
		include('./type_view.php');
		break;	
	case 'plaques':
		$type_name = 'Plaques';
		$products = get_products_by_type($type_name);
		include('./type_view.php');
		break;	
	case 'trophies':
		$type_name = 'Trophies';
		$products = get_products_by_type($type_name);
		include('./type_view.php');
		break;	
	case 'product':
		// Get product data
		$product = get_product($product_id);
		
		// Display product
		include('./product_view.php');
		break;
	default:
		$error = 'Unknown catalog action: ' . $action;
		include('errors/error.php');
		break;
}
?>