<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="company_login.css">
    <title>Company Log-in</title>
</head>
<body>
    <div class="main">
        <h1>Warehouse Hut</h1>
        <h3>Enter your credentials</h3>

        <from action="">
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
                <button type="submit">
                    Submit
                </button>
             </div>
        </from>

        <p>Not Registered?
            <a href="company.php">
                Create an account
            </a>
        </p>
    </div>
</body>
</html>