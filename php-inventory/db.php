<?php
$host = "localhost";
$dbname = "warehouse_hut";
$username = "root";
$password = "Realmad32"; // If you set a MySQL password, enter it here

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; // You can remove this later
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
