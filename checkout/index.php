<?php
require_once('../util/main.php');
require_once('../util/validation.php');

require_once('../model/cart.php');
require_once('../model/product_db.php');
require_once('../model/order_db.php');
require_once('../model/customer_db.php');

$cart_items = cart_item_count();

if (!isset($_SESSION['user'])) {
    $_SESSION['checkout'] = true;
    redirect('../account');
    exit();
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {        
        $action = 'address';
    }
}

switch ($action) {
	case 'address':
		$cart = cart_get_items();
		if (cart_product_count() == 0) {
			redirect('../cart');
		}
		
		$first_name = $_SESSION['user']['First_Name'];
		$last_name = $_SESSION['user']['Last_Name'];
		$address = $_SESSION['user']['Address'];
		$city = $_SESSION['user']['City'];
		$state = $_SESSION['user']['State'];
		$zip = $_SESSION['user']['ZIP'];
		
		$subtotal = cart_subtotal();
	
		include './checkout_address.php';
		break;
    case 'payment':
        if (cart_product_count() == 0) {
            redirect('../cart');
        }
		
		$billing_address = filter_input(INPUT_POST, 'address');
		$billing_city = filter_input(INPUT_POST, 'city');
		$billing_state = filter_input(INPUT_POST, 'state');
		$billing_zip = filter_input(INPUT_POST, 'zip');
		
		$shipping_address = $billing_address;
		$shipping_city = $billing_city;
		$shipping_state = $billing_state;
		$shipping_zip = $billing_zip;
		
		// Create and set values for Billing array in SESSION
		if (!isset($_SESSION['billing'])) {
			$_SESSION['billing'] = array();
		}
		
		$_SESSION['billing']['billing_address'] = $billing_address;
		$_SESSION['billing']['billing_city'] = $billing_city;
		$_SESSION['billing']['billing_state'] = $billing_state;
		$_SESSION['billing']['billing_zip'] = $billing_zip;
		
		// Create and set values for Shipping array in SESSION
		if (!isset($_SESSION['shipping'])) {
			$_SESSION['shipping'] = array();
		}
		
		$_SESSION['shipping']['shipping_address'] = $shipping_address;
		$_SESSION['shipping']['shipping_city'] = $shipping_city;
		$_SESSION['shipping']['shipping_state'] = $shipping_state;
		$_SESSION['shipping']['shipping_zip'] = $shipping_zip;
		
        $card_number = '';
        $card_cvv = '';
        $card_expires = '';
        
        $cc_number_message = '';
        $cc_ccv_message = '';
        $cc_expiration_message = '';
		
		$subtotal = cart_subtotal();
		
		$shipping_type = filter_input(INPUT_POST, 'shipping');
		if ($shipping_type == 'free') {
			$shipping = 0;
		} else {
			$shipping = 7.99;
		}
		
		$_SESSION['shipping']['shipping_type'] = $shipping_type;
		$_SESSION['shipping']['shipping'] = $shipping;
       
        include './checkout_payment.php';
        break;
    case 'process':
        if (cart_product_count() == 0) {
            redirect('../cart');
        }
		
        $cart = cart_get_items();
        $card_type = filter_input(INPUT_POST, 'card_type', FILTER_VALIDATE_INT);
        $card_number = filter_input(INPUT_POST, 'card_number');
        $card_cvv = filter_input(INPUT_POST, 'card_cvv');
        $card_expires = filter_input(INPUT_POST, 'card_expires');


        // Validate card data
        if ($card_type === false) {
            display_error('Card type is required.');
        } elseif (!is_valid_card_type($card_type)) {
            display_error('Card type ' . $card_type . ' is invalid.');
        }
        
        $cc_number_message = '';
        if ($card_number == null) {
            $cc_number_message = 'Required.';
        } elseif (!is_valid_card_number($card_number, $card_type)) {
            $cc_number_message = 'Invalid.';
        }
        
        $cc_ccv_message = '';
        if ($card_cvv == null) {
            $cc_ccv_message = 'Required.';
        } elseif (!is_valid_card_cvv($card_cvv, $card_type)) {
            $cc_ccv_message = 'Invalid.';
        }
        
        $cc_expiration_message = '';        
        if ($card_expires == null) {
            $cc_expiration_message = 'Required.';
        } elseif (!is_valid_card_expires($card_expires)) {
            $cc_expiration_message = 'Invalid.';
        }

        // If error messages are not empty, 
        // redisplay Checkout page and exit controller
        if (!empty($cc_number_message) || !empty($cc_ccv_message) ||
                !empty($cc_expiration_message)) {
            include './checkout_payment.php';
            break;
        }
		
		$credit_card = '';

		switch ($card_type) {
			case '1': 
				$credit_card = 'Mastercard';
				break;
			case '2':
				$credit_card = 'Visa';
				break;
			case '3':
				$credit_card = 'Discover';
				break;
			case '4':
				$credit_card = 'American Express';
				break;
			default:
				break;
		}
		
		$billing_address = $_SESSION['billing']['billing_address'];
		$billing_city = $_SESSION['billing']['billing_city'];
		$billing_state = $_SESSION['billing']['billing_state'];
		$billing_zip = $_SESSION['billing']['billing_zip'];
		
		$shipping_address = $_SESSION['shipping']['shipping_address'];
		$shipping_city = $_SESSION['shipping']['shipping_city'];
		$shipping_state = $_SESSION['shipping']['shipping_state'];
		$shipping_zip = $_SESSION['shipping']['shipping_zip'];
		$shipping_type = $_SESSION['shipping']['shipping_type'];
		$shipping = $_SESSION['shipping']['shipping'];
		
		$customer_id = $_SESSION['user']['User_ID'];
		
		// Add Order Here
		$billing_id = add_billing($credit_card, $card_number, $billing_address,
				$billing_city, $billing_state, $billing_zip, $customer_id);
							  
		$order_id = add_order($customer_id, $billing_id, $shipping_type, $shipping, 
				$shipping_address, $shipping_city, $shipping_state, $shipping_zip);

        foreach($cart as $product_id => $item) {
            $item_price = $item['price'];
            $quantity = $item['quantity'];
			$inscription = $item['inscription'];
			if (empty($inscription)) {
				$inscription = 'Cool story, bro!';
			}
            add_production_item($order_id, $product_id,
                           $item_price, $quantity, $inscription);
        }
		
		$_SESSION['user']['order_id'] = $order_id;
		
        clear_cart();
        redirect('./?action=confirm');
        break;
    case 'confirm':
        $order_id = $_SESSION['user']['order_id'];
		redirect('../account?action=view_order&order_id=' . $order_id);
        break;
	case 'cancel':
		redirect('../cart');
		break;
    default:
        display_error('Unknown cart action: ' . $action);
        break;
}
?>
