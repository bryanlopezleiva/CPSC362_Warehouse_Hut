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
    <title>Delete List</title>
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
        }.container {
            background-color: #fff;
            padding: 15px;
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
            display: flex;
            justify-content: center;      
        }
        button {
            padding: 5px 5px;
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
                     htmlspecialchars($row["stockQuantity"] ?? ''). " ". htmlspecialchars($row["productName"] ?? ''). "<br>". " Total Cost: $ ". 
                     htmlspecialchars($row["productPrice"] ?? ''). "<br>". " From: ". htmlspecialchars($row["areaSourced"] ?? '').
                     "<div class='actions'>".
                     "<button onclick='deleteProduct(".htmlspecialchars($row["productsID"] ?? '').")'>Delete</button>".
                     "</div>".
                     "</div>";
            }
        } else {
            echo "<p>No products found</p>";
        }
        ?>
        <button onclick="window.location.href='../products.php'">Go Back</button>
        </a>
    </div>

    <script>
        function deleteProduct(productsID) {
            if (confirm('Are you sure you want to delete this product?')) {
                fetch(`delete_product.php?id=${productsID}`, {
                    method: 'POST'
                }).then(response => response.text()).then(data => {
                    alert(data);
                    location.reload(); // Reload the page to reflect changes
                }).catch(error => console.error('Error:', error));
            }
        }
    </script>
</body>
</html>