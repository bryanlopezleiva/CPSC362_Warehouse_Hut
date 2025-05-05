<?php
require '../db.php'; // Ensure this file correctly connects to MySQL

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
            height: 100vh;
            margin: 300px;
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
            width: 400px;
            text-align: center;
        }
        h2 {
            text-align: center;
        }.product {
            margin-bottom: 10px;
            padding: 10px;
            border-bottom: 1px solid #ddd;
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
                     "Total Cost: $ ". htmlspecialchars($row["productPrice"]). "<br>".
                     "From: ". htmlspecialchars($row["areaSourced"]). "<br>".
                     "Date Stocked: ". htmlspecialchars($row["stockDate"]).
                     "</div>";
            }
        } else {
            echo "<p>No products found</p>";
        }
        ?>
        <a href="../products.php">
            <h1>Return</h1>
        </a>
    </div>
</body>
</html>
