<?php
require '../db.php'; // Ensure this file correctly connects to MySQL

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if 'productsID' parameter is set
if (isset($_GET['productsID'])) {
    $productID = $_GET['productsID'];

    // Fetch product details from the database
    $stmt = $conn->prepare("SELECT * FROM products WHERE productsID = ?");
    $stmt->execute([$productID]);

    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        // Display update form with pre-filled data
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Product</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f9;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                    background-image: url("../Images/Warehouse3.jpg");
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-size: cover;
                    background-position: center;
                }.container {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    width: 300px;
                    text-align: left;
                }
                input, button {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 10px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                }
                button {
                    background-color: #4CAF50;
                    color: white;
                    border: none;
                    cursor: pointer;
                }
                button:hover {
                    background-color: #45a049;
                }
            </style>
        </head>
        <body>
    <div class="container">
        <h2>Update Product</h2>
        <form method="POST" action="update_product.php">
            <input type="hidden" name="productsID" value="<?php echo htmlspecialchars($product['productsID']); ?>">
            <label for="productName">Product Name:</label>
            <input type="text" name="productName" value="<?php echo htmlspecialchars($product['productName']); ?>" required>
            <label for="productType">Product Type:</label> <!-- Corrected name -->
            <select name="productType" required> <!-- Corrected name -->
                <option value="Electronics">Electronics</option>
                <option value="Groceries">Groceries</option>
                <option value="Furniture">Furniture</option>
                <option value="Clothing">Clothing</option>
                <option value="Tools">Tools</option>
            </select><br>
            <label for="productPrice">Total Price:</label>
            <input type="number" name="productPrice" value="<?php echo htmlspecialchars($product['productPrice']); ?>" required>
            <label for="stockDate">Stock Date:</label>
            <input type="date" name="stockDate" value="<?php echo htmlspecialchars($product['stockDate']); ?>" required>
            <label for="stockQuantity">Quantity:</label>
            <input type="number" name="stockQuantity" value="<?php echo htmlspecialchars($product['stockQuantity']); ?>" required>
            <button type="submit">Update Product</button>
			<button type="return">Return</button>
        </form>
    </div>
	<a href="update_view_product.php"
        </a>
</body>
</html>
        </html>
        <?php
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid request.";
}
?>