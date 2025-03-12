<?php
$host = 'localhost'; // Change if connecting to a remote server
$port = '3306'; // Default MySQL port
$dbname = 'warehouse_hut'; // Replace with your database name
$username = 'root'; // Replace with your MySQL username
$password = '*KillingEdge_1993'; // Replace with your MySQL password

try {
    // Create a new PDO instance with the correct DSN
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
}
catch(PDOException $e) {
    echo "Connection failed: ". $e->getMessage();
}
?>