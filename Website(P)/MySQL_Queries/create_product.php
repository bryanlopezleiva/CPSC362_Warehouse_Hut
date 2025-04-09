<?php
require 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $stockDate = $_POST['stockDate'];
    $areaSourced = $_POST['areaSourced'];
	
	// Insert into the products table
    $sql = "INSERT INTO products (productName, productType, productPrice, stockDate, stockQuantity, areaSourced) 
            VALUES ('$name', '$type', '$price', '$stockDate', '$quantity', '$areaSourced')";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
	<script>
        function redirect() {
            window.location.href = "products.php";
        }
    </script>
	
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
			background-image: url("../depositphotos_648417408-stock-illustration-room-warehouse-concept-large-room.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
		.container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="type">Product Type:</label>
            <input type="text" id="type" name="type" required><br>

            <label for="price">Total Price:</label>
            <input type="number" id="price" name="price" required><br>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required><br>

            <label for="stockDate">Stock Date:</label>
            <input type="date" id="stockDate" name="stockDate" required><br>

            <label for="areaSourced">Area Sourced:</label>
            <input type="text" id="areaSourced" name="areaSourced" required><br>

            <button type="submit">Add Product</button>
        </form>
		<a href="view_products.php">
			<h1>View Products</h1>
    </div>
</body>
</html>