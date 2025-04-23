<?php
require '../db.php';  // Ensure this file returns a PDO connection object

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set the content type to JSON
header('Content-Type: application/json');

// Check if the 'query' parameter is set
if (isset($_GET['query'])) {
    // Prepare the SQL statement using PDO
    $searchQuery = '%'. $_GET['query']. '%';
    $stmt = $conn->prepare("SELECT * FROM products WHERE productName LIKE :query");
    $stmt->bindParam(':query', $searchQuery, PDO::PARAM_STR);

    // Execute the statement
    $stmt->execute();

    // Fetch all results as an associative array
    $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return results as JSON
    echo json_encode($searchResults);
} else {
    // Return an error message if 'query' parameter is not set
    echo json_encode(['error' => 'No search query provided']);
}

// Close the database connection
$conn = null;
?>