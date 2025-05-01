<?php
require '../db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $stockDate = $_POST['stockDate'];
    $areaSourced = $_POST['areaSourced'];

    // Debugging: Output the received values
    /*echo "Received values: Name: $name, Type: $type, Price: $price, Quantity: $quantity, Stock Date: $stockDate, Area Sourced: $areaSourced<br>";*/

    // Insert into the products table using PDO
    try {
        $stmt = $conn->prepare("INSERT INTO products (productName, productType, productPrice, stockDate, stockQuantity, areaSourced) VALUES (:name, :type, :price, :stockDate, :quantity, :areaSourced)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stockDate', $stockDate);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':areaSourced', $areaSourced);

        if ($stmt->execute()) {
            echo "New product created successfully!";
        } else {
            echo "Error executing query.";
        }
    } catch (PDOException $e) {
        echo "Error: ". $e->getMessage();
    }

    // Close the connection
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url("../Images/Warehouse3.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }.container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
			text-align: center;
        }
		
		label {
			display: block;
			margin-bottom: 2px;
			padding: 4px 0;
			font-weight: bold;
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
            <input type="text" name="name" required><br>

            <label for="type">Product Type:</label>
            <select name="type" required>
                <option value="Electronics">Electronics</option>
                <option value="Groceries">Groceries</option>
                <option value="Furniture">Furniture</option>
                <option value="Clothing">Clothing</option>
                <option value="Tools">Tools</option>
            </select><br>

            <label for="price">Total Price:</label>
            <input type="number" name="price" required><br>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" required><br>

            <label for="stockDate">Stock Date:</label>
            <input type="date" name="stockDate" required><br>

            <label for="areaSourced">Area Sourced:</label>
            <input type="text" name="areaSourced" required><br>

            <button type="submit">Add Product</button>
        </form>
        <a href="view_products.php">
            <h1>View Products</h1>
        </a>
    </div>
</body>
</html>
