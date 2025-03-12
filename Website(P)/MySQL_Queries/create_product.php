<?php
include 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve input values safely
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = (float)$_POST['price'];
    $quantity = $_POST['quantity'];
    $stockDate = $_POST['stockDate'];
    $areaSourced = $_POST['areaSourced'];
    $companyID = $_POST['companyID']; 

    try {
        // Ensure companyID exists before inserting a product
        $checkCompany = $conn->prepare("SELECT companyID FROM company WHERE companyID = :companyID");
        $checkCompany->bindParam(':companyID', $companyID, PDO::PARAM_INT);
        $checkCompany->execute();

        if ($checkCompany->rowCount() == 0) {
            echo "Error: The specified company ID does not exist.";
        } else {
            // Insert into the products table using a prepared statement
            $stmt = $conn->prepare("INSERT INTO products 
                (productName, productType, productPrice, stockDate, stockQuantity, areaSourced, companyID) 
                VALUES (:name, :type, :price, :stockDate, :quantity, :areaSourced, :companyID)");

            // Bind parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':stockDate', $stockDate);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':areaSourced', $areaSourced);
            $stmt->bindParam(':companyID', $companyID, PDO::PARAM_INT);

            // Execute the statement
            if ($stmt->execute()) {
                // Redirect to index.php after successful insertion
                header("Location: ../index.php");
                exit; // Ensure the script stops executing after redirect
            } else {
                echo "Error: " . print_r($stmt->errorInfo(), true);
            }
        }
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
}
?>

<!-- HTML Form for Adding a Product -->
<form method="POST">
    <label>Product Name:</label> <input type="text" name="name" required><br>
    <label>Product Type:</label> <input type="text" name="type" required><br>
    <label>Price:</label> <input type="number" name="price" step="0.01" required><br>
    <label>Quantity:</label> <input type="number" name="quantity" required><br>
    <label>Stock Date:</label> <input type="date" name="stockDate" required><br>
    <label>Area Sourced:</label> <input type="text" name="areaSourced" required><br>
    <label>Company ID:</label> <input type="number" name="companyID" required><br>
    <button type="submit">Add Product</button>
</form>
