<?php
include 'db.php'; // Include the database connection

// Fetch all products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Price: " . $row["price"]. " - Quantity: " . $row["quantity"]. "<br>";
    }
} else {
    echo "No products found";
}
?>

