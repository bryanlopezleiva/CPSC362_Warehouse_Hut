<?php
require '../db.php'; // Ensure this file correctly connects to MySQL using PDO
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $companyName = $_POST['first'];
    $password = $_POST['password'];

    // Fetch company details from the database using PDO
    $stmt = $conn->prepare("SELECT * FROM company WHERE companyName = :companyName");
    $stmt->bindParam(':companyName', $companyName, PDO::PARAM_STR);
    $stmt->execute();

    $company = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($company && password_verify($password, $company['password'])) {
        // Store company ID in session
        $_SESSION['companyID'] = $company['companyID'];
		$_SESSION['companyName'] = $company['companyName'];
        header("Location:../Company_Side/company_dashboard.php"); // Navigate to main directory
		exit;
    } else {
        echo '<script>
                alert("Invalid credentials. Please try again.");
                window.location.href = "../Company_Side/company_login.php";
              </script>';
			  exit;
    }
}
?>