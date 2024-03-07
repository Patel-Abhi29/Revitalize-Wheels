<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" type="image/x-icon" href="../images/favicon_io/favicon.ico">

    <title>Admin</title>
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
                    
                    <a href="#">Admin control</a>
                    <a href="../services/cart.php">My Cart</a>

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
        <div class="panel">
            <div id="logo">
                <img class="logo" src="../images/admin.jpg" alt="Admin Panel">
            </div>
            <div>
                <h1>Admin Panel</h1>
            </div>
        </div>
        <button class="btn" onclick="location.href='add.php'">Add Product</button>
        <button class="btn" onclick="location.href='approve.php'">Approve Product</button>

    </div>

   

    <div class="table-container">

        <div>
            <h1>Products Details</h1>
        </div>

        <?php

       include('../connect.php');


        if (isset($_POST['delete'])) {
            $idToDelete = $_POST['delete'];
            $sqlDelete = "DELETE FROM products WHERE id = $idToDelete";
            if ($conn->query($sqlDelete) === TRUE) {
                echo "Record deleted successfully.";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }


        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            echo '<table border="1">';
            echo '<tr><th>Sr.No</th><th>Product Type</th><th>Title</th><th>Price</th><th>Image</th><th>Action</th></tr>';
            $rowNumber = 1;
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $rowNumber++ . '</td>';
                echo '<td>' . $row['product_type'] . '</td>';
                echo '<td>' . $row['product_name'] . '</td>';
                echo '<td>' . $row['price'] . '</td>';
                echo '<td><img src="productimage/' . $row['image_path1'] . '" alt="Product Image" width="100"></td>';
                echo '<td>';
                echo '<form method="POST">';
                echo '<input type="hidden" name="delete" value="' . $row['id'] . '">';
                echo '<button type="submit">Delete</button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "No products found in the database.";
        }


        $conn->close();
        ?>

    </div>


</body>

</html>
