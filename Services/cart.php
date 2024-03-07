<?php
session_start();

include('../connect.php');
$user_id=$_SESSION['id'];

$sql= "SELECT * FROM cart INNER JOIN products on cart.product_id = products.id WHERE cart.user_id=$user_id";

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
            <h1 class="cart-title">Your Cart</h1>
            <div class="cart-items">
                <?php   
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                              $date1=new DateTime($row['from_date']);
                              $date2=new DateTime($row['to_date']);
                              $diffrence=$date1->diff($date2);
                              $quantity=$diffrence->days;
                             
                               $total  += $quantity * $row['price'];
                                
            
    ?>
                 <form action="checkout.php" method="POST">

                         <div class="cart-item" id="product_<?php echo $row['product_id']; ?>">
                         <input type="checkbox" id="checkbox" name="checkbox[]" value="<?php echo $row['product_id']  ?>">

                         <div class="product-image">
                                <img src="<?php echo '../admin/productimage/'. $row['image_path1']; ?>" alt="<?php echo $row['product_type']; ?>">
                            </div>
                            <div class="product-details">
                                <h2 class="product-title"><?php echo $row['product_name']; ?></h2>
                                <p class="product-price">Rs <?php echo $row['price'] ?></p>
                            </div>
                            
                            <div class="quantity-controls">
                            
                                    <p class="date"><?php echo $row['status'] ?></p>
                                    <label for="from_date" class="">From :</label>
                                        
                                        <input type="text" name="from_date" class="date" value="<?php echo $row['from_date']?> " disabled>
                                        <label for="to_date" class="">To :</label>

                                        <input type="text" name="to_date" class="date" value="<?php echo $row['to_date']?>  " disabled>
                                        <a href="remove.php?product_id=<?php echo $row['cart_id'];?>" class="remove-button btn" style="text-decoration:none">Remove</a>
                            </div>
                        </div>
                    <?php         
                                }
                            }
                    ?>
            </div>
            <div class="cart-summary">
                <div class="subtotal">
                    <span class="summary-label">Subtotal:</span>
                    <span class="summary-value">Rs <?php    echo $total ?></span>
                </div>
                <div >
                    <button class="btn" onclick="location.href='checkout.php'">Proceed to Checkout</button>
                </div>
            </div>
        </div>
        </form>

    </div>
</body>
</html>
