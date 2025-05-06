<?php
require '../db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $companyID = $_POST['companyID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insert the message into the database
    $stmt = $conn->prepare("INSERT INTO messages (companyID, customerName, customerEmail, messageText) VALUES (:companyID, :name, :email, :message)");
    $stmt->bindParam(':companyID', $companyID, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':message', $message, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo '<script>alert("Message sent successfully!"); window.location.href="../Customer_Side/contact.php";</script>';
    } else {
        echo '<script>alert("Error sending message."); window.location.href="../Customer_Side/contact.php";</script>';
    }

    // Close the connection
    $conn = null;
}
?>