<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
			background-image: url("images/depositphotos_648417408-stock-illustration-room-warehouse-concept-large-room.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
			background-position: center;

        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .container {
            width: 40%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			text-align: center;
			justify-content: center;
        }
        a {
			display: inline-block;
            text-decoration: none;
            color: #333;
            margin: 5px;
            padding: 10px 20px;
            background-color: #4CAF50;
            border-radius: 5px;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<header>
    <h1>Product Dashboard</h1>
</header>

<div class="container">
    <h2>Welcome to the Inventory System</h2>
    <p>Manage your products and track inventory with ease.</p>

    <a href="MySQL_Queries/create_product.php">Add New Product</a>
	<a href="MySQL_Queries/view_products.php">View Product</a>
	<a href="MySQL_Queries/delete_view_product.php">Delete Product</a>
    <a href="MySQL_Queries/update_view_product.php">Update Product</a>
	<a href="MySQL_Queries/logout.php">Log Out</a>
</div>

</body>
</html>

