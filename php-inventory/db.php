<?php
$host = 'localhost';
$user = 'root'; // MySQL username
$password = 'Realmad32'; // MySQL password (make sure it matches what you set)
$database = 'inventory_db'; // The database name

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

