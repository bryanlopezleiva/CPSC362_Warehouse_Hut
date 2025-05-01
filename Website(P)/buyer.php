<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="buyer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<!-- Top manu bar -->

    <label class="manu">
        <input type="checkbox" class="menu">
        <div class='toggle'>
            <span class='top_line common'></span>
            <span class='middle_line common'></span>
            <span class='bottom_line common'></span>
        </div>


        <div class="slide">
            <h1>Customer's Page</h1>
            <ul>
                <!--<li><a href="#"><i class="far fa-user"></i>user</a></li>-->
                <!--<li><a href="#"><i class="fas fa-tv"></i>Dashboard</a></li>-->
                <li><a href="contact.php"><i class="fas fa-phone"></i>Contact</a></li>
                <li><a href="index.php"><i class="fa fa-home"></i>Return</a></li> 
            </ul>
        </div>
    </label>



    <!-- Search button -->
    <div class="container">
        <form>
            <input type="text" id="searchInput" placeholder="search for product">
            <button type="button" id="searchButton">Search</button>
        </form>
    </div>
	
	<!-- Search Results -->
    <div class="results" id="results"></div>

    <!-- images -->
        <div class="column">
            <div class="card">
                <img src="images/iphone.jpg" alt='Electronics' style='width:40%;'>
                <h2>Electronics</h2>
                <p class='title'>Brand names</p>
               <p><button class='button select-button' data-type = "Electronics">Select</button></p>
            </div>
        </div>
   

    
        <div class="column">
            <div class="card">
                <img src="images/goods.webp" alt='Electronics' style='width:40%'>
                <h2>Groceries</h2>
                <p class='title'>Food</p>
                <p><button class='button select-button' data-type = "Groceries">Select</button></p>
            </div>
        </div>


    
        <div class="column">
            <div class="card">
                <img src="images/home.jpg" alt='Electronics' style='width:40%'>
                <h2>Housing</h2>
                <p class='title'>Furniture</p>
                <p><button class='button select-button' data-type = "Furniture">Select</button></p>
            </div>
        </div>

	<script>
		document.getElementById("searchButton").addEventListener("click", function() {
            const query = document.getElementById('searchInput').value;
            if (query) {
                performSearch(query);
            }
    });

    document.querySelectorAll(".select-button").forEach (button => {
    button.addEventListener("click", function(){
      const type = this.getAttribute("data-type");
      if(type)
      {
        performSearch(type);
      }
    });
    });		
		function performSearch(query) {
            fetch(`MySQL_Queries/search_product.php?query=${encodeURIComponent(query)}`).then(response => {
                    console.log("Response status:", response.status);
                    return response.text(); // Temporarily use text() to inspect the raw response
                }).then(text => {
                    console.log("Received text:", text);
                    try {
                        const data = JSON.parse(text); // Manually parse JSON to catch errors
                        displayResults(data);
                    } catch (error) {
                        console.error('JSON parse error:', error);
                    }
                }).catch(error => console.error('Fetch error:', error));
        }

        function displayResults(data) {
			const resultsContainer = document.getElementById('results');
			resultsContainer.innerHTML = ''; // Clear previous results

			if (data.length === 0) {
				resultsContainer.innerHTML = '<p>No results found.</p>';
				return;
			}

			data.forEach(item => {
				// Calculate unit price
				const unitPrice = item.productPrice / item.stockQuantity;

				const resultItem = document.createElement('div');
				resultItem.className = 'result-item';
				resultItem.innerHTML = `
					<h3>${item.productName}</h3>
					<p>Type: ${item.productType}</p>
					<p>Total Price: $${item.productPrice}</p>
					<p>Unit Price: $${unitPrice.toFixed(2)}</p> <!-- Display unit price -->
					<p>Stock Date: ${item.stockDate}</p>
					<p>Quantity: ${item.stockQuantity}</p>
					<p>Area Sourced: ${item.areaSourced}</p>
				`;
				resultsContainer.appendChild(resultItem);
			});
		}
    </script>
</body>
</html>
