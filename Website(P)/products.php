<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="products.css">
</head>
<body>


<header>
    <h1>Inventory Management Dashboard</h1>
</header>

<?php include 'navbar.php'; ?> <!-- Include the navbar -->

<div class="container">
    <h2>Welcome to the Inventory Dashboard</h2>
    <p>Manage your products, view inventory, and add new items.</p>

    <!-- Button to add a new product -->
    <a href="MySQL_Queries/create_product.php">
        <button>
            Add New Product
        </button>
    </a>

    <!-- Link to view existing products -->
    <a href="MySQL_Queries/view_products.php">
        <button>
            View Products
        </button>
    </a>
</div>

</body>
</html>
