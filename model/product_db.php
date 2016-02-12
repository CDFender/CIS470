<?php
function get_products_by_type($media_type) {
	global $db;
	//$query = 'CALL GetProducts(@:media_type)';
	$query = ' SELECT * FROM Product WHERE Media_Type = :media_type';
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':media_type', $media_type);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		display_db_error($error_message);
	}
}

function get_product($product_id) {
	global $db;
	$query = 'SELECT * FROM Product WHERE product_id = :product_id';
	//$query = 'CALL GetProduct(@:product_id)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_product($media_type, $price, $description, $size, $stock_available, $category, $inactive) {
	global $db;
	$query = 'CALL AddProduct(@:media_type, @:price, @:description, @:size, @:stock_available, @:category, @:inactive)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':media_type', $media_type);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':size', $size);
        $statement->bindValue(':stock_available', $stock_available);
        $statement->bindValue(':category', $category);
		$statement->bindValue(':inactive', $inactive);
        $statement->execute();
        $statement->closeCursor();

        // Get the last product ID that was automatically generated
        $product_id = $db->lastInsertId();
        return $product_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_product($product_id, $media_type, $price, $description, $size, $stock_available, $category, $inactive) {
    global $db;
	$query = 'CALL UpdateProduct(@:productid, @:media_type, @:price, @:description, @:size, @:stock_available, @:category, @:inactive)';
    $query = '
        UPDATE Products
        SET productName = :name,
            productCode = :code,
            description = :desc,
            listPrice = :price,
            discountPercent = :discount,
            categoryID = :category_id
        WHERE productID = :product_id';
    try {
        $statement = $db->prepare($query);
		$statement->bindValue(':productid', $product_id);
        $statement->bindValue(':media_type', $media_type);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':size', $size);
        $statement->bindValue(':stock_available', $stock_available);
        $statement->bindValue(':category', $category);
		$statement->bindValue(':inactive', $inactive);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_product($product_id) {
    global $db;
	$query = 'CALL DeleteProduct(@:productid)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':productid', $product_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>