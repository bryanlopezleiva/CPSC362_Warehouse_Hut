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

        <form action="send_contact.php" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
		<a href="buyer.php" class="back_button">Return</a>
    </div>

</body>
</html>
