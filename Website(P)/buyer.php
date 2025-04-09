<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuyerPage</title>
    <link rel="stylesheet" href="buyer.css">
</head>
<body>
  

    <!-- Top Navigation Menu -->
    <div class="topnav">
    <a href="#home" class="active"> <b>Buyers page</b></a>
    <div id="myLinks">
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
    </div>

 

 
    <script>
    function myFunction() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
    }
    </script>
    




    <!-- Search button -->
    <div class="container">
        <form>
            <input type="text" placeholder="search for product">
            <button type="Submit">Search</button>
        </form>
    </div>

    <!-- Boxes -->
    <div class="boxes">
  
            <div class="box1">Electronic</div>
            <div class="box2">Home</div>
            <div class="box3">Goods</div>
        
       
    </div>





</body>
</html>