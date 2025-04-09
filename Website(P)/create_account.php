<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create_account.css">
    <title>Create Account</title>
</head>
<style>
        body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
            background-image: url("depositphotos_648417408-stock-illustration-room-warehouse-concept-large-room.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
<body>
    <div class="main">
        <h2>Create Account</h2>
        <form action="">
            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="company_name" required />

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />

            <label for="password">Password:</label>
            <input type="password" id="password" name="password"
                   pattern="^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])\S{8,}$" 
                   title="Password must contain at least one number, 
                           one alphabet, one symbol, and be at 
                           least 8 characters long" required />

            <label for="repassword">Re-type Password:</label>
            <input type="password" id="repassword" name="repassword" required />

            <label for="mobile">Phone Number:</label>
            <input type="text" id="mobile" name="mobile" maxlength="10" required />

            <label for="store">Type of Store:</label>
            <select id="store" name="store" required>
                <option value="retail">
                    Retail
                </option>
                <option value="online_market">
                    Online
                </option>
                <option value="other">
                    Other
                </option>
            </select>

            <button type="submit">
                Submit
            </button>
        </form>
		
		<p> <a href="index.php">
                Return
            </a>
    </div>
    
</body>
</html>