<?php
require '../db.php'; // Include the database connection
session_start(); // Start the session to access companyID

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_SESSION['companyID'])) {
    $companyID = $_SESSION['companyID'];

    try {
        // Fetch messages associated with the logged-in company
        $stmt = $conn->prepare("SELECT customerName, customerEmail, messageText, sentDate FROM messages WHERE companyID = :companyID ORDER BY sentDate DESC");
        $stmt->bindParam(':companyID', $companyID, PDO::PARAM_INT);
        $stmt->execute();

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Company Messages</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f9;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin: 10%;
                    background-image: url("../Images/warehouse5.jpg");
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-size: cover;
                    background-position: center;
                }.container {
                    background-color: #fff;
                    padding: 15px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    width: 600px;
                    text-align: center;
                }
                h2 {
                    text-align: center;
                }.message {
                    margin-bottom: 10px;
                    padding: 10px;
                    border-bottom: 1px solid #ddd;
                }.message p {
                    margin: 5px 0;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h2>Messages for Your Company</h2>
                <?php
                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<div class='message'>".
                             "<p><strong>From:</strong> ". htmlspecialchars($row["customerName"]). " (<a href='mailto:". htmlspecialchars($row["customerEmail"]). "'>". htmlspecialchars($row["customerEmail"]). "</a>)</p>".
                             "<p><strong>Date:</strong> ". htmlspecialchars($row["sentDate"]). "</p>".
                             "<p><strong>Message:</strong> ". nl2br(htmlspecialchars($row["messageText"])). "</p>".
                             "</div>";
                    }
                } else {
                    echo "<p>No messages found for your company.</p>";
                }
                ?>
                <button onclick="window.location.href='company_dashboard.php'">Return to Dashboard</button>
            </div>
        </body>
        </html>
        <?php
    } catch (PDOException $e) {
        echo "<p>Error fetching messages: ". $e->getMessage(). "</p>";
    }
} else {
    echo '<script>
            alert("No company logged in. Redirecting to home page.");
            window.location.href = "../index.php";
          </script>';
    exit;
}
?>