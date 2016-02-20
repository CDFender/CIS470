<?php
require_once '../util/main.php';

require_once '../model/cart.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {        
        $action = '';
    }
}

$cart_items = cart_item_count();

switch ($action) {
    case 'contact':
        include './contact.php';
        break;
    case 'about':
        include './about.php';
        break;
    case 'return':
        include './return_policy.php';
        break;
	case 'sitemap':
		include './sitemap.php';
		break;	
    default:
        add_error("Unknown cart action: " . $action);
        break;
}
?>