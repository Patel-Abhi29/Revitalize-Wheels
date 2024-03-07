<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="checkout.css">
    <link rel="icon" type="image/x-icon" href="../images/favicon_io/favicon.ico">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
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
    <div class="container">
        <div class="left-panel">
            <h1>Checkout</h1>
            <form action="process_order.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your Name" required>
                </div>

                <div class="form-group">
                    <label for="number">Number</label>
                    <input type="text" id="number" name="number" placeholder="Enter your Contact Number" required>
                </div>

             

                <div class="form-group">
                    <label for="adhar">Adhaar Number</label>
                    <input type="text" id="adhar" name="adhar" placeholder="Enter your Adhaar number" required>
                </div>

                <div class="form-group">
                    <label for="license">License Number</label>
                    <input type="text" id="license" name="license" placeholder="Enter your License number" required>
                </div>

                <div class="form-group">
                    <label for="cardNumber">Card Number</label>
                    <input type="text" id="cardNumber" name="cardNumber" placeholder="Enter your card number" required>
                </div>

                <div class="form-group">
                    <label for="expirationDate">Expiration Date</label>
                    <input type="text" id="expirationDate" name="expirationDate" placeholder="MM/YY" required>
                </div>

                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" required>
                </div>

                <div class="form-group">
                    <label for="cardName">Name on Card</label>
                    <input type="text" id="cardName" name="cardName" placeholder="Enter the name on your card" required>
                </div>


                <button type="submit" class="btn">Place Order</button>
            </form>
        </div>

        <div class="right-panel">
            <h2>Order Summary</h2>
            <div id="order-summary">
                <?php
                
                $user_id=$_SESSION['id'];
                include('../connect.php');
                $total=0;
                $i=0;
                $product_arr= array();
                if(isset($_POST['checkbox']) && is_array($_POST['checkbox'])){
                    foreach($_POST['checkbox'] as $productid){
                        
                        $sql="SELECT * FROM cart INNER JOIN products on cart.product_id = products.id WHERE cart.user_id=$user_id AND products.id=$productid" ;
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        
                        $date1=new DateTime($row['from_date']);
                        $date2=new DateTime($row['to_date']);
                        $diffrence=$date1->diff($date2);
                        $quantity=$diffrence->days;
                       
                         $total  += $quantity * $row['price'];
                            
                            $product_arr[] =  $productid; 
                           
                            ?>                    

                            <div class="details">
              
                            <div class="image">
                                <?php echo '<img src="../admin/productimage/' . $row['image_path1'] . '" alt="' . $row['product_name'] . '" />'; ?>
                            </div>

                <?php
                            echo '<p>' . $row['product_name'] . '</p>';

                            echo '<div class="price">';
                            echo '<p>Number of Days ' . $quantity . '</p>';
                            echo '<p class="cross" > x </p>';
                            echo '<p> Rs. ' .  $row['price'] . '</p>';
                            echo '</div>';
                            echo '</div>';
                            

                        }
                       
                      

                        $_SESSION['product_arr']= $product_arr;
                    echo '<div class="line"></div>';

                    echo '<div class="total-price">';
                    echo '<p>Total Price: </p>';
                    echo '<p>Rs. ' . $total . '</p>';
                    echo '</div>';
                  
                }
                else{
                    echo '<p>Your shopping cart is empty.</p>';
                    echo '<br>';
                    echo '<p>Please select at least select one Product from Cart.</p>';
                }


                ?>


            </div>
            <div class="thank-you-message">
                Thank you for your order! 🎉
            </div>
            <!-- <div class="animation-container">
             <div class="artistic-animation"></div>
            </div> -->

        </div>
    </div>
   



</body>

</html>
