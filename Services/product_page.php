<?php 
$product_id=$_GET['product_id'];
include('../connect.php');

// main vehicle
$sql = "SELECT * FROM products where id=$product_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $product_type=$row['product_type'];
     
}  

// related vehicle 

$sql1 = "SELECT * FROM products where product_type='$product_type' AND id != $product_id order by rand() LIMIT 0,3";
$result1 = $conn->query($sql1);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="product_page.css">
    <link rel="icon" type="image/x-icon" href="../images/favicon_io/favicon.ico">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cabin&family=Poppins:wght@300&display=swap" rel="stylesheet">

</head>
<body>
<nav class="navbar">
        <div class="navbar-logo">
            <img src="../images/logo.jpg" alt="Logo">
        </div>
        <div class="navbar-links">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="rent.php">Rent</a></li>
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
<div class="location">
            <a href="rent.php">Rent</a>
            <p>/</p>
            <a href="<?php echo $row['product_type']?>.php"><?php echo $row['product_type']?></a>
            <p>/</p>
            <p><?php echo $row['product_name'] ?></p>
        </div>
<div class="main-wrapper">

<div class="container1">
    <div class="product-div">
        <div class="product-div-left">
            <div class="image-container">
                
                                <img src="../admin/productimage/<?php echo $row['image_path1']; ?>" alt="buds-img" style=" width:700px;height:500px;display: block;">
            </div>
                        <div class="hover-container">
                            <div>
                                <img src="../admin/productimage/<?php echo $row['image_path1']; ?>" >
                            </div>
                            <div>
                                <img src="../admin/productimage/<?php echo $row['image_path2']; ?>">
                            </div>
                            <div>
                                <img src="../admin/productimage/<?php echo $row['image_path3']; ?>">
                            </div>
                            
                        </div>
                     
        </div>
        <div class="product-div-right">
            <div class="pro-head flex"><h1><?php echo $row['product_name'] ?></h1>
                           <div class="flex"> <?php         echo '<span class="fa fa-star checked" style="color:yellow"></span><span style="color:green"> '.$row['rating'].' </span>    ';
 ?> </div>
            </div>
            <h2>Car Overview:</h2>
            <div class="flex">           <h3>Fuel Type : </h3> <p> <?php echo $row['fuel_type'] ?></p>
                </div>
                <div class="flex">           <h3>Mileage : </h3> <p> <?php echo $row['mileage'] ?> km/l</p>
                </div>
                <div class="flex">           <h3>Fuel Capacity : </h3> <p> <?php echo $row['fuel_capacity'] ?> l</p>
                </div>
                <div class="flex">           <h3>Top Speed : </h3> <p> <?php echo $row['top_speed'] ?> km/h</p>
                </div>
                <div class="flex">           <h3>Gears : </h3> <p> <?php echo $row['gears'] ?></p>
                </div>
                <div class="flex">           <h1>Price : </h1> <p class="price">Rs. <?php echo $row['price'] ?>/day</p>
                </div>
                <form action="cart_item.php" method="post">
                <input type="hidden" name="product_id" value=" <?php echo $row["id"] ?>">
               
                <label for="from_date" class="">Booking From date :</label>
                <input type="date" name="from_date" required>
                <label for="to_date" class="">To date :</label>
                <input type="date" name="to_date" required>
                <br>
                <button  class="btn" type="submit">Book Now</button>

                </form>






        </div>
     </div>
    </div>
</div>


<section class=" related_vehicle">
    <h1>Releted Vehicle : </h1>
<?php
                
                if ($result1->num_rows > 0) {
                    echo '<div class="container-column">';
                    while ($row1 = $result1->fetch_assoc()) {
                        echo '<div class="container">';
                      
                        echo '<img src="../admin/ProductImage/' . $row1["image_path1"] . '" alt="' . $row1["product_type"] . '" />';
                        echo '<div class="container__text">';
                       
                        echo '<h2>' . $row1["product_name"] . '</h2>';
                        echo '<div class="container_text_star">';
                        echo '<span class="fa fa-star checked"></span><span style="color:green"> '.$row1['rating'].' </span>    ';
                        
                        echo '</div>';
                        echo '';
                        echo '<div class="time">';
                        echo '<div class="container_text_timing_time price">';
                        echo '<h2>Price</h2>';
                        echo '<p>Rs. ' . $row1["price"] . '/day</p>';
                        echo '</div>';
                        echo '</div>';
                      ?>
                        
                        <a href="product_page.php?product_id=<?php echo $row1['id'] ?>" class="btn" type="submit" style="text-decoration:none;">View Details</a>
                       <?php
                        echo '</div>';
                        echo '</div>';
                      
                    }
                    echo '</div>';
                } else {
                    echo '<div class="text-gray-600 text-xl mt-4">No products found.</div>';
                }
                            
                            
                            
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
        const allHoverImages = document.querySelectorAll('.hover-container div img');
const imgContainer = document.querySelector('.image-container img');

window.addEventListener('DOMContentLoaded', () => {
    // Set the initial main image source to the first hover image
    imgContainer.src =allHoverImages[0].src;
});

allHoverImages.forEach((image) => {
    image.addEventListener('mouseover', () => {
        imgContainer.src =image.src; // Update the main image source on hover
    });
});
    </script>
</body>
</html>