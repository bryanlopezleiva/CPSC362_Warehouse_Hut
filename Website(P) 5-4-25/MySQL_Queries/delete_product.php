<?php
require '../db.php';  // Ensure this file returns a PDO connection object

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    $productID = $_GET['id'];

    // Prepare the SQL statement using PDO
    $stmt = $conn->prepare("DELETE FROM products WHERE productsID = :id");
    $stmt->bindParam(':id', $productID, PDO::PARAM_INT);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting product.";
    }
}