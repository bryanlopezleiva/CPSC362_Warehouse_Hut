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
            background-image: url("images/depositphotos_648417408-stock-illustration-room-warehouse-concept-large-room.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
			background-position: center;
        }
    </style>
<body>
    <div class="main">
        <h2>Create Account</h2>
        <form action="MySQL_Queries/register.php" method="POST"> 
            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="companyName" required />

            <label for="email">Email:</label>
            <input type="email" id="email" name="companyEmail" required />

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
            <select id="store" name="store_type" required>
                <option value="Retail">
                    Retail
                </option>
				<option value="Family Owned">
                    Family Owned
                </option>
                <option value="Online Marketplace">
                    Online
                </option>
                <option value="Other">
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
	<script>
		document.querySelector('form').addEventListener('submit', function(event) {
		const password = document.getElementById('password').value;
		const repassword = document.getElementById('repassword').value;

		if (password !== repassword) {
			alert("Passwords do not match.");
			event.preventDefault(); // Prevent form submission
		}
	});
	</script>
    
</body>
</html>