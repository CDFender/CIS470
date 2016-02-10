<?php include '../view/header.php'; ?>
<main>
	<h1>Register</h1>
	<form action="." method="post" id="register_form">
		<input type="hidden" name="action" value="register">
		
		<label>Email Address</label>
		<input type="text" name="email" 
			value="<?php echo htmlspecialchars($email);?>" size="30">
		<?php echo $fields->getField('email')->getHTML(); ?><br>
			
		 <label>Password:</label>
        <input type="password" name="password_1" size="30">
        <?php echo $fields->getField('password_1')->getHTML(); ?>
        <span class="error"><?php echo htmlspecialchars($password_message); ?></span><br>

        <label>Retype Password:</label>
        <input type="password" name="password_2" size="30">
        <?php echo $fields->getField('password_2')->getHTML(); ?><br>

        <label>First Name:</label>
        <input type="text" name="first_name"
               value="<?php echo htmlspecialchars($first_name); ?>" 
               size="30">
        <?php echo $fields->getField('first_name')->getHTML(); ?><br>

        <label>Last Name:</label>
        <input type="text" name="last_name"
               value="<?php echo htmlspecialchars($last_name); ?>"
               size="30">
        <?php echo $fields->getField('last_name')->getHTML(); ?><br>

        <label>Address:</label>
        <input type="text" name="ship_line1"
               value="<?php echo htmlspecialchars($address); ?>"
               size="30">
        <?php echo $fields->getField('ship_line1')->getHTML(); ?><br>

        <label>City:</label>
        <input type="text" name="ship_city"
               value="<?php echo htmlspecialchars($city); ?>"
               size="30">
        <?php echo $fields->getField('ship_city')->getHTML(); ?><br>

        <label>State:</label>
        <input type="text" name="ship_state"
               value="<?php echo htmlspecialchars($state); ?>"
               size="30">
        <?php echo $fields->getField('ship_state')->getHTML(); ?><br>

        <label>Zip Code:</label>
        <input type="text" name="ship_zip"
               value="<?php echo htmlspecialchars($zip); ?>"
               size="30">
        <?php echo $fields->getField('ship_zip')->getHTML(); ?><br>

        <label>&nbsp;</label>
        <button type="button" class="btn btn-lg btn-primary">Submit</button>
		<button type="button" class="btn btn-lg btn-warning">Clear</button>
	</form>
</main>
<?php include '../view/footer.php'; ?>