<?php
require_once('../util/main.php');

require_once('../model/customer_db.php');
require_once('../model/order_db.php');
require_once('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
	$action = filter_input(INPUT_GET, 'action');
	if ($action == NULL) {
		$action = 'view_login';
		if (isset($_SESSION['user'])) {
			$action = 'view_account';
		}
	}
}

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
		
		include './account_register.php';
		break;
	case 'register':
		// Store user data in local variables
		$email = filter_input(INPUT_POST, 'email');
		$password_1 = filter_input(INPUT_POST, 'password_1');
		$password_2 = filter_input(INPUT_POST, 'password_2');
		$first_name = filter_input(INPUT_POST, 'first_name');
		$last_name = filter_input(INPUT_POST, 'last_name');
		$address = filter_input(INPUT_POST, 'address');
		$city = filter_input(INPUT_POST, 'city');
		$state = filter_input(INPUT_POST, 'state');
		$zip = filter_input(INPUT_POST, 'zip');
		
		// If passwords don't match, redisplay Register page and exit controller
		if ($password_1 !== $password_2) {
			$password_message = 'Passwords do not match.';
			include './account_register.php';
			break;
		}
		
		// Validate the data for the customer
        if (is_valid_customer_email($email)) {
            display_error('The e-mail address ' . $email . ' is already in use.');
        }      
				
        // Add the customer data to the database
		$customer_id = add_customer($first_name, $last_name, $email, $password_1, 
									$address, $city, $state, $zip);
									
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
		
		include './login.php';
		break;
	case 'login':
		$email = filter_input(INPUT_POST, 'email');
		$password = filter_input(INPUT_POST, 'password');
		   
        // Check email and password in database
        if (is_valid_customer_login($email, $password)) {
            $_SESSION['user'] = get_customer_by_email($email);
        } else {
            $password_message = 'Login failed. Invalid email or password.';
            include './login.php';
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
	case 'view_account':
		$first_name = $_SESSION['user']['First_Name'];
		$last_name = $_SESSION['user']['Last_Name'];
		$address = $_SESSION['user']['Address'];
		$city = $_SESSION['user']['City'];
		$state = $_SESSION['user']['State'];
		$zip = $_SESSION['user']['ZIP'];
        $email = $_SESSION['user']['Email'];
		
        include './account_view.php';
        break;
	case 'view_order_history':
		$first_name = $_SESSION['user']['First_Name'];
		$user_id = $_SESSION['user']['User_ID'];		
		$orders = get_orders_by_customer_id($user_id);
		
        if (!isset($orders)) {
            $orders = array();
        }   
		
		include './account_order_history.php';
		break;
	case 'view_order':
		$first_name = $_SESSION['user']['First_Name'];
		$order_id = filter_input(INPUT_GET, 'order_id');
		if ($order_id == NULL) {
			$order_id = filter_input(INPUT_POST, 'order_id', FILTER_VALIDATE_INT);
		}
		
        $order = get_order($order_id);
        $order_date = strtotime($order['orderDate']);
        $order_date = date('M j, Y', $order_date);
        $order_items = get_order_items($order_id);
		
        include './account_order_view.php';
        break;
    case 'update_account':
        // Get the customer data
        $customer_id = $_SESSION['user']['User_ID'];
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
		$address = filter_input(INPUT_POST, 'address');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
		$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
		$password_1 = filter_input(INPUT_POST, 'password_1');
        $password_2 = filter_input(INPUT_POST, 'password_2');
        $password_message = '';

        // Get the old data for the customer
        $old_customer = get_customer($customer_id);

        // Check email change and display message if necessary
        if ($email != $old_customer['emailAddress']) {
            display_error('You can\'t change the email address for an account.');
        }

        // Only validate the passwords if they are NOT empty
        if (!empty($password_1) && !empty($password_2)) {            
            if ($password_1 !== $password_2) {
                $password_message = 'Passwords do not match.';
                include '.';
                break;
            }
        }

        // Update the customer data
        update_customer($customer_id, $first_name, $last_name,
            $password_1, $password_2, $address, $city, $state, $zip);

        // Set the new customer data in the session
        $_SESSION['user'] = get_customer($customer_id);

        redirect('.');
        break;
	case 'view_status':
		$first_name = $_SESSION['user']['First_Name'];
		$orders = get_orders_by_customer_id($_SESSION['user']['User_ID']);
        if (!isset($orders)) {
            $orders = array();
        }        
	
        $order = get_order($order_id);
        $order_date = strtotime($order['Order_Date']);
        $order_date = date('M j, Y', $order_date);
        $status = $order['status'];
        
        include './account_order_status.php';
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