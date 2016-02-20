<?php include '../view/header.php'; ?>

<main>
	<div class="container">
		<form class="form-signin" method="post" id="login_form">
			<input type="hidden" name="action" value="login">
			
			<h2 class="form-signin-heading">Please sign in</h2>
			
			<label for="inputEmail" class="sr-only">Email address</label>
			<input name="email" type="text" id="inputEmail" class="form-control" placeholder="Email address" 
						value="<?php echo htmlspecialchars($email); ?>" autofocus>
			
			<label for="inputPassword" class="sr-only">Password</label>
			<input name="password" type="password" id="inputPassword" class="form-control" 
						placeholder="Password">
			
			<div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div><!-- checkbox --><br>
			
			<?php if (!empty($password_message)) : ?>
			<div class="alert alert-danger" role="alert">
				<span class="error"><?php echo htmlspecialchars($password_message); ?></span>
			</div>
			<?php endif; ?>
			
			<input type="submit" value="Sign in" class="btn btn-lg btn-primary btn-block">			
			<a href="./?action=view_register" class="btn btn-lg btn-info btn-block">Register for a new account</a>
			<div class="">
				<label><a href="">Forgot password?</a></label>
			</div><!-- forgot password -->
		</form>
	</div><!-- container -->
</main>
<?php include '../view/footer.php'; ?>