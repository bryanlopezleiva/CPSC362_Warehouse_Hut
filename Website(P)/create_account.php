<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create_account.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <h2>Registration Form</h2>
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
    </div>
    
</body>
</html>