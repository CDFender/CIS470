<?php
function is_valid_customer_email($email) {
    global $db;
    $query = '
        SELECT User_ID FROM User
        WHERE Email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

function is_valid_customer_login($email, $password) {
    global $db;
    $password = sha1($email . $password);
    $query = '
        SELECT * FROM User
        WHERE Email = :email AND Password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

function get_customer($customer_id) {
    global $db;
    $query = 'SELECT * FROM User WHERE User_ID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

function get_customer_by_email($email) {
    global $db;
    $query = 'SELECT * FROM User WHERE Email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

function add_customer($email, $first_name, $last_name,
                      $password_1) {
    global $db;
    $password = sha1($email . $password_1);
    $query = '
        INSERT INTO customers (emailAddress, password, firstName, lastName)
        VALUES (:email, :password, :first_name, :last_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->execute();
    $customer_id = $db->lastInsertId();
    $statement->closeCursor();
    return $customer_id;
}

function update_customer($customer_id, $email, $first_name, $last_name,
                      $password_1, $password_2, $address, $city, $state, $zip) {
    global $db;
    $query = '
		UPDATE User
		SET Email = :email,
			First_Name = :first_name,
			Last_Name = :last_name, 
			Address = :address,
			City = :city,
			State = :state,
			ZIP = :zip,
		WHERE User_ID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
	$statement->bindValue(':address', $address);
	$statement->bindValue(':city', $city);
	$statement->bindValue(':state', $state);
	$statement->bindValue(':zip', $zip);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $statement->closeCursor();

    if (!empty($password_1) && !empty($password_2)) {
        $password = sha1($email . $password_1);
        $query = '
            UPDATE User
            SET Password = :password
            WHERE User_ID = :customer_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':customer_id', $customer_id);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>