<?php
require '../db.php'; // Ensure this file correctly connects to MySQL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productID = $_POST['productsID'];
    $productName = $_POST['productName'];
    $productType = $_POST['productType'];
    $productPrice = $_POST['productPrice'];
    $stockDate = $_POST['stockDate'];
    $stockQuantity = $_POST['stockQuantity'];

    $stmt = $conn->prepare("UPDATE products SET productName = ?, productType = ?, productPrice = ?, stockDate = ?, stockQuantity = ? WHERE productsID = ?");
    $stmt->execute([$productName, $productType, $productPrice, $stockDate, $stockQuantity, $productID]);

    if ($stmt->rowCount() > 0) {
        echo '<script>("Product updated successfully!");
                window.location.href = "update_view_product.php";
              </script>';
    } else {
        echo '<script>("Error in updating product!");
                window.location.href = "update_view_product.php";
              </script>';
    }
}
?>