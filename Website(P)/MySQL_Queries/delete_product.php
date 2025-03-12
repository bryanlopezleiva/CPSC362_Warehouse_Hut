<?php
require 'db.php'; // Ensure the correct relative path is used

$sql = "DELETE FROM products where
            VALUES ('$name', '$type', '$price', '$stockDate', '$quantity', '$areaSourced')";

    if ($conn->query($sql) === TRUE) {
        echo "Product Deleted!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?> 
