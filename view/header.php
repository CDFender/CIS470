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
<div class="container">
	<header>			
		<div class="masthead">
			<h3 class="text-muted"><a href="#"><strong>Williams Specialty Company</strong></a></h3>
			<nav>
				<ul class="nav nav-justified">
					<li><a href="<?php echo $app_path . 'catalog?type=clothing'; ?>">Clothing</a></li>
					<li><a href="<?php echo $app_path . 'catalog?type=plaques'; ?>">Clothing</a></li>
					<li><a href="<?php echo $app_path . 'catalog?type=trophies'; ?>">Plaques</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" area-expanded="false">Help<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $app_path . 'help?action=contact';?>">Contact Us</a></li>
							<li><a href="<?php echo $app_path . 'account?action=view_order';?>">Order Status</a></li>
							<li><a href="<?php echo $app_path . 'account?action=view_order';?>">Returns</a></li>
						</ul>
					</li>
					<li><a href="<?php echo $app_path . 'account';?>">Login</a></li>
					<li><a href="<?php echo $app_path . 'cart';?>"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
				</ul>
			</nav>
		</div><!-- masthead -->	
	</header>