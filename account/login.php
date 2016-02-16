<?php include '../view/header.php'; ?>

<main>
	<div class="container">
		<form class="form-signin" method="post" id="login_form">
			<input type="hidden" name="action" value="login">
			
			<h2 class="form-signin-heading">Please sign in</h2>
			
			<label for="inputEmail" class="sr-only">Email address</label>
			<input name="email" type="text" id="inputEmail" class="form-control" placeholder="Email address" 
						value="<?php echo htmlspecialchars($email); ?>" autofocus><br>
			
			<label for="inputPassword" class="sr-only">Password</label>
			<input name="password" type="password" id="inputPassword" class="form-control" 
						placeholder="Password"></br>
			
			<div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div><!-- checkbox -->
			
			<input type="submit" value="Sign in" class="btn btn-lg btn-primary btn-block">
			<?php if (!empty($password_message)) : ?>
			<span class="error"><?php echo htmlspecialchars($password_message); ?></span><br>
			<?php endif; ?>			
			
			<a href="./?action=view_register" class="btn btn-lg btn-info btn-block">Register for a new account</a>
			<div class="">
				<label><a href="">Forgot password?</a></label>
			</div><!-- forgot password -->
		</form>
	</div><!-- container -->
</main>
<?php include '../view/footer.php'; ?>