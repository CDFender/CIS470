<!DOCTYPE html>
<html lang="en">
<head>
	<title>Williams Specialty Company</title>
	<meta charset="utf-8">
	<meta name="description" content="WSC eCommerce Website for Engraving and Printing Jobs">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
		integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo $app_path ?>main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<header>			
		<div class="masthead">
			<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo $app_path;?>"><strong>Williams Specialty Company</strong></a>
				</div><!-- navbar header -->
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo $app_path . 'catalog?type=clothing'; ?>">Clothing</a></li>
						<li><a href="<?php echo $app_path . 'catalog?type=plaques'; ?>">Plaques</a></li>
						<li><a href="<?php echo $app_path . 'catalog?type=trophies'; ?>">Trophies</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
									aria-haspopup="true" area-expanded="false">Help<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo $app_path . 'help?action=contact';?>">Contact Us</a></li>
								<li><a href="<?php echo $app_path . 'account?action=view_order_history';?>">Order Status</a></li>
								<li><a href="<?php echo $app_path . 'account?action=view_order_history';?>">Returns</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
							// Check if user is logged in and display
							// appropriate account link
							$account_url = $app_path . 'account';
							$logout_url = $account_url . '?action=logout';
							if (isset($_SESSION['user'])) :
						?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
									aria-haspopup="true" area-expanded="false"> Hi, 
									<?php echo htmlspecialchars($_SESSION['user']['First_Name']);?>!<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo $account_url;?>">My Account</a></li>
								<li><a href="<?php echo $app_path . 'account?action=view_order_history';?>">My Orders</a></li>
								<li><a href="<?php echo $logout_url;?>">Logout</a></li>
							</ul>
						</li>
						<?php else: ?>
							<li><a href="<?php echo $account_url;?>">Login</a></li>
						<?php endif; ?>
						<li><a href="<?php echo $app_path . 'cart';?>"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;
								<?php if ($cart_items > 0) : ?>
									<span class="badge"><?php echo $cart_items; ?></span>
								<?php endif; ?>
						</a></li>
					</ul>				
				</div><!-- nav collapse -->
			</div><!-- container -->
			</nav>
		</div><!-- masthead -->	
	</header>
<div class="container">