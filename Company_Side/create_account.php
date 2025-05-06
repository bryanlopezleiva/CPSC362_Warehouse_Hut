<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create_account.css">
    <title>Create Account</title>
    <style>
        body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f9;
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 10%;
                background-image: url("../Images/Warehouse7.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-position: center;
            }
			form {
				display: flex;
				flex-direction: column;
			}.main {
                background-color: #fff;
                padding: 15px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 200px;
                text-align: center;
            }
            h2 {
				margin: 5%;
                text-align: center;
            }.product {
                margin-bottom: 10px;
                padding: 10px;
                border-bottom: 1px solid #ddd;
            }.actions {
                display: flex;
                justify-content: center;      
            }
            button {
                padding: 5px 5px;
				margin-top: 5%;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            button:hover {
                background-color: #45a049;
            }
    </style>
</head>
<body>
    <div class="main">
        <h2>Create Account</h2>
        <form action="../MySQL_Queries/register.php" method="POST"> 
            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="companyName" required />

            <label for="email">Email:</label>
            <input type="email" id="email" name="companyEmail" required />

            <label for="password">Password:</label>
            <input type="password" id="password" name="password"
                   pattern="^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])\S{8,}$" 
                   title="Password must contain 8 characters, 1 number, 1 special character" required />

            <label for="repassword">Re-type Password:</label>
            <input type="password" id="repassword" name="repassword" required />

            <label for="mobile">Phone Number:</label>
            <input type="text" id="mobile" name="mobile" maxlength="14" required />

            <label for="store">Type of Store:</label>
            <select id="store" name="store_type" required>
                <option value="Retail">Retail</option>
                <option value="Family Owned">Family Owned</option>
                <option value="Online Marketplace">Online</option>
                <option value="Other">Other</option>
            </select>
			<button type="submit">Submit</button>
        </form>
        <button onclick="window.location.href='company_login.php'">Go Back</button>
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

        document.getElementById('mobile').addEventListener('input', function (e) {
            const input = e.target;
            const value = input.value.replace(/\D/g, ''); // Remove non-digit characters
            const formattedValue = formatPhoneNumber(value);
            input.value = formattedValue;
        });

        function formatPhoneNumber(value) {
            const phonePattern = /^(\d{0,3})(\d{0,3})(\d{0,4})$/;
            const match = value.match(phonePattern);
            if (match) {
                const [, areaCode, prefix, lineNumber] = match;
                if (lineNumber) {
                    return `(${areaCode}) ${prefix}-${lineNumber}`;
                } else if (prefix) {
                    return `(${areaCode}) ${prefix}`;
                } else if (areaCode) {
                    return `(${areaCode}`;
                }
            }
            return value;
        }
    </script>
</body>
</html>