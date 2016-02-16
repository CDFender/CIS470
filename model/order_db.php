<?php

function add_billing($credit_card, $card_number, $billing_address, $billing_city, 
			$billing_state, $billing_zip, $customer_id) {
	global $db;	
	$query = '
		INSERT INTO Billing_Info (Account_Type, Account_Number, 
				Account_Address, Account_City, Account_State, Account_ZIP, User_ID)
		VALUES (:credit_card, :card_number, :address, :city, :state, :zip, :user_id)';
	$statement = $db->prepare($query);
	$statement->bindValue(':credit_card', $credit_card);
	$statement->bindValue(':card_number', $card_number);
	$statement->bindValue(':address', $billing_address);
	$statement->bindValue(':city', $billing_city);
	$statement->bindValue(':state', $billing_state);
	$statement->bindValue(':zip', $billing_zip);
	$statement->bindValue(':user_id', $customer_id);	
	$statement->execute();
	$billing_id = $db->lastInsertId();
    $statement->closeCursor();
    return $billing_id;
}

function add_order($customer_id, $billing_id, $shipping_type, $shipping, $shipping_address, 
			$shipping_city, $shipping_state, $shipping_zip) {
	global $db;	
	$query = '
		INSERT INTO `Order`(`User_ID`, `Billing_ID`, `Last_Modified_By`, `Completion_Date`, `Delivery_Method`,
				`Delivery_Charge`, `Shipping_Address`, `Shipping_City`, `Shipping_State`, `Shipping_ZIP`,  
				`Shipped`) 
		VALUES (:user_id, :billing_id, NULL, NULL, :delivery_method, :delivery_charge, :address, :city, 
				:state, :zip, 0)';	
	$statement = $db->prepare($query);
	$statement->bindValue(':user_id', $customer_id);
	$statement->bindValue(':billing_id', $billing_id);
	$statement->bindValue(':delivery_method', $shipping_type);
	$statement->bindValue(':delivery_charge', $shipping);
	$statement->bindValue(':address', $shipping_address);
	$statement->bindValue(':city', $shipping_city);
	$statement->bindValue(':state', $shipping_state);
	$statement->bindValue(':zip', $shipping_zip);
	$statement->execute();
	$order_id = $db->lastInsertId();
	$statement->closeCursor();
	return $order_id;	
}

function add_production_item($order_id, $product_id,
                        $item_price, $quantity, $inscription) {
    global $db;
	$query = '
		INSERT INTO Production_Order (Order_ID, Product_ID, Quantity, Item_Price,
				Inscription)
		VALUES (:order_id, :product_id, :quantity, :item_price, :inscription)';
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id', $order_id);
    $statement->bindValue(':product_id', $product_id);
    $statement->bindValue(':item_price', $item_price);
    $statement->bindValue(':quantity', $quantity);
	$statement->bindValue(':inscription', $inscription);
    $statement->execute();
    $statement->closeCursor();
}

function get_order($order_id) {
    global $db;
    $query = 'SELECT * FROM `Order` WHERE `Order_ID` = :order_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id', $order_id);
    $statement->execute();
    $order = $statement->fetch();
    $statement->closeCursor();
    return $order;
}

function get_order_items($order_id) {
    global $db;
	$query = 'SELECT * FROM `Production_Order` WHERE `Order_ID` = :order_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id', $order_id);
    $statement->execute();
    $order_items = $statement->fetchAll();
    $statement->closeCursor();
    return $order_items;
}

function get_orders_by_customer_id($user_id) {
    global $db;
	$query = 'SELECT * FROM `Order` WHERE `User_ID` = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $orders = $statement->fetchAll();
    return $orders;
}
?>