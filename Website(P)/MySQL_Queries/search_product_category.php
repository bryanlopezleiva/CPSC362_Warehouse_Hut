<?php
require '../db.php';  // Ensure this file returns a PDO connection object


// Ignore this file for now, working on the logic for this for the buttons on the buyer page



// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set the content type to JSON
header('Content-Type: application/json');

// Check if the 'query' parameter is set
if (isset($_GET['query'])) {
    // Prepare the SQL statement using PDO
    $searchQuery = '%'. $_GET['query']. '%';
    $stmt = $conn->prepare("SELECT * FROM productType WHERE productName LIKE :query");
    $stmt->bindParam(':query', $searchQuery, PDO::PARAM_STR);

    // Execute the statement
    $stmt->execute();

// Close the database connection
$conn = null;
?>

