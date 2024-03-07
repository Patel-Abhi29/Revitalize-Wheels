<?php

    include('../connect.php');
    
   
    

    if(!isset($_GET['dec_id'])){
        $product_id=$_GET['inc_id'];
        $increment = $_GET['quantity'];
        $add = $increment + 1;
        $sql=  "UPDATE cart SET days = $add WHERE cart_id=$product_id";
        if( $conn -> query($sql)){
            header('location: cart.php');
            
          }
           
    }
   else {$product_id=$_GET['dec_id'];
        $decrement = $_GET['quantity'];
        $sub = $decrement - 1;
        $sql=  "UPDATE cart SET days = $sub WHERE cart_id=$product_id";
        if( $conn -> query($sql)){
            header('location: cart.php');
            
          }
           
    }
    
    ?>