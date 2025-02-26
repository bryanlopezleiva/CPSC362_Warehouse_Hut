<?php
include 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Insert into the products table
    $sql = "INSERT INTO products (name, price, quantity) VALUES ('$name', '$price', '$quantity')";
    if ($conn->query($sql) === TRUE) {
        echo "New product created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST">
    Product Name: <input type="text" name="name" required><br>
    Price: <input type="text" name="price" required><br>
    Quantity: <input type="number" name="quantity" required><br>
    <button type="submit">Add Product</button>
</form>

