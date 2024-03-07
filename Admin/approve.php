<?php
session_start();

include('../connect.php');
$user_id=$_SESSION['id'];
$status="Scheduled";

$sql= "SELECT * FROM cart INNER JOIN usersdata on cart.user_id = usersdata.id INNER JOIN products on cart.product_id = products.id WHERE cart.status='$status'";

$result = $conn->query($sql);
$total=0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <link rel="icon" type="image/x-icon" href="../images/favicon_io/favicon.ico">
    <link rel="stylesheet" href="approve.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
    <title>Shopping Cart</title>
</head>
<body>
<nav class="navbar">
        <div class="navbar-logo">
            <img src="../images/logo.jpg" alt="Logo">
        </div>
        <div class="navbar-links">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../services/rent.php">Rent</a></li>
                <li><a href="../index.php#aboutus-container">About Us</a></li>
            </ul>
        </div>
        <div class="navbar-auth">
        <?php
             
            if(isset($_SESSION["admin"]) && $_SESSION["admin"]==1 ){
                
                    ?>
                    
                    <a href="../admin/admin.php">Admin control</a>
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
                

                <a href="../Login/logout.php">Log out</a>
               
                <?php
            }
            
            
            ?>
        </div>
</nav>
   
    <div class="cart-container">
        <div class="cart">
           
            <div class="cart-items">
                <?php   
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                           $product_id=$row['product_id'];
            
    ?>
                

                         <div class="cart-item" id="product_<?php echo $row['product_id']; ?>">
                         <div class="product-image">
                                <img src="<?php echo '../admin/productimage/'. $row['image_path1']; ?>" alt="<?php echo $row['product_type']; ?>">

                            </div>
                            
                            <h2 class=""><?php echo $row['email']; ?></h2>

                            
                            <div class="product-details">
                                <h2 class="product-title"><?php echo $row['product_name']; ?></h2>
                                <p class="product-price">Rs <?php echo $row['price'] ?></p>
                             
                            </div>
                            
                            <div class="quantity-controls">
                            
                               
                    <a href="delivered.php?product_id=<?php echo $product_id ?>" class="btn" >Approve</a>
                 </div>
                        </div>
                    <?php         
                                }
                            }
                    ?>
            </div>
           
        </div>
       

    </div>
</body>
</html>
