<?php
require '../db.php'; // Ensure this file correctly connects to MySQL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $companyName = $_POST['companyName'];
    $email = $_POST['companyEmail'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $phoneNum = $_POST['mobile'];
    $storeType = $_POST['store_type'];

    // Validate that passwords match
    if ($password !== $repassword) {
        echo "Passwords do not match.";
        exit;
    }
	
	$stmt = $conn->prepare("SELECT * FROM company WHERE companyName = ? OR companyEmail = ?");
    $stmt->execute([$companyName, $email]);
    
    if ($stmt->rowCount() > 0) {
        echo "An account with this company name or email already exists.";
        echo '<a href="../create_account.php">Go back to registration page</a>';
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO company (companyName, companyEmail, password, phoneNum, storeType) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$companyName, $email, $hashedPassword, $phoneNum, $storeType])) {
        echo "Account created successfully.";
        header("Location: ../company_login.php");
        exit;
    } else {
        echo "Error: ". $stmt->error;
		echo '<a href="create_account.php">Go back to registration page</a>';
    }
}
?>