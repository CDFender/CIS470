<?php
// Create an empty cart if it doesn't exist
if (!isset($_SESSION['cart']) ) {
    $_SESSION['cart'] = array();
}

// Add an item to the cart
function cart_add_item($product_id, $quantity) {
    $_SESSION['cart'][$product_id] = round($quantity, 0);
}

// Update an item in the cart
function cart_update_item($product_id, $quantity) {
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = round($quantity, 0);
    }
}

// Remove an item from the cart
function cart_remove_item($product_id) {
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Get an array of items for the cart
function cart_get_items() {
    $items = array();
    foreach ($_SESSION['cart'] as $product_id => $quantity ) {
        // Get product data from db
        $product = get_product($product_id);
        $price = $product['Price'];
        $quantity = intval($quantity);

        // Calculate discount
        $unit_price = $price;
        $line_price = round($unit_price * $quantity, 2);

        // Store data in items array
        $items[$product_id]['name'] = $product['Name'];
        $items[$product_id]['description'] = $product['Description'];
        $items[$product_id]['price'] = $price;
        $items[$product_id]['quantity'] = $quantity;
        $items[$product_id]['line_price'] = $line_price;
    }
    return $items;
}

// Get the number of products in the cart
function cart_product_count() {
    return count($_SESSION['cart']);
}

// Get the number of items in the cart
function cart_item_count () {
    $count = 0;
    $cart = cart_get_items();
    foreach ($cart as $item) {
        $count += $item['quantity'];
    }
    return $count;
}

// Get the subtotal for the cart
function cart_subtotal () {
    $subtotal = 0;
    $cart = cart_get_items();
    foreach ($cart as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
    return $subtotal;
}

// Remove all items from the cart
function clear_cart() {
    $_SESSION['cart'] = array();
}

// Get the correct word for the number of items
function cart_get_item_word() {
    if (cart_product_count() == 1) {
        $item_word =  'Item';
    } else {
        $item_word =  'Items';
    }
    return $item_word;
}
?>