<?php
require_once('../util/main.php');

require_once('model/customer_db.php');
require_once('model/order_db.php');
require_once('model/product_db.php');

require_once('model/fields.php');
require_once('model/validate.php');

$action = filter_input(INPUT_POST, 'action');
if ($action !== NULL) {
	$action = filter_input(INPUT_GET, 'action');
	if ($action == NULL) {
		$action = 'view_login';
		if (isset($_SESSION['user'])) {
			$action = 'view_account';
		}
	}
}

// Set up all possible fields to validate
$validate = new Validate();
$fields = $validate->getFields();

// For the Registration page and other pages
$fields->addField('email', 'Must be a valid email.');
$fields->addField('password_1');
$fields->addField('password_2');
$fields->addField('first_name');
$fields->addField('last_name');
$fields->addField('street_address');
$fields->addField('city');
$fields->addField('state');
$fields->addField('zip_code');

// For the Login page
$fields->addField('password');

switch ($action) {
	case 'view_register':
		// Clear user data
		$email ='';
		$first_name = '';
		$last_name = '';
		$address = '';
		$city = '';
		$state = '';
		$zip = '';
		
		include 'account_register.php';
		break;
	case 'register':
		// Store user data in local variables
		$email = filter_input(INPUT_POST, 'email');
		$password_1 = filter_input(INPUT_POST, 'password_1');
		$password_2 = filter_input(INPUT_POST, 'password_2');
		$first_name = filter_input(INPUT_POST, 'first_name');
		$last_name = filter_input(INPUT_POST, 'last_name');
		$address = filter_input(INPUT_POST, 'street_address');
		$city = filter_input(INPUT_POST, 'city');
		$state = filter_input(INPUT_POST, 'state');
		$zip = filter_input(INPUT_POST, 'zip_code');
		
		// Validate user data
		$validate->email('email', $email);
        $validate->text('password_1', $password_1, true, 6, 30);
        $validate->text('password_2', $password_2, true, 6, 30);        
        $validate->text('first_name', $first_name);
        $validate->text('last_name', $last_name);
        $validate->text('ship_line1', $address);        
        $validate->text('ship_city', $city);        
        $validate->text('ship_state', $state);        
        $validate->text('ship_zip', $zip); 

		// If validation errors, redisplay Register page and exit controller
		if ($fields->hasErrors()) {
			include 'account/account_register.php';
			break;
		}
		
		// If passwords don't match, redisplay Register page and exit controller
		if ($password_1 !== $password_2) {
			$password_message = 'Passwords do not match.';
			include 'account/account_register.php';
			break;
		}
		
		// Validate the data for the customer
        if (is_valid_customer_email($email)) {
            display_error('The e-mail address ' . $email . ' is already in use.');
        }
        
		// NEEDS MORE WORK ONCE DAVID FINISHES SPROCS
        // Add the customer data to the database
        $customer_id = add_customer($email, $first_name,
                                    $last_name, $password_1);
									
		// Store user data in session
        $_SESSION['user'] = get_customer($customer_id);
        
        // Redirect to the Checkout application if necessary
        if (isset($_SESSION['checkout'])) {
            unset($_SESSION['checkout']);
            redirect('../checkout');
        } else {
            redirect('.');
        }        
        break;
	case 'view_login':
		// Clear login data
		$email = '';
		$password = '';
		$password_message = '';
		
		include 'login.php';
		break;
	case 'login':
		$email = filter_input(INPUT_POST, 'email');
		$password = filter_input(INPUT_POST, 'password');
		
		// Validate user data
		$validate->email('email', $email);
		$validate->text('password', $password, true, 6, 30);
		
		// If validation errors, redisplay Login page and exit controller
        if ($fields->hasErrors()) {
            include 'account/login.php';
            break;
        }
        
        // Check email and password in database
        if (is_valid_customer_login($email, $password)) {
            $_SESSION['user'] = get_customer_by_email($email);
        } else {
            $password_message = 'Login failed. Invalid email or password.';
            include 'account/login.php';
            break;
        }

        // If necessary, redirect to the Checkout app
        // Redirect to the Checkout application
        if (isset($_SESSION['checkout'])) {
            unset($_SESSION['checkout']);
            redirect('../checkout');
        } else {
            redirect('.');
        }        
        break;
}	case 'view_account':
		$first_name = $_SESSION['user']['first_name'];
		$last_name = $_SESSION['user']['last_name'];
		$street_address = $_SESSION['user']['address'];
		$city = $_SESSION['user']['city'];
		$zip = $_SESSION['user']['zip'];
        $email = $_SESSION['user']['email'];
		
        include 'account_view.php';
        break;
	case 'view_order':
		$first_name = $_SESSION['user']['first_name'];
		$orders = get_orders_by_customer_id($_SESSION['user']['customerID']);
        if (!isset($orders)) {
            $orders = array();
        }        
	
        $order = get_order($order_id);
        $order_date = strtotime($order['orderDate']);
        $order_date = date('M j, Y', $order_date);
        $order_items = get_order_items($order_id);
        
        include 'account_view_order.php';
        break;
    case 'update_account':
        // Get the customer data
        $customer_id = $_SESSION['user']['customerID'];
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $password_1 = filter_input(INPUT_POST, 'password_1');
        $password_2 = filter_input(INPUT_POST, 'password_2');
        $password_message = '';
		$address = filter_input(INPUT_POST, 'address');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');

        // Get the old data for the customer
        $old_customer = get_customer($customer_id);

        // Validate user data
        $validate->email('email', $email);
        $validate->text('password_1', $password_1, false, 6, 30);
        $validate->text('password_2', $password_2, false, 6, 30);        
        $validate->text('first_name', $first_name);
        $validate->text('last_name', $last_name);        
		$validate->text('address', $address);        
        $validate->text('city', $city);        
        $validate->text('state', $state);        
        $validate->text('zip', $zip);  
        
        // Check email change and display message if necessary
        if ($email != $old_customer['emailAddress']) {
            display_error('You can\'t change the email address for an account.');
        }

        // If validation errors, redisplay Login page and exit controller
        if ($fields->hasErrors()) {
            include 'account/account_edit.php';
            break;
        }
        
        // Only validate the passwords if they are NOT empty
        if (!empty($password_1) && !empty($password_2)) {            
            if ($password_1 !== $password_2) {
                $password_message = 'Passwords do not match.';
                include 'account/account_edit.php';
                break;
            }
        }

        // Update the customer data
        update_customer($customer_id, $email, $first_name, $last_name,
            $password_1, $password_2, $address, $city, $state, $zip);

        // Set the new customer data in the session
        $_SESSION['user'] = get_customer($customer_id);

        redirect('.');
        break;
	case 'view_status':
		$first_name = $_SESSION['user']['first_name'];
			$orders = get_orders_by_customer_id($_SESSION['user']['customerID']);
        if (!isset($orders)) {
            $orders = array();
        }        
	
        $order = get_order($order_id);
        $order_date = strtotime($order['orderDate']);
        $order_date = date('M j, Y', $order_date);
        $status = $order['status'];
        
        include 'account_view_order.php';
        break;
		
		break;
    case 'logout':
        unset($_SESSION['user']);
        redirect('..');
        break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}
?>