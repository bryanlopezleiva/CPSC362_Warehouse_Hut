<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="company_login.css">
    <title>Company Log-in</title>
	
	<script>
        function redirect() {
            window.location.href = "products.php";
        }
    </script>
</head>
    <style>
        body {
			margin: 0;
			padding: 0;
            background-image: url("Images/Warehouse2.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
<body>
    <div class="main">
        <h1>Warehouse Hut</h1>
        <h3>Enter your credentials</h3>

        <form action="">
            <label for="first">
                Company Name:
            </label>
            <input type="text" id="first" name="first"
               placeholder="Enter your Unsername" required>

            <label for="password">
                Password:
            </label>

            <input type="password" id="password" name="password"
             placeholder="Enter your password" required>

             <div class="wrap">
                <button type="button" onclick="redirect()">
                    Login
                </button>
             </div>
        </form>

        <p>Not Registered?
            <a href="create_account.php">
                Create an account
            </a>
        </p>
    </div>
</body>
</html>