<?php
include '../../php-inventory/db.php'; // Include database connection

try {
    // Fetch all products
    $stmt = $conn->prepare("SELECT productName, productType, productPrice, stockDate, stockQuantity, areaSourced, companyID FROM products");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch data as an associative array
} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
?>

<h2>Product List</h2>
<table border="1">
    <tr>
        <th>Product Name</th>
        <th>Product Type</th>
        <th>Price</th>
        <th>Stock Date</th>
        <th>Stock Quantity</th>
        <th>Area Sourced</th>
        <th>Company ID</th>
    </tr>
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= htmlspecialchars($product['productName'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($product['productType'] ?? 'N/A') ?></td>
                <td>$<?= htmlspecialchars($product['productPrice'] ?? '0.00') ?></td>
                <td><?= htmlspecialchars($product['stockDate'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($product['stockQuantity'] ?? '0') ?></td>
                <td><?= htmlspecialchars($product['areaSourced'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($product['companyID'] ?? 'N/A') ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">No products found.</td>
        </tr>
    <?php endif; ?>
</table>
