<?php
require '../../php-inventory/db.php';  // Ensure this file returns a PDO connection object

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set the content type to JSON
header('Content-Type: application/json');

if (isset($_GET['query'])) {
    $query = trim($_GET['query']);

    // Simple list of known product types you support
    $productTypes = ['Electronics', 'Groceries', 'Furniture'];

    try {
        if (in_array($query, $productTypes)) {
            // Exact match on productType
            $stmt = $conn->prepare("SELECT * FROM products WHERE productType = :query");
            $stmt->bindParam(':query', $query, PDO::PARAM_STR);
        } else {
            // Partial match on productName
            $searchQuery = '%' . $query . '%';
            $stmt = $conn->prepare("SELECT * FROM products WHERE productName LIKE :query");
            $stmt->bindParam(':query', $searchQuery, PDO::PARAM_STR);
        }

        $stmt->execute();
        $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($searchResults);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'No search query provided']);
}

// Close the database connection
$conn = null;
?>
