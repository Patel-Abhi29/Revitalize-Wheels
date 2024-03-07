
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rent.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cabin&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../images/favicon_io/favicon.ico">


    <title>Rental Page</title>
    

</head>
<body>
<nav class="navbar">
        <div class="navbar-logo">
            <img src="../images/logo.jpg" alt="Logo">
        </div>
        <div class="navbar-links">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="#">Rent</a></li>
                <li><a href="../index.php#aboutus-container">About Us</a></li>
            </ul>
        </div>
        <div class="navbar-auth">
        <?php
             session_start();
            if(isset($_SESSION["admin"]) && $_SESSION["admin"]==1 ){
                
                    ?>
                    
                    <a href="../admin/admin.php">Admin control</a>
                    <a href="cart.php">My Cart</a>

                    <a href="../Login/logout.php">Log out</a>
                   
                    <?php

                
              
                    
            }
      
            elseif (!isset($_SESSION["status"])){
                ?>
                <a href="../Login/login_signup.php">Sign Up</a>
                <a href="../Login/login_signup.php">Login</a>
                <?php
            }
            else{
                ?>
                
                <a href="cart.php">My Cart</a>

                <a href="../Login/logout.php">Log out</a>
               
                <?php
            }
            
            
            ?>
        </div>
</nav>

<h1 style="text-align:center; margin-top: 30px">Category</h1>

<section class="category">
        <a href="bike.php"><img src="../images/bike.jpg" alt="Bike"></a>
        <a href="car.php"><img src="../images/car.jpg" alt="Car"></a>
        <a href="truck.php"><img src="../images/truck.jpg" alt="Truck"></a>
</section>


<section >
    <?php



$servername = "localhost";
$username = "root";
$password = "";
$database = "revitalize_wheels";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products order by rand()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="container-column">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="container">';
      
        echo '<img src="../admin/ProductImage/' . $row["image_path1"] . '" alt="' . $row["product_type"] . '" />';
        echo '<div class="container__text">';
        echo '<div class="time">';
        echo '<div class="container_text_timing_time ">';
        echo '</div>';
        echo '</div>';
        echo '<h2>' . $row["product_name"] . '</h2>';
        echo '<div class="container_text_star">';
        echo '<span class="fa fa-star checked"></span><span style="color:green">'.$row['rating'].' </span>    ';
        
        echo '</div>';
        echo '';
        echo '<div class="time">';
        echo '<div class="container_text_timing_time price">';
        echo '<h2>Price</h2>';
        echo '<p>Rs. ' . $row["price"] . '/day</p>';
        echo '</div>';
        echo '</div>';

      ?>
        <a href="product_page.php?product_id=<?php echo $row['id'] ?>" class="btn" type="submit" style="text-decoration:none;">View Details</a>
        <?php
        echo '</div>';
        echo '</div>';
      
    }
    echo '</div>';
} else {
    echo '<div class="text-gray-600 text-xl mt-4">No products found.</div>';
}

$conn->close();

?>

    </section>

    <footer>

<section class="footer1">
        <div class="foot_flex logo-foot">
            <div class="navbar-logo">
                <img src="../images/logo.jpg" alt="Logo">
            </div>
            <p class="foot-p">At Revitalize Wheels, our mission is to revolutionize the car rental industry by 
            repurposing government-seized vehicles and offering them to our customers for 
             rental. We strive to provide high-quality, reliable transportation solutions 
              while contributing to sustainability and responsible vehicle usage.</p>
                     </div>
        <div class="foot_flex">
            <h3>
            Address
            </h3>
            <p>City: Bhilad</p>
            <p>Dist.: Valsad</p>
            <p>State: Gujarat</p>
            <p>Pincode: 396105</p>
    </div>
        <div class="foot_flex">
                <h3>
                    Quick Links
                </h3>
                <a href="../index.php">Home</a>
                <a href="rent.php">Rent</a>
                <a href="../index.php#aboutus-container">About Us</a>
                <a href="bike.php">Bike</a>
                <a href="car.php">Car</a>
                <a href="truck.php">Truck</a>
                
        </div>
        
        

</section>
<div class="center footer2">
                Copyright &copy; www.RevitalizeWheels.com All Rights Reserved!
        </div>


</footer>

<script>
    const products = <?php echo json_encode($products); ?>;
    let currentIndex = 0;
    const numProducts = products.length;

   function displayProduct(index) {
          const productElements = document.querySelectorAll('.carousel');
   
          for (let i = 0; i < productElements.length; i++) {
              const product = products[(index + i) % numProducts];
              const element = productElements[i];
   
              const img = element.querySelector('.product-image');
              const name = element.querySelector('.product-name');
              const price = element.querySelector('.product-price');
   
              img.src = '../admin/productimage/' + product.image_path;
              img.alt = product.title;
              name.innerText = product.title;
              price.innerText = 'Rs. ' + product.price;
          }
      }
   

    function changeProduct(direction) {
        currentIndex = (currentIndex + direction + numProducts) % numProducts;
        displayProduct(currentIndex);
    }

    function autoChangeProduct() {
        currentIndex = (currentIndex + 1) % numProducts;
        displayProduct(currentIndex);
    }

    // Automatically change product every 5 seconds
    setInterval(autoChangeProduct, 5000);

    displayProduct(currentIndex);
</script>
</body>
</html>