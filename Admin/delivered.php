<?php
   
   $conn = new mysqli('localhost','root','','revitalize_wheels');
   if($conn -> connect_error){
       die("Connection failed: " . $conn -> connect_error);
   }
    
   $product_id = $_GET['product_id'];
    
    $stmt = "UPDATE cart SET status='Dilivered' where product_id=$product_id";
  
  if( $conn -> query($stmt)){
    header('location: approve.php');
    
  }
   
  $conn -> close(); 


?>