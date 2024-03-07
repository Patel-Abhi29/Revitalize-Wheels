<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cabin&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="index.css">

</head>
<body>
<nav class="navbar">
        <div class="navbar-logo">
            <img src="images/logo.jpg" alt="Logo">
        </div>
        <div class="navbar-links">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="services/rent.php">Rent</a></li>
                <li><a href="#aboutus-container">About Us</a></li>
            </ul>
        </div>
        <div class="navbar-auth">
        <?php
             session_start();
            if(isset($_SESSION["admin"]) && $_SESSION["admin"]==1 ){
                
                    ?>
                    
                    <a href="admin/admin.php">Admin control</a>
                    <a href="services/cart.php">My Cart</a>

                    <a href="Login/logout.php">Log out</a>
                   
                    <?php

                
              
                    
            }
      
            elseif (!isset($_SESSION["status"])){
                ?>
                <a href="Login/login_signup.php">Sign Up</a>
                <a href="Login/login_signup.php">Login</a>
                <?php
            }
            else{
                ?>
                
                <a href="services/cart.php">My Cart</a>

                <a href="Login/logout.php">Log out</a>
               
                <?php
            }
            
            
            ?>
        </div>
</nav>
</body>
</html>