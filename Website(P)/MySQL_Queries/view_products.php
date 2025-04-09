<?php
require 'db.php'; // Ensure this file correctly connects to MySQL

$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();

echo "<br><br>" . "Current Products: " . "<br><br>";

if ($stmt->rowCount() > 0) { 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo htmlspecialchars($row["stockQuantity"]) . " " . htmlspecialchars($row["productName"]) . ": " . " $" . 
		htmlspecialchars($row["productPrice"]) . "<br>";
    }
} else {
    echo "No products found";
}
?>

