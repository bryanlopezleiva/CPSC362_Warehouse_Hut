<?php
require '../db.php'; // Ensure this file correctly connects to MySQL
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if 'productsID' parameter is set
if (isset($_GET['productsID']) && isset($_SESSION['companyID'])) {
    $productID = $_GET['productsID'];
    $companyID = $_SESSION['companyID'];

    // Fetch product details from the database
    $stmt = $conn->prepare("SELECT * FROM products WHERE productsID = ? AND companyID = ?");
    $stmt->execute([$productID, $companyID]);

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
                <form method="POST" action="../MySQL_Queries/update_product.php">
                    <input type="hidden" name="productsID" value="<?php echo htmlspecialchars($product['productsID']); ?>">
                    <label for="productName">Product Name:</label>
                    <input type="text" name="productName" value="<?php echo htmlspecialchars($product['productName']); ?>" required>
                    <label for="productType">Product Type:</label>
                    <select name="productType" required>
                        <option value="Electronics" <?php echo ($product['productType'] == 'Electronics') ? 'selected' : ''; ?>>Electronics</option>
                        <option value="Groceries" <?php echo ($product['productType'] == 'Groceries') ? 'selected' : ''; ?>>Groceries</option>
                        <option value="Furniture" <?php echo ($product['productType'] == 'Furniture') ? 'selected' : ''; ?>>Furniture</option>
                        <option value="Clothing" <?php echo ($product['productType'] == 'Clothing') ? 'selected' : ''; ?>>Clothing</option>
                        <option value="Tools" <?php echo ($product['productType'] == 'Tools') ? 'selected' : ''; ?>>Tools</option>
						<option value="Tools" <?php echo ($product['productType'] == 'Toys') ? 'selected' : ''; ?>>Toys</option>
                    </select><br>
                    <label for="productPrice">Total Price:</label>
                    <input type="number" name="productPrice" value="<?php echo htmlspecialchars($product['productPrice']); ?>" required>
                    <label for="stockDate">Stock Date:</label>
                    <input type="date" name="stockDate" value="<?php echo htmlspecialchars($product['stockDate']); ?>" required>
                    <label for="stockQuantity">Quantity:</label>
                    <input type="number" name="stockQuantity" value="<?php echo htmlspecialchars($product['stockQuantity']); ?>" required>
                    <button type="submit">Update Product</button>
                    <button type="button" onclick="window.location.href='update_view_product.php'">Go Back</button>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid request.";
}
?>