<?php
require 'db.php'; // Ensure this file correctly connects to MySQL

$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();

if ($stmt->rowCount() > 0) { 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Product Name: " . htmlspecialchars($row["product_name"]) . "<br>";
    }
} else {
    echo "No products found";
}
?>

