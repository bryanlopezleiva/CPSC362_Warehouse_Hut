<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php include 'navbar.php'; ?>  <!-- Include the navbar -->
  <section id="about-section">
    <h2>Hey World, Welcome to Warehouse Hut!!!</h2>
      <div class = "bio">
        <p>
          Hello Everyone, This is a website that can help you in keeping track of the inventory 
          of a company you shop at. You're presented the availability and price of a product 
          you search for in our search box. :)  
        </p>
        <br>
        <p>
            Now, If you are a company using our system, we would like you to either create 
            an account if new or simply log in to you're existing account. :D</p>
      </div>

      <div class="credentials">
        <a href="create_account.php">
         <p>Create an Account</p>
        </a>
        <a href = "company_login.php">
          <p>Log In</p>
        </a>
      </div>
  </section>
</body>
</html>
