<?php
require '../db.php'; // Ensure this file correctly connects to MySQL

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch all products from the database
$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10%;
            background-image: url("../Images/Warehouse3.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
			align-items: center;
        }.container {
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            text-align: center;
        }.product {
            margin-bottom: 10px;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }.actions {
            margin-top: 10px;
            display: flex;
            justify-content: center; 
        }
        button {
            padding: px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Current Products</h2>
        <?php
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='product'>".
     htmlspecialchars($row["stockQuantity"]). " ". htmlspecialchars($row["productName"]). "<br>".
     "Product Type: ". htmlspecialchars($row["productType"]). "<br>". // Added Product Type
     "Total Cost: $ ". htmlspecialchars($row["productPrice"]). "<br>".
     "From: ". htmlspecialchars($row["areaSourced"]).
     "<div class='actions'>".
     "<button onclick='updateProduct(".htmlspecialchars($row["productsID"]).")'>Update</button>".
     "</div>".
     "</div>";
            }			
        } else {
            echo '<script>alert("No products found!")</script>';
        }
        ?>
        <button onclick="window.location.href='../products.php'">Go Back</button>
    </div>

    <script> // refreshes form
        function updateProduct(productsID) {
            window.location.href = `update_form.php?productsID=${productsID}`;
        }
    </script>
</body>
</html>