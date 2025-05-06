<?php
require '../db.php'; // Include the database connection

// Fetch company names and IDs from the database
$stmt = $conn->prepare("SELECT companyID, companyName FROM company");
$stmt->execute();
$companies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>

    <div class="container">
        <h2>Contact Us</h2>
        <div class="contact-info">
            <p><strong>Email:</strong> supportWarehouseHut@gmail.com</p>
            <p><strong>Phone:</strong> +1 (657) 256-1876</p>
            <p><strong>Address:</strong> 1327 Sterling Way Ave, Fullerton, CA </p>
        </div>

        <form action="../MySQL_Queries/contact_send.php" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>

            <!-- Dropdown menu for selecting company -->
            <select name="companyID" required>
                <option value="">Select Company</option>
                <?php foreach ($companies as $company): ?>
                    <option value="<?php echo htmlspecialchars($company['companyID']); ?>">
                        <?php echo htmlspecialchars($company['companyName']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
        <button onclick="window.location.href='buyer.php'">Go Back</button>
    </div>

</body>
</html>