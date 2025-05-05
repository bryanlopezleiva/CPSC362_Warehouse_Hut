<?php
require '../db.php'; // Ensure this file correctly connects to MySQL using PDO
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $companyName = $_POST['first'];
    $password = $_POST['password'];

    // Fetch company details from the database using PDO
    $stmt = $conn->prepare("SELECT * FROM companies WHERE companyName = :companyName");
    $stmt->bindParam(':companyName', $companyName, PDO::PARAM_STR);
    $stmt->execute();

    $company = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($company && password_verify($password, $company['password'])) {
        // Store company ID in session
        $_SESSION['companyID'] = $company['companyID'];
        header("Location: products.php");
        exit;
    } else {
        echo "Invalid credentials.";
    }
}
?>