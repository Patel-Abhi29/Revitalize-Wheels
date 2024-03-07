<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Upload Form</title>
    <link rel="stylesheet" href="add.css">
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
             session_start();
            if(isset($_SESSION["admin"]) && $_SESSION["admin"]==1 ){
                
                    ?>
                    
                    <a href="admin.php">Admin control</a>
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

<h2 style="text-align: center; padding-top:25px;">Upload a Product</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="product_type">Product Type :</label>
        <input type="text" name="product_type" id="product_type" required><br>
        
        <label for="name">Vehicle Name :</label>
        <input type="text" name="name" id="name" required><br>
        
        <label for="price">Price :</label>
        <input type="number" name="price" id="price" required><br>

        <label for="fuel_type">Fuel Type :</label>
        <input type="text" name="fuel_type" id="fuel_type" required></input><br>
        
        <label for="mileage">Mileage :</label>
        <input type="text" name="mileage" id="mileage" required></input><br>
           
        <label for="fuel_capacity">Fuel Capacity :</label>
        <input type="text" name="fuel_capacity" id="fuel_capacity" required></input><br>
        
        <label for="top_speed">Top Speed :</label>
        <input type="text" name="top_speed" id="top_speed" required></input><br>
         
        <label for="gears">Gears :</label>
        <input type="text" name="gears" id="gears" required></input><br>
         
        <label for="image1">Image1:</label>
        <input type="file" name="image1" id="image1" required><br>

        <label for="image2">Image2:</label>
        <input type="file" name="image2" id="image2" required><br>

        <label for="image3">Image3:</label>
        <input type="file" name="image3" id="image3" required><br>

        <input type="submit" value="Upload" name="submit">
    </form>
</body>
</html>