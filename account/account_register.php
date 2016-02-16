<?php include '../view/header.php'; ?>
<main>
	<h1>Register</h1>
	<form action="." method="post" id="register_form">
		<input type="hidden" name="action" value="register">
		
		<label>Email Address</label>
		<input type="text" name="email" 
			value="<?php echo htmlspecialchars($email);?>" size="30"><br>
			
		<label>Password:</label>
        <input type="password" name="password_1" size="30">
        <span class="error"><?php echo htmlspecialchars($password_message); ?></span><br>

        <label>Retype Password:</label>
        <input type="password" name="password_2" size="30"><br>

        <label>First Name:</label>
        <input type="text" name="first_name"
               value="<?php echo htmlspecialchars($first_name); ?>" 
               size="30"><br>

        <label>Last Name:</label>
        <input type="text" name="last_name"
               value="<?php echo htmlspecialchars($last_name); ?>"
               size="30"><br>

        <label>Address:</label>
        <input type="text" name="address"
               value="<?php echo htmlspecialchars($address); ?>"
               size="30"><br>

        <label>City:</label>
        <input type="text" name="city"
               value="<?php echo htmlspecialchars($city); ?>"
               size="30"><br>

        <label>State:</label>
        <input type="text" name="state"
               value="<?php echo htmlspecialchars($state); ?>"
               size="30"><br>

        <label>Zip Code:</label>
        <input type="text" name="zip"
               value="<?php echo htmlspecialchars($zip); ?>"
               size="30"><br>

        <label>&nbsp;</label>
		<input type="submit" value="Register" class="btn btn-lg btn-primary">
		<button type="button" class="btn btn-lg btn-warning">Clear</button>
	</form>
</main>
<?php include '../view/footer.php'; ?>