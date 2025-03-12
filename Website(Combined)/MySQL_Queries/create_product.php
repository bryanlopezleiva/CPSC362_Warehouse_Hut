<?php
require 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $stockDate = $_POST['stockDate'];
    $areaSourced = $_POST['areaSourced'];
    #$companyID = $_POST['companyID']; // Ensure this comes from a valid company

    // Insert into the products table
    $sql = "INSERT INTO products (productName, productType, productPrice, stockDate, stockQuantity, areaSourced) 
            VALUES ('$name', '$type', '$price', '$stockDate', '$quantity', '$areaSourced')";

    if ($conn->query($sql) === TRUE) {
        echo "New product created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST">
    Product Name: <input type="text" name="name" required><br>
    Product Type: <input type="text" name="type" required><br>
    Price: <input type="number" name="price" required><br>
    Quantity: <input type="number" name="quantity" required><br>
    Stock Date: <input type="date" name="stockDate" required><br>
    Area Sourced: <input type="text" name="areaSourced" required><br>
	 <button type="submit">Add Product</button>
</form>
