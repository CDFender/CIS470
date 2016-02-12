<?php include '../view/header.php'; ?>

<main>
	<div class="container">
		<form class="form-signin" method="post" id="login_form">
			<h2 class="form-signin-heading">Please sign in</h2>
			<label for="inputEmail" class="sr-only">Email address</label>
			<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
			<?php echo $fields->getField('email')->getHTML(); ?><br>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
			<div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div><!-- checkbox -->
			<a href="./?action=login" class="btn btn-lg btn-primary btn-block">Sign in</a>
			<a href="./?action=view_register" class="btn btn-lg btn-info btn-block">Register for a new account</a>
			<div class="">
				<label><a href="">Forgot password?</a></label>
			</div><!-- forgot password -->
		</form>
	</div><!-- container -->
</main>
<?php include '../view/footer.php'; ?>