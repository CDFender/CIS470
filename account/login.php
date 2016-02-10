<?php include '../view/header.php'; ?>

<main>
	<div class="page">
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
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Register for a new account</button>
			<div class="">
				<label><a href="">Forgot password?</a></label>
			</div><!-- forgot password -->
		</form>
	</div><!-- page -->
</main>
<?php include '../view/footer.php'; ?>